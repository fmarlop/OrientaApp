<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public User $user, public Post $post) // añado modelo usuario y post para pasarle instancia del usuario y post.
    {
        // se usa para pasar datos a otras partes de esta clase
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope // Sobre: especificar datos del envío
    {
        return new Envelope(
            subject: 'Bienvenido a la app',
            from: new Address ('departamento@bienvenida', 'Fran Martos')
            /*
            replyTo: [
                new Address('pepico@email.com', 'Pepe'),
            ]
            */
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content // Contenido: especificar datos del envío
    {
        return new Content(
            view: 'emails.welcome', // propiedad 'view:' para usar una vista blade
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if($this->post->image){ // como la imagen puede ser nullable, devolveré un array vacío en caso de no haberla.
            return [
                Attachment::fromStorageDisk('public', $this->post->image) // 'fromPath' si quiero pasar un archivo de una ruta estática, 'fromStorage' si quiero pasar un archivo del almacenamiento local por defecto, 'fromStorageDisk' si quiero pasar un archivo del almacenamiento local especificado. Uso la propiedad image de los posts para pasarla.
            ];
        }
        else{
            return [];
        }
    }
}
