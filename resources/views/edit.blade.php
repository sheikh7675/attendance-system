@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">

          <form action="{{ route('update', $attendance->id) }}" method="post">
            @csrf
            <div class="mb-3">
              <label class="form-label">Type</label>
              <input type="text" name="type" class="form-control" value="{{ $attendance->type }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
    </div>

</div>
@endsection