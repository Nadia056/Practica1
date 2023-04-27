<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    public function index2()
    {
        $bikes = Bike::all();
        
        return view('personas', ['bikes' => $bikes]);

    }
    public function AddPerson(Request $request)
    {
       
        $validatedData = $request->validate([
            'nombre' => 'required|max:20',
            'email' => 'required|max:255',
            'apellido' => 'required|max:25',
            'bike_id' => 'required',
          ]);
   
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->email = $request->email;
        $persona->bike_id = $request->bike_id;
        $persona->save();
        return back()->with('status', 'Persona agregada con exito');
 
    
    }
    public function info2()
    {
    
        $personas = Persona::all();
        
        $bikes = Bike::all();

        return view('infoPersonas', ['personas' => $personas, 'bikes' => $bikes]);
    }
    public function updatePerson(Request $request)
    {
        $persona = Persona::find($request->id);
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->email = $request->email;
        $persona->bike_id = $request->bike_id;
        $persona->update();
        return back();
    }
    public function deletePerson(Request $request)
    {
        $persona = Persona::find($request->id);
        $persona->delete();
        return back();
    }
}
