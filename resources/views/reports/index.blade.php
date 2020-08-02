@extends('layouts.app')



@section('content')

<div class="container p-4 shadow-lg bg-white rounded" style="margin-top: 32px">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @if($message == "Report created successfully.")
        <a href="" id="modal" data-toggle="modal" data-target=".bd-example-modal-lg"></a>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Como denunciar:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                     Entre em contato com a sua prefeitura caso queira registrar alguma ocorrência ou solicitar informações.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(event) { 
                var button = document.getElementById("modal")
                button.click()
            });
        </script>
        @endif
    @endif

    <div class="row" >
        <div class="col-lg-12 margin-tb" >
            <div class="pull-left">
                <h2>Ocorrências</h2>
                <a class="btn btn-success" href="{{ route('reports.create') }}" style="background-color:#008000 ; margin-bottom: 32px"> Nova Ocorrência</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
    <table class="table">
        <tr style="background-color:#006daa">
            <th>Nª</th>
            <th>Endereço</th>
            <th>Problemas</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($reports as $report)
        <tr>
            <td>{{ $report->id }}</td>
            
            <td>
                {{ $report->rua }},
                {{ $report->numero }},
                {{ $report->complemento }},
                {{ $report->bairro }},
                {{ $report->cidade }},
                {{ $report->estado }}
            </td>
            <td>
                <?php
                if (isset($report->drenagem_urbana)&&$report->drenagem_urbana){echo "Sem drenagem urbana, ";}
                if (isset($report->agua_potavel)&&$report->agua_potavel){echo "Sem água potavel, ";}
                if (isset($report->coleta_tratamento_esgoto)&&$report->coleta_tratamento_esgoto){echo "Sem coleta e/ou tratamento de esgoto, ";}
                if (isset($report->coleta_residuos_solidos)&&$report->coleta_residuos_solidos){echo "Sem Coleta de residuos solidos, ";}

                ?>
            </td>
            <td class="bg-warning">
                <a href="{{ route('reports.edit',$report->id) }}">
                 <div style="height:100%;width:100%"  class="text-center">
                    <i class="fas fa-pencil-alt"></i>
                 </div>
                </a>
            </td>
            <td class="bg-danger">
            <a href="#" onClick="document.getElementById('form{{ $report->id }}').submit();">
                 <div style="height:100%;width:100%" class="text-center">
                    <i class="fas fa-trash"></i>
                </div>
            </a>
                <form action="{{ route('reports.destroy',$report->id) }}" method="POST" id="form{{ $report->id }}">                
                    @csrf
                    @method('DELETE')
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

</div>
@endsection
