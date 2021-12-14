<?php

namespace App\Models;

use App\Models\Admin\Organizations;
use App\Models\Seller\Product;
use App\Models\Seller\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Upazila
 *
 * @property int $id
 * @property int $district_id
 * @property string $name
 * @property string|null $bn_name
 * @property string|null $url
 * @property-read int|null $products_count
 * @property-read int|null $services_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\District $district
 * @property-read \Illuminate\Database\Eloquent\Collection|Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|Service[] $services
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereBnName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereProductsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereServicesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereUrl($value)
 * @mixin \Eloquent
 */
class Upazila extends Model
{
    use HasFactory;

//    protected $appends = ['total_products', 'total_services'];

    protected $fillable=['products_count','services_count'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

//    public function getTotalProductsAttribute()
//    {
//        return $this->products()->count();
//    }

    public function products()
    {
        return $this->hasMany(Product::class,'upazila_id');
    }

//    public function getTotalServicesAttribute()
//    {
//        return $this->services()->count();
//    }

    public function services()
    {
        return $this->hasManyThrough(Service::class, Organizations::class, 'upazila_id', 'organization_id', 'id', 'id');
    }

    public function activeProducts(){
        return $this->hasMany(Product::class,'upazila_id')->active();
    }
    public function activeServices(){
        return $this->hasMany(Service::class,'upazila_id')->active();
    }


}