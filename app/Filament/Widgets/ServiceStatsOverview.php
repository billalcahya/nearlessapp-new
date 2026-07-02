<?php

namespace App\Filament\Widgets;

use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ServiceStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        // 1. Total Services & Penambahan bulan ini
        $totalServices = Service::count();
        $servicesThisMonth = Service::whereMonth('created_at', now()->month)
                                    ->whereYear('created_at', now()->year)
                                    ->count();

        // 2. Average Price
        $averagePrice = Service::avg('base_price') ?? 0;
        $formattedAveragePrice = 'Rp ' . number_format($averagePrice, 0, ',', '.');

        // 3. Active Status Percentage
        $activeServices = Service::where('is_active', true)->count();
        $activePercentage = $totalServices > 0 ? round(($activeServices / $totalServices) * 100) : 0;

        // 4. Top Performer (Diganti menjadi Layanan Terbaru karena belum ada data transaksi)
        $latestService = Service::latest()->first();
        $latestServiceName = $latestService ? str($latestService->name)->limit(20) : 'Belum ada data';

        return [
            Stat::make('TOTAL SERVICES', $totalServices)
                ->description('+' . $servicesThisMonth . ' this month')
                ->color('info'),

            Stat::make('AVERAGE PRICE', $formattedAveragePrice)
                ->description('Across all categories')
                ->color('gray'),

            Stat::make('ACTIVE STATUS', $activePercentage . '%')
                ->description($activeServices . ' active services')
                ->chart([20, 40, $activePercentage > 50 ? 60 : 30, 80, $activePercentage]) 
                ->color($activePercentage >= 50 ? 'success' : 'danger'),

            Stat::make('LATEST SERVICE', $latestServiceName)
                ->description('Recently added'),
        ];
    }
}