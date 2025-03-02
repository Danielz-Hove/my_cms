<?php

namespace App\Filament\Resources\FeaturesTabbedSectionResource\Pages;

use App\Filament\Resources\FeaturesTabbedSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeaturesTabbedSections extends ListRecords
{
    protected static string $resource = FeaturesTabbedSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
