<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class PageWidgetTronCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'page_widget_tron')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'page_widget_tron')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 144,
                'name' => 'page_widget_tron',
                'slug' => 'page-widget-tron',
                'display_name_singular' => 'Page Widget Tron',
                'display_name_plural' => 'Page Widget Tron',
                'icon' => NULL,
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Pages\\WidgetTronPageController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'is_maintenance' => '0',
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => false,
                'created_at' => '2024-07-08T17:27:40.000000Z',
                'updated_at' => '2024-07-08T17:36:22.000000Z',
            ));

            Badaso::model('Permission')->generateFor('page_widget_tron');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/page-widget-tron')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Page Widget Tron',
                    'target' => '_self',
                    'icon_class' => '',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_page_widget_tron',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/page-widget-tron';
                $menu_item->title = 'Page Widget Tron';
                $menu_item->target = '_self';
                $menu_item->icon_class = '';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_page_widget_tron';
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
