<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TourStoresCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'tour_stores')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'tour_stores')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 154,
                'name' => 'tour_stores',
                'slug' => 'tour-stores',
                'display_name_singular' => 'Tour Vendor',
                'display_name_plural' => 'Tour Vendor',
                'icon' => 'explore',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Tours\\TourStoresController',
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
                'created_at' => '2024-07-21T18:47:30.000000Z',
                'updated_at' => '2024-07-29T03:20:57.000000Z',
            ));

            Badaso::model('Permission')->generateFor('tour_stores');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/tour-stores')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Tour Vendor',
                    'target' => '_self',
                    'icon_class' => 'explore',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_tour_stores',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/tour-stores';
                $menu_item->title = 'Tour Vendor';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'explore';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_tour_stores';
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
