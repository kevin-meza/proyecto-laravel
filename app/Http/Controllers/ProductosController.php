<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listaProductos['listaProductos']=Productos::all();
        return view('productos.indexproductos',$listaProductos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.productosform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar datos

        $validar=[
            'nombre'=>"required|string|max:100",
            'descripcion'=>"required|string|max:100",
            'precio'=>"required|integer",
            'foto'=>"required|mimes:jpg,jpeg,png"
        ];
        $mensaje=[
            'required'=>"El :attribute es requerido",
            'imagen.required'=> "La imagen es requerida"
        ];
        $this->validate($request,$validar,$mensaje);
//fin validar


        $datosProductos = request()->except('_token');
        if($request->hasFile('foto')){
            //si hay una imagen la tomamos le ponemos un nombre y la enviamos a carpeta storage
            $datosProductos['foto']=$request->file('foto')->store('uploads/ImagenProducto','public');
        }
        // echo $datosProductos['foto'];exit;
        Productos::insert($datosProductos);

         return redirect('productos')->with('mensaje','Persona Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $productoEdit=Productos::findOrFail($id);
        return view('productos.productosFormEdit',compact('productoEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //

        $datosEditProducto = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            //si hay una imagen la tomamos le ponemos un nombre y la enviamos a carpeta storage
            $producto=Productos::findOrFail($id);
            Storage::delete('public/'.$producto->foto);

            $datosEditProducto['foto']=$request->file('foto')->store('uploads/imagenProducto','public');
        }
//         print_r($datosEditProducto);
// exit;

        Productos::where('id','=',$id)->update($datosEditProducto);
        $producto=Productos::findOrFail($id);
        return redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto=Productos::findOrFail($id);
        // //borrar persona por id
         if(Storage::delete('public/'.$producto->foto)){
            Productos::destroy($id);

     }
        return redirect('productos')->with('mensaje','Persona Eliminada');
    }
}
