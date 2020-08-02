@extends('layouts.app')

@section('content')
    <div class="container p-4 shadow-lg bg-white rounded" style='margin-top: 25px;'>
    <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <h2>Nova ocorrencia</h2>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
        
                <a class="btn btn-primary btn-lg" style="background-color:#008000" href="{{ url('/') }}"> Voltar</a>
            </div>
    </div>


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('reports.store') }}" method="POST">
    @csrf
    <input type="hidden" name="author_id" value="{{ Auth::id() }}">
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
             <h4>Problema de saneamento</h4>
         </div>
        <div class="col-xs-12 col-sm-12 col-md-12 border-info">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="drenagem_urbana" name="drenagem_urbana">
              <label class="form-check-label" for="drenagem_urbana">Sem drenagem urbana</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="agua_potavel" name="agua_potavel">
              <label class="form-check-label" for="agua_potavel">Sem água potavel</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="coleta_tratamento_esgoto" name="coleta_tratamento_esgoto">
              <label class="form-check-label" for="coleta_tratamento_esgoto">Sem coleta e/ou tratamento de esgoto</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="coleta_residuos_solidos" name="coleta_residuos_solidos">
              <label class="form-check-label" for="coleta_residuos_solidos">Sem Coleta de residuos solidos</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Relate o problema:</strong>
                <textarea class="form-control" style="height:150px" name="comment" placeholder=""></textarea>
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
             <h4>Endereço do problema</h4>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Cep:</strong>
                    <input type="text" name="cep" class="form-control" placeholder="xxxxx-xxx" onblur="pesquisacep(this.value);">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Rua:</strong>
                    <input type="text" name="rua" id="rua" class="form-control" placeholder="">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Numero:</strong>
                    <input type="text" name="numero" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Complemento:</strong>
                    <input type="text" name="complemento" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Bairro:</strong>
                    <input type="text" name="bairro" id="bairro" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Cidade:</strong>
                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Estado:</strong>
                    <input type="text" name="estado" id="uf" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary col-xs-2 col-sm-2 col-md-2" style="background-color: #008000">Concluir</button>
        </div>
    </div>
    

</form>
<script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";  

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

    </div>
@endsection
