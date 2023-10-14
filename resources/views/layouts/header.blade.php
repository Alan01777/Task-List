<header>
    <nav class="bg-blue-500 p-3 w-full">
        <div class="mx-auto flex items-center justify-between">
            <a class="text-white text-2xl font-semibold w-full pr-4" href="{{ route('user.login') }}">
                Task List
            </a>
            <button class="lg:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            <div class="hidden lg:flex lg:items-center">
                <ul class="lg:flex lg:space-x-6">
                    @auth
                        <li class="lg:inline-block">
                            <a class="text-white hover:text-blue-200"
                                href="{{ route('user.show', ['user' => $user->id]) }}">
                                Profile
                            </a>
                        </li>

                        <li class="lg:inline-block">
                            <a class="text-white hover:text-blue-200" href="{{ route('user.logout') }}">
                                Logout
                            </a>
                        </li>
                    @endauth
                </ul>
                <span class="text-white ml-6 overflow-hidden whitespace-nowrap max-w-20">
                    @auth
                        <span class="text-blue-200">{{ auth()->user()->name }}</span>
                    @endauth
                </span>
            </div>
        </div>
    </nav>
</header>
