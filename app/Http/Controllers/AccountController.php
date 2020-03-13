<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountProfileRequest;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('account.edit');
    }

    public function updateProfile(AccountProfileRequest $request)
    {
        dd($request->all());
    }

    public function updateWorkspace()
    {

    }

    public function updateSettings()
    {

    }

    public function updatePassword()
    {

    }
}
