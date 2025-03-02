<?php

namespace App\Filament\Resources\CallToActionClientsSectionResource\Pages;

use App\Filament\Resources\CallToActionClientsSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCallToActionClientsSection extends EditRecord
{
    protected static string $resource = CallToActionClientsSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
