<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class AboutCRUDDataDeleted extends Seeder
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
			$data_type = Badaso::model('DataType')->where('name', 'about')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'about')->delete();
            }

			Badaso::model('Permission')->removeFrom('about');

			$menuItem = Badaso::model('MenuItem')::where('url', '/general/about');

            if ($menuItem->exists()) {
                $menuItem->delete();
            }

			\DB::commit();
       	} catch(Exception $e) {
        	\DB::rollBack();

        	throw new Exception('Exception occur ' . $e);
       	}
    }
}
