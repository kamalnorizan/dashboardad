<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                         </span> <span class="text-muted text-xs block">{{Auth::user()->jawatan->name}} <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{-- <i class="fa fa-sign-out"></i> --}}
                            Log out
                        </a>
                        {{-- <form action="{{route('logout')}}" id="logout-form" method="post"> @csrf </form> --}}
                    </li>
                    </ul>
                </div>
                <div class="logo-element">
                    DAD
                </div>
            </li>
            <li>
                <a href="/home"><i class="fa fa-home"></i> <span class="nav-label">Utama</span></a>
            </li>
            @can('show user')
            <li>
                <a href="/user"><i class="fa fa-building"></i> <span class="nav-label">Pentadbir Sistem</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/organisasi">Organisasi</a></li>
                    <li><a href="/jawatan">Jawatan</a></li>
                    <li><a href="/user">Pengguna</a></li>
                    <li><a href="/permission"></i>Peranan</a></li>
                    <li><a href="/kategori"></i>Kategori Audit</a></li>
                </ul>
            </li>
            @endcan
            <li>
                <a href="/laporan"><i class="fa fa-folder-open"></i> <span class="nav-label">Laporan Audit</span><span class="fa arrow"></a>
                <ul class="nav nav-second-level">
                    <li><a href="/laporan">Laporan Penemuan</a></li>
                </ul>
            </li>
            <li>
                <a href="/kcad"><i class="fa fa-user"></i> <span class="nav-label">Ketua Audit</span><span class="fa arrow"></a>
                <ul class="nav nav-second-level">
                    <li><a href="/kcad">Semakan Ketua Audit</a></li>
                </ul>
            </li>
            <li>
                <a href="/maklumbalas"><i class="fa fa-laptop"></i> <span class="nav-label">Penemuan Auditee</span><span class="fa arrow"></a>
                <ul class="nav nav-second-level">
                    <li><a href="/maklumbalas">Maklumbalas Auditee</a></li>
                </ul>
            </li>
            <li>
                <a href="/jawatankuasa"><i class="fa fa-group"></i> <span class="nav-label">Jawatankuasa Audit</span><span class="fa arrow"></a>
                <ul class="nav nav-second-level">
                    <li><a href="/jawatankuasa">Semakan Jawatankuasa</a></li>
                </ul>
            </li>
            <li>
                <a href="/statistik"><i class="fa fa-pie-chart"></i> <span class="nav-label">Statistik </span><span class="fa arrow"></a>
                <ul class="nav nav-second-level">
                    <li><a href="/statistik">Kategori Audit</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
