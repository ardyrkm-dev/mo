@extends('layouts.main2')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Baru</h1>
  </div>

  <form class="col-lg-8" method="POST" action="/dashboard/users">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Fullname</label>
      <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autofocus required>

      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>

      @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>

      @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>

      @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="level" class="form-label">User Level</label>
      <select class="form-select @error("level") is-invalid @enderror" id="level" name="level" required>
        <option value="" disabled selected>Choose One</option>
        <option value="ADMIN" {{ old('level') === 'ADMIN' ?  'selected' : '' }}>Admin</option>
        <option value="USER" {{ old('level') === 'USER' ?  'selected' : '' }}>User</option>
      </select>

      @error('level')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary mb-3">Save</button>
    <a href="/dashboard/users" class="btn btn-danger mb-3">Cancel</a>
  </form>
@endsection
