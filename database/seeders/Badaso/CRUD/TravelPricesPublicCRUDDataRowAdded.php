<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class TravelPricesPublicCRUDDataRowAdded extends Seeder
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

            $data_type = Badaso::model('DataType')::where('name', 'travel_prices_public')->first();

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
                    'order' => '3',
                ),
                3 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'name',
                    'type' => 'text',
                    'display_name' => 'Name',
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
                    'field' => 'general_price',
                    'type' => 'number',
                    'display_name' => 'General Price',
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
                    'field' => 'discount_price',
                    'type' => 'number',
                    'display_name' => 'Discount Price',
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
                    'field' => 'cashback_price',
                    'type' => 'number',
                    'display_name' => 'Cashback Price',
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
                    'field' => 'description',
                    'type' => 'textarea',
                    'display_name' => 'Description',
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
                    'field' => 'code_ticket',
                    'type' => 'text',
                    'display_name' => 'Code Ticket',
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
                    'field' => 'seat_count',
                    'type' => 'text',
                    'display_name' => 'Seat Count',
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
                    'field' => 'image',
                    'type' => 'textarea',
                    'display_name' => 'Image',
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
                    'field' => 'ticket_status',
                    'type' => 'select',
                    'display_name' => 'Ticket Status',
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
                    'field' => 'route',
                    'type' => 'text',
                    'display_name' => 'Route',
                    'required' => '0',
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
                    'field' => 'quantity',
                    'type' => 'number',
                    'display_name' => 'Quantity',
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
                    'order' => '15',
                ),
                15 => 
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
                    'order' => '16',
                ),
                16 => 
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
                    'order' => '17',
                ),
                17 => 
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
                    'order' => '18',
                ),
                18 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'category',
                    'type' => 'select',
                    'display_name' => 'Category',
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
            ));

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

            throw new Exception('exception occur ' . $e);
        }
    }
}

