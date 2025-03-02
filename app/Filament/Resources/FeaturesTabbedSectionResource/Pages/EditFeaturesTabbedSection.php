<?php

namespace App\Filament\Resources\FeaturesTabbedSectionResource\Pages;

use App\Filament\Resources\FeaturesTabbedSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeaturesTabbedSection extends EditRecord
{
    protected static string $resource = FeaturesTabbedSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
