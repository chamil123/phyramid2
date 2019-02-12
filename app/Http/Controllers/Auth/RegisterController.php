<?php

namespace App\Http\Controllers\Auth;

use App\partner;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\dummey;
use DB;
use App\dummey_bind;

class RegisterController extends Controller {
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
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'user_nic' => ['required', 'string', 'max:255', 'unique:users'],
                    'name' => ['required', 'string', 'max:255'],
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
                    'user_contact_1' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        $user = User::create([
                    'name' => $data['name'],
                    'user_nic' => $data['user_nic'],
                    'user_contact_1' => $data['user_contact_1'],
                    'user_address' => '',
                    'user_gender' => '',
                    'user_dob' => '',
                    'user_contact_2' => '',
                    'user_bank_name' => '',
                    'user_bank_branch' => '',
                    'user_account_no' => '',
                    'user_benifit_name' => '',
                    'user_benifit_address' => '',
                    'user_status' => '1',
                    'user_pv' => '',
                    'image' => "default_image.png",
                    'password' => Hash::make($data['password']),
        ]);

        $last_id = $user->id;
        $last_dum_id = 0;
        for ($i = 0; $i < 3; $i++) {
            $dummey = new dummey();
            if ($i == 0) {
                //  $ss_id=DB::getPdo()->lastInsertId();
                $dummey->dummey_name = $data['user_nic'] . "_PL1_A";
                $dummey->placement_id = 1;
                $dummey->user_id = $last_id;
                $dummey->bind_id = 0;
                $dummey->daily_pv_tot = 0;
                $dummey->side = 'Center';
                $dummey->save();
                $last_dum_id = $dummey->id;
            } else if ($i == 1) {
                $dummey->dummey_name = $data['user_nic'] . "_PL1_B";
                $dummey->placement_id = 1;
                $dummey->user_id = $last_id;
                $dummey->bind_id = $last_dum_id;
                $dummey->daily_pv_tot = 0;
                $dummey->side = 'Left';
                $dummey->save();
            } else {
                $dummey->dummey_name = $data['user_nic'] . "_PL1_C";
                $dummey->placement_id = 1;
                $dummey->user_id = $last_id;
                $dummey->bind_id = $last_dum_id;
                $dummey->daily_pv_tot = 0;
                $dummey->side = 'Right';
                $dummey->save();
            }
        }
        $partner = new partner;
        $partner->nic_dummey = $data['nic_dummey'];
        $partner->side = $data['side'];
        $partner->member_id = $data['user_id'];
        $partner->user_id = $last_id;
        $partner->status = 1;
        $partner->save();

        $dummey_orders = DB::table('dummeys')
                ->select('dummeys.*')
                ->where('user_id', $data['user_id'])
                ->get();

        foreach ($dummey_orders as $dummey_order) {
            $dummey_bind = new dummey_bind();
            $dummey_bind->nic_dummey_id = 1;
            $dummey_bind->side = "Left";
            $dummey_bind->partner_dummey_id = 2;
            $dummey_bind->save();
        }

        return $dummey_orders;
    }

}
