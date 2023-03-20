<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link href="/css/app.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://getbootstrap.com/docs/5.0/examples/checkout/form-validation.js"></script>
</head>
<body>
    <div>
        <div  class="flex h-screen bg-gray-200">
           
            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
               
                <nav class="mt-10">
                    
                       
                        <a style="text-decoration: none;" href="{{ route('movies.index') }}"
                       class="text-gray-100 flex items-center mt-4 py-2 px-6">

                        <span class="mx-3">Movies</span>
                    </a>

                    <a style="text-decoration: none;" href="{{ route('movieswith') }}"
                       class="text-gray-100 flex items-center mt-4 py-2 px-6">

                        <span class="mx-3">Movies with a genre</span>
                    </a>



                        <a style="text-decoration: none;" href="{{ route('by') }}"
                       class="text-gray-100 flex items-center mt-4 py-2 px-6">

                        <span class="mx-3">Movie by id</span>
                    </a>

                    <a style="text-decoration: none;" href="{{ route('genre.index') }}"
                       class="text-gray-100 flex items-center mt-4 py-2 px-6">

                        <span class="mx-3">Genres</span>
                    </a>
                </nav>
            </div>

           

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    @yield('content')
                </main>
           
        </div>
    </div>
</body>
</html>

