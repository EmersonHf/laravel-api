<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Invoice extends Model
{
    use HasApiTokens,HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
