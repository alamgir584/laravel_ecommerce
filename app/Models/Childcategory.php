<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'childcategory_name',
        'childcategory_slug',
        'category_id',
        'subcategory_id',

    ];

    // for category show in subcategory
    public function Category()
   {
    return $this->belongsTo(Category::class, 'category_id', 'id');
   }
   public function Subcategory()
   {
    return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
   }
}
