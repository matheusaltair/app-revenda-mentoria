<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiRevendaResource;
use App\Models\Revenda;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;

class ApiRevendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Revenda::all();
        return ApiRevendaResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
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
        //pegando os valores da api e criando um novo objeto
        $revenda = new Revenda();
        $revenda->marca = $request->input('marca');
        $revenda->modelo = $request->input('modelo');
        $revenda->ano = $request->input('ano');
        $revenda->valor = $request->input('valor');    

        //se o salvar deu certo ele retorna o objeto acima preenchido para a tela
        if($revenda->save()){
            return new ApiRevendaResource($revenda);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Revenda::findOrFail($id); //buscar pelo id do registro
        return new ApiRevendaResource($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //verificando se tenho o ID (no banco de dados) que estou recebendo....
        $revenda = Revenda::findOrFail($id); //buscar pelo id do registro
        //se o salvar deu certo ele retorna o objeto acima preenchido para a tela
        if($revenda->update($request->all())){
            return new ApiRevendaResource($revenda);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $revenda = Revenda::findOrFail($id); //buscar pelo id do registro
        if($revenda->delete()){
            return new ApiRevendaResource($revenda);
        }
    }
}
