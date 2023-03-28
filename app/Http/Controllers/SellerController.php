<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImg;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\SaveImage;


class SellerController extends Controller
{
    use SaveImage;
    public function edit_profile(Request $request)
    {
        $user = auth()->user();
        return view('seller.pages.profile',compact('user'));
    }
    public function view_profile()
    {
        if(auth('seller_api')->user() && auth('seller_api')->user()->role == "seller")
        {
            $user = User::with('seller')->find(auth('seller_api')->user()->id);
            // dd($user);
            return $user;
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized']);
        }
    }
    public function Update_profile(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'avatar' => ['required', 'string'],
            'address_one' => ['required', 'string'],
            'brand_name' => ['required', 'string'],
            'nie_num' => ['required', 'string'],
            'web_url' => ['required', 'string'],
            'company_name' => ['required', 'string'],
            'contact_person_name' => ['required', 'string'],
            'person_designation' => ['required', 'string'],
            'contact_number' => ['required', 'string'],
            'contact_email' => ['required', 'string'],
            'social_media' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'source' => ['required', 'string'],
            'billing_address' => ['required', 'string'],
            'permanent_address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'postal' => ['required', 'string'],
            'country' => ['required', 'string'],

        ]);
        if(auth('seller_api')->user() && auth('seller_api')->user()->role == "seller")
        {
            $user = User::find(auth('seller_api')->user()->id);
            // dd($user->toArray());
            if(!$valid->errors())
            {
                if($request->has('first_name') && $request->has('last_name'))
                {
                    $user->name = $request->first_name.' '.' '.$request->last_name;
                }
                if($request->has('phone'))
                {
                    $user->phone = $request->phone;
                }
                if($request->has('description'))
                {
                    $user->description = $request->description;
                }
                if($request->has('avatar'))
                {
                    $img = $request->avatar;
                    $number = rand(1,999);
                    $numb = $number / 7 ;
                    $extension      = $img->extension();
                    $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
                    $filenamepath   = 'seller'.'/'.'img/'.$filenamenew;
                    $filename       = $img->move(public_path('storage/seller'.'/'.'img'),$filenamenew);

                    if(file_exists($user->avatar))
                    {
                        File::delete($user->avatar);
                    }
                    $user->avatar = $filenamepath;
                }
                $user->save();
                if(auth('seller_api')->user()->seller != NULL)
                {

                    $seller = Seller::where('user_id',auth('seller_api')->user()->id)->first();
                    if($request->has('brand_name'))
                    {
                        $seller->brand_name = $request->brand_name;
                    }
                    if($request->has('nie_num'))
                    {
                        $seller->nie_num = $request->nie_num;
                    }
                    if($request->has('web_url'))
                    {
                        $seller->web_url = $request->web_url;
                    }
                    if($request->has('company_name'))
                    {
                        // dd($request->company_name);
                        $seller->company_name = $request->company_name;
                    }
                    if($request->has('contact_person_name'))
                    {
                        $seller->contact_person_name = $request->contact_person_name;
                    }
                    if($request->has('person_designation'))
                    {
                        $seller->person_designation = $request->person_designation;
                    }
                    if($request->has('contact_number'))
                    {
                        $seller->contact_number = $request->contact_number;
                    }
                    if($request->has('contact_email'))
                    {
                        $seller->contact_email = $request->contact_email;
                    }
                    if($request->has('social_media'))
                    {
                        $seller->social_media = $request->social_media;
                    }
                    if($request->has('dob'))
                    {
                        $seller->dob = $request->dob;
                    }
                    if($request->has('source'))
                    {
                        $seller->source = $request->source;
                    }
                    if($request->has('billing_address'))
                    {
                        $seller->billing_address = $request->billing_address;
                    }
                    if($request->has('permanent_address'))
                    {
                        $seller->permanent_address = $request->permanent_address;
                    }
                    if($request->has('city'))
                    {
                        $seller->city = $request->city;
                    }
                    if($request->has('state'))
                    {
                        $seller->state = $request->state;
                    }
                    if($request->has('postal'))
                    {
                        $seller->postal = $request->postal;
                    }
                    if($request->has('country'))
                    {
                        $seller->country = $request->country;
                    }
                    $seller->save();
                }
                else
                {
                    $seller = new Seller();
                    $seller->user_id = $user->id;
                    if($request->has('brand_name'))
                    {
                        $seller->brand_name = $request->brand_name;
                    }
                    if($request->has('nie_num'))
                    {
                        $seller->nie_num = $request->nie_num;
                    }
                    if($request->has('web_url'))
                    {
                        $seller->web_url = $request->web_url;
                    }
                    if($request->has('company_name'))
                    {
                        $seller->company_name = $request->company_name;
                    }
                    if($request->has('contact_person_name'))
                    {
                        $seller->contact_person_name = $request->contact_person_name;
                    }
                    if($request->has('person_designation'))
                    {
                        $seller->person_designation = $request->person_designation;
                    }
                    if($request->has('contact_number'))
                    {
                        $seller->contact_number = $request->contact_number;
                    }
                    if($request->has('contact_email'))
                    {
                        $seller->contact_email = $request->contact_email;
                    }
                    if($request->has('social_media'))
                    {
                        $seller->social_media = $request->social_media;
                    }
                    if($request->has('dob'))
                    {
                        $seller->dob = $request->dob;
                    }
                    if($request->has('source'))
                    {
                        $seller->source = $request->source;
                    }
                    if($request->has('billing_address'))
                    {
                        $seller->billing_address = $request->billing_address;
                    }
                    if($request->has('permanent_address'))
                    {
                        $seller->permanent_address = $request->permanent_address;
                    }
                    if($request->has('city'))
                    {
                        $seller->city = $request->city;
                    }
                    if($request->has('state'))
                    {
                        $seller->state = $request->state;
                    }
                    if($request->has('postal'))
                    {
                        $seller->postal = $request->postal;
                    }
                    if($request->has('country'))
                    {
                        $seller->country = $request->country;
                    }
                    $seller->save();

                }

            }
            else
            {
                return response()->json($valid->errors()->first(),422);
            }
            return response()->json("Profile has been Updated Successfully...",200);
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized']);
        }
    }

    public function categoryIndexApi()
    {
        $cat = Category::get();
        return $cat;
    }
    public function brandIndexApi()
    {
        // dd("check");
        $brand = Brand::get();
        // dd($buyer->toArray());
        return $brand;
    }
    public function productIndexSellerApi()
    {
        // dd(auth('seller_api')->user()->toArray());
        if(auth('seller_api')->user())
        {
            $product = Product::with('brand','seller','category','images')->where('seller_id',auth('seller_api')->user()->seller->id)->get();
            // dd($buyer->toArray());
            return $product;
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized']);
        }
    }
    public function categoryStoreApi(Request $request)
    {
        // dd($request->all());
        if(auth('seller_api')->check())
        {
            $valid = $this->validate($request,[
                'name'         => 'required|string|unique:category,name',
                'description'   => 'string',
            ]);
            try
            {
                $slug  = Str::slug($request->name);
                DB::beginTransaction();
                $cat = new Category();
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
                return response()->json(['message',"Category has been Created Successfully..."]);
            }
            catch(Exception $ex)
            {
                return response()->json(['error',$ex]);

            }
        }
        else
        {
            // dd("check");
            return response()->json(['message'=> "UnAuthorized"]);
        }
    }
    public function productStoreApi(Request $request)
    {
    //   return $request->all();
        if(auth('seller_api')->check())
        {
            $valid = $this->validate($request,[
                'name'          => 'required|string',
                // 'name'          => 'required|string|unique:products,name',
                'description'   => 'required|string',
                'model'   => 'required|string',
                'region'   => 'required|string',
                'color'   => 'required|string',
                'capacity'   => 'required|string',
                'carrier'   => 'required|string',
                'subcategory'      => 'required|numeric|exists:sub_category,id',
                // 'seller'        => 'required|numeric|exists:sellers,id',
                'category'      => 'required|numeric|exists:category,id',
                'brand'         => 'required|numeric|exists:brands,id',
                'condition'     => 'required|string|in:New,Used,Used like New',
                'stock'         => 'required|numeric',
                'price'         => 'required|numeric',
                'fea_img'       => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image'         => 'required|max:2048',
            ]);
            try
            {
                $slug  = Str::slug($request->name.'-');
                DB::beginTransaction();
                $product = new Product;
                $product->slug = $slug;
                $product->name = $request->name;
                $product->seller_id = auth('seller_api')->user()->seller->id;
                $product->cat_id = $request->category;
                $product->brand_id = $request->brand;
                $product->condition = $request->condition;
                $product->stock = $request->stock;
                $product->price = $request->price;
                $product->subcat_id = $request->subcategory;
                $product->model = $request->model;
                $product->region = $request->region;
                $product->color = $request->color;
                $product->capacity = $request->capacity;
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
                if($request->hasFile('image') && $request->image != NULL)
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
                return response()->json(['success', 'Record created successfully.']);
            }
            catch(Exception $ex)
            {
                // return $ex;
                return response()->json(['error', $ex]);
            }

        }
        else
        {
            // dd("check");
            return response()->json(['message'=> "UnAuthorized"]);
        }
    }


}
