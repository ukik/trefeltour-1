<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class SouvenirProductsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'souvenir_products')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'souvenir_products')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 70,
                'name' => 'souvenir_products',
                'slug' => 'souvenir-products',
                'display_name_singular' => 'Suvenir Produk',
                'display_name_plural' => 'Suvenir Produk',
                'icon' => 'inventory',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Souvenirs\\SouvenirProductsController',
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
                'created_at' => '2024-02-22T13:18:46.000000Z',
                'updated_at' => '2024-04-25T08:32:59.000000Z',
            ));

            Badaso::model('Permission')->generateFor('souvenir_products');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/souvenir-products')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Suvenir Produk',
                    'target' => '_self',
                    'icon_class' => 'inventory',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_souvenir_products',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/souvenir-products';
                $menu_item->title = 'Suvenir Produk';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'inventory';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_souvenir_products';
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
