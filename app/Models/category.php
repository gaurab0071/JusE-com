<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Assuming your table name is 'categories'

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
