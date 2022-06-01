<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
class Order extends Model
{
    use HasFactory;

    protected  $fillable = [
        'full_name','address','phone','user_id','product_id','quantity','status',"price"
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
