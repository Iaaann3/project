<div class="topbar">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex justify-content-between align-items-center">

      
         <div class="d-flex align-items-center">
            <img src="{{ asset('/images/logo/smar.png') }}" alt="Logo" class="img-fluid" style="max-height: 60px;">
         </div>

         <div class="d-flex align-items-center">
            @php $user = Auth::user(); @endphp
            <ul class="navbar-nav ms-auto">
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="{{ $user->foto && file_exists(public_path('storage/foto/' . $user->foto)) 
                        ? asset('storage/foto/' . $user->foto) . '?v=' . filemtime(public_path('storage/foto/' . $user->foto)) 
                        : asset('images/layout_img/defaultl.jpg') }}" 
                        alt="Profile Photo" class="rounded-circle img-fluid" 
                        style="width: 40px; height: 40px; object-fit: cover;">
                     <span class="ms-2">{{ $user->username }}</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                     <li>
                        <a class="dropdown-item" href="{{ route('profil.index') }}">
                           <i class="fa fa-user me-2"></i>Profil
                        </a>
                     </li>
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
