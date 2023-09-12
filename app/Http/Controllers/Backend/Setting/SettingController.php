<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Settings::first();
        return view('backend.settings.edit', compact('data'));
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
        //
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

        $logo1=$request->logo1;
        $logo2=$request->logo2;

        if(!empty($logo1)){
            $destinationPath = 'images/';
            $logo1_originalFile = $logo1->getClientOriginalName();
            $logo1_filename = strtotime("now").'-'.$logo1_originalFile;
            $logo1->move($destinationPath, $logo1_filename);
            $logo1_img = $destinationPath.$logo1_filename;
        }else{
            $logo1_img=null;
        }
        if(!empty($logo2)){
            $destinationPath = 'images/';
            $logo2_originalFile = $logo2->getClientOriginalName();
            $logo2_filename = strtotime("now").'-'.$logo2_originalFile;
            $logo2->move($destinationPath, $logo2_filename);
            $logo2_img = $destinationPath.$logo2_filename;
        }else{
            $logo2_img=null;
        }
        $data = Settings::find(1);
        $setting = Settings::where('id', 1)->update([
            'logo1' => $logo1_img ?? $data->logo1,
            'logo2' => $logo2_img ?? $data->logo2,
            'title' => $request->title ?? $data->logo2,
            'name' => $request->name ?? $data->logo2,
            'email' => $request->email ?? $data->email,
        ]);

        $notification = array(
            'messege' => 'Role created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('settings.index')
            ->with($notification);
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
