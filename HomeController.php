<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todos=Todo::all();
        $data=compact('todos');
        return view('home')->with($data);
        
    }
    public function add()
    {
        return view('add');
    }
    public function ins(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'depart'=>'required',
                'work'=>'required',
                'due'=>'required',
            ]
        );
        $todos = new Todo;
        $todos->name=$request['name'];
        $todos->depart=$request['depart'];
        $todos->work=$request['work'];
        $todos->due=$request['due'];
        $todos->save();
        return redirect('/home');
        
    }

    public function edit($id)
    {
        $todos=Todo::find($id);
        if(is_null($todos)){
            
            return redirect('/home');
        }
        else{
            $url = url('/edit')."/".$id;
            $data=compact('todos','url');
            return view('edite')->with($data);

        }
       
    }
    public function update($id, Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'depart'=>'required',
                'work'=>'required',
                'due'=>'required',
            ]
        );
        
        $todos=Todo::find($id); 
        $todos->name=$request['name'];
        $todos->depart=$request['depart'];
        $todos->work=$request['work'];
        $todos->due=$request['due'];
        $todos->save();
        return redirect('/home');

    }
    public function delete($id)
    {
        $todos=Todo::find($id);
        if(!is_null($todos)){
            $todos->delete();   
        }
        return redirect('/home');

    }
}
