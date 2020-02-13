@extends('template')
@section('content')

<div class="container">
 <div class="col-md-6">
 <br>

    <h1>{{$question->title}}</h1>
    <p class="lead">
        {{$question->description}}
    </p>
    <p>
    Qestion posee par: <i> <b> {{$question->user->name}} {{$question->created_at->diffForHumans()}} </i></b>
    </p>
    @if(Auth::id())
        <a class="primary" href="{{route('questions.edit',$question->id)}}">modifier la question</a>
    @endif
    <hr/>
    @if ($question->answers->count()>0) 
        @foreach($question->answers as $answer)
        <div class="container">
        <div class="alert alert-dark" role="alert">
            <div class="panel-body">
                <p>
                    {{$answer->content}}
                </p>
                <h6>Repondu par : <i><b>{{$answer->user->name}},{{$answer->created_at->diffForHumans()}}</b></i></h6>
               
            </div>
            @if(Auth::id())
                <a class="primary" href="{{route('answers.edit',$answer->id)}}">modifier votre reponse</a>
            @endif
        </div>
        
        </div>

        @endforeach
    @else
     <p>il ya pas de reponses a cette question proposez en une </p>
    @endif

    <hr/>

    <form action="{{route('answers.store')}}"method="POST">
        {{csrf_field()}}
        <h4>Soumettez votre reponse</h4>
        <textarea name="content" id="" rows="4" class="form-control"></textarea>
        <input type="hidden" value="{{$question->id}}"name="question_id"/>
        <button class="btn btn-primary">Soumettre la reponse</button>
    </form>
    </div>
</div>

@endsection