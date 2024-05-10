<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentProduct extends Model
{
    protected $table = 'payment_products';

    protected $guarded = [];

    public static function generalColumns(): array
    {
        return [ 'id', 'name', 'code', 'logo' ];
    }

    public static function relationalColumns(): string
    {
        return 'id,name,code,logo' ;
    }
}
