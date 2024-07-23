<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TourPricesCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'tour_prices')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'tour_prices')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'name' => 'tour_prices',
                'slug' => 'tour-prices',
                'display_name_singular' => 'Tour Harga',
                'display_name_plural' => 'Tour Harga',
                'icon' => 'add_shopping_cart',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Tours\\TourPricesController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => true,
                'updated_at' => '2024-07-21T18:24:25.000000Z',
                'created_at' => '2024-07-21T18:24:25.000000Z',
                'id' => 152,
            ));

            Badaso::model('Permission')->generateFor('tour_prices');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/tour-prices')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Tour Harga',
                    'target' => '_self',
                    'icon_class' => 'add_shopping_cart',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_tour_prices',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/tour-prices';
                $menu_item->title = 'Tour Harga';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'add_shopping_cart';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_tour_prices';
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
