<x-layout>
    
    <main>
        <div class="pretest">
            <h1>Test de Competencias y Preferencias</h1>
            <img src="{{ asset('storage/web_images/CompPref.jpg') }}" alt="">
            <p>
            Este test está diseñado para que descubras tus competencias y preferencias a través de asignaturas escolares.
            <br><br>
            Obtendrás una idea mucho más clara de tus talentos más destacados y tus inclinaciones naturales, que puede ser clave para tomar mejores decisiones sobre tu futuro y alcanzar tus metas.
            <br><br>
            No hay respuestas correctas, solo respuestas sinceras.
            </p>
            <a href="{{ route('comppref') }}" class="btn">
                <button x-ref="btn">Empezar</button>
            </a>
        </div>
	</main>
</x-layout>