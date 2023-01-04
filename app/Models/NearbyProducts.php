<?php

namespace App\Models;


use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class NearbyProducts extends ProductRepository
{

    private $lat;
    private $lang;
    protected $table = 'products';

    public function listProducts()
    {

        $storeIds = Store::select('id')
            ->Where(DB::raw("lat + radius "), ">", $this->lat)
            ->Where(DB::raw("lat - radius "), "<", $this->lat)
            ->Where(DB::raw("lang + radius "), ">", $this->lang)
            ->Where(DB::raw("lang - radius "), "<", $this->lang)
            ->pluck('id')->toArray();
        return Self::whereIn('store_id', $storeIds)->get();

    }

    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }


}
