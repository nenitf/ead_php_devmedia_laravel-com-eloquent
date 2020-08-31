<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qtd = $request['qtd'] ?? 5;
        $page = $request['page'] ?? 1;
        $buscar = $request['buscar'];
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
        if($buscar){
            $imoveis = DB::table('imoveis')
                ->where('cidadeEndereco', '=', $buscar)
                ->paginate($qtd);
        }else{
            $imoveis = DB::table('imoveis')->paginate($qtd);
        }
        $imoveis = $imoveis->appends(Request::capture()->except('page'));
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
        $validator = $this->validarImovel($request);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $imovel = Imovel::find($id);
        $dados = $request->all();
        $imovel->update($dados);

        return redirect()->route('imoveis.index');
    }

    /**
     * Confirmação da exclusão
     *
     * @return \Illuminate\Http\Response
     */
    public function remover($id)
    {
        $imovel = Imovel::find($id);
        return view('imoveis.remove', compact('imovel'));
    }

    /**
     * Deleta imóvel
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Imovel::find($id)->delete();
        return redirect()->route('imoveis.index');
    }
}
