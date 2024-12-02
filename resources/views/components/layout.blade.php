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
        <nav>
            {{-- Links principales --}}
            <div class="link-group">
                <a href="{{ route('home') }}" class="home-btn"><img src="{{ asset('storage/' . 'web_images/OrientaLogox128.png') }}" alt="" /></a> {{-- uso funciones de ayuda route para la navegación. No usar ruta directamente sino función asset() porque si no no puede acceder desde las rutas crud creadas con la función resources() --}}
                <a href="{{ route('posts.index') }}">Comunidad</a>
            </div>
            {{-- Idiomas --}}
            <div class="lang">
                <a href="{{ route('language.switch', ['locale' => 'es']) }}"><img src="{{ asset('storage/' . 'web_images/es.jpg') }}" alt="Español" /></a>
                <a href="{{ route('language.switch', ['locale' => 'en']) }}"><img src="{{ asset('storage/' . 'web_images/en.jpg') }}" alt="Inglés" /></a>
            </div>
            @auth {{-- directiva para mostrar contenido si estamos logeados --}}
                <div class="deploy-box" x-data="{ open: false }"> {{-- añado funcionalidad de Alpine.js a este contenedor con 'x-data', y defino la variable 'open' --}}
                    {{-- Botón de menú desplegable --}}
                    <button x-on:click="open = !open" type="button" class="round-btn"> {{-- para que al clicar este botón conmute el valor de la variable 'open', cambiando entre true o false, usando 'x-on' de Alpine.js (@click también es posible) --}}
                        <img src="https://picsum.photos/200" alt="" /> {{-- la url de la imagen es una imagen random, más info en https://picsum.photos/. --}}
                    </button>
                    {{-- Menú desplegable --}}
                    <div x-show="open" x-on:click.outside='open=false' class="deployable"> {{-- para mostrar o no este contenido uso 'x-show' de Alpine.js que toma el valor de la variable 'open'. Y si clico fuera del botón tampoco mostrará el contenido. --}}
                        <p>{{ auth()->user()->username }}</p> {{-- hago que muestre el nombre del usuario, función auxiliar auth() que nos devuelve el usuario autenticado, función auxiliar user() que nos devuelve la instancia del usuario, y de ello la propiedad username. --}}
                        <a href="{{ route('dashboard') }}">Panel</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button>Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            @endauth
            @guest {{-- directiva para mostrar contenido si no estamos logeados --}}
                <div class="link-group">
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    <a href="{{ route('register') }}">Registrarse</a>
                </div>
            @endguest
        </nav>
    </header>

    {{ $slot }} {{-- uso variables especiales slot para mostrar datos/secciones dinámicas. --}}

    <footer>
        <a href="#"><span>Volver arriba</span><i class="fa-regular fa-circle-up text-3xl animate-bounce"></i></a>
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
                        </span>Espere por favor...`;

                    this.$el.submit()
                }
            }))
        })
    </script>
</body>
</html>
