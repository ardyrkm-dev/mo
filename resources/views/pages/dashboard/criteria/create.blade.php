@extends('layouts.main2')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Kriteria</h1>
  </div>

  <form class="col-lg-8" method="POST" action="/dashboard/criterias">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control formcss @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autofocus required>

      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="attribute" class="form-label">Attribute</label>
      <select class="form-select formcss @error("attribute") is-invalid @enderror" id="attribute" name="attribute" required>
        <option value="" disabled selected>Choose One</option>
        <option value="BENEFIT" {{ old('attribute') === 'BENEFIT' ?  'selected' : '' }}>Benefit</option>
        <option value="COST" {{ old('attribute') === 'COST' ?  'selected' : '' }}>Cost</option>
      </select>

      @error('attribute')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <button type="submit" class="btn btnBaru mb-3">Simpan</button>
    <a href="/dashboard/criterias" class="btn btn-danger mb-3">Cancel</a>
  </form>
@endsection
