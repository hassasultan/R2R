<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Region;
use App\Models\PivotRegion;
use App\Models\PivotColor;
use App\Models\PivotCapacity;
use App\Models\Color;
use App\Models\Currency;
use App\Models\Capacity;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImg;
use App\Models\Conditions;
use App\Models\SellerProduct;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\SaveImage;
use Illuminate\Support\Facades\Validator;
use Exception;




class SellerProductController extends Controller
{
    use SaveImage;
    public function index()
    {
        $data['conditions'] = Conditions::all();
        $data['currency'] = Currency::all();
        $data['products'] = Product::with('brand','region','capacity','color','category','subcategory','proCondition')->where('status',1)->get();
        return $data; 
    }
    protected function SellerProductValidator(array $data)
    {
        return Validator::make($data, [
            'tilte' => ['required', 'string','unique:seller_product,title'],
            'product_id' => ['required', 'numeric','exists:products,id'],
            'condition_id' => ['required', 'numeric','exists:condition,id'],
            'stock' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'currency' => ['required', 'numeric','exists:currency,id'],
            'images' => ['required'],
            'color_id' => ['required'],
            'region_id' => ['required'],
            'capacity_id' => ['required'],
        ]);
    }
    public function create()
    {
        $valid = $this->validate($request,[
            'name'          => 'required|string',
            // 'name'          => 'required|string|unique:products,name',
            'description'   => 'required|string',
            'model'   => 'required|string',
            'region'   => 'required',
            'color'   => 'required',
            'capacity'   => 'required',
            'carrier'   => 'required|string',
            // 'seller'        => 'required|numeric|exists:sellers,id',
            'category'      => 'required|numeric|exists:category,id',
            'subcategory'      => 'required|numeric|exists:sub_category,id',
            'brand'         => 'required|numeric|exists:brands,id',
            'condition_id'     => 'required|numeric|exists:condition,id',
            // 'stock'         => 'required|numeric',
            'featured'         => 'required|numeric',
            // 'price'         => 'required|numeric',
            'fea_img'       => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'image'         => 'required|max:2048',
        ]);
        try
        {
            $slug  = Str::slug($request->name); 
            DB::beginTransaction();
            $product = new Product;
            $product->slug = $slug;
            $product->name = $request->name;
            // $product->seller_id = $request->seller;
            $product->cat_id = $request->category;
            $product->subcat_id = $request->subcategory;
            $product->brand_id = $request->brand;
            $product->condition_id = $request->condition_id;
            // $product->stock = $request->stock;
            // $product->price = $request->price;
            $product->featured = $request->featured;
            
            $product->model = $request->model;
            // $product->region = $request->region;
            // $product->color = $request->color;
            // $product->capacity = $request->capacity;
            $product->carrier = $request->carrier;
            
            // if($request->has('description'))
            // {
            //     $product->description = $request->description;
            // }
            // if($request->hasFile('fea_img'))
            // {
            //     $product->fea_img  = $this->feaImage($request->fea_img);
            // }
            // $product->save();
            // if($request->has('region'))
            // {
            //     foreach($request->region as $row)
            //     {
            //         PivotRegion::create([
            //             'region_id'=>$row,
            //             'product_id'=>$product->id,
            //         ]);
            //     }
            // }
            // if($request->has('color'))
            // {
            //     foreach($request->color as $row)
            //     {
            //         PivotColor::create([
            //             'color_id'=>(int)$row,
            //             'product_id'=>$product->id,
            //         ]);
            //     }
                
            // }
            // if($request->has('capacity'))
            // {
            //     foreach($request->capacity as $row)
            //     {
            //         PivotCapacity::create([
            //             'capacity_id'=>$row,
            //             'product_id'=>$product->id,
            //         ]);
            //     }   
            // }
            if($request->hasFile('image'))
            {
                foreach($request->image as $row)
                {
                    $proImg =  new ProductImg;
                    $proImg->product_id = $product->id;
                    $proImg->image  = $this->productImage($row);
                    $proImg->save();
                }
            }
            DB::commit();
            return redirect()->route('admin.product-list')->with('success', 'Record created successfully.');
        }
        catch(Exception $ex)
        {
            return $ex;
            return redirect()->back()->with('error', 'Record not created!');
        }
    }
    public function store(Request $request)
    {
        if(auth('seller_api')->check())
        {
            if (auth('seller_api')->user()) 
            {
                $valid = $this->SellerProductValidator($request->all());
                if (!$valid->fails()) 
                {
                    try 
                    {
                        $slug  = Str::slug($request->tilte); 
                        DB::beginTransaction();
                        $product = new SellerProduct();
                        $product->seller_id = auth('seller_api')->user()->seller->id;
                        $product->product_id = $request->product_id;
                        $product->title = $request->tilte;
                        $product->slug = $slug;
                        $product->condition_id = $request->condition_id;
                        $product->stock = $request->stock;
                        $product->price = $request->price;
                        $product->currency = $request->currency;
                        $product->save();
                        if($request->hasFile('color_id'))
                        {
                            foreach($request->color_id as $row)
                            {
                                $proColor =  new PivotColor;
                                $proColor->color_id = $row;
                                $proColor->product_id  = $product->id;
                                $proColor->save();
                            }
                        }
                        if($request->hasFile('region_id'))
                        {
                            foreach($request->region_id as $row)
                            {
                                $proRgn =  new PivotRegion;
                                $proRgn->region_id = $row;
                                $proRgn->product_id  = $product->id;
                                $proRgn->save();
                            }
                        }
                        if($request->hasFile('capacity_id'))
                        {
                            foreach($request->capacity_id as $row)
                            {
                                $proCpty =  new PivotCapacity;
                                $proCpty->capacity_id = $row;
                                $proCpty->product_id  = $product->id;
                                $proCpty->save();
                            }
                        }
                        if($request->hasFile('image'))
                        {
                            foreach($request->images as $row)
                            {
                                $proImg =  new ProductImg;
                                $proImg->seller_product_id = $product->id;
                                $proImg->images  = $this->productImage($row);
                                $proImg->save();
                            }
                        }
                        DB::commit();
                        return response()->json(['message', "Product has been successfully addedd"],200);
                    } 
                    catch (Exception $ex) 
                    {
                        return response()->json(['error', $ex->getMessage()]);
                    }
                } 
                else 
                {
                    return response()->json([
                        'status' => false,
                        'message' => 'validation error',
                        'errors' => $valid->errors()
                    ], 401);
                }
            } 
            else 
            {
                return response()->json([
                    'status' => false,
                    'message' => 'UnAuthorize',
                ], 401);
            }
        }
        else 
        {
            return response()->json([
                'status' => false,
                'message' => 'UnAuthorize',
            ], 401);
        }
    }
    public function colorListing()
    {
        if(auth('seller_api')->check())
        {
            if (auth('seller_api')->user()) 
            {
                $colors = Color::all();
                return $colors;
            } 
            else 
            {
                return response()->json([
                    'status' => false,
                    'message' => 'UnAuthorize',
                ], 401);
            }
        }
        else 
        {
            return response()->json([
                'status' => false,
                'message' => 'UnAuthorize',
            ], 401);
        }
    }
}