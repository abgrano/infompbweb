<?php

namespace App\Filament\Resources\DataImportResource\Pages;

use App\Filament\Resources\DataImportResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataImport extends CreateRecord
{
    protected static string $resource = DataImportResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
