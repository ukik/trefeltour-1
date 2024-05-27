<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TravelCartsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'travel_carts')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'travel_carts')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 111,
                'name' => 'travel_carts',
                'slug' => 'travel-carts',
                'display_name_singular' => 'Travel Keranjang',
                'display_name_plural' => 'Travel Keranjang',
                'icon' => 'shopping_cart',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Travels\\TravelCartsController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'is_maintenance' => 0,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => false,
                'created_at' => '2024-03-28T20:15:28.000000Z',
                'updated_at' => '2024-04-25T08:03:44.000000Z',
            ));

            Badaso::model('Permission')->generateFor('travel_carts');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/travel-carts')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Travel Keranjang',
                    'target' => '_self',
                    'icon_class' => 'shopping_cart',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_travel_carts',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/travel-carts';
                $menu_item->title = 'Travel Keranjang';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'shopping_cart';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_travel_carts';
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
