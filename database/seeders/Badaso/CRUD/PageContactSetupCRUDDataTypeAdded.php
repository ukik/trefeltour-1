<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class PageContactSetupCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'page_contact_setup')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'page_contact_setup')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 130,
                'name' => 'page_contact_setup',
                'slug' => 'page-contact-setup',
                'display_name_singular' => 'Page Contact Setup',
                'display_name_plural' => 'Page Contact Setup',
                'icon' => NULL,
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Pages\\ContactSetupPageController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'is_maintenance' => '0',
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => '0',
                'created_at' => '2024-07-05T06:43:00.000000Z',
                'updated_at' => '2024-09-19T15:39:16.000000Z',
            ));

            Badaso::model('Permission')->generateFor('page_contact_setup');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/page-contact-setup')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Page Contact Setup',
                    'target' => '_self',
                    'icon_class' => '',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_page_contact_setup',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/page-contact-setup';
                $menu_item->title = 'Page Contact Setup';
                $menu_item->target = '_self';
                $menu_item->icon_class = '';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_page_contact_setup';
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
