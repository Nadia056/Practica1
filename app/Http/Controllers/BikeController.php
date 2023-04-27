<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    public function index()
    {
        return view('registro');
    }
    public function add(Request $request)
    {
        #validaciones
        $request->validate([
            'nombre' => 'required|min:10',
            'descripcion' => 'required|max:100',
            'año' => 'required',
        ]);
        $bike = new Bike();
        $bike->nombre = $request->nombre;
        $bike->descripcion = $request->descripcion;
        $bike->año = $request->año;
        $bike->save();
        return back()->with('success', 'Your form has been submitted.');
    }
    public function info()
    {
        
        $bikes = Bike::all();
        return view('moto',['bikes'=>$bikes]);
    }
    public function update(Request $request)
    {
        
        $bike = Bike::find($request->id);
        $bike->nombre = $request->nombre;
        $bike->descripcion = $request->descripcion;
        $bike->año = $request->año;
        $bike->update();
        return back()->with('success', 'Your form has been submitted.');
    
    }
    public function delete($id)
    {
        $bike = Bike::find($id);
        $bike->delete();
        return back()->with('success', 'Your form has been submitted.');
    }
}
