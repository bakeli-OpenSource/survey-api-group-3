<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SondageResource\Pages;
use App\Filament\Resources\SondageResource\RelationManagers;
use App\Models\Sondage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SondageResource extends Resource
{
    protected static ?string $model = Sondage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('id')
                ->searchable(),
            Tables\Columns\TextColumn::make('utilisateur_id')
                ->searchable(),
            Tables\Columns\TextColumn::make('titre')
                ->searchable(),
            Tables\Columns\TextColumn::make('contenu.question')
                ->searchable(),
            ])

            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSondages::route('/'),
            'create' => Pages\CreateSondage::route('/create'),
            'edit' => Pages\EditSondage::route('/{record}/edit'),
        ];
    }
}
