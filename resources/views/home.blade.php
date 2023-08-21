@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center mt-4">
        <div class="col-md-8 text-center">
            <a href="{{ route('checkin') }}" type="button" class="btn btn-primary">Check In</a>
            <a href="{{ route('checkout') }}" type="button" class="btn btn-danger">Check Out</a>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <h3>Attendances</h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $attendance)
                    <tr>
                        <th scope="row">{{ $attendance->id }}</th>
                        <td>{{ $attendance->user_id }}</td>
                        <td>{{ $attendance->type }}</td>
                        <td>{{ $attendance->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('edit', $attendance->id) }}" type="button" class="btn btn-primary">Edit</a>
                            <a href="{{ route('delete', $attendance->id) }}" type="button" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection