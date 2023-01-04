<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Product;
use common\models\User;
use Illuminate\Http\Request;
use App\Models\NearbyProducts;
use App\Contracts\ProductContract;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    protected $productRepository;

    public function __construct(
        ProductContract $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function list(Request $request)
    {
        $user = $request->user();
        $userLang = $user->profile->lang;
        $userLat = $user->profile->lat;

        $product = $this->productRepository;
        $product->setLang($userLang)->setLat($userLat);


        return view('product/list', ['products' => $product->all()]);
    }
}
