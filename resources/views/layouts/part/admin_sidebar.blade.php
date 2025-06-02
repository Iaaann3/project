<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header text-center mt-3">
            <h4 class="text-white">Admin Panel</h4>
        </div>
        <div class="sidebar_user_info text-center mb-3">
            @php $user = Auth::user(); @endphp
            <img src="{{ $user->foto && file_exists(public_path('storage/foto/' . $user->foto)) 
                        ? asset('storage/foto/' . $user->foto) . '?v=' . filemtime(public_path('storage/foto/' . $user->foto)) 
                        : asset('images/layout_img/defaultl.jpg') }}"
                alt="Profile Photo"
                class="rounded-circle img-fluid mb-2"
                style="width: 100px; height: 100px; object-fit: cover;">
            <div class="user_info text-white">
                <h6>{{ $user->username ?? 'Guest' }}</h6>
                <p><span class="online_animation"></span> Online</p>
            </div>
        </div>
    </div>

    <div class="sidebar_blog_2">
        <h4 class="text-white px-3">Menu</h4>
        <ul class="list-unstyled components">
            <li class="active">
            <a href="{{ route('profil.index') }}" aria-expanded="false" >
               <i class="fa-solid fa-circle-user "></i> <span>Profile</span>
            </a>
         </li>
        </ul>
    </div>
</nav>
