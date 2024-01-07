<?php

namespace App\Models;

use App\Models\City;
use App\Models\Category;
use App\Models\DestinationFacility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

        protected $fillable = ['name', 'description', 'address', 'city_id', 'category_id'];
    
        public function city()
        {
            return $this->belongsTo(City::class);
        }
    
        public function category()
        {
            return $this->belongsTo(Category::class);
        }

        protected $with = ['pictures'];
        public function pictures()
        {
            return $this->hasMany(Picture::class);
        }  
        public function destination_facilities()
        {
            return $this->hasMany(DestinationFacility::class);
        }    
}
