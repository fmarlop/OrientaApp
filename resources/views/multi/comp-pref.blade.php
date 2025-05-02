<x-layout>

    <main x-data="testApp()" x-init="updateBodyBackground()" {{-- x-bind:class="`bg-cp-${currentStep}`" :class="'bg-cp-' + currentStep" --}}>

        <div class="test">

            <h1>{{ __('Test de Competencias y Preferencias') }}</h1>

            <h5>{{ __('Paso ') }}<span x-text="currentStep"></span>{{ __(' de ') }}<span x-text="totalSteps"></span></h5> {{-- Número de paso --}}

            <div class="testbar"> {{-- Barra de progresión --}}
                <div> {{-- barra gris --}}
                    <div :style="{ width: (currentStep / totalSteps * 100) + '%' }"></div> {{-- relleno de la barra --}}
                </div>
            </div>

            <form @submit.prevent="submitStep">
                <template x-for="(step, index) in steps" :key="index"> {{-- template para cada pregunta del test --}}
                    <div class="testcontent" x-show="currentStep -1 === index">
                        <h6 x-text="step.title"></h6>
                        <label>{{ __('¿Cómo de bien se te da?') }}</label>
                        <input type="range" :name="step.name + 'Comp'" min="-2" max="2" step="1" x-model="answers[step.name + 'Comp']" />
                        <div> {{-- indicadores de respuesta --}}
                            <span :class="{
                                'col-start-1 text-rose-200 drop-shadow-[0_0_4px_#ff8888]': answers[step.name + 'Comp'] == -2,
                                'col-start-2 text-orange-200 drop-shadow-[0_0_4px_#dddd88]': answers[step.name + 'Comp'] == -1,
                                'col-start-3 text-gray-200 drop-shadow-[0_0_4px_#cccccc]': answers[step.name + 'Comp'] == 0,
                                'col-start-4 text-lime-200 drop-shadow-[0_0_4px_#88ff88]': answers[step.name + 'Comp'] == 1,
                                'col-start-5 text-teal-200 drop-shadow-[0_0_4px_#8888ff]': answers[step.name + 'Comp'] == 2
                            }" x-text="compSlider[answers[step.name + 'Comp']]"></span>
                        </div>
                        <label>{{ __('¿Cuánto te gusta?') }}</label>
                        <input type="range" :name="step.name + 'Pref'" min="-2" max="2" step="1" x-model="answers[step.name + 'Pref']"/>
                        <div> {{-- indicadores de respuesta --}}
                            <span :class="{
                                'col-start-1 text-rose-200 drop-shadow-[0_0_4px_#ff8888]': answers[step.name + 'Pref'] == -2,
                                'col-start-2 text-orange-200 drop-shadow-[0_0_4px_#dddd88]': answers[step.name + 'Pref'] == -1,
                                'col-start-3 text-gray-200 drop-shadow-[0_0_4px_#cccccc]': answers[step.name + 'Pref'] == 0,
                                'col-start-4 text-lime-200 drop-shadow-[0_0_4px_#88ff88]': answers[step.name + 'Pref'] == 1,
                                'col-start-5 text-teal-200 drop-shadow-[0_0_4px_#8888ff]': answers[step.name + 'Pref'] == 2
                            }" x-text="prefSlider[answers[step.name + 'Pref']]"></span>
                        </div>
                    </div>
                </template>
                <div class="testbuttons"> {{-- botones finales --}}
                    <button type="button" name="leftb" x-show="currentStep > 1" @click="currentStep-- ; updateBodyBackground()">
                        {{ __('Anterior') }}
                    </button>
                    <button type="button" name="placeholder" x-show="currentStep == 1">
                    </button>
                    <button type="submit" name="rightb" x-show="currentStep < totalSteps">
                        {{ __('Siguiente') }}
                    </button>
                    <button type="submit" name="rightb" x-show="currentStep == totalSteps" x-ref="btn">
                        {{ __('Terminar') }}
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        function testApp() {
            return {
                currentStep: 1,
                totalSteps: 16,
                steps: [
                    { title: '{{ __('Matemáticas') }}', name: 'math' },
                    { title: '{{ __('Lengua y Literatura') }}', name: 'lang' },
                    { title: '{{ __('Historia') }}', name: 'hist' },
                    { title: '{{ __('Primer idioma extranjero') }}', name: 'flang' },
                    { title: '{{ __('Segundo idioma extranjero') }}', name: 'slang' },
                    { title: '{{ __('Física') }}', name: 'phys' },
                    { title: '{{ __('Química') }}', name: 'chem' },
                    { title: '{{ __('Biología') }}', name: 'bio' },
                    { title: '{{ __('Geología') }}', name: 'geol' },
                    { title: '{{ __('Geografía') }}', name: 'geog' },
                    { title: '{{ __('Dibujo Técnico') }}', name: 'tecd' },
                    { title: '{{ __('Artes plásticas') }}', name: 'plar' },
                    { title: '{{ __('Tecnología') }}', name: 'tech' },
                    { title: '{{ __('Filosofía') }}', name: 'phil' },
                    { title: '{{ __('Educación Física') }}', name: 'phed' },
                    { title: '{{ __('Música') }}', name: 'mus' },
                ],
                answers: { // inicializar valores en 0 porque si no se mueven los sliders no se almacena ningún valor.
                    mathComp: 0,
                    mathPref: 0,
                    langComp: 0,
                    langPref: 0,
                    histComp: 0,
                    histPref: 0,
                    flangComp: 0,
                    flangPref: 0,
                    slangComp: 0,
                    slangPref: 0,
                    physComp: 0,
                    physPref: 0,
                    chemComp: 0,
                    chemPref: 0,
                    bioComp: 0,
                    bioPref: 0,
                    geolComp: 0,
                    geolPref: 0,
                    geogComp: 0,
                    geogPref: 0,
                    tecdComp: 0,
                    tecdPref: 0,
                    plarComp: 0,
                    plarPref: 0,
                    techComp: 0,
                    techPref: 0,
                    philComp: 0,
                    philPref: 0,
                    phedComp: 0,
                    phedPref: 0,
                    musComp: 0,
                    musPref: 0,
                },

                /* indicadores de respuesta */
                compSlider: { 
                    '-2': '{{ __('Desastroso') }}',
                    '-1': '{{ __('Torpe') }}',
                    '0': '{{ __('Promedio') }}',
                    '1': '{{ __('Hábil') }}',
                    '2': '{{ __('Excelente') }}',
                },

                prefSlider: {
                    '-2': '{{ __('Detestable') }}',
                    '-1': '{{ __('Aburrido') }}',
                    '0': '{{ __('Indiferente') }}',
                    '1': '{{ __('Interesante') }}',
                    '2': '{{ __('Apasionante') }}',
                },

                bgColors: [
                    'bg-red-950',
                    'bg-blue-950',
                    'bg-yellow-950',
                    'bg-sky-950',
                    'bg-green-950',
                    'bg-violet-950',
                    'bg-emerald-950',
                    'bg-lime-950',
                    'bg-amber-950',
                    'bg-teal-950',
                    'bg-pink-950',
                    'bg-indigo-950',
                    'bg-purple-950',
                    'bg-cyan-950',
                    'bg-orange-950',
                    'bg-fuchsia-950',
                    
                    'bg-rose-950',
                ],

                updateBodyBackground() {
                    const body = document.body;
                    this.bgColors.forEach(color => body.classList.remove(color));
                    body.classList.add(this.bgColors[this.currentStep - 1]);
                },

                async submitStep() {
                    // Cuando el botón es Terminar
                    if (this.currentStep === this.totalSteps) {
                        console.log('Enviando respuestas finales:', this.answers);
                        try {
                            this.$refs.btn.disabled = true; // deshabilita el botón, luego añado algunas clases y un icono de fontawesome.
                            this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                            this.$refs.btn.classList.add('bg-indigo-400');
                            this.$refs.btn.innerHTML =
                                `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                                <i class="fa-solid fa-spinner animate-spin"></i>
                                </span>‎ {{ __('Espere por favor...')}}`;

                            const response = await fetch('{{ route('updateComppref') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify(this.answers)
                            });

                            if (!response.ok) {
                                throw new Error(`Error del servidor: ${response.status}`);
                            }

                            const result = await response.json();
                            // Redirigir a la vista compatibilidad desde el frontend
                            window.location.href = '{{ route('compatibility') }}';

                        } catch (error) {
                            console.error('Error al enviar:', error);
                            alert('{{ __('Hubo un error al enviar tus respuestas. Inténtalo de nuevo más tarde.') }}');
                        }
                    // Cuando el botón es Siguiente
                    } else {
                        this.currentStep++;
                        this.updateBodyBackground();
                    }
                }
            };
        }
    </script>
</x-layout>
