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
        $today = Carbon::now()->addDays(30)->format('Y-m-d');
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->release_test_deadline)->format('Y-m-d');
                if ($user->release_test_deadline !== $user->release_test_deadline_status) {
                    if ($today == $releaseTestDeadline) {
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
        $today = Carbon::now()->addDays(30)->format('Y-m-d');
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->minimum_activity_deadline)->format('Y-m-d');
                if ($user->minimum_activity_deadline !== $user->minimum_activity_deadline_status) {
                    if ($today == $releaseTestDeadline) {
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
        $today = Carbon::now()->addDays(30)->format('Y-m-d');
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->insurance_expiration)->format('Y-m-d');
                if ($user->insurance_expiration !== $user->insurance_expiration_status) {
                    if ($today == $releaseTestDeadline) {
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
        $today = Carbon::now()->addDays(30)->format('Y-m-d');
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->medical_examination_deadline)->format('Y-m-d');
                if ($user->medical_examination_deadline !== $user->medical_examination_deadline_status) {
                    if ($today == $releaseTestDeadline) {
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
        $today = Carbon::now()->addDays(30)->format('Y-m-d');
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->repayment_expiry_date)->format('Y-m-d');
                if ($user->repayment_expiry_date !== $user->expiry_date_status) {
                    if ($today == $releaseTestDeadline) {
                        dispatch(new SendEmailJob($user, 'expiry_date'))->delay(10);
                        $user->expiry_date_status = $user->repayment_expiry_date;
                        $user->update();
                    }
                }
            }
        }
    }

    public function ip_expiryDate()
    {
        $users = User::where('role', 1)->get();
        $today = Carbon::now()->addDays(30)->format('Y-m-d');
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->ip_expiryDate)->format('Y-m-d');
                if ($user->ip_expiryDate !== $user->ip_expiryDate) {
                    if ($today == $releaseTestDeadline) {
                        dispatch(new SendEmailJob($user, 'ip_expiryDate'))->delay(10);
                        $user->expiry_date_status = $user->ip_expiryDate;
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
        $this->ip_expiryDate();
        $this->expiry_date();
        return redirect()->back();
    }
}
