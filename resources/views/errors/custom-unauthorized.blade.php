@extends('Frontend.layouts.app')
@section('title', 'Unauthorized')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="display-4 text-danger">403 - Unauthorized</h1>
        <p class="lead">Sorry, you don't have permission to perform this action.</p>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
    </div>
@endsection
