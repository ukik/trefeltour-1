<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TourBookingItemsCRUDDataTypeAdded extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
        \DB::beginTransaction();

        try {

            $data_type = Badaso::model('DataType')->where('name', 'tour_booking_items')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'tour_booking_items')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'name' => 'tour_booking_items',
                'slug' => 'tour-booking-items',
                'display_name_singular' => 'Tour Booking Item',
                'display_name_plural' => 'Tour Booking Item',
                'icon' => 'shopping_basket',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Tours\\TourBookingsItemsController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => true,
                'updated_at' => '2024-07-21T11:24:31.000000Z',
                'created_at' => '2024-07-21T11:24:31.000000Z',
                'id' => 147,
            ));

            Badaso::model('Permission')->generateFor('tour_booking_items');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/tour-booking-items')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Tour Booking Item',
                    'target' => '_self',
                    'icon_class' => 'shopping_basket',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_tour_booking_items',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/tour-booking-items';
                $menu_item->title = 'Tour Booking Item';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'shopping_basket';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_tour_booking_items';
                $menu_item->order = $order;
                $menu_item->save();
            }

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

           throw new Exception('Exception occur ' . $e);
        }
    }
}
