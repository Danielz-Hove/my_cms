<?php

namespace App\Filament\Resources\FeaturesSectionResource\Pages;

use App\Filament\Resources\FeaturesSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeaturesSection extends EditRecord
{
    protected static string $resource = FeaturesSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
