<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TourPaymentsValidationsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'tour_payments_validations')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'tour_payments_validations')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'name' => 'tour_payments_validations',
                'slug' => 'tour-payments-validations',
                'display_name_singular' => 'Tour Pembayaran Validasi',
                'display_name_plural' => 'Tour Pembayaran Validasi',
                'icon' => 'card_membership',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Tours\\TourPaymentsValidationsController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => true,
                'updated_at' => '2024-07-21T18:15:43.000000Z',
                'created_at' => '2024-07-21T18:15:43.000000Z',
                'id' => 151,
            ));

            Badaso::model('Permission')->generateFor('tour_payments_validations');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/tour-payments-validations')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Tour Pembayaran Validasi',
                    'target' => '_self',
                    'icon_class' => 'card_membership',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_tour_payments_validations',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/tour-payments-validations';
                $menu_item->title = 'Tour Pembayaran Validasi';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'card_membership';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_tour_payments_validations';
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
