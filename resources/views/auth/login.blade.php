<x-layout>
    <x-form title="Login" description="">
        <form action="/login" method="POST" class="mt-10">
            @csrf
            
            <x-form.field label="Email" name="email" type="email" />
            <x-form.field label="Password" name="password" type="password" />

            <button type="submit" class="btn mt-2 h-20 w-full" data-test="login-button">Login</button>

        </form>
    </x-form>
</x-layout>