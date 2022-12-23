<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'brand_id',
        'pickup_point_id',
        'name',
        'code',
        'unit',
        'tags',
        'color',
        'size',
        'video',
        'purchase_price',
        'selling_price',
        'discount_price',
        'stock_quantity',
        'warehouse',
        'description',
        'thumbnail',
        'images',
        'featured',
        'today_deal',
        'status',
        'admin_id',
        'flash_deal_id',
        'cash_on_delivery',
    ];

        // for show childcategory and subcategory under category
        public function Category()
        {
         return $this->belongsTo(Category::class, 'category_id', 'id');
        }
        public function Subcategory()
        {
         return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
        }
        public function Childcategory()
        {
         return $this->belongsTo(Childcategory::class, 'childcategory_id', 'id');
        }
        public function Brandcategory()
        {
         return $this->belongsTo(Brand::class, 'brand_id', 'id');
        }
        public function Pickup()
        {
         return $this->belongsTo(Pickup::class, 'pickup_point_id', 'id');
        }
}
