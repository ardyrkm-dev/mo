<section
    class="h-full w-full border-box transition-all duration-500 linear lg:px-16 md:px-20 px-8 py-8 color-primary">
    <div class="navbar-1-1" style="font-family: 'Poppins', sans-serif">
        <div class=" mx-auto flex flex-wrap flex-row items-center justify-between">

            <a href="#" class="flex text-3xl font-bold items-center">
                SERV
            </a>

            <label for="menu-toggle" class="cursor-pointer lg:hidden block">
                <svg class="w-6 h-6" fill="none" stroke="#092A33" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </label>

            <input class="hidden" type="checkbox" id="menu-toggle" />

            <div class="hidden lg:flex lg:items-center lg:w-auto w-full lg:ml-auto lg:mr-auto flex-wrap items-center text-base justify-center"
                id="menu">
                <nav
                    class="lg:space-x-12 space-x-0 lg:flex items-center justify-between text-base pt-8 lg:pt-0 lg:space-y-0 space-y-6">
                    <a href="#" class="block txt-primary">Home</a>
                    <a href="{{route('aktifitasPage')}}" class="block txt-primary">Aktifitas</a>
                    

                    {{-- <form action="{#" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Rekomendasi</button>
                    </form> --}}
                    <a href="#" class="block nav-link text-white"></a>
                </nav>
               
            </div>
            @guest

            <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
               
               <a href="{{route('login')}}"> <button
                   
                    class="txtBaru items-center border-0 block lg:inline-block lg:py-3 lg:px-10 focus:outline-none rounded-2xl font-medium text-base mt-6 lg:mt-0">
                    Log In
                </button></a>
                <a href="{{route('signUp')}}">
                <button
                    
                    class=" bg-sekunder btn-new1  color-sekunder  items-center border-0 block lg:inline-block  lg:py-3 lg:px-10 focus:outline-none rounded-2xl font-medium text-base mt-6 lg:mt-0">
                    <h1>Register</h1>
                </button>
                </a>
            </div>
        @endguest

        @auth
            <div @click.away="open = false" class="hidden lg:block relative" x-data="{ open: false }">

                <button @click="open = !open" class="flex flex-row items-center  px-4 py-2 mt-2 text-left cdBaru rounded-lg   md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

                    Halo, {{ Auth::user()->name; }}

                    {{-- validation photo --}}
{{--                     
                        <svg class="inline ml-3 h-12 w-12 rounded-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg> --}}
                   

                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 index w-full mt-2 origin-top-right rounded-md shadow-lg  md:w-48">

                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                        <a class="block px-4 py-2 mt-2 text-sm bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/dashboard">Dashboard</a>

                        <a class="block px-4 py-2 mt-2 text-sm bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                            <form id="logout-form" id="logout-form" action="{{ route('signout')}}" method="POST" style="display: none;">
                            
                        
                                @csrf
                            </form>

                        </a>
                    </div>
                </div>

            </div>
        @endauth

                </nav>
            </div>

            

        </div>
    </div>
</section>
