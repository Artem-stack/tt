@section('title', $cat->title)

<link href="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.css" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.js"></script>
    <meta name="theme-color" content="#7952b3">

             <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Movies</h3>
    <a class="btn btn-primary" role="button" href="{{ route('movies.create') }}">Create movies</a>

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Genre</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $movie)
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
                 
                <td>
                    <form method="POST" action="{{ route("movies.destroy", $movie->id) }}">
                       
                        <a href="{{ route("movies.edit", $movie->id) }}"><img src="/images/pencil.png" alt="Edit" width = "30" height = "30"> </a>
                      
                        @csrf
                        @method('DELETE')
                         <td>
                        <button><img src="/images/delete.png" alt="Delete" width = "30" height = "30"></button>
                         </td>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

