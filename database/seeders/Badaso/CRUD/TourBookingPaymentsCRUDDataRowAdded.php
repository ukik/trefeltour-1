<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class TourBookingPaymentsCRUDDataRowAdded extends Seeder
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

            $data_type = Badaso::model('DataType')::where('name', 'tour_booking_payments')->first();

            \DB::table('badaso_data_rows')->insert(array (
                0 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'id',
                    'type' => 'number',
                    'display_name' => 'Id',
                    'required' => '1',
                    'browse' => '0',
                    'read' => '0',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '1',
                ),
                1 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'uuid',
                    'type' => 'text',
                    'display_name' => 'Uuid',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '2',
                ),
                2 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'booking_id',
                    'type' => 'number',
                    'display_name' => 'Booking Id',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '3',
                ),
                3 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'booking_uuid',
                    'type' => 'text',
                    'display_name' => 'Booking Uuid',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '4',
                ),
                4 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'booking_item_id',
                    'type' => 'number',
                    'display_name' => 'Booking Item Id',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '5',
                ),
                5 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'order_id',
                    'type' => 'text',
                    'display_name' => 'Order Id',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '6',
                ),
                6 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'store_id',
                    'type' => 'number',
                    'display_name' => 'Store Id',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '7',
                ),
                7 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'product_id',
                    'type' => 'number',
                    'display_name' => 'Product Id',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '8',
                ),
                8 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'customer_id',
                    'type' => 'number',
                    'display_name' => 'Customer Id',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '9',
                ),
                9 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'quantity_sum',
                    'type' => 'number',
                    'display_name' => 'Quantity Sum',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '10',
                ),
                10 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'coupon',
                    'type' => 'number',
                    'display_name' => 'Coupon',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '11',
                ),
                11 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'gross_amount',
                    'type' => 'number',
                    'display_name' => 'Gross Amount',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '12',
                ),
                12 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'dibayar',
                    'type' => 'text',
                    'display_name' => 'Dibayar',
                    'required' => '1',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '13',
                ),
                13 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'status',
                    'type' => 'text',
                    'display_name' => 'Status',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '14',
                ),
                14 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'first_name',
                    'type' => 'text',
                    'display_name' => 'First Name',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '15',
                ),
                15 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'email',
                    'type' => 'text',
                    'display_name' => 'Email',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '16',
                ),
                16 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'phone',
                    'type' => 'text',
                    'display_name' => 'Phone',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '17',
                ),
                17 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'snap_token',
                    'type' => 'text',
                    'display_name' => 'Snap Token',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '18',
                ),
                18 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'code_table',
                    'type' => 'text',
                    'display_name' => 'Code Table',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '19',
                ),
                19 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'created_at',
                    'type' => 'datetime',
                    'display_name' => 'Created At',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '20',
                ),
                20 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'updated_at',
                    'type' => 'datetime',
                    'display_name' => 'Updated At',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '21',
                ),
                21 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'deleted_at',
                    'type' => 'datetime',
                    'display_name' => 'Deleted At',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '22',
                ),
            ));

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

            throw new Exception('exception occur ' . $e);
        }
    }
}

