@extends('Frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-4">Ask Question</h2>
                    <a href="{{route('questions.index')}}" class="btn btn-primary">Back to All Questions</a>
                </div>
                    <div class="card mb-4 shadow-sm border-1 rounded-2">
                        <div class="card-body gap-3">
                            <form class="" action="{{route('questions.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="question-title" class="form-label">Title</label>
                                    <input type="text" class="form-control {{$errors->has('title')? 'is-invalid':''}}" name="title" value="{{old('title')}}" id="question-title" >
                                    @error('title')
                                    <small class="text-danger ">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="question-body" class="form-label">Question Detail</label>
                                    <textarea class="form-control {{$errors->has('body')? 'is-invalid':''}}" name="body" id="question-body" rows="6">
                                        {{old('body')}}
                                    </textarea>
                                    @error('body')
                                    <small class=" text-danger ">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group pt-2">
                                    <button  type="submit" class="btn btn-primary">Ask this Question</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
