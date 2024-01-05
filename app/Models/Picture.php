<?php

namespace App\Models;
use Illuminate\Support\Str;
use Filament\Resources\Forms\HasForm;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Resources\Resource;
use Filament\Resources\Tables\Columns\TextColumn;

use Filament\Resources\Forms\Components\TextInput;
use Filament\Resources\Forms\Components\FileUpload;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Filament\Resources\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Forms\Components\Concerns\InteractsWithFetchFile;
use Filament\Resources\Forms\Components\Concerns\InteractsWithUploadedFiles;

class Picture extends Model
{

    protected $fillable = ['name', 'destination_id'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}