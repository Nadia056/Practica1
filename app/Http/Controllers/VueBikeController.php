<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Termwind\Components\Dd;

class VueBikeController extends Controller
{
    
    public function index()
    {  
        return Inertia::render('RegistroBike');

    }
    public function store(Request $request)
    {
      
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
        return back();
    }
    public function info()
    {
        $bikes = Bike::all();
        return Inertia::render('BikeInfo', ['bikes' => $bikes]);
    }
    public function update(Request $request)
    {
        
        $bike = Bike::find($request->id);
        $bike->nombre = $request->nombre;
        $bike->descripcion = $request->descripcion;
        $bike->año = $request->año;
        $bike->save();
        return back();
    }
    
  public function delete($id)
  {
    $bike=Bike::find($id);
    $bike->delete();
    return back();
  }
    
}
