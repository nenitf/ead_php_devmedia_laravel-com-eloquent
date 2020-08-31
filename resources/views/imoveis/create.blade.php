@extends('shared.base')

@section('content')
@if($errors->any())
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
</div>
@endif
<div class="panel panel-default">

    <div class="panel-heading"><h3>Cadastre o imóvel</h3></div>
    <div class="panel-body">

        <form method="post" action="{{route ('imoveis.store')}}">
            @csrf
            <h4>Dados do imóvel</h4>
            <hr>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input
                    value="{{ old('descricao') }}"
                    type="text"
                    class="form-control"
                    placeholder="Descrição"
                    name="descricao"
                    required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input
                            value="{{ old('preco') }}"
                            type="text"
                            class="form-control"
                            placeholder="Preço"
                            name="preco"
                            required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="qtdQuartos">Quantidade de Quartos</label>
                        <input
                            value="{{ old('qtdQuartos') }}"
                            type="number"
                            class="form-control"
                            placeholder="Quantidade de Quartos"
                            name="qtdQuartos"
                            required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo">Tipo do imóvel</label>
                        <select class="form-control" name="tipo" required>
                            <option value="apartamento" {{old('tipo')=='apartamento'?'selected':''}}>Apartamento</option>
                            <option value="casa" {{old('tipo')=='casa'?'selected':''}}>Casa</option>
                            <option value="kitnet" {{old('tipo')=='kitnet'?'selected':''}}>Kitnet</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="qtdQuartos">Finalidade do imóvel</label>
                        <select class="form-control" name="finalidade" required>
                            <option value="venda" {{old('finalidade')=='venda'?'selected':''}}>Venda</option>
                            <option value="locação" {{old('finalidade')=='locação'?'selected':''}}>Locação</option>
                        </select>
                    </div>
                </div>
            </div>
            <h4>Endereço</h4>
            <hr>

            <div class="form-group">
                <label for="logradouroEndereco">Logradouro</label>
                <input
                    value="{{ old('logradouroEndereco') }}"
                    type="text"
                    class="form-control"
                    placeholder="Logradouro"
                    name="logradouroEndereco"
                    required>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="bairroEndereco">Bairro</label>
                        <input
                            value="{{ old('bairroEndereco') }}"
                            type="text"
                            class="form-control"
                            placeholder="Bairro"
                            name="bairroEndereco"
                            required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input
                            value="{{ old('numeroEndereco') }}"
                            type="number"
                            class="form-control"
                            placeholder="Número"
                            name="numeroEndereco"
                            required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cidadeEndereco">Cidade</label>
                        <input
                            value="{{ old('cidadeEndereco') }}"
                            type="text"
                            class="form-control"
                            placeholder="Cidade"
                            name="cidadeEndereco"
                            required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cepEndereco">CEP</label>
                        <input
                            value="{{ old('cepEndereco') }}"
                            type="text"
                            class="form-control"
                            placeholder="CEP"
                            name="cepEndereco"
                            required>
                    </div>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>

@endsection
