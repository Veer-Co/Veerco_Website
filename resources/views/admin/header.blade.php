<!--start top header-->
<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
      <div class="mobile-toggle-icon fs-3">
          <i class="bi bi-list"></i>
        </div>

        <div class="top-navbar-right ms-auto">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item search-toggle-icon">
              <a class="nav-link" href="#">
                <div class="">
                  <i class="bi bi-search"></i>
                </div>
              </a>
          </li>
          <li class="nav-item dropdown dropdown-user-setting">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
              <div class="user-setting d-flex align-items-center">
                <img src="{{asset('admin_assets/images/avatars/avatar-1.png')}}" class="user-img" alt="">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                 <a class="dropdown-item" href="#">
                   <div class="d-flex align-items-center">
                      <img src="{{asset('admin_assets/images/avatars/avatar-1.png')}}" alt="" class="rounded-circle" width="54" height="54">
                      <div class="ms-3">
                        <h6 class="mb-0 dropdown-user-name">{{ Auth::guard('admin')->user()?Auth::guard('admin')->user()->name:"NA" }}</h6>
                        <small class="mb-0 dropdown-user-designation text-secondary">{{ Auth::guard('admin')->user()?Auth::guard('admin')->user()->email:"NA" }}</small>
                      </div>
                   </div>
                 </a>
               </li>
               <li><hr class="dropdown-divider"></li>
               <li>
                  <a class="dropdown-item" href="pages-user-profile.html">
                     <div class="d-flex align-items-center">
                       <div class=""><i class="bi bi-person-fill"></i></div>
                       <div class="ms-3"><span>Profile</span></div>
                     </div>
                   </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                       <div class=""><i class="bi bi-gear-fill"></i></div>
                       <div class="ms-3"><span>Setting</span></div>
                     </div>
                   </a>
                </li>
                <li>
                  <a class="dropdown-item" href="index2.html">
                     <div class="d-flex align-items-center">
                       <div class=""><i class="bi bi-speedometer"></i></div>
                       <div class="ms-3"><span>Dashboard</span></div>
                     </div>
                   </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                  <button class="dropdown-item" type="submit">
                     <div class="d-flex align-items-center">
                       <div class=""><i class="bi bi-lock-fill"></i></div>
                       <div class="ms-3"><span>Logout</span></div>
                     </div>
                   </button>
                  </form>
                </li>
            </ul>
          </li>

          </ul>
          </div>
    </nav>
  </header>
   <!--end top header-->

   <!--start sidebar -->
   <aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div>
        <img src="{{asset('admin_assets/images/veer_co.png')}}" class="logo-icon" alt="logo icon">
      </div>
      <div>
        <h4 class="logo-text">Veer & Co</h4>
      </div>
      <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
      </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <a href="{{url('admin/dashboard')}}">
          <div class="parent-icon"><i class="bi bi-house-fill"></i>
          </div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class="bx bx-grid-alt"></i>
            </div>
            <div class="menu-title">Category</div>
        </a>
        <ul>
            <li>
                <a href="{{url('admin/add-category')}}"><i class="bi bi-circle"></i>Add Category</a>
            </li>
            <li>
                <a href="{{url('admin/category-list')}}"><i class="bi bi-circle"></i>Category List</a>
            </li>
        </ul>
      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="bi bi-diagram-2"></i>
            </div>
            <div class="menu-title">SubCategory</div>
        </a>
        <ul>
            <li>
                <a href="{{url('admin/add-subcategory')}}"><i class="bi bi-circle"></i>Add SubCategory</a>
            </li>
            <li>
                <a href="{{url('admin/subcategory-list')}}"><i class="bi bi-circle"></i>SubCategory List</a>
            </li>
        </ul>
      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="bi bi-bookmark-check"></i>
            </div>
            <div class="menu-title">Brand</div>
        </a>
        <ul>
            <li>
                <a href="{{url('admin/add-brand')}}"><i class="bi bi-circle"></i>Add Brand</a>
            </li>
            <li>
                <a href="{{url('admin/brand-list')}}"><i class="bi bi-circle"></i>Brand List</a>
            </li>
        </ul>
      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="bi bi-card-list"></i>
            </div>
            <div class="menu-title">E-commerce</div>
        </a>
        <ul>
            <li>
                <a href="{{url('admin/promocode')}}"><i class="bi bi-circle"></i>SetUp Promo code</a>
            </li>
            <li>
                <a href="{{url('admin/product-tax')}}"><i class="bi bi-circle"></i>Setup Tax</a>
            </li>
            <li>
                <a href="{{url('admin/add-product')}}"><i class="bi bi-circle"></i>Add Product</a>
            </li>
            <li>
                <a href="{{url('admin/product-list')}}"><i class="bi bi-circle"></i>Product List</a>
            </li>
        </ul>
      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <i class="bi bi-card-list"></i>
            </div>
            <div class="menu-title">Bulk Upload</div>
        </a>
        <ul>
            <li>
                <a href="{{url('admin/bulk/product')}}"><i class="bi bi-circle"></i>Product Upload</a>
            </li>
            <li>
                <a href="#" onclick="openExportExcel()"><i class="bi bi-circle"></i>Export Product</a>
            </li>
        </ul>
      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class="bx bx-basket"></i>
            </div>
            <div class="menu-title">Order</div>
        </a>
        <ul>
            <li>
                <a href="{{url('admin/new-order')}}"><i class="bi bi-circle"></i>New Order</a>
            </li>
            <li>
                <a href="{{url('admin/shipped-order')}}"><i class="bi bi-circle"></i>Shipped Order</a>
            </li>
            <li>
                <a href="{{url('admin/delivered-order')}}"><i class="bi bi-circle"></i>Delivered Order</a>
            </li>
        </ul>
      </li>

      <li>
        <a href="javascript:;" target="_blank">
          <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
          </div>
          <div class="menu-title">Support</div>
        </a>
      </li>
    </ul>
    <!--end navigation-->
 </aside>
 <!--end sidebar -->
