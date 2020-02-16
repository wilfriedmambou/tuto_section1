@extends('template')
@section('content')
<div class="container">
    <h1>Contact Us</h1>
    <form action="{{route('contact')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Subject</label>
            <input type="text" name="subject" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Message</label>
            <textarea row="8" name="message" class="form-control"> </textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Send Email" />
    </form>
</div>
@endsection
