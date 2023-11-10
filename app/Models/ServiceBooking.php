<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    public function service_type()
    {
        return $this->belongsTo(ProviderServiceType::class, 'service_type_id', 'id');
    }
}
