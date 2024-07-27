<?php

namespace App\Filament\Resources\LetterAssignmentResource\Pages;

use App\Filament\Resources\LetterAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetterAssignments extends ListRecords
{
    protected static string $resource = LetterAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
