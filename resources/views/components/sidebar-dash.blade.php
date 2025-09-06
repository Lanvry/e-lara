<!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <img class="logo" src="{{asset('image/e-lara.png')}}" alt="">
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="{{route('dashboard')}}" class="sidebar-menu-link active">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{route('courses.index')}}" class="sidebar-menu-link">
                        <i class="fas fa-book"></i>
                        <span>Kursus</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <i class="fas fa-certificate"></i>
                        <span>Sertifikat</span>
                    </a>
                </li>
                @if(Auth::user()->role == "Admin")
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <i class="fas fa-person"></i>
                        <span>Management User</span>
                    </a>
                </li>
                @endif
                
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <i class="fas fa-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar">{{collect(explode(' ', Auth::user()->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');}}</div>
                    <div class="user-details">
                        <div class="user-name">{{Auth::user()->name}}</div>
                        <div class="user-role">{{Auth::user()->role}}</div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                 @csrf
                <button class="logout-btn" type="submit">
                    <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </aside>