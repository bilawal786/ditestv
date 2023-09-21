<?php

namespace App\Http\Controllers\Backend\Users;

use App\Exports\UserExport;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use PDF;
use App\Jobs\SendEmailJob;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;
use App\Mail\SendEmailTest;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::Where('role', 1);
            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $i = 1;
                    return $i++;
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('users.edit', [$row->id]) . '">
                            <button class="btn btn-default btn-sm "><i class="fa fa-edit"></i></button>
                        </a>
                        <a href="' . route('users.show', [$row->id]) . '">
                            <button class="btn btn-primary btn-sm " title="View Bidding"><i class="fa fa-eye"></i></button>
                        </a>
                        <form class="inlineblock" action="' . route('users.destroy', [$row->id]) . '" method="POST">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                           <button type="submit" class="btn btn-danger btn-sm js-sweetalert" onclick="return confirm(\'Sei Sicuro Di Voler Eliminare? \')" title="Delete">
                            <i class="fa fa-trash-o"></i>
                            </button>
                        </form>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    return $row->showExpiredDate();
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'unique:users|required',
                'phone_number' => 'required',
                'resident' => 'required',
                'city' => 'required',
                'province' => 'required',
                'postal_code' => 'required',
                'village' => 'required',
                'd_o_b' => 'required',
                'birth_place' => 'required',
//                'license_number' => 'required',
//                'released_on' => 'required',
                'release_test_deadline' => 'required',
                'minimum_activity_deadline' => 'required',
                'insurance_company' => 'required',
                'insurance_expiration' => 'required',
                'medical_examination_deadline' => 'required',
                'degree_of_contact' => 'required',
            ]
        );
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $request->request->add(['user_image' => '/images/profile/user.png']);
        $user->phone_number = $request->phone_number;
        $user->emergency_phone_number = $request->emergency_phone_number;
        $user->resident = $request->resident;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;
        $user->village = $request->village;
        $user->d_o_b = $request->d_o_b;
        $user->birth_place = $request->birth_place;
        $user->release_test_deadline = $request->release_test_deadline;
        $user->minimum_activity_deadline = $request->minimum_activity_deadline;
        $user->insurance_company = $request->insurance_company;
        $user->insurance_expiration = $request->insurance_expiration;
        $user->medical_examination_deadline = $request->medical_examination_deadline;
        $user->student = $request->student ? 'yes' : 'no';
        $user->own_material = $request->own_material ? 'yes' : 'no';
        if ($user->own_material == 'yes') {
            $user->expiry_date = $request->expiry_date;
        } else {
            $user->emergency_contact = $request->emergency_contact;
            $user->expiry_date = '';
        }
        if ($user->student == 'yes') {
            $user->released_on = '';
            $user->license_number = '';
        } else {
            $user->released_on = $request->released_on;
            $user->license_number = $request->license_number;

        }

        $user->send_auto_email = $request->send_auto_email ? 'yes' : 'no';
        $user->degree_of_contact = $request->degree_of_contact;
        $user->password = $request->password ?? '123456700';
        $user->role = $request->role ?? '1';
        $user->save();
        $notification = array(
            'messege' => 'Utente Creato Con Successo',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'unique:users,email,' . $id . ',id|required',
        ]);
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->emergency_phone_number = $request->emergency_phone_number;
        $user->resident = $request->resident;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;
        $user->village = $request->village;
        $user->d_o_b = $request->d_o_b;
        $user->birth_place = $request->birth_place;
        $user->release_test_deadline = $request->release_test_deadline;
        $user->minimum_activity_deadline = $request->minimum_activity_deadline;
        $user->insurance_company = $request->insurance_company;
        $user->insurance_expiration = $request->insurance_expiration;
        $user->medical_examination_deadline = $request->medical_examination_deadline;
        $user->own_material = $request->own_material ? 'yes' : 'no';
        if ($user->own_material == 'yes') {
            $user->expiry_date = $request->expiry_date;
        } else {
            $user->emergency_contact = $request->emergency_contact;
            $user->expiry_date = '';
        }
        $user->degree_of_contact = $request->degree_of_contact;
        $user->password = $request->password ?? '123456700';
        $user->role = $request->role ?? '1';
        $user->student = $request->student ? 'yes' : 'no';
        if ($user->student == 'yes') {
            $user->released_on = '';
            $user->license_number = '';
        } else {
            $user->released_on = $request->released_on;
            $user->license_number = $request->license_number;

        }
        $user->send_auto_email = $request->send_auto_email ? 'yes' : 'no';
        $user->update();
        $notification = array(
            'messege' => 'Utente Aggiornato Con Successo',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        $notification = array(
            'messege' => 'Utente Eliminato Con Successo',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')
            ->with($notification);
    }


    public function release_test_deadline_send_email()
    {
        $users = User::where('role', 1)->get();
        $today = now();
        foreach ($users as $user) {
            if ($user->send_auto_email == 'yes') {
                $releaseTestDeadline = Carbon::parse($user->release_test_deadline);
                if ($user->release_test_deadline !== $user->release_test_deadline_status) {
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
                if ($user->minimum_activity_deadline !== $user->minimum_activity_deadline_status) {
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
                if ($user->insurance_expiration !== $user->insurance_expiration_status) {
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
                if ($user->medical_examination_deadline !== $user->medical_examination_deadline_status) {
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
                if ($user->expiry_date !== $user->expiry_date_status) {
                    if ($today->diffInMonths($releaseTestDeadline) == 1) {
                        dispatch(new SendEmailJob($user, 'expiry_date'))->delay(10);
                        $user->insurance_company_status = $user->expiry_date;
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

    public function export()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function expiredUser()
    {
        return Excel::download(new DataExport, 'expiredusers.xlsx');
    }

    public function userPdf()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
        ];

        $pdf = PDF::loadView('backend.users.usersPdf', $data)->setOptions(['defaultFont' => 'sans-serif']);

//        return view('backend.users.usersPdf');
        return $pdf->download('users.pdf');
    }

}
