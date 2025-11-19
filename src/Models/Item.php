<?php

namespace NazrulCrud\Crud\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'price' => 'decimal:2'
    ];
}