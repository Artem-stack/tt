  @extends('layout')

@section('title', 'test task')

<link href="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.css" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.js"></script>
    <meta name="theme-color" content="#7952b3">
    
@section('content')

  <li class="hassubs">
                                        <h1>Movies with a genre</h1>
                                        <ul>
                                            @foreach($genre as $genres)
                                                <li><a href="{{route('category',$genres->id)}}">{{$genres->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endsection