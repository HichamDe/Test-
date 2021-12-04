<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    // Random REsult
    public function search(Request $req){

        $query = Product::query();

        if($s = $req->input('s')){

            $price_sort = $req->price_sort;

            $query->whereRaw("product_name LIKE '%" . $s . "%'")
            ->whereRaw("product_price LIKE '%" . $price_sort . "%'");

        }

        return $query->get();

        // $data = $query->get();
        // echo "<script>console.log(" . response()->json(["data" => $data]) .");</script>";
        // echo response()->json(["data" => $data]);
    }

    public function cetagorys(Request $req){

        $query = Product::query();
        if($cetagory = $req->input('cetagory')){

            $query->whereRaw("cetagory LIKE '%" . $cetagory . "%'");

        }

        return $query->get();

    }
}
