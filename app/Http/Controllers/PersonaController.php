<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request ->buscar;
        $criterio = $request->criterio;  
        if ($buscar==''){

            $personas = Persona::orderBy('id','desc')->paginate(3);

        }    
        else{

            $personas = Persona::where($criterio,'like','%'. $buscar . '%')->orderBy('id','desc')->paginate(3);

        }  
        
       
 
        return [
            'pagination' => [
                'total'        => $personas->total(),
                'current_page' => $personas->currentPage(),
                'per_page'     => $personas->perPage(),
                'last_page'    => $personas->lastPage(),
                'from'         => $personas->firstItem(),
                'to'           => $personas->lastItem(),
            ],
            'personas' => $personas
        ];
    }   


   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        if (!$request->ajax()) return redirect('/');

        

        $persona = new Persona();
        $persona ->nombre =$request->nombre;    
        $persona ->apellido =$request->apellido;    
        $persona ->documento =$request->documento;    
        $persona ->direccion =$request->direccion;    
        $persona ->mail =$request->mail;    
        $persona ->area =$request->area;    
        $persona ->observacion = $request->observacion;
        $persona ->fecha = $request->fecha;
        $persona ->condicion = '1';
        $persona->save();            
        //
    }

   
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {
        if (!$request->ajax()) return redirect('/');



        $persona = Persona::findOrFail($request->id);
        $persona ->nombre = $request->nombre;    
        $persona ->apellido = $request->apellido;    
        $persona ->documento = $request->documento;    
        $persona ->direccion = $request->direccion;    
        $persona ->mail = $request->mail;    
        $persona ->area = $request->area;    
        $persona ->observacion = $request->observacion;
        $persona ->fecha = $request->fecha;
        $persona ->condicion = '1';
        $persona->save();  
        //
    }

    public function desactivar(Request $request)
    {

        if (!$request->ajax()) return redirect('/');
    
 
        $persona = Persona::findOrFail($request->id);
        $persona->condicion = '0';
        $persona->save();
    }
 
    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
    
         
        $persona = Persona::findOrFail($request->id);
        $persona->condicion = '1';
        $persona->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
