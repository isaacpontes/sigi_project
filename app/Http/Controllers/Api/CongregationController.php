<?php

namespace App\Http\Controllers\Api;

use App\Congregation;
use App\Http\Controllers\Controller;
use App\Http\Resources\CongregationResource;
use Illuminate\Http\Request;

class CongregationController extends Controller
{
    public function index()
    {
        return CongregationResource::collection(Congregation::all());
    }
}
