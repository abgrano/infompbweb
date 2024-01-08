<?php

namespace App\Filament\Resources\DailyLocalPriceResource\Pages;

use App\Filament\Resources\DailyLocalPriceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDailyLocalPrice extends EditRecord
{
    protected static string $resource = DailyLocalPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
