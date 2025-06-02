<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <div class="d-flex align-items-center">
               
                <div>
   <img src="{{ asset('/images/logo/smar.png') }}" alt="Logo" class="img-fluid" style="max-height: 60px;">
</div>
             
            </div>

            <div class="d-flex align-items-center">
                <ul class="user_profile_dd list-unstyled mb-0 ms-3">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @php $user = Auth::user(); @endphp
                            <img src="{{ $user->foto && file_exists(public_path('storage/foto/' . $user->foto)) 
    ? asset('storage/foto/' . $user->foto) . '?v=' . filemtime(public_path('storage/foto/' . $user->foto))
    : asset('images/layout_img/defaultl.jpg') }}"
    alt="Profile Photo" class="rounded-circle img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
                            <span class="ms-2">{{ Auth::user()->username ?? 'Guest' }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profil.index') }}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</div>
