<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Edit admin Profile
     */
    public function profileEdit()
    {
        $profile = Profile::find(1);
        $user = User::find(1);

        return view('admin.profile.edit_profile', compact(['profile', 'user']));
    }


    /**
     * Store admin Profile data
     */
    public function profileStore(Request $request)
    {
//        return $request->all();
        $profile = Profile::find(1);
        if (!empty($profile)){
            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'gst' => $request->gst,
                'address' => $request->address,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'invoice_note' => $request->invoice_note,
                'quotation_note' => $request->quotation_note,
                'challan_note' => $request->challan_note,
                'logo' => $request->logo,
            ]);
            if($request->hasFile('logo')) {
                $img = $request->file('logo');
                $extension = $img->getClientOriginalExtension();
                $fileName = 'logo'.date('his').rand().".".$extension;
                $img->move(public_path('images/logo/'), $fileName);
                $profile->logo = $fileName;
                $profile->update();
            }
        }else{
            $new_profile = Profile::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'gst' => $request->gst,
                'address' => $request->address,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'invoice_note' => $request->invoice_note,
                'quotation_note' => $request->quotation_note,
                'challan_note' => $request->challan_note,
            ]);
            if($request->hasFile('logo')) {
                $img = $request->file('logo');
                $extension = $img->getClientOriginalExtension();
                $fileName = 'logo'.date('his').rand().".".$extension;
                $img->move(public_path('images/logo/'), $fileName);
                $new_profile->logo = $fileName;
                $new_profile->update();
            }
        }
        $user = User::find(1);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->to('/dashboard')->with('success', "Profile Updated Successfully");
    }
}
