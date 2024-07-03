<?php

namespace App\Filament\Resources\OrganismResource\Pages;

use App\Filament\Resources\OrganismResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganism extends CreateRecord
{
    protected static string $resource = OrganismResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
