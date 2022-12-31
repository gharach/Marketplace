<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Product;
use common\models\User;
use Illuminate\Http\Request;
use App\Models\NearbyProducts;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $user = $request->user();
        $userLang = $user->profile->lang;
        $userLat = $user->profile->lat;

        $product = new Product();
        //$product->setLang($userLang)->setLat($userLat);


        return view('product/list',['products'=>$product->all()]);
    }
}
