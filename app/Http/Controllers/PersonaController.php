<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pagina principal de ruta persona


        //consultar datos personas  retorna la vista personas index y le pasa la lista de registros
       $listaPersonas['listaPersonas'] = Persona::paginate(5);
       return view('personas.index',$listaPersonas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a lavista personas create esta vista envia los datos al metodo store
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * obtiene los datos del post por el metodo REQUEST()
      *responde con un RESPONSE()
     */
    public function store(Request $request)
    {
      //obtiene todos los datos menos el token
      //llamaal modelo personas y el  metodo insert
        $datosPersona = request()->except('_token');
        if($request->hasFile('imagen')){
            //si hay una imagen la tomamos le ponemos un nombre y la enviamos a carpeta storage
            $datosPersona['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Persona::insert($datosPersona);

         return redirect('persona');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $persona=Persona::findOrFail($id);
        return view('personas.edit',compact('persona'))->with('mensaje','Modificado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     *toma losdatos de la persona segun el id llama al modelo persona cuando el id sea igual al id q traemos y actualiza segun datos
     */
    public function update(Request $request, $id)
    {
        //actualizar datos
        $datosPersonaEdit = request()->except(['_token','_method']);
        if($request->hasFile('imagen')){
            //si hay una imagen la tomamos le ponemos un nombre y la enviamos a carpeta storage
            $persona=Persona::findOrFail($id);
            Storage::delete('public/'.$persona->imagen);

            $datosPersonaEdit['imagen']=$request->file('imagen')->store('uploads','public');
        }


        Persona::where('id','=',$id)->update($datosPersonaEdit);

        $persona=Persona::findOrFail($id);
        return view('personas.edit',compact('persona'))->with('mensaje','Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        //borrar persona por id
        if(Storage::delete('public/'.$persona->imagen)){
            Persona::destroy($id);
        }



        return redirect('persona')->with('mensaje','Persona Eliminada');
    }
}
