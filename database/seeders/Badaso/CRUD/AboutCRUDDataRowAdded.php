<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class AboutCRUDDataRowAdded extends Seeder
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

            $data_type = Badaso::model('DataType')::where('name', 'about')->first();

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
                    'field' => 'title',
                    'type' => 'text',
                    'display_name' => 'Title',
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
                    'field' => 'featured_image',
                    'type' => 'upload_image_multiple',
                    'display_name' => 'Featured Image',
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
                    'field' => 'description',
                    'type' => 'editor',
                    'display_name' => 'Description',
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
                    'field' => 'grid_1_icon',
                    'type' => 'text',
                    'display_name' => 'Grid 1 Icon',
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
                    'field' => 'grid_1_title',
                    'type' => 'text',
                    'display_name' => 'Grid 1 Title',
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
                    'field' => 'grid_1_description',
                    'type' => 'textarea',
                    'display_name' => 'Grid 1 Description',
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
                    'field' => 'grid_2_icon',
                    'type' => 'text',
                    'display_name' => 'Grid 2 Icon',
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
                    'field' => 'grid_2_title',
                    'type' => 'text',
                    'display_name' => 'Grid 2 Title',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '9',
                ),
                9 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_2_description',
                    'type' => 'textarea',
                    'display_name' => 'Grid 2 Description',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '10',
                ),
                10 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_3_icon',
                    'type' => 'text',
                    'display_name' => 'Grid 3 Icon',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '11',
                ),
                11 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_3_title',
                    'type' => 'text',
                    'display_name' => 'Grid 3 Title',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '12',
                ),
                12 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_3_description',
                    'type' => 'textarea',
                    'display_name' => 'Grid 3 Description',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '13',
                ),
                13 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_4_icon',
                    'type' => 'text',
                    'display_name' => 'Grid 4 Icon',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '14',
                ),
                14 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_4_title',
                    'type' => 'text',
                    'display_name' => 'Grid 4 Title',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '15',
                ),
                15 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_4_description',
                    'type' => 'textarea',
                    'display_name' => 'Grid 4 Description',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
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
                    'display_name' => 'Created At',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '0',
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
                    'order' => '18',
                ),
                18 => 
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
                    'order' => '19',
                ),
                19 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_image_1',
                    'type' => 'upload_image',
                    'display_name' => 'GridImage1',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '20',
                ),
                20 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_image_2',
                    'type' => 'upload_image',
                    'display_name' => 'GridImage2',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '21',
                ),
                21 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'grid_image_3',
                    'type' => 'upload_image',
                    'display_name' => 'GridImage3',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '22',
                ),
                22 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'bottom_label_1',
                    'type' => 'text',
                    'display_name' => 'BottomLabel1',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '23',
                ),
                23 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'bottom_label_2',
                    'type' => 'text',
                    'display_name' => 'BottomLabel2',
                    'required' => '0',
                    'browse' => '0',
                    'read' => '1',
                    'edit' => '1',
                    'add' => '1',
                    'delete' => '0',
                    'details' => '{}',
                    'relation' => NULL,
                    'order' => '24',
                ),
                24 => 
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
                    'order' => '25',
                ),
            ));

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

            throw new Exception('exception occur ' . $e);
        }
    }
}

