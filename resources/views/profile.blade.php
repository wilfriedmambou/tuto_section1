@extends('template')
@section('content')
<div class="container">
    <img src="{{asset('storage/'.$user->profile_pic)}}" alt="" class="img-rounded  float-right"
        style="max-height:100px; border-radius:50%;">
    <h1>{{$user->name}}'s Profile</h1>
    <p>
        See what {{$user->name}} has been up to on LaravelAnswers.
    </p>
    <hr />
    <div class="row">
        <div class="col-md-6">
            <h3>Questions</h3>
            @foreach ($user->questions as $question)

            <div class="card  card-primary mb-3 text-center">
                <div class="card-block">

                    <blockquote class="card-blockquote">

                        <p>
                            <h5>{{$question->title}}</h5>
                            {{$question->description}}
                        </p>
                        <div class="card-footer"><a href="{{route('questions.show',$question->id)}}"
                                class="btn btn-link">View Question</a></div>
                    </blockquote>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <h3>Answer</h3>
            @foreach ($user->answers as $answer)
            <div class="card  card-primary mb-3 text-center">
                <div class="card-header">
                    {{$answer->question->title}}
                </div>
                <div class="card-body">
                    <blockquote class="card-blockquote">
                        <p>
                            <small>{{$user->name}}'s answer:</small>
                            {{$answer->content}}
                        </p>
                        <a href="{{route('questions.show',$answer->question->id)}}" class="btn btn-sm btn-link">View All
                            Answer for this Question</a>
                    </blockquote>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection