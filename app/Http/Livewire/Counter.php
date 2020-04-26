<?php

namespace App\Http\Livewire;

use App\category;
use App\bakery;
use Illuminate\Http\Request;
use Livewire\Component;

class Counter extends Component
{
    public $search;
    public $bakery;
    public $category;
    public $selsect;


    public function render()
    {
        if($this->search != ''){
            return view('livewire.counter', [
                'bakery' => bakery::where('name', 'like', '%'.$this->search.'%')->get(),
                'posts' => bakery::where('name', 'like', '%'.$this->search.'%')->get(),
                'category' => category::all(),
            ]);   
        }else{
            return view('livewire.counter', [
            ]);
        }
        
    }
}
