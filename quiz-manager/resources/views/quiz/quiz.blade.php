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
                            <div class="mb-4">
                                <p class="font-weight-bold"> Question {{ $question['id'] }}. {{ $question['description'] }} </p>
                                @if( $permissionLevel != 1)
                                    <div class="answer-options">
                                        <p> Options: </p>
                                        <li> A: {{ $question['option_a'] }} </li>
                                        <li> B: {{ $question['option_b'] }} </li>
                                        <li> C: {{ $question['option_c'] }} </li>
                                        <li> D: {{ $question['option_d'] }} </li>
                                        <li> E: {{ $question['option_e'] }} </li>
                                        <br>
                                        <p class="answer-key">
                                            Answer: {{ $question['answer_key'] }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
{{--                    <div class="card-footer row justify-content-center">--}}
                    <div class="card-footer justify-content-center">
                    @if($permissionLevel != 1)
                        <a class="btn btn-primary show-answers">Reveal Answers</a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".answer-key").hide();

            $(".show-answers").click(function(){
                $(".answer-key").show();
            });
        });
    </script>
@endsection
