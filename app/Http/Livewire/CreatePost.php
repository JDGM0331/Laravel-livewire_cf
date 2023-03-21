<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads; /* Recursos para subir imágenes */

class CreatePost extends Component
{

    use WithFileUploads; /* Definir el uso de esta clase dentor del componente */

    public $open = true; /* Permite saber en qué momento se debe abrir el modal */

    public $title, $content, $image, $identificadorImage; /* Para registrar un nuevo post */ /* Definición de la propiedad image para registrar la imagen */

    public function mount(){
        $this->identificadorImage = rand(); /* Crear un identificar con un número al azar para permitir que se reseteo el input de imgen y así evitar error molesto de imagen seleccionada */
    }

    protected $rules = [ /* Definir las reglas de validación */
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|max:2048' /* 2048 es equivalente a 2 megas */
    ];

    public function save(){ /* Método para registrar un nuevo post */

        $this->validate(); /* Verificar las reglas de validación ya definidas */

        $image = $this->image->store('posts'); /* Especificar la dirección de almacenamiento de la imagen */

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image
        ]);

        $this->reset(['open', 'title', 'content', 'image']); /* El modal se cierra y las propiedades title y content quedan limpias para un próximo registro */

        $this->identificadorImage = rand(); /* Reemplaza el actual identificador de imagen por otro nuevo en cuanto se resetee todo el componente */

        $this->emitTo('show-posts', 'render'); /* Emitir un evento hacia otro componente ESPECÍFICO */
        $this->emit('alert', 'El post se creó satisfactoriamente'); /* Emitir evento con un mensaje para ser recibido nativamente en JS */
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
