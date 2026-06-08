@props(['options' => [], 'logout' => false])
<details class="relative group">
    <summary class="list-none cursor-pointer flex flex-col items-center">
        {{ $slot }}
    </summary>
    <div
        class="absolute right-0 mt-5 w-48 bg-white border-4 border-t-0 border-emerald-500 rounded-b-lg shadow-xl p-2 z-10">
        {{-- @foreach ($options as $option)
        @if(($option['can-create'] ?? false))
        @can('create-product', Product::class)
        <div class="p-2 flex items-start">
            <x-nav-link :dropdown="$option['label']" :href="'/' . $option['url']" extraClass="hover:text-emerald-400">
                @if (!empty($option['solidIcon']) && !empty($option['outlinedIcon']))
                @if (request()->is($option['url']))
                <x-dynamic-component class="text-emerald-900 hover:text-emerald-400 w-5 h-5 "
                    :component="$option['solidIcon']" />
                @else
                <x-dynamic-component class="text-emerald-700 hover:text-emerald-400 w-5 h-5 "
                    :component="$option['outlinedIcon']" />
                @endif
                @endif
            </x-nav-link>
        </div>
        @endauth
        @else
        <div class="p-2 flex items-start">
            <x-nav-link :dropdown="$option['label']" :href="'/' . $option['url']" extraClass="hover:text-emerald-400">
                @if (!empty($option['solidIcon']) && !empty($option['outlinedIcon']))
                @if (request()->is($option['url']))
                <x-dynamic-component class="text-emerald-900 hover:text-emerald-400 w-5 h-5 "
                    :component="$option['solidIcon']" />
                @else
                <x-dynamic-component class="text-emerald-700 hover:text-emerald-400 w-5 h-5 "
                    :component="$option['outlinedIcon']" />
                @endif
                @endif
            </x-nav-link>
        </div>
        @endif
        @endforeach --}}
        @foreach ($options as $option)

            @if(isset($option['can']))

                @can($option['can'])
                    <div class="p-2 flex items-start">
                        <x-nav-link :dropdown="$option['label']" :href="'/' . $option['url']" extraClass="hover:text-emerald-400">

                            @if (!empty($option['solidIcon']) && !empty($option['outlinedIcon']))
                                @if (request()->is($option['url']))
                                    <x-dynamic-component class="text-emerald-900 w-5 h-5" :component="$option['solidIcon']" />
                                @else
                                    <x-dynamic-component class="text-emerald-700 w-5 h-5" :component="$option['outlinedIcon']" />
                                @endif
                            @endif

                        </x-nav-link>
                    </div>
                @endcan

            @else

                <div class="p-2 flex items-start">
                    <x-nav-link :dropdown="$option['label']" :href="'/' . $option['url']" extraClass="hover:text-emerald-400">

                        @if (!empty($option['solidIcon']) && !empty($option['outlinedIcon']))
                            @if (request()->is($option['url']))
                                <x-dynamic-component class="text-emerald-900 w-5 h-5" :component="$option['solidIcon']" />
                            @else
                                <x-dynamic-component class="text-emerald-700 w-5 h-5" :component="$option['outlinedIcon']" />
                            @endif
                        @endif

                    </x-nav-link>
                </div>

            @endif

        @endforeach

        @if ($logout)
            <x-line :black="true" />

            <button type="submit" form="logout-form" class="p-2 hover:text-emerald-400 flex items-center gap-2 ">
                <x-heroicon-o-arrow-left-start-on-rectangle class="text-emerald-900 hover:text-emerald-400 w-5 h-5 " />
                <p class="text-lg text-center capitalize hover:text-emerald-400"> Log Out</p>
            </button>

        @endif
    </div>
    @if ($logout)
        <x-form id="logout-form" hidden action="/logout"
            onsubmit="return confirm('Are you sure you want to Log out now??')">
        </x-form>

    @endif
    </div>
</details>