<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\ShowPost;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render' => 'render'];

    public function mount(){
    }
    public function render()
    {
        $posts = Post::where('title', 'like', '%'.$this->search.'%')
        ->orWhere('content', 'like', '%'.$this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->paginate(20);

        return view('livewire.show-posts', compact('posts'));
    }

    public function order($sort)
    {
        if($this->sort = $sort){

            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }
            else{
                $this->direction = 'desc';
            }

        } else{

            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
