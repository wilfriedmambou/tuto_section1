@extends('template')
@section('content')
<div class="container col-md-6">

<form action="{{route('questions.update',$question->id)}}"method="POST">
  @method('PUT')
        {{csrf_field()}}
        <h4>Modifier votre question : {{$question->title}}</h4>
        <hr/>
        <div class="form-group">
        <textarea name="title" id="title" rows="4" class="form-control  @error('title') is-invalid @enderror" value="{{$question->content}}" placeholder="{{$question->title}}"required>
        {{ old('title') }}
        </textarea>
        @error('title')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>

        <input type="hidden" value="{{$question->id}}"name="question_id"/>
        <button class="btn btn-primary">Soumettre la reponse</button>
    </form>
    </div>
@endsection