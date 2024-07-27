<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncomingLetterResource\Pages;
use App\Filament\Resources\IncomingLetterResource\RelationManagers;
use App\Models\IncomingLetter;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IncomingLetterResource extends Resource
{
    protected static ?string $model = IncomingLetter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('recipent_id')
                    ->options(
                        Member::all()->pluck('name', 'id')->toArray()
                    )
                    ->label('Select Recipent')
                    ->required(),
                Forms\Components\TextInput::make('number_letter')
                    ->required(),
                Forms\Components\DatePicker::make('date_letter')
                    ->required(),
                Forms\Components\TextInput::make('from')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options([
                        'regular' => 'Regular',
                        'urgent' => 'Urgent',
                        'medium' => 'Medium',
                    ])
                    ->label('Select Type')
                    ->required(),
                Forms\Components\FileUpload::make('softfile')
                    ->directory('incoming-letters')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('recipent_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('number_letter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_letter')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('from')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('softfile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncomingLetters::route('/'),
            'create' => Pages\CreateIncomingLetter::route('/create'),
            'view' => Pages\ViewIncomingLetter::route('/{record}'),
            'edit' => Pages\EditIncomingLetter::route('/{record}/edit'),
        ];
    }
}
