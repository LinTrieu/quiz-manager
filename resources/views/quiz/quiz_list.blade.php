@extends('layouts.master')
@section('title', 'All Quizzes')
@section('content')
<div class="container">
    @if($permissionLevel == UserPermission::PERMISSION_EDIT)
    <div class="row justify-content-center">
        <a href="{{ url('quiz/create') }}" class="btn btn-primary"> Add a new Quiz </a>
    </div>
    @endif
    <div class="row justify-content-center mt-3">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> {{ __('All Quizzes') }} </div>

                <div class="card-body">
                    <ol>
                        @foreach ($quizzes as $quiz)
                        <li>
                            <p class="d-flex">
                                <a href="{{ route('question.show', ['quiz' => $quiz]) }}"> {{ $quiz['title']  }} </a>
                        </li>
                        @endforeach
                    </ol>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
