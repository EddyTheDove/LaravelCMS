<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="brand">
            <a  href="/admin">
                LaravelCMS
            </a>
        </li>

        <li class="{{ Request::is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin') }}">
                <i class="flaticon-desktop"></i>
                Dashboard
            </a>
        </li>

        <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
            <a href="{{ route('pages.index' )}}">
                <i class="flaticon-page"></i>
                Pages
            </a>
        </li>

        <li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
            <a href="{{ route('posts.index') }}">
                <i class="flaticon-posts"></i>
                Posts
            </a>
        </li>

        <li class="{{ Request::is('admin/comments*') ? 'active' : '' }}">
            <a href="/admin/comments">
                <i class="flaticon-chat"></i>
                Comments
            </a>
        </li>

        <li class="{{ Request::is('admin/menus*') ? 'active' : '' }}">
            <a href="/admin/menus">
                <i class="flaticon-menu"></i>
                Menus
            </a>
        </li>

        {{-- Users & Roles  --}}
        <li class="dropdown {{ Request::is('admin/users*') ? 'active open' : '' }}">
            <a href="" data-toggle="dropdown">
                <i class="flaticon-users"></i>
                Users
            </a>

            <ul class="sidebar-dropdown">
                <li>
                    <a href="/admin/users">
                        All Users
                    </a>
                </li>
                <li>
                    <a href="/admin/roles">
                        Roles
                    </a>
                </li>
            </ul>
        </li>


        <li class="{{ Request::is('admin/files*') ? 'active' : '' }}">
            <a href="/admin/files">
                <i class="flaticon-clip"></i>
                Files
            </a>
        </li>

        <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
            <a href="/admin/settings">
                <i class="flaticon-settings"></i>
                Settings
            </a>
        </li>

        <li class="separer"></li>

        <li>
            <a href="/" target="_blank">
                <i class="flaticon-home"></i>
                Main Website
            </a>
        </li>

        <li>
            <a href="{{ route('admin.logout') }}">
                <i class="flaticon-power"></i>
                Sign Out
            </a>
        </li>
    </ul>
</div>
