<?php

namespace App\Http\Livewire;

use App\bakery;
use App\category;
use Livewire\Component;

class Search extends Component
{   


    public $searchTerm;
    public $users;
    
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->users = category::where('name_category', 'ilike', $searchTerm)->get();
        return view('livewire.counter');
    }
}
