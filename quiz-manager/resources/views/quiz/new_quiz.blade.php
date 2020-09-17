@extends('layouts.master')
@section('title', 'New Quiz')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Create a New Quiz') }}</div>

                <div class="card-body">
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
