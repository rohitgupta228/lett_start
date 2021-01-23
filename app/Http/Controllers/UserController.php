<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Flash;

class UserController extends Controller
{

    public function editProfile()
    {
        $userDetails = Auth::user()->userDetails;

        return view('edit_profile', compact('userDetails'));
    }

    public function saveProfile(Request $request)
    {
        $data = $request->except(['_token']);

        $user = Auth::user();

        $userDetails = ($user->userDetails) ? $user->userDetails()->update($data) : $user->userDetails()->create($data);

        Flash::success("Your profile has been updated!");

        return redirect(route('user.edit.profile'));
    }

    public function updateProfileImage(Request $request)
    {
        $data = $request->except(['_token']);
        $user = Auth::user();
        if ($file = $request->hasFile('photo')) {
            $file = $request->file('photo');

            $fileName = 'file-' . date('Y-m-d') . '-' . date('H-i-s') . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path() . '/uploads/';

            $file->move($destinationPath, $fileName);

            $fileUrl = url('uploads/' . $fileName);

            $userDetails = ($user->userDetails) ? $user->userDetails()->update([
                        'image' => $fileUrl,
                    ]) : $user->userDetails()->create([
                        'image' => $fileUrl,
            ]);
            Flash::success("Your profile pic has been updated!");

            return redirect(route('user.edit.profile'));
        }
    }

}
