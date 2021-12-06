<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Auth;
use Hash;
use Image;
use Carbon\Carbon;

class UserController extends Controller
{
    // Profile View
    public function profile(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        
        return view('auth.conta_usuario.minha_conta', compact('user'));
    }
    
    // Profile Update
    public function profileUpdate(Request $request, $user_id)
    {
        $data = User::findOrFail($user_id);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')) {
            $image = $request->file('profile_photo_path');
            $image_name = date('d_m_Y__H_i.').$image->getClientOriginalExtension();
            $image->move(public_path('upload/imagem_usuario'), $image_name);
            $data['profile_photo_path'] = $image_name;
        }

        $data->save();

        return redirect()->back();
    }

    // Password Update
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ], [
            'oldpassword.required' => 'Insira sua senha atual.',
            'password.confirmed' => 'Verique os campos e tente novamente!'
        ]);

        $hashedPass = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPass)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();

            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
