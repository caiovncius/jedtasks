<?php

namespace App\Http\Controllers\Auth;

use App\Account\Contracts\AccountCreatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountCreatorRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**
     * @var AccountCreatable
     */
    private $registerService;

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
     * RegisterController constructor.
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->registerService = app()->make(AccountCreatable::class);
    }

    /**
     * @param AccountCreatorRequest $request
     * @return \Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector|mixed
     */
    public function register(AccountCreatorRequest $request)
    {
        try {
            $user = $this->registerService->register(
                $request->name,
                $request->email,
                $request->password,
                $request->workspace_name
            );

            $this->guard()->login($user);

            if ($response = $this->registered($request, $user)) {
                return $response;
            }

            return $request->wantsJson()
                ? new Response('', 201)
                : redirect($this->redirectPath());
        } catch (\Exception $e) {
            abort($e->getCode());
        }
    }
}
