<x-layout>
    <x-form title="Register" description="Enter your details to create your account.">
        <form action="/register" method="POST" class="mt-10">
            @csrf
            
            <x-form.field label="Name" name="name" />
            <x-form.field label="Email" name="email" type="email" />
            <x-form.field label="Password" name="password" type="password" />

            <button type="submit" class="btn mt-2 h-20 w-full">Register</button>

        </form>
    </x-form>
</x-layout>