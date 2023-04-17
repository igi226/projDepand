<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'terms_cond' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $slug = Str::slug($data['name']);
        $slug_count = DB::table('users')->where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().rand(100000, 999999).'-'.$slug;
        }
        $data['slug'] = $slug;
        // dd($data);
       $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'slug' =>  $data['slug'],
            'user_type' =>  $data['user_type'],
            'online' => 1
        ]);
    //     $package = DB::table('packages')->where('id', $data['subscription_id'])->select('package_price')->first();
    //     if($package->package_price == null || $package->package_price == 0) {
    //         $status = 0;
    //     }else{
    //         $status = 1;
    //     }
    //    Subscription::create([
    //     'employer_id' => $user->id, 
    //     'subscription_id' => $data['subscription_id'] ,
    //     'status' => $status 
    //    ]);
       Session::flash('msg', 'Please check your mail and verify the email'); 
       return $user;
}
}
