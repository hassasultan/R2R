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
use App\Models\Capacity;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImg;
use App\Models\Conditions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\SaveImage;


class HomeController extends Controller
{
    use SaveImage;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user->role);

        if($user->role == "admin"){

            return redirect('/admin/home');

        }elseif($user->role == "seller"){

            return redirect('/seller/home');

        }elseif($user->role == "buyer"){

            return redirect('/buyer/home');

        }

    }
    public function adminHome()
    {
        return view('admin.dashboard');
    }
    public function sellerHome()
    {
        return view('seller.dashboard');
    }
    public function buyerHome()
    {
        return view('buyer.dashboard');
    }
    
    public function buyer()
    {
        $buyer = Buyer::with('user')->whereHas('user')->get();
        // dd($buyer->toArray());
        return view('admin.pages.buyer.index',compact('buyer'));
    }
    public function seller()
    {
        $seller = Seller::with('user')->whereHas('user')->get();
        // dd($seller);
        return view('admin.pages.seller.index',compact('seller'));
    }
    public function categoryIndex()
    {
        $cat = Category::get();
        return view('admin.pages.category.index',compact('cat'));
    }

    public function categoryCreate()
    {
        return view('admin.pages.category.create');
    }
    public function categoryStore(Request $request)
    {
        $valid = $this->validate($request,[
            'name'         => 'required|string|unique:category,name',
            'description'   => 'string',
        ]);
        try
        {
            $slug  = Str::slug($request->name); 
            DB::beginTransaction();
            $cat = new Category;
            $cat->slug = $slug;
            $cat->name = $request->name;
            if($request->has('description'))
            {
                $cat->description = $request->description;
            }
            if($request->hasFile('avatar'))
            {
                $cat->avatar  = $this->catImage($request->avatar);
            }
            $cat->save();
            DB::commit();
            return redirect()->route('admin.category-list')->with('success', 'Record created successfully.');
        }
        catch(Exception $ex)
        {
            return $ex;
            return redirect()->back()->with('error', 'Record not created!');
        }
    }

    public function brandIndex()
    {
        $brand = Brand::get();
        // dd($buyer->toArray());
        return view('admin.pages.brand.index',compact('brand'));
    }

    public function brandCreate()
    {
        return view('admin.pages.brand.create');
    }
    public function brandStore(Request $request)
    {
        // dd($request->all());
        $valid = $this->validate($request,[
            'name'         => 'required|string|unique:brands,name',
            'description'   => 'string',
        ]);
        try
        {
            $slug  = Str::slug($request->name); 
            DB::beginTransaction();
            $brand = new Brand;
            $brand->slug = $slug;
            $brand->name = $request->name;
            if($request->has('description'))
            {
                $brand->description = $request->description;
            }
            if($request->hasFile('avatar'))
            {
                $brand->avatar  = $this->brandImage($request->avatar);
            }
            $brand->save();
            DB::commit();
            return redirect()->route('admin.brand-list')->with('success', 'Record created successfully.');
        }
        catch(Exception $ex)
        {
            return $ex;
            return redirect()->back()->with('error', 'Record not created!');
        }
    }
    
    public function productIndex()
    {
        $product = Product::with('seller')->OrderBy('id','DESC')->get();
        // dd($buyer->toArray());
        return view('admin.pages.product.index',compact('product'));
    
    }
    
    public function productDetails($id)
    {
        $brand = Brand::get();
        $cat = Category::get();
        $product = Product::with('brand','seller','category','images','region','capacity','color')->find($id);
        $region = Region::get();
        $color = Color::get();
        $capacity = Capacity::get();
        // dd($product->toArray());
        return view('admin.pages.product.details',compact('product','cat','brand','region', 'color', 'capacity'));
    
    }

    public function productCreate()
    {
        $cat = Category::get();
        $subcat = SubCategory::get();
        $seller = Seller::with('user')->whereHas('user')->get();
        $brand = Brand::get();
        $region = Region::get();
        $color = Color::get();
        $capacity = Capacity::get();
        $cond = Conditions::where('status',1)->get();
        return view('admin.pages.product.create',compact('cat','seller','brand','cond','subcat','region', 'color', 'capacity'));
    }
    public function productStore(Request $request)
    {
        // dd($request->all());
        $valid = $this->validate($request,[
            'name'          => 'required|string',
            // 'name'          => 'required|string|unique:products,name',
            'description'   => 'string',
            'model'   => 'string',
            'region'   => 'required',
            'color'   => 'required',
            'capacity'   => 'required',
            'carrier'   => 'required|string',
            // 'seller'        => 'required|numeric|exists:sellers,id',
            'category'      => 'required|numeric|exists:category,id',
            'subcategory'      => 'required|numeric|exists:sub_category,id',
            'brand'         => 'required|numeric|exists:brands,id',
            'condition_id'     => 'numeric|exists:condition,id',
            // 'stock'         => 'required|numeric',
            'featured'         => 'numeric',
            // 'price'         => 'required|numeric',
            'fea_img'       => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
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
            // $product->condition_id = $request->condition_id;
            // $product->stock = $request->stock;
            // $product->price = $request->price;
            // $product->featured = $request->featured;
            
            // $product->model = $request->model;
            // $product->region = $request->region;
            // $product->color = $request->color;
            // $product->capacity = $request->capacity;
            $product->carrier = $request->carrier;
            
            if($request->has('description'))
            {
                $product->description = $request->description;
            }
            if($request->hasFile('fea_img'))
            {
                $product->fea_img  = $this->feaImage($request->fea_img);
            }
            $product->save();
            if($request->has('region'))
            {
                foreach($request->region as $row)
                {
                    PivotRegion::create([
                        'region_id'=>$row,
                        'product_id'=>$product->id,
                    ]);
                }
            }
            if($request->has('color'))
            {
                foreach($request->color as $row)
                {
                    PivotColor::create([
                        'color_id'=>(int)$row,
                        'product_id'=>$product->id,
                    ]);
                }
                
            }
            if($request->has('capacity'))
            {
                foreach($request->capacity as $row)
                {
                    PivotCapacity::create([
                        'capacity_id'=>$row,
                        'product_id'=>$product->id,
                    ]);
                }   
            }
            // if($request->hasFile('image'))
            // {
            //     foreach($request->image as $row)
            //     {
            //         $proImg =  new ProductImg;
            //         $proImg->product_id = $product->id;
            //         $proImg->image  = $this->productImage($row);
            //         $proImg->save();
            //     }
            // }
            DB::commit();
            return redirect()->route('admin.product-list')->with('success', 'Record created successfully.');
        }
        catch(Exception $ex)
        {
            return $ex;
            return redirect()->back()->with('error', 'Record not created!');
        }
    }
    
    public function productAccept($id)
    {
        $pro = Product::find($id);
        $pro->status = 1;
        $pro->save();
        return redirect()->back()->with('success', 'Record has been Accepted successfully.');
    }
    public function productPending($id)
    {
        $pro = Product::find($id);
        $pro->status = 0;
        $pro->save();
        return redirect()->back()->with('success', 'Record has been Pending successfully.');
    }
    public function productReject($id)
    {
        $pro = Product::find($id);
        $pro->status = 2;
        $pro->save();
        return redirect()->back()->with('success', 'Record has been Rejected successfully.');
    }

    
}
