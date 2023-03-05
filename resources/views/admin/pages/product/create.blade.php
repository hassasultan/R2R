@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="progress-container bg-white rounded-30 p-sm-5 p-3 mb-3">
                    <div class="d-md-flex mb-4">
                        <div class="align-self-center mb-3">
                            <h2 class="primary_title text-black ">Add Product</h2>
                        </div>
                        <div class="ms-auto ">
                            <p>
                                {{-- <span><i class="fa-solid fa-filter filter_icon me-3"></i></span>
                                <span class="sort_by">Sort by: Popular Class</span> --}}
                            </p>
                        </div>
                    </div>
                    <form class="needs-validation" method="post" action="{{ route('admin.product-store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            {{--<div class="col-md-12 mb-3">
                                <label for="inputState">Seller</label>
                                <select id="inputState" class="form-control" name="seller" required>
                                    @foreach ($seller as $row)
                                        <option @if (old('seller') == $row->id) selected @endif
                                            value="{{ $row->id }}">{{ $row->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>--}}
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltip02">Title</label>
                                    <input type="text" class="form-control" name="name" id="validationTooltip02" placeholder="Enter Product Title" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputState">Category</label>
                                    <select id="inputState" class="form-control" name="category" required>
                                        <option value="" selected>Select Category.</option>
                                        @foreach ($cat as $row)
                                            <option @if (old('category') == $row->id) selected @endif
                                                value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputStatesubCat">Sub-Category</label>
                                    <select id="inputStatesubCat" class="form-control" name="subcategory" required>
                                        <option value="" selected>Select Sub-Category</option>
                                        @foreach ($subcat as $row)
                                            <option @if (old('subcategory') == $row->id) selected @endif
                                                value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputState">Brand</label>
                                    <select id="inputState" class="form-control" name="brand" required>
                                        <option value="" selected>Select Brand</option>
                                        @foreach ($brand as $row)
                                            <option @if (old('brand') == $row->id) selected @endif
                                                value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--<div class="col-md-6 mb-3">-->
                                <!--    <label for="inputStateCond">Condition</label>-->
                                <!--    <select id="inputStateCond" class="form-control" name="condition_id" required>-->
                                <!--        <option value="" selected>Select Condition</option>-->
                                <!--            @foreach($cond as $row)-->
                                <!--            <option @if (old('condition_id') == $row->id) selected @endif-->
                                <!--                value="{{$row->id}}">{{$row->name}}-->
                                <!--            </option>-->
                                <!--            @endforeach-->
                                <!--    </select>-->
                                <!--</div>-->
                                
                                <!--<div class="col-md-6 mb-3">-->
                                <!--    <label for="inputFea">Is Feature</label>-->
                                <!--    <select id="inputFea" class="form-control" name="featured" required>-->
                                <!--        <option value="">Select Featured</option>-->
                                <!--        <option value="1">Yes</option>-->
                                <!--        <option value="0">No</option>-->
                                <!--    </select>-->
                                <!--</div>-->
                                <!--<div class="col-md-12 mb-3">-->
                                    
                                <!--</div>-->
                                <!--<div class="col-md-6 mb-3">-->
                                <!--    <label for="validationTooltip02model">Model Number</label>-->
                                <!--    <input type="text" class="form-control" name="model" id="validationTooltip02model"-->
                                <!--        placeholder="Model Number" value="{{ old('model') }}" required>-->
                                <!--</div>-->
                                <div class="col-md-6 mb-3">
                                    <label for="inputState">Region</label>
                                    <select id="inputState" class=" select2-multiple form-control" name="region[]" multiple required>
                                        
                                        @foreach ($region as $row)
                                            <option @if (old('region') == $row->id) selected @endif
                                                value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputColor">Color</label>
                                    <select id="inputColor" class=" select2-multiple form-control" name="color[]" multiple required>
                                        
                                        @foreach ($color as $row)
                                            <option @if (old('color') == $row->id) selected @endif
                                                value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputCapacity">Capacity</label>
                                    <select id="inputCapacity" class=" select2-multiple form-control" name="capacity[]" multiple required>
                                        
                                        @foreach ($capacity as $row)
                                            <option @if (old('capacity') == $row->id) selected @endif
                                                value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02carrier">Carrier</label>
                                    <input type="text" class="form-control" name="carrier" id="validationTooltip02carrier"
                                        placeholder="Carrier" value="{{ old('carrier') }}" required>
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label for="validationTooltip06">Stock</label>
                                    <input type="number" class="form-control" name="stock" id="validationTooltip06"
                                        placeholder="Stock" value="{{ old('stock') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip07">Price</label>
                                    <input type="number" placeholder="Price" class="form-control" name="price" value="{{ old('price') }}" id="validationTooltip07" required>
                                </div>--}}
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltip04">Default Image</label>
                                    <input type="file" class="form-control" name="fea_img" id="validationTooltip04" required>
                                </div>
                                {{-- <div class="col-md-12 mb-3">
                                    <label for="video">Videos</label>
                                    <input type="file" class="form-control" name="videos" accept="video/mp4,video/x-m4v,video/*" id="video" multiple required>
                                    <div id="videos" class="col-md-12 mt-3"></div>
                                </div> --}}
    
                                <!--<div class="col-md-12 mb-3">-->
                                <!--    <label for="validationTooltip05">Description</label>-->
                                <!--    <textarea class="form-control" name="description" id="validationTooltip05" rows="3">{{ old('description') }}</textarea>-->
                                <!--</div>-->
                            </div>
                            {{--<div class="text-right" style="margin-bottom : 2%">
                                <button type="button" onclick="addedudetails()" class="btn btn-primary">+ Add Image(s)</button>
                                <br />
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="preempform">
                                    <thead>
                                        <p>More Images</p>
                                        <tr>
                                            <th style="white-space: nowrap;">S.NO.</th>
                                            <th style="white-space: nowrap;">Select Image</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $cnt = 1; ?>
                                        <tr>
                                            <td><input type='number' step='any' class='form-control required_colom'
                                                    required='required' placeholder='' value="{{ $cnt }}"
                                                    readonly /></td>
                                            <td>
                                                <input type='file' step='any' name='image[]'
                                                     id="video0"
                                                    onchange="selectVideo(0)" class='form-control required_colom address form-input'
                                                    required='required' multiple>
                                                <div id="videos0" class="mt-3"></div>
                                            </td>
                                            <!--<td><input type='radio' value='0' checked="checked" name='Showimage[]'-->
                                            <!--        class='form-control required_colom address' required='required'></td>-->
                                            <td>
                                                @if ($cnt != 1)
                                                    <button onclick="removeRow(1)" type='button'
                                                        class='btn btn-danger remove'>remove</button>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            --}}
                            <div class="col-md-2 mb-3">
                                <button class="btn btn-primary" type="submit">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bottom_script')
    {{--<script>
    
        function selectVideo(id) {
            video = document.getElementById("video" + id).files[0];
            getImgData(id);
         

        }
        function getImgData(id) {
            const chooseFile = document.getElementById("video" + id);
            const imgPreview = document.getElementById("videos" + id);
          const files = chooseFile.files[0];
          if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
              imgPreview.style.display = "block";
              imgPreview.innerHTML = '<img style="width:100px;height:100px;" src="' + this.result + '" />';
            });    
          }
        }
        // document.querySelector("input[type=file]").onchange = function(event) {
        //     var numberOfVideos = event.target.files.length;
        //     for (var i = 0; i < numberOfVideos; i++) {
        //         var file = event.target.files[i];
        //         var blobURL = URL.createObjectURL(file);
        //         var video = document.createElement('video');
        //         video.src = blobURL;
        //         video.setAttribute("controls", "")
        //         var videos = document.getElementById("videos");
        //         videos.appendChild(video);
        //     }
        // }}
        function addedudetails() {

            var table = document.getElementById("preempform");
            var rowCount = $('#preempform tr').length;
            var row = table.insertRow(rowCount);
            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
            var hotelLocationId = "HotelLocation" + rowCount;


            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            // var cell4 = row.insertCell(3);
            // var cell5 = row.insertCell(4);
            // var cell6 = row.insertCell(5);

            var jaja = 1;
            var pappu = rowCount;
            var jhama = pappu - jaja;

            var indexrowcount = jhama - jaja;

            console.log(indexrowcount);

            cell1.innerHTML =
                "<input type='number' step='any'  class='form-control required_colom' required='required' placeholder='' value=" +
                jhama + " readonly />";
            // cell2.innerHTML =
            //     "<input type='file' step='any' name='video_title[]' id='can_edu_year'  class='form-control required_colom datepick' required='required' placeholder='Alternate Text' />";
            cell2.innerHTML = "<input type='file' step='any' name='image[]' onchange='selectVideo(" + indexrowcount +
                ")'  id='video" + indexrowcount +
                "'  class='form-control required_colom address' required='required' /> <div id='videos" + indexrowcount +
                "' class='mt-3'></div>";
            // cell4.innerHTML = "<input type='text' readonly step='any' name='duration[]' id='dur" + indexrowcount +
            //     "'  class='form-control required_colom datepick' required='required' placeholder='Duration' />";
            // cell5.innerHTML = "<input type='text' readonly step='any' name='ext[]' id='ext" + indexrowcount +
            // "'  class='form-control required_colom datepick' required='required' placeholder='Extension' />";
            // cell6.innerHTML = "<input type='radio'  name='Showimage[]' value=" + indexrowcount +
            //     " class='form-control required_colom address' required='required'>"
            $("#can_edu_year").each(function() {

            });
            if (jhama == 1) {
                cell3.innerHTML = "<button  type='button' class='btn btn-danger ' >remove</button>";
            } else {
                cell3.innerHTML = "<button  type='button' class='btn btn-danger remove' >remove</button>";
            }

        }

        $('#preempform').on('click', '.remove', function(e) {
            $(this).closest('tr').remove();
        });
    </script>--}}
@endsection