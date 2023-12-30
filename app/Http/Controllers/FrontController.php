<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $configurazioneEseguita = Configuration::first();
        if ($configurazioneEseguita){
            return redirect()->route('login');
        }
        return  redirect()->route('configuration');
    }
}
