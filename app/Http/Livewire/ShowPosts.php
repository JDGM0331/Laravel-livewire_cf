<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{

    public $search;
    public $sort = 'id'; /* Para obtener el tipo de dato a ordenar */
    public $direction = 'desc'; /* Para obtene en qué sentido ordenar (de amanera ascendente o descendente) */

    public function render()
    {
        $posts = Post::where('title', 'like', '%'.$this->search.'%')
                        ->orWhere('content', 'like', '%'.$this->search.'%')
                        ->orderBy($this->sort, $this->direction) /* Sentencia para consultar de manera ordenada */
                        ->get();
        return view('livewire.show-posts', compact('posts'));
    }

    public function order($sort){

        if($this->sort == $sort){ /* Permite hacer los cambios de ordenamiento en el momento de dar cick en una de las columnas de la cabecera de la tabla de post */

            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }

        }else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }

    }
}
