<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('All registered users')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Total Posts', Post::count())
                ->description('All published posts')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),
            Stat::make('Latest Post', Post::latest()->first()?->title ?? 'No posts yet')
                ->description('Most recent post')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
} 