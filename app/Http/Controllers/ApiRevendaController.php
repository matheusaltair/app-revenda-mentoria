<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\ApiRevendaResource;
use App\Models\Revenda;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ApiRevendaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Revenda::all();
        return $this->sendResponse(ApiRevendaResource::collection($data), 'Todos os carros!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pegando os valores da api e criando um novo objeto
        $input = $request->all();
        $validator = FacadesValidator::make($input, [
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required|min:4|max:4',
            'valor' => 'required|numeric|gte:10000', //grather than [gt] (maior que)
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $revenda = new Revenda();
        $revenda->marca = $request->input('marca');
        $revenda->modelo = $request->input('modelo');
        $revenda->ano = $request->input('ano');
        $revenda->valor = $request->input('valor');    

        //se o salvar deu certo ele retorna o objeto acima preenchido para a tela
        if($revenda->save()){
            return $this->sendResponse(new ApiRevendaResource($revenda), 'Carro inserido com sucesso!');
        }else{
            return $this->sendError("Não foi possível inserir o carro!");
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
        $revenda = Revenda::find($id); //buscar pelo id do registro
        if(is_null($revenda)){
            return $this->sendError('o carro informado não foi encontrado!');       
        }
        return $this->sendResponse(new ApiRevendaResource($revenda), '');
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
        $input = $request->all();
        $validator = FacadesValidator::make($input, [
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required|min:4|max:4',
            'valor' => 'required|numeric|gte:10000', //grather than [gt] (maior que)
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        //verificando se tenho o ID (no banco de dados) que estou recebendo....
        $revenda = Revenda::find($id); //buscar pelo id do registro
        if(is_null($revenda)){
            return $this->sendError('o carro informado não foi encontrado!');       
        }
        //se o salvar deu certo ele retorna o objeto acima preenchido para a tela
        if($revenda->update($request->all())){
            return $this->sendResponse(new ApiRevendaResource($revenda), 'Carro atualizado com sucesso!');
        }else{
            return $this->sendError('Não foi possível atualizar o carro!');       
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

        $revenda = Revenda::find($id); //buscar pelo id do registro
        if(is_null($revenda)){
            return $this->sendError('o carro informado pra deletar não foi encontrado!');       
        }
        if($revenda->delete()){
            return $this->sendResponse(new ApiRevendaResource($revenda), 'Carro deletado com sucesso!');
        }else{
            return $this->sendError('Não foi possível deletar o carro!');       
        }
    }
}
