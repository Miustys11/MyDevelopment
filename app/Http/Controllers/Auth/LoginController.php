<?php

namespace App\Http\Controllers\Auth;

// 追記
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    
    protected function redirectTo() { 
        
        return URL::previous(); 
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }
    
    
    /** 以下追記 **/
    // public function showLoginForm()
    // {
    //     return view('auth.login');
    // }

    protected function guard()
    {
        return \Auth::guard('user');
    }

    public function logout(Request $request)
    {
        \Auth::guard('user')->logout();
        return redirect('/login');
    }
    
    public function showLoginForm() 
    { 
        
        if (array_key_exists('HTTP_REFERER', $_SERVER)) { 
            $path = parse_url($_SERVER['HTTP_REFERER']);
            // URLを分解 
            if (array_key_exists('host', $path)) { 
                // ホスト部分どうしで比較する。explodeでポート番号は除外する 
                if ($path['host'] == explode(":",$_SERVER['HTTP_HOST'])[0]) { 
                    // ホスト部分が自ホストと同じ 
                    session(['url.intended' => $_SERVER['HTTP_REFERER']]); 
                    
                } 
                
            } 
            
        } 
        
        return view('auth.login'); 
        
    }
}
