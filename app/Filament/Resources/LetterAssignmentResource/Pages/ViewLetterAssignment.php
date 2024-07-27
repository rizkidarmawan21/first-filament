<?php

namespace App\Filament\Resources\LetterAssignmentResource\Pages;

use App\Filament\Resources\LetterAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLetterAssignment extends ViewRecord
{
    protected static string $resource = LetterAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
