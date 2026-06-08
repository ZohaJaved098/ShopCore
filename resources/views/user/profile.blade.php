<x-layouts.mainLayout>
    <div class="h-full min-h-screen">

        <!-- HEADER -->
        <div class="w-full bg-emerald-500 h-fit p-20 text-white space-x-auto">
            <div class="w-full lg:w-1/2 flex flex-col lg:flex-row gap-5 m-auto">
                <div class="relative cursor-pointer ">
                    <x-avatar :user="$user " />
                    <x-btn onclick="document.getElementById('profile_pic').click()" title="Edit" type="button"
                        class=" absolute top-0 bg-transparent text-transparent hover:backdrop-blur-lg hover:bg-black/2 w-32 h-32 rounded-full text-center font-semibold hover:text-white cursor-pointer flex items-center justify-center">
                        <x-heroicon-o-pencil class="w-5 h-5 " />
                    </x-btn>
                    <form id="edit-profile_pic" hidden action="/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input hidden type="file" name="profile_pic" id="profile_pic" onchange="this.form.submit()" />
                    </form>
                    <x-error-msg field="profile_pic" />

                </div>

                <div class="space-y-2 w-full lg:w-1/2">
                    <div class="flex items-end gap-5">
                        <h3 class="text-3xl font-bold">
                            {{ $user->name }}
                        </h3>

                        <p class="py-2 px-4 capitalize bg-emerald-800/50 text-xs rounded-md">
                            @foreach($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </p>
                    </div>
                    <div class="flex items-center gap-5">
                        <x-heroicon-s-envelope class="w-5 h-5 text-white" />
                        <p>{{ $user->email }}</p>
                    </div>
                    <x-line />
                    <div x-data="{ editing: false, bio: @js($user->bio) }" class="w-full">
                        <div x-show="!editing" class="flex items-start justify-between gap-5">

                            <p class="text-lg">
                                <span x-text="bio ?? 'No bio yet...'"></span>
                            </p>

                            <x-btn type="button" @click="editing = true">
                                <x-heroicon-o-pencil class="w-5 h-5" />
                            </x-btn>

                        </div>


                        <form x-show="editing" x-cloak action="/profile" id="edit-bio" method="POST"
                            class="w-full gap-3 flex flex-col">
                            @csrf
                            @method('PATCH')
                            <textarea name="bio" x-model="bio" class="w-full text-lg border p-2 rounded-md outline-none"
                                rows="3"></textarea>
                            <div class="flex gap-2">
                                <x-btn type="button" form="edit-bio">
                                    <x-heroicon-o-check class="w-5 h-5" />
                                </x-btn>
                                <x-btn :del="true" type="button" @click="editing = false">
                                    <x-heroicon-c-x-mark class="w-5 h-6" />
                                </x-btn>
                            </div>
                        </form>

                    </div>

                    <x-btn type="button" title="Delete your Account" :del="true"
                        onclick="if(confirm('Are you sure you want to delete your account?')) document.getElementById('delete-user').submit();">
                        <x-heroicon-o-trash class="w-5 h-5" />
                    </x-btn>
                    <form id="delete-user" action="/user" method="POST">
                        @csrf
                        @method('DELETE')

                    </form>

                </div>
            </div>
        </div>
        <div class="w-4/5 m-auto my-5 space-x-10 flex items-start">
            <div class="border border-black/20 shadow-lg w-full h-fit p-5 rounded-lg">
                <div class="flex flex-col md:flex-row-reverse mb-5 gap-5">
                    <div class="md:ml-auto flex justify-between md:justify-normal md:flex-col gap-5">
                        @can('access-dashboard')
                            <x-btn href="/dashboard" type="a">
                                @foreach($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach Dashboard
                            </x-btn>
                        @endcan

                        <x-btn href="/orders" type="a">
                            Order History
                        </x-btn>

                    </div>
                    <div class="flex flex-col gap-10">

                        <div class=" grid grid-cols-1 md:grid-cols-4 gap-5">
                            <x-profile-stat title="Cart Items" :count="$user->carts->count()" />
                            <x-profile-stat title="Wishlist" :count="$user->wishlists->count()" />
                            <x-profile-stat title="Orders" :count="$user->orders->count()" />
                            <x-profile-stat title="Favorite Blogs" :count="$user->favoriteBlogs->count()" />
                        </div>
                        <div class=" grid grid-cols-1 md:grid-cols-3 gap-6">

                            {{-- BLOGS --}}
                            <div class="p-5 border-2 border-emerald-700 rounded-xl shadow-sm">
                                <h3 class="font-bold text-lg mb-3 text-emerald-700">My Blogs</h3>

                                @forelse($user->blogs as $blog)
                                    <a href="/blogs/{{ $blog->id }}" class="block ml-5 capitalize hover:text-emerald-600">
                                        <li>
                                            {{ $blog->title }}
                                        </li>
                                    </a>
                                @empty
                                    <p class="text-gray-500">No blogs yet.</p>
                                @endforelse
                            </div>

                            {{-- ACTIVITY --}}
                            <div class="p-5 border-2 border-emerald-700 rounded-xl shadow-sm">
                                <h3 class="font-bold text-lg text-emerald-700 mb-3">Activity</h3>
                                <p class="text-sm ">
                                    You have <span class="font-bold text-emerald-700">
                                        {{ $user->carts->count() }}
                                    </span>
                                    items in cart.
                                </p>
                                <p class="text-sm ">
                                    You have <span
                                        class="font-bold text-emerald-700">{{ $user->orders->count() }}</span>
                                    orders.
                                </p>


                            </div>

                        </div>

                    </div>


                </div>
                <x-line :black="true" />
                @can('create-blog')
                    <div class="flex flex-col gap-5 w-full">
                        <div class="flex items-center justify-between gap-10 my-5">

                            <x-title>My Blogs</x-title>
                            <x-btn type="a" href="blogs/create" extraClass="ml-auto max-h-10 ">
                                Create new
                            </x-btn>
                        </div>
                        <div class=" grid grid-cols-1 md:grid-cols-4 gap-5">
                            <x-profile-stat title="Blogs" :count="$user->blogs->count()" />

                            <x-profile-stat title="Total Likes" :count="$user->blogs->sum(fn($blog) => $blog->favoritedBy->count())" />
                            <x-profile-stat title="Top Blog Likes" :count="$user->blogs->max(fn($blog) => $blog->favoritedBy->count()) ?? 0" />

                        </div>


                    </div>
                    @if (
                            $user->blogs->count()
                        )
                        <div class="mt-10">

                            <x-title>Blog Insights</x-title>

                            <div class="mt-5 flex flex-col gap-3">

                                @foreach($user->blogs as $blog)

                                    <a href="blogs/{{ $blog->id }}"
                                        class="flex justify-between items-center p-3 border border-emerald-400 shadow hover:shadow-2xl group hover:border-2 cursor-pointer rounded-lg">

                                        <p
                                            class="font-semibold capitalize text-emerald-600 group-hover:text-emerald-700 group-hover:font-bold">
                                            {{ $blog->title }}
                                        </p>

                                        <div class="flex items-center gap-3 text-sm text-emerald-700">

                                            <span>
                                                {{ $blog->favoritedBy->count() }}
                                            </span>
                                            <x-heroicon-s-heart class="w-5 h-5 text-pink-600" />
                                        </div>
                                    </a>

                                @endforeach

                            </div>
                        </div>

                    @endif
                @endcan

            </div>

        </div>
    </div>
</x-layouts.mainLayout>