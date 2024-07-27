<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OutgoingLetterResource;
use App\Models\OutgoingLetter;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class OutgoingLetterOverview extends BaseWidget
{
    protected static ?int $sort = 4;
    protected static ?string $heading = 'Top 5 Latest Outgoing Letters';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                // latest 5 outgoing letters
                OutgoingLetterResource::getEloquentQuery()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('sender_id')
                    ->label('Sender'),
                Tables\Columns\TextColumn::make('number_letter')
                    ->label('Number Letter'),
                Tables\Columns\TextColumn::make('date_letter')
                    ->label('Date Letter'),
                Tables\Columns\TextColumn::make('to')
                    ->label('To'),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type'),
            ])->paginated(false);
    }
}
