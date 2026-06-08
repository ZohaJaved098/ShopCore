<x-layouts.authLayout>
    <x-form action="/register">
        <x-label name="name" title="Full Name" />
        <x-form-input type="text" name="name" />
        <x-error-msg field='name' />

        <x-label name="email" title="email" />
        <x-form-input type="email" name="email" />
        <x-error-msg field='email' />

        <x-label name="role" title="role" />
        <x-error-msg field='role' />
        <select value="{{ old('role') }}" name="role" id="role"
            class="p-3 rounded-lg bg-white my-5 outline outline-emerald-300 w-full ">
            <option value="">Select roles from below</option>
            {{-- <option value="2">Manager</option> --}}
            <option value="3">Blogger</option>
            <option value="4">Customer/Reader</option>
        </select>

        <x-label name="password" title="password" />
        <x-form-input type="password" name="password" />
        <x-error-msg field='password' />

        <x-label name="password_confirmation" title="confirm password" />
        <x-form-input type="password" name="password_confirmation" />

        <x-form-btn>Register</x-form-btn>
        <div class="flex gap-2 items-center mt-5">
            <p class=" text-lg ">Already have an account?
            </p>
            <x-nav-link extraClass="text-emerald-700 font-semibold" href="/login">Login now...</x-nav-link>
        </div>
    </x-form>
</x-layouts.authLayout>