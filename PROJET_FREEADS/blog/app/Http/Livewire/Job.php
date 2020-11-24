<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Job extends Component
{
    public $job;

    public function mount($job)
    {
        $this->job = $job;
    }

    public function render()
    {
        return view('livewire.job');
    }

    private function isAuth()
    {
        return auth()->check();
    }
}