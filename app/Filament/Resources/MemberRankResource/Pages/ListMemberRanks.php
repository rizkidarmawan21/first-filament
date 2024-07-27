<?php

namespace App\Filament\Resources\MemberRankResource\Pages;

use App\Filament\Resources\MemberRankResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemberRanks extends ListRecords
{
    protected static string $resource = MemberRankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
