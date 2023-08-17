<?php

namespace App\services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;
use Image;

class ProfileService
{
    private $name, $email, $oldPassword, $newPassword, $confirmPassword, $image;

    public function setName($value)
    {
        $this->name = $value;
        return $this;
    }


    public function setEmail($value)
    {
        $this->email = $value;
        return $this;
    }


    public function setOldPassword($value)
    {
        $this->oldPassword = $value;
        return $this;
    }


    public function setNewPassword($value)
    {
        $this->newPassword = $value;
        return $this;
    }


    public function setConfirmPassword($value)
    {
        $this->confirmPassword = $value;
        return $this;
    }

    public function setImage($value)
    {
        $this->image = $value;
        return $this;
    }


    public function infoUpdate()
    {
        $user = User::findOrFail(Auth::id());
        $user->name = $this->name;
        $user->email = $this->email;
        $user->update();
    }


    public function passwordUpdate()
    {

        $user = User::findOrFail(Auth::id());


        if (Hash::check($this->oldPassword, Auth::user()->password)) {

            if ($this->newPassword == $this->confirmPassword) {
                $user->password = Hash::make($this->newPassword);
                $user->update();

                return back()->with(['alert-type' => 'success', 'message' => 'Password Updated Successfully']);
            } else {
                return back()->with(['alert-type' => 'error', 'message' => 'Please Confirm Your Password']);
            }
        } else {
            return back()->with(['alert-type' => 'error', 'message' => 'Old Password Not Match']);
        }
    }


    public function imageUpdate()
    {

        if (Auth::user()->image == '') {
        } else {

            $deletedFrom = public_path('/uploads/user/' . Auth::user()->image);
            unlink($deletedFrom);
        }

        $uploadedFile = $this->image;
        $extension = $uploadedFile->getClientOriginalExtension();
        $fileName = Str::lower(str_replace(' ', '-', Auth::user()->name)) . '.' . $extension;

        Image::make($uploadedFile)->save(public_path('/uploads/user/' . $fileName));

        $user = User::findOrFail(Auth::id());
        $user->image = $fileName;
        $user->update();
    }
}
