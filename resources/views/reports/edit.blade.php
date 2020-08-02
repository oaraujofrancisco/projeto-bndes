@extends('layouts.app')

@section('content')
    <div class="container p-4 shadow-lg bg-white rounded">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Novo report</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('reports.index') }}"> Back</a>
        </div>
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

<form action="{{ route('reports.update',$report->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="author_id" value="{{ $report->author_id }}">
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
             <h4>Problema de saneamento</h4>
         </div>
        <div class="col-xs-12 col-sm-12 col-md-12 border-info">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="drenagem_urbana" name="drenagem_urbana"
              <?php if (isset($report->drenagem_urbana)&&$report->drenagem_urbana){echo "checked";}?>>
              <label class="form-check-label" for="drenagem_urbana">Sem drenagem urbana</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="agua_potavel" name="agua_potavel"
              <?php if (isset($report->agua_potavel)&&$report->agua_potavel){echo "checked";}?>>
              <label class="form-check-label" for="agua_potavel">Sem água potavel</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="coleta_tratamento_esgoto" name="coleta_tratamento_esgoto"
              <?php if (isset($report->coleta_tratamento_esgoto)&&$report->coleta_tratamento_esgoto){echo "checked";}?>>
              <label class="form-check-label" for="coleta_tratamento_esgoto">Sem coleta e/ou tratamento de esgoto</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="coleta_residuos_solidos" name="coleta_residuos_solidos"
              <?php if (isset($report->coleta_residuos_solidos)&&$report->coleta_residuos_solidos){echo "checked";}?>>
              <label class="form-check-label" for="coleta_residuos_solidos">Sem Coleta de residuos solidos</label>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Relate o problema:</strong>
                <textarea class="form-control" style="height:150px" name="comment" value="{{ $report->comment }}"></textarea>
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
             <h4>Endereço do problema</h4>
         </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Cep:</strong>
                    <input type="text" name="cep" class="form-control" value="{{ $report->cep }}">
                    <a class="btn btn-primary">Buscar usando cep!</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Rua:</strong>
                    <input type="text" name="rua" class="form-control" value="{{ $report->rua }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Numero:</strong>
                    <input type="text" name="numero" class="form-control" value="{{ $report->numero }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Complemento:</strong>
                    <input type="text" name="complemento" class="form-control" value="{{ $report->complemento }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Bairro:</strong>
                    <input type="text" name="bairro" class="form-control" value="{{ $report->bairro }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Cidade:</strong>
                    <input type="text" name="cidade" class="form-control" value="{{ $report->cidade }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Estado:</strong>
                    <input type="text" name="estado" class="form-control" value="{{ $report->estado }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
    </div>
@endsection
