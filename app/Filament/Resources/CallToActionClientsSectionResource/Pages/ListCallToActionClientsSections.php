<?php

namespace App\Filament\Resources\CallToActionClientsSectionResource\Pages;

use App\Filament\Resources\CallToActionClientsSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCallToActionClientsSections extends ListRecords
{
    protected static string $resource = CallToActionClientsSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
