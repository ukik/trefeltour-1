<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class SouvenirBookingsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'souvenir_bookings')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'souvenir_bookings')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 73,
                'name' => 'souvenir_bookings',
                'slug' => 'souvenir-bookings',
                'display_name_singular' => 'Suvenir Booking',
                'display_name_plural' => 'Suvenir Booking',
                'icon' => 'local_mall',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Souvenirs\\SouvenirBookingsController',
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
                'created_at' => '2024-02-22T13:27:51.000000Z',
                'updated_at' => '2024-04-25T08:31:35.000000Z',
            ));

            Badaso::model('Permission')->generateFor('souvenir_bookings');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/souvenir-bookings')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Suvenir Booking',
                    'target' => '_self',
                    'icon_class' => 'local_mall',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_souvenir_bookings',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/souvenir-bookings';
                $menu_item->title = 'Suvenir Booking';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'local_mall';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_souvenir_bookings';
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
