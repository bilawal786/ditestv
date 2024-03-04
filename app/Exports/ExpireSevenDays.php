<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpireSevenDays implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::where('role', 1)->get();
        $expiredDays = [];
        foreach ($users as $user) {
            if ($user->expiredSevenDays() !== '<span class="badge badge-success">Not Expired</span>') {
                $expiredDays[] = $user;
            }
        }
        return view('backend.users.expiredSevenDaysExport', compact('expiredDays'));

    }
}
