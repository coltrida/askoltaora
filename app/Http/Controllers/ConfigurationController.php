<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConfigurationController extends Controller
{
    public function index()
    {
        return Inertia::render('Configuration/Index');
    }

    public function saveConfiguration(Request $request)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo')[0];
            $filename = 'logoAzienda.jpg';
            $file->storeAs('logo/', $filename, 'public');
        }

        Configuration::create($request->except('logo'));
        return redirect()->route('index');
    }
}
