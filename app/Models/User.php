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
use Illuminate\Support\Facades\Crypt;


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
        'repayment_expiry_date',
        'own_material',//checkbox
        //repayment expiry date    /on
        'degree_of_contact',
        'role',
        'password',
        'user_image',
        'send_auto_email',
        'release_test_deadline_status',
        'minimum_activity_deadline_status',
        'expiry_date_status',
        'insurance_expiration_status',
        'medical_examination_deadline_status',

        //new fields add
        'qualification',
        'dl',
        'ip',
        'ip_tandem',
        'ip_aff',
        'ips',
        'ipe',
        'dl_releaseDate',
        'ip_expiryDate',
        'tandem_release_date',
        'ip_aff_release_date',
        'ips_release_date',
        'ipe_release_date',

    ];


    protected $dates = [
        'release_test_deadline',
        'minimum_activity_deadline',
        'insurance_expiration',
        'medical_examination_deadline',
        'repayment_expiry_date',
        'ip_expiryDate',

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
            $expiredDates[] = '<span class="badge badge-danger mb-1">Scadenza minima attività</span><br>';
        }
        if (Carbon::parse($this->release_test_deadline)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger mb-1">Scadenza del test di rilascio</span><br>';
        }
        if (Carbon::parse($this->insurance_expiration)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger mb-1">Scadenza dell assicurazione</span><br>';
        }
        if (Carbon::parse($this->medical_examination_deadline)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger mb-1">Scadenza visita medica</span><br>';
        }

        if (!empty($this->repayment_expiry_date) && Carbon::parse($this->repayment_expiry_date)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger mb-1">Scadenza ripegamento emergenza</span><br>';
        }

        if (!empty($this->ip_expiryDate) && Carbon::parse($this->ip_expiryDate)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza IP</span>';
        }

        if (empty($expiredDates)) {
            return '<span class="badge badge-success">NESSUNA SCADENZA</span>';
        } else {
            return implode(' ', $expiredDates);
        }

    }


    public function isWithinRange($date)
    {
        return $date && $date->lte(Carbon::now()) && $date->gte(Carbon::now()->subDays(8));
    }

}
