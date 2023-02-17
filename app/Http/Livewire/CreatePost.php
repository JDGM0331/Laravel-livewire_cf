<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $open = false; /* Permite saber en qué momento se debe abrir el modal */

    public $title, $content; /* Para registrar un nuevo post */

    public function save(){ /* Método para registrar un nuevo post */
        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['open', 'title', 'content']); /* El modal se cierra y las propiedades title y content quedan limpias para un próximo registro */

        $this->emitTo('show-posts', 'render'); /* Emitir un evento hacia otro componente ESPECÍFICO */
        $this->emit('alert', 'El post se creó satisfactoriamente'); /* Emitir evento con un mensaje para ser recibido nativamente en JS */
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
