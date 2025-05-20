<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodResource\Pages;
use App\Filament\Resources\PeriodResource\RelationManagers;
use App\Models\Period;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PeriodResource extends Resource
{
    protected static ?string $model = Period::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $activeNavigationIcon = 'heroicon-s-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('project_id')
                    ->required()
                    ->label('Project')
                    ->searchable()
                    ->options(Project::all()->pluck('name', 'id')),
                DatePicker::make('date')->label('Date')
                    ->extraInputAttributes(['value' => now()->toDate()->format('d F Y')])
                    ->displayFormat('d F Y')
                    ->required()
                    ->closeOnDateSelection()
                    ->minDate(now()->subYears(5))
                    ->maxDate(now())
                    ->default(now()),
//                  ->disabledDates(['2000-01-03', '2000-01-15', '2000-01-20']), // ToDo: hide dates already in DB for project
                TextInput::make('period')
                    ->label('Eingabe von Zeiten im Format “Xh Ym” oder im Maschinenstundenformat (0,25 - 1 für eine Stunde)')
                    ->helperText('Eingabe von Zeiten im Format “Xh Ym”, wobei X und Y Ganzzahlen sind, oder eingabe von Zeiten im Maschinenstundenformat (0,25 - 1 für eine Stunde)')
                    ->regex('/^[1-9]$|^[1-9],{1}([0][0]|[2][5]|[5][0]|[7][5])$|^[0],{1}([2][5]|[5][0]|[7][5])$|^[0-9]h{1}\s[0-9]{1,2}m{1}$/'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.name')->label('Project')->searchable()->sortable(),
                TextColumn::make('date')->label('Date')->searchable()->sortable(),
                TextColumn::make('minutes')->label('Period in minutes')
                    ->formatStateUsing(
                        fn (string $state): string => strlen($state) === 2
                        ? '0,' . $state
                        : substr($state, 0, 1) . ',' . substr($state, -2),
                    ),
                IconColumn::make('reported')->label('Reported')
                    ->sortable()
                    ->icon(fn (bool $state): string => match ($state) {
                        false => 'heroicon-s-x-circle',
                        true => 'heroicon-s-check-circle',
                    }),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()->hidden(
                    fn ($record) => FacadesAuth::id() !== 1 && $record->reported === true
                ),
                Tables\Actions\DeleteAction::make()->hidden(
                    fn ($record) => FacadesAuth::id() !== 1 && $record->reported === true
                ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeriods::route('/'),
            'create' => Pages\CreatePeriod::route('/create'),
            'edit' => Pages\EditPeriod::route('/{record}/edit'),
        ];
    }
}
