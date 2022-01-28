<?php

namespace App\Laravel\Controllers\System;
use Illuminate\Http\Request;

//Models
use App\Laravel\Models\{Question,Clinic,Personel,User};
use App\Laravel\Requests\PageRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{

    protected $data;
	protected $per_page;

	public function __construct(){
		parent::__construct();
		// array_merge($this->data, parent::get_data());

		$this->data['page_title'] = " :: MY PROFILE";
		$this->per_page = env("DEFAULT_PER_PAGE",10);
	}
    public function index(){
        $this->data['data'] =  User::first();
        $this->data['page_title'] = "My Profile";
        return view('system.profile.index',$this->data);
    }

    public function update(Request $request , $id ){
        $validator =Validator::make($request->all(),[
            'username' => 'required',
            'email' => 'required|email',
            'password' => [
                'nullable',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
         ]);
         
         if ($validator->fails()) {
            session()->flash('notification-status', "failed");
			session()->flash('notification-message', "Server Error: Code # {$validator->errors()->first()}");
			return redirect()->back()->withErrors($validator);
            // return response()->json(['status' => false, 'msg'=>$validator->errors()]);
         }else{
            try {
                if(!empty($request->password))
                {
                    $data = [
                        'username' => $request->username,
                        'email'  =>  $request->email,
                        'password' => Hash::make($request->password),
        
                     ];
                     goto callback;
                }
                else 
                {
                    $data = [
                        'username' => $request->username,
                        'email'  =>  $request->email,
                    
        
                     ];
                     goto callback;
                }
             
         
                 callback:
                User::where('id', $id)->update($data);
             } catch (\Throwable $th) {

                session()->flash('notification-status', "failed");
                session()->flash('notification-message', "Server Error: Code #{$th}");
                return redirect()->back()->withErrors($validator);
       
             }

             session()->flash('notification-message', "Profile was successfully created.");
             session()->flash('notification-status', "success");
             return redirect()->route('system.profile.index');
         }


    }

}