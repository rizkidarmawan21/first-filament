<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\IncomingLetterResource;
use App\Models\IncomingLetter;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class IncomingLetterOverview extends BaseWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Top 5 Latest Incoming Letters';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                // latest 5 incoming letters
                IncomingLetterResource::getEloquentQuery()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('recipent_id')
                    ->label('Recipent'),
                Tables\Columns\TextColumn::make('number_letter')
                    ->label('Number Letter'),
                Tables\Columns\TextColumn::make('date_letter')
                    ->label('Date Letter'),
                Tables\Columns\TextColumn::make('from')
                    ->label('From'),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
            ])->paginated(false);
    }
}
