<?php

namespace App\Filament\Resources\OrganismResource\Pages;

use App\Filament\Resources\OrganismResource;
use App\Models\Organism;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditOrganism extends EditRecord
{
    protected static string $resource = OrganismResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->before(function (Organism $organism){
                Storage::delete('public/' . $organism->avatar);
            }),
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }
}
