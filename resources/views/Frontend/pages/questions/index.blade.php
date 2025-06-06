@extends('Frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-4">Latest Questions</h2>
                    <a href="{{route('questions.create')}}" class="btn btn-primary">Ask Questions</a>
                </div>
                @include('Frontend.layouts._message')
                @forelse($questions as $question)
                    <div class="card mb-4 shadow-sm border-1 rounded-2">
                        <div class="card-body d-flex flex-column flex-md-row justify-content-between gap-3">

                            <div class="text-md-end text-start">
                                <span class="badge bg-primary mb-1">
                                    <i class="bi bi-arrow-up-circle-fill"></i> {{ $question->votes }} Votes
                                </span><br>
                                <span class="badge bg-success mb-1">
                                    <i class="bi bi-chat-left-text-fill"></i> {{ $question->answers }} Answers
                                </span><br>
                                <span class="badge bg-secondary">
                                    <i class="bi bi-eye-fill"></i> {{ $question->views }} Views
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-2">
                                    <a href="{{ route('questions.show', $question->slug) }}" class="text-decoration-none text-dark hover-effect">
                                        {{ $question->title }}
                                    </a>
                                </h5>
                                <p class="text-muted mb-1 small">
                                    <i class="bi bi-person-circle"></i> Asked By {{ $question->user->name ?? 'Unknown' }} •
                                    <i class="bi bi-clock"></i> {{ $question->created_at->format('M d, Y') }}
                                </p>
                                <p class="text-secondary">{{ Str::limit($question->body, 150) }}</p>
                            </div>
                            <div class="ml-auto d-flex justify-content-center align-items-center ">
                                @can('update',$question)
                                <a href="{{route('questions.edit',$question->id)}}" class="btn btn-sm btn-outline-info">Edit</a> &nbsp;
                                @endcan
                                @can('delete',$question)
                                <form method="post" action="{{route('questions.destroy',$question->id)}}" >
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return alert('Are you sure to delete this question')">Delete</button>
                                </form>
                                    @endcan
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center rounded-3">
                        No questions available. Be the first to ask!
                    </div>
                @endforelse
            </div>
            <div class="text-left">
                {{$questions->links()}}
            </div>
        </div>
    </div>
@endsection
