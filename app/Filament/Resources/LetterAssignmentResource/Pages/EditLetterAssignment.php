<?php

namespace App\Filament\Resources\LetterAssignmentResource\Pages;

use App\Filament\Resources\LetterAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetterAssignment extends EditRecord
{
    protected static string $resource = LetterAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
