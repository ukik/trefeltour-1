<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TalentBookingItemsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'talent_booking_items')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'talent_booking_items')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 102,
                'name' => 'talent_booking_items',
                'slug' => 'talent-booking-items',
                'display_name_singular' => 'Talent Booking Item',
                'display_name_plural' => 'Talent Booking Item',
                'icon' => 'shopping_basket',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Talents\\TalentBookingsItemsController',
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
                'created_at' => '2024-03-22T16:48:04.000000Z',
                'updated_at' => '2024-04-25T09:29:33.000000Z',
            ));

            Badaso::model('Permission')->generateFor('talent_booking_items');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/talent-booking-items')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Talent Booking Item',
                    'target' => '_self',
                    'icon_class' => 'shopping_basket',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_talent_booking_items',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/talent-booking-items';
                $menu_item->title = 'Talent Booking Item';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'shopping_basket';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_talent_booking_items';
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
