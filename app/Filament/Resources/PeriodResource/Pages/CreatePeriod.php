<?php

namespace App\Filament\Resources\PeriodResource\Pages;

use App\Filament\Resources\PeriodResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Traits\PeriodTrait;

class CreatePeriod extends CreateRecord
{
    use PeriodTrait;

    protected static string $resource = PeriodResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after creation
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        Log::debug('EditPeriod@mutateFormDataBeforeSave $data:', $data);

        $this->getPeriodForDb($data);

        $data['user_id'] = Auth::id();

        Log::debug('EditPeriod@mutateFormDataBeforeSave modified $data:', $data);
        return $data;
    }
}
