<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Period;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;
use Coolsam\Flatpickr\Forms\Components\Flatpickr;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $activeNavigationIcon = 'heroicon-s-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->minLength(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\Action::make('pdf')
                    ->after(function ($record) {
                        Period::where('project_id', $record->id)->update(['reported' => true]);
                    })
                    ->label('PDF')
                    ->color('success')
                    ->icon('heroicon-s-document')
                    ->form([
                        Flatpickr::class::make('month')
                            ->monthPicker()
                            ->label('Erstelle einen Monatsabschluss für')
                            ->default(now()->format('Y-m'))
                            ->disabledDates(['2025-05-01'])
                            ->format('Y-m')
                            ->displayFormat('F Y')
                            ->minDate(fn () => today()->subYears(5)) // Set the minimum allowed date
                            ->maxDate(fn () => today())
                            ->required(),
                    ])
                    ->action(function (array $data, Model $record) {
                        $yearAndMonth = Carbon::createFromDate($data['month'])->format('Y-m');
                        Log::debug('ProjectResource@table $data', [$yearAndMonth]);

                        return response()->streamDownload(function () use ($record, $yearAndMonth) {
                            echo Pdf::loadHtml(
                                Blade::render('monthly_settlement', ['record' => $record, 'yearAndMonth' => $yearAndMonth]),
                            )->stream();
                        }, $record->name.'.pdf');
                    }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        Period::where('project_id', $record->id)->delete();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
