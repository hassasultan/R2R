<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buyer;
use Illuminate\Support\Facades\Validator;


class BuyerController extends Controller
{
    //
    public function edit_profile(Request $request)
    {
        $user = auth()->user();
        return view('buyer.pages.profile',compact('user'));
    }
    public function view_profile()
    {
        if(auth('buyer_api')->user() && auth('buyer_api')->user()->role == "buyer")
        {
            $user = User::with('buyer')->find(auth('buyer_api')->user()->id);
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
        // dd($request->all());
        $valid = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'phone' => ['required', 'string'],
            // 'avatar' => ['required', 'string'],
            'address_one' => ['required', 'string'],
        ]);
        if(auth('buyer_api')->user() && auth('buyer_api')->user()->role == "buyer")
        {
            $user = User::with('buyer')->find(auth('buyer_api')->user()->id);
            if($valid)
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
                    $filenamepath   = 'Buyer'.'/'.'img/'.$filenamenew;
                    $filename       = $img->move(public_path('storage/Buyer'.'/'.'img'),$filenamenew);
    
                    if(file_exists($user->avatar))
                    {
                        File::delete($user->avatar);
                    }
                    $user->avatar = $filenamepath;
                }
                $user->save();
                // dd($user->buyer->toArray());
                if($user->buyer != NULL)
                {
                    // dd(auth('buyer_api')->user()->buyer->toArray());
                    $buyer = Buyer::where('user_id',$user->id)->first();
                    if($request->has('company_name'))
                    {
                        $buyer->company_name = $request->company_name;
                    }
                    if($request->has('contact_person_name'))
                    {
                        $buyer->contact_person_name = $request->contact_person_name;
                    }
                    if($request->has('person_designation'))
                    {
                        $buyer->person_designation = $request->person_designation;
                    }
                    if($request->has('contact_number'))
                    {
                        $buyer->contact_number = $request->contact_number;
                    }
                    if($request->has('contact_email'))
                    {
                        $buyer->contact_email = $request->contact_email;
                    }
                    if($request->has('social_media'))
                    {
                        $buyer->social_media = $request->social_media;
                    }
                    if($request->has('website'))
                    {
                        $buyer->website = $request->website;
                    }
                    if($request->has('source'))
                    {
                        $buyer->source = $request->source;
                    }
                    if($request->has('billing_address'))
                    {
                        $buyer->address_one = $request->billing_address;
                    }
                    if($request->has('permanent_address'))
                    {
                        $buyer->address_two = $request->permanent_address;
                    }
                    if($request->has('address_three'))
                    {
                        $buyer->address_three = $request->address_three;
                    }
                    if($request->has('city'))
                    {
                        $buyer->city = $request->city;
                    }
                    if($request->has('state'))
                    {
                        $buyer->state = $request->state;
                    }
                    if($request->has('postal'))
                    {
                        $buyer->postal = $request->postal;
                    }
                    if($request->has('country'))
                    {
                        $buyer->country = $request->country;
                    }
                    if($request->has('short_description'))
                    {
                        $buyer->short_description = $request->short_description;
                    }
                    $buyer->save();
                }
                else
                {
                    $buyer = new Buyer();
                    $buyer->user_id = $user->id;
                    if($request->has('company_name'))
                    {
                        $buyer->company_name = $request->company_name;
                    }
                    if($request->has('contact_person_name'))
                    {
                        $buyer->contact_person_name = $request->contact_person_name;
                    }
                    if($request->has('person_designation'))
                    {
                        $buyer->person_designation = $request->person_designation;
                    }
                    if($request->has('contact_number'))
                    {
                        $buyer->contact_number = $request->contact_number;
                    }
                    if($request->has('contact_email'))
                    {
                        $buyer->contact_email = $request->contact_email;
                    }
                    if($request->has('social_media'))
                    {
                        $buyer->social_media = $request->social_media;
                    }
                    if($request->has('website'))
                    {
                        $buyer->website = $request->website;
                    }
                    if($request->has('source'))
                    {
                        $buyer->source = $request->source;
                    }
                    if($request->has('billing_address'))
                    {
                        $buyer->address_one = $request->billing_address;
                    }
                    if($request->has('permanent_address'))
                    {
                        $buyer->address_two = $request->permanent_address;
                    }
                    if($request->has('address_three'))
                    {
                        $buyer->address_three = $request->address_three;
                    }
                    if($request->has('city'))
                    {
                        $buyer->city = $request->city;
                    }
                    if($request->has('state'))
                    {
                        $buyer->state = $request->state;
                    }
                    if($request->has('postal'))
                    {
                        $buyer->postal = $request->postal;
                    }
                    if($request->has('country'))
                    {
                        $buyer->country = $request->country;
                    }
                    if($request->has('short_description'))
                    {
                        $buyer->short_description = $request->short_description;
                    }
                    $buyer->save();
    
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
    
    public function userlist(){
        $data = User::get();
        
        dd($data);
        
    }
}
