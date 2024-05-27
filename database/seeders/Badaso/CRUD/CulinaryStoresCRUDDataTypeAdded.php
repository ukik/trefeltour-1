<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class CulinaryStoresCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'culinary_stores')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'culinary_stores')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 89,
                'name' => 'culinary_stores',
                'slug' => 'culinary-stores',
                'display_name_singular' => 'Kuliner Toko',
                'display_name_plural' => 'Kuliner Toko',
                'icon' => 'storefront',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Culinarys\\CulinaryStoresController',
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
                'created_at' => '2024-03-13T13:15:50.000000Z',
                'updated_at' => '2024-04-25T08:43:13.000000Z',
            ));

            Badaso::model('Permission')->generateFor('culinary_stores');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/culinary-stores')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Kuliner Toko',
                    'target' => '_self',
                    'icon_class' => 'storefront',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_culinary_stores',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/culinary-stores';
                $menu_item->title = 'Kuliner Toko';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'storefront';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_culinary_stores';
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
