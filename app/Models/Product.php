<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public $fillable = [
        'id',
        'title',
        'slug',
        'description',
        'meta_description',
        'category_id',
        'brand_id',
        'featured_image',
        'featured_image_sm',
        'status',
        'is_featured',
    ];

    protected $appends = ['full_featured_image', 'full_featured_image_sm'];

    public function getFullFeaturedImageAttribute()
    {
        return url('/') . '/' . $this->featured_image;
    }

    public function getFullFeaturedImageSmAttribute()
    {
        return url('/') . '/' . $this->featured_image_sm;
    }


    /**
     * getProductList
     *
     * @param integer $paginate
     * @param boolean $checkFeatured
     * @param int $category_id Category ID
     * @param int $brand_id Brand ID
     * @return void
     */
    public static function getProductList($paginate = 20, $checkFeatured = false, $category_id = null, $brand_id = null)
    {
        // $products = Product::where('status', 1)
        //     ->with('category', 'brand', 'inventory)
        //     ->get();
        $url = url('/');
        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.category_id', '=', 'brands.id')
            ->leftJoin('product_inventories', 'products.id', '=', 'product_inventories.product_id')
            ->select(
                'products.id as id',
                'products.title as title',
                'products.slug as slug',
                DB::raw("CONCAT('$url', '/', products.featured_image) AS featured_image"),
                DB::raw("CONCAT('$url', '/', products.featured_image_sm) AS featured_image_sm"),
                'categories.name as category_name',
                'categories.slug as category_slug',
                'brands.name as brand_name',
                'brands.slug as brand_slug',
                DB::raw('(SELECT product_inventories.price  FROM product_inventories WHERE is_active=1 and product_id=products.id limit 1) as price'),
                DB::raw('(SELECT product_inventories.current_stock  FROM product_inventories WHERE is_active=1 and product_id=products.id limit 1) as stock'),
                DB::raw('(SELECT (CASE WHEN (product_inventories.offer_enable = 1) AND (product_inventories.offer_end_date >= CURDATE()) THEN product_inventories.offer_price ELSE null END) FROM product_inventories WHERE is_active=1 and product_id=products.id limit 1) as offer_price'),
            )
            ->where('products.status', 1);

        if ($checkFeatured) {
            $query->where('products.is_featured', 1);
        }
        if (!is_null($category_id)) {
            $query->where('products.category_id', $category_id);
        }
        if (!is_null($brand_id)) {
            $query->where('products.brand_id', $brand_id);
        }

        $products = $query->paginate($paginate);
        return $products;
    }

    public static function generateProductSku($string)
    {

        return str_pad($string, 4, '0', STR_PAD_LEFT);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inventory()
    {
        return $this->hasOne(ProductInventory::class)->where('is_active', 1);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function inventories()
    {
        return $this->hasMany(ProductInventory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function featuredProducts()
    {
        return Product::where('is_featured', 1)->get();
    }
}
