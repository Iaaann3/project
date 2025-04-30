<nav id="sidebar">
   <div class="sidebar_blog_1">
   <div class="sidebar-header">
   
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">
            <div class="user_img">
               <img class="img-responsive" src="{{ asset('/images/layout_img/user_img.jpg') }}" alt="#" />
            </div>
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
            <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
               <i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span>
            </a>
            <ul class="collapse list-unstyled" id="dashboard">
               <li><a href="#">> <span>Default Dashboard</span></a></li>
               <li><a href="#">> <span>Dashboard style 2</span></a></li>
            </ul>
            
         </li>
         <li><a href="#"><i class="fa fa-clock-o orange_color"></i> <span>Widgets</span></a></li>
         <li>
            <a href="{{ route('dana.index') }}"><i class="fa-solid fa-wallet orange_color"></i> Dana</a>
         </li>
         <li>
         <a href="{{ route('dana.index') }}" ><i class="fa-solid fa-sack-dollar" style="color: gold;"></i> Pemasukan</a>
         </li>
         <li>
         <a href="{{ route('dana.index') }}" ><i class="fa-solid fa-sack-dollar" style="color: red;"></i> Pengeluaran</a>
         </li>
         <li>
            <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
               <i class="fa fa-diamond purple_color"></i> <span>Elements</span>
            </a>
            <ul class="collapse list-unstyled" id="element">
               <li><a href="#">> <span>General Elements</span></a></li>
               <li><a href="#">> <span>Media Gallery</span></a></li>
            </ul>
         </li>
         <li><a href="#"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a></li>
         <li><a href="#"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
         <li><a href="#"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
      </ul>
   </div>
</nav>
