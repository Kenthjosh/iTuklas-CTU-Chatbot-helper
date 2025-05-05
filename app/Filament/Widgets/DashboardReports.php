<?php

namespace App\Filament\Widgets;

use App\Models\Chat;
use App\Models\Conversation;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardReports extends BaseWidget
{
    protected function getHeading(): ?string
    {
        return 'Analytics';
    }

    // protected function getDescription(): ?string
    // {
    //     return 'An overview of some analytics.';
    // }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Total number of users')
                ->descriptionIcon('heroicon-o-users')
                ->color('success')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
            Stat::make('Total Chats', Chat::count())
                ->description('Total number of chats')
                ->descriptionIcon('humble-chats')
                ->color('info')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
            Stat::make('Total Conversations', Conversation::count())
                ->description('Total number of conversations')
                ->descriptionIcon('emblem-group-conversation-fill')
                ->color('primary')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
        ];
    }
}
