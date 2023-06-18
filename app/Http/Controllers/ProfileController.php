<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{

    public function image(): Response
    {
        
        return Inertia::render('Jobseeker/Curriculum/Edit');
    }
    public function updateImage(Request $request)
    {
        // dd('ciao');
        $user = $request->user();

        // dd($user, $request);
        // $user->profile_image_path = $request->image;
        // if ($request->hasFile('profile_image_path')) {
        //     $path = Storage::disk('public')->put('images', $request->profile_image_path);
        //     $user->profile_image_path = $path;
        // }

        if ($request->hasFile('profile_image_path')) {
            if ($user->profile_image_path) {
                Storage::delete($user->profile_image_path);
            }

            $path = Storage::disk('public')->put('images', $request->profile_image_path);
            $user['profile_image_path'] = $path;
        }

        $user->update();

        return redirect()->route('curriculum.index');
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}