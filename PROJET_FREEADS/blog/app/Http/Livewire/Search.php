<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    public $query;
    public $jobs = [];
    public $selectedIndex = 0;

    public function incrementIndex()
    {
        if ($this->selectedIndex === (count($this->jobs) - 1))
        {
            $this->selectedIndex = 0;
            return;
        }

        $this->selectedIndex++;
    }

    public function decrementIndex()
    {
        if ($this->selectedIndex === 0)
        {
            $this->selectedIndex = count($this->jobs) - 1;
            return;
        }

        $this->selectedIndex--;
    }

    public function selectIndex()
    {
        if ($this->jobs) {
            $this->redirect(route('jobs.show_d', [$this->jobs[$this->selectedIndex]['title'], $this->jobs[$this->selectedIndex]['description']]));
        }
    }

    public function resetIndex()
    {
        $this->reset('selectedIndex');
    }

    public function render()
    {
        return view('livewire.search', [
            'jobs' => $this->jobs
        ]);
    }

    public function showJob()
    {
        if($this->jobs)
        {
            return redirect()->route('jobs.show', [$this->jobs[$this->selectedIndex]['title']]);
        }
    }

    public function updatedQuery()
    {
        $this->resetIndex();
        $city_id = session('city');

        if (strlen($this->query) > 1) 
        {
            $this->jobs = Job::where('city_id', '=', $city_id)
            ->where(function($queryor)
            {
                $words = $this->query;
                $array_search = Str::of($words)->explode(' ');
                foreach ($array_search as $key => $value)
                {
                $queryor->where('title', 'like', "%".$array_search[$key]."%")
                        ->orWhere('description', 'like', "%".$array_search[$key]."%")
                        ->orWhere('price', 'like', "%".$array_search[$key]."%");
                }
            })
            ->get()->toArray();
        }
    }
}