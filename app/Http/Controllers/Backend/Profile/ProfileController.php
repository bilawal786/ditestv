<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user();
        return view('backend.profile.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_imgae=$request->user_image;


        if(!empty($user_imgae)){
            $destinationPath = 'images/profile/';
            $user_imgae_originalFile = $user_imgae->getClientOriginalName();
            $user_imgae_filename = strtotime("now").'-'.$user_imgae_originalFile;
            $user_imgae->move($destinationPath, $user_imgae_filename);
            $user_img = $destinationPath.$user_imgae_filename;
        }else{
            $user_img=null;
        }
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $input = $request->all();
        User::where('id', Auth::user()->id)->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'user_image'=>$user_img ?? '/images/profile/user.png',
        ]);
        $notification = array(
            'messege' => 'User successfully Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
