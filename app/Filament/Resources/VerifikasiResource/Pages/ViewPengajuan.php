<?php
namespace App\Filament\Resources\VerifikasiBerkasResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;
use Filament\Pages\Actions\Action;
use App\Filament\Resources\VerifikasiResource;

class ViewPengajuan extends ViewRecord
{
    protected static string $resource = VerifikasiResource::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nama_berkas')
                ->label('Nama Berkas')
                ->disabled(), // Non-editable field
            Forms\Components\TextInput::make('status_berkas')
                ->label('Status Berkas')
                ->disabled(), // Non-editable field
            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->disabled(), // Non-editable field
            // Tambahkan field-field lain jika diperlukan
        ];
    }

    protected function getActions(): array
    {
        return [
            $this->verifikasiAction(),
            $this->tolakAction(),
        ];
    }

    private function verifikasiAction(): Action
    {
        return Action::make('verifikasi')
            ->label('Verifikasi')
            ->action(fn () => $this->record->update(['status_berkas' => 'Verifikasi']))
            ->color('success')
            ->requiresConfirmation()
            ->visible(fn () => $this->record->status_berkas === 'Pengajuan')
            ->button();
    }

    private function tolakAction(): Action
    {
        return Action::make('tolak')
            ->label('Tolak')
            ->action(fn () => $this->record->update(['status_berkas' => 'Tolak']))
            ->color('danger')
            ->requiresConfirmation()
            ->visible(fn () => $this->record->status_berkas === 'Pengajuan')
            ->button();
    }
}
