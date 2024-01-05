<?php

namespace App\Filament\Resources\FacilityResource\Pages;

use App\Filament\Resources\FacilityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFacilities extends ListRecords
{
    protected static string $resource = FacilityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
