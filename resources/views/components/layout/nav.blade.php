<nav class="border-b border-border px-6">
    <div class="max-w-7x1 mx-auto h-16 flex items-center justify-between">
       <div>
            <a href="/" alt="Idea Logo" width="100">
                <x-logo-svg />
            </a>
        </div>


        <div>
            @auth
                
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-semibold text-muted-foreground" data-test="logout-button">Logout</button>
                </form>

            @endauth


            @guest
                
                <a href="/login" class="text-sm font-semibold text-muted-foreground">Login</a>
                <a href="/register" class="ml-4 text-sm font-semibold text-muted-foreground">Register</a>

            @endguest
              
        </div>

    </div>
</nav>
