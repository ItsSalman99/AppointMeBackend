<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSubSector extends Model
{
    use HasFactory;
    
    public function business_sector()
    {
        return $this->belongsTo(BusinessSector::class, 'sector_id', 'id');
    }
}
