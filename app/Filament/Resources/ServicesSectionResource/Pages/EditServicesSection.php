<?php

namespace App\Filament\Resources\ServicesSectionResource\Pages;

use App\Filament\Resources\ServicesSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServicesSection extends EditRecord
{
    protected static string $resource = ServicesSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
