<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class TourProductsCRUDDataRowAdded extends Seeder
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

            $data_type = Badaso::model('DataType')::where('name', 'tour_products')->first();

            \DB::table('badaso_data_rows')->insert(array (
                0 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'id',
                    'type' => 'number',
                    'display_name' => 'No',
                    'required' => '1',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '1',
                ),
                1 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'uuid',
                    'type' => 'text',
                    'display_name' => 'UUID',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '2',
                ),
                2 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'store_id',
                    'type' => 'relation',
                    'display_name' => 'Toko',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => '{"relation_type":"belongs_to","destination_table":"tour_stores","destination_table_column":"id","destination_table_display_column":"name","destination_table_display_more_column":["id","uuid","name"]}',
                    'order' => '3',
                ),
                3 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'name',
                    'type' => 'text',
                    'display_name' => 'Nama Paket',
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
                    'field' => 'category',
                    'type' => 'select',
                    'display_name' => 'Kategori',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{
"size": 12,
"items": [
{
"label": "corporate gathering",
"value": "corporate gathering"
},
{
"label": "outbound package",
"value": "outbound package"
},
{
"label": "meeting package",
"value": "meeting package"
},
{
"label": "honeymoon package",
"value": "honeymoon package"
},
{
"label": "study tour",
"value": "study tour"
},
{
"label": "family tour",
"value": "family tour"
},
{
"label": "reguler tour",
"value": "reguler tour"
},
{
"label": "religi tour",
"value": "religi tour"
},
{
"label": "open trip",
"value": "open trip"
},
{
"label": "umroh",
"value": "umroh"
}
]
}',
                    'relation' => NULL,
                    'order' => '5',
                ),
                5 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'durasi',
                    'type' => 'select',
                    'display_name' => 'Durasi',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{
"size": 12,
"items": [
{
"label": "1 hari",
"value": "1 hari"
},
{
"label": "2 hari 1 malam",
"value": "2 hari 1 malam"
},
{
"label": "3 hari 2 malam",
"value": "3 hari 2 malam"
},
{
"label": "4 hari 3 malam",
"value": "4 hari 3 malam"
},
{
"label": "5 hari 4 malam",
"value": "5 hari 4 malam"
},
{
"label": "6 hari 5 malam",
"value": "6 hari 5 malam"
},
{
"label": "7 hari 6 malam",
"value": "7 hari 6 malam"
},
{
"label": "8 hari 7 malam",
"value": "8 hari 7 malam"
},
{
"label": "9 hari 8 malam",
"value": "9 hari 8 malam"
},
{
"label": "10 hari 9 malam",
"value": "10 hari 9 malam"
}
]
}',
                    'relation' => NULL,
                    'order' => '6',
                ),
                6 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'description',
                    'type' => 'editor',
                    'display_name' => 'Deskripsi',
                    'required' => '0',
                    'browse' => '0',
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
                    'field' => 'itinerary',
                    'type' => 'editor',
                    'display_name' => 'Itinerary',
                    'required' => '0',
                    'browse' => '0',
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
                    'field' => 'facility',
                    'type' => 'editor',
                    'display_name' => 'Facility',
                    'required' => '0',
                    'browse' => '0',
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
                    'field' => 'image',
                    'type' => 'upload_image_multiple',
                    'display_name' => 'Gambar Paket',
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
                    'field' => 'level',
                    'type' => 'select',
                    'display_name' => 'Level',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{
"size": 12,
"items": [
{
"label": "1",
"value": "1"
},
{
"label": "2",
"value": "2"
},
{
"label": "3",
"value": "3"
},
{
"label": "4",
"value": "4"
},
{
"label": "5",
"value": "5"
}
]
}',
                    'relation' => NULL,
                    'order' => '11',
                ),
                11 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'province',
                    'type' => 'text',
                    'display_name' => 'Province',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '12',
                ),
                12 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'city',
                    'type' => 'text',
                    'display_name' => 'City',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '13',
                ),
                13 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'country',
                    'type' => 'text',
                    'display_name' => 'Country',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '14',
                ),
                14 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'is_available',
                    'type' => 'switch',
                    'display_name' => 'Available',
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
                    'field' => 'code_table',
                    'type' => 'text',
                    'display_name' => 'Nama Tabel',
                    'required' => '0',
                    'browse' => '0',
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
                    'field' => 'created_at',
                    'type' => 'datetime',
                    'display_name' => 'Dibuat Pada',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '17',
                ),
                17 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'updated_at',
                    'type' => 'datetime',
                    'display_name' => 'Diubah Pada',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '18',
                ),
                18 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'deleted_at',
                    'type' => 'datetime',
                    'display_name' => 'Dihapus Pada',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
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

