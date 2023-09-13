<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

use function PHPUnit\Framework\returnSelf;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        return $request->wantsJson() ? response()->json(['two_factor' => false]) : redirect()->intended( $this->getRole());
    }

    private function getRole(){
        $role = auth()->user()->role->type;
        switch($role){
            case 'admin':
                return route('admin.dashboard');
                break;
            default:
                return route('dashboard');
        }
    }

}
