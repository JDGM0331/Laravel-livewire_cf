<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $open = true; /* Permite saber en qué momento se debe abrir el modal */

    public $title, $content; /* Para registrar un nuevo post */

    public function save(){ /* Método para registrar un nuevo post */
        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
