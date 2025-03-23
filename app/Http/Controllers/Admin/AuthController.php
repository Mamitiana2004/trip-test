<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //
    protected $adminService;

    public function __construct(AdminService $adminService){
        $this->adminService = $adminService;
    }

    public function showLogin(Request $request){
        return view("admin.auth.login");
    }

    public function login(Request $request){
        $credentials = $request->validate([
            "identifiant" => "required|string",
            "password"=> "required|string",
        ]);

        $responseLogin = $this->adminService->loginInAdmin($credentials["identifiant"],$credentials["password"]);
        Log::info($responseLogin);
        switch ($responseLogin) {
            case -1:
                return back()->withErrors([
                    'email' => 'Les identifiants ne correspondent pas.',
                ]);
            case 0:
                return back()->withErrors([
                    'password' => 'Mot de passe incorrect',
                ]);
            case 1:
                return redirect()->intended('/admin/destination');
            default:
                break;
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
