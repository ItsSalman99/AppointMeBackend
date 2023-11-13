<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function business_sub_sector()
    {
        return $this->belongsTo(BusinessSubSector::class, 'sub_sector_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'user_id', 'id');
    }

    public function provider_schedule()
    {
        return $this->hasMany(ProviderSchedule::class, 'user_id', 'id');
    }

    public function customer_bookings()
    {
        return $this->hasMany(ServiceBooking::class, 'user_id', 'id');
    }

    public function provider_bookings()
    {
        return $this->hasMany(ServiceBooking::class, 'provider_id', 'id');
    }

    public function customer_addresses()
    {
        return $this->hasMany(CustomerAddress::class, 'user_id', 'id');
    }

}
