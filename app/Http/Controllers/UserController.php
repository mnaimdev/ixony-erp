<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function editProfile()
    {
        try {
            return view('admin.user.profile');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function profileInfoUpdate(Request $request)
    {
        try {
            $service = new ProfileService();
            $service->setName($request->name)
                ->setEmail($request->email)
                ->infoUpdate();

            return back()->with(['alert-type' => 'success', 'message' => 'Profile Info Updated']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function profilePasswordUpdate(Request $request)
    {

        $request->validate([
            'oldPassword'           => 'required',
            'newPassword'           => 'required',
            'confirmPassword'       => 'required',
        ]);

        try {
            $service = new ProfileService();
            $service->setOldPassword($request->oldPassword)
                ->setNewPassword($request->newPassword)
                ->setConfirmPassword($request->confirmPassword)
                ->passwordUpdate();

            $notification = array([
                'alert-type'    => Session::get('alert-type'),
                'message'       => Session::get('message'),
            ]);

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function profileImageUpdate(Request $request)
    {
        try {
            $service = new ProfileService();

            $service->setImage($request->image)
                ->imageUpdate();

            return back()->with(['alert-type'   => 'success', 'message' => 'Image Updated Successfully']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
