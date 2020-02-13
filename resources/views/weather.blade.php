@extends("template")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Entree une adresse pour avoir les previsions meteorologiques</h1>
            <hr/>
            <form action="{{route('weather')}}" method="post" ">
            {{ csrf_field()}}
                <input type="text" name="location" style="margin:20px;" placeholder="Entrez un code Zip ou une adresse"/>
                <input type="submit" class="btn btn-primary" style ="width:100%;"; value="Get Weader"/>
            </form>
        </div>
    </div>
</div>
@endsection