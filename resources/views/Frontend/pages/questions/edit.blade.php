@extends('Frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-4">Update Question</h2>
                    <a href="{{route('questions.index')}}" class="btn btn-primary">Back to All Questions</a>
                </div>
                    <div class="card mb-4 shadow-sm border-1 rounded-2">
                        <div class="card-body gap-3">
                            <form class="" action="{{route('questions.update',$question->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                @include('Frontend.layouts._form',['buttonText' =>'Update Question'])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
