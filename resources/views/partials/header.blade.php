<nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">

    <div class="sm:mb-0 self-center">
        @auth("web")
            <a href="{{ url ("logout") }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Exit</a>
        @endauth

        @guest("web")
            <a href="{{ route("login") }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Login</a>
        @endguest
    </div>
</nav>