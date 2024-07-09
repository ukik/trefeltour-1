<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class PageWidgetCounterCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'page_widget_counter')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'page_widget_counter')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 141,
                'name' => 'page_widget_counter',
                'slug' => 'page-widget-counter',
                'display_name_singular' => 'Page Widget Counter',
                'display_name_plural' => 'Page Widget Counter',
                'icon' => NULL,
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Pages\\WidgetCounterPageController',
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
                'created_at' => '2024-07-08T17:22:51.000000Z',
                'updated_at' => '2024-07-08T17:31:58.000000Z',
            ));

            Badaso::model('Permission')->generateFor('page_widget_counter');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/page-widget-counter')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Page Widget Counter',
                    'target' => '_self',
                    'icon_class' => '',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_page_widget_counter',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/page-widget-counter';
                $menu_item->title = 'Page Widget Counter';
                $menu_item->target = '_self';
                $menu_item->icon_class = '';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_page_widget_counter';
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
