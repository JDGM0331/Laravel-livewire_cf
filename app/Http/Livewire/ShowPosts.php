<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{

    public $search;
    public $sort = 'id'; /* Para obtener el tipo de dato a ordenar */
    public $direction = 'desc'; /* Para obtene en qué sentido ordenar (de amanera ascendente o descendente) */

    /* protected $listeners = ['render' => 'render']; */ /* Listener -> permite escuchar los eventos emitidos para eso se define un array don de el llave sería el nombre del evento a escuchas y el valor la acción que se desea ejecutar dentro de la definición del componente */
    protected $listeners = ['render']; /* Laravel reconoce que al escuchar este evento se va ejecutar el mismo método con este mismo nombre del evento */

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
