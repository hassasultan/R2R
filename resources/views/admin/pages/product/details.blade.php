@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="progress-container bg-white rounded-30 p-sm-5 p-3 mb-3">
                    <div class="d-md-flex mb-4">
                        <div class="align-self-center mb-3">
                            <h2 class="primary_title text-black ">Product Details</h2>
                        </div>
                        <div class="ms-auto ">
                            <p>
                                {{-- <span><i class="fa-solid fa-filter filter_icon me-3"></i></span>
                                <span class="sort_by">Sort by: Popular Class</span> --}}
                            </p>
                        </div>
                    </div>

                        <div class="form-row">
                            {{--<div class="col-md-12 mb-3">
                                <label for="inputState">Seller</label>
                                <input type="text" class="form-control" value="{{$product->seller->user->name}}" disabled readonly/>
                            </div>--}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="inputState">Category</label>
                                    <input type="text" class="form-control" value="{{$product->category->name}}" disabled readonly/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputState">SubCategory</label>
                                    <input type="text" class="form-control" value="{{$product->subcategory->name}}" disabled readonly/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputState">Brand</label>
                                    <input type="text" class="form-control" value="{{$product->brand->name}}" disabled readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02">Title</label>
                                    <input type="text" class="form-control" value="{{$product->name}}" disabled readonly/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputStateCond">Condition</label>
                                    <input type="text" class="form-control" value="{{$product->proCondition->name}}" disabled readonly/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02model">Model Number</label>
                                    <input type="text" class="form-control" name="model" id="validationTooltip02model"
                                        placeholder="Model Number" value="{{ $product->model }}" disabled readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputState">Region</label>
                                    <select id="inputState" class=" select2-multiple form-control" name="region[]" multiple disabled >
                                        @foreach ($region as $row)
                                            <option @if (old('region') == $row->id) selected @endif
                                                value="{{ $row->id }}" @foreach($product->region as $item) @if($row->id == $item->id) selected @endif @endforeach>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputColor">Color</label>
                                    <select id="inputColor" class=" select2-multiple form-control" name="color[]" multiple disabled>
                                        
                                        @foreach ($color as $row)
                                            <option @if (old('color') == $row->id) selected @endif
                                                value="{{ $row->id }}"  @foreach($product->color as $item) @if($row->id == $item->id) selected @endif @endforeach>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputCapacity">Capacity</label>
                                    <select id="inputCapacity" class=" select2-multiple form-control" name="capacity[]" multiple disabled>
                                        
                                        @foreach ($capacity as $row)
                                            <option @if (old('capacity') == $row->id) selected @endif
                                                value="{{ $row->id }}" @foreach($product->capacity as $item) @if($row->id == $item->id) selected @endif @endforeach>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip02carrier">Carrier</label>
                                    <input type="text" class="form-control" name="carrier" id="validationTooltip02carrier"
                                        placeholder="Carrier" value="{{ $product->carrier }}" disabled readonly>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltip04">Feature Image</label>
                                    <img src="{{ asset('public/storage/'.$product->fea_img) }}" height="200px" width="200px" class="img-fluid"/>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltip04">More Images</label>
                                    <div class="row">
                                        @foreach($product->images as $row)
                                            <div class="col-4 p-3">
                                                <img src="{{ asset('public/storage/'.$row->image) }}"class="img-fluid" style="max-height:200px;"/>
                                                
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
    
    
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltip05">Description</label>
                                    <textarea class="form-control" disabled readonly  rows="3">{{ $product->description }}</textarea>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip06">Stock</label>
                                    <input type="number" class="form-control" value="{{$product->stock}}" disabled readonly/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationTooltip07">Price</label>
                                    <input type="number" class="form-control" value="{{$product->price}}" disabled readonly/>
                                </div>
                            </div>
                            
                  
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bottom_script')

@endsection