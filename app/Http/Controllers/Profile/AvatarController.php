<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    
    {
        // dd($request->input('avatar'));

        // $request->validate();
        $path = $request->file('avatar')->store('avatars');
        auth()->user()->update(['avatar' => storage_path('app')."/$path"]);
        // dd(auth()->user());

       
 // $request->file('avatar')->store('avatars');
        return redirect(route('profile.edit'))->with('message','avatar is updated');
    }
}
