<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OutgoingLetterResource\Pages;
use App\Filament\Resources\OutgoingLetterResource\RelationManagers;
use App\Models\Member;
use App\Models\OutgoingLetter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OutgoingLetterResource extends Resource
{
    protected static ?string $model = OutgoingLetter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sender_id')
                    ->options(
                        Member::all()->pluck('name', 'id')->toArray()
                    )
                    ->label('Select Sender')
                    ->required(),
                Forms\Components\TextInput::make('number_letter')
                    ->required(),
                Forms\Components\DatePicker::make('date_letter')
                    ->required(),
                Forms\Components\TextInput::make('to')
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
                Tables\Columns\TextColumn::make('sender_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('number_letter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_letter')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('to')
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
            'index' => Pages\ListOutgoingLetters::route('/'),
            'create' => Pages\CreateOutgoingLetter::route('/create'),
            'view' => Pages\ViewOutgoingLetter::route('/{record}'),
            'edit' => Pages\EditOutgoingLetter::route('/{record}/edit'),
        ];
    }
}
