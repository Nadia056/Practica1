<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Persona;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VuePersonaController extends Controller
{
 
    public function index()
    {
        $bike=Bike::all();
        return Inertia::render('RegistroPersona', ['bikes' => $bike]);

    }

  

    public function add(Request $request)
    {
     
      
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'bike_id'=>'required'
        ]);
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->email = $request->email;
        $persona->bike_id = $request->bike_id;
        $persona->save();
       
       
       

    }
    public function info()
    {
        $persona = Persona::all();
        $bike=Bike::all();
        return Inertia::render('PersonasInfo', ['personas' => $persona,'bikes'=>$bike]);


    }

   
    public function update(Request $request)
    {
     
        $persona = Persona::find($request->id);
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->email = $request->email;
        $persona->bike_id = $request->bike_id;
        $persona->save();
        return back();
    }

    public function delete($id)
    {
        $persona = Persona::find($id);
        $persona->delete();
    }
}
