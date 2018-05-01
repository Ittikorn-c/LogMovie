<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Image;
use Intervention\Image\ImageManagerStatic;
use Storage;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::id() == $id) {
            $user = Auth::user();
        } else {
            $user = User::findOrFail($id);
        }
        return view('profile.feed', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.edit_profile', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validateProfile($request->all());
        $user->profile()->update($request->except('_token', '_method'));
        return redirect()->route('profile.edit', Auth::id())->with('success', 'Your profile is saved');
    }

    /**
     * Validate the profile fields.
     *
     * @param  array $data
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateProfile($data)
    {
        $validator = Validator::make($data, [
            'birthday' => 'date',
            'location' => 'max:60',
            'available_at' => 'max:60',
            'about_me' => 'max:200',
        ]);
        $validator->validate();
    }

    /**
     * Show the form for editing account setting.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function editAccount($id)
    {
        $user = User::find($id);
        return view('profile.edit_account', ['user' => $user]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        $user = User::find($userId);
        Auth::logout();
        try {
            if ($user->delete()) {
                return redirect()->route('/')->with('global', 'Your account has been deleted!');
            }
        } catch (\Exception $e) {
            return back()->withErrors('msg', 'Something went wrong');
        }
        return back()->withErrors('msg', 'Something went wrong');
    }

    public function updateAvatar(Request $request)
    {
        $user = Auth::user();
        if ($user->profile->avatar != 'default.png') {
            $oldAvatar = 'public/avatars/' . $user->profile->avatar;
            Storage::delete($oldAvatar);
        }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = $user->name . '.' . $avatar->getClientOriginalExtension();
            $path = 'public/avatars/' . $filename;
            $image = ImageManagerStatic::make($avatar)->resize(300, 300);
            Storage::put($path, $image->encode());
            $user->profile()->update(['avatar' => $filename]);
        }
        return redirect()->route('profile.show', Auth::id());
    }
}
