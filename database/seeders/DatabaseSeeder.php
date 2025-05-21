<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\ProFam;
use App\Models\Post;
use App\Models\Premium;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void // se ejecuta cuando corremos un comando de 'php artisan' para seedear nuestra base de datos.
    {
        // User::factory(10)->create(); // usar el modelo User y el método factory para generar tantas instancias como queramos en nuestra base de datos (10), y entonces usar el metodo create() sin argumento para crear esos usuarios basados en UserFactory.

        /*
        User::factory()->create([ // lo mismo de antes, pero con solo un usuario y propiedades ya hardcodificadas.
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        User::factory(50)->create();
        Post::factory(500)->create();
        Comment::factory(1000)->create();
        Premium::factory(25)->create();

        // Datos predefinidos
        $profamspredefinidos = [
            ['name' => 'Deporte y Actividad Física', 'desc' => fake()->paragraph(3), 'image' => 'deporte y actividad fisica.jpg' ],
            ['name' => 'Administración y Gestión', 'desc' => fake()->paragraph(3), 'image' => 'administracion y gestion.jpg' ],
            ['name' => 'Agricultura y Jardinería', 'desc' => fake()->paragraph(3), 'image' => 'agricultura y jardineria.jpg' ],
            ['name' => 'Artes Gráficas y Diseño', 'desc' => fake()->paragraph(3), 'image' => 'artes graficas y diseño.jpg' ],
            ['name' => 'Artes, Artesanías y Textiles', 'desc' => fake()->paragraph(3), 'image' => 'artes, artesanias y textiles.jpg' ],
            ['name' => 'Comercio y Marketing', 'desc' => fake()->paragraph(3), 'image' => 'comercio y marketing.jpg' ],
            ['name' => 'Derecho y Sociedad', 'desc' => fake()->paragraph(3), 'image' => 'derecho y sociedad.jpg' ],
            ['name' => 'Edificación y Obra Civil', 'desc' => fake()->paragraph(3), 'image' => 'edificacion y obra civil.jpg' ],
            ['name' => 'Enseñanza', 'desc' => fake()->paragraph(3), 'image' => 'enseñanza.jpg' ],
            ['name' => 'Electricidad y Electrónica', 'desc' => fake()->paragraph(3), 'image' => 'electricidad y electronica.jpg' ],
            ['name' => 'Energía y Agua', 'desc' => fake()->paragraph(3), 'image' => 'energia y agua.jpg' ],
            ['name' => 'Fabricación Mecánica y Maderera', 'desc' => fake()->paragraph(3), 'image' => 'fabricacion mecanica y maderera.jpg' ],
            ['name' => 'Hostelería y Turismo', 'desc' => fake()->paragraph(3), 'image' => 'hosteleria y turismo.jpg' ],
            ['name' => 'Imagen Personal', 'desc' => fake()->paragraph(3), 'image' => 'imagen personal.jpg' ],
            ['name' => 'Imagen y Sonido', 'desc' => fake()->paragraph(3), 'image' => 'imagen y sonido.jpg' ],
            ['name' => 'Alimentación', 'desc' => fake()->paragraph(3), 'image' => 'alimentacion.jpg' ],
            ['name' => 'Extracción, Terreno y Materiales', 'desc' => fake()->paragraph(3), 'image' => 'extraccion, terreno y materiales.jpg' ],
            ['name' => 'Informática y Comunicaciones', 'desc' => fake()->paragraph(3), 'image' => 'informatica y comunicaciones.jpg' ],
            ['name' => 'Instalación, Mantenimiento y Vehículos', 'desc' => fake()->paragraph(3), 'image' => 'instalacion, mantenimiento y vehiculos.jpg' ],
            ['name' => 'Humanidades', 'desc' => fake()->paragraph(3), 'image' => 'humanidades.jpg' ],
            ['name' => 'Marítimo Pesquera', 'desc' => fake()->paragraph(3), 'image' => 'maritimo pesquera.jpg' ],
            ['name' => 'Laboratorio e Investigación', 'desc' => fake()->paragraph(3), 'image' => 'laboratorio e investigacion.jpg' ],
            ['name' => 'Sanidad', 'desc' => fake()->paragraph(3), 'image' => 'sanidad.jpg' ],
            ['name' => 'Seguridad, Emergencias y Medioambiente', 'desc' => fake()->paragraph(3), 'image' => 'seguridad, emergencias y medioambiente.jpg' ],
            ['name' => 'Servicios Sociales', 'desc' => fake()->paragraph(3), 'image' => 'servicios sociales.jpg' ],
            ['name' => 'Ingenierías Matemáticas', 'desc' => fake()->paragraph(3), 'image' => 'ingenierias matematicas.jpg' ],
            ['name' => 'Lengua e Idiomas', 'desc' => fake()->paragraph(3), 'image' => 'lengua e idiomas.jpg' ],
        ];

        foreach ($profamspredefinidos as $profam) {
            ProFam::factory()->state($profam)->create();
        }

        $categoriespredefinidas = [
            ['name' => 'Consejo'],
            ['name' => 'Duda'],
            ['name' => 'Experiencia'],
            ['name' => 'Valoración'],
        ];
        
        foreach ($categoriespredefinidas as $category) {
            Category::factory()->state($category)->create();
        }
    }
}
