@extends('Frontend.layouts.app')

@section('content')
    <div class="container">
      <div class="card">
          <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                  <h1 class="">{{$question->title}}</h1>
                  <a href="{{route('questions.index')}}" class="btn btn-primary">Back to All Questions</a>
              </div>
          </div>
           <div class="card-body">
               {!! $question->body_html !!}
           </div>
          </div>
    </div>
@endsection
