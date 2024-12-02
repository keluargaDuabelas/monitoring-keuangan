<?php

namespace App\Filament\Resources\ValidasiResource\Pages;

use App\Filament\Resources\ValidasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListValidasis extends ListRecords
{
    protected static string $resource = ValidasiResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
