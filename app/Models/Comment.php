<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'product_id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function getGetAuthorAttribute()
    {
        $user = User::find($this->user_id);
        return $user;
    }
}
