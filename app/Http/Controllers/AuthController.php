<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{


    public function index(){
        return view('login');
    }
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
      
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
       
        //if(!$user || !Hash::check($fields['password'], $user->password)) {
        if(!$user){
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        
        Session::put('user', $user);
        
       
        //return response($response, 201);

        if($user->role=='student')
            return redirect()->route('student.profile');
        if($user->role=='parent')    
            return redirect()->route('parentProfile');
        if($user->role=='teacher')
        return redirect()->route('teacher.profile');
        if($user->role=='admin')
            return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request) {
        $user=auth()->user();
        $user->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
        return view('homepage');
    }
}