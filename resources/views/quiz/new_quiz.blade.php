@extends('layouts.master')
@section('title', 'New Quiz')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Create a New Quiz') }}</div>
                <div class="card-body">
                    <p class="card-text mx-1 mb-4">
                        Create a new quiz by adding a quiz name in the form below, as well as at at least one question.
                    </p>
                    <form method="POST" action="{{ route('quiz.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="quiz_title"
                                class="col-md-4 col-form-label text-md-right">{{ __('Quiz Title') }}</label>

                            <div class="col-md-6">
                                <input id="quiz_title" type="text"
                                    class="form-control @error('quiz_title') is-invalid @enderror" name="quiz_title"
                                    value="{{ old('quiz_title') }}" required autocomplete="quiz_title" autofocus>

                                @error('quiz_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
{{-- start of question form --}}
Question(s)
                        <div class="card-body">
                            <form action="{{ route('question.store') }}" method="POST">
                                @csrf
                                @method('POST')

                                <div class="form-group row">
                                    <label for="question_description"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Question description') }} </label>

                                    <div class="col-md-6">
                                        <input id="question_description" type="text"
                                            class="form-control @error('question_description') is-invalid @enderror"
                                            name="question_description" value="{{ old('question_description') }}" required
                                            autocomplete="question_description" autofocus>
                                        <small id="emailHelp" class="form-text text-muted">E.g 'What is the capital of the
                                            UK?'</small>

                                        @error('question_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="option_a" class="col-md-4 col-form-label text-md-right">{{ __('Option A') }}
                                    </label>

                                    <div class="col-md-6">
                                        <input id="option_a" type="text"
                                            class="form-control @error('option_a') is-invalid @enderror" name="option_a"
                                            value="{{ old('option_a') }}" required autocomplete="option_a">
                                        <small id="emailHelp" class="form-text text-muted">'Manchester'</small>

                                        @error('option_a')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="option_b" class="col-md-4 col-form-label text-md-right">{{ __('Option B') }}
                                    </label>

                                    <div class="col-md-6">
                                        <input id="option_b" type="text"
                                            class="form-control @error('option_b') is-invalid @enderror" name="option_b"
                                            value="{{ old('option_b') }}" required autocomplete="option_b">
                                        <small id="emailHelp" class="form-text text-muted">'London'</small>

                                        @error('option_b')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="option_c" class="col-md-4 col-form-label text-md-right">{{ __('Option C') }}
                                    </label>

                                    <div class="col-md-6">
                                        <input id="option_c" type="text"
                                            class="form-control @error('option_c') is-invalid @enderror" name="option_c"
                                            value="{{ old('option_c') }}" required autocomplete="option_c">
                                        <small id="emailHelp" class="form-text text-muted">'Glasgow'</small>

                                        @error('option_c')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="option_d" class="col-md-4 col-form-label text-md-right">{{ __('Option D') }}
                                    </label>

                                    <div class="col-md-6">
                                        <input id="option_d" type="text"
                                            class="form-control @error('option_d') is-invalid @enderror" name="option_d"
                                            value="{{ old('option_d') }}" autocomplete="option_d">
                                        <small id="emailHelp" class="form-text text-muted">Optional</small>

                                        @error('option_d')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="option_e" class="col-md-4 col-form-label text-md-right">{{ __('Option E') }}
                                    </label>

                                    <div class="col-md-6">
                                        <input id="option_e" type="text"
                                            class="form-control @error('option_e') is-invalid @enderror" name="option_e"
                                            value="{{ old('option_e') }}" autocomplete="option_e">
                                        <small id="emailHelp" class="form-text text-muted">Optional</small>

                                        @error('option_e')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="answer_key"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Correct answer') }} </label>

                                    <div class="col-md-6">
                                        <input id="answer_key" type="text"
                                            class="form-control @error('answer_key') is-invalid @enderror" name="answer_key"
                                            value="{{ old('answer_key') }}" autocomplete="answer_key" pattern="[A-E]{1}"
                                            required>
                                        <small id="emailHelp" class="form-text text-muted">Input the correct answer key: 'A',
                                            'B', 'C', 'D' or 'E'</small>
                                        @error('answer_key')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit Question') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> 
{{--  end of question form --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create new Quiz') }}
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
