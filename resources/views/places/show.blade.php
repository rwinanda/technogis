@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row mb-10">
        <div class="col-md-6">
            <div id="map" style="height: 400px, z-index:0;" ></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $place->name }}</h2>
            <a href="/place" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> Back to my post</a>
            <a href="/place/{{ $place->id }}/edit" class="btn btn-warning"><i class="bi bi-scissors"></i> Edit</a>
            <form action="/place/{{ $place->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure')">
                <i class="bi bi-x"></i>Delete</button>
              </form>
            <article class="my-3 fs-5">
                <h3> Longitude : {{ $place->longitude }} </h3>
                <h3> Latitude  : {{ $place->latitude }} </h3>
            </article>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([{{ $place->latitude }}, {{ $place->longitude }}], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);

        // menghubungkan dan menampilkan GeoJSON
        // var geojsonLayer = L.geoJSON.ajax({!! json_encode($geojson) !!}).addTo(map);
        @isset($geojsonData)
            var geojsonData = @json($geojsonData);
            L.geoJSON(geojsonData).addTo(map);
        @endisset

    </script>
@endsection