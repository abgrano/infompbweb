<?php

namespace App\Filament\Resources\DailyLocalPriceResource\Pages;

use App\Filament\Resources\DailyLocalPriceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDailyLocalPrices extends ListRecords
{
    protected static string $resource = DailyLocalPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
