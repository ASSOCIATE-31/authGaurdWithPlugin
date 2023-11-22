<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomRegister;
use App\Http\Requests\CustomLogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CustomRegister $request)
    {
        $addUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'user_type' => 2,
        ]);
        if($addUser)
        {
            return response()->json(['status' => 200],);
        }
        else
        {
            return response()->json(['status' => 502]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function login(Request $request)
    {
        return view('user.pages.login');
    }
    public function auth(Request $request)
    {
        return view('user.pages.login');
    }
    public function loginCheck(CustomLogin $request)
    {
        $credentials = $request->only('email','password');
        $user        = Auth::attempt($credentials); 
        $user        = Auth::guard('frontend')->attempt($request->only('email', 'password'));
        switch($user)
        {
            case true :
                return response()->json(['status' => 200, 'message' => 'Login Successful']);
                break;
            case false :
                return response()->json(['status' => 404, 'message' => 'Authenticate Failure']);
                break;
            default :
            break;        
       }
    }
    public function dashboard()
    {
        return view('user.pages.dashboard');
    }
    public function logout()
    {
       Auth::logout();
       return redirect()->route('index');
    }
    /**
     * Display the specified resource.
     */
    public function profile()
    {
        return view('user.pages.profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
