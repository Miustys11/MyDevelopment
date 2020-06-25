<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // 追記
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
    protected $redirectTo = '/admin/goods';
    
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
        $this->middleware('guest:admin')->except('logout'); // 変更
    }
    
    
    // public function showLoginForm()
    // {
    //     return view('admin.login');
    // }

    protected function guard()
    {
        return \Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        \Auth::guard('admin')->logout();
        return redirect('/admin/login');
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
        
        return view('admin.login'); 
        
    }
    
}

