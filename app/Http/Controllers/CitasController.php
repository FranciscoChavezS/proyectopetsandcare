<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Citas;
use Illuminate\Support\Facades\Auth;


class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $citas = Citas::with(['user'])->paginate(10);
        return view('citas.index', compact('citas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('citas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);
        //
        //Método para agregar registros
        $citas = new Citas();
        $citas->user_id = auth()->user()->id;
        
        //$product->user_id = auth()->user()->id;

        $citas->nombremas = $request->nombremas;
        $citas->razamas = $request->razamas;
        $citas->sexomas = $request->sexomas;
        $citas->telefonomas = $request->telefonomas;
        $citas->caso = $request->caso;
        $citas->started_at = $request->started_at;
        $citas->hora = $request->hora;

        //Guardar ruta de imagen en BD 
        //if($request->hasFile('fotomas')){
           // $file = $request->file('fotomas');
           // $destinationPath = 'images/featureds/'; //asignamos la carpeta 
           // $filename = time().'-'.$file->getClientOriginalName(); //recuperar el nombre original del archivo
            //$uploadSuccess = $request->file('fotomas')->move($destinationPath, $filename); //la imagen cargada la movemos a la carpeta y guardamos la url en la DB
            //$citas->fotomas = $destinationPath . $filename;
         //}
        
         $citas->save();
        //Post::create($request->all());

        return redirect()->route('citas.index')->with('mensajeCitas','Registro creado correctamente');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('citas.show', compact('citas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
