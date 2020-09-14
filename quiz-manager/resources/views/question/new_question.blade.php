@extends('layouts.master')
@section('title', 'New Question')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Create a New Question') }}</div>

                <div class="card-body">
{{--                    <form method="POST" action="{{ route('question.store',['quiz_id' => $quiz['id']]) }}">--}}
{{--                    <form method="POST" action="{{ url( 'quiz/'.$quiz['id'].'/store', ['quiz_id' => $quiz['id']] ) }}">--}}
                    <form action="{{ route('question.store',['quiz' => $quiz]) }}" method="POST">
                        @method('POST')
                        @csrf

                        <div class="form-group row">
                            <label for="question_description" class="col-md-4 col-form-label text-md-right">{{ __('Question in the quiz:' . $quiz) }} </label>

                            <div class="col-md-6">
                                <input id="question_description" type="text" class="form-control @error('question_description') is-invalid @enderror" name="question_description" value="{{ old('question_description') }}" required autocomplete="question_description" autofocus>

                                @error('question_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Question') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
