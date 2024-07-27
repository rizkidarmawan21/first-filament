<?php

namespace App\Filament\Resources\MemberPositionResource\Pages;

use App\Filament\Resources\MemberPositionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMemberPosition extends ViewRecord
{
    protected static string $resource = MemberPositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
