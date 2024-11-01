<x-layout>

    @php
        $total_steps = 16; // número total de pasos
    @endphp
    
    <h1>Test de Competencias y Preferencias</h1>

    <div class="card">

        <h5>Paso {{ session('currentStep', 1) }} de {{$total_steps}} </h6> {{-- Número de paso --}}
            
        @php
            $currentStep = session('currentStep', 1);
        @endphp

        <form action="{{ route('updateComppref') }}" method="POST">
            @csrf
            @if($currentStep == 1) {{-- Cada div es una pregunta del test --}}
            <div>
                <h6>Matemáticas</h6>
                <label for="mathComp">¿Cómo de bien se te da?</label>
                <input type="range" name="mathComp" min="-2" max="2" step="1" value="0"/>
                @error('mathComp')
                <span>{{$message}}</span>
                @enderror
                <label for="mathPref">¿Cuánto te gusta?</label>
                <input type="range" name="mathPref" min="-2" max="2" step="1" value="0"/>
                @error('mathPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 2)
            <div>
                <h6>Lengua y Literatura</h6>
                <label for="langComp">¿Cómo de bien se te da?</label>
                <input type="range" name="langComp" min="-2" max="2" step="1" value="0"/>
                @error('langComp')
                <span>{{$message}}</span>
                @enderror
                <label for="langPref">¿Cuánto te gusta?</label>
                <input type="range" name="langPref" min="-2" max="2" step="1" value="0"/>
                @error('langPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 3)
            <div>
                <h6>Historia</h6>
                <label for="histComp">¿Cómo de bien se te da?</label>
                <input type="range" name="histComp" min="-2" max="2" step="1" value="0"/>
                @error('histComp')
                <span>{{$message}}</span>
                @enderror
                <label for="histPref">¿Cuánto te gusta?</label>
                <input type="range" name="histPref" min="-2" max="2" step="1" value="0"/>
                @error('histPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 4)
            <div>
                <h6>Primer idioma extranjero</h6>
                <label for="flangComp">¿Cómo de bien se te da?</label>
                <input type="range" name="flangComp" min="-2" max="2" step="1" value="0"/>
                @error('flangComp')
                <span>{{$message}}</span>
                @enderror
                <label for="flangPref">¿Cuánto te gusta?</label>
                <input type="range" name="flangPref" min="-2" max="2" step="1" value="0"/>
                @error('flangPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 5)
            <div>
                <h6>Segundo idioma extranjero</h6>
                <label for="slangComp">¿Cómo de bien se te da?</label>
                <input type="range" name="slangComp" min="-2" max="2" step="1" value="0"/>
                @error('slangComp')
                <span>{{$message}}</span>
                @enderror
                <label for="slangPref">¿Cuánto te gusta?</label>
                <input type="range" name="slangPref" min="-2" max="2" step="1" value="0"/>
                @error('slangPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 6)
            <div>
                <h6>Física</h6>
                <label for="physComp">¿Cómo de bien se te da?</label>
                <input type="range" name="physComp" min="-2" max="2" step="1" value="0"/>
                @error('physComp')
                <span>{{$message}}</span>
                @enderror
                <label for="physPref">¿Cuánto te gusta?</label>
                <input type="range" name="physPref" min="-2" max="2" step="1" value="0"/>
                @error('physPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 7)
            <div>
                <h6>Química</h6>
                <label for="chemComp">¿Cómo de bien se te da?</label>
                <input type="range" name="chemComp" min="-2" max="2" step="1" value="0"/>
                @error('chemComp')
                <span>{{$message}}</span>
                @enderror
                <label for="chemPref">¿Cuánto te gusta?</label>
                <input type="range" name="chemPref" min="-2" max="2" step="1" value="0"/>
                @error('chemPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 8)
            <div>
                <h6>Biología</h6>
                <label for="bioComp">¿Cómo de bien se te da?</label>
                <input type="range" name="bioComp" min="-2" max="2" step="1" value="0"/>
                @error('bioComp')
                <span>{{$message}}</span>
                @enderror
                <label for="bioPref">¿Cuánto te gusta?</label>
                <input type="range" name="bioPref" min="-2" max="2" step="1" value="0"/>
                @error('bioPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 9)
            <div>
                <h6>Geología</h6>
                <label for="geolComp">¿Cómo de bien se te da?</label>
                <input type="range" name="geolComp" min="-2" max="2" step="1" value="0"/>
                @error('geolComp')
                <span>{{$message}}</span>
                @enderror
                <label for="geolPref">¿Cuánto te gusta?</label>
                <input type="range" name="geolPref" min="-2" max="2" step="1" value="0"/>
                @error('geolPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 10)
            <div>
                <h6>Geografía</h6>
                <label for="geogComp">¿Cómo de bien se te da?</label>
                <input type="range" name="geogComp" min="-2" max="2" step="1" value="0"/>
                @error('geogComp')
                <span>{{$message}}</span>
                @enderror
                <label for="geogPref">¿Cuánto te gusta?</label>
                <input type="range" name="geogPref" min="-2" max="2" step="1" value="0"/>
                @error('geogPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 11)
            <div>
                <h6>Dibujo Técnico</h6>
                <label for="tecdComp">¿Cómo de bien se te da?</label>
                <input type="range" name="tecdComp" min="-2" max="2" step="1" value="0"/>
                @error('tecdComp')
                <span>{{$message}}</span>
                @enderror
                <label for="tecdPref">¿Cuánto te gusta?</label>
                <input type="range" name="tecdPref" min="-2" max="2" step="1" value="0"/>
                @error('tecdPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 12)
            <div>
                <h6>Artes plásticas</h6>
                <label for="plarComp">¿Cómo de bien se te da?</label>
                <input type="range" name="plarComp" min="-2" max="2" step="1" value="0"/>
                @error('plarComp')
                <span>{{$message}}</span>
                @enderror
                <label for="plarPref">¿Cuánto te gusta?</label>
                <input type="range" name="plarPref" min="-2" max="2" step="1" value="0"/>
                @error('plarPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 13)
            <div>
                <h6>Tecnología</h6>
                <label for="techComp">¿Cómo de bien se te da?</label>
                <input type="range" name="techComp" min="-2" max="2" step="1" value="0"/>
                @error('techComp')
                <span>{{$message}}</span>
                @enderror
                <label for="techPref">¿Cuánto te gusta?</label>
                <input type="range" name="techPref" min="-2" max="2" step="1" value="0"/>
                @error('techPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 14)
            <div>
                <h6>Filosofía</h6>
                <label for="philComp">¿Cómo de bien se te da?</label>
                <input type="range" name="philComp" min="-2" max="2" step="1" value="0"/>
                @error('philComp')
                <span>{{$message}}</span>
                @enderror
                <label for="philPref">¿Cuánto te gusta?</label>
                <input type="range" name="philPref" min="-2" max="2" step="1" value="0"/>
                @error('philPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @elseif($currentStep == 15)
            <div>
                <h6>Educación Física</h6>
                <label for="phedComp">¿Cómo de bien se te da?</label>
                <input type="range" name="phedComp" min="-2" max="2" step="1" value="0"/>
                @error('phedComp')
                <span>{{$message}}</span>
                @enderror
                <label for="phedPref">¿Cuánto te gusta?</label>
                <input type="range" name="phedPref" min="-2" max="2" step="1" value="0"/>
                @error('phedPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @else
            <div>
                <h6>Música</h6>
                <label for="musComp">¿Cómo de bien se te da?</label>
                <input type="range" name="musComp" min="-2" max="2" step="1" value="0"/>
                @error('musComp')
                <span>{{$message}}</span>
                @enderror
                <label for="musPref">¿Cuánto te gusta?</label>
                <input type="range" name="musPref" min="-2" max="2" step="1" value="0"/>
                @error('musPref')
                <span>{{$message}}</span>
                @enderror
            </div>
            @endif
            
            @if($currentStep > 1)
            <button type="submit" name="action" value="previous">-</button>
            @endif
            @if($currentStep < $total_steps)
            <button type="submit" name="action" value="next">Siguiente</button>
            @endif
            @if($currentStep == $total_steps)
            <button type="submit" name="action">Terminar</button>
            @endif
        </form>

    </div>
</x-layout>