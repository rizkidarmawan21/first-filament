<?php

namespace App\Filament\Resources\MemberRankResource\Pages;

use App\Filament\Resources\MemberRankResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemberRank extends EditRecord
{
    protected static string $resource = MemberRankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
