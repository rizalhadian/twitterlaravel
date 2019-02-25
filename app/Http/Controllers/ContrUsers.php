<?php

namespace App\Http\Controllers;

use App\Users;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Image;
use File;

class ContrUsers extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */



    public function create(Request $req){
        $validator = Validator::make($req->all(), [
            'email' => 'required|unique:users|max:100',
            'username' => 'required|unique:users|max:50',
            'password' => 'required|same:retype_password'
        ]);

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
            
        }else{
            $user = new Users;
            $user->email = $req->input('email');
            $user->username = $req->input('username');
            $user->password = Hash::make($req->input('password'));
            $user->save();

            return redirect('login')
                ->with('response', 'Account created');           
        }

        
    }
    
    public function read($id){
        $user = \App\User::find($id);
        return view('profile')
            ->with('user', $user);
        
        // echo json_encode($user);
    }

    public function update(Request $req){
        $validator = Validator::make($req->all(), [
            // 'email' => 'required|unique:users|max:100',
            'username' => 'required|unique:users|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('profile/'.Auth::user()->id)
                ->withErrors($validator)
                ->withInput();
            
        }else{
            $user = \App\User::where('id', Auth::user()->id)
            ->update([ 
                'email' => $req->input('email'),
                'username' => $req->input('username')
            ]);     
            return redirect('profile/'.Auth::user()->id)
            ->with('response', 'Account updated');
        }        
    }

    public function updatePassword(Request $req){
        $user = \App\User::find(Auth::user()->id);

        $validator = Validator::make($req->all(), [
            'password' => 'required|same:retype_password'
        ]);

        if ($validator->fails()) {
            return redirect('profile/'.Auth::user()->id)
                ->withErrors($validator)
                ->withInput();
            
        }else{
            if($user->password != $req->input('old_password')){
                return redirect('profile/'.Auth::user()->id)
                ->withErrors('Wrong Old Password')
                ->withInput();
            }else{
                $user = \App\User::where('id', Auth::user()->id)
                ->update([ 
                    'password' => $req->input('password'),
                ]);     
                return redirect('profile/'.Auth::user()->id)
                ->with('response', 'Account updated');
            }
            
        }

        // echo "tara";
    }

    public function updateImage(Request $req){
        // return $req->input();

        $path = storage_path('../public/images');
        $dimensions = ['245', '300', '500'];

        // $this->validate($req, [
        //     'file-input' => 'required|image|mimes:jpg,png,jpeg'
        // ]);

        if (!File::isDirectory($path)) {
            File::makeDirectory($path);
        }

        $file = $req->file('image_param');
        
        
       
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        echo json_encode($fileName);

        $user = \App\User::find(Auth::user()->id)
        ->update([ 
            'photo_url' => (String)$fileName,
        ]); 

        Image::make($file)->save($path . '/' . $fileName);
	
        foreach ($dimensions as $row) {
           
            $canvas = Image::canvas($row, $row);
            $resizeImage  = Image::make($file)->resize($row, $row, function($constraint) {
                $constraint->aspectRatio();
            });
			
            if (!File::isDirectory($path . '/' . $row)) {
                File::makeDirectory($path . '/' . $row);
            }
        	
            $canvas->insert($resizeImage, 'center');
            $canvas->save($path . '/' . $row . '/' . $fileName);
        }
        
        


    }

    
}