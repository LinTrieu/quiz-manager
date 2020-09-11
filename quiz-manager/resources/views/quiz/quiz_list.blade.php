@extends('layouts.master')
@section('title', 'Quizzes')
@section('content')
    <div class="container">
        @if( $permissionLevel != 1)
        <div class="row justify-content-center">
            <button type="button" class="btn btn-primary" onclick="window.location.href='/quiz/create';">Add a new Quiz</button>
        </div>
        @endif
        <div class="row justify-content-center mt-3">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> {{ __('Quizzes') }} </div>

                    <div class="card-body">
                        @foreach ($quizzes as $quiz)
                            <p> <a href= {{ route('quiz.id', ['quiz_id' => $quiz['id'] ]) }} > Quiz {{ $quiz['id'] }} - {{ $quiz['title']  }} </a> </p>
                        @endforeach
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>

        {{--    TODO: implement design option- List quizzes per card element. Would be cleaner and clearer. Optional if enough time permits --}}
        {{--    <div class="row justify-content-center mt-3">--}}
        {{--        <div class="col-md-8">--}}
        {{--            <div class="card">--}}
        {{--                <div class="card-header"> {{ __('Quiz') }} </div>--}}

        {{--                <div class="card-body">--}}
        {{--                    @foreach ($quizzes as $quiz)--}}
        {{--                        <p> Quiz {{ $quiz['id'] }} - {{ $quiz['title']  }} </p>--}}
        {{--                    @endforeach--}}
        {{--                </div>--}}
        {{--                <div class="card-footer">--}}
        {{--                    <a href="{{ url('question') }}" class="btn btn-primary">See Questions</a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}

    </div>
@endsection
