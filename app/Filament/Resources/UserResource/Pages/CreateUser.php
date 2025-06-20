<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected static bool $canCreateAnother = false;

    /**
     * customize redirect after creation
     */
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
