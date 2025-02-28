@extends('layouts.main2')

@section('content')
  <style>
    .badge:hover {
      color: #fff !important;
      text-decoration: none;
    }

    .bg-success:hover {
      background: #2f9164 !important;
    }

    .bg-danger:hover {
      background: #e84a59 !important;
    }
  </style>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 clrT">Alternatives</h1>
  </div>

  <div class="table-responsive clrT">
    <button type="button" class="btn btnBaru mb-3" data-bs-toggle="modal" data-bs-target="#addAlternativeModal">
      
      Buat Baru
    </button>

    <table class="table table-bordered clrT">
      <thead class="table-dark bg-baru">
          <tr>
            <th class="text-center align-middle " rowspan="2">No</th>
            <th class="text-center align-middle " rowspan="2">Alternative Nama</th>
            <th class="text-center " colspan="{{ $criterias->count() }}">Kriteria</th>
            <th class="text-center  align-middle" rowspan="2">Action</th>
          </tr>
          <tr>
            @if ($criterias->count())
              @foreach ($criterias as $criteria)
                <th class="text-center ">{{ $criteria->name }}</th>
              @endforeach
            @else
              <th class="text-center clrT">Tidak Ada Data</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @if ($alternatives->count())
            @foreach ($alternatives as $alternative)
              <tr>
                <th scope="row" class="text-center clrT">
                  {{ $loop->iteration }}
                </th>
                <td class="text-center clrT">
                  {{ $alternative->name }}
                </td>
                @foreach ($criterias as $key => $value)
                  @if (isset($alternative->alternatives[$key]))
                    <td class="text-center clrT">
                      {{ floatval($alternative->alternatives[$key]->alternative_value) }}
                    </td>
                  @else
                    <td class="text-center clrT">
                      Empty
                    </td>
                  @endif
                @endforeach

                <td class="text-center">
                  <a href="/dashboard/alternatives/{{ $alternative->id }}/edit" class="badge bg-success text-decoration-none">
                    Edit
                  </a>

                  <form action="/dashboard/alternatives/{{ $alternative->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf

                    <span class="badge bg-danger btnDelete" data-object="Alternative" style="cursor: pointer;">
                      Delete
                    </span>
                  </form>
                </td>
              </tr>
            @endforeach
          @else
          <tr>
            <td colspan="{{ 3 + $criterias->count() }}" class="text-center text-danger">
              No Data
            </td>
          </tr>
          @endif
        </tbody>
    </table>
  </div>

  <!-- Add Alternative -->
  <div class="modal fade" id="addAlternativeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAlternativeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-mb">
        <div class="modal-header">
          <h5 class="modal-title" id="addAlternativeModalLabel">Add Alternative</h5>
          <button style="background-color: transparent" type="button" class="btn-close-muted" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/dashboard/alternatives" method="post">
          <div class="modal-body">
            <span class="mb-2">Rules :</span>
            <ul class="list-group mb-2">
              <li class="list-group-item bg-success text-white">
                The minimum number is 0
              </li>
              <li class="list-group-item bg-success text-white">
                The maximum number is 999
              </li>
              <li class="list-group-item bg-success text-white">
                Please use dot (.) if you want to make a decimal input
              </li>
            </ul>

              @csrf
              <div class="my-2">
                <label for="aktifitas_object_id" class="form-label">Tourism Object</label>
                <select class="form-select @error('aktifitas_object_id') 'is-invalid' : ''  @enderror" id="aktifitas_object_id" name="aktifitas_object_id" required>
                  @if ($aktifitas_object->count())
                    <option disabled selected>--Choose One--</option>
                    @foreach ($aktifitas_object as $tourism)
                      <option value="{{ $tourism->id }}">
                        {{ $tourism->name }}
                      </option>
                    @endforeach
                  @else
                    <option disabled value="" selected>--NO DATA FOUND--</option>
                  @endif
                </select>

                @error('aktifitas_object_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              @if ($criterias->count())
                @foreach ($criterias as $key => $criteria)
                  <input type="hidden" name="criteria_id[]" value="{{ $criteria->id }}">

                  <div class="my-2">
                    <label for="{{ str_replace(' ','', $criteria->name) }}" class="form-label">
                      Value of {{ $criteria->name }}
                    </label>
                    <input type="text" id="{{ str_replace(' ','', $criteria->name) }}" class="form-control @error('alternative_value') 'is-invalid' : '' @enderror" name="alternative_value[]" placeholder="Enter the value" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57)|| event.charCode == 46)" maxlength="5" autocomplete="off" required>

                    @error('alternative_value')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                @endforeach
              @endif

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="{{ $criterias->count() ? "submit" : "button" }}" class="btn btn-primary">Add Alternative</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
