<?php

namespace App\Http\Controllers\Api;

use App\Church;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChurchResource;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    public function index()
    {
        return ChurchResource::collection(Church::all());
    }
}
