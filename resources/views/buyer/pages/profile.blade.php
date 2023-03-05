@extends('buyer.layouts.app')
@section('page_title', 'Ready2Resale')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
<div class="container">

    <div class="heading">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="form-group">
                    @if($user->avatar != NULL)
                    <img id="imagePreview" src="{{ asset('storage/'.$user->avatar) }}" width="100px" height="100px"/>

                    @else
                    <img id="imagePreview" src="{{ asset('images/profile-img.svg') }}">
                </div>
                @endif
                <h3>Buyer Profile</h3>
            </div>
        </div>
        @include('layouts.includes.messages')
    </div>
        </div>
        <form method="post" action="{{ route('buyer.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div >
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Name</label>
                            <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $user->name }}" required>
                        </div>
                    </div>
                    <div >
                        <div class="form-group">
                            <label for="email" class="form-label fs-14 text-theme-primary fw-bold">Email</label>
                            <input type="email" readonly class="form-control fs-14 h-50px" disabled value="{{ $user->email }}" required>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Avatar</label>
                            <input type="file" class="form-control fs-14 h-50px" name="avatar" accept=".png, .jpg, .jpeg"  >
                        </div>
                    </div>
                    <div >
                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Phone Number </label>
                        <div class="row">
                            {{-- <div class="col-2">
                                <input type="tel" class="form-control fs-14 h-50px w-60" maxlength="3" placeholder="+XX"  name="country_code" value="{{ $user-> }}">
                            </div> --}}
                            <div class="col-5">
                                <input type="tel" class="form-control fs-14 h-50px" name="phone" placeholder="XXXXXXXXXXX" value="{{ $user->phone }}">
                            </div>
                        </div>
                    </div>
                    {{-- <div >
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">ABN/ ACN #.</label>
                            <input type="text" class="form-control fs-14 h-50px" name="abn"  required>
                        </div>
                    </div> --}}
                    {{-- <div class="">
                        <div class="form-group">
                            <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                            <select name="category[]" id="role" class="select2-multiple form-control fs-14  h-50px" required multiple>
                            <option disabled>Choose</option>
                            @foreach ($category as $ca)
                                <option value="{{ $ca->id }}"
                                    @if($user->recruiter->features != null)
                                        @foreach ($user->recruiter->features as $row)
                                            @if($row->id == $ca->id)
                                                Selected
                                            @endif
                                        @endforeach
                                    @endif>{{ $ca->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div> --}}
                    <div class="">
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                            <textarea class="form-control fs-14 h-50px" name="description"  required>{{ auth()->user()->description }}</textarea>
                        </div>
                    </div>

                    <div class="">
                        <div class="form-group">
                            <label for="address_one" class="form-label fs-14 text-theme-primary fw-bold">Address One</label>
                            <textarea class="form-control fs-14 h-50px" name="address_one"  required>@if(auth()->user()->buyer != NULL) {{ auth()->user()->buyer->address_one }} @endif</textarea>
                        </div>
                    </div>

                    <div class="">
                        <div class="form-group">
                            <label for="address_two" class="form-label fs-14 text-theme-primary fw-bold">Address Two</label>
                            <textarea class="form-control fs-14 h-50px" name="address_two"  required>@if(auth()->user()->buyer != NULL) {{ auth()->user()->buyer->address_two }} @endif</textarea>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label for="address_three" class="form-label fs-14 text-theme-primary fw-bold">Address Three</label>
                            <textarea class="form-control fs-14 h-50px" name="address_three"  required>@if(auth()->user()->buyer != NULL) {{ auth()->user()->buyer->address_three }} @endif</textarea>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Short Description</label>
                            <textarea class="form-control fs-14 h-50px" name="short_description"  required>@if(auth()->user()->buyer != NULL) {{ auth()->user()->buyer->short_description }} @endif</textarea>
                        </div>
                    </div>

                    <div class="">
                        <div class="form-group text-center">
                            <button type="submit" class="w-25 btn btn-primary btn_panel"> Update </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection

@section('bottom_script')



@endsection
