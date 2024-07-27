<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetterAssignmentResource\Pages;
use App\Filament\Resources\LetterAssignmentResource\RelationManagers;
use App\Models\LetterAssignment;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LetterAssignmentResource extends Resource
{
    protected static ?string $model = LetterAssignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationParentItem = 'Members';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('member_id')
                    ->options(
                        Member::all()->pluck('name', 'id')->toArray()
                    )
                    ->label('Select Member')
                    ->required(),
                Forms\Components\TextInput::make('number_sk')
                    ->required(),
                Forms\Components\DatePicker::make('date_sk')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\FileUpload::make('softfile')
                    ->directory('letter-assignments')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('member.name')
                    ->label('Member')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_sk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_sk')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListLetterAssignments::route('/'),
            'create' => Pages\CreateLetterAssignment::route('/create'),
            'view' => Pages\ViewLetterAssignment::route('/{record}'),
            'edit' => Pages\EditLetterAssignment::route('/{record}/edit'),
        ];
    }
}
