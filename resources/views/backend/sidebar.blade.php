<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:500px; position: fixed">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('public/backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public/backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">User</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('/backend')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customer
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('customer.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer List</p>
                            </a> 
                        </li>
                        <li>
                            <a href="{{route('customer.draft')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Draft Customer</p>
                            </a> 
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>Add Category</p>
                            </a> 
                        </li>
                        <li>
                            <a href="{{route('category.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a> 
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Post
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('post.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Add Post</p>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{route('post.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Post List</p>
                            </a> 
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Brand
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('brand.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Add Brand</p>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{route('brand.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Brand List</p>
                            </a> 
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Color
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('color.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Add Color</p>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{route('color.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Color List</p>
                            </a> 
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Size
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('size.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Add Size</p>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{route('size.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Size List</p>
                            </a> 
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Add Product</p>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Product List</p>
                            </a> 
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Slider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('slider.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Add Slider</p>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{route('slider.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Slider List</p>
                            </a> 
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pending.order') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Pending Orders</p>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('approved.order') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>    
                                <p>Approved Orders</p>
                            </a> 
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>