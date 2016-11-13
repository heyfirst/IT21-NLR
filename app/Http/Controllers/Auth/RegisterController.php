<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/reservation';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */

    // ----------------------------
    // -- Facebook Autentication --
    // ----------------------------
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleFacebookProviderCallback()
    {
        // 1 check if the user exists in our database with facebook_id
        // 2 if not create a new user
        // 3 login this user into our application
        try
        {
          $socialUser = Socialite::driver('facebook')->user();
        }
        catch (\Exception $e)
        {
            return redirect('/');
        }
        $user = User::where('facebook_id',$socialUser->getId())->first();

        if(!$user)
          $user = User::create([
            'facebook_id' => $socialUser->getId(),
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
          ]);

          Auth::login($user, true);

        return redirect()->to('/reservation');
    }

    // ----------------------------
    // --- Google Autentication ---
    // ----------------------------
    public function redirectToGoogleProvider()
    {
      return Socialite::driver('google')->redirect();
    }

    public function handleGoogleProviderCallback(){

      $socialUser = Socialite::driver('google')->user();
      dd($socialUser);

      try
      {

      }
      catch (\Exception $e)
      {
          return redirect('/');
      }


      $user = User::where('social_token_id',$socialUser->getId())->first();

      if(!$user){
        $user = User::create([
          'social_user_id' => $socialUser->getId(),
          'name' => $socialUser->getName(),
          'email' => $socialUser->getEmail(),
        ]);

      }
      Auth::login($user, true);

      return redirect()->to('/reservation');
    }
}
