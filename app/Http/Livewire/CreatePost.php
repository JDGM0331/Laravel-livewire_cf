<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $open = false; /* Permite saber en qué momento se debe abrir el modal */

    public $title, $content; /* Para registrar un nuevo post */

    protected $rules = [ /* Definir las reglas de validación */
        'title' => 'required|max:10',
        'content' => 'required|min:100',
    ];

    public function updated($propertyName){ /* Est método será activado cada vez que se modifique una de propiedades definidas anteriormente */
        $this->validateOnly($propertyName); /* En el momento en que se detecte una modificación inmediatamente ejecuta las reglas de validación ya definidas (tener en cuenta para que funcione correctamente debemos eliminar el método .deferl del wire:model desde los inputs definidos) */
    }

    public function save(){ /* Método para registrar un nuevo post */

        $this->validate(); /* Verificar las reglas de validación ya definidas */

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
