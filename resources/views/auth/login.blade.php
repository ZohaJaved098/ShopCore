<x-layouts.authLayout>
    <x-form action="/login">
        <x-label name="email" title="Email" />
        <x-form-input type="email" name="email" />
        <x-error-msg field='email' />

        <x-label name="password" title="Password" />
        <x-form-input type="password" name="password" />

        <x-form-btn>Login</x-form-btn>
        <div class="flex flex-col items-start md:flex-row md:items-center justify-between w-full mt-5">
            <span class="text-emerald-700 font-semibold">
                <x-nav-link>Forgot Password?</x-nav-link>
            </span>
            <div class="flex gap-2">
                <p class=" text-lg ">Don't have an account?
                </p>
                <x-nav-link extraClass="text-emerald-700 font-semibold" href="/register">Register now...</x-nav-link>
            </div>
        </div>
    </x-form>
</x-layouts.authLayout>