<nav class="nav">
    <!-- Logo/Brand -->
    <a href="/" class="nav-brand">Evenementen App</a>
    
    <!-- Navigation Links -->
    <ul class="nav-menu">
        <li>
            <a href="/" 
               class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('evenementen.index') }}" 
               class="nav-link {{ request()->routeIs('evenementen.*') ? 'active' : '' }}">
                Evenementen
            </a>
        </li>
        <li>
            <a href="/about" 
               class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                Over ons
            </a>
        </li>
    </ul>
</nav>

