<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'type_id'  
    ];

    public static function generateSlug($title)
    {
        $slug = Str::slug($title, '-');
        $count = 1;
        while(Project::where('slug', $slug)->first()) {
            $slug = Str::slug($title . '_' . $count, '_');
            $count++;
        }
        return  $slug;
    }


    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}