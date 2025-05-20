<?php

namespace App\Filament\Resources\PeriodResource\Pages;

use App\Filament\Resources\PeriodResource;
use App\Traits\PeriodTrait;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EditPeriod extends EditRecord
{
    use PeriodTrait;

    protected static string $resource = PeriodResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    /**
     * customize redirect after creation
     */
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function mutateFormDataBeforeFill(array $data): array
    {
        $data['period'] = $this->getPeriodFromDb($data['minutes']);

        return $data;
    }

    public function mutateFormDataBeforeSave(array $data): array
    {
        $this->getPeriodForDb($data);
        $data['user_id'] = Auth::id();

        return $data;
    }
}
