<?php

namespace App\Http\Controllers\Tenancy;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginTenancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function close()
    {
       
        if(session()->has('loginuser'))
        {    session()->forget('loginuser');
            return redirect('Tenancy.loginTenancy');
        }else
        {
            return back();
        }

       
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        if ($validator->fails())
        {
            return back();
        }
        $user = User::where('email', $request->email)->first();
       
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                // $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                // $response = ['token' => $token];
                $request->session()->put('loginuser', $user->id);
                $request->session()->put('loginusername', $user->name);
                return  redirect('DashboardTenancy');
            } else {
                // $response = ["message" => "Password mismatch"];
                return  back()->with('fail' ,'كلمة المرور خطا');
            }
        } else {
            // $response = ["message" =>'User does not exist'];
            return  back()->with('fail' ,'غير موجود ');
        }

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
