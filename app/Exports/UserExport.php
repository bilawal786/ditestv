<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
    public function view(): View
    {
        $users = User::where('role', 1)->get();
        return view('backend.users.usersexport', compact('users'));
    }

}
