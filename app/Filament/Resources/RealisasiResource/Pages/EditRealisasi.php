<?php

namespace App\Filament\Resources\RealisasiResource\Pages;

use App\Filament\Resources\RealisasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealisasi extends EditRecord
{
    protected static string $resource = RealisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
