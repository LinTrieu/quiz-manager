@extends('layouts.master')
@section('title', 'Quiz')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> {{ __('Quiz') }} </div>

                    <div class="card-body">
                        @foreach ($questions as $question)
                            <div class="mb-5">
                                <p> Question {{ $question['id'] }}. {{ $question['description'] }} </p>
                                <p> Options </p>
                                <li> A: {{ $question['option_a'] }} </li>
                                <li> B: {{ $question['option_b'] }} </li>
                                <li> C: {{ $question['option_c'] }} </li>
                                <li> D: {{ $question['option_d'] }} </li>
                                <li> E: {{ $question['option_e'] }} </li>
                                <br>
                                <a href="#" class="card-link">Show Answer</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <a href="https://google.com" class="btn btn-primary">See Answers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
