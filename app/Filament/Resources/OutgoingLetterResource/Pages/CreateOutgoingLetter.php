<?php

namespace App\Filament\Resources\OutgoingLetterResource\Pages;

use App\Filament\Resources\OutgoingLetterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOutgoingLetter extends CreateRecord
{
    protected static string $resource = OutgoingLetterResource::class;
}
