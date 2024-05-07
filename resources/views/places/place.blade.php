@extends('layouts.main')

@section('container')
<h1>Selamat Datang Di Tabel Place<h1>

@if (session()->has('success'))
  <div class="alert alert-success col-lg-11 mt-4" style="font-size: 1.4rem">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive small col-lg-11 mt-4">
    <a href="/place/create" class="btn btn-primary mb-3"><i class="bi bi-file-earmark-plus"></i> Place</a>
    <table class="table table-striped table-sm" style="font-size: 1.4rem">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name City</th>
          <th scope="col">Longitude</th>
          <th scope="col">Latitude</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($places as $place)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $place->name }}</td>
          <td>{{ $place->longitude }}</td>
          <td>{{ $place->latitude }}</td>
          <td>
              {{-- Tombol view place --}}
              <a href="/place/{{ $place->id }}" class="badge bg-primary"><i class="bi bi-eye"></i> View</a>
              {{-- Tombol View Edit --}}
              <a href="/place/{{ $place->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i> Edit</a>
              {{-- Tombol View Delete --}}
              <form action="/place/{{ $place->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')">
                <i class="bi bi-trash"></i> Delete</button>
              </form>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>

@endsection