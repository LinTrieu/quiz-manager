@extends('layouts.master')
@section('title', 'New Question')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Create a New Question') }}</div>

                <div class="card-body">
                    <form action="{{ route('question.store',['quiz_id' => $quiz_id]) }}" method="POST">
                        @method('POST')
                        @csrf

                        <div class="form-group row">
                            <label for="question_description" class="col-md-4 col-form-label text-md-right">{{ __('Question description') }} </label>

                            <div class="col-md-6">
                                <input id="question_description" type="text" class="form-control @error('question_description') is-invalid @enderror" name="question_description" value="{{ old('question_description') }}" required autocomplete="question_description" placeholder="What is the capital of the UK?" autofocus>

                                @error('question_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row justify-content-center mt-4">
                            <p>Input the multiple-choice options for your question <i>(minimum of three)</i></p>
                        </div>
                        <div class="form-group row">
                            <label for="option_a" class="col-md-4 col-form-label text-md-right">{{ __('Option A') }} </label>

                            <div class="col-md-6">
                                <input id="option_a" type="text" class="form-control @error('option_a') is-invalid @enderror" name="option_a" value="{{ old('option_a') }}" required autocomplete="option_a" placeholder="Manchester">

                                @error('option_a')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="option_b" class="col-md-4 col-form-label text-md-right">{{ __('Option B') }} </label>

                            <div class="col-md-6">
                                <input id="option_b" type="text" class="form-control @error('option_b') is-invalid @enderror" name="option_b" value="{{ old('option_b') }}" required autocomplete="option_b" placeholder="London">

                                @error('option_b')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="option_c" class="col-md-4 col-form-label text-md-right">{{ __('Option C') }} </label>

                            <div class="col-md-6">
                                <input id="option_c" type="text" class="form-control @error('option_c') is-invalid @enderror" name="option_c" value="{{ old('option_c') }}" required autocomplete="option_c" placeholder="Glasgow">

                                @error('option_c')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="option_d" class="col-md-4 col-form-label text-md-right">{{ __('Option D') }} </label>

                            <div class="col-md-6">
                                <input id="option_d" type="text" class="form-control @error('option_d') is-invalid @enderror" name="option_d" value="{{ old('option_d') }}" autocomplete="option_d">

                                @error('option_d')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="option_e" class="col-md-4 col-form-label text-md-right">{{ __('Option E') }} </label>

                            <div class="col-md-6">
                                <input id="option_e" type="text" class="form-control @error('option_e') is-invalid @enderror" name="option_e" value="{{ old('option_e') }}" autocomplete="option_e">

                                @error('option_e')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="answer_key" class="col-md-4 col-form-label text-md-right">{{ __('Correct answer') }} </label>

                            <div class="col-md-6">
                                <input id="answer_key" type="text" class="form-control @error('answer_key') is-invalid @enderror" name="answer_key" value="{{ old('answer_key') }}" autocomplete="answer_key" pattern="[A-E]{1}" required placeholder="Input an answer key: A, B, C, D or E" >

                                @error('answer_key')
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
