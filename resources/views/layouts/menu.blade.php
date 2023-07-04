<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item @if(Request::segment('1') === 'dashboard') active @endif">
        <a href="{{ url('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <li class="menu-item @if(Request::segment('2') === 'daftar-pemesan') active @endif">
        <a href="{{ url('page/daftar-pemesan') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-list-ul"></i>
            <div data-i18n="Analytics">Daftar Pemesan</div>
        </a>
    </li>

    <li class="menu-item @if(Request::segment('2') === 'kelola-konser') active @endif">
        <a href="{{ url('page/kelola-konser') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-list-ul"></i>
            <div data-i18n="Analytics">Kelola Konser</div>
        </a>
    </li>


</ul>
