@extends('layouts.main')

@section('container')
<h1>Tambah place</h1>
<div class="col-lg-6">
    <a href="/place" class="btn btn-success mb-3"><i class="bi bi-arrow-bar-left"></i> Back to my post</a>
    {{-- form create --}}
    <form method="post" action="/place" class="mb-5" enctype="multipart/form-data"> 
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
           value="{{ old('name') }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message  }}
          </div></div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">longitude</label>
            <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" 
            name="longitude" value="{{ old('longitude') }}">
            @error('longitude')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">latitude</label>
            <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="latitude" 
            name="latitude" value="{{ old('latitude') }}">
            @error('latitude')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Place</button>
    </form>
</div>
@endsection