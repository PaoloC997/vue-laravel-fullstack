<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegetables extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'price_usd', 'price_nok', 'type'];
}
