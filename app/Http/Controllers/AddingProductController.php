<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AddingProductController extends Controller
{
    public function addingProduct(Request $req){




        if($req->hasFile('hh') == true)
        {

            $newProduct = new Product();

            $newProduct->product_name = $req->product_name;
            $newProduct->product_price = $req->product_price;
            $newProduct->description = $req->description;
            $newProduct->cetagory = $req->cetagory;
            $newProduct->img = $req->file('hh')->store('images' , "public");
            $newProduct->save();

            return redirect('add-product')->with('status' , "Product Added!");
            

        }else{

            return redirect('add-product')->with('status', 'Something Went Wrong');

        }

    }
}
