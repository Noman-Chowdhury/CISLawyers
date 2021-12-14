<?php

namespace App\Models;

use App\Models\Admin\Organizations;
use App\Models\Seller\Product;
use App\Models\Seller\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Division
 *
 * @property int $id
 * @property string $name
 * @property string|null $bn_name
 * @property string|null $url
 * @property-read int|null $products_count
 * @property-read int|null $services_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\District[] $district
 * @property-read int|null $district_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Organizations[] $organization
 * @property-read int|null $organization_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|Service[] $services
 * @method static \Illuminate\Database\Eloquent\Builder|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereBnName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereProductsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereServicesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUrl($value)
 * @mixin \Eloquent
 */
class Division extends Model
{
    use HasFactory;

//    protected $appends = ['total_products', 'total_services'];

    protected $fillable=['products_count','services_count'];

    public function district()
    {
        return $this->hasMany(District::class, 'division_id');
    }
    public function organization()
    {
        return $this->hasMany(Organizations::class, 'division_id');
    }
//    public function getTotalProductsAttribute()
//    {
//        return $this->products()->count();
//    }
//    public function getTotalServicesAttribute()
//    {
//        return $this->services()->count();
//    }
    public function products()
    {
        return $this->hasMany(Product::class,'division_id');
    }
    public function services()
    {
        return $this->hasManyThrough(Service::class, Organizations::class,'division_id','organization_id','id','id');
    }
    
    public function activeProducts(){
        return $this->hasMany(Product::class,'division_id')->active();
    }
    public function activeServices(){
        return $this->hasMany(Service::class,'division_id')->active();
    }
}