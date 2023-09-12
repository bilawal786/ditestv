<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'conformPassword' => 'required_with:newPassword|same:newPassword',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldPassword , $hashedPassword )) {
            if (!Hash::check($request->newPassword , $hashedPassword)) {
                $users =User::find(Auth::user()->id);
                $users->password = bcrypt($request->newPassword);
                User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
                $notification = array(
                    'messege' => 'password updated successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }
            else{
                $notification = array(
                    'messege' => 'new password can not be the old password!',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        }
        else{
            $notification = array(
                'messege' => 'old password doesnt matched',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

}
