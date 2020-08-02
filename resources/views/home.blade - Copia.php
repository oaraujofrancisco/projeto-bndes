@extends('layouts.app')

@section('content')


    @if (session('status'))
        <div class="card-body">

                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>

        </div>
    @endif
<div class="container-fluid p-5" style="background-color: rgb(240, 248, 255);">
    <div class="row"><div class="container"><div class="text-center h2">Mapa com os problemas de saneamento reportados</div></div></div>
    <div class="row shadow-lg bg-dark rounded  p-1">

        <div id="principalMap" class="w-100"style="height:50em">
        </div>


        <script src="{{ asset('js/leaflet.js') }}"></script>
            
        <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">


            <script src="{{ asset('js/leaflet.markercluster-src.js') }}"></script>
            <link rel="stylesheet" href="{{ asset('css/MarkerCluster.css') }}">
            <link rel="stylesheet" href="{{ asset('css/MarkerCluster.Default.css') }}">
        



        <script>
            let principalMap = L.map(document.querySelector('#principalMap'), {
                center: [ -22.908511, -43.180006 ],
                zoom: 11
            });

            let baseMap = L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
	            attribution: '© <a href="https://www.openstreetmap.org/">OpenStreetMap</a> Contributors. Tiles courtesy of Humanitarian'
            }).addTo(principalMap);

            baseMap.addTo(principalMap);
            
            <?php
            foreach($reports as $report){
                echo "let marker{$report->id} = L.marker([ '{$report->lat}', '{$report->lng}' ], {
                    title: 'pin{$report->id}'
                }).addTo(principalMap);";
            }
            
            ?>
            var markers = L.markerClusterGroup();
            var points_rand = L.geoJson(points, {
                onEachFeature: function (feature, layer) //functionality on click on feature
                    {
                    layer.bindPopup("hi! I am one of thousands"); //just to show something in the popup. could be part of the geojson as well!
                    }   
            });
            map.addLayer(markers);      
            map.fitBounds(markers.getBounds()); 
            
            //marker.bindPopup('Banco Nacional de Desenvolvimento Econômico e Social');
            console.log(principalMap);


        </script>
    </div>
    <div class="container-fluid mt-4 border rounded shadow-lg bg-white">
        <div class="row">
            <div class="col-12 border"><p class="text-center h2">Total de reports: <br> {{ $many }}</p></div>
        </div>
        <div class="row">
            <div class="col-3 border"><p class="text-center h5 p-1">Sem água potavel: <br> <br> {{ $agua_potavel }}</p></div>
            <div class="col-3 border"><p class="text-center h5 p-1">Sem drenagem urbana: <br> <br>  {{ $drenagem_urbana }}</p></div>
            <div class="col-3 border"><p class="text-center h5 p-1">Sem coleta e/ou tratamento de esgoto: <br> <br>  {{ $coleta_tratamento_esgoto }}</p></div>
            <div class="col-3 border"><p class="text-center h5 p-1">Sem Coleta de residuos solidos: <br> <br>  {{ $coleta_residuos_solidos }}</p></div>
        </div>
    </div>
@endsection
