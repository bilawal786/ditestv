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
        'emergency_phone_number',
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
        'expiry_date',  //repayment expiry date    /on
        'emergency_contact',  //
        'degree_of_contact',
        'role',
        'password',
        'user_image',
        'send_auto_email',
        'release_test_deadline_status',
        'minimum_activity_deadline_status',
        'insurance_company_status',
        'insurance_expiration_status',
        'medical_examination_deadline_status',
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
        $expiredDates = [];

        if (Carbon::parse($this->minimum_activity_deadline)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza minima attività</span><br> <br>';
        }

        if (Carbon::parse($this->release_test_deadline)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza del test di rilascio</span><br> <br>';
        }

        if (Carbon::parse($this->insurance_expiration)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza dell assicurazione</span><br> <br>';
        }
        if (Carbon::parse($this->medical_examination_deadline)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza visita medica</span><br> <br>';
        }
        if (!empty($this->expiry_date) && Carbon::parse($this->expiry_date)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza Del Rimborso Di Emergenza</span><br> <br>';
        }
//        if (!empty($this->emergency_contact) && Carbon::parse($this->emergency_contact)->isPast()) {
//            $expiredDates[] = '<span class="badge badge-danger">RIMBORSO DI EMERGENZA</span><br> <br>';
//        }
        if (empty($expiredDates)) {
            return '<span class="badge badge-success">Not Expired</span>';
        } else {
            return implode(' ', $expiredDates);
        }
    }


}
