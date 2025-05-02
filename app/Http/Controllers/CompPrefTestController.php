<?php

namespace App\Http\Controllers;

use App\Models\CompPrefTest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompPrefTestController extends Controller
{
    public function prerender() {
        return view('multi.comp-pref-main'); //->layout('components.layout');
    }
    
    public function render() {
        return view('multi.comp-pref'); //->layout('components.layout');
    } 

    public function update(Request $request) {
        
        // Asegurar que la petición sea JSON
        if ($request->expectsJson()) {
            // Validar los datos según el JSON proporcionado
            $validatedData = $request->validate([
                'mathComp' => 'required|numeric',
                'mathPref' => 'required|numeric',
                'langComp' => 'required|numeric',
                'langPref' => 'required|numeric',
                'histComp' => 'required|numeric',
                'histPref' => 'required|numeric',
                'flangComp' => 'required|numeric',
                'flangPref' => 'required|numeric',
                'slangComp' => 'required|numeric',
                'slangPref' => 'required|numeric',
                'physComp' => 'required|numeric',
                'physPref' => 'required|numeric',
                'chemComp' => 'required|numeric',
                'chemPref' => 'required|numeric',
                'bioComp' => 'required|numeric',
                'bioPref' => 'required|numeric',
                'geolComp' => 'required|numeric',
                'geolPref' => 'required|numeric',
                'geogComp' => 'required|numeric',
                'geogPref' => 'required|numeric',
                'tecdComp' => 'required|numeric',
                'tecdPref' => 'required|numeric',
                'plarComp' => 'required|numeric',
                'plarPref' => 'required|numeric',
                'techComp' => 'required|numeric',
                'techPref' => 'required|numeric',
                'philComp' => 'required|numeric',
                'philPref' => 'required|numeric',
                'phedComp' => 'required|numeric',
                'phedPref' => 'required|numeric',
                'musComp' => 'required|numeric',
                'musPref' => 'required|numeric',
            ]);

            $user = Auth::user();
            $existingRecord = $user->comppreftests()->first();

            if ($existingRecord) {
                $existingRecord->update($validatedData);
            } else {
                $user->comppreftests()->create($validatedData);
            }

            return response()->json(['message' => 'Test realizado con éxito']);
            //return redirect()->route('compatibility'); // no puedo usar esto porque desde el fetch se espera que devuelva json y no una respueta http, así que si quiero redirigir tengo que hacerlo desde el frontend.
        }

        // Si no es JSON, devolver error
        return response()->json(['error' => 'Formato no válido'], 400);

    }    
}
