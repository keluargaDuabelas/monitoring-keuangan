<?php

namespace App\Filament\Resources\ValidasiResource\Pages;

use App\Filament\Resources\ValidasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditValidasi extends EditRecord
{
    protected static string $resource = ValidasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
