<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataExport implements FromView
{
    public function view(): View
    {
        $users = User::where('role', 1)->get();
        $expiredUsers = [];
        foreach ($users as $user) {
            if ($user->showExpiredDate() !== '<span class="badge badge-success">Not Expired</span>') {
                $expiredUsers[] = $user;
            }
        }
        return view('backend.users.expiredusers', compact('expiredUsers'));
    }

}
