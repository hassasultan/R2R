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
use App\Models\ProductImg;
use App\Models\WishList;
use App\Models\Cart;
use App\Models\Conditions;
use App\Models\Region;
use App\Models\Capacity;
use App\Models\Color;
use App\Models\Stock;
use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\SaveImage;



class ProductController extends Controller
{
    public function singleProduct(Request $request)
    {
        $product = Product::with('brand','seller','category','images')->find($request->id);
        return $product;
    }
    public function productIndexApi()
    {
        $product = Product::with('brand','seller','category','images')->where('status',1)->get();
        // dd($buyer->toArray());
        return $product;
    }
    public function featuredProductIndexApi()
    {
        $product = Product::with('brand','seller','category','images')->where('featured',1)->where('status',1)->get();
        // dd($buyer->toArray());
        return $product;
    }
    //category wise prduct
    public function categoryWiseProductIndexApi(Request $request)
    {
        $product = Product::with('brand','seller','category','images')->where('cat_id',$request->cat_id)->where('status',1)->get();
        return $product;
    }
    //End
    //All category
    public function allCategories()
    {
        $category = Category::all();
        return $category;
    }
    //WishList Start
    public function wishList(Request $request)
    {
        if(auth('buyer_api')->user())
        {
            $wishList = WishList::with('product','product.images','product.brand','product.category','product.seller')->where('user_id',auth('buyer_api')->user()->id)->where('status',1)->get();
            return $wishList;
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized']);
        }
    }
    public function addTowishList(Request $request)
    {
        if(auth('buyer_api')->user())
        {
            $wishList = new WishList(); 
            $wishList->user_id = auth('buyer_api')->user()->id;
            $wishList->product_id = $request->product_id;
            $wishList->save();
            return response()->json(['message'=>"Product Added to Wish List..."]);
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized']);
        }
    }
    public function deleteFromwishList(Request $request)
    {
        if(auth('buyer_api')->user())
        {
            $wishList = WishList::find($request->item_id); 
            $wishList->delete();
            return response()->json(['message',"Product Delted From Wish List..."]);
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized']);
        }
    }
    //WishList End
    //Cart Start
    public function cart(Request $request)
    {
        if(auth('buyer_api')->user())
        {
            $cart = Cart::with('product','product.images','product.brand','product.category','product.seller')->where('user_id',auth('buyer_api')->user()->id)->where('status',1)->get();
            return $cart;
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized']);
        }
    }
    public function addToCart(Request $request)
    {
        if(auth('buyer_api')->user())
        {
            $check = Cart::where('user_id',auth('buyer_api')->user()->id)->where('product_id',$request->product_id);
            if($check->count() == 0)
            {
                $cart = new Cart(); 
                $cart->user_id = auth('buyer_api')->user()->id;
                $cart->product_id = $request->product_id;
                $cart->quantity = $request->quantity;
                $cart->save();
            }
            else
            {
                $check = $check->first();
                if($request->has('quantity') && $request->quantity == 0 && $request->quantity == NULL)
                {
                    $check->quantity = $check->quantity + 1;
                }
                if($request->has('quantity') && $request->quantity != 0 && $request->quantity != NULL)
                {
                    $check->quantity = $check->quantity + $request->quantity;
                }

                $check->save();
            }
            return response()->json(['message' =>'Product Added to Cart...']);
        }
        else
        {
            return response()->json(['message' => 'UnAuthorized']);
        }
    }
    public function updateCart(Request $request)
    {
        if(auth('buyer_api')->user())
        {
            $cart = Cart::find($request->cart_id); 
            $cart->quantity = $request->quantity;
            $cart->save();
            return response()->json(['message'=>"Product Quantity has been Updated..."]);
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized']);
        }
    }
    public function deleteProductFromCart(Request $request)
    {
        if(auth('buyer_api')->user())
        {
            $cart = Cart::find($request->cart_id); 
            $cart->delete();
            return response()->json(['message'=>"Product has been deleted..."]);
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized']);
        }
    }
    //Cart End
    // Start Product Conditon CRUD
    public function condIndex()
    {
        $cond = Conditions::get();
        return view('admin.pages.condition.index',compact('cond'));
    }
    public function condCreate()
    {
        return view('admin.pages.condition.create');
    }
    public function condStore(Request $request)
    {
        $cond = Conditions::create($request->all());
        return redirect()->route('admin.condition-list')->with('success', 'Record created successfully.');
    }
    public function condEdit($id)
    {
        $cond = Conditions::find($id);
        return view('admin.pages.condition.edit',compact('cond'));
    }
    public function condUpdate(Request $request,$id)
    {
        $cond = Conditions::find($id);
        $cond->name = $request->name;
        $cond->status = $request->status;
        $cond->save();
        return redirect()->route('admin.condition-list')->with('success', 'Record Update successfully.');
    }
    public function condDestroy($id)
    {
        $cond = Conditions::find($id);
        $cond->delete();
        return redirect()->back()->with('success', 'Record Deleted successfully.');
    }
     // End Product Conditon CRUD
    public function condApiIndex()
    {
        $cond = Conditions::where('status',1)->get();
        return $cond;
    }
    
    
    // Start Product Region CRUD
    public function regionIndex()
    {
        $region = Region::get();
        return view('admin.pages.region.index',compact('region'));
    }
    public function regionCreate()
    {
        return view('admin.pages.region.create');
    }
    public function regionStore(Request $request)
    {
        $region = Region::create($request->all());
        return redirect()->route('admin.region-list')->with('success', 'Record created successfully.');
    }
    public function regionEdit($id)
    {
        $region = Region::find($id);
        return view('admin.pages.region.edit',compact('region'));
    }
    public function regionUpdate(Request $request,$id)
    {
        $region = Region::find($id);
        $region->name = $request->name;
        if($request->has('description'))
        {
            $region->description = $request->description;
        }
        $region->save();
        return redirect()->route('admin.region-list')->with('success', 'Record Update successfully.');
    }
    public function regionDestroy($id)
    {
        $region = Region::find($id);
        $region->delete();
        return redirect()->back()->with('success', 'Record Deleted successfully.');
    }
     // End Product Conditon CRUD
    public function regionApiIndex()
    {
        $region = Region::all();
        return $region;
    }
    
        
    // Start Product Capacity CRUD
    public function capacityIndex()
    {
        $capacity = Capacity::get();
        return view('admin.pages.capacity.index',compact('capacity'));
    }
    public function capacityCreate()
    {
        return view('admin.pages.capacity.create');
    }
    public function capacityStore(Request $request)
    {
        $capacity = Capacity::create($request->all());
        return redirect()->route('admin.capacity-list')->with('success', 'Record created successfully.');
    }
    public function capacityEdit($id)
    {
        $capacity = Capacity::find($id);
        return view('admin.pages.capacity.edit',compact('capacity'));
    }
    public function capacityUpdate(Request $request,$id)
    {
        $capacity = Capacity::find($id);
        $capacity->name = $request->name;
        if($request->has('description'))
        {
            $capacity->description = $request->description;
        }
        $capacity->save();
        return redirect()->route('admin.capacity-list')->with('success', 'Record Update successfully.');
    }
    public function capacityDestroy($id)
    {
        $capacity= Capacity::find($id);
        $capacity->delete();
        return redirect()->back()->with('success', 'Record Deleted successfully.');
    }
     // End Product Capacity CRUD
    public function capacityApiIndex()
    {
        $capacity = Capacity::all();
        return $capacity;
    }
    
    
            
