<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class LodgePaymentsValidationsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'lodge_payments_validations')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'lodge_payments_validations')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 85,
                'name' => 'lodge_payments_validations',
                'slug' => 'lodge-payments-validations',
                'display_name_singular' => 'Hotel Pembayaran Validasi',
                'display_name_plural' => 'Hotel Pembayaran Validasi',
                'icon' => 'card_membership',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Lodges\\LodgePaymentsValidationsController',
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
                'created_at' => '2024-03-03T13:56:01.000000Z',
                'updated_at' => '2024-04-25T08:36:43.000000Z',
            ));

            Badaso::model('Permission')->generateFor('lodge_payments_validations');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/lodge-payments-validations')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Hotel Pembayaran Validasi',
                    'target' => '_self',
                    'icon_class' => 'card_membership',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_lodge_payments_validations',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/lodge-payments-validations';
                $menu_item->title = 'Hotel Pembayaran Validasi';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'card_membership';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_lodge_payments_validations';
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
