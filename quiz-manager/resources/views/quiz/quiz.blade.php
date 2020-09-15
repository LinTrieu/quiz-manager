@extends('layouts.master')
@section('title', 'Quiz')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> {{ __('Quiz: ') . $quiz['title'] }} </div>

                    <div class="card-body">
                        <ol type="1">
                        @foreach ($questions as $question)
                            <div class="mb-4">
                                <li>
                                    <p class="font-weight-bold d-inline-block"> {{ $question['description'] }} </p>

                                    <div class="d-inline-block float-right">
                                        <form action="{{ route('question.destroy', $question) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm text-danger">Delete</button>
                                        </form>
                                    </div>

                                    <div class="d-inline-block float-right">
                                        <form action="{{ route('question.edit', $question) }}" method="GET">
                                            @method('GET')
                                            @csrf
                                            <button type="submit" class="btn btn-sm text-primary">Edit</button>
                                        </form>
                                    </div>

                                </li>
                                @if( $permissionLevel != UserPermission::PERMISSION_RESTRICT)
                                    Options:
                                    <ol type="A">
                                    <div class="answer-options">
                                        <li> {{ $question['option_a'] }} </li>
                                        <li> {{ $question['option_b'] }} </li>
                                        <li> {{ $question['option_c'] }} </li>
                                        <li> {{ $question['option_d'] }} </li>
                                        <li> {{ $question['option_e'] }} </li>
                                        <br>
                                        <p class="answer-key">
                                            Answer: {{ $question['answer_key'] }}
                                        </p>
                                    </div>
                                    </ol>
                                @endif
                            </div>
                        @endforeach
                        </ol>
                    </div>
                    <div class="card-footer btn-toolbar justify-content-center">
                    @if($permissionLevel != UserPermission::PERMISSION_RESTRICT)
                        <button class="btn-sm btn-primary show-answers mx-2"> Reveal Answers </button>
                    @endif

                    @if($permissionLevel == UserPermission::PERMISSION_EDIT)
                        <form action="{{ route('question.create', ['quiz' => $quiz]) }}" method="GET" style="float:right">
                            @method('GET')
                            @csrf
                            <span class="ml-auto">
                                <button type="submit" class="btn-sm btn-primary mx-2">Add Question</button>
                            </span>
                        </form>

{{--                        <form action="{{ route('question.edit', ['quiz' => $quiz]) }}" method="GET" style="float:right">--}}
{{--                            @method('GET')--}}
{{--                            @csrf--}}
{{--                            <span class="ml-auto">--}}
{{--                                <button type="submit" class="btn-sm btn-primary mx-2">Edit Questions</button>--}}
{{--                            </span>--}}
{{--                        </form>--}}

                            <form action="{{ route('quiz.destroy',['quiz' => $quiz]) }}" method="POST" style="float:right">
                            @method('DELETE')
                            @csrf
                            <span class="ml-auto">
                                <button type="submit" class="btn-sm btn-primary mx-2">Delete Quiz</button>
                            </span>
                        </form>
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
