<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class AboutCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'about')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'about')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 125,
                'name' => 'about',
                'slug' => 'about',
                'display_name_singular' => 'About',
                'display_name_plural' => 'About',
                'icon' => 'info',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Pages\\AboutPageController',
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
                'created_at' => '2024-07-03T02:31:43.000000Z',
                'updated_at' => '2024-07-07T08:41:33.000000Z',
            ));

            Badaso::model('Permission')->generateFor('about');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/about')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'About',
                    'target' => '_self',
                    'icon_class' => 'info',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_about',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/about';
                $menu_item->title = 'About';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'info';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_about';
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