    // Start Product Color CRUD
    public function colorIndex()
    {
        $color = Color::get();
        return view('admin.pages.color.index',compact('color'));
    }
    public function colorCreate()
    {
        return view('admin.pages.color.create');
    }
    public function colorStore(Request $request)
    {
        $color = Color::create($request->all());
        return redirect()->route('admin.color-list')->with('success', 'Record created successfully.');
    }
    public function colorEdit($id)
    {
        $color = Color::find($id);
        return view('admin.pages.color.edit',compact('color'));
    }
    public function colorUpdate(Request $request,$id)
    {
        $color = Color::find($id);
        $color->name = $request->name;
        if($request->has('description'))
        {
            $color->description = $request->description;
        }
        $color->save();
        return redirect()->route('admin.color-list')->with('success', 'Record Update successfully.');
    }
    public function colorDestroy($id)
    {
        $color= Color::find($id);
        $color->delete();
        return redirect()->back()->with('success', 'Record Deleted successfully.');
    }
     // End Product Capacity CRUD
    public function colorApiIndex()
    {
        $color = Color::all();
        return $color;
    }
    
    
    // Start Stock CRUD
    public function stockIndex()
    {
        $stock = Stock::get();
        return view('admin.pages.stock.index',compact('stock'));
    }
    public function stockCreate()
    {
        return view('admin.pages.stock.create');
    }
    public function stockStore(Request $request)
    {
        $stock = Stock::create($request->all());
        return redirect()->route('admin.stock-list')->with('success', 'Record created successfully.');
    }
    public function stockEdit($id)
    {
        $stock = Stock::find($id);
        return view('admin.pages.stock.edit',compact('stock'));
    }
    public function stockUpdate(Request $request,$id)
    {
        $stock = Stock::find($id);
        $stock->stock = $request->stock;
        if($request->has('description'))
        {
            $stock->unit = $request->unit;
        }
        $stock->save();
        return redirect()->route('admin.stock-list')->with('success', 'Record Update successfully.');
    }
    public function stockDestroy($id)
    {
        $stock= Stock::find($id);
        $stock->delete();
        return redirect()->back()->with('success', 'Record Deleted successfully.');
    }
     // End Product Stock CRUD
    public function stockApiIndex()
    {
        $stock = Stock::all();
        return $stock;
    }
        
    
    // Start Currency CRUD
    public function currencyIndex()
    {
        $currency = Currency::get();
        return view('admin.pages.currency.index',compact('currency'));
    }
    public function currencyCreate()
    {
        return view('admin.pages.currency.create');
    }
    public function currencyStore(Request $request)
    {
        $currency = Currency::create($request->all());
        return redirect()->route('admin.currency-list')->with('success', 'Record created successfully.');
    }
    public function currencyEdit($id)
    {
        $currency = Currency::find($id);
        return view('admin.pages.currency.edit',compact('currency'));
    }
    public function currencyUpdate(Request $request,$id)
    {
        $currency = Currency::find($id);
        $currency->price = $request->price;
        if($request->has('name'))
        {
            $currency->name = $request->name;
        }
        $currency->save();
        return redirect()->route('admin.currency-list')->with('success', 'Record Update successfully.');
    }
    public function currencyDestroy($id)
    {
        $currency= Currency::find($id);
        $currency->delete();
        return redirect()->back()->with('success', 'Record Deleted successfully.');
    }
     // End Product Currency CRUD
    public function currencyApiIndex()
    {
        $currency = Currency::all();
        return $currency;
    }
}