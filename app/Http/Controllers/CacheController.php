<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class CacheController extends Controller
{
    function index()
    {
        // Redis::set('name', 'Sushil2');
        Redis::command('lpush', ['list1', 'l1']);
        // Cache::put("test1", "hell", 600);
        dd(Redis::get('name'));
        dd(Redis::command('lrange', ['list1', 0, 1]));
    }
}