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
        'repayment_expiry_date',  //repayment expiry date    /on
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
            $expiredDates[] = '<span class="badge badge-danger">Scadenza minima attività</span>';
        }
        if (Carbon::parse($this->release_test_deadline)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza del test di rilascio</span>';
        }
        if (Carbon::parse($this->insurance_expiration)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza dell assicurazione</span>';
        }
        if (Carbon::parse($this->medical_examination_deadline)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza visita medica</span>';
        }
        if (!empty($this->repayment_expiry_date) && Carbon::parse($this->repayment_expiry_date)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Scadenza Del Rimborso Di Emergenza</span>';
        }
        if (!empty($this->ip_expiryDate) && Carbon::parse($this->ip_expiryDate)->isPast()) {
            $expiredDates[] = '<span class="badge badge-danger">Data scadenza IP</span>';
        }
        if (empty($expiredDates)) {
            return '<span class="badge badge-success">Not Expired</span>';
        } else {
            return implode(' ', $expiredDates);
        }
    }


    public function expiredSevenDays()
    {
        $expiredDays = [];
        $minimumActivity = Carbon::parse($this->minimum_activity_deadline);
        $releaseTestDeadline = Carbon::parse($this->release_test_deadline);
        $insuranceExpiration = Carbon::parse($this->insurance_expiration);
        $medicalExamination = Carbon::parse($this->medical_examination_deadline);
        $repaymentExpiry = Carbon::parse($this->repayment_expiry_date);
        $ipExpiry = Carbon::parse($this->ip_expiryDate);

        if ($minimumActivity->isPast()) {
            $expiredDays['minimum_activity_deadline'] = $minimumActivity->diffInDays(Carbon::now());
        }
        if ($releaseTestDeadline->isPast()) {
            $expiredDays['release_test_deadline'] = $releaseTestDeadline->diffInDays(Carbon::now());
        }
        if ($insuranceExpiration->isPast()) {
            $expiredDays['insurance_expiration'] = $insuranceExpiration->diffInDays(Carbon::now());
        }
        if ($medicalExamination->isPast()) {
            $expiredDays['medical_examination_deadline'] = $medicalExamination->diffInDays(Carbon::now());
        }
        if ($repaymentExpiry->isPast()) {
            $expiredDays['repayment_expiry_date'] = $repaymentExpiry->diffInDays(Carbon::now());
        }
        if ($ipExpiry->isPast()) {
            $expiredDays['ip_expiryDate'] = $ipExpiry->diffInDays(Carbon::now());
        }

        return $expiredDays;
    }


//    public function expiredSevenDays()
//    {
//        $expiredDays = [];
//        $minimumActivity = Carbon::parse($this->minimum_activity_deadline);
//        $releaseTestDeadline = Carbon::parse($this->release_test_deadline);
//        $insuranceExpiration = Carbon::parse($this->insurance_expiration);
//        $medicalExamination = Carbon::parse($this->medical_examination_deadline);
//        $repaymentExpiry = Carbon::parse($this->repayment_expiry_date);
//        $ipExpiry = Carbon::parse($this->ip_expiryDate);
//
//        if ($minimumActivity->isPast() && $minimumActivity->diffInDays(Carbon::now()) >= 7) {
//            $expiredDays[] = '<span class="badge badge-danger">Scadenza minima attività</span>';
//        }
//        if ($releaseTestDeadline->isPast() && $releaseTestDeadline->diffInDays(Carbon::now()) >= 7) {
//            $expiredDays[] = '<span class="badge badge-danger">Scadenza del test di rilascio</span>';
//        }
//        if ($insuranceExpiration->isPast() && $insuranceExpiration->diffInDays(Carbon::now()) >= 7) {
//            $expiredDays[] = '<span class="badge badge-danger">Scadenza dell assicurazione</span>';
//        }
//        if ($medicalExamination->isPast() && $medicalExamination->diffInDays(Carbon::now()) >= 7) {
//            $expiredDays[] = '<span class="badge badge-danger">Scadenza visita medica</span>';
//        }
//        if ($repaymentExpiry->isPast() && $repaymentExpiry->diffInDays(Carbon::now()) >= 7) {
//            $expiredDays[] = '<span class="badge badge-danger">Scadenza Del Rimborso Di Emergenza</span>';
//        }
//        if ($ipExpiry->isPast() && $ipExpiry->diffInDays(Carbon::now()) >= 7) {
//            $expiredDays[] = '<span class="badge badge-danger">Data scadenza IP</span>';
//        }
//        else {
//            return implode(' ', $expiredDays);
//        }
//
//    }


}
