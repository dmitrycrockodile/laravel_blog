<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Ручное связыванние модели с категорией (происходит и так автоматически при правильных наименованиях)
    protected $table = 'categories';
    protected $guarded = false;

    public function posts() {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
