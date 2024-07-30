<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TourProductsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'tour_products')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'tour_products')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 153,
                'name' => 'tour_products',
                'slug' => 'tour-products',
                'display_name_singular' => 'Tour Paket',
                'display_name_plural' => 'Tour Paket',
                'icon' => 'business_center',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Tours\\TourProductsController',
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
                'created_at' => '2024-07-21T18:38:43.000000Z',
                'updated_at' => '2024-07-29T03:21:45.000000Z',
            ));

            Badaso::model('Permission')->generateFor('tour_products');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/tour-products')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Tour Paket',
                    'target' => '_self',
                    'icon_class' => 'business_center',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_tour_products',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/tour-products';
                $menu_item->title = 'Tour Paket';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'business_center';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_tour_products';
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
