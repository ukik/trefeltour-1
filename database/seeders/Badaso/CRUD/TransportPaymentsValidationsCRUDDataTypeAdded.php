<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TransportPaymentsValidationsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'transport_payments_validations')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'transport_payments_validations')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 42,
                'name' => 'transport_payments_validations',
                'slug' => 'transport-payments-validations',
                'display_name_singular' => 'Rental Pembayaran Validasi',
                'display_name_plural' => 'Rental Pembayaran Validasi',
                'icon' => 'card_membership',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Transports\\TransportPaymentsValidationsController',
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
                'created_at' => '2024-01-31T04:11:21.000000Z',
                'updated_at' => '2024-04-25T08:08:48.000000Z',
            ));

            Badaso::model('Permission')->generateFor('transport_payments_validations');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/transport-payments-validations')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Rental Pembayaran Validasi',
                    'target' => '_self',
                    'icon_class' => 'card_membership',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_transport_payments_validations',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/transport-payments-validations';
                $menu_item->title = 'Rental Pembayaran Validasi';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'card_membership';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_transport_payments_validations';
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
