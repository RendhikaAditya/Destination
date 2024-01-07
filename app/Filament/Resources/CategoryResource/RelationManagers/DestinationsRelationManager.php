<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use App\Models\Picture;
use App\Models\Category;
use App\Models\City;
use App\Models\Facility;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DestinationsRelationManager extends RelationManager
{
    protected static string $relationship = 'destinations';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        $cities = City::pluck('city_name', 'id')->toArray();
        $categories = Category::pluck('category_name', 'id')->toArray();
        $facilities = Facility::pluck('facility_name', 'id')->toArray();

        return $form
            ->schema([
                Grid::make(1)
                    ->schema([                            
                        TextInput::make('name')->label('Name'),
                        RichEditor::make('description')->label('Description'), 
                    ]),
                TextInput::make('address')->label('Address'),
                Select::make('city_id')
                    ->label('City')
                    ->options($cities)
                    ->placeholder('Select a City'),
                Select::make('category_id')
                    ->label('Category')
                    ->options($categories)
                    ->placeholder('Select a Category'),                
                MultiSelect::make('facility_name')
                    ->options($facilities)
                    ->multiple()
                    ->searchable()
                    ->placeholder('Pilih fasilitas'),
                FileUpload::make('pictures')
                    ->label('Upload Pictures')
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->directory('destination-pictures')
                    ->multiple()
                    // ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                    //     $encryptedFileName = uniqid().'.'.$file->getClientOriginalExtension();
                    //     return Picture::create([
                    //         'name' => $encryptedFileName,
                    //         'destination_id' => "1",
                    //     ])->getKey();
                    // }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('address')->sortable()->searchable(),
                TextColumn::make('city.city_name', 'Kota')->sortable()->searchable(),
                TextColumn::make('category.category_name', 'Kategori')->sortable()->searchable(),
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
