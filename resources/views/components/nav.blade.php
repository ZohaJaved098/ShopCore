<nav class="h-24 w-full border-b-4 border-emerald-500 p-5 flex justify-between items-center ">
    <x-logo />
    <ul class="flex space-x-4 items-center">

        <x-dropdown :options="[
        ['label' => 'All Products', 'url' => 'products', 'solidIcon' => 'heroicon-s-cube', 'outlinedIcon' => 'heroicon-o-cube'],
        ['label' => 'Create new ', 'url' => 'products/create', 'solidIcon' => 'heroicon-s-pencil-square', 'outlinedIcon' => 'heroicon-o-pencil-square', 'can' => 'create-product'],
        ['label' => 'Orders', 'url' => 'orders', 'solidIcon' => 'heroicon-s-receipt-percent', 'outlinedIcon' => 'heroicon-o-receipt-percent'],
    ]">
            @if (request()->is('products'))
                <x-heroicon-s-shopping-bag class="text-emerald-900 hover:text-emerald-400 w-8 h-8 " />
            @else <x-heroicon-o-shopping-bag class="text-emerald-700 hover:text-emerald-400 w-8 h-8 " />
            @endif
            <p class="text-xs text-emerald-700 font-light group-hover:text-emerald-400">
                Products
            </p>
        </x-dropdown>
        @auth
            <div class="relative">

                <x-nav-link info="Cart" href="/cart">
                    @if (request()->is('cart'))
                        <x-heroicon-s-shopping-cart class="text-emerald-900 hover:text-emerald-400 w-8 h-8 " />
                    @else <x-heroicon-o-shopping-cart class="text-emerald-700 hover:text-emerald-400 w-8 h-8 " />
                    @endif
                </x-nav-link>

                @if(auth()->user()->carts->count())
                    <span
                        class="absolute -top-2 -right-3 bg-emerald-600 text-white text-center text-xs rounded-full w-5 h-5 pt-0.5">
                        {{ auth()->user()->carts->count() }}
                    </span>
                @endif

            </div>

            <div class="relative">
                <x-nav-link info="Wishlist" href="/wishlist">
                    @if (request()->is('wishlist'))
                        <x-heroicon-s-heart class="text-emerald-900 hover:text-emerald-400 w-8 h-8 " />
                    @else <x-heroicon-o-heart class="text-emerald-700 hover:text-emerald-400 w-8 h-8 " />
                    @endif
                </x-nav-link>

                @if(auth()->user()->wishlists->count())
                    <span
                        class="absolute -top-2 -right-2 bg-pink-600 text-white text-center text-xs rounded-full w-5 h-5 pt-0.5">
                        {{ auth()->user()->wishlists->count() }}
                    </span>
                @endif
            </div>
        @endauth
        <x-dropdown :options="[
        ['label' => 'All Blog', 'url' => 'blogs', 'solidIcon' => 'heroicon-s-rectangle-stack', 'outlinedIcon' => 'heroicon-o-rectangle-stack'],
        ['label' => 'Create new ', 'url' => 'blogs/create', 'solidIcon' => 'heroicon-s-pencil-square', 'outlinedIcon' => 'heroicon-o-pencil-square', 'can' => 'create-blog'],
        ['label' => 'Favorites', 'url' => 'favorite-blogs', 'solidIcon' => 'heroicon-s-sparkles', 'outlinedIcon' => 'heroicon-o-sparkles'],
        ['label' => 'Authors', 'url' => 'authors', 'solidIcon' => 'heroicon-s-user-group', 'outlinedIcon' => 'heroicon-o-user-group'],
    ]">
            @if (request()->is('blogs'))
                <x-heroicon-s-queue-list class="text-emerald-900 hover:text-emerald-400 w-8 h-8 " />
            @else <x-heroicon-o-queue-list class="text-emerald-700 hover:text-emerald-400 w-8 h-8 " />
            @endif
            <p class="text-xs text-emerald-700 font-light group-hover:text-emerald-400">
                Blogs
            </p>
        </x-dropdown>
    </ul>

    <ul class="flex space-x-4">
        @auth
            <x-dropdown :logout="true" :options="[
                ['label' => 'Profile', 'url' => 'profile', 'solidIcon' => 'heroicon-s-user', 'outlinedIcon' => 'heroicon-o-user'],
                ['label' => 'Dashboard', 'url' => 'dashboard', 'solidIcon' => 'heroicon-s-chart-bar', 'outlinedIcon' => 'heroicon-o-chart-bar', 'can' => 'access-dashboard'],
            ]">
                <x-avatar :user="auth()->user()" :small="true" />

                <p class="text-xs text-emerald-700 font-light group-hover:text-emerald-400">
                    {{ auth()->user()->name }}
                </p>
            </x-dropdown>

        @endauth
        @guest
            <x-nav-link href="/login" info="Login">
                <x-heroicon-o-arrow-right-on-rectangle class="text-emerald-700 hover:text-emerald-400 w-8 h-8 " />
            </x-nav-link>
            <x-nav-link href="/register" info="Register">
                <x-heroicon-o-user-plus class="text-emerald-700 hover:text-emerald-400 w-8 h-8 " />
            </x-nav-link>
        @endguest

    </ul>
</nav>