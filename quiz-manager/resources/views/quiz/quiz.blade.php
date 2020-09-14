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
                                    <p class="font-weight-bold"> {{ $question['description'] }} </p>
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
                        <form action="{{ route('quiz.destroy',['quiz_id' => $quiz['id']]) }}" method="POST" style="float:right">
                            @method('DELETE')
                            @csrf
                            <span class="ml-auto">
                                <button type="submit" class="btn-sm btn-primary mx-2">Delete quiz</button>
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
