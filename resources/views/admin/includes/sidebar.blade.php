<ul class="accordion accordion-flush position-relative h-100" id="accordionFlushExample">
    <li class="nav-item {{ Route::is('admin.home') ? 'active active-item' : '' }}">
        <a href="{{ route('admin.home') }}"><img src="{{ asset('assets/images/dashboard.png') }}" alt="" class="me-3">Admin Dashboard</a>
    </li>
    <li class="{{ Request::routeIs('admin.buyer-list') ? 'active active-item' : '' }}">
        <a href="{{ route('admin.buyer-list') }}"><img src="{{ asset('assets/images/payment.png') }}" alt="" class="me-3"> All Buyers</a>
    </li>
    <li class="{{ Request::routeIs('admin.seller-list') ? 'active active-item' : '' }}">
        <a href="{{ route('admin.seller-list') }}"><img src="{{ asset('assets/images/payment.png') }}" alt="" class="me-3"> All Seller</a>
    </li>
    <li @if (Route::is('admin.allcourses') || Route::is('admin.allcategories')  || Route::is('user.mycourses') ) class="accordion-item active active-item" @else class="accordion-item" @endif >
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false"
                aria-controls="flush-collapseOne">
                <img src="{{ asset('assets/images/courses.png') }}" alt="" class="me-3"> Product
            </button>
        </h2>
        <div  @if (Route::is('admin.category-list') || Route::is('admin.category-create')) || Route::is('admin.product-list')) class="accordion-collapse collapse show" @else   @endif id="flush-collapseOne" class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <ul class="accordion_inner">
                <li>
                    <a href="{{route('admin.product-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> Product List
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.category-list') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.category-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> Category List
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.subcategory-list') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.subcategory-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> SubCategory List
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.brand-list') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.brand-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> Brand List
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.condition-list') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.condition-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> Condition List
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.region-list') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.region-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> Region List
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.capacity-list') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.capacity-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> Capacity List
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.color-list') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.color-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> Color List
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.stock-list') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.stock-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> Stock List
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.currency-list') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.currency-list')}}">
                        <img src="{{ asset('assets/images/my-courses.png') }}" alt="" class="me-3"> Currency List
                    </a>
                </li>
            </ul>
        </div>
    </li>
    {{--<li @if (Route::is('admin.coachcatlist') || Route::is('admin.slot')  || Route::is('admin.coachlist') ) class="accordion-item active active-item" @else class="accordion-item" @endif >
        <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                aria-controls="flush-collapseTwo">
                <img src="{{ asset('assets/images/trianing.png') }}" alt="" class="me-3"> Coaches
            </button>
        </h2>
        <div  @if (Route::is('admin.coachcatlist') || Route::is('admin.slot') || Route::is('admin.coachlist')) class="accordion-collapse collapse show" @else   @endif id="flush-collapseTwo" class="accordion-collapse collapse"
            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <ul class="accordion_inner">
                <li class="{{ Request::routeIs('admin.coachcatlist') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.coachcatlist')}}">
                        <img src="{{ asset('assets/images/my_trainings.png') }}" alt="" class="me-3"> Coaches Categories
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.slot') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.slot')}}">
                        <img src="{{ asset('assets/images/my_trainings.png') }}" alt="" class="me-3"> Time Slots
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.coachlist') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.coachlist')}}">
                        <img src="{{ asset('assets/images/my_trainings.png') }}" alt="" class="me-3"> All Coaches
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.coach_slot_assign') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.coach_slot_assign')}}">
                        <img src="{{ asset('assets/images/my_trainings.png') }}" alt="" class="me-3">Coaches Slot Assign
                    </a>
                </li>
            </ul>
        </div>
    </li>--}}
    {{--<li @if (Route::is('admin.service.category.index') || Route::is('admin.service') ) class="accordion-item active active-item" @else class="accordion-item" @endif >
        <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseThree" aria-expanded="false"
                aria-controls="flush-collapseThree">
                <img src="{{ asset('assets/images/other_services.png') }}" alt="" class="me-3"> Services
            </button>
        </h2>
        <div  @if (Route::is('admin.service.category.index') || Route::is('admin.service')) class="accordion-collapse collapse show" @else   @endif id="flush-collapseThree" class="accordion-collapse collapse"
            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <ul class="accordion_inner">

                <li class="{{ Request::routeIs('admin.service.category.index') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.service.category.index')}}">
                        <img src="{{ asset('assets/images/other_services.png') }}" alt="" class="me-3"> Services Category
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.service') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.service')}}">
                        <img src="{{ asset('assets/images/other_services.png') }}" alt="" class="me-3"> Services
                    </a>
                </li>
            </ul>
        </div>
    </li>--}}
    {{--<li @if (Route::is('admin.admissionCourses') || Route::is('admin.serviceRequest') || Route::is('admin.coachRequest') ) class="accordion-item active active-item" @else class="accordion-item" @endif >
        <h2 class="accordion-header" id="flush-headingRequest">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseRequest" aria-expanded="false"
                aria-controls="flush-collapseRequest">
                <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3"> Requests
            </button>
        </h2>
        <div  @if (Route::is('admin.admissionCourses') || Route::is('admin.serviceRequest') || Route::is('admin.coachRequest')) class="accordion-collapse collapse show" @else   @endif id="flush-collapseRequest" class="accordion-collapse collapse"
            aria-labelledby="flush-collapseRequest" data-bs-parent="#accordionFlushExample">
            <ul class="accordion_inner">
                <li class="{{ Request::routeIs('admin.admissionCourses') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.admissionCourses')}}">
                        <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3"> Class Admission
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.serviceRequest') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.serviceRequest')}}">
                        <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3"> Service Requests
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.coachRequest') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.coachRequest')}}">
                        <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3"> Coach Requests
                    </a>
                </li>
            </ul>
        </div>
    </li>--}}
    {{--<li @if (Route::is('admin.view.allblog') ) class="accordion-item active active-item" @else class="accordion-item" @endif >
        <h2 class="accordion-header" id="flush-headingBlog">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseBlog" aria-expanded="false"
                aria-controls="flush-collapseBlog">
                <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3"> Blogs
            </button>
        </h2>
        <div  @if (Route::is('admin.view.allblog')) class="accordion-collapse collapse show" @else      @endif id="flush-collapseBlog" class="accordion-collapse collapse"
            aria-labelledby="flush-collapseBlog" data-bs-parent="#accordionFlushExample">
            <ul class="accordion_inner">
                <li class="{{ Request::routeIs('admin.view.allblog') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.view.allblog')}}">
                        <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3"> All Blogs
                    </a>
                </li>
            </ul>
        </div>
    </li>--}}
    {{--<li @if (Route::is('admin.view.allcontactus') ) class="accordion-item active active-item" @else class="accordion-item" @endif >
        <h2 class="accordion-header" id="flush-headingContact">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseContact" aria-expanded="false"
                aria-controls="flush-collapseContact">
                <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3"> Contact Us
            </button>
        </h2>
        <div  @if (Route::is('admin.view.allcontactus')) class="accordion-collapse collapse show" @else      @endif id="flush-collapseContact" class="accordion-collapse collapse"
            aria-labelledby="flush-collapseContact" data-bs-parent="#accordionFlushExample">
            <ul class="accordion_inner">
                <li class="{{ Request::routeIs('admin.view.allcontactus') ? 'active active-item' : '' }}">
                    <a href="{{route('admin.view.allcontactus')}}">
                        <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3">ContactUs Msg
                    </a>
                </li>
            </ul>
        </div>
    </li>--}}
    {{-- <li @if (Route::is('user.capital') ) class="accordion-item active active-item" @else class="accordion-item" @endif >
        <h2 class="accordion-header" id="flush-headingCapital">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseCapital" aria-expanded="false"
                aria-controls="flush-collapseCapital">
                <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3"> Capital
            </button>
        </h2>
        <div  @if (Route::is('user.allcourses')) class="accordion-collapse collapse show" @else   @endif id="flush-collapseCapital" class="accordion-collapse collapse"
            aria-labelledby="flush-headingCapital" data-bs-parent="#accordionFlushExample">
            <ul class="accordion_inner">
                <li class="{{ Request::routeIs('user.capital') ? 'active active-item' : '' }}">
                    <a href="{{route('user.capital')}}">
                        <img src="{{ asset('assets/images/money.png') }}" alt="" class="me-3"> All Capital
                    </a>
                </li>
            </ul>
        </div>
    </li> --}}
    {{-- <li>
        <a href="{{route('user.mypayment')}}"><img src="{{ asset('assets/images/payment.png') }}" alt="" class="me-3"> My Payments</a>
    </li>--}}
    <li>
        <a href="#"><img src="{{ asset('assets/images/settings.png') }}" alt="" class="me-3"> Settings</a>
    </li>
    <li class="w-100 logout_nav">
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <img src="{{ asset('assets/images/logout.png') }}" alt="" class="me-3"> Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    </ul>
