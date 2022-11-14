<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MathInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Services\Mathservice;

class UserController extends Controller
{
    protected $maths;
    function __construct()
    {
        App::scoped('\App\Services\MathInterface', function () {
            return new Mathservice;
        });

        $this->maths = app()->make("\App\Services\MathInterface");
        // dd($this->maths);
    }

    function login(Request $request)
    {
        $user = User::where("EMAIL", $request->email)->first();
        // return $request;
        if (!$user || !Hash::check($request->password, $user->PASSWORD)) {
            return "Please provide valid email and password.";
        } else {
            $request->session()->put("user", $user);
            return redirect("/");
        }
    }

    function mathAndLog()
    {
        Log::channel('custom_logging_activity')->info('HIIII');
        // Log::build([
        //     'driver' => 'single',
        //     'path' => storage_path('logs/custom.log'),
        // ])->info("Cutom entry !!");
        // Log::withContext(['hi' => 'bitch']);
        // Log::debug("Entered math function!! ");
        // Log::emergency('SUSHIL_' . date('Y-m-d') . ' The system is down!', ['cuz of ' => "you bitch"]);
        $ar1 = ["h1" => 1, "h2" => 2, 3, null];
        $ar2 = [234, 56, 57897, 89, "fsdf", null, "arr" => array(1, 2)];
        $ar3 = ['test', 0, 1, "arr", "h1" => 1, "h2" => 3123];


        // dd(gettype(array('8jj')), gettype(9), gettype("huh"));
        // dd(array_splice($ar2, 3, 1), $ar2);
        dd(array_reduce($ar2, function ($a, $b) {
            $a = gettype($a) !== "integer" ? 0 : $a;
            $b = gettype($b) !== "integer" ? 0 : $b;
            return $a + $b;
        }));

        // dd($this->maths->multiply(array(1, 2, 3, 4)));
        // $sum = $this->maths->addition([1, 2, 3, 4]);
        dd($this->maths::combine(array(1, 2, 3), array("hi" => "hello", 'rhrgrthrth', array(0, 0))));
    }


    function httpReq(Request $req)
    {
        // $name = "sushil";
        $name = $req['name'] ? $req['name'] : "sushil";
        // $resp = Http::get('https://api.coindesk.com/v1/bpi/currentprice.json');
        $resp = Http::get('https://api.nationalize.io', ['name' => $name]);
        $resp = Http::get('https://api.ipify.org', ['format' => 'json']);
        $result = $resp->json();
        dd($result);
    }
}