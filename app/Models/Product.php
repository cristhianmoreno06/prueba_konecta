<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @property integer $id
 * @property string $name_product
 * @property string $reference
 * @property integer $price
 * @property integer $weight
 * @property string $category
 * @property string $stock
 *
 * @method static Builder|Product whereId($value)
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_product',
        'reference',
        'price',
        'weight',
        'category',
        'stock',
    ];
}
