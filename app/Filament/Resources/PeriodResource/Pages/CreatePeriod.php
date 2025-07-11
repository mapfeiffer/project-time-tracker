<?php

namespace App\Filament\Resources\PeriodResource\Pages;

use App\Filament\Resources\PeriodResource;
use App\Models\Traits\PeriodTrait;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePeriod extends CreateRecord
{
    use PeriodTrait;

    protected static string $resource = PeriodResource::class;

    protected static bool $canCreateAnother = false;

    /**
     * customize redirect after creation
     */
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->getPeriodForDb($data);
        $data['user_id'] = Auth::id();

        return $data;
    }
}
