<div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-9 col-12 mb-3 mb-sm-0 d-none d-sm-block">
                    {{-- <div class="row g-0">
                        <div class="col-4">
                            <select class="form-select select_header">
                                <option value="">Select Category</option>
                                <option value="">Classes</option>
                                <option value="">Coaches</option>
                                <option value="">Services</option>
                                <option value="">Capital</option>
                            </select>
                        </div>
                        <div class="col-8 position-relative">
                            <input type="text" class="form-control input_header" placeholder="Search here">
                            <i class="fa-solid fa-magnifying-glass position-absolute search_icon"></i>
                        </div>
                    </div> --}}
                </div>
                <div class="col-6 d-sm-none">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-3 text-end align-self-center col-sm-2 col-6">
                    <ul class="d-flex justify-content-end">
                        {{--<li>
                             <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle dropdown_header dropdown_header_dot"
                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-bell"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Reset Password</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                                </ul>
                            </div> 
                        </li>--}}
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle dropdown_header" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    {{-- <li><a class="dropdown-item" href="#">Edit Profile</a></li> --}}
                                    <li><a class="dropdown-item" href="#">Reset Password</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>

                                </ul>
                            </div>
                        </li>
                        <li class="text-center d-lg-none align-self-center">
                            <i class="fa-solid fa-bars-staggered mobile_menu_trigger "></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
