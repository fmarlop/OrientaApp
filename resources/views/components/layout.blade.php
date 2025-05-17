{{--
    componente vista que servirá de layout principal para casi todo el proyecto. Lo creé con el comando 'php artisan make:component layout --view'. Lo llamaré usando etiquetas de componente "x-".
--}}

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ env('APP_NAME')}}</title>
    {{-- <link rel="stylesheet" type="text/css" href="../resources/css/app.css" /> {{-- etiqueta para linkear css de la manera tradicional --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> {{-- link solo para importar un icono de fontawesome para los botones de formularios --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> {{-- importo Alpine.js https://alpinejs.dev/ --}}
	@vite(['resources/css/app.css', 'resources/js/app.js']) {{-- uso vite para hacer cambios en tiempo real en el proyecto sin tener que actualizar. Uso el comando de consola 'npm run dev' para poner en marcha el proceso. Con 'npm run build' crearía los assets y no haría falta el otro comando. --}}
</head>
<body>
    <header>
        <nav x-data="{ mobile: false }"> {{-- x-data y x-show van a servir para controlar qué contenidos se muestran y en qué condiciones --}}
            {{-- Links principales --}}
            <div class="link-group">
                <a href="{{ route('home') }}" class="home-btn"><img src="{{ asset('storage/' . 'web_images/OrientaLogox128.png') }}" alt="" /></a> {{-- uso funciones de ayuda route para la navegación. No usar ruta directamente sino función asset() porque si no no puede acceder desde las rutas crud creadas con la función resources() --}}
                {{-- Nav completa no movil --}}
                <div>
                    <a href="{{ route('posts.index') }}">{{ __('Comunidad') }}</a>
                    <div x-data="{ section: false }" @mouseenter="section = true" @mouseleave="section = false">
                        <a class="py-2" href="{{ route('nav.sections') }}">{{ __('Secciones') }}</a>
                        <div x-show="section">
                            <a href="{{ route('nav.self-knowledge') }}">{{ __('Autoconocimiento') }}</a>
                            <a href="{{ route('nav.action-plan') }}">{{ __('Plan de Acción') }}</a>
                            <a href="{{ route('nav.extras') }}">{{ __('Extras') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Idiomas --}}
            <div class="lang" x-data="{ lang: false }">
                <button x-on:click="lang = !lang"> {{-- botón --}}
                    <img src="{{ asset('storage/web_images/' . app()->getLocale() . '.jpg') }}" alt="{{ app()->getLocale() }}" />
                    {{ strtoupper(app()->getLocale()) }}
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="lang" x-on:click.outside="lang=false"> {{-- desplegable; si se hace clic fuera desaparece el desplegable --}}
                    <a href="{{ route('language.switch', ['locale' => 'es']) }}"><img src="{{ asset('storage/' . 'web_images/es.jpg') }}" alt="Español" /></a>
                    <a href="{{ route('language.switch', ['locale' => 'en']) }}"><img src="{{ asset('storage/' . 'web_images/en.jpg') }}" alt="Inglés" /></a>
                </div>
            </div>
            @auth {{-- directiva para mostrar contenido si estamos logeados --}}
            <div class="deploy-box" x-data="{ prof: false }"> {{-- añado funcionalidad de Alpine.js a este contenedor con 'x-data', y defino la variable 'prof' --}}
                {{-- Botón de menú desplegable --}}
                <button x-on:click="prof = !prof" type="button" class="hidden-flex round-btn"> {{-- para que al clicar este botón conmute el valor de la variable 'prof', cambiando entre true o false, usando 'x-on' de Alpine.js (@click también es posible) --}}
                    <img src="https://picsum.photos/200" alt="" /> {{-- la url de la imagen es una imagen random, más info en https://picsum.photos/. --}}
                </button>
                {{-- Menú desplegable --}}
                <div x-show="prof" x-on:click.outside='prof=false' class="deployable"> {{-- para mostrar o no este contenido uso 'x-show' de Alpine.js que toma el valor de la variable 'prof'. Y si clico fuera del botón tampoco mostrará el contenido. --}}
                    <p>{{ auth()->user()->username }}</p> {{-- hago que muestre el nombre del usuario, función auxiliar auth() que nos devuelve el usuario autenticado, función auxiliar user() que nos devuelve la instancia del usuario, y de ello la propiedad username. --}}
                    <a href="{{ route('dashboard') }}">{{ __('Panel') }}</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button>{{ __('Cerrar sesión') }}</button>
                    </form>
                </div>
            </div>
            @endauth
            @guest {{-- directiva para mostrar contenido si no estamos logeados --}}
            <div class="hidden-flex link-group">
                <a href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                <a href="{{ route('register') }}">{{ __('Registrarse') }}</a>
            </div>
            @endguest
            {{-- Botón desplegable solo móviles --}}
            <button @click="mobile = !mobile" class="ham">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            {{-- Nav desplegable móvil --}}
            <div class="mobile" x-show="mobile" x-on:click.outside='mobile=false'
            x-transition:enter="transition duration-100"
            x-transition:enter-start="opacity-0 translate-x-14"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition duration-200"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-14"> {{-- transiciones para que el menú aparezca por la derecha --}}
                @auth {{-- directiva para mostrar contenido si estamos logeados --}}{{-- desplegable; si se hace clic fuera desaparece el desplegable --}}
                    <p>{{ auth()->user()->username }}</p> {{-- hago que muestre el nombre del usuario, función auxiliar auth() que nos devuelve el usuario autenticado, función auxiliar user() que nos devuelve la instancia del usuario, y de ello la propiedad username. --}}
                    <a href="{{ route('dashboard') }}">{{ __('Panel') }}</a>
                @endauth
                @guest {{-- directiva para mostrar contenido si no estamos logeados --}}
                    <a href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    <a href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                @endguest
                <a href="{{ route('posts.index') }}">{{ __('Comunidad') }}</a>
                <a href="{{ route('nav.sections') }}">{{ __('Secciones') }}</a>
                <a href="{{ route('nav.self-knowledge') }}">{{ __('Autoconocimiento') }}</a>
                <a href="{{ route('nav.action-plan') }}">{{ __('Plan de Acción') }}</a>
                <a href="{{ route('nav.extras') }}">{{ __('Extras') }}</a>
                @auth {{-- directiva para mostrar contenido si estamos logeados --}}
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button>{{ __('Cerrar sesión') }}</button>
                </form>
                @endauth
            </div>
        </nav>
    </header>
    
    {{ $slot }} {{-- uso variables especiales slot para mostrar datos/secciones dinámicas. --}}
    
    <footer>
        <a href="#"><span>{{ __('Volver arriba') }}</span><i class="fa-regular fa-circle-up text-3xl animate-bounce"></i></a>
    </footer>
    
    <script> // script para que los botones de formularios reaccionen a la espera.
        // Colocar en formulario esto: x-data="formSubmit" @submit.prevent="submit" y en el botón esto: x-ref="btn".
        document.addEventListener('alpine:init', () => {
            Alpine.data('formSubmit', () => ({
                submit() {
                    this.$refs.btn.disabled = true; // deshabilita el botón, luego añado algunas clases y un icono de fontawesome.
                    this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                    this.$refs.btn.classList.add('bg-indigo-400');
                    this.$refs.btn.innerHTML =
                        `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                        <i class="fa-solid fa-spinner animate-spin"></i>
                        </span>{{ __('Espere por favor...')}}`;

                    this.$el.submit()
                }
            }))
        })
    </script>
</body>
</html>
