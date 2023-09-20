<?php

namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Carbon\Carbon;

class EmailService
{

    public function release_test_deadline_send_email()
    {
        $users = User::where('role', 1)->get();
        $today = now();
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->release_test_deadline);
                if ($releaseTestDeadline != $user->release_test_deadline_status) {
                    if ($today->diffInMonths($releaseTestDeadline) == 1) {
                        dispatch(new SendEmailJob($user, 'release_test_deadline'))->delay(10);
                        $user->release_test_deadline_status = $user->release_test_deadline;
                        $user->update();
                    }
                }
            }
        }
    }
    public function minimum_activity_deadline()
    {
        $users = User::where('role', 1)->get();
        $today = now();
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->minimum_activity_deadline);
                if ($releaseTestDeadline != $user->minimum_activity_deadline_status) {
                    if ($today->diffInMonths($releaseTestDeadline) == 1) {
                        dispatch(new SendEmailJob($user, 'minimum_activity_deadline'))->delay(10);
                        $user->minimum_activity_deadline_status = $user->minimum_activity_deadline;
                        $user->update();
                    }
                }
            }
        }
    }

    public function insurance_expiration()
    {
        $users = User::where('role', 1)->get();
        $today = now();
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->insurance_expiration);
                if ($releaseTestDeadline != $user->insurance_expiration_status) {
                    if ($today->diffInMonths($releaseTestDeadline) == 1) {
                        dispatch(new SendEmailJob($user, 'insurance_expiration'))->delay(10);
                        $user->insurance_expiration_status = $user->insurance_expiration;
                        $user->update();
                    }
                }
            }
        }
    }
    public function medical_examination_deadline()
    {
        $users = User::where('role', 1)->get();
        $today = now();
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->medical_examination_deadline);
                if ($releaseTestDeadline != $user->medical_examination_deadline_status) {
                    if ($today->diffInMonths($releaseTestDeadline) == 1) {
                        dispatch(new SendEmailJob($user, 'medical_examination_deadline'))->delay(10);
                        $user->medical_examination_deadline_status = $user->medical_examination_deadline;
                        $user->update();
                    }
                }
            }
        }
    }

    public function expiry_date()
    {
        $users = User::where('role', 1)->get();
        $today = now();
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->expiry_date);
                if ($releaseTestDeadline != $user->expiry_date_status) {
                    if ($today->diffInMonths($releaseTestDeadline) == 1) {
                        dispatch(new SendEmailJob($user, 'expiry_date'))->delay(10);
                        $user->expiry_date_status = $user->expiry_date;
                        $user->update();
                    }
                }
            }
        }
    }
    public function sendAllEmails()
    {
        $this->release_test_deadline_send_email();
        $this->minimum_activity_deadline();
        $this->insurance_expiration();
        $this->medical_examination_deadline();
        $this->expiry_date();
        return redirect()->back();
    }
}
