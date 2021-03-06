<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    protected $fillable = ['name', 'description', 'category_id', 'iframe', 'image', 'user_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate'   => 'true'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGetExcerptAttribute()
    {
        return substr($this->description, 0, 140);
    }

    public function getGetImageAttribute()
    {
        if ($this->image) {
            return url("storage/$this->image");
        }
    }
}
