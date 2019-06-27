<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
           $encryptedValue = "eyJpdiI6InhzVGhQVHpFWGlOTzZYZTg5M1QzcVE9PSIsInZhbHVlIjoiM3h6QktoRlFcLzRMWEloXC9CbWJNVE1sdE43VVdjQ2s2SDNKam1IcldQTjcwPSIsIm1hYyI6ImQwM2ExZDUzMWE3YWEwMTc0YTM4NThmZTQwYTcxNjVjMjEzOTY5MjVkZDVhZTk2Njg5MDdjN2Q4NTEyMDM1YTEifQ==";
           $decrypted = decrypt($encryptedValue);
           dd($decrypted);
        } catch (DecryptException $e) {
           //
        }
        return view('home');
    }
}
