<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class CulinaryPricesCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'culinary_prices')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'culinary_prices')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 91,
                'name' => 'culinary_prices',
                'slug' => 'culinary-prices',
                'display_name_singular' => 'Kuliner Harga',
                'display_name_plural' => 'Kuliner Harga',
                'icon' => 'add_shopping_cart',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Culinarys\\CulinaryPricesController',
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
                'created_at' => '2024-03-14T05:45:09.000000Z',
                'updated_at' => '2024-04-25T08:43:03.000000Z',
            ));

            Badaso::model('Permission')->generateFor('culinary_prices');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/culinary-prices')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Kuliner Harga',
                    'target' => '_self',
                    'icon_class' => 'add_shopping_cart',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_culinary_prices',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/culinary-prices';
                $menu_item->title = 'Kuliner Harga';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'add_shopping_cart';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_culinary_prices';
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
