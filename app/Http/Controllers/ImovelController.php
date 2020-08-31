<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Imovel;

class ImovelController extends Controller
{
    protected function validarImovel($request){
        $validator = Validator::make($request->all(), [
            "descricao" => "required",
            "logradouroEndereco"=> "required",
            "bairroEndereco" => "required",
            "numeroEndereco" => "required | numeric",
            "cepEndereco" => "required",
            "cidadeEndereco" => "required",
            "preco" => "required | numeric",
            "qtdQuartos" => "required | numeric ",
            "tipo" => "required",
            "finalidade" => "required"
        ]);
        return $validator;
    }

    /**
     * Lista todos imóveis
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imoveis = Imovel::all();
        return view('imoveis.index', compact('imoveis'));
    }

    /**
     * Exibe formulário para criação de um imóvel
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imoveis.create');
    }

    /**
     * Salva o formulário enviado a partir de create()
     * https://laravel.com/docs/7.x/validation#manually-creating-validators
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarImovel($request);
        if($validator->fails()){
            // return redirect()->back()->withErrors($validator->errors());
            // https://laravel.com/docs/7.x/redirects#creating-redirects
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $dados = $request->all();
        Imovel::create($dados);
        return redirect()->route('imoveis.index');
    }

    /**
     * Exibe detalhe sobre um imóvel
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imovel = Imovel::find($id);
        return view('imoveis.show', compact('imovel'));
    }

    /**
     * Exibe formulário de edição de formulário
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imovel = Imovel::find($id);
        return view('imoveis.edit', compact('imovel'));
    }

    /**
     * Atualiza imóvel de acordo com o formulário enviado de edit()
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imovel = Imovel::find($id);
        $dados = $request->all();
        $imovel->update($dados);
        return redirect()->route('imoveis.index');
    }

    /**
     * Deleta imóvel
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
