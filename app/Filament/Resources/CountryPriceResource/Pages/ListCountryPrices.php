<?php

namespace App\Filament\Resources\CountryPriceResource\Pages;

use App\Filament\Resources\CountryPriceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCountryPrices extends ListRecords
{
    protected static string $resource = CountryPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
