<?php

namespace App\Models;

use App\Models\Admin\Organizations;
use App\Models\Seller\Product;
use App\Models\Seller\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\District
 *
 * @property int $id
 * @property int $division_id
 * @property string $name
 * @property string|null $bn_name
 * @property string|null $lat
 * @property string|null $lon
 * @property string|null $url
 * @property-read int|null $products_count
 * @property-read int|null $services_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division $division
 * @property-read \Illuminate\Database\Eloquent\Collection|Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|Service[] $services
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Upazila[] $upazila
 * @property-read int|null $upazila_count
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereBnName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereProductsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereServicesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUrl($value)
 * @mixin \Eloquent
 */
class District extends Model
{
    use HasFactory;

    protected $fillable=['products_count','services_count'];

//    protected $appends = ['total_products', 'total_services'];

    public function upazila()
    {
        return $this->hasMany(Upazila::class, 'district_id');
    }
    public function division()
    {
        return $this->belongsTo(Division::class, 'divison_id');
    }
//    public function getTotalProductsAttribute()
//    {
//        return $this->products->count();
//    }
//    public function getTotalServicesAttribute()
//    {
//        return $this->services->count();
//    }
    public function products()
    {
        return $this->hasMany(Product::class,'district_id');
    }
    public function services()
    {
        return $this->hasManyThrough(Service::class, Organizations::class,'district_id','organization_id','id','id');
    }

    public function activeProducts(){
        return $this->hasMany(Product::class,'district_id')->active();
    }
    public function activeServices(){
        return $this->hasMany(Service::class,'district_id')->active();
    }
}