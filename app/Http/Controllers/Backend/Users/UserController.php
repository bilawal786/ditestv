<?php

namespace App\Http\Controllers\Backend\Users;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use App\Jobs\SendEmailJob;
use App\Mail\SendEmailTest;
use Illuminate\Support\Facades\Mail;

//use DataTables;
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
//            return DataTables::of($data)
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
                           <button type="submit" class="btn btn-danger btn-sm js-sweetalert" onclick="return confirm(\'Are You Sure You want To Delete? \')" title="Delete">
                            <i class="fa fa-trash-o"></i>
                            </button>
                        </form>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
//                    return $row->showExpiredDate() == 'expired' ? '<span class="badge badge-danger">Expired</span>': '';
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
                'license_number' => 'required',
                'released_on' => 'required',
                'release_test_deadline' => 'required',
                'minimum_activity_deadline' => 'required',
                'insurance_company' => 'required',
                'insurance_expiration' => 'required',
                'medical_examination_deadline' => 'required',
                'expiry_date' => 'required',
                'emergency_contact' => 'required',
                'degree_of_contact' => 'required',
            ]
        );
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $request->request->add(['user_image' => '/images/profile/user.png']);
        $user->phone_number = $request->phone_number;
        $user->resident = $request->resident;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;
        $user->village = $request->village;
        $user->d_o_b = $request->d_o_b;
        $user->birth_place = $request->birth_place;
        $user->license_number = $request->license_number;
        $user->released_on = $request->released_on;
        $user->release_test_deadline = $request->release_test_deadline;
        $user->minimum_activity_deadline = $request->minimum_activity_deadline;
        $user->insurance_company = $request->insurance_company;
        $user->insurance_expiration = $request->insurance_expiration;
        $user->medical_examination_deadline = $request->medical_examination_deadline;
        $user->expiry_date = $request->expiry_date;
        $user->emergency_contact = $request->emergency_contact;
        $user->degree_of_contact = $request->degree_of_contact;
        $user->password = $request->password ?? '123456700';
        $user->role = $request->role ?? '1';
        $user->student = $request->student ? 'yes' : 'no';
        $user->own_material = $request->own_material ? 'yes' : 'no';
        $user->save();
        $notification = array(
            'messege' => 'User successfully Created',
            'alert-type' => 'success'
        );
        return Redirect()->route('users.index')->with($notification);
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
        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->resident = $request->resident;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;
        $user->village = $request->village;
        $user->d_o_b = $request->d_o_b;
        $user->birth_place = $request->birth_place;
        $user->license_number = $request->license_number;
        $user->released_on = $request->released_on;
        $user->release_test_deadline = $request->release_test_deadline;
        $user->minimum_activity_deadline = $request->minimum_activity_deadline;
        $user->insurance_company = $request->insurance_company;
        $user->insurance_expiration = $request->insurance_expiration;
        $user->medical_examination_deadline = $request->medical_examination_deadline;
        $user->expiry_date = $request->expiry_date;
        $user->emergency_contact = $request->emergency_contact;
        $user->degree_of_contact = $request->degree_of_contact;
        $user->password = $request->password ?? '123456700';
        $user->role = $request->role ?? '1';
        $user->student = $request->student ? 'yes' : 'no';
        $user->own_material = $request->own_material ? 'yes' : 'no';
        $user->update();
        $notification = array(
            'messege' => 'User successfully updated',
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
            'messege' => 'User successfully delete',
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
            $releaseTestDeadline = Carbon::parse($user->release_test_deadline);

            if ($today->diffInMonths($releaseTestDeadline) == 1) {
                dispatch(new SendEmailJob($user, 'release_test_deadline'));
            }
        }
        return redirect()->back();
    }

    public function minimum_activity_deadline()
    {
        $users = User::where('role', 1)->get();
        $today = now();
        foreach ($users as $user) {
            $releaseTestDeadline = Carbon::parse($user->minimum_activity_deadline);

            if ($today->diffInMonths($releaseTestDeadline) == 1) {
                dispatch(new SendEmailJob($user, 'minimum_activity_deadline'));
            }
        }

        return redirect()->back();
    }

    public function insurance_expiration()
    {
        $users = User::where('role', 1)->get();
        $today = now();
        foreach ($users as $user) {
            $releaseTestDeadline = Carbon::parse($user->insurance_expiration);

            if ($today->diffInMonths($releaseTestDeadline) == 1) {
                dispatch(new SendEmailJob($user, 'insurance_expiration'));
            }
        }
        return redirect()->back();
    }

    public function medical_examination_deadline()
    {
        $users = User::where('role', 1)->get();
        $today = now();
        foreach ($users as $user) {
            $releaseTestDeadline = Carbon::parse($user->medical_examination_deadline);
            if ($today->diffInMonths($releaseTestDeadline) == 1) {
                dispatch(new SendEmailJob($user, 'medical_examination_deadline'));
            }
        }
        return redirect()->back();
    }

    public function expiry_date()
    {
        $users = User::all();
        $today = now();
        foreach ($users as $user) {
            $releaseTestDeadline = Carbon::parse($user->expiry_date);
            if ($today->diffInMonths($releaseTestDeadline) == 1) {
                dispatch(new SendEmailJob($user, 'expiry_date'));
            }
        }
        return redirect()->back();
    }

}
