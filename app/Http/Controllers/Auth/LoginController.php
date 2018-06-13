<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return redirect('/')->with('show_login_form', true);
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        if($provider != 'vkontakte'){
            $authUser = User::where('email', $user->email)->first();
            if ($authUser) {
                return $authUser;
            }

            $users = User::create([
                'name'     => $user->name,
                'email'    => $user->email,
                'password' => Hash::make(str_random(8)),
                'provider' => $provider,
                'provider_id' => $user->id
            ]);

            return $users;
        }elseif($provider == 'vkontakte')
        {
            $authUser = User::where('provider_id', $user->id)->first();
            if ($authUser) {
                return $authUser;
            }
            if(isset($user) && !empty($user)){
                $users = new User();
                if(isset($user->name) && !empty($user->name))
                {
                    $users->name = $user->name;
                }
                if(isset($user->email) && !empty($user->email))
                {
                    $users->email = $user->email;
                }else{
                    $users->email = $user->name;
                }
                $users->password = Hash::make(str_random(8));
                $users->provider = $provider;
                $users->provider_id = $user->id;
                $users->save();

                return $users;
            }
        }
    }
}
