<?php

namespace App\Filament\Widgets;

use App\Models\Sondage;
use App\Models\Utilisateur;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UtilisateurTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Les utlisateurs de la plateforme', Utilisateur::query()->count())
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Le nombre de sondage(s)', Sondage::query()->count())
                ->description('7% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
