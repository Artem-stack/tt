@extends('layout')

@section('title', 'test task')

<link href="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.css" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <meta name="theme-color" content="#7952b3">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        
        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>

    <meta name="theme-color" content="#7952b3">
    
@section('content')

<div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Movies</h3>

   


    <table id = "example" class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Genre</th>
            
        </tr>
        </thead>
        <body>
        @foreach($movies as $movie)
            <tr>
                <th scope="row">{{ $movie->id }}</th>
                  <td>
                    <div><img src="/image/{{ $movie->image }}" width="50px"  height="50px" background-position= "center center";></div>
                </td>
                <td>
                    <div>{{ $movie->name }}</div>
                </td>
                 <td> 
                    <div>{{ $movie->genre['name'] }}</div>
                </td>
                 
            </tr>
        @endforeach
        </body>
    </table>

@endsection

