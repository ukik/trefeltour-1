<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TourCartsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'tour_carts')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'tour_carts')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 149,
                'name' => 'tour_carts',
                'slug' => 'tour-carts',
                'display_name_singular' => 'Tour Keranjang',
                'display_name_plural' => 'Tour Keranjang',
                'icon' => 'shopping_cart',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Tours\\TourCartsController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'is_maintenance' => '0',
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => '1',
                'created_at' => '2024-07-21T17:32:55.000000Z',
                'updated_at' => '2024-07-21T19:08:30.000000Z',
            ));

            Badaso::model('Permission')->generateFor('tour_carts');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/tour-carts')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Tour Keranjang',
                    'target' => '_self',
                    'icon_class' => 'shopping_cart',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_tour_carts',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/tour-carts';
                $menu_item->title = 'Tour Keranjang';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'shopping_cart';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_tour_carts';
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
