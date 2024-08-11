<?php
###### Sat Jun 3 12:01:51 COT 2023

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use Illuminate\Validation\Rule;

use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;


class UserController extends Controller
{

    // public function showMain(){

    //     return view("main");

    //  }
    public function admin(User $user)
    {
        $users = User::paginate();
        return view('admin.users.index', compact('users'));
    }



    public function showPrivacy()
    {

        return view("privacy");
    }



    public function showLogin()
    {

        return view("login");
    }

    public function showRegister2()
    {

        $countries = Country::all();
        return view("register2", compact('countries'));
    }

    public function login(Request $request)
    {

        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:36'],
            'password' => ['required', 'min:3', 'max:36']

        ]);

        if (auth()->attempt(['name' => $incomingFields['name'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            return  redirect('/main');
        } else {
            return back()->withErrors(['password' => 'You may have entered the wrong username or password or your account might be locked']);
        }
    }


    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }




    public function register2(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:36', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:3', 'max:36'],
            'country_id' => 'required'

        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);


        return redirect('/tl50data')->with('alert-success', 'You have successfully ... Created!');
    }



    /** Forgot password     **/
    public function forgotPassword()
    {
        return view('forgot');
    }

    /**     * Validate token for forgot password     */
    public function forgotPasswordValidate($token)
    {
        $user = User::where('remember_token', $token)->where('email_verified_at', '2023-01-01')->first();
        if ($user) {
            $email = $user->email;
            return view('change-password', compact('email'));
        }
        return redirect()->route('forgot-password')->with('alert-failed', 'Password reset link is expired');
    }

    /** Reset password */
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('alert-failed', 'Failed! email is not registered.');
        }

        $token = Str::random(60);

        $user['remember_token'] = $token;
        $user['email_verified_at'] = '2023-01-01';
        $user->save();

       try {
            Mail::to($request->email)->send(new ResetPassword($user->name, $token));
            
            return back()->with('alert-success', 'Success! Password reset link has been sent to your email');
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            return back()->with('alert-failed', 'Failed! There is some issue with the email provider');
        }


    }



    /** Change password    */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:3|max:36',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['email_verified_at'] = '2023-01-01';
            $user['remember_token'] = '';
            $user['password'] = bcrypt($request['password']);
            $user->save();
            return redirect()->route('tl50data')->with('alert-success', 'Success! password has been changed');
        }
        return redirect()->route('forgot-password')->with('alert-failed', 'Failed! something went wrong');
    }
}
