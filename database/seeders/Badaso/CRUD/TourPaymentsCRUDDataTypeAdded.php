<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class TourPaymentsCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'tour_payments')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'tour_payments')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'name' => 'tour_payments',
                'slug' => 'tour-payments',
                'display_name_singular' => 'Tour Pembayaran',
                'display_name_plural' => 'Tour Pembayaran',
                'icon' => 'credit_card',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Tours\\TourPaymentsController',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => true,
                'updated_at' => '2024-07-21T17:40:12.000000Z',
                'created_at' => '2024-07-21T17:40:12.000000Z',
                'id' => 150,
            ));

            Badaso::model('Permission')->generateFor('tour_payments');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/tour-payments')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Tour Pembayaran',
                    'target' => '_self',
                    'icon_class' => 'credit_card',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_tour_payments',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/tour-payments';
                $menu_item->title = 'Tour Pembayaran';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'credit_card';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_tour_payments';
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
