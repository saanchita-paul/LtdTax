<?php

namespace App\Http\Controllers;

use App\Models\CompanyBillingAddress;
use App\Models\CompanyContactDetail;
use App\Models\CompanyDetailInfo;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class EmployerRegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function getEmployerRegister()
    {
        return view('auth.employer-register');
    }
    public function submitEmployerRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'terms_of_service' => 'accepted',
            'username' => 'required|alpha|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:11|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $r = 0;
        $employer_save = User::create(array(
            'name' => $request->username,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_role' => $r,
            'password' => Hash::make($request->password),
        ));
        if ($employer_save) {
            $user_id = $employer_save->id;

            $company_details_save = CompanyDetailInfo::create(array(
                'user_id' => $user_id,
            ));
            if ($company_details_save) {
                $company_id = $company_details_save->id;
                CompanyContactDetail::create(array(
                    'company_id' => $company_id,
                ));
                CompanyBillingAddress::create(array(
                    'company_id' => $company_id,
                ));
                return redirect('/login');
            }
        }
    }
}
