<?php

namespace App\Http\Controllers\Testjob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CsvData;
use Auth;
use Hash;
use File;

class MainController extends Controller
{

// ----------------------------------------------------View Login-----------------------------------

    public function viewlogin()
    {
        return view('layouts.login');
    }

// ----------------------------------------------------Login-----------------------------------

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',  
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required', 
        ]);   


        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        }
        else {
            return redirect('/')->with('error','Invalid Credentials');

        }
    }

// ----------------------------------------------------View Signup-----------------------------------

    public function viewsignup()
    {
        return view('layouts.signup');
    }

// ----------------------------------------------------Signup-----------------------------------

    public function signup(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'useremail' => 'required|email',
            'userpassword' => 'required|min:8',  
            'userpasswordconfirm' => 'required|same:userpassword',  
        ], [
            'username.required' => 'Name is required',
            'useremail.required' => 'Email is required',
            'useremail.email' => 'Email is invalid',
            'useremail.unique' => 'This Email is Already Registered',
            'userpassword.required' => 'Password is required',
            'userpassword.min' => 'Password must be 8 Characters Long',
            'userpasswordconfirm.required' => 'Confirm Password is required',
            'userpasswordconfirm.same' => 'Confirm Password must be same as Password' 
        ]);   

        $user = new User;
        $user->name = $request->username;
        $user->email = $request->useremail;
        $user->password = Hash::make($request->userpassword);

        if ( $user->save()) {
            return redirect('/')->with('success','Account Created Successfully');
        } else {
            return redirect('/signup')->with('error','Something Went Wrong');
        }   
    }

// ----------------------------------------------------Logout-----------------------------------
    public function logout(Request $request)
    {
        if (Auth::check()) {
             Auth::logout();
            return redirect('/');
        } else {
            return redirect('/')->with('error','Something Went Wrong');
        }  
    }

// ----------------------------------------------------View Home-----------------------------------

    public function viewhome()
    {
        return view('layouts.home');
    }

    public function uploadcsv(Request $request)
    {

        if ($request->csvfile != null) {
             $csvfile = time().$request->csvfile->getClientOriginalName();
             $request->csvfile->move(storage_path('csvuploads'),$csvfile);

             $file_path = storage_path('csvuploads/'.$csvfile);


              $maindata = [];

             if (($open = fopen(storage_path().'/'.'csvuploads/'.$csvfile,'r')) !== FALSE) {
              
                while (($data = fgetcsv($open)) !== FALSE){
                     $maindata[] = $data;


                 } 
                   fclose($open);
             }

            foreach ($maindata as $key => $datamain) {
               
            $data_to_csv = new CsvData ;
            $data_to_csv->serial_number =  $datamain[0];
            $data_to_csv->tittle =  $datamain[1];
            $data_to_csv->name =  $datamain[2];
            $data_to_csv->save(); 
                
            }

             if(File::exists($file_path)) {
                File::delete($file_path);
                 }

                 return redirect('/home')->with('success','Data Inserted Successfully');

        } else {
            return redirect('/home')->with('error','Something Went Wrong');
        }          
    }



    
}