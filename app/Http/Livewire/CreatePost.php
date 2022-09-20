<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $open = true;
    public $title, $content, $image;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|max:2048'
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function store()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset('open', 'title', 'content');
        $this->emitTo('show-posts','render');
        $this->emit('alert', 'El post fue creado exitosamente');
    }
}
