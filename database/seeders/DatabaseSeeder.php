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
            ['name' => 'Deporte y Actividad Física', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Administración y Gestión', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Agricultura y Jardinería', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Artes Gráficas y Diseño', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Artes, Artesanías y Textiles', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Comercio y Marketing', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Derecho y Sociedad', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Edificación y Obra Civil', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Educación', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Electricidad y Electrónica', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Energía y Agua', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Fabricación Mecánica y Maderera', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Hostelería y Turismo', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Imagen Personal', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Imagen y Sonido', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Alimentación', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Extracción, Terreno y Materiales', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Informática y Comunicaciones', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Instalación, Mantenimiento y Vehículos', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Humanidades', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Marítimo Pesquera', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Laboratorio e Investigación', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Sanidad', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Seguridad, Emergencias y Medioambiente', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Servicios Sociales', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Ingenierías Matemáticas', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
            ['name' => 'Lengua e Idiomas', 'desc' => fake()->paragraph(3), 'image' => 'OrientaDefault.png' ],
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
