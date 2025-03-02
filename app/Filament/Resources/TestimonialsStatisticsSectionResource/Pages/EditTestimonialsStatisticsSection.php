<?php

namespace App\Filament\Resources\TestimonialsStatisticsSectionResource\Pages;

use App\Filament\Resources\TestimonialsStatisticsSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestimonialsStatisticsSection extends EditRecord
{
    protected static string $resource = TestimonialsStatisticsSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
