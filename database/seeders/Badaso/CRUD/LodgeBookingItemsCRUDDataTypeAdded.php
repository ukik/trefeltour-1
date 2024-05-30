<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class LodgeBookingItemsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'lodge_booking_items')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'lodge_booking_items')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 83,
                'name' => 'lodge_booking_items',
                'slug' => 'lodge-booking-items',
                'display_name_singular' => 'Hotel Booking Item',
                'display_name_plural' => 'Hotel Booking Item',
                'icon' => 'shopping_basket',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Lodges\\LodgeBookingsItemsController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'is_maintenance' => 0,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => 1,
                'created_at' => '2024-03-03T13:44:15.000000Z',
                'updated_at' => '2024-04-25T08:35:41.000000Z',
            ));

            Badaso::model('Permission')->generateFor('lodge_booking_items');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/lodge-booking-items')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Hotel Booking Item',
                    'target' => '_self',
                    'icon_class' => 'shopping_basket',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_lodge_booking_items',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/lodge-booking-items';
                $menu_item->title = 'Hotel Booking Item';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'shopping_basket';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_lodge_booking_items';
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