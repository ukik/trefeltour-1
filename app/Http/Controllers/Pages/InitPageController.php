<?php

namespace App\Http\Controllers\Pages;

use AboutPageModel;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Badaso\Controller;
use ContactPageModel;
use ContactSetupPageModel;
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
use InfoPageModel;
use LodgeProfiles;
use SouvenirProducts;
use TalentProfiles;
use TestimonialPageModel;
use TourismVenues;
use TransportVehicles;
use WidgetCallPageModel;
use WidgetCounterPageModel;
use WidgetOfferPageModel;
use WidgetPromoPageModel;
use WidgetTronPageModel;

class InitPageController extends Controller
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

            $footer_about = AboutPageModel::first();
            $footer_contact = ContactSetupPageModel::first();

            $footer_transport = TransportVehicles::inRandomOrder()
            ->with([
                'ratingAvg',
            ])->orderBy('id','desc')
            ->withCount('transportPrices')
            ->whereHas('transportPrices')
            ->paginate(2);

            $footer_gallery = GalleryPageModel::inRandomOrder()->first();

            $footer_info = InfoPageModel::whereIn('type',['kebijakan-privasi','syarat-ketentuan'])
            ->where('lang','id')
            ->select('id','title','slug','type','lang')
            ->get();

            $page_widget_call = WidgetCallPageModel::inRandomOrder()->first();
            $page_widget_counter = WidgetCounterPageModel::inRandomOrder()->first();
            $page_widget_offer = WidgetOfferPageModel::inRandomOrder()->first();
            $page_widget_promo = WidgetPromoPageModel::inRandomOrder()->paginate();
            $page_widget_tron = WidgetTronPageModel::inRandomOrder()->paginate();


            $data = [
                'footer_transport' => $footer_transport,
                'footer_about' => $footer_about,
                'footer_contact' => $footer_contact,
                'footer_gallery' => $footer_gallery,
                'footer_info' => $footer_info,

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
