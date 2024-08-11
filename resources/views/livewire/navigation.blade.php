<div x-data="{ open: false }">
    <header class="bg-gray-900">
        <x-container class="px-4 py-4">
            <div class="flex items-center justify-between space-x-8">

                <div class="flex items-center space-x-4">
                    {{-- casa --}}
                    <a href="/">
                        <button class="text-white text-xl md:text-3xl">
                            <i class="fa-solid fa-house text-white"></i>
                        </button>
                    </a>
                    {{-- menu --}}
                    <button class="text-white text-xl md:text-3xl" x-on:click="open = true">
                        <i class="fas fa-bars text-white"></i>
                    </button>
                </div>

                <h1 class="text-white">
                    <a href="/shop" class="inline-flex flex-col items-end">

                        <span class="text-xl md:text-3xl leading-3 md:leading-6 font-semibold">
                            Shop
                        </span>
                        <span class="text-xs">
                            Online
                        </span>
                    </a>
                </h1>
                <div class="flex-1 hidden md:block">
                    <x-input oninput="search(this.value)" type="text" placeholder="Search" class="w-full" />
                </div>

                <div class="flex items-center space-x-4 md:space-x-8">
                    {{-- user --}}
                    <x-dropdown>
                        <x-slot name="trigger">
                            @auth

                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="text-white text-xl md:text-3xl">
                                    <i class="fas fa-user text-white"></i>
                                </button>

                            @endauth


                        </x-slot>
                        <x-slot name="content">

                            @guest
                                <div class="px-4 py-2">
                                    <div class="flex justify-center">
                                        <a href="{{ route('login') }}" class="btn btn-gray">
                                            Login
                                        </a>
                                    </div>
                                    <p class="text-center text-sm mt-2">
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline ">
                                            Register
                                        </a>
                                    </p>
                                </div>
                            @else
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <div class="border-t border-gray-200">
                                </div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @endguest

                        </x-slot>
                    </x-dropdown>

                    {{-- shopping cart --}}
                    <a href="{{ route('cart.index') }}" class="relative">
                        <i class="fas fa-shopping-cart text-white text-xl md:text-3xl"></i>
                        <span id="cart-count"
                            class="absolute -top-2 -end-4 inline-flex items-center justify-center text-xs font-bold text-white bg-red-600 rounded-full w-6 h-6">
                            {{ Cart::instance('shopping')->count() }}
                        </span>
                    </a>
                </div>

            </div>

            <div class="mt-4 md:hidden">
                <x-input oninput="search(this.value)" type="text" placeholder="Search" class="w-full" />
            </div>

        </x-container>
    </header>

    <div x-show="open" x-on:click="open = false" style="display:none"
        class="fixed top-0 left-0 inset-0 bg-black bg-opacity-25 z-10">

    </div>

    <div x-show="open" style="display:none" class="fixed top-0 left-0  z-20">

        {{-- lateral main --}}
        <div class="flex">
            <div class="w-screen md:w-80 h-screen bg-white">
                <div class="px-4 py-3 bg-gray-700 text-white font-semibold">
                    <div class="flex items-center justify-between">
                        <span class="text-lg">
                            ¡Bienvenidos!
                        </span>
                        <button x-on:click="open = false">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="h-[calc(100vh-52px)] overflow-auto">
                    <ul>
                        @foreach ($families as $family)
                            <li wire:mouseover="set('family_id',{{ $family->id }})">
                                <a href="{{ route('families.show', $family) }}"
                                    class="flex items-center justify-between px-4 py-3 text-gray-900 hover:bg-gray-800 hover:text-white">
                                    {{ $family->name }}
                                    <i class="fa-solid fa-angle-right text-gray-900 hover:text-white"></i>
                                </a>

                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="w-80 xl:w-[57rem] pt-[52px] hidden md:block">
                <div class=" bg-white h-[calc(100vh-52px)] overflow-auto px-6 py-8">

                    <div class="flex  mb-8 justify-between items-center">
                        <p class="border-b-[2px] border-lime-500 uppercase text-xl font-semibold pb-1">
                            {{ $this->familyName }}
                        </p>
                        <a href="{{ route('families.show', $family) }}" class="btn btn-gray">
                            +
                        </a>
                    </div>

                    <ul class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                        @foreach ($this->categories as $category)
                            <li>
                                <a href="{{ route('categories.show', $category) }}"
                                    class="flex items-center justify-between px-4 py-3 text-white bg-gray-800 ">
                                    {{ $category->name }}

                                </a>
                                <ul class="mt-4 space-y-2">
                                    @foreach ($category->subcategories as $subcategory)
                                        <li>
                                            <a href="{{ route('subcategories.show', $subcategory) }}"
                                                class="text-sm text-black flex items-center justify-between px-4 py-3 hover:bg-gray-200">
                                                {{ $subcategory->name }}

                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

    </div>


    @push('js')
        <script>
            Livewire.on('cartUpdated', (count) => {
                document.getElementById('cart-count').innerText = count
            })

            function search(value) {
                //alert(value);
                Livewire.dispatch('search', {
                    search: value
                })
            }
        </script>
        
    @endpush


</div>
