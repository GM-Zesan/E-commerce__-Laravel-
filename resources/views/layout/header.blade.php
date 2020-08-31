<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="" class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>
                    @if(@Auth::user()->id != NULL && @Auth::user()->usertype=='customer')
                        <a href="{{route('dashboard')}}" class="flex-c-m trans-04 p-lr-25">
                            Profile
                        </a>
                    @else
                        <a href="{{route('user.login')}}" class="flex-c-m trans-04 p-lr-25">
                            Login
                        </a>
                    @endif
                    <a href="" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>

                    <a href="" class="flex-c-m trans-04 p-lr-25">
                        USD
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->		
                <a href="{{url('')}}" class="logo">
                    <img src="{{asset('public/frontend')}}/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="{{url('')}}">Home</a>
                        </li>

                        <li class="label1" data-label1="hot">
                            <a href="{{route('shop')}}">Shop</a>
                        </li>

                        @if (@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)
                            <li>
                                <a href="{{route('cart')}}">Shopping Cart</a>
                            </li>
                        @elseif (@Auth::user()->id != NULL && Session::get('shipping_id') != NULL)
                            <li>
                                <a href="{{route('customer.payment')}}">Shopping Cart</a>
                            </li>
                        @else
                            <li>
                                <a href="{{route('user.login')}}">Shopping Cart</a>
                            </li>
                        @endif

                        <li>
                            <a href="{{route('about.us')}}">About</a>
                        </li>

                        <li>
                            <a href="{{route('contact.us')}}">Contact</a>
                        </li>
                        <li>
                            @if(@Auth::user()->id != NULL && @Auth::user()->usertype=='customer')
                                <a href="{{ route('dashboard') }}"
                                class="flex-c-m trans-04 p-lr-25">Profile</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('password.change') }}">Password Change</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('order.list') }}">Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                                <span class="arrow-main-menu-m">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </span>
                            @else
                                <a href="{{route('user.login')}}" class="flex-c-m trans-04 p-lr-25">
                                Login
                            </a>
                            @endif
                        </li>
                    </ul>
                </div>	
                
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ Cart::count() }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>
            </nav>
        </div>	
    </div>
    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="index.html"><img src="{{asset('public/frontend')}}/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ Cart::count() }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>
                    <a href="{{route('dashboard')}}" class="flex-c-m p-lr-10 trans-04">
                        Profile
                    </a>

                    <a href="" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>

                    <a href="" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{{url('')}}">Home</a>
            </li>

            <li>
                <a href="" class="label1 rs1">Shop</a>
            </li>

            @if (@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)
                <li>
                    <a href="{{route('cart')}}">Shopping Cart</a>
                </li>
            @elseif (@Auth::user()->id != NULL && Session::get('shipping_id') != NULL)
                <li>
                    <a href="{{route('customer.payment')}}">Shopping Cart</a>
                </li>
            @else
                <li>
                    <a href="{{route('user.login')}}">Shopping Cart</a>
                </li>
            @endif

            <li>
                <a href="{{route('about.us')}}">About</a>
            </li>

            <li>
                <a href="{{route('contact.us')}}">Contact</a>
            </li>
            
        @if(@Auth::user()->id != NULL && @Auth::user()->usertype=='customer')
            <li>
                <a href="{{ route('dashboard') }}">Profile</a>
            </li>
            <li>
                <a href="{{ route('password.change') }}">Password Change</a>
            </li>
            <li><a href="{{ route('order.list') }}">Orders</a></li>
            <li>
                <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                </form>
            </li>
            <span class="arrow-main-menu-m">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
        @else
            <li>
                <a href="{{route('user.login')}}">
                    Login
                </a>
            </li>
        @endif
        </ul>
    </div>
</header>



<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                
                @php
                    $contents = Cart::content();
                    $total = 0;
                @endphp
                @foreach ($contents as $item)
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{url($item->options->image)}}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{ $item->name }}
                            </a>

                            <span class="header-cart-item-info">
                                {{ $item->qty }} x {{ $item->price }} Tk
                            </span>
                        </div>
                    </li>
                    @php
                        $total += $item->subtotal;
                    @endphp
                @endforeach
                
            </ul>
            
            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: {{ $total }} Tk
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    @if (@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)

                        <a href="{{route('cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">Shopping Cart</a>

                    @elseif (@Auth::user()->id != NULL && Session::get('shipping_id') != NULL)

                        <a href="{{route('customer.payment')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">Shopping Cart</a>

                    @else

                        <a href="{{route('user.login')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">Shopping Cart</a>

                    @endif


                    @if (@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)

                        <a href="{{route('check.out')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">Check Out</a>

                    @elseif (@Auth::user()->id != NULL && Session::get('shipping_id') != NULL)

                        <a href="{{route('customer.payment')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">Check Out</a>

                    @else

                        <a href="{{route('user.login')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">Check Out</a>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>