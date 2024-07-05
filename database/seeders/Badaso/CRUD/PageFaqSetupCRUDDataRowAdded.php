<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class PageFaqSetupCRUDDataRowAdded extends Seeder
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

            $data_type = Badaso::model('DataType')::where('name', 'page_faq_setup')->first();

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
                    'field' => 'title_1',
                    'type' => 'text',
                    'display_name' => 'Title 1',
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
                    'field' => 'headline_1',
                    'type' => 'text',
                    'display_name' => 'Headline 1',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '3',
                ),
                3 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'description_1',
                    'type' => 'text',
                    'display_name' => 'Description 1',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '4',
                ),
                4 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'title_2',
                    'type' => 'text',
                    'display_name' => 'Title 2',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '5',
                ),
                5 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'headline_2',
                    'type' => 'text',
                    'display_name' => 'Headline 2',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '6',
                ),
                6 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'description_2',
                    'type' => 'text',
                    'display_name' => 'Description 2',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '7',
                ),
                7 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'image',
                    'type' => 'upload_image',
                    'display_name' => 'Image',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '8',
                ),
                8 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'label',
                    'type' => 'text',
                    'display_name' => 'Label',
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
                    'field' => 'created_at',
                    'type' => 'datetime',
                    'display_name' => 'Created At',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '0',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '10',
                ),
                10 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'updated_at',
                    'type' => 'datetime',
                    'display_name' => 'Updated At',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '0',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '11',
                ),
                11 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'deleted_at',
                    'type' => 'datetime',
                    'display_name' => 'Deleted At',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '0',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '12',
                ),
                12 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'lang',
                    'type' => 'select',
                    'display_name' => 'Lang',
                    'required' => '1',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '1',
                    'details' => '{
"size": 12,
"items": [
{
"label": "Indonesia",
"value": "id"
},
{
"label": "English",
"value": "en"
}
]
}',
                    'relation' => NULL,
                    'order' => '13',
                ),
            ));

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

            throw new Exception('exception occur ' . $e);
        }
    }
}
