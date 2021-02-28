<div id="sidebar" class="sidebar">

    <div data-scrollbar="true" data-height="100%">

        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="@if(!empty(Auth::user()->image)) {{Auth::user()->image}} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>{{Auth::user()->name}}
                        <small>Admin</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="{{route('admin.profile.index')}}"><i class="fa fa-user-circle"></i>Profile</a></li>
                    <li><a href="{{route('admin.profile.ep')}}"><i class="fa fa-key"></i> Change Password</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out"></i> Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </ul>
            </li>
        </ul>


        <ul class="nav">
            <li class="nav-header">General</li>
            <li>
                <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-users"></i>
                    <span>Users Management</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('admin.index')}}">Admin</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('category.index')}}">
                    <i class="fa fa-tags"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a href="{{route('brand.index')}}">
                    <i class="fa fa-product-hunt"></i>
                    <span>Brands</span>
                </a>
            </li>
            <li>
                <a href="{{route('color.index')}}">
                    <i class="fa fa-align-left"></i>
                    <span>Colors</span>
                </a>
            </li>
            <li>
                <a href="{{route('size.index')}}">
                    <i class="fa fa-align-left"></i>
                    <span>Sizes</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-product-hunt"></i>
                    <span>Products Management</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('product.create')}}"><i class="fa fa-plus-circle"></i>  Add Product</a></li>
                    <li><a href="{{route('product.index')}}"><i class="fa fa-list"></i> Product List</a></li>
                </ul>
            </li>
            <li class="nav-header">Content Management</li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-cogs"></i>
                    <span>Website Settings</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Slider</a></li>
                </ul>
            </li>


            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>

        </ul>

    </div>

</div>
<div class="sidebar-bg"></div>
