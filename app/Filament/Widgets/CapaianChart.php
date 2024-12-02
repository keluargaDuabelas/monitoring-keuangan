<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Anggaran;
use App\Models\Realisasi;

class CapaianChart extends ChartWidget
{
    protected static ?string $heading = 'Chart Capaian';

    protected function getData(): array
    {
        $totalAnggaran = Anggaran::sum('anggaran');
        $totalRealisasi = Realisasi::sum('realisasi');
        $sisaAnggaran = $totalAnggaran - $totalRealisasi;

        $total = $totalAnggaran > 0 ? $totalAnggaran : 1; // Untuk menghindari pembagian dengan nol

        return [
            'labels' => ['Anggaran', 'Realisasi', 'Sisa Anggaran'],
            'datasets' => [
                [
                    'data' => [
                        ($totalAnggaran / $total) * 100,
                        ($totalRealisasi / $total) * 100,
                        ($sisaAnggaran / $total) * 100,
                    ],
                    'backgroundColor' => ['#36A2EB', '#FF6384', '#FFCE56'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
