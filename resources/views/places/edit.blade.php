@extends('layouts.main')

@section('container')
<h1>Edit Place</h1>
<div class="col-lg-8">
    <a href="/place" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> Back to my post</a>
    {{-- form Edit --}}
    <form method="post" action="/place/{{ $place->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" 
          value="{{ old('name', $place->name) }}">
          @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">longitude</label>
            <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" 
            value="{{ old('longitude', $place->longitude) }}">
            @error ('longitude')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">latitude</label>
            <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" 
            value="{{ old('latitude', $place->latitude) }}"> 
            @error ('latitude')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Place</button>
    </form>
</div>
@endsection