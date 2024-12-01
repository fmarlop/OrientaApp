<?php

namespace App\Http\Controllers;

use App\Models\CompPrefTest;
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

    public function update(Request $request){
        
        // Obtener el paso actual desde la sesión o establecerlo en 1 si no existe
        $currentStep = $request->session()->get('currentStep', 1);
        $total_steps = $request->session()->get('total_steps', 16);

        // Validar los datos según el paso actual
        switch ($currentStep) {
            case 1:
                $validatedData = $request->validate([
                    'mathComp' => 'required|numeric',
                    'mathPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.mathComp', $validatedData['mathComp']);
                $request->session()->put('comp_pref.mathPref', $validatedData['mathPref']);
                break;
            
            case 2:
                $validatedData = $request->validate([
                    'langComp' => 'required|numeric',
                    'langPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.langComp', $validatedData['langComp']);
                $request->session()->put('comp_pref.langPref', $validatedData['langPref']);
                break;

            case 3:
                $validatedData = $request->validate([
                    'histComp' => 'required|numeric',
                    'histPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.histComp', $validatedData['histComp']);
                $request->session()->put('comp_pref.histPref', $validatedData['histPref']);
                break;

            case 4:
                $validatedData = $request->validate([
                    'flangComp' => 'required|numeric',
                    'flangPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.flangComp', $validatedData['flangComp']);
                $request->session()->put('comp_pref.flangPref', $validatedData['flangPref']);
                break;
            
            case 5:
                $validatedData = $request->validate([
                    'slangComp' => 'required|numeric',
                    'slangPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.slangComp', $validatedData['slangComp']);
                $request->session()->put('comp_pref.slangPref', $validatedData['slangPref']);
                break;
            
            case 6:
                $validatedData = $request->validate([
                    'physComp' => 'required|numeric',
                    'physPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.physComp', $validatedData['physComp']);
                $request->session()->put('comp_pref.physPref', $validatedData['physPref']);
                break;   
            
            case 7:
                $validatedData = $request->validate([
                    'chemComp' => 'required|numeric',
                    'chemPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.chemComp', $validatedData['chemComp']);
                $request->session()->put('comp_pref.chemPref', $validatedData['chemPref']);
                break;
            
            case 8:
                $validatedData = $request->validate([
                    'bioComp' => 'required|numeric',
                    'bioPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.bioComp', $validatedData['bioComp']);
                $request->session()->put('comp_pref.bioPref', $validatedData['bioPref']);
                break;
            
            case 9:
                $validatedData = $request->validate([
                    'geolComp' => 'required|numeric',
                    'geolPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.geolComp', $validatedData['geolComp']);
                $request->session()->put('comp_pref.geolPref', $validatedData['geolPref']);
                break;

            case 10:
                $validatedData = $request->validate([
                    'geogComp' => 'required|numeric',
                    'geogPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.geogComp', $validatedData['geogComp']);
                $request->session()->put('comp_pref.geogPref', $validatedData['geogPref']);
                break;
            
            case 11:
                $validatedData = $request->validate([
                    'tecdComp' => 'required|numeric',
                    'tecdPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.tecdComp', $validatedData['tecdComp']);
                $request->session()->put('comp_pref.tecdPref', $validatedData['tecdPref']);
                break;   
            
            case 12:
                $validatedData = $request->validate([
                    'plarComp' => 'required|numeric',
                    'plarPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.plarComp', $validatedData['plarComp']);
                $request->session()->put('comp_pref.plarPref', $validatedData['plarPref']);
                break;
            
            case 13:
                $validatedData = $request->validate([
                    'techComp' => 'required|numeric',
                    'techPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.techComp', $validatedData['techComp']);
                $request->session()->put('comp_pref.techPref', $validatedData['techPref']);
                break;
            
            case 14:
                $validatedData = $request->validate([
                    'philComp' => 'required|numeric',
                    'philPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.philComp', $validatedData['philComp']);
                $request->session()->put('comp_pref.philPref', $validatedData['philPref']);
                break;
            
            case 15:
                $validatedData = $request->validate([
                    'phedComp' => 'required|numeric',
                    'phedPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.phedComp', $validatedData['phedComp']);
                $request->session()->put('comp_pref.phedPref', $validatedData['phedPref']);
                break;

            case 16:
                $validatedData = $request->validate([
                    'musComp' => 'required|numeric',
                    'musPref' => 'required|numeric',
                ]);
                // Guardar el dato en la sesión temporalmente
                $request->session()->put('comp_pref.musComp', $validatedData['musComp']);
                $request->session()->put('comp_pref.musPref', $validatedData['musPref']);
                break;   
        }

        // Verificar qué botón fue presionado
        if ($request->input('action') == 'next') {
            $currentStep++;
        } elseif ($request->input('action') == 'previous') {
            $currentStep--;
        } elseif ($currentStep == $total_steps && $request->input('action') == null) {
            // Si estamos en el último paso y se ha enviado el formulario, guardar en la base de datos

            // Recuperar todos los datos de la sesión
            $compPrefData = $request->session()->get('comp_pref');

            // Verificar si ya existe un registro para el usuario autenticado
            $user = Auth::user();
            $existingRecord = $user->comppreftests()->first(); // Ajusta el criterio de búsqueda si es necesario

            if ($existingRecord) {
                // Si existe, actualizar el registro
                $existingRecord->update($compPrefData);
            } else {
                // Si no existe, crear uno nuevo
                $user->comppreftests()->create($compPrefData);
            }

            // Limpiar la sesión después de guardar
            $request->session()->forget(['comp_pref', 'currentStep']);

            // Redirigir a una página de éxito o a otro lugar
            return redirect()->route('compatibility');
        }


        // Actualizar el paso en la sesión
        $request->session()->put('currentStep', $currentStep);

        // Redirigir de vuelta a la vista
        return redirect()->back();
    }
}
