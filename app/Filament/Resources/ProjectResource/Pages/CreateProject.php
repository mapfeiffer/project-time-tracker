<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected static bool $canCreateAnother = false;

    /**
     * customize redirect after create
     */
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
