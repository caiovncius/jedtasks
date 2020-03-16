<?php

namespace App\Http\Controllers;

use App\Account\Contracts\AccountPasswordUpdatable;
use App\Account\Contracts\AccountProfileUpdatable;
use App\Http\Requests\AccountPasswordResetRequest;
use App\Http\Requests\AccountProfileRequest;
use App\Http\Requests\AccountWorkspaceRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * @var AccountProfileUpdatable
     */
    private $profileService;

    /**
     * @var AccountPasswordUpdatable
     */
    private $passwordService;

    /**
     * AccountController constructor.
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->profileService = app()->make(AccountProfileUpdatable::class);
        $this->passwordService = app()->make(AccountPasswordUpdatable::class);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('account.edit');
    }

    /**
     * @param AccountProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(AccountProfileRequest $request)
    {
        try {
            $this->profileService->update(User::find(Auth::id()), $request->all(), $request->file('avatar'));
            return back()->withStatus(__('Profile updated successfully!'));
        } catch (\Exception $e) {
            return back()->withErrors( __('Some error has occurred. Please, try again later.'));
        }
    }

    /**
     * @param AccountPasswordResetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(AccountPasswordResetRequest $request)
    {
        try {
            $this->passwordService->updatePassword(
                User::find(auth()->id()),
                $request->current_password,
                $request->password
            );

            return back()->withStatus(__('Password updated successfully!'));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function updateWorkspace(AccountWorkspaceRequest $request)
    {

    }

    public function updateSettings()
    {

    }


}
