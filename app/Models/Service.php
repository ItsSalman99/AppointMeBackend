<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function provider()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function types()
    {
        return $this->hasMany(ProviderServiceType::class, 'service_id', 'id');
    }

}
