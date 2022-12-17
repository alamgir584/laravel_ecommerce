<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcategory_name',
        'subcategory_slug',
        'category_id',

    ];

    // for category show in subcategory
    public function Category()
   {
    return $this->belongsTo(Category::class, 'category_id', 'id');
   }
}
