<!--Main Sidebar Container-->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="#" class="brand-link">
       <img src="{{ url('public/uploads/images/Footer_logo.svg') }}" alt="sidebar-logo" class="sidebar-logo" >
   </a>
   <div class="sidebar">
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!----admin side bar--->
            @if(Auth::user()->user_type == 'Admin')
            <!-- <li class="nav-item">
               <a href="{{ url('admin/all-contacts') }}" class="nav-link {{ Request::is('admin/all-contacts') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li> -->
            <li class="nav-item has-treeview {{ Request::is('admin/add-new-category') || Request::is('admin/all-categories-list') || Request::is('admin/edit-category/*') ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ Request::is('admin/add-new-category') || Request::is('admin/all-categories-list') || Request::is('admin/edit-category/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th-list"></i>
                  <p>  
                     Category
                     <i class="right fas fa-angle-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ url('admin/add-new-category') }}" class="nav-link {{ Request::is('admin/add-new-category') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Category</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ url('admin/all-categories-list') }}" class="nav-link {{ Request::is('admin/all-categories-list') || Request::is('admin/edit-category/*') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Categories</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview {{ Request::is('admin/add-new-article') || Request::is('admin/all-articles-list')  || Request::is('admin/edit-article/*') ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ Request::is('admin/add-new-article') || Request::is('admin/all-articles-list') || Request::is('admin/edit-article/*') ? 'active' : '' }}">
               <i class="nav-icon fas fa-file-alt"></i>   
                  <p>
                  Articles
                     <i class="right fas fa-angle-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ url('admin/add-new-article') }}" class="nav-link {{ Request::is('admin/add-new-article') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Article</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ url('admin/all-articles-list') }}" class="nav-link {{ Request::is('admin/all-articles-list') || Request::is('admin/edit-article/*') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Articles</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/all-contacts') || Request::is('admin/edit-contact/*') ? 'menu-open' : '' }}">
               <a href="{{ url('admin/all-contacts') }}" class="nav-link {{ Request::is('admin/all-contacts') || Request::is('admin/edit-contact/*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-envelope"></i>
                  <p>
                     Contacts
                  </p>
               </a>
            </li>
            @endif
            <!----Customer side bar--->
            @if(Auth::user()->user_type == 'Customer')
            <!-- <li class="nav-item">
               <a href="{{ url('customer/dashboard') }}" class="nav-link {{ Request::is('customer/dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
               </li> -->
            <li class="nav-item has-treeview {{ Request::is('customer/add-new-order') || Request::is('customer/all-orders') ? 'menu-open' : '' }}">
               <a href="#" class="nav-link {{ Request::is('customer/add-new-order') || Request::is('customer/all-orders') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>
                     Orders
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ url('customer/add-new-order') }}" class="nav-link {{ Request::is('customer/add-new-order') ? 'active' : '' }}">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>
                           Add Order
                        </p>
                     </a>
                  </li>
                  <!--<li class="nav-item">
                     <a href="{{ url('customer/all-orders') }}" class="nav-link {{ Request::is('customer/all-orders') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Orders</p>
                     </a>
                     </li>-->
               </ul>
            </li>
            <li class="nav-item">
               <a href="{{ url('customer/repeat-orders') }}" class="nav-link {{ Request::is('customer/repeat-orders') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-recycle"></i>
                  <p>
                     Repeat Orders
                  </p>
               </a>
            </li>
            @endif
            <!--Logout link-->
            <li class="nav-item">
               <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                     Logout
                  </p>
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
            </li>
         </ul>
      </nav>
   </div>
</aside>