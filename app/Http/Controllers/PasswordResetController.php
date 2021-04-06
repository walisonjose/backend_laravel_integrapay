<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use App\PasswordReset;

class PasswordResetController extends Controller
{
 /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response()->json(['message' => 'We cant find a user with that e-mail address.'], 404);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Str::random(60)
             ]
        );
        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }


    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset){
           // return response()->json([
           //     'message' => 'Este token de redefinição de senha é inválido.'
          //  ], 404);
          
          $mensagem = "Este token de redefinição de senha é inválido.";
          
            return redirect('http://budmol.digital/dashboard-ing/recoverpassword/resetPassword.php?error='.$mensagem);
        }
        
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
           // return response()->json([
           //     'message' => 'This password reset token is invalid.'
           // ], 404);
           
             return redirect('http://budmol.digital/dashboard-ingoh/');
        }
        //return response()->json($passwordReset);
        
        
        $token = $passwordReset["token"];
        $email = $passwordReset["email"];
        
    return redirect('http://budmol.digital/dashboard-ingoh/recoverpassword/resetPassword.php?email='.$email.'&token='.$token);
        
        
    }


    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json(['message' => 'We cant find a user with that e-mail address.'], 404);
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json($user);
    }
}
