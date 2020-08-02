@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="card-body">

                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>

        </div>
    @endif
<div class="container-fluid p-5">
    <div class="row"><div class="container"><div class="text-center h2" style='color: #008000'>Mapa com os problemas de saneamento reportados</div></div></div>
    <div class="row shadow-lg bg-dark rounded  p-1">

        <div id="map" class="w-100"style="height:40em;">
        </div>


        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />

        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
        <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>



        
    </div>
    <div class="container-fluid mt-4 border rounded shadow-lg bg-white">
        <div class="row">
            <div class="col-12 border" id="totalReports"><p class="text-center p-2">Total de reports: <br> {{ $many }}</p></div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            <div class="col border" id="aguaPotavel"><p class="text-center p-2">Sem água potavel: <br>{{ $agua_potavel }}</p></div>
            <div class="col border" id="drenagemUrbana"><p class="text-center p-2">Sem drenagem urbana: <br> {{ $drenagem_urbana }}</p></div>
            <div class="col border" id="coletaEsgoto"><p class="text-center p-2">Sem coleta e/ou tratamento de esgoto: <br> {{ $coleta_tratamento_esgoto }}</p></div>
            <div class="col border" id="coletaResiduos"><p class="text-center p-2">Sem Coleta de residuos solidos: <br> {{ $coleta_residuos_solidos }}</p></div>
        </div>
    </div>

    <script>

                let addressPointsAll = [
                    <?php
                        $v = 0;
                        foreach($reports as $report){
                            if ($v == 1){
                                echo ",[{$report->lat}, {$report->lng}, '{$report->bairro}', ".$report->id."]";
                            }else{
                                echo "[{$report->lat}, {$report->lng}, '{$report->bairro}', ".$report->id."]";
                                $v++;
                            }
                        }
                        
                    ?>
                ];

            let map = L.map('map').setView([ -22.908511, -43.180006 ], 11);
                L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                 }).addTo(map);

            filterReports(addressPointsAll);

            function filterReports(filterReports){
            
                let markers = L.markerClusterGroup();

                for (let i = 0; i < filterReports.length; i++) {
                    let point = filterReports[i];
                    let latitude = point[0];
                    let longitude = point[1];
                    let title = point[2];
                    let marker = L.marker(new L.LatLng(latitude, longitude), {title: title});
                    marker.bindPopup(title);
                    markers.addLayer(marker);
                    map.addLayer(markers);
                    console.log(title, latitude, longitude);
                }
            }
    </script>
@endsection
