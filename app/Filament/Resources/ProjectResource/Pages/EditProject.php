<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

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
}
