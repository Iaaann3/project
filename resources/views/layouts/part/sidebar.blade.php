<nav id="sidebar">
   <div class="sidebar_blog_1">
   <div class="sidebar-header">
   
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">  
               @php $user = Auth::user(); @endphp
                           <img src="{{ $user->foto && file_exists(public_path('storage/foto/' . $user->foto)) 
                           ? asset('storage/foto/' . $user->foto) . '?v=' . filemtime(public_path('storage/foto/' . $user->foto))
                           : asset('images/layout_img/defaultl.jpg') }}"
                           alt="Profile Photo" class="rounded-circle img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="user_info">
               <h6>{{ Auth::user()->username ?? 'Guest' }}</h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
   </div>

   <div class="sidebar_blog_2">
      <h4>General</h4>
      <ul class="list-unstyled components">
         <li class="active">
            <a href="{{ route('home') }}" aria-expanded="false" >
               <i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span>
            </a>
         </li>
         <li><a href="#"><i class="fa fa-clock-o orange_color"></i> <span>Widgets</span></a></li>
         <li>
            <a href="{{ route('dana.index') }}"><i class="fa-solid fa-wallet orange_color"></i> Dompet</a>
         </li>
         <li>
         <a href="{{ route('pemasukan.index') }}" ><i class="fa-solid fa-sack-dollar" style="color: gold;"></i> Pemasukan</a>
         </li>
         <li>
         <a href="{{ route('pengeluaran.index') }}" ><i class="fa-solid fa-sack-dollar" style="color: red;"></i> Pengeluaran</a>
         </li>
      </ul>
   </div>
</nav>
