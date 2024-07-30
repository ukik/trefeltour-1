<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class LodgeFacilityCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'lodge_facility')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'lodge_facility')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'name' => 'lodge_facility',
                'slug' => 'lodge-facility',
                'display_name_singular' => 'Hotel Fasilitas',
                'display_name_plural' => 'Hotel Fasilitas',
                'icon' => 'room_service',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Lodges\\LodgeFacilityController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => true,
                'updated_at' => '2024-07-29T15:15:13.000000Z',
                'created_at' => '2024-07-29T15:15:13.000000Z',
                'id' => 158,
            ));

            Badaso::model('Permission')->generateFor('lodge_facility');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/lodge-facility')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Hotel Fasilitas',
                    'target' => '_self',
                    'icon_class' => 'room_service',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_lodge_facility',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/lodge-facility';
                $menu_item->title = 'Hotel Fasilitas';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'room_service';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_lodge_facility';
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
