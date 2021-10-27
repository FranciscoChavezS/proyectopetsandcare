<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = Archivo::paginate(10);
        return view('archivos.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('archivo') && $request->file('archivo')->isValid()){
            $ruta = $request->archivo->store('documentos');
            
            //crear registro en tabla archivos (instancia)
            $archivo = new Archivo();
            $archivo->ruta = $ruta;
            $archivo->nombre_original = $request->archivo->getClientOriginalName(); //obtener el nombre original
            $archivo->mime = $request->archivo->getMimeType();
            $archivo->save();
        }
        return redirect()->route('archivo.index')->with('mensajeArchivo','Archivo cargado correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function descargar(Archivo $archivo)
    {
        return Storage::download($archivo->ruta,$archivo->nombre_original, ['Content-type' => $archivo->mime]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {

        $archivo->delete();
        return redirect()->route('archivo.index')->with('mensajeArchivo','Archivo eliminado correctamente');
    }
}
