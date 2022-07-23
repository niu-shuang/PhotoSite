<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $table = 'products';

    protected $fillable = [
        'product_name',
        'thumbnail',
        'start_price',
        'buyout_price',
        'author_name',
        'create_year',
        'size',
        'photographic_paper_type',
        'place',
    ];
}
