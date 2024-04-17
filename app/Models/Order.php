<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'mobile_number',
        'delivery_address',
        'city',
        'total',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_descriptions()
    {
        return $this->hasMany(OrderDescription::class);
    }

}
