<?php

namespace App\Filament\Resources\DestinationFacilityResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Facility;


class DestinationFacilitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'destination_facilities';

    protected static ?string $recordTitleAttribute = 'facility_id';

    public static function form(Form $form): Form
    {
        $facilities = Facility::pluck('facility_name', 'id')->toArray();

        return $form
            ->schema([
                Forms\Components\Select::make('facility_id')
                                    ->options($facilities)
                                    ->searchable()
                                    ->placeholder('Pilih fasilitas')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('facility.facility_name', 'Facility')->sortable()->searchable(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
