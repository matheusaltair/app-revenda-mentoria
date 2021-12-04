<?php

namespace App\Http\Controllers;

use App\Models\Revenda;
use Illuminate\Http\Request;

class RevendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Revenda::all();
        return view('revenda.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revenda.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required|min:4|max:4',
            'valor' => 'required',
        ]);
    
        Revenda::create($request->all());
     
        return redirect()->route('revenda.index')
                        ->with('success','Item salvo com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revenda  $revenda
     * @return \Illuminate\Http\Response
     */
    public function show(Revenda $revenda)
    {
        return view('revenda.show',compact('revenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revenda  $revenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Revenda $revenda)
    {
        return view('revenda.edit',compact('revenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revenda  $revenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revenda $revenda)
    {

        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required',
            'valor' => 'required'

        ]);
    
        $revenda->update($request->all());
    
        return redirect()->route('revenda.index')
                        ->with('success','Item editado com sucesso');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revenda  $revenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revenda $revenda)
    {
        $revenda->delete();
    
        return redirect()->route('revenda.index')
                        ->with('success','Item deletado com sucesso');
    }
}
