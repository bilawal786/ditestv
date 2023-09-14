<?php

namespace App\Models;

use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'resident',
        'city',
        'province',
        'postal_code',
        'village',
        'd_o_b',
        'birth_place',
        'student',//checkbox
        'license_number',
        'released_on',
        'release_test_deadline',
        'minimum_activity_deadline',
        'insurance_company',
        'insurance_expiration',
        'medical_examination_deadline',
        'own_material',//checkbox
        'expiry_date',
        'emergency_contact',
        'degree_of_contact',
        'role',
        'password',
        'user_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function showExpiredDate()
    {
        if (Carbon::parse($this->minimum_activity_deadline)->isPast() ||
            Carbon::parse($this->release_test_deadline)->isPast() ||
            Carbon::parse($this->insurance_expiration)->isPast() ||
            Carbon::parse($this->medical_examination_deadline)->isPast() ||
            Carbon::parse($this->expiry_date)->isPast()) {
            return "expired";
        }else{
            return "not expired";
        }
    }

}
