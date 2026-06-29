<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.web')]
class IndexMain extends Component
{
    public function render()
    {
        return view('livewire.index-main');
    }
}
