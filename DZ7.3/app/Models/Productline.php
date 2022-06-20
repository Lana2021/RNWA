<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productline extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'productLine',
        'textDescription'
    ];

    public $timestamps = false;
    protected $primaryKey = 'productLine';
    public $incrementing = false;
    
}
