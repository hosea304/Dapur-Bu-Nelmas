<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Carts;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $jumlahDataCart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->count();

        return view('profile.edit', [
            'user' => $request->user(),
            'jumlahDataCart' => $jumlahDataCart
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $jumlahDataCart = Carts::where("user_id", Auth::id())
            ->where("checked_out", false)
            ->whereDay("carts.created_at", now()->day)
            ->count();

        $request->user()->save();

        return Redirect::route('profile.edit', compact('jumlahDataCart'))->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
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
