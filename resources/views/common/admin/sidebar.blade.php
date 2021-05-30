<nav class="sidebar sidebar-bunker">
    <div class="sidebar-header">
        <a href="#" class="logo" style="color: #fff"><span>SAFETY</span> PPE</a>
        {{--<a href="#" class="logo" style="color: #fff"><span>SG</span>Stock</a>--}}
        {{--<a href="index.html" class="logo"><img src="{{ asset('admin/assets/dist/img/logo.png') }}" alt=""></a>--}}
    </div><!--/.sidebar header-->
    {{--<div class="profile-element d-flex align-items-center flex-shrink-0">--}}
        {{--<div class="avatar online">--}}
            {{--<img src="{{ asset('admin/assets/dist/img/avatar-1.jpg') }}" class="img-fluid rounded-circle" alt="">--}}
        {{--</div>--}}
        {{--<div class="profile-text">--}}
            {{--<h6 class="m-0">Naeem Khan</h6>--}}
            {{--<span><a href="cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="9cf9e4fdf1ecf0f9dcfbf1fdf5f0b2fff3f1">[email&#160;protected]</a></span>--}}
        {{--</div>--}}
    {{--</div><!--/.profile element-->--}}
    {{--<form class="search sidebar-form" action="#" method="get" >--}}
        {{--<div class="search__inner">--}}
            {{--<input type="text" class="search__text" placeholder="Search...">--}}
            {{--<i class="typcn typcn-zoom-outline search__helper" data-sa-action="search-close"></i>--}}
        {{--</div>--}}
    {{--</form><!--/.search-->--}}
    <div class="sidebar-body">
        <nav class="sidebar-nav">
            <ul class="metismenu">
                <li class="@yield('dashboard')"><a href="{{ url('/dashboard') }}" ><i class="typcn typcn-home-outline mr-2"></i> Dashboard</a></li>
                <li class="@yield('products')"><a href="{{ url('/products') }}"><i class="typcn typcn-puzzle-outline mr-2"></i> Products</a></li>
                <li class="@yield('customers')"><a href="{{ url('/customers') }}"><i class="typcn typcn-puzzle-outline mr-2"></i> Customers</a></li>
                <li class="@yield('quotations')"><a href="{{ url('/quotations') }}"><i class="typcn typcn-puzzle-outline mr-2"></i> Quotations</a></li>
                <li class="@yield('challans')"><a href="{{ url('/challans') }}"><i class="typcn typcn-puzzle-outline mr-2"></i> Challans</a></li>
                <li class="@yield('invoices')"><a href="{{ url('/invoices') }}"><i class="typcn typcn-puzzle-outline mr-2"></i> Invoices</a></li>
                <li class="@yield('sizes')"><a href="{{ url('/sizes') }}"><i class="typcn typcn-puzzle-outline mr-2"></i> Sizes</a></li>
                <li class="@yield('brands')"><a href="{{ url('/brands') }}"><i class="typcn typcn-puzzle-outline mr-2"></i> Brand</a></li>
                <li class="@yield('colours')"><a href="{{ url('/colours') }}"><i class="typcn typcn-puzzle-outline mr-2"></i> Colour</a></li>

            </ul>
        </nav>
    </div><!-- sidebar-body -->
</nav>