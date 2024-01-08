<?php

namespace App\Filament\Resources\CountryPriceResource\Pages;

use App\Filament\Resources\CountryPriceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCountryPrice extends EditRecord
{
    protected static string $resource = CountryPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
