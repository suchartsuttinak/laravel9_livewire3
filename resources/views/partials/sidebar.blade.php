<nav class='mobile-navbar'>
    <button id='mobileMenuBtn' class='px-4 text-2xl'>
        <ion-icon class='mt-2' name="menu-outline"></ion-icon>
    </button>

    <div>
        <div class="relative inline-block" x-data='{open: false}'>
            <button @click='open = !open' :class="open ? 'bg-gray-100' : '' " x-transition class='px-2 text-xl transition duration-200 rounded hover:bg-gray-100'>
                <ion-icon class='mt-2' name="notifications-outline"></ion-icon>
            </button>
            <div x-show="open" @click.outside="open = false" class="text-center dropdown-content" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-y-0 transform" x-transition:enter-end="opacity-100 scale-y-100 transform" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">

                <div class='p-3 text-sm text-gray-500'>
                    <span class="text-theme-primary">2</span> Unread notification
                </div>

                <div class="items-center text-left card flex-card hover:bg-theme-secondary">
                    <span class="px-2 py-1 mr-3 border rounded-full border-theme-primary">
                        <ion-icon class='mt-1 text-theme-primary' name="dice-outline"></ion-icon>
                    </span>
                    <div>
                        <div class="card-header">its just an notificationt</div>
                        <small class="text-gray-500">5 Minutes ago</small>
                    </div>
                </div>

                <div class="items-center text-left card flex-card hover:bg-theme-secondary">
                    <span class="px-2 py-1 mr-3 border rounded-full border-theme-primary">
                        <ion-icon class='mt-1 text-theme-primary' name="dice-outline"></ion-icon>
                    </span>
                    <div>
                        <div class="card-header">This notification title is longer than expection</div>
                        <small class="text-gray-500">5 Minutes ago</small>
                    </div>
                </div>

                <div class="items-center text-left card flex-card hover:bg-theme-secondary">
                    <span class="px-2 py-1 mr-3 border border-gray-100 rounded-full">
                        <ion-icon class='mt-1' name="dice-outline"></ion-icon>
                    </span>
                    <div>
                        <div class="card-header">its just an notificationt</div>
                        <small class="text-gray-500">5 Minutes ago</small>
                    </div>
                </div>

            </div>
        </div>

        <div class="relative inline-block"  x-data='{open: false}'>
            <button @click='open = !open' :class="open ? 'bg-gray-100' : '' "  class='px-2 text-xl transition duration-200 rounded hover:bg-gray-100'>
                <ion-icon class='mt-2' name="person-outline"></ion-icon>
            </button>
            <div x-show="open" @click.outside="open = false" class="text-left dropdown-content" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-y-0 transform" x-transition:enter-end="opacity-100 scale-y-100 transform" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">

                <div class='p-3 text-sm text-gray-500 border-b border-gray-100'>
                    Signed in as
                    <span class='block text-theme-darked-primary'>{{ Auth::user()->name }}</span>
                </div>

                <a class='flex items-center w-full p-3 transition duration-200 hover:bg-theme-secondary'
                         wire: href="{{ route('welcome') }}">
                         <ion-icon class='mr-2' name="compass-outline"></ion-icon>
                         Visit site
                </a>

                {{--  <ion-icon class='mr-2' name="log-out-outline"></ion-icon>  --}}

                <a class='flex items-center w-full p-3 transition duration-200 hover:bg-theme-secondary'
                    href="{{ route('profile.show') }}">
                    <ion-icon class='mr-2' name="create-outline"></ion-icon>
                    Edit profile
                </a>

                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <a
                    class='flex items-center w-full p-3 text-lg text-red-500 transition duration-200 border-t border-gray-100 hover:bg-red-50'
                     href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                             <ion-icon class='mr-2' name="log-out-outline"></ion-icon>
                        {{ __('Log Out') }}
                </a>
                </form>

            </div>
        </div>
    </div>
</nav>

<aside class="left-0 hidden sidebar lg:block">
    <header>
        <h1>Pos System<span>.</span></h1>
    </header>
    <nav>
        <ul>
            <li class="badge">Menu</li>
            <li class="{{ request()->routeIs('dashboard') ? 'active' : ''}}">
                <a href="{{ route('dashboard') }}">
                    <ion-icon name="home"></ion-icon>
                   หน้าแรก
                </a>
                <li class="{{ request()->routeIs('user.index') ? 'active' : ''}}">
                    <a href="{{ route('user.index') }}">
                        <ion-icon name="person"></ion-icon>
                        ข้อมูลผู้ใช้งาน
                    </a>
                </li>
            </li>
        </ul>
    </nav>
</aside>
