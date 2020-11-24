<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchCity extends Component
{
    public $searchTerm;
    public $city = [];
    public $selectedIndex = 0;

    public function incrementIndex()
    {
        if ($this->selectedIndex === (count($this->city) - 1))
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
            $this->selectedIndex = count($this->city) - 1;
            return;
        }

        $this->selectedIndex--;
    }
    
    public function selectIndex(Request $request)
    {
        if ($this->city) 
        {    
            $ville = $this->city[$this->selectedIndex];
            $session_id_ville = $ville['id'];
            $session_name_ville = $ville['cities'];
            $request->session()->put('city', $session_id_ville);
            $request->session()->put('city_name', $session_name_ville);
            //$this->redirect(route('jobs.show_cities', [$this->city[$this->selectedIndex]['id']]));
            $this->redirect(route('jobs.show'));
        }
    }

    public function resetIndex()
    {
        $this->reset('selectedIndex');
    }

    public function render()
    {
        $words = $this->searchTerm;
        $array_search = Str::of($words)->explode(' ');

        foreach ($array_search as $key => $value)
        {
            if (strlen($this->searchTerm) > 1) {
                $this->city = City::where('cities', 'like', "%".$array_search[$key]."%")
                ->get()->toArray();
            }
        }
        return view('livewire.search-city');
    }
}
