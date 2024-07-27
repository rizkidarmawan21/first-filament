<?php

namespace App\Filament\Widgets;

use App\Models\Department;
use App\Models\IncomingLetter;
use App\Models\Member;
use App\Models\OutgoingLetter;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends BaseWidget
{
    // sort 1
    protected static ?int $sort = 2;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Departments', Department::count()),
            Stat::make('Total Members', Member::count()),
            Stat::make('Total Incoming Letters', IncomingLetter::count()),
            Stat::make('Total Outgoing Letters', OutgoingLetter::count()),
        ];
    }
}
