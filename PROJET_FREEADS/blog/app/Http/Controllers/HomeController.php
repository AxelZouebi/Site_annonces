<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function display(Request $request)
    {
        $adds = Job::online()->latest()->get();
        $city = City::orderBy('cities')->get();
        return view('home.home', ['adds' => $adds], ['city' => $city]);
    }

    public function create(Request $request)
    {
        $add = new Job();
        $userid = Auth::id();
        $add->title = $request->input('title');
        $add->description = $request->input('description');
        $add->user_id = $userid;
        $add->city_id = $request->cities; // DB::select('select id from tb_users where cities = $request->input("cities")');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $add->image = $request->file('image')->storeAs('add', $request->input('title').'.'.$extension);
        }
        else
        {
            $array = [$add->title, $add->description, $add->price,];
            Validator::make($array, [
                'title' => [
                    'required', 
                    'string', 
                    'max:255',
                ],
                'description' => [
                    'required',
                    'string',
                    'description',
                    'max:555',
                ],
                'cities' => [
                    'required',
                ]])->validate();    
;           $adds = Job::online()->latest()->get();
            return view('home.home', ['adds' => $adds]);
        }
        $add->save();

        if(!empty($request->file('image')))
        {
            $move = $request->file('image');
            $move->move('uploads/add/', $request->input('title').'.'.$extension);
        }

        $add = Job::online()->latest()->get();
        $city = City::orderBy('cities')->get();
        return view('home.home', ['adds' => $add], ['city' => $city]);
    }

    public function display_create()
    {
        $adds = Job::online()->latest()->get();
        $city = City::orderBy('cities')->get();
        return view('home.homeadd', ['adds' => $adds], ['city' => $city]);
    }

    public function update(Request $request, Job $update)
    {
        $adds = Job::online()->latest()->get();
        foreach($adds as $add)
        {
            if(!empty($request->file('image')))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $array= ['title' => $request->input('title', $add->title), 'description' => $request->input('description', $add->description), 'price' => $request->input('price', $add->price)];
                Validator::make($array, [
                    'title' => [
                        'string', 
                        'max:255',
                    ],
                    'description' => [
                        'string',
                        'max:555',
                    ]])->validate();
                $id = $request->input('id');
                $update = Job::find($id);
                $update->title = $request->input('title', $add->title);
                $update->description = $request->input('description', $add->description);
                $update->city_id = DB::select('select id from tb_users where cities = $request->input("cities")', $add->city_id);
                $update->image = $request->file('image')->storeAs('add', $request->input('title', $add->title).'.'.$extension);

                $update->save();
            }
            elseif(empty($request->file('image')))
            {
                $array= ['title' => $request->input('title', $add->title), 'description' => $request->input('description', $add->description), 'price' => $request->input('price', $add->price)];
                Validator::make($array, [
                    'title' => [
                        'string', 
                        'max:255',
                    ],
                    'description' => [
                        'string',
                        'max:555',
                    ]])->validate();
                    $id = $request->input('id');
                    $update = Job::find($id);
                    $update->title = $request->input('title', $add->title);
                    $update->description = $request->input('description', $add->description);
                    $update->city_id = $request->cities;
                    
                    $update->save();
            }
        }
        if(!empty($request->file('image')))
        {
            $move = $request->file('image');
            $move->move('uploads/add/', $request->input('title', $add->title).'.'.$extension);
        }
        
        $adds = Job::online()->latest()->get();
        $city = City::orderBy('cities')->get();
        return view('home.home', ['adds' => $adds], ['city' => $city]); 
    }

    public function display_modify()
    {
        $adds = Job::online()->latest()->get();
        $city = City::orderBy('cities')->get();
        return view('home.homemodify', ['adds' => $adds], ['city' => $city]);
    }

    public function delete(Request $request, Job $delete)
    {
        $id = $request->input('id');
        $delete = Job::find($id);
        $delete->delete();
        
        $adds = Job::online()->latest()->get();
        $city = City::orderBy('cities')->get();
        return view('home.home', ['adds' => $adds], ['city' => $city]); 
    }
    
    public function display_delete()
    {
        $adds = Job::online()->latest()->get();
        $city = City::orderBy('cities')->get();
        return view('home.homedelete', ['adds' => $adds], ['city' => $city]);
    }
}