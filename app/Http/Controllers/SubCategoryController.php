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
use App\Models\WishList;
use App\Models\Cart;
use App\Models\Conditions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\SaveImage;



class SubCategoryController extends Controller
{
    use SaveImage;
    public function index()
    {
        $subCat = SubCategory::get();
        return view('admin.pages.subcategory.index',compact('subCat'));
    }
    public function create()
    {
        $cat = Category::get();
        return view('admin.pages.subcategory.create',compact('cat'));
    }
    public function store(Request $request)
    {
        $valid = $this->validate($request,[
            'name'         => 'required|string|unique:sub_category,name',
            'category'      => 'required|numeric|exists:category,id',
            'description'   => 'string',
        ]);
        try
        {
            $slug  = Str::slug($request->name); 
            DB::beginTransaction();
            $subcat = new SubCategory;
            $subcat->slug = $slug;
            $subcat->category_id = $request->category;
            $subcat->name = $request->name;
            if($request->has('description'))
            {
                $subcat->description = $request->description;
            }
            if($request->hasFile('avatar'))
            {
                $subcat->avatar  = $this->subcatImage($request->avatar);
            }
            $subcat->save();
            DB::commit();
            return redirect()->route('admin.subcategory-list')->with('success', 'Record created successfully.');
        }
        catch(Exception $ex)
        {
            return $ex;
            return redirect()->back()->with('error', $ex);
        }
    }
    public function ApiIndex()
    {
        $subCat = SubCategory::get();
        return $subCat;
    }
}