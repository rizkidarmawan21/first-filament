<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberRankResource\Pages;
use App\Filament\Resources\MemberRankResource\RelationManagers;
use App\Models\Member;
use App\Models\MemberRank;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemberRankResource extends Resource
{
    protected static ?string $model = MemberRank::class;

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
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->required(),
                Forms\Components\TextInput::make('length_of_rank')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('member.name')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Rank')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('length_of_rank')
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
                // filter by member name
                Tables\Filters\SelectFilter::make('member_id')
                    ->options(fn () => Member::pluck('name', 'id')->toArray())
                    ->label('Member')
                    ->placeholder('Filter by Member'),
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
            'index' => Pages\ListMemberRanks::route('/'),
            'create' => Pages\CreateMemberRank::route('/create'),
            'view' => Pages\ViewMemberRank::route('/{record}'),
            'edit' => Pages\EditMemberRank::route('/{record}/edit'),
        ];
    }
}
