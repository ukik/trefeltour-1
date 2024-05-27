<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class TalentPaymentsCRUDDataRowAdded extends Seeder
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

            $data_type = Badaso::model('DataType')::where('name', 'talent_payments')->first();

            \DB::table('badaso_data_rows')->insert(array (
                0 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'id',
                    'type' => 'number',
                    'display_name' => 'No',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 1,
                ),
                1 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'uuid',
                    'type' => 'text',
                    'display_name' => 'UUID',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 2,
                ),
                2 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'booking_id',
                    'type' => 'relation',
                'display_name' => 'Booking (UUID)',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => '{"relation_type":"belongs_to","destination_table":"talent_bookings","destination_table_column":"id","destination_table_display_column":"uuid","destination_table_display_more_column":["id","uuid"]}',
                    'order' => 3,
                ),
                3 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'customer_id',
                    'type' => 'relation',
                    'display_name' => 'Customer',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => '{"relation_type":"belongs_to","destination_table":"badaso_users","destination_table_column":"id","destination_table_display_column":"name","destination_table_display_more_column":["id","name"]}',
                    'order' => 4,
                ),
                4 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'total_amount',
                    'type' => 'number',
                'display_name' => 'Total Price (Rp) - Jasa',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 5,
                ),
                5 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'code_transaction',
                    'type' => 'text',
                    'display_name' => 'Kode Transaksi',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 6,
                ),
                6 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'method',
                    'type' => 'select',
                    'display_name' => 'Metode Transfer',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{
"size": 12,
"items": [
{
"label": "Tunai",
"value": "tunai"
},
{
"label": "Bank Transfer",
"value": "bank transfer"
},
{
"label": "E-Wallet",
"value": "e-wallet"
},
{
"label": "Qris",
"value": "qris"
},
{
"label": "Lainnya",
"value": "lainnya"
}
]
}',
                    'relation' => NULL,
                    'order' => 7,
                ),
                7 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'date',
                    'type' => 'date',
                    'display_name' => 'Tanggal Transfer',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 8,
                ),
                8 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'status',
                    'type' => 'select',
                    'display_name' => 'Status Transfer',
                    'required' => 1,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{
"size": 12,
"items": [
{
"label": "Pending",
"value": "pending"
},
{
"label": "Sukses",
"value": "success"
}
]
}',
                    'relation' => NULL,
                    'order' => 9,
                ),
                9 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'receipt',
                    'type' => 'upload_image',
                    'display_name' => 'Bukti Lunas',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 0,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 10,
                ),
                10 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'description',
                    'type' => 'textarea',
                    'display_name' => 'Catatan',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 11,
                ),
                11 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'is_selected',
                    'type' => 'text',
                    'display_name' => 'Proses Pembayaran',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 12,
                ),
                12 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'code_table',
                    'type' => 'text',
                    'display_name' => 'Nama Tabel',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 0,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 13,
                ),
                13 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'created_at',
                    'type' => 'datetime',
                    'display_name' => 'Dibuat Pada',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 14,
                ),
                14 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'updated_at',
                    'type' => 'datetime',
                    'display_name' => 'Diubah Pada',
                    'required' => 0,
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 15,
                ),
                15 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'deleted_at',
                    'type' => 'datetime',
                    'display_name' => 'Dihapus Pada',
                    'required' => 0,
                    'browse' => 0,
                    'read' => 1,
                    'edit' => 0,
                    'add' => 0,
                    'delete' => 1,
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => 16,
                ),
            ));

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

            throw new Exception('exception occur ' . $e);
        }
    }
}

