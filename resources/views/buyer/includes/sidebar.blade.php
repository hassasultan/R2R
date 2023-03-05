<aside class="main-sidebar col-12 col-md-4 col-lg-3 px-0 h-100">
    <!-- <div class="main-navbar">
   <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
       <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
       <div class="d-table m-auto">
           <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ asset('adminpanel/images/shards-dashboards-logo.svg') }}" alt="Shards Dashboard">
           <span class="d-none d-md-inline ml-1">Admin Dashboard</span>
       </div>
       </a>
       <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
       <i class="material-icons">&#xE5C4;</i>
       </a>
   </nav>
   </div> -->
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                aria-label="Search">
        </div>
    </form>
    <div class="nav-wrapper h-100">
        <div class="admin-panel-round-img text-center py-4 mt_minus">
            <img class="avatar shadow" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="">
        </div>
        <!-- <span class="d-none d-md-inline ml-1">Admin Dashboard</span> -->
        <ul class="nav flex-column">
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-eye"></i>
                    <span>My Profile Visibility
                        <label class="switch ml-3">
                            <input type="checkbox" @if (auth()->user()->candidate->status == 1) checked @endif
                                value="{{ auth()->user()->candidate->status }}"
                                onchange="status({{ auth()->user()->candidate->status }})">
                            <span class="slider"></span>
                        </label>
                    </span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="#"
                    @if (Route::is('candidate.dashboard')) class="nav-link active " @else class="nav-link" @endif>
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('buyer.profile') }}"
                    @if (Route::is('buyer.profile')) class="nav-link active " @else class="nav-link" @endif>
                    <i class="material-icons">person</i>
                    <span>My Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#"
                    @if (Route::is('candidates.education.view')) class="nav-link active " @else class="nav-link" @endif>
                    <!-- <i class="material-icons">person</i> -->
                    <i class="fa-solid fa-user-graduate"></i>
                    <span>Track My Orders</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="#"
                    @if (Route::is('candidates.profession.view')) class="nav-link active " @else class="nav-link" @endif>
                    <!-- <i class="material-icons">person</i> -->
                    <i class="fa-solid fa-user-tie"></i>
                    <span>My Professional Details</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#"
                    @if (Route::is('candidates.cvList')) class="nav-link active " @else class="nav-link" @endif>
                    <!-- <i class="material-icons">edit</i> -->
                    <i class="fa-solid fa-file"></i>
                    <span>My CV</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#"
                    @if (Route::is('candidates.job.visibility')) class="nav-link active " @else class="nav-link" @endif>
                    <i class="material-icons">visibility</i>
                    <span>My visibility</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#"
                    @if (Route::is('candidates.job.index')) class="nav-link active" @else class="nav-link" @endif>
                    <i class="material-icons">apps</i>
                    <span>My application</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" @if (Route::is('candidates.job.index')) class="nav-link active " @else class="nav-link" @endif>
                    <i class="material-icons">search</i>
                    <span>Job Search</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" @if (Route::is('candidates.job.index')) class="nav-link active " @else class="nav-link" @endif>
                    <i class="material-icons">campaign</i>
                    <span>Promote Me</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" @if (Route::is('candidates.job.index')) class="nav-link active " @else class="nav-link" @endif>
                <i class="fa-solid fa-highlighter"></i>
                    <span>Highlight Me</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" @if (Route::is('candidates.job.index')) class="nav-link active " @else class="nav-link" @endif>
                    <i class="material-icons">edit</i>
                    <span>Cv Services</span>
                </a>
            </li> --}}

        </ul>
    </div>
</aside>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- <script>
    function status(value) {
        var url = 0;
        if (value == 1) {
            url = "{{ route('change.status', 0) }}";
        } else {
            url = "{{ route('change.status', 1) }}";
        }
        $.ajax({
            type: 'GET',
            url: url,
            crossDomain: true,
            success: function(data) {
                console.log(data);
            }
        });
    }
</script> --}}
<!-- End Main Sidebar -->
