<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Config\constants;

trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // Pegando o valor da constant para colocar no solicitante
        $status = \Config::get('constants.STATUS.ATIVO');

        $arrayUsers = DB::table('users')
                ->where('users.email','=',$request->email)
                ->where('users.status','=',$status)
                ->get();

        foreach ($arrayUsers as $arrayUser) {
            $user = $arrayUser;
        }

        if(isset($user)) {
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $url = $request->session()->previousUrl();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath($url));
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    public function redirectTo($url)
    {
        // Pegando o valor da constant para colocar no solicitante
        $status = \Config::get('constants.STATUS.ATIVO');

        // Select para pegar todos os usuarios ativos que estão tentando autenticar
        $arrayUsersPrestadores = DB::table('users')
                            ->join('PRESTADORES','users.ID','=','PRESTADORES.ID_USUARIO')
                            ->where('PRESTADORES.ID_USUARIO', auth()->user()->id)
                            ->where('users.status', '=', $status)
                            ->get();

        $arrayUsersSolicitantes = DB::table('users')
                            ->join('SOLICITANTES','users.ID','=','SOLICITANTES.ID_USUARIO')
                            ->where('SOLICITANTES.ID_USUARIO', auth()->user()->id)
                            ->where('users.status', '=', $status)
                            ->get();

        $arrayUsersAdmins = DB::table('users')
                            ->join('ADMINISTRADORES','users.ID','=','ADMINISTRADORES.ID_USUARIO')
                            ->where('ADMINISTRADORES.ID_USUARIO', auth()->user()->id)
                            ->where('users.status', '=', $status)
                            ->get();

        // Remove os resultados do array e coloca em uma variável
        foreach ($arrayUsersPrestadores as $arrayUserPrestador) {
            $userPrestador = $arrayUserPrestador;
        }

        foreach ($arrayUsersSolicitantes as $arrayUserSolicitante) {
            $userSolicitante = $arrayUserSolicitante;
        }

        foreach ($arrayUsersAdmins as $arrayUserAdmin) {
            $userAdmin = $arrayUserAdmin;
        }

        // Verifica o tipo do usuario e redireciona
        if (isset($userPrestador)) {
            return '/cadastroPrestador';
        } else if (isset($userSolicitante)) {
            if (empty($url)) {
                return '/cadastroSolicitante';
            } else {
                return $url;
            }
        } else if (isset($userAdmin)) {
            return '/cadastroAdmin';
        }
        dd('Passou tudo');

    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        // Pegando o valor da constant para colocar no solicitante
        $status = \Config::get('constants.STATUS.ATIVO');

        $arrayUsers = DB::table('users')
                ->where('users.email','=',$request->email)
                ->where('users.status','=',$status)
                ->get();

        foreach ($arrayUsers as $arrayUser) {
            $user = $arrayUser;
        }

        if(isset($user)) {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        } else {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.invalid')],
            ]);
        }        
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
