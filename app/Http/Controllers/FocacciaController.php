<?php

namespace App\Http\Controllers;

use App\Models\focaccia;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class FocacciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['focaccias']= Focaccia::paginate(20);

        return view('focaccia.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('focaccia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $campos = [
            'Nombre' => 'required|string|max:20',
            'Descripcion' => 'required|string|max:20000',
            'Precio' => 'required',
            'Foto' => 'required'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);
        $datosFocaccia = request()->except('_token');


        if($request->hasFile('Foto')){
            $datosFocaccia['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Focaccia::insert($datosFocaccia);
        return redirect()->route('lista');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\focaccia  $focaccia
     * @return \Illuminate\Http\Response
     */
    public function show(focaccia $focaccia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\focaccia  $focaccia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $focaccia = Focaccia::findOrFail($id);
        return view('focaccia.edit', compact('focaccia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\focaccia  $focaccia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {   
       
        $datosFocaccia = request()->except('_token', '_method');
        $focaccia = Focaccia::findOrFail($id);
        if($request->hasFile('Foto')){
           
            if(\Storage::exists($focaccia->Foto)){
                \Storage::delete('public/' . $focaccia->Foto);
            }
            $datosFocaccia['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
        

        Focaccia::where('id', '=', $id)->update($datosFocaccia);

        

        

        return redirect()->route('lista');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\focaccia  $focaccia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Focaccia::destroy($id);
        return redirect('focaccia');
    }
}
