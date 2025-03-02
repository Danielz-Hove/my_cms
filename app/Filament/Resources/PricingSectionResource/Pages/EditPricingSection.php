<?php

namespace App\Filament\Resources\PricingSectionResource\Pages;

use App\Filament\Resources\PricingSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPricingSection extends EditRecord
{
    protected static string $resource = PricingSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
