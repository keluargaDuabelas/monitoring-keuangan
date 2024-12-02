<?php

namespace App\Filament\Widgets;

use App\Models\Anggaran;
use App\Models\Realisasi;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AnggaranWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Anggaran', 'Rp ' . number_format(Anggaran::sum('anggaran'), 0, ',', '.'))
            ->description('Total Anggaran')
            ->descriptionIcon('heroicon-m-inbox-arrow-down', IconPosition::Before)
            ->chart([1, 3, 5, 10, 20, 10])
            ->color('info'),
            Stat::make('Realisasi', 'Rp ' . number_format(Realisasi::sum('realisasi'), 0, ',', '.'))
            ->description('Total Realisasi')
            ->descriptionIcon('heroicon-m-wallet', IconPosition::Before)
            ->chart([1, 3, 5, 10, 20, 10])
            ->color('success'),
            Stat::make('Sisa Anggaran', 'Rp ' . number_format(Anggaran::sum('anggaran') - Realisasi::sum('realisasi'), 0, ',', '.'))
            ->description('Total Realisasi')
            ->descriptionIcon('heroicon-m-wallet', IconPosition::Before)
            ->chart([1, 3, 5, 10, 20, 10])
            ->color('danger'),
        ];
    }
}
