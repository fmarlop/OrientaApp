<?php

namespace App\Http\Controllers;

use App\Models\CompPrefTest;
use App\Models\ProFam;
use Illuminate\Http\Request;

class CompatibilityController extends Controller
{
    public function show(){

        $profams = ProFam::all();

        $user = auth()->user(); 

        $profamswithnumber = $profams->map(function ($profam) use ($user) { // map es un metodo que indtroduce cada elemento uno por uno y lo reemplaza por el valor de return.
            $number = $this->calcularPorcentaje($user->id, $profam->id);
            return [
                'profam' => $profam,
                'number' => $number
            ];
        });

        $profamswithnumber = $profamswithnumber->sortByDesc('number');

        return view('users.compatibility', ['profamswithnumber' => $profamswithnumber]);
    }

    private function calcularPorcentaje($user_id, $profam_id)
    {
        // Obtener los valores de la tabla comp_pref_tests para el usuario
        $compPrefTest = CompPrefTest::where('user_id', $user_id)->first();

        //$compPrefTest = CompPrefTest::where('user_id', $user_id)->where('profam_id', $profam_id)->first();

        $porcentaje = '-';
        $pComp = 0;
        $pPref = 0;

        // Asegurarse de que existe un registro
        if (!$compPrefTest) {
            return $porcentaje; // Si no existe, devolver '-'
        } else {
            switch ($profam_id) {
                case '1': // Deporte y Actividad Física. phed 60, bio 20, mus 5, quim 5, mat 5, phi 5,
                    $pComp = (($compPrefTest->phedComp*0.6 + $compPrefTest->bioComp*0.2 + $compPrefTest->musComp*0.05 + $compPrefTest->chemComp*0.05 + $compPrefTest->mathComp*0.05 + $compPrefTest->philComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->phedPref*0.6 + $compPrefTest->bioPref*0.2 + $compPrefTest->musPref*0.05 + $compPrefTest->chemPref*0.05 + $compPrefTest->mathPref*0.05 + $compPrefTest->philPref*0.05) +2) *25;
                    break;
                case '2': // Administración y Gestión. lan 20, mat 20, tech 15, 1lan 10, 2lan 10, his 5, fil 5, geo 5,
                    $pComp = (($compPrefTest->langComp*0.2 + $compPrefTest->mathComp*0.2 + $compPrefTest->techComp*0.15 + $compPrefTest->flangComp*0.1 + $compPrefTest->slangComp*0.1 + $compPrefTest->histComp*0.05 + $compPrefTest->philComp*0.05 + $compPrefTest->geogComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->langPref*0.2 + $compPrefTest->mathPref*0.2 + $compPrefTest->techPref*0.15 + $compPrefTest->flangPref*0.1 + $compPrefTest->slangPref*0.1 + $compPrefTest->histPref*0.05 + $compPrefTest->philPref*0.05 + $compPrefTest->geogPref*0.05) +2) *25;
                    break;
                case '3': // Agricultura y Jardinería. bio 30, plar 20, geol 15, phed 15, chem 10, tecd 5, geog 5
                    $pComp = (($compPrefTest->bioComp*0.3 + $compPrefTest->plarComp*0.2 + $compPrefTest->geolComp*0.15 + $compPrefTest->phedComp*0.15 + $compPrefTest->chemComp*0.1 + $compPrefTest->tecdComp*0.05 + $compPrefTest->geogComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->bioPref*0.3 + $compPrefTest->plarPref*0.2 + $compPrefTest->geolPref*0.15 + $compPrefTest->phedPref*0.15 + $compPrefTest->chemPref*0.1 + $compPrefTest->tecdPref*0.05 + $compPrefTest->geogPref*0.05) +2) *25;
                    break;
                case '4': // Artes Gráficas y Diseño. tecd 30, plar 25, tech 20, lan 10, mus 5, phi 5, his 5
                    $pComp = (($compPrefTest->tecdComp*0.3 + $compPrefTest->plarComp*0.25 + $compPrefTest->techComp*0.2 + $compPrefTest->langComp*0.1 + $compPrefTest->musComp*0.05 + $compPrefTest->philComp*0.05 + $compPrefTest->histComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->tecdPref*0.3 + $compPrefTest->plarPref*0.25 + $compPrefTest->techPref*0.2 + $compPrefTest->langPref*0.1 + $compPrefTest->musPref*0.05 + $compPrefTest->philPref*0.05 + $compPrefTest->histPref*0.05) +2) *25;
                    break;
                case '5': // Artes, Artesanías y Textiles. plar 50, tecd 25, mus 10, phi 5, his 5, phed 5
                    $pComp = (($compPrefTest->plarComp*0.5 + $compPrefTest->tecdComp*0.25 + $compPrefTest->musComp*0.1 + $compPrefTest->philComp*0.05 + $compPrefTest->histComp*0.05 + $compPrefTest->phedComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->plarPref*0.5 + $compPrefTest->tecdPref*0.25 + $compPrefTest->musPref*0.1 + $compPrefTest->philPref*0.05 + $compPrefTest->histPref*0.05 + $compPrefTest->phedPref*0.05) +2) *25;
                    break;
                case '6': // Comercio y Marketing. mat 20, his 15, lan 15, phi 15, tech 10, tecd 10, 1lan 5, 2lan 5, geog 5
                    $pComp = (($compPrefTest->mathComp*0.2 + $compPrefTest->histComp*0.15 + $compPrefTest->langComp*0.15 + $compPrefTest->philComp*0.15 + $compPrefTest->techComp*0.1 + $compPrefTest->tecdComp*0.1 + $compPrefTest->flangComp*0.05 + $compPrefTest->slangComp*0.05 + $compPrefTest->geogComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->mathPref*0.2 + $compPrefTest->histPref*0.15 + $compPrefTest->langPref*0.15 + $compPrefTest->philPref*0.15 + $compPrefTest->techPref*0.1 + $compPrefTest->tecdPref*0.1 + $compPrefTest->flangPref*0.05 + $compPrefTest->slangPref*0.05 + $compPrefTest->geogPref*0.05) +2) *25;
                    break;
                case '7': // Derecho y Sociedad. lan 30, his 35, phil 25, geog 5, 1lan 5
                    $pComp = (($compPrefTest->histComp*0.35 + $compPrefTest->langComp*0.3 + $compPrefTest->philComp*0.25 + $compPrefTest->geogComp*0.05 + $compPrefTest->flangComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->histPref*0.35 + $compPrefTest->langPref*0.3 + $compPrefTest->philPref*0.25 + $compPrefTest->geogPref*0.05 + $compPrefTest->flangPref*0.05) +2) *25;
                    break;
                case '8': // Edificación y Obra Civil. phy 25, tecd 20, mat 15, tech 15, geol 10, plar 10, phed 5
                    $pComp = (($compPrefTest->physComp*0.25 + $compPrefTest->tecdComp*0.2 + $compPrefTest->mathComp*0.15 + $compPrefTest->techComp*0.15 + $compPrefTest->geolComp*0.1 + $compPrefTest->plarComp*0.1 + $compPrefTest->phedComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->physPref*0.25 + $compPrefTest->tecdPref*0.2 + $compPrefTest->mathPref*0.15 + $compPrefTest->techPref*0.15 + $compPrefTest->geolPref*0.1 + $compPrefTest->plarPref*0.1 + $compPrefTest->phedPref*0.05) +2) *25;
                    break;
                case '9': // Educación. phil 35, lang 20, mat 15, 1lang 10, phy 5, bio 5, geog 5, hist 5
                    $pComp = (($compPrefTest->philComp*0.35 + $compPrefTest->langComp*0.2 + $compPrefTest->mathComp*0.15 + $compPrefTest->flangComp*0.1 + $compPrefTest->physComp*0.05 + $compPrefTest->bioComp*0.05 + $compPrefTest->geogComp*0.05 + $compPrefTest->histComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->philPref*0.35 + $compPrefTest->langPref*0.20 + $compPrefTest->mathPref*0.15 + $compPrefTest->flangPref*0.1 + $compPrefTest->physPref*0.05 + $compPrefTest->bioPref*0.05 + $compPrefTest->geogPref*0.05 + $compPrefTest->histPref*0.05) +2) *25;
                    break;
                case '10': // Electricidad y Electrónica. phy 30, tecd 25, mat 15, plar 15, tech 15, chem 10
                    $pComp = (($compPrefTest->physComp*0.3 + $compPrefTest->tecdComp*0.25 + $compPrefTest->mathComp*0.15 + $compPrefTest->plarComp*0.15 + $compPrefTest->techComp*0.15 + $compPrefTest->chemComp*0.1) +2) *25;
                    $pPref = (($compPrefTest->physPref*0.35 + $compPrefTest->tecdPref*0.15 + $compPrefTest->mathPref*0.15 + $compPrefTest->plarPref*0.15 + $compPrefTest->techPref*0.1 + $compPrefTest->chemPref*0.05) +2) *25;
                    break;
                case '11': // Energía y Agua. phy 25, tecd 20, chem 15, mat 10, tech 10, plar 10, geol 5, geog 5
                    $pComp = (($compPrefTest->physComp*0.25 + $compPrefTest->tecdComp*0.2 + $compPrefTest->chemComp*0.15 + $compPrefTest->mathComp*0.1 + $compPrefTest->techComp*0.1 + $compPrefTest->plarComp*0.1 + $compPrefTest->geolComp*0.05 + $compPrefTest->geogComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->physPref*0.25 + $compPrefTest->tecdPref*0.2 + $compPrefTest->chemPref*0.15 + $compPrefTest->mathPref*0.1 + $compPrefTest->techPref*0.1 + $compPrefTest->plarPref*0.1 + $compPrefTest->geolPref*0.05 + $compPrefTest->geogPref*0.05) +2) *25;
                    break;
                case '12': // Fabricación Mecánica y Maderera. plar 35, tecd 20, phy 15, phed 10, tech 10, chem 5, mat 5
                    $pComp = (($compPrefTest->plarComp*0.35 + $compPrefTest->tecdComp*0.2 + $compPrefTest->physComp*0.15 + $compPrefTest->phedComp*0.1 + $compPrefTest->techComp*0.1 + $compPrefTest->chemComp*0.05 + $compPrefTest->mathComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->plarPref*0.35 + $compPrefTest->tecdPref*0.2 + $compPrefTest->physPref*0.15 + $compPrefTest->phedPref*0.1 + $compPrefTest->techPref*0.1 + $compPrefTest->chemPref*0.05 + $compPrefTest->mathPref*0.05) +2) *25;
                    break;
                case '13': // Hostelería y Turismo. geog 15, lang 15, plar 15, 1lang 15, 2lang 10, phed 10, hist 10, bio 10
                    $pComp = (($compPrefTest->geogComp*0.15 + $compPrefTest->langComp*0.15 + $compPrefTest->plarComp*0.15 + $compPrefTest->flangComp*0.15 + $compPrefTest->slangComp*0.1 + $compPrefTest->phedComp*0.1 + $compPrefTest->histComp*0.1 + $compPrefTest->bioComp*0.1) +2) *25;
                    $pPref = (($compPrefTest->geogPref*0.15 + $compPrefTest->langPref*0.15 + $compPrefTest->plarPref*0.15 + $compPrefTest->flangPref*0.15 + $compPrefTest->slangPref*0.1 + $compPrefTest->phedPref*0.1 + $compPrefTest->histPref*0.1 + $compPrefTest->bioPref*0.1) +2) *25;
                    break;
                case '14': // Imagen Personal. plar 30, lang 25, phed 20, bio 10, tecd 5, tech 5, chem 5,
                    $pComp = (($compPrefTest->plarComp*0.3 + $compPrefTest->langComp*0.25 + $compPrefTest->phedComp*0.2 + $compPrefTest->bioComp*0.1 + $compPrefTest->tecdComp*0.05 + $compPrefTest->techComp*0.05 + $compPrefTest->chemComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->plarPref*0.3 + $compPrefTest->langPref*0.25 + $compPrefTest->phedPref*0.2 + $compPrefTest->bioPref*0.1 + $compPrefTest->tecdPref*0.05 + $compPrefTest->techPref*0.05 + $compPrefTest->chemPref*0.05) +2) *25;
                    break;
                case '15': // Imagen y Sonido. plar 30, mus 25, tech 20, phy 10, lan 10, tecd 5
                    $pComp = (($compPrefTest->plarComp*0.3 + $compPrefTest->musComp*0.25 + $compPrefTest->techComp*0.2 + $compPrefTest->physComp*0.1 + $compPrefTest->langComp*0.1 + $compPrefTest->tecdComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->plarPref*0.3 + $compPrefTest->musPref*0.25 + $compPrefTest->techPref*0.2 + $compPrefTest->physPref*0.1 + $compPrefTest->langPref*0.1 + $compPrefTest->tecdPref*0.05) +2) *25;
                    break;
                case '16': // Alimentación. chem 30, bio 25, tech 20, lang 10, plar 10, phed 5
                    $pComp = (($compPrefTest->chemComp*0.3 + $compPrefTest->bioComp*0.25 + $compPrefTest->techComp*0.2 + $compPrefTest->langComp*0.1 + $compPrefTest->plarComp*0.1 + $compPrefTest->phedComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->chemPref*0.3 + $compPrefTest->bioPref*0.25 + $compPrefTest->techPref*0.2 + $compPrefTest->langPref*0.1 + $compPrefTest->plarPref*0.1 + $compPrefTest->phedPref*0.05) +2) *25;
                    break;
                case '17': // Extracción, Terreno y Materiales. geol 30, chem 15, plar 10, phy 15, phed 10, tech 10, geog 5, tecd 5
                    $pComp = (($compPrefTest->geolComp*0.3 + $compPrefTest->chemComp*0.15 + $compPrefTest->physComp*0.15 + $compPrefTest->plarComp*0.1 + $compPrefTest->phedComp*0.1 + $compPrefTest->techComp*0.1 + $compPrefTest->geogComp*0.05 + $compPrefTest->tecdComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->geolPref*0.3 + $compPrefTest->chemPref*0.15 + $compPrefTest->physPref*0.15 + $compPrefTest->plarPref*0.1 + $compPrefTest->phedPref*0.1 + $compPrefTest->techPref*0.1 + $compPrefTest->geogPref*0.05 + $compPrefTest->tecdPref*0.05) +2) *25;
                    break;
                case '18': // Informática y Comunicaciones. tech 40, lang 15, phy 10, mat 10, 1lan 10, tecd 5, plar 5, phil 5
                    $pComp = (($compPrefTest->techComp*0.4 + $compPrefTest->langComp*0.15 + $compPrefTest->physComp*0.1 + $compPrefTest->mathComp*0.1 + $compPrefTest->flangComp*0.1 + $compPrefTest->tecdComp*0.05 + $compPrefTest->plarComp*0.05 + $compPrefTest->philComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->techPref*0.4 + $compPrefTest->langPref*0.15 + $compPrefTest->physPref*0.1 + $compPrefTest->mathPref*0.1 + $compPrefTest->flangPref*0.1 + $compPrefTest->tecdPref*0.05 + $compPrefTest->plarPref*0.05 + $compPrefTest->philPref*0.05) +2) *25;
                    break;
                case '19': // Instalación, Mantenimiento y Vehículos. phy 25, plar 30, phed 15, tech 10, tecd 10, lang 5, mat 5
                    $pComp = (($compPrefTest->plarComp*0.3 + $compPrefTest->physComp*0.25 + $compPrefTest->phedComp*0.15 + $compPrefTest->techComp*0.1 + $compPrefTest->tecdComp*0.1 + $compPrefTest->langComp*0.05 + $compPrefTest->mathComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->plarPref*0.3 + $compPrefTest->physPref*0.25 + $compPrefTest->phedPref*0.15 + $compPrefTest->techPref*0.1 + $compPrefTest->tecdPref*0.1 + $compPrefTest->langPref*0.05 + $compPrefTest->mathPref*0.05) +2) *25;
                    break;
                case '20': // Humanidades. lang 30, hist 25, phil 20, geog 15, 2lang 5, 1lang 5
                    $pComp = (($compPrefTest->langComp*0.3 + $compPrefTest->histComp*0.25 + $compPrefTest->philComp*0.2 + $compPrefTest->geogComp*0.15 + $compPrefTest->slangComp*0.05 + $compPrefTest->flangComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->langPref*0.3 + $compPrefTest->histPref*0.25 + $compPrefTest->philPref*0.2 + $compPrefTest->geogPref*0.15 + $compPrefTest->slangPref*0.05 + $compPrefTest->flangPref*0.05) +2) *25;
                    break;
                case '21': // Marítimo Pesquera. plar 25, lang 20, bio 20, phed 15, tech 10, tecd 5, phy 5,
                    $pComp = (($compPrefTest->plarComp*0.25 + $compPrefTest->langComp*0.2 + $compPrefTest->bioComp*0.2 + $compPrefTest->phedComp*0.15 + $compPrefTest->techComp*0.1 + $compPrefTest->tecdComp*0.05 + $compPrefTest->physComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->plarPref*0.25 + $compPrefTest->langPref*0.2 + $compPrefTest->bioPref*0.2 + $compPrefTest->phedPref*0.15 + $compPrefTest->techPref*0.1 + $compPrefTest->tecdPref*0.05 + $compPrefTest->physPref*0.05) +2) *25;
                    break;
                case '22': // Laboratorio e Investigación. chem 45, bio 15, phy 15, plar 10, lang 10, mat 5
                    $pComp = (($compPrefTest->chemComp*0.45 + $compPrefTest->bioComp*0.15 + $compPrefTest->physComp*0.15 + $compPrefTest->plarComp*0.1 + $compPrefTest->langComp*0.1 + $compPrefTest->mathComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->chemPref*0.45 + $compPrefTest->bioPref*0.15 + $compPrefTest->physPref*0.15 + $compPrefTest->plarPref*0.1 + $compPrefTest->langPref*0.1 + $compPrefTest->mathPref*0.05) +2) *25;
                    break;
                case '23': // Sanidad. bio 35, chem 15, plar 15, phil 10, tech 10, phy 5, tecd 5, phed 5,
                    $pComp = (($compPrefTest->bioComp*0.35 + $compPrefTest->chemComp*0.15 + $compPrefTest->plarComp*0.15 + $compPrefTest->philComp*0.1 + $compPrefTest->techComp*0.1 + $compPrefTest->physComp*0.05 + $compPrefTest->tecdComp*0.05 + $compPrefTest->phedComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->bioPref*0.35 + $compPrefTest->chemPref*0.15 + $compPrefTest->plarPref*0.15 + $compPrefTest->philPref*0.1 + $compPrefTest->techPref*0.1 + $compPrefTest->physPref*0.05 + $compPrefTest->tecdPref*0.05 + $compPrefTest->phedPref*0.05) +2) *25;
                    break;
                case '24': // Seguridad, Emergencias y Medioambiente. bio 25, chem 20, lang 20, phed 15, phil 10, geol 10
                    $pComp = (($compPrefTest->bioComp*0.25 + $compPrefTest->chemComp*0.2 + $compPrefTest->langComp*0.2 + $compPrefTest->phedComp*0.15 + $compPrefTest->philComp*0.1 + $compPrefTest->geolComp*0.1) +2) *25;
                    $pPref = (($compPrefTest->bioPref*0.25 + $compPrefTest->chemPref*0.2 + $compPrefTest->langPref*0.2 + $compPrefTest->phedPref*0.15 + $compPrefTest->philPref*0.1 + $compPrefTest->geolPref*0.1) +2) *25;
                    break;
                case '25': // Servicios Sociales. phil 35, lang 35, phed 10, 1lang 5, bio 5, plar 5, hist 5,
                    $pComp = (($compPrefTest->philComp*0.35 + $compPrefTest->langComp*0.35 + $compPrefTest->phedComp*0.1 + $compPrefTest->flangComp*0.05 + $compPrefTest->bioComp*0.05 + $compPrefTest->plarComp*0.05 + $compPrefTest->histComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->philPref*0.35 + $compPrefTest->langPref*0.35 + $compPrefTest->phedPref*0.1 + $compPrefTest->flangPref*0.05 + $compPrefTest->bioPref*0.05 + $compPrefTest->plarPref*0.05 + $compPrefTest->histPref*0.05) +2) *25;
                    break;
                case '26': // Ingenierías Matemáticas. mat 40, phy 35, tecd 15, tech 10, 
                    $pComp = (($compPrefTest->mathComp*0.4 + $compPrefTest->phyComp*0.35 + $compPrefTest->tecdComp*0.15 + $compPrefTest->techComp*0.1) +2) *25;
                    $pPref = (($compPrefTest->mathPref*0.4 + $compPrefTest->phyPref*0.35 + $compPrefTest->tecdPref*0.15 + $compPrefTest->techPref*0.1) +2) *25;
                    break;
                case '27': // Lengua e Idiomas. 1lang 30, 2lang 30, lang 25, phil 10, geog 5,
                    $pComp = (($compPrefTest->flangComp*0.3 + $compPrefTest->slangComp*0.3 + $compPrefTest->langComp*0.25 + $compPrefTest->philComp*0.1 + $compPrefTest->geogComp*0.05) +2) *25;
                    $pPref = (($compPrefTest->flangPref*0.3 + $compPrefTest->slangPref*0.3 + $compPrefTest->langPref*0.25 + $compPrefTest->philPref*0.1 + $compPrefTest->geogPref*0.05) +2) *25;
                    break;    
            }
            $escala = 6; // Grado de acercamiento al 0 o al 100, a partir de 2.5
            $sesgo = 7; // Grado de sesgo hacia valores más altos, a partir de 1.5
            $promedio = $pComp * 0.4 + $pPref * 0.6;
            $ajustado = $promedio + ($sesgo - 1) * (50 - abs($promedio - 50)) / 50;
            $porcentaje = round(100 / (1 + exp(-$escala * ($ajustado - 50) / 50)), 0);
        }

        return $porcentaje;
    }
}
