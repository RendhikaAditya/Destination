<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Visitor;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VisitorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VisitorResource\RelationManagers;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([                            
                        TextInput::make('name')->label('Name'),
                        TextInput::make('address')->label('Address'),
                        TextInput::make('email')->label('Email'),
                        TextInput::make('password')->password()->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                    ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            PicturesRelationManager::class,
            DestinationFacilitiesRelationManager::class
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('address')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    // public static function getRelations(): array
    // {
    //     return [
    //         //
    //     ];
    // }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitors::route('/'),
            'create' => Pages\CreateVisitor::route('/create'),
            'edit' => Pages\EditVisitor::route('/{record}/edit'),
        ];
    }    
}
