<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Zona;
use App\Models\Kota;
use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Inventaris;
use App\Models\Banner;

//Controller Untuk Get Data Kota dan Zona
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getBanner(Request $request)
    {


            $banner = Banner::select('id', 'foto_banner')->get();

        return ResponseFormatter::success($banner, "Success Get Banner");
    }
}
