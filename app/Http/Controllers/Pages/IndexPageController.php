<?php

namespace App\Http\Controllers\Pages;

use AboutPageModel;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Badaso\Controller;
use CulinaryProducts;
use DestinationPageModel;
// use App\Http\Controllers\Controller;
use Exception;
use GalleryPageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Uasoft\Badaso\Helpers\ApiResponse;
use Uasoft\Badaso\Helpers\Firebase\FCMNotification;
use Uasoft\Badaso\Helpers\GetData;
use Uasoft\Badaso\Models\DataType;
use Illuminate\Support\Facades\Auth;
use LodgeProfiles;
use SouvenirProducts;
use TalentProfiles;
use TestimonialPageModel;
use TourismVenues;
use TourPrices;
use TourProducts;
use TourStores;
use TransportVehicles;
use WidgetCallPageModel;
use WidgetCounterPageModel;
use WidgetOfferPageModel;
use WidgetPromoPageModel;
use WidgetTronPageModel;

class IndexPageController extends Controller
{

    public $isLogged;
    public $isRole;

    public function __construct()
    {

        // if (Auth::check()) {

        //     $this->isLogged = true;

        //     foreach (Auth::user()->roles as $key => $value) {
        //         $role = $value->name;
        //     }

        //     $this->isRole = $role;
        // } else {
        //     return ApiResponse::unauthorized();
        // }
    }

    public function index(Request $request)
    {
        try {

            $destination = DestinationPageModel::inRandomOrder()->limit(6)->get();

            $gallery = GalleryPageModel::inRandomOrder()->limit(1)->first();

            $testimonial = TestimonialPageModel::inRandomOrder()->paginate(6*3);

            // $tour_store = TourStores::inRandomOrder()->with([
            //     'ratingAvg',
            // ])->orderBy('id','desc')
            // ->withCount('tourProducts')
            // // ->whereHas('lodgeRooms')
            // ->paginate(5);

            $tour_price = TourPrices::inRandomOrder()->with([
                // 'ratingAvg',
                'tourProduct' => function($q) {
                    return $q->select('id','name','slug','category','durasi','image','province');
                },
                'tourStore' => function($q) {
                    return $q->select('id','name','slug');
                },
                // 'tourStore',
                // 'tourProduct',
            ])->orderBy('id','desc')
            // ->withCount('tourProducts')
            // ->whereHas('lodgeRooms')
            ->paginate(6);

            // $tour = TourProducts::inRandomOrder()->with([
            //     // 'ratingAvg',
            // ])->orderBy('id','desc')
            // // ->withCount('tourProducts')
            // // ->whereHas('lodgeRooms')
            // ->paginate(6);

            // $lodge = LodgeProfiles::inRandomOrder()->with([
            //     'ratingAvg',
            // ])->orderBy('id','desc')
            // ->withCount('lodgeRooms')
            // // ->whereHas('lodgeRooms')
            // ->paginate(5);

            // $culinary = CulinaryProducts::inRandomOrder()->with([
            //     'ratingAvg',
            // ])->orderBy('id','desc')
            // ->withCount('culinaryPrices')
            // ->whereHas('culinaryPrices')
            // ->paginate(6);

            $souvenir = SouvenirProducts::inRandomOrder()->with([
                'ratingAvg',
            ])->orderBy('id','desc')
            ->withCount('souvenirPrices')
            ->whereHas('souvenirPrices')
            ->paginate(6);

            $tourism = TourismVenues::inRandomOrder()
            ->with([
                'ratingAvg',
            ])->orderBy('id','desc')
            ->withCount('tourismFacilities')
            ->whereHas('tourismFacilities')
            ->paginate(4);

            $talent = TalentProfiles::inRandomOrder()
            ->with([
                'ratingAvg',
            ])->orderBy('id','desc')
            ->withCount('talentSkills')
            ->whereHas('talentSkills')
            ->paginate(4);

            $transport = TransportVehicles::inRandomOrder()
            ->with([
                'ratingAvg',
            ])->orderBy('id','desc')
            ->withCount('transportPrices')
            ->whereHas('transportPrices')
            ->paginate(6);

            $page_widget_call = WidgetCallPageModel::inRandomOrder()->paginate(1);
            $page_widget_counter = WidgetCounterPageModel::inRandomOrder()->paginate(1);
            $page_widget_offer = WidgetOfferPageModel::inRandomOrder()->paginate(1);
            $page_widget_promo = WidgetPromoPageModel::inRandomOrder()->paginate();
            $page_widget_tron = WidgetTronPageModel::inRandomOrder()->paginate();

            // tour_products_category
            // tour_products_city
            // tour_products_country
            // tour_products_durasi
            // tour_products_level
            // tour_products_province
            $tour_products_category = DB::table('tour_products_category')->paginate();
            // $tour_products_city = DB::table('tour_products_city')->paginate();
            $tour_products_province = DB::table('tour_products_province')->paginate();
            $tour_products_durasi = DB::table('tour_products_durasi')->paginate();
            $tour_products_level = DB::table('tour_products_level')->paginate();

            $data = [
                'destination' => $destination,
                'gallery' => $gallery,
                'testimonial' => $testimonial,

                // 'tour_store' => $tour_store,
                'tour_price' => $tour_price,
                'tour_products_category' => $tour_products_category,
                // 'tour_products_city' => $tour_products_city,
                'tour_products_province' => $tour_products_province,
                'tour_products_durasi' => $tour_products_durasi,
                'tour_products_level' => $tour_products_level,


                // 'tour' => $tour,
                // 'lodge' => $lodge,
                // 'culinary' => $culinary,
                'souvenir' => $souvenir,
                'tourism' => $tourism,
                'talent' => $talent,
                'transport' => $transport,

                'page_widget_call' => $page_widget_call,
                'page_widget_counter' => $page_widget_counter,
                'page_widget_offer' => $page_widget_offer,
                'page_widget_promo' => $page_widget_promo,
                'page_widget_tron' => $page_widget_tron,
            ];

            return ApiResponse::onlyEntity($data);
        } catch (Exception $e) {
            return ApiResponse::failed($e);
        }
    }
}
