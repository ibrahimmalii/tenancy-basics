<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends \Stancl\Tenancy\Database\Models\Domain
{
    use HasFactory;

    protected static function booted()
    {
        parent::booted();

//        static::creating(function($value) {
//            $value->domain =  $value->domain . '.' . config('tenancy.central_domains')[0];
//        });
    }
}
