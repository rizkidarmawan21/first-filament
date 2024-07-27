<?php

namespace App\Filament\Resources\MemberPositionResource\Pages;

use App\Filament\Resources\MemberPositionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemberPosition extends EditRecord
{
    protected static string $resource = MemberPositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
