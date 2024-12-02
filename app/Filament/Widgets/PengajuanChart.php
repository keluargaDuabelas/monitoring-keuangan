<?php

namespace App\Filament\Widgets;

use App\Models\Pengajuan;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PengajuanChart extends ChartWidget
{
    protected static ?string $heading = 'Chart Pengajuan';
    protected static ?string $pollingInterval = '10s';
    protected function getData(): array
    {
        $data = Trend::model(Pengajuan::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perDay()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Pengajuan',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                'backgroundColor' => '#36A2EB',
                'borderColor' => '#9BD0F5',
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
