<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderServiceType extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    
    public function service_type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id', 'id');
    }
    
}
