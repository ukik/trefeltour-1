<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class PageHotelLevelPriceCRUDDataRowAdded extends Seeder
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

            $data_type = Badaso::model('DataType')::where('name', 'page_hotel_level_price')->first();

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
                    'field' => 'label',
                    'type' => 'select',
                    'display_name' => 'Label',
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
"label": "Tanpa Hotel",
"value": "Tanpa Hotel"
},
{
"label": "Melati",
"value": "Melati"
},
{
"label": "Bintang 1",
"value": "Bintang 1"
},
{
"label": "Bintang 2",
"value": "Bintang 2"
},
{
"label": "Bintang 3",
"value": "Bintang 3"
},
{
"label": "Bintang 4",
"value": "Bintang 4"
},
{
"label": "Bintang 5",
"value": "Bintang 5"
}
]
}',
                    'relation' => NULL,
                    'order' => '2',
                ),
                2 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'value',
                    'type' => 'select',
                    'display_name' => 'Value',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '0',
                    'details' => '{
"size": 12,
"items": [
{
"label": "Tanpa Hotel",
"value": "Tanpa Hotel"
},
{
"label": "Melati",
"value": "Melati"
},
{
"label": "Bintang 1",
"value": "Bintang 1"
},
{
"label": "Bintang 2",
"value": "Bintang 2"
},
{
"label": "Bintang 3",
"value": "Bintang 3"
},
{
"label": "Bintang 4",
"value": "Bintang 4"
},
{
"label": "Bintang 5",
"value": "Bintang 5"
}
]
}',
                    'relation' => NULL,
                    'order' => '3',
                ),
                3 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'min_price',
                    'type' => 'number',
                    'display_name' => 'Min Harga',
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
                    'field' => 'max_price',
                    'type' => 'number',
                    'display_name' => 'Max Harga',
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
                    'order' => '6',
                ),
                6 => 
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
                    'order' => '7',
                ),
                7 => 
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
                    'order' => '8',
                ),
            ));

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

            throw new Exception('exception occur ' . $e);
        }
    }
}

