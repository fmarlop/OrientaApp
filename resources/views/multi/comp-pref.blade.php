<x-layout>

    @php
        $total_steps = 16; // número total de pasos
    @endphp
    
    <main>
        <h1>{{ __('Test de Competencias y Preferencias') }}</h1>
    
        <div class="test">
    
            <h5>{{ __('Paso ') }}{{ session('currentStep', 1) }}{{ __(' de ') }}{{$total_steps}}</h6> {{-- Número de paso --}}
                
            @php
                $currentStep = session('currentStep', 1);
            @endphp
    
            <form action="{{ route('updateComppref') }}" method="POST">
                @csrf
                @if($currentStep == 1) {{-- Cada div es una pregunta del test --}}
                <div>
                    <h6>{{ __('Matemáticas') }}</h6>
                    <label for="mathComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="mathComp" min="-2" max="2" step="1" value="0"/>
                    @error('mathComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="mathPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="mathPref" min="-2" max="2" step="1" value="0"/>
                    @error('mathPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 2)
                <div>
                    <h6>{{ __('Lengua y Literatura') }}</h6>
                    <label for="langComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="langComp" min="-2" max="2" step="1" value="0"/>
                    @error('langComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="langPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="langPref" min="-2" max="2" step="1" value="0"/>
                    @error('langPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 3)
                <div>
                    <h6>{{ __('Historia') }}</h6>
                    <label for="histComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="histComp" min="-2" max="2" step="1" value="0"/>
                    @error('histComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="histPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="histPref" min="-2" max="2" step="1" value="0"/>
                    @error('histPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 4)
                <div>
                    <h6>{{ __('Primer idioma extranjero') }}</h6>
                    <label for="flangComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="flangComp" min="-2" max="2" step="1" value="0"/>
                    @error('flangComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="flangPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="flangPref" min="-2" max="2" step="1" value="0"/>
                    @error('flangPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 5)
                <div>
                    <h6>{{ __('Segundo idioma extranjero') }}</h6>
                    <label for="slangComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="slangComp" min="-2" max="2" step="1" value="0"/>
                    @error('slangComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="slangPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="slangPref" min="-2" max="2" step="1" value="0"/>
                    @error('slangPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 6)
                <div>
                    <h6>{{ __('Física') }}</h6>
                    <label for="physComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="physComp" min="-2" max="2" step="1" value="0"/>
                    @error('physComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="physPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="physPref" min="-2" max="2" step="1" value="0"/>
                    @error('physPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 7)
                <div>
                    <h6>{{ __('Química') }}</h6>
                    <label for="chemComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="chemComp" min="-2" max="2" step="1" value="0"/>
                    @error('chemComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="chemPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="chemPref" min="-2" max="2" step="1" value="0"/>
                    @error('chemPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 8)
                <div>
                    <h6>{{ __('Biología') }}</h6>
                    <label for="bioComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="bioComp" min="-2" max="2" step="1" value="0"/>
                    @error('bioComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="bioPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="bioPref" min="-2" max="2" step="1" value="0"/>
                    @error('bioPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 9)
                <div>
                    <h6>{{ __('Geología') }}</h6>
                    <label for="geolComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="geolComp" min="-2" max="2" step="1" value="0"/>
                    @error('geolComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="geolPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="geolPref" min="-2" max="2" step="1" value="0"/>
                    @error('geolPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 10)
                <div>
                    <h6>{{ __('Geografía') }}</h6>
                    <label for="geogComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="geogComp" min="-2" max="2" step="1" value="0"/>
                    @error('geogComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="geogPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="geogPref" min="-2" max="2" step="1" value="0"/>
                    @error('geogPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 11)
                <div>
                    <h6>{{ __('Dibujo Técnico') }}</h6>
                    <label for="tecdComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="tecdComp" min="-2" max="2" step="1" value="0"/>
                    @error('tecdComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="tecdPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="tecdPref" min="-2" max="2" step="1" value="0"/>
                    @error('tecdPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 12)
                <div>
                    <h6>{{ __('Artes plásticas') }}</h6>
                    <label for="plarComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="plarComp" min="-2" max="2" step="1" value="0"/>
                    @error('plarComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="plarPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="plarPref" min="-2" max="2" step="1" value="0"/>
                    @error('plarPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 13)
                <div>
                    <h6>{{ __('Tecnología') }}</h6>
                    <label for="techComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="techComp" min="-2" max="2" step="1" value="0"/>
                    @error('techComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="techPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="techPref" min="-2" max="2" step="1" value="0"/>
                    @error('techPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 14)
                <div>
                    <h6>{{ __('Filosofía') }}</h6>
                    <label for="philComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="philComp" min="-2" max="2" step="1" value="0"/>
                    @error('philComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="philPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="philPref" min="-2" max="2" step="1" value="0"/>
                    @error('philPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @elseif($currentStep == 15)
                <div>
                    <h6>{{ __('Educación Física') }}</h6>
                    <label for="phedComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="phedComp" min="-2" max="2" step="1" value="0"/>
                    @error('phedComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="phedPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="phedPref" min="-2" max="2" step="1" value="0"/>
                    @error('phedPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @else
                <div>
                    <h6>{{ __('Música') }}</h6>
                    <label for="musComp">{{ __('¿Cómo de bien se te da?') }}</label>
                    <input type="range" name="musComp" min="-2" max="2" step="1" value="0"/>
                    @error('musComp')
                    <span>{{$message}}</span>
                    @enderror
                    <label for="musPref">{{ __('¿Cuánto te gusta?') }}</label>
                    <input type="range" name="musPref" min="-2" max="2" step="1" value="0"/>
                    @error('musPref')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                @endif
                
                @if($currentStep > 1)
                <button type="submit" name="action" value="previous">{{ __('Anterior') }}</button>
                @endif
                @if($currentStep < $total_steps)
                <button type="submit" name="action" value="next">{{ __('Siguiente') }}</button>
                @endif
                @if($currentStep == $total_steps)
                <button type="submit" name="action">{{ __('Terminar') }}</button>
                @endif
            </form>
    
        </div>
	</main>
</x-layout>