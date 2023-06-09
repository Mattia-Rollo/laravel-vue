<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Jobseeker;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): Response
    {
        // dd($request);
        $account = $request['accountSelected'];
        return Inertia::render('Auth/Register', compact('account'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


        // dd($request);
        if ($request['accountSelected'] == 'jobseeker') {


            $request->validate([
                'jobseeker.first_name' => 'required',
                'jobseeker.last_name' => 'required',
                // 'gender' => 'required',
                'jobseeker.gender' => 'required',
                'address.cap' => 'required|numeric'
            ], [
                    'jobseeker.first_name.required' => 'Il nome è richiesto',
                    'jobseeker.last_name.required' => 'Il cognome è richiesto',
                    // 'gender.required' => 'Seleziona il tuo sesso',
                    'address.cap.required' => 'Inserire il cap valido',
                    'address.cap.numeric' => 'Inserire un cap valido',
                    'jobseeker.gender.required' => 'Il campo genere è obbligatorio.'
                ]);
            $request['name'] = $request['jobseeker.first_name'];
        }
        // dd($request);

        // dd($request->accountSelected);
        $request['type_user'] = $request['accountSelected'];
        // dd($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'type_user' => 'nullable'
        ]);

        // dd($request);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type_user' => $request->accountSelected
        ]);

        if ($request['accountSelected'] == 'jobseeker') {

            Jobseeker::create([
                'user_id' => $user->id,
                'first_name' => $request['jobseeker.first_name'],
                'last_name' => $request['jobseeker.last_name'],

                'gender' => $request['jobseeker.gender'],
            ]);

            Address::create([
                'user_id' => $user->id,
                'district' => $request['address.district'],
                'province' => $request['address.province'],
                'city' => $request['address.city'],
                'cap' => $request['address.cap'],
                'street' => $request['address.street']
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}