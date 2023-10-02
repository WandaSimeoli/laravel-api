<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'type_id',
        'image'
    ];

    protected $appends = [
        'full_image'
    ];

    public function getFullImageAttribute() {
        if($this->image) {
            return asset('storage/' . $this->image);
        } return null;
      
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
