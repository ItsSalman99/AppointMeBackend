<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFavouriteProvider extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id', 'id');
    }

}
