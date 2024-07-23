<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class TourStoresCRUDDataRowAdded extends Seeder
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

            $data_type = Badaso::model('DataType')::where('name', 'tour_stores')->first();

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
                    'field' => 'user_id',
                    'type' => 'relation',
                    'display_name' => 'Vendor Akun',
                    'required' => '0',
                    'browse' => '1',
                    'read' => '1',
                    'edit' => '0',
                    'add' => '0',
                    'delete' => '1',
                    'details' => '{}',
                    'relation' => '{"relation_type":"belongs_to","destination_table":"badaso_users","destination_table_column":"id","destination_table_display_column":"username","destination_table_display_more_column":["id","username"]}',
                    'order' => '3',
                ),
                3 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'name',
                    'type' => 'text',
                    'display_name' => 'Nama',
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
                    'order' => '5',
                ),
                5 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'phone',
                    'type' => 'text',
                    'display_name' => 'Telepon',
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
                    'field' => 'location',
                    'type' => 'url',
                    'display_name' => 'Google Map',
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
                    'type' => 'upload_image_multiple',
                    'display_name' => 'Gambar Vendor',
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
                    'field' => 'address',
                    'type' => 'textarea',
                    'display_name' => 'Alamat',
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
                    'field' => 'codepos',
                    'type' => 'number',
                    'display_name' => 'Kodepos',
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
                    'field' => 'province',
                    'type' => 'select',
                    'display_name' => 'Province',
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
"label": "ACEH",
"value": "aceh"
},
{
"label": "SUMATERA UTARA",
"value": "sumatera utara"
},
{
"label": "SUMATERA BARAT",
"value": "sumatera barat"
},
{
"label": "RIAU",
"value": "riau"
},
{
"label": "JAMBI",
"value": "jambi"
},
{
"label": "SUMATERA SELATAN",
"value": "sumatera selatan"
},
{
"label": "BENGKULU",
"value": "bengkulu"
},
{
"label": "LAMPUNG",
"value": "lampung"
},
{
"label": "KEPULAUAN BANGKA BELITUNG",
"value": "kepulauan bangka belitung"
},
{
"label": "KEPULAUAN RIAU",
"value": "kepulauan riau"
},
{
"label": "DKI JAKARTA",
"value": "dki jakarta"
},
{
"label": "JAWA BARAT",
"value": "jawa barat"
},
{
"label": "JAWA TENGAH",
"value": "jawa tengah"
},
{
"label": "DI YOGYAKARTA",
"value": "di yogyakarta"
},
{
"label": "JAWA TIMUR",
"value": "jawa timur"
},
{
"label": "BANTEN",
"value": "banten"
},
{
"label": "BALI",
"value": "bali"
},
{
"label": "NUSA TENGGARA BARAT",
"value": "nusa tenggara barat"
},
{
"label": "NUSA TENGGARA TIMUR",
"value": "nusa tenggara timur"
},
{
"label": "KALIMANTAN BARAT",
"value": "kalimantan barat"
},
{
"label": "KALIMANTAN TENGAH",
"value": "kalimantan tengah"
},
{
"label": "KALIMANTAN SELATAN",
"value": "kalimantan selatan"
},
{
"label": "KALIMANTAN TIMUR",
"value": "kalimantan timur"
},
{
"label": "KALIMANTAN UTARA",
"value": "kalimantan utara"
},
{
"label": "SULAWESI UTARA",
"value": "sulawesi utara"
},
{
"label": "SULAWESI TENGAH",
"value": "sulawesi tengah"
},
{
"label": "SULAWESI SELATAN",
"value": "sulawesi selatan"
},
{
"label": "SULAWESI TENGGARA",
"value": "sulawesi tenggara"
},
{
"label": "GORONTALO",
"value": "gorontalo"
},
{
"label": "SULAWESI BARAT",
"value": "sulawesi barat"
},
{
"label": "MALUKU",
"value": "maluku"
},
{
"label": "MALUKU UTARA",
"value": "maluku utara"
},
{
"label": "PAPUA BARAT",
"value": "papua barat"
},
{
"label": "PAPUA",
"value": "papua"
}
]
}',
                    'relation' => NULL,
                    'order' => '11',
                ),
                11 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'city',
                    'type' => 'select',
                    'display_name' => 'Kota',
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
"label": "ACEH",
"value": "aceh"
},
{
"label": "SUMATERA UTARA",
"value": "sumatera utara"
},
{
"label": "SUMATERA BARAT",
"value": "sumatera barat"
},
{
"label": "RIAU",
"value": "riau"
},
{
"label": "JAMBI",
"value": "jambi"
},
{
"label": "SUMATERA SELATAN",
"value": "sumatera selatan"
},
{
"label": "BENGKULU",
"value": "bengkulu"
},
{
"label": "LAMPUNG",
"value": "lampung"
},
{
"label": "KEPULAUAN BANGKA BELITUNG",
"value": "kepulauan bangka belitung"
},
{
"label": "KEPULAUAN RIAU",
"value": "kepulauan riau"
},
{
"label": "DKI JAKARTA",
"value": "dki jakarta"
},
{
"label": "JAWA BARAT",
"value": "jawa barat"
},
{
"label": "JAWA TENGAH",
"value": "jawa tengah"
},
{
"label": "DI YOGYAKARTA",
"value": "di yogyakarta"
},
{
"label": "JAWA TIMUR",
"value": "jawa timur"
},
{
"label": "BANTEN",
"value": "banten"
},
{
"label": "BALI",
"value": "bali"
},
{
"label": "NUSA TENGGARA BARAT",
"value": "nusa tenggara barat"
},
{
"label": "NUSA TENGGARA TIMUR",
"value": "nusa tenggara timur"
},
{
"label": "KALIMANTAN BARAT",
"value": "kalimantan barat"
},
{
"label": "KALIMANTAN TENGAH",
"value": "kalimantan tengah"
},
{
"label": "KALIMANTAN SELATAN",
"value": "kalimantan selatan"
},
{
"label": "KALIMANTAN TIMUR",
"value": "kalimantan timur"
},
{
"label": "KALIMANTAN UTARA",
"value": "kalimantan utara"
},
{
"label": "SULAWESI UTARA",
"value": "sulawesi utara"
},
{
"label": "SULAWESI TENGAH",
"value": "sulawesi tengah"
},
{
"label": "SULAWESI SELATAN",
"value": "sulawesi selatan"
},
{
"label": "SULAWESI TENGGARA",
"value": "sulawesi tenggara"
},
{
"label": "GORONTALO",
"value": "gorontalo"
},
{
"label": "SULAWESI BARAT",
"value": "sulawesi barat"
},
{
"label": "MALUKU",
"value": "maluku"
},
{
"label": "MALUKU UTARA",
"value": "maluku utara"
},
{
"label": "PAPUA BARAT",
"value": "papua barat"
},
{
"label": "PAPUA",
"value": "papua"
},
{
"label": "KABUPATEN SIMEULUE",
"value": "kabupaten simeulue"
},
{
"label": "KABUPATEN ACEH SINGKIL",
"value": "kabupaten aceh singkil"
},
{
"label": "KABUPATEN ACEH SELATAN",
"value": "kabupaten aceh selatan"
},
{
"label": "KABUPATEN ACEH TENGGARA",
"value": "kabupaten aceh tenggara"
},
{
"label": "KABUPATEN ACEH TIMUR",
"value": "kabupaten aceh timur"
},
{
"label": "KABUPATEN ACEH TENGAH",
"value": "kabupaten aceh tengah"
},
{
"label": "KABUPATEN ACEH BARAT",
"value": "kabupaten aceh barat"
},
{
"label": "KABUPATEN ACEH BESAR",
"value": "kabupaten aceh besar"
},
{
"label": "KABUPATEN PIDIE",
"value": "kabupaten pidie"
},
{
"label": "KABUPATEN BIREUEN",
"value": "kabupaten bireuen"
},
{
"label": "KABUPATEN ACEH UTARA",
"value": "kabupaten aceh utara"
},
{
"label": "KABUPATEN ACEH BARAT DAYA",
"value": "kabupaten aceh barat daya"
},
{
"label": "KABUPATEN GAYO LUES",
"value": "kabupaten gayo lues"
},
{
"label": "KABUPATEN ACEH TAMIANG",
"value": "kabupaten aceh tamiang"
},
{
"label": "KABUPATEN NAGAN RAYA",
"value": "kabupaten nagan raya"
},
{
"label": "KABUPATEN ACEH JAYA",
"value": "kabupaten aceh jaya"
},
{
"label": "KABUPATEN BENER MERIAH",
"value": "kabupaten bener meriah"
},
{
"label": "KABUPATEN PIDIE JAYA",
"value": "kabupaten pidie jaya"
},
{
"label": "KOTA BANDA ACEH",
"value": "kota banda aceh"
},
{
"label": "KOTA SABANG",
"value": "kota sabang"
},
{
"label": "KOTA LANGSA",
"value": "kota langsa"
},
{
"label": "KOTA LHOKSEUMAWE",
"value": "kota lhokseumawe"
},
{
"label": "KOTA SUBULUSSALAM",
"value": "kota subulussalam"
},
{
"label": "KABUPATEN NIAS",
"value": "kabupaten nias"
},
{
"label": "KABUPATEN MANDAILING NATAL",
"value": "kabupaten mandailing natal"
},
{
"label": "KABUPATEN TAPANULI SELATAN",
"value": "kabupaten tapanuli selatan"
},
{
"label": "KABUPATEN TAPANULI TENGAH",
"value": "kabupaten tapanuli tengah"
},
{
"label": "KABUPATEN TAPANULI UTARA",
"value": "kabupaten tapanuli utara"
},
{
"label": "KABUPATEN TOBA SAMOSIR",
"value": "kabupaten toba samosir"
},
{
"label": "KABUPATEN LABUHAN BATU",
"value": "kabupaten labuhan batu"
},
{
"label": "KABUPATEN ASAHAN",
"value": "kabupaten asahan"
},
{
"label": "KABUPATEN SIMALUNGUN",
"value": "kabupaten simalungun"
},
{
"label": "KABUPATEN DAIRI",
"value": "kabupaten dairi"
},
{
"label": "KABUPATEN KARO",
"value": "kabupaten karo"
},
{
"label": "KABUPATEN DELI SERDANG",
"value": "kabupaten deli serdang"
},
{
"label": "KABUPATEN LANGKAT",
"value": "kabupaten langkat"
},
{
"label": "KABUPATEN NIAS SELATAN",
"value": "kabupaten nias selatan"
},
{
"label": "KABUPATEN HUMBANG HASUNDUTAN",
"value": "kabupaten humbang hasundutan"
},
{
"label": "KABUPATEN PAKPAK BHARAT",
"value": "kabupaten pakpak bharat"
},
{
"label": "KABUPATEN SAMOSIR",
"value": "kabupaten samosir"
},
{
"label": "KABUPATEN SERDANG BEDAGAI",
"value": "kabupaten serdang bedagai"
},
{
"label": "KABUPATEN BATU BARA",
"value": "kabupaten batu bara"
},
{
"label": "KABUPATEN PADANG LAWAS UTARA",
"value": "kabupaten padang lawas utara"
},
{
"label": "KABUPATEN PADANG LAWAS",
"value": "kabupaten padang lawas"
},
{
"label": "KABUPATEN LABUHAN BATU SELATAN",
"value": "kabupaten labuhan batu selatan"
},
{
"label": "KABUPATEN LABUHAN BATU UTARA",
"value": "kabupaten labuhan batu utara"
},
{
"label": "KABUPATEN NIAS UTARA",
"value": "kabupaten nias utara"
},
{
"label": "KABUPATEN NIAS BARAT",
"value": "kabupaten nias barat"
},
{
"label": "KOTA SIBOLGA",
"value": "kota sibolga"
},
{
"label": "KOTA TANJUNG BALAI",
"value": "kota tanjung balai"
},
{
"label": "KOTA PEMATANG SIANTAR",
"value": "kota pematang siantar"
},
{
"label": "KOTA TEBING TINGGI",
"value": "kota tebing tinggi"
},
{
"label": "KOTA MEDAN",
"value": "kota medan"
},
{
"label": "KOTA BINJAI",
"value": "kota binjai"
},
{
"label": "KOTA PADANGSIDIMPUAN",
"value": "kota padangsidimpuan"
},
{
"label": "KOTA GUNUNGSITOLI",
"value": "kota gunungsitoli"
},
{
"label": "KABUPATEN KEPULAUAN MENTAWAI",
"value": "kabupaten kepulauan mentawai"
},
{
"label": "KABUPATEN PESISIR SELATAN",
"value": "kabupaten pesisir selatan"
},
{
"label": "KABUPATEN SOLOK",
"value": "kabupaten solok"
},
{
"label": "KABUPATEN SIJUNJUNG",
"value": "kabupaten sijunjung"
},
{
"label": "KABUPATEN TANAH DATAR",
"value": "kabupaten tanah datar"
},
{
"label": "KABUPATEN PADANG PARIAMAN",
"value": "kabupaten padang pariaman"
},
{
"label": "KABUPATEN AGAM",
"value": "kabupaten agam"
},
{
"label": "KABUPATEN LIMA PULUH KOTA",
"value": "kabupaten lima puluh kota"
},
{
"label": "KABUPATEN PASAMAN",
"value": "kabupaten pasaman"
},
{
"label": "KABUPATEN SOLOK SELATAN",
"value": "kabupaten solok selatan"
},
{
"label": "KABUPATEN DHARMASRAYA",
"value": "kabupaten dharmasraya"
},
{
"label": "KABUPATEN PASAMAN BARAT",
"value": "kabupaten pasaman barat"
},
{
"label": "KOTA PADANG",
"value": "kota padang"
},
{
"label": "KOTA SOLOK",
"value": "kota solok"
},
{
"label": "KOTA SAWAH LUNTO",
"value": "kota sawah lunto"
},
{
"label": "KOTA PADANG PANJANG",
"value": "kota padang panjang"
},
{
"label": "KOTA BUKITTINGGI",
"value": "kota bukittinggi"
},
{
"label": "KOTA PAYAKUMBUH",
"value": "kota payakumbuh"
},
{
"label": "KOTA PARIAMAN",
"value": "kota pariaman"
},
{
"label": "KABUPATEN KUANTAN SINGINGI",
"value": "kabupaten kuantan singingi"
},
{
"label": "KABUPATEN INDRAGIRI HULU",
"value": "kabupaten indragiri hulu"
},
{
"label": "KABUPATEN INDRAGIRI HILIR",
"value": "kabupaten indragiri hilir"
},
{
"label": "KABUPATEN PELALAWAN",
"value": "kabupaten pelalawan"
},
{
"label": "KABUPATEN S I A K",
"value": "kabupaten s i a k"
},
{
"label": "KABUPATEN KAMPAR",
"value": "kabupaten kampar"
},
{
"label": "KABUPATEN ROKAN HULU",
"value": "kabupaten rokan hulu"
},
{
"label": "KABUPATEN BENGKALIS",
"value": "kabupaten bengkalis"
},
{
"label": "KABUPATEN ROKAN HILIR",
"value": "kabupaten rokan hilir"
},
{
"label": "KABUPATEN KEPULAUAN MERANTI",
"value": "kabupaten kepulauan meranti"
},
{
"label": "KOTA PEKANBARU",
"value": "kota pekanbaru"
},
{
"label": "KOTA D U M A I",
"value": "kota d u m a i"
},
{
"label": "KABUPATEN KERINCI",
"value": "kabupaten kerinci"
},
{
"label": "KABUPATEN MERANGIN",
"value": "kabupaten merangin"
},
{
"label": "KABUPATEN SAROLANGUN",
"value": "kabupaten sarolangun"
},
{
"label": "KABUPATEN BATANG HARI",
"value": "kabupaten batang hari"
},
{
"label": "KABUPATEN MUARO JAMBI",
"value": "kabupaten muaro jambi"
},
{
"label": "KABUPATEN TANJUNG JABUNG TIMUR",
"value": "kabupaten tanjung jabung timur"
},
{
"label": "KABUPATEN TANJUNG JABUNG BARAT",
"value": "kabupaten tanjung jabung barat"
},
{
"label": "KABUPATEN TEBO",
"value": "kabupaten tebo"
},
{
"label": "KABUPATEN BUNGO",
"value": "kabupaten bungo"
},
{
"label": "KOTA JAMBI",
"value": "kota jambi"
},
{
"label": "KOTA SUNGAI PENUH",
"value": "kota sungai penuh"
},
{
"label": "KABUPATEN OGAN KOMERING ULU",
"value": "kabupaten ogan komering ulu"
},
{
"label": "KABUPATEN OGAN KOMERING ILIR",
"value": "kabupaten ogan komering ilir"
},
{
"label": "KABUPATEN MUARA ENIM",
"value": "kabupaten muara enim"
},
{
"label": "KABUPATEN LAHAT",
"value": "kabupaten lahat"
},
{
"label": "KABUPATEN MUSI RAWAS",
"value": "kabupaten musi rawas"
},
{
"label": "KABUPATEN MUSI BANYUASIN",
"value": "kabupaten musi banyuasin"
},
{
"label": "KABUPATEN BANYU ASIN",
"value": "kabupaten banyu asin"
},
{
"label": "KABUPATEN OGAN KOMERING ULU SELATAN",
"value": "kabupaten ogan komering ulu selatan"
},
{
"label": "KABUPATEN OGAN KOMERING ULU TIMUR",
"value": "kabupaten ogan komering ulu timur"
},
{
"label": "KABUPATEN OGAN ILIR",
"value": "kabupaten ogan ilir"
},
{
"label": "KABUPATEN EMPAT LAWANG",
"value": "kabupaten empat lawang"
},
{
"label": "KABUPATEN PENUKAL ABAB LEMATANG ILIR",
"value": "kabupaten penukal abab lematang ilir"
},
{
"label": "KABUPATEN MUSI RAWAS UTARA",
"value": "kabupaten musi rawas utara"
},
{
"label": "KOTA PALEMBANG",
"value": "kota palembang"
},
{
"label": "KOTA PRABUMULIH",
"value": "kota prabumulih"
},
{
"label": "KOTA PAGAR ALAM",
"value": "kota pagar alam"
},
{
"label": "KOTA LUBUKLINGGAU",
"value": "kota lubuklinggau"
},
{
"label": "KABUPATEN BENGKULU SELATAN",
"value": "kabupaten bengkulu selatan"
},
{
"label": "KABUPATEN REJANG LEBONG",
"value": "kabupaten rejang lebong"
},
{
"label": "KABUPATEN BENGKULU UTARA",
"value": "kabupaten bengkulu utara"
},
{
"label": "KABUPATEN KAUR",
"value": "kabupaten kaur"
},
{
"label": "KABUPATEN SELUMA",
"value": "kabupaten seluma"
},
{
"label": "KABUPATEN MUKOMUKO",
"value": "kabupaten mukomuko"
},
{
"label": "KABUPATEN LEBONG",
"value": "kabupaten lebong"
},
{
"label": "KABUPATEN KEPAHIANG",
"value": "kabupaten kepahiang"
},
{
"label": "KABUPATEN BENGKULU TENGAH",
"value": "kabupaten bengkulu tengah"
},
{
"label": "KOTA BENGKULU",
"value": "kota bengkulu"
},
{
"label": "KABUPATEN LAMPUNG BARAT",
"value": "kabupaten lampung barat"
},
{
"label": "KABUPATEN TANGGAMUS",
"value": "kabupaten tanggamus"
},
{
"label": "KABUPATEN LAMPUNG SELATAN",
"value": "kabupaten lampung selatan"
},
{
"label": "KABUPATEN LAMPUNG TIMUR",
"value": "kabupaten lampung timur"
},
{
"label": "KABUPATEN LAMPUNG TENGAH",
"value": "kabupaten lampung tengah"
},
{
"label": "KABUPATEN LAMPUNG UTARA",
"value": "kabupaten lampung utara"
},
{
"label": "KABUPATEN WAY KANAN",
"value": "kabupaten way kanan"
},
{
"label": "KABUPATEN TULANGBAWANG",
"value": "kabupaten tulangbawang"
},
{
"label": "KABUPATEN PESAWARAN",
"value": "kabupaten pesawaran"
},
{
"label": "KABUPATEN PRINGSEWU",
"value": "kabupaten pringsewu"
},
{
"label": "KABUPATEN MESUJI",
"value": "kabupaten mesuji"
},
{
"label": "KABUPATEN TULANG BAWANG BARAT",
"value": "kabupaten tulang bawang barat"
},
{
"label": "KABUPATEN PESISIR BARAT",
"value": "kabupaten pesisir barat"
},
{
"label": "KOTA BANDAR LAMPUNG",
"value": "kota bandar lampung"
},
{
"label": "KOTA METRO",
"value": "kota metro"
},
{
"label": "KABUPATEN BANGKA",
"value": "kabupaten bangka"
},
{
"label": "KABUPATEN BELITUNG",
"value": "kabupaten belitung"
},
{
"label": "KABUPATEN BANGKA BARAT",
"value": "kabupaten bangka barat"
},
{
"label": "KABUPATEN BANGKA TENGAH",
"value": "kabupaten bangka tengah"
},
{
"label": "KABUPATEN BANGKA SELATAN",
"value": "kabupaten bangka selatan"
},
{
"label": "KABUPATEN BELITUNG TIMUR",
"value": "kabupaten belitung timur"
},
{
"label": "KOTA PANGKAL PINANG",
"value": "kota pangkal pinang"
},
{
"label": "KABUPATEN KARIMUN",
"value": "kabupaten karimun"
},
{
"label": "KABUPATEN BINTAN",
"value": "kabupaten bintan"
},
{
"label": "KABUPATEN NATUNA",
"value": "kabupaten natuna"
},
{
"label": "KABUPATEN LINGGA",
"value": "kabupaten lingga"
},
{
"label": "KABUPATEN KEPULAUAN ANAMBAS",
"value": "kabupaten kepulauan anambas"
},
{
"label": "KOTA B A T A M",
"value": "kota b a t a m"
},
{
"label": "KOTA TANJUNG PINANG",
"value": "kota tanjung pinang"
},
{
"label": "KABUPATEN KEPULAUAN SERIBU",
"value": "kabupaten kepulauan seribu"
},
{
"label": "KOTA JAKARTA SELATAN",
"value": "kota jakarta selatan"
},
{
"label": "KOTA JAKARTA TIMUR",
"value": "kota jakarta timur"
},
{
"label": "KOTA JAKARTA PUSAT",
"value": "kota jakarta pusat"
},
{
"label": "KOTA JAKARTA BARAT",
"value": "kota jakarta barat"
},
{
"label": "KOTA JAKARTA UTARA",
"value": "kota jakarta utara"
},
{
"label": "KABUPATEN BOGOR",
"value": "kabupaten bogor"
},
{
"label": "KABUPATEN SUKABUMI",
"value": "kabupaten sukabumi"
},
{
"label": "KABUPATEN CIANJUR",
"value": "kabupaten cianjur"
},
{
"label": "KABUPATEN BANDUNG",
"value": "kabupaten bandung"
},
{
"label": "KABUPATEN GARUT",
"value": "kabupaten garut"
},
{
"label": "KABUPATEN TASIKMALAYA",
"value": "kabupaten tasikmalaya"
},
{
"label": "KABUPATEN CIAMIS",
"value": "kabupaten ciamis"
},
{
"label": "KABUPATEN KUNINGAN",
"value": "kabupaten kuningan"
},
{
"label": "KABUPATEN CIREBON",
"value": "kabupaten cirebon"
},
{
"label": "KABUPATEN MAJALENGKA",
"value": "kabupaten majalengka"
},
{
"label": "KABUPATEN SUMEDANG",
"value": "kabupaten sumedang"
},
{
"label": "KABUPATEN INDRAMAYU",
"value": "kabupaten indramayu"
},
{
"label": "KABUPATEN SUBANG",
"value": "kabupaten subang"
},
{
"label": "KABUPATEN PURWAKARTA",
"value": "kabupaten purwakarta"
},
{
"label": "KABUPATEN KARAWANG",
"value": "kabupaten karawang"
},
{
"label": "KABUPATEN BEKASI",
"value": "kabupaten bekasi"
},
{
"label": "KABUPATEN BANDUNG BARAT",
"value": "kabupaten bandung barat"
},
{
"label": "KABUPATEN PANGANDARAN",
"value": "kabupaten pangandaran"
},
{
"label": "KOTA BOGOR",
"value": "kota bogor"
},
{
"label": "KOTA SUKABUMI",
"value": "kota sukabumi"
},
{
"label": "KOTA BANDUNG",
"value": "kota bandung"
},
{
"label": "KOTA CIREBON",
"value": "kota cirebon"
},
{
"label": "KOTA BEKASI",
"value": "kota bekasi"
},
{
"label": "KOTA DEPOK",
"value": "kota depok"
},
{
"label": "KOTA CIMAHI",
"value": "kota cimahi"
},
{
"label": "KOTA TASIKMALAYA",
"value": "kota tasikmalaya"
},
{
"label": "KOTA BANJAR",
"value": "kota banjar"
},
{
"label": "KABUPATEN CILACAP",
"value": "kabupaten cilacap"
},
{
"label": "KABUPATEN BANYUMAS",
"value": "kabupaten banyumas"
},
{
"label": "KABUPATEN PURBALINGGA",
"value": "kabupaten purbalingga"
},
{
"label": "KABUPATEN BANJARNEGARA",
"value": "kabupaten banjarnegara"
},
{
"label": "KABUPATEN KEBUMEN",
"value": "kabupaten kebumen"
},
{
"label": "KABUPATEN PURWOREJO",
"value": "kabupaten purworejo"
},
{
"label": "KABUPATEN WONOSOBO",
"value": "kabupaten wonosobo"
},
{
"label": "KABUPATEN MAGELANG",
"value": "kabupaten magelang"
},
{
"label": "KABUPATEN BOYOLALI",
"value": "kabupaten boyolali"
},
{
"label": "KABUPATEN KLATEN",
"value": "kabupaten klaten"
},
{
"label": "KABUPATEN SUKOHARJO",
"value": "kabupaten sukoharjo"
},
{
"label": "KABUPATEN WONOGIRI",
"value": "kabupaten wonogiri"
},
{
"label": "KABUPATEN KARANGANYAR",
"value": "kabupaten karanganyar"
},
{
"label": "KABUPATEN SRAGEN",
"value": "kabupaten sragen"
},
{
"label": "KABUPATEN GROBOGAN",
"value": "kabupaten grobogan"
},
{
"label": "KABUPATEN BLORA",
"value": "kabupaten blora"
},
{
"label": "KABUPATEN REMBANG",
"value": "kabupaten rembang"
},
{
"label": "KABUPATEN PATI",
"value": "kabupaten pati"
},
{
"label": "KABUPATEN KUDUS",
"value": "kabupaten kudus"
},
{
"label": "KABUPATEN JEPARA",
"value": "kabupaten jepara"
},
{
"label": "KABUPATEN DEMAK",
"value": "kabupaten demak"
},
{
"label": "KABUPATEN SEMARANG",
"value": "kabupaten semarang"
},
{
"label": "KABUPATEN TEMANGGUNG",
"value": "kabupaten temanggung"
},
{
"label": "KABUPATEN KENDAL",
"value": "kabupaten kendal"
},
{
"label": "KABUPATEN BATANG",
"value": "kabupaten batang"
},
{
"label": "KABUPATEN PEKALONGAN",
"value": "kabupaten pekalongan"
},
{
"label": "KABUPATEN PEMALANG",
"value": "kabupaten pemalang"
},
{
"label": "KABUPATEN TEGAL",
"value": "kabupaten tegal"
},
{
"label": "KABUPATEN BREBES",
"value": "kabupaten brebes"
},
{
"label": "KOTA MAGELANG",
"value": "kota magelang"
},
{
"label": "KOTA SURAKARTA",
"value": "kota surakarta"
},
{
"label": "KOTA SALATIGA",
"value": "kota salatiga"
},
{
"label": "KOTA SEMARANG",
"value": "kota semarang"
},
{
"label": "KOTA PEKALONGAN",
"value": "kota pekalongan"
},
{
"label": "KOTA TEGAL",
"value": "kota tegal"
},
{
"label": "KABUPATEN KULON PROGO",
"value": "kabupaten kulon progo"
},
{
"label": "KABUPATEN BANTUL",
"value": "kabupaten bantul"
},
{
"label": "KABUPATEN GUNUNG KIDUL",
"value": "kabupaten gunung kidul"
},
{
"label": "KABUPATEN SLEMAN",
"value": "kabupaten sleman"
},
{
"label": "KOTA YOGYAKARTA",
"value": "kota yogyakarta"
},
{
"label": "KABUPATEN PACITAN",
"value": "kabupaten pacitan"
},
{
"label": "KABUPATEN PONOROGO",
"value": "kabupaten ponorogo"
},
{
"label": "KABUPATEN TRENGGALEK",
"value": "kabupaten trenggalek"
},
{
"label": "KABUPATEN TULUNGAGUNG",
"value": "kabupaten tulungagung"
},
{
"label": "KABUPATEN BLITAR",
"value": "kabupaten blitar"
},
{
"label": "KABUPATEN KEDIRI",
"value": "kabupaten kediri"
},
{
"label": "KABUPATEN MALANG",
"value": "kabupaten malang"
},
{
"label": "KABUPATEN LUMAJANG",
"value": "kabupaten lumajang"
},
{
"label": "KABUPATEN JEMBER",
"value": "kabupaten jember"
},
{
"label": "KABUPATEN BANYUWANGI",
"value": "kabupaten banyuwangi"
},
{
"label": "KABUPATEN BONDOWOSO",
"value": "kabupaten bondowoso"
},
{
"label": "KABUPATEN SITUBONDO",
"value": "kabupaten situbondo"
},
{
"label": "KABUPATEN PROBOLINGGO",
"value": "kabupaten probolinggo"
},
{
"label": "KABUPATEN PASURUAN",
"value": "kabupaten pasuruan"
},
{
"label": "KABUPATEN SIDOARJO",
"value": "kabupaten sidoarjo"
},
{
"label": "KABUPATEN MOJOKERTO",
"value": "kabupaten mojokerto"
},
{
"label": "KABUPATEN JOMBANG",
"value": "kabupaten jombang"
},
{
"label": "KABUPATEN NGANJUK",
"value": "kabupaten nganjuk"
},
{
"label": "KABUPATEN MADIUN",
"value": "kabupaten madiun"
},
{
"label": "KABUPATEN MAGETAN",
"value": "kabupaten magetan"
},
{
"label": "KABUPATEN NGAWI",
"value": "kabupaten ngawi"
},
{
"label": "KABUPATEN BOJONEGORO",
"value": "kabupaten bojonegoro"
},
{
"label": "KABUPATEN TUBAN",
"value": "kabupaten tuban"
},
{
"label": "KABUPATEN LAMONGAN",
"value": "kabupaten lamongan"
},
{
"label": "KABUPATEN GRESIK",
"value": "kabupaten gresik"
},
{
"label": "KABUPATEN BANGKALAN",
"value": "kabupaten bangkalan"
},
{
"label": "KABUPATEN SAMPANG",
"value": "kabupaten sampang"
},
{
"label": "KABUPATEN PAMEKASAN",
"value": "kabupaten pamekasan"
},
{
"label": "KABUPATEN SUMENEP",
"value": "kabupaten sumenep"
},
{
"label": "KOTA KEDIRI",
"value": "kota kediri"
},
{
"label": "KOTA BLITAR",
"value": "kota blitar"
},
{
"label": "KOTA MALANG",
"value": "kota malang"
},
{
"label": "KOTA PROBOLINGGO",
"value": "kota probolinggo"
},
{
"label": "KOTA PASURUAN",
"value": "kota pasuruan"
},
{
"label": "KOTA MOJOKERTO",
"value": "kota mojokerto"
},
{
"label": "KOTA MADIUN",
"value": "kota madiun"
},
{
"label": "KOTA SURABAYA",
"value": "kota surabaya"
},
{
"label": "KOTA BATU",
"value": "kota batu"
},
{
"label": "KABUPATEN PANDEGLANG",
"value": "kabupaten pandeglang"
},
{
"label": "KABUPATEN LEBAK",
"value": "kabupaten lebak"
},
{
"label": "KABUPATEN TANGERANG",
"value": "kabupaten tangerang"
},
{
"label": "KABUPATEN SERANG",
"value": "kabupaten serang"
},
{
"label": "KOTA TANGERANG",
"value": "kota tangerang"
},
{
"label": "KOTA CILEGON",
"value": "kota cilegon"
},
{
"label": "KOTA SERANG",
"value": "kota serang"
},
{
"label": "KOTA TANGERANG SELATAN",
"value": "kota tangerang selatan"
},
{
"label": "KABUPATEN JEMBRANA",
"value": "kabupaten jembrana"
},
{
"label": "KABUPATEN TABANAN",
"value": "kabupaten tabanan"
},
{
"label": "KABUPATEN BADUNG",
"value": "kabupaten badung"
},
{
"label": "KABUPATEN GIANYAR",
"value": "kabupaten gianyar"
},
{
"label": "KABUPATEN KLUNGKUNG",
"value": "kabupaten klungkung"
},
{
"label": "KABUPATEN BANGLI",
"value": "kabupaten bangli"
},
{
"label": "KABUPATEN KARANG ASEM",
"value": "kabupaten karang asem"
},
{
"label": "KABUPATEN BULELENG",
"value": "kabupaten buleleng"
},
{
"label": "KOTA DENPASAR",
"value": "kota denpasar"
},
{
"label": "KABUPATEN LOMBOK BARAT",
"value": "kabupaten lombok barat"
},
{
"label": "KABUPATEN LOMBOK TENGAH",
"value": "kabupaten lombok tengah"
},
{
"label": "KABUPATEN LOMBOK TIMUR",
"value": "kabupaten lombok timur"
},
{
"label": "KABUPATEN SUMBAWA",
"value": "kabupaten sumbawa"
},
{
"label": "KABUPATEN DOMPU",
"value": "kabupaten dompu"
},
{
"label": "KABUPATEN BIMA",
"value": "kabupaten bima"
},
{
"label": "KABUPATEN SUMBAWA BARAT",
"value": "kabupaten sumbawa barat"
},
{
"label": "KABUPATEN LOMBOK UTARA",
"value": "kabupaten lombok utara"
},
{
"label": "KOTA MATARAM",
"value": "kota mataram"
},
{
"label": "KOTA BIMA",
"value": "kota bima"
},
{
"label": "KABUPATEN SUMBA BARAT",
"value": "kabupaten sumba barat"
},
{
"label": "KABUPATEN SUMBA TIMUR",
"value": "kabupaten sumba timur"
},
{
"label": "KABUPATEN KUPANG",
"value": "kabupaten kupang"
},
{
"label": "KABUPATEN TIMOR TENGAH SELATAN",
"value": "kabupaten timor tengah selatan"
},
{
"label": "KABUPATEN TIMOR TENGAH UTARA",
"value": "kabupaten timor tengah utara"
},
{
"label": "KABUPATEN BELU",
"value": "kabupaten belu"
},
{
"label": "KABUPATEN ALOR",
"value": "kabupaten alor"
},
{
"label": "KABUPATEN LEMBATA",
"value": "kabupaten lembata"
},
{
"label": "KABUPATEN FLORES TIMUR",
"value": "kabupaten flores timur"
},
{
"label": "KABUPATEN SIKKA",
"value": "kabupaten sikka"
},
{
"label": "KABUPATEN ENDE",
"value": "kabupaten ende"
},
{
"label": "KABUPATEN NGADA",
"value": "kabupaten ngada"
},
{
"label": "KABUPATEN MANGGARAI",
"value": "kabupaten manggarai"
},
{
"label": "KABUPATEN ROTE NDAO",
"value": "kabupaten rote ndao"
},
{
"label": "KABUPATEN MANGGARAI BARAT",
"value": "kabupaten manggarai barat"
},
{
"label": "KABUPATEN SUMBA TENGAH",
"value": "kabupaten sumba tengah"
},
{
"label": "KABUPATEN SUMBA BARAT DAYA",
"value": "kabupaten sumba barat daya"
},
{
"label": "KABUPATEN NAGEKEO",
"value": "kabupaten nagekeo"
},
{
"label": "KABUPATEN MANGGARAI TIMUR",
"value": "kabupaten manggarai timur"
},
{
"label": "KABUPATEN SABU RAIJUA",
"value": "kabupaten sabu raijua"
},
{
"label": "KABUPATEN MALAKA",
"value": "kabupaten malaka"
},
{
"label": "KOTA KUPANG",
"value": "kota kupang"
},
{
"label": "KABUPATEN SAMBAS",
"value": "kabupaten sambas"
},
{
"label": "KABUPATEN BENGKAYANG",
"value": "kabupaten bengkayang"
},
{
"label": "KABUPATEN LANDAK",
"value": "kabupaten landak"
},
{
"label": "KABUPATEN MEMPAWAH",
"value": "kabupaten mempawah"
},
{
"label": "KABUPATEN SANGGAU",
"value": "kabupaten sanggau"
},
{
"label": "KABUPATEN KETAPANG",
"value": "kabupaten ketapang"
},
{
"label": "KABUPATEN SINTANG",
"value": "kabupaten sintang"
},
{
"label": "KABUPATEN KAPUAS HULU",
"value": "kabupaten kapuas hulu"
},
{
"label": "KABUPATEN SEKADAU",
"value": "kabupaten sekadau"
},
{
"label": "KABUPATEN MELAWI",
"value": "kabupaten melawi"
},
{
"label": "KABUPATEN KAYONG UTARA",
"value": "kabupaten kayong utara"
},
{
"label": "KABUPATEN KUBU RAYA",
"value": "kabupaten kubu raya"
},
{
"label": "KOTA PONTIANAK",
"value": "kota pontianak"
},
{
"label": "KOTA SINGKAWANG",
"value": "kota singkawang"
},
{
"label": "KABUPATEN KOTAWARINGIN BARAT",
"value": "kabupaten kotawaringin barat"
},
{
"label": "KABUPATEN KOTAWARINGIN TIMUR",
"value": "kabupaten kotawaringin timur"
},
{
"label": "KABUPATEN KAPUAS",
"value": "kabupaten kapuas"
},
{
"label": "KABUPATEN BARITO SELATAN",
"value": "kabupaten barito selatan"
},
{
"label": "KABUPATEN BARITO UTARA",
"value": "kabupaten barito utara"
},
{
"label": "KABUPATEN SUKAMARA",
"value": "kabupaten sukamara"
},
{
"label": "KABUPATEN LAMANDAU",
"value": "kabupaten lamandau"
},
{
"label": "KABUPATEN SERUYAN",
"value": "kabupaten seruyan"
},
{
"label": "KABUPATEN KATINGAN",
"value": "kabupaten katingan"
},
{
"label": "KABUPATEN PULANG PISAU",
"value": "kabupaten pulang pisau"
},
{
"label": "KABUPATEN GUNUNG MAS",
"value": "kabupaten gunung mas"
},
{
"label": "KABUPATEN BARITO TIMUR",
"value": "kabupaten barito timur"
},
{
"label": "KABUPATEN MURUNG RAYA",
"value": "kabupaten murung raya"
},
{
"label": "KOTA PALANGKA RAYA",
"value": "kota palangka raya"
},
{
"label": "KABUPATEN TANAH LAUT",
"value": "kabupaten tanah laut"
},
{
"label": "KABUPATEN KOTA BARU",
"value": "kabupaten kota baru"
},
{
"label": "KABUPATEN BANJAR",
"value": "kabupaten banjar"
},
{
"label": "KABUPATEN BARITO KUALA",
"value": "kabupaten barito kuala"
},
{
"label": "KABUPATEN TAPIN",
"value": "kabupaten tapin"
},
{
"label": "KABUPATEN HULU SUNGAI SELATAN",
"value": "kabupaten hulu sungai selatan"
},
{
"label": "KABUPATEN HULU SUNGAI TENGAH",
"value": "kabupaten hulu sungai tengah"
},
{
"label": "KABUPATEN HULU SUNGAI UTARA",
"value": "kabupaten hulu sungai utara"
},
{
"label": "KABUPATEN TABALONG",
"value": "kabupaten tabalong"
},
{
"label": "KABUPATEN TANAH BUMBU",
"value": "kabupaten tanah bumbu"
},
{
"label": "KABUPATEN BALANGAN",
"value": "kabupaten balangan"
},
{
"label": "KOTA BANJARMASIN",
"value": "kota banjarmasin"
},
{
"label": "KOTA BANJAR BARU",
"value": "kota banjar baru"
},
{
"label": "KABUPATEN PASER",
"value": "kabupaten paser"
},
{
"label": "KABUPATEN KUTAI BARAT",
"value": "kabupaten kutai barat"
},
{
"label": "KABUPATEN KUTAI KARTANEGARA",
"value": "kabupaten kutai kartanegara"
},
{
"label": "KABUPATEN KUTAI TIMUR",
"value": "kabupaten kutai timur"
},
{
"label": "KABUPATEN BERAU",
"value": "kabupaten berau"
},
{
"label": "KABUPATEN PENAJAM PASER UTARA",
"value": "kabupaten penajam paser utara"
},
{
"label": "KABUPATEN MAHAKAM HULU",
"value": "kabupaten mahakam hulu"
},
{
"label": "KOTA BALIKPAPAN",
"value": "kota balikpapan"
},
{
"label": "KOTA SAMARINDA",
"value": "kota samarinda"
},
{
"label": "KOTA BONTANG",
"value": "kota bontang"
},
{
"label": "KABUPATEN MALINAU",
"value": "kabupaten malinau"
},
{
"label": "KABUPATEN BULUNGAN",
"value": "kabupaten bulungan"
},
{
"label": "KABUPATEN TANA TIDUNG",
"value": "kabupaten tana tidung"
},
{
"label": "KABUPATEN NUNUKAN",
"value": "kabupaten nunukan"
},
{
"label": "KOTA TARAKAN",
"value": "kota tarakan"
},
{
"label": "KABUPATEN BOLAANG MONGONDOW",
"value": "kabupaten bolaang mongondow"
},
{
"label": "KABUPATEN MINAHASA",
"value": "kabupaten minahasa"
},
{
"label": "KABUPATEN KEPULAUAN SANGIHE",
"value": "kabupaten kepulauan sangihe"
},
{
"label": "KABUPATEN KEPULAUAN TALAUD",
"value": "kabupaten kepulauan talaud"
},
{
"label": "KABUPATEN MINAHASA SELATAN",
"value": "kabupaten minahasa selatan"
},
{
"label": "KABUPATEN MINAHASA UTARA",
"value": "kabupaten minahasa utara"
},
{
"label": "KABUPATEN BOLAANG MONGONDOW UTARA",
"value": "kabupaten bolaang mongondow utara"
},
{
"label": "KABUPATEN SIAU TAGULANDANG BIARO",
"value": "kabupaten siau tagulandang biaro"
},
{
"label": "KABUPATEN MINAHASA TENGGARA",
"value": "kabupaten minahasa tenggara"
},
{
"label": "KABUPATEN BOLAANG MONGONDOW SELATAN",
"value": "kabupaten bolaang mongondow selatan"
},
{
"label": "KABUPATEN BOLAANG MONGONDOW TIMUR",
"value": "kabupaten bolaang mongondow timur"
},
{
"label": "KOTA MANADO",
"value": "kota manado"
},
{
"label": "KOTA BITUNG",
"value": "kota bitung"
},
{
"label": "KOTA TOMOHON",
"value": "kota tomohon"
},
{
"label": "KOTA KOTAMOBAGU",
"value": "kota kotamobagu"
},
{
"label": "KABUPATEN BANGGAI KEPULAUAN",
"value": "kabupaten banggai kepulauan"
},
{
"label": "KABUPATEN BANGGAI",
"value": "kabupaten banggai"
},
{
"label": "KABUPATEN MOROWALI",
"value": "kabupaten morowali"
},
{
"label": "KABUPATEN POSO",
"value": "kabupaten poso"
},
{
"label": "KABUPATEN DONGGALA",
"value": "kabupaten donggala"
},
{
"label": "KABUPATEN TOLI-TOLI",
"value": "kabupaten toli-toli"
},
{
"label": "KABUPATEN BUOL",
"value": "kabupaten buol"
},
{
"label": "KABUPATEN PARIGI MOUTONG",
"value": "kabupaten parigi moutong"
},
{
"label": "KABUPATEN TOJO UNA-UNA",
"value": "kabupaten tojo una-una"
},
{
"label": "KABUPATEN SIGI",
"value": "kabupaten sigi"
},
{
"label": "KABUPATEN BANGGAI LAUT",
"value": "kabupaten banggai laut"
},
{
"label": "KABUPATEN MOROWALI UTARA",
"value": "kabupaten morowali utara"
},
{
"label": "KOTA PALU",
"value": "kota palu"
},
{
"label": "KABUPATEN KEPULAUAN SELAYAR",
"value": "kabupaten kepulauan selayar"
},
{
"label": "KABUPATEN BULUKUMBA",
"value": "kabupaten bulukumba"
},
{
"label": "KABUPATEN BANTAENG",
"value": "kabupaten bantaeng"
},
{
"label": "KABUPATEN JENEPONTO",
"value": "kabupaten jeneponto"
},
{
"label": "KABUPATEN TAKALAR",
"value": "kabupaten takalar"
},
{
"label": "KABUPATEN GOWA",
"value": "kabupaten gowa"
},
{
"label": "KABUPATEN SINJAI",
"value": "kabupaten sinjai"
},
{
"label": "KABUPATEN MAROS",
"value": "kabupaten maros"
},
{
"label": "KABUPATEN PANGKAJENE DAN KEPULAUAN",
"value": "kabupaten pangkajene dan kepulauan"
},
{
"label": "KABUPATEN BARRU",
"value": "kabupaten barru"
},
{
"label": "KABUPATEN BONE",
"value": "kabupaten bone"
},
{
"label": "KABUPATEN SOPPENG",
"value": "kabupaten soppeng"
},
{
"label": "KABUPATEN WAJO",
"value": "kabupaten wajo"
},
{
"label": "KABUPATEN SIDENRENG RAPPANG",
"value": "kabupaten sidenreng rappang"
},
{
"label": "KABUPATEN PINRANG",
"value": "kabupaten pinrang"
},
{
"label": "KABUPATEN ENREKANG",
"value": "kabupaten enrekang"
},
{
"label": "KABUPATEN LUWU",
"value": "kabupaten luwu"
},
{
"label": "KABUPATEN TANA TORAJA",
"value": "kabupaten tana toraja"
},
{
"label": "KABUPATEN LUWU UTARA",
"value": "kabupaten luwu utara"
},
{
"label": "KABUPATEN LUWU TIMUR",
"value": "kabupaten luwu timur"
},
{
"label": "KABUPATEN TORAJA UTARA",
"value": "kabupaten toraja utara"
},
{
"label": "KOTA MAKASSAR",
"value": "kota makassar"
},
{
"label": "KOTA PAREPARE",
"value": "kota parepare"
},
{
"label": "KOTA PALOPO",
"value": "kota palopo"
},
{
"label": "KABUPATEN BUTON",
"value": "kabupaten buton"
},
{
"label": "KABUPATEN MUNA",
"value": "kabupaten muna"
},
{
"label": "KABUPATEN KONAWE",
"value": "kabupaten konawe"
},
{
"label": "KABUPATEN KOLAKA",
"value": "kabupaten kolaka"
},
{
"label": "KABUPATEN KONAWE SELATAN",
"value": "kabupaten konawe selatan"
},
{
"label": "KABUPATEN BOMBANA",
"value": "kabupaten bombana"
},
{
"label": "KABUPATEN WAKATOBI",
"value": "kabupaten wakatobi"
},
{
"label": "KABUPATEN KOLAKA UTARA",
"value": "kabupaten kolaka utara"
},
{
"label": "KABUPATEN BUTON UTARA",
"value": "kabupaten buton utara"
},
{
"label": "KABUPATEN KONAWE UTARA",
"value": "kabupaten konawe utara"
},
{
"label": "KABUPATEN KOLAKA TIMUR",
"value": "kabupaten kolaka timur"
},
{
"label": "KABUPATEN KONAWE KEPULAUAN",
"value": "kabupaten konawe kepulauan"
},
{
"label": "KABUPATEN MUNA BARAT",
"value": "kabupaten muna barat"
},
{
"label": "KABUPATEN BUTON TENGAH",
"value": "kabupaten buton tengah"
},
{
"label": "KABUPATEN BUTON SELATAN",
"value": "kabupaten buton selatan"
},
{
"label": "KOTA KENDARI",
"value": "kota kendari"
},
{
"label": "KOTA BAUBAU",
"value": "kota baubau"
},
{
"label": "KABUPATEN BOALEMO",
"value": "kabupaten boalemo"
},
{
"label": "KABUPATEN GORONTALO",
"value": "kabupaten gorontalo"
},
{
"label": "KABUPATEN POHUWATO",
"value": "kabupaten pohuwato"
},
{
"label": "KABUPATEN BONE BOLANGO",
"value": "kabupaten bone bolango"
},
{
"label": "KABUPATEN GORONTALO UTARA",
"value": "kabupaten gorontalo utara"
},
{
"label": "KOTA GORONTALO",
"value": "kota gorontalo"
},
{
"label": "KABUPATEN MAJENE",
"value": "kabupaten majene"
},
{
"label": "KABUPATEN POLEWALI MANDAR",
"value": "kabupaten polewali mandar"
},
{
"label": "KABUPATEN MAMASA",
"value": "kabupaten mamasa"
},
{
"label": "KABUPATEN MAMUJU",
"value": "kabupaten mamuju"
},
{
"label": "KABUPATEN MAMUJU UTARA",
"value": "kabupaten mamuju utara"
},
{
"label": "KABUPATEN MAMUJU TENGAH",
"value": "kabupaten mamuju tengah"
},
{
"label": "KABUPATEN MALUKU TENGGARA BARAT",
"value": "kabupaten maluku tenggara barat"
},
{
"label": "KABUPATEN MALUKU TENGGARA",
"value": "kabupaten maluku tenggara"
},
{
"label": "KABUPATEN MALUKU TENGAH",
"value": "kabupaten maluku tengah"
},
{
"label": "KABUPATEN BURU",
"value": "kabupaten buru"
},
{
"label": "KABUPATEN KEPULAUAN ARU",
"value": "kabupaten kepulauan aru"
},
{
"label": "KABUPATEN SERAM BAGIAN BARAT",
"value": "kabupaten seram bagian barat"
},
{
"label": "KABUPATEN SERAM BAGIAN TIMUR",
"value": "kabupaten seram bagian timur"
},
{
"label": "KABUPATEN MALUKU BARAT DAYA",
"value": "kabupaten maluku barat daya"
},
{
"label": "KABUPATEN BURU SELATAN",
"value": "kabupaten buru selatan"
},
{
"label": "KOTA AMBON",
"value": "kota ambon"
},
{
"label": "KOTA TUAL",
"value": "kota tual"
},
{
"label": "KABUPATEN HALMAHERA BARAT",
"value": "kabupaten halmahera barat"
},
{
"label": "KABUPATEN HALMAHERA TENGAH",
"value": "kabupaten halmahera tengah"
},
{
"label": "KABUPATEN KEPULAUAN SULA",
"value": "kabupaten kepulauan sula"
},
{
"label": "KABUPATEN HALMAHERA SELATAN",
"value": "kabupaten halmahera selatan"
},
{
"label": "KABUPATEN HALMAHERA UTARA",
"value": "kabupaten halmahera utara"
},
{
"label": "KABUPATEN HALMAHERA TIMUR",
"value": "kabupaten halmahera timur"
},
{
"label": "KABUPATEN PULAU MOROTAI",
"value": "kabupaten pulau morotai"
},
{
"label": "KABUPATEN PULAU TALIABU",
"value": "kabupaten pulau taliabu"
},
{
"label": "KOTA TERNATE",
"value": "kota ternate"
},
{
"label": "KOTA TIDORE KEPULAUAN",
"value": "kota tidore kepulauan"
},
{
"label": "KABUPATEN FAKFAK",
"value": "kabupaten fakfak"
},
{
"label": "KABUPATEN KAIMANA",
"value": "kabupaten kaimana"
},
{
"label": "KABUPATEN TELUK WONDAMA",
"value": "kabupaten teluk wondama"
},
{
"label": "KABUPATEN TELUK BINTUNI",
"value": "kabupaten teluk bintuni"
},
{
"label": "KABUPATEN MANOKWARI",
"value": "kabupaten manokwari"
},
{
"label": "KABUPATEN SORONG SELATAN",
"value": "kabupaten sorong selatan"
},
{
"label": "KABUPATEN SORONG",
"value": "kabupaten sorong"
},
{
"label": "KABUPATEN RAJA AMPAT",
"value": "kabupaten raja ampat"
},
{
"label": "KABUPATEN TAMBRAUW",
"value": "kabupaten tambrauw"
},
{
"label": "KABUPATEN MAYBRAT",
"value": "kabupaten maybrat"
},
{
"label": "KABUPATEN MANOKWARI SELATAN",
"value": "kabupaten manokwari selatan"
},
{
"label": "KABUPATEN PEGUNUNGAN ARFAK",
"value": "kabupaten pegunungan arfak"
},
{
"label": "KOTA SORONG",
"value": "kota sorong"
},
{
"label": "KABUPATEN MERAUKE",
"value": "kabupaten merauke"
},
{
"label": "KABUPATEN JAYAWIJAYA",
"value": "kabupaten jayawijaya"
},
{
"label": "KABUPATEN JAYAPURA",
"value": "kabupaten jayapura"
},
{
"label": "KABUPATEN NABIRE",
"value": "kabupaten nabire"
},
{
"label": "KABUPATEN KEPULAUAN YAPEN",
"value": "kabupaten kepulauan yapen"
},
{
"label": "KABUPATEN BIAK NUMFOR",
"value": "kabupaten biak numfor"
},
{
"label": "KABUPATEN PANIAI",
"value": "kabupaten paniai"
},
{
"label": "KABUPATEN PUNCAK JAYA",
"value": "kabupaten puncak jaya"
},
{
"label": "KABUPATEN MIMIKA",
"value": "kabupaten mimika"
},
{
"label": "KABUPATEN BOVEN DIGOEL",
"value": "kabupaten boven digoel"
},
{
"label": "KABUPATEN MAPPI",
"value": "kabupaten mappi"
},
{
"label": "KABUPATEN ASMAT",
"value": "kabupaten asmat"
},
{
"label": "KABUPATEN YAHUKIMO",
"value": "kabupaten yahukimo"
},
{
"label": "KABUPATEN PEGUNUNGAN BINTANG",
"value": "kabupaten pegunungan bintang"
},
{
"label": "KABUPATEN TOLIKARA",
"value": "kabupaten tolikara"
},
{
"label": "KABUPATEN SARMI",
"value": "kabupaten sarmi"
},
{
"label": "KABUPATEN KEEROM",
"value": "kabupaten keerom"
},
{
"label": "KABUPATEN WAROPEN",
"value": "kabupaten waropen"
},
{
"label": "KABUPATEN SUPIORI",
"value": "kabupaten supiori"
},
{
"label": "KABUPATEN MAMBERAMO RAYA",
"value": "kabupaten mamberamo raya"
},
{
"label": "KABUPATEN NDUGA",
"value": "kabupaten nduga"
},
{
"label": "KABUPATEN LANNY JAYA",
"value": "kabupaten lanny jaya"
},
{
"label": "KABUPATEN MAMBERAMO TENGAH",
"value": "kabupaten mamberamo tengah"
},
{
"label": "KABUPATEN YALIMO",
"value": "kabupaten yalimo"
},
{
"label": "KABUPATEN PUNCAK",
"value": "kabupaten puncak"
},
{
"label": "KABUPATEN DOGIYAI",
"value": "kabupaten dogiyai"
},
{
"label": "KABUPATEN INTAN JAYA",
"value": "kabupaten intan jaya"
},
{
"label": "KABUPATEN DEIYAI",
"value": "kabupaten deiyai"
},
{
"label": "KOTA JAYAPURA",
"value": "kota jayapura"
}
]
}',
                    'relation' => NULL,
                    'order' => '12',
                ),
                12 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'country',
                    'type' => 'select',
                    'display_name' => 'Negara',
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
"label": "AFGHANISTAN",
"value": "Afghanistan"
},
{
"label": "ÅLAND ISLANDS",
"value": "Åland Islands"
},
{
"label": "ALBANIA",
"value": "Albania"
},
{
"label": "ALGERIA",
"value": "Algeria"
},
{
"label": "AMERICAN SAMOA",
"value": "American Samoa"
},
{
"label": "ANDORRA",
"value": "AndorrA"
},
{
"label": "ANGOLA",
"value": "Angola"
},
{
"label": "ANGUILLA",
"value": "Anguilla"
},
{
"label": "ANTARCTICA",
"value": "Antarctica"
},
{
"label": "ANTIGUA AND BARBUDA",
"value": "Antigua and Barbuda"
},
{
"label": "ARGENTINA",
"value": "Argentina"
},
{
"label": "ARMENIA",
"value": "Armenia"
},
{
"label": "ARUBA",
"value": "Aruba"
},
{
"label": "AUSTRALIA",
"value": "Australia"
},
{
"label": "AUSTRIA",
"value": "Austria"
},
{
"label": "AZERBAIJAN",
"value": "Azerbaijan"
},
{
"label": "BAHAMAS",
"value": "Bahamas"
},
{
"label": "BAHRAIN",
"value": "Bahrain"
},
{
"label": "BANGLADESH",
"value": "Bangladesh"
},
{
"label": "BARBADOS",
"value": "Barbados"
},
{
"label": "BELARUS",
"value": "Belarus"
},
{
"label": "BELGIUM",
"value": "Belgium"
},
{
"label": "BELIZE",
"value": "Belize"
},
{
"label": "BENIN",
"value": "Benin"
},
{
"label": "BERMUDA",
"value": "Bermuda"
},
{
"label": "BHUTAN",
"value": "Bhutan"
},
{
"label": "BOLIVIA",
"value": "Bolivia"
},
{
"label": "BOSNIA AND HERZEGOVINA",
"value": "Bosnia and Herzegovina"
},
{
"label": "BOTSWANA",
"value": "Botswana"
},
{
"label": "BOUVET ISLAND",
"value": "Bouvet Island"
},
{
"label": "BRAZIL",
"value": "Brazil"
},
{
"label": "BRITISH INDIAN OCEAN TERRITORY",
"value": "British Indian Ocean Territory"
},
{
"label": "BRUNEI DARUSSALAM",
"value": "Brunei Darussalam"
},
{
"label": "BULGARIA",
"value": "Bulgaria"
},
{
"label": "BURKINA FASO",
"value": "Burkina Faso"
},
{
"label": "BURUNDI",
"value": "Burundi"
},
{
"label": "CAMBODIA",
"value": "Cambodia"
},
{
"label": "CAMEROON",
"value": "Cameroon"
},
{
"label": "CANADA",
"value": "Canada"
},
{
"label": "CAPE VERDE",
"value": "Cape Verde"
},
{
"label": "CAYMAN ISLANDS",
"value": "Cayman Islands"
},
{
"label": "CENTRAL AFRICAN REPUBLIC",
"value": "Central African Republic"
},
{
"label": "CHAD",
"value": "Chad"
},
{
"label": "CHILE",
"value": "Chile"
},
{
"label": "CHINA",
"value": "China"
},
{
"label": "CHRISTMAS ISLAND",
"value": "Christmas Island"
},
{
"label": "COCOS (KEELING) ISLANDS",
"value": "Cocos (Keeling) Islands"
},
{
"label": "COLOMBIA",
"value": "Colombia"
},
{
"label": "COMOROS",
"value": "Comoros"
},
{
"label": "CONGO",
"value": "Congo"
},
{
"label": "CONGO, THE DEMOCRATIC REPUBLIC OF THE",
"value": "Congo, The Democratic Republic of the"
},
{
"label": "COOK ISLANDS",
"value": "Cook Islands"
},
{
"label": "COSTA RICA",
"value": "Costa Rica"
},
{
"label": "COTE D\'IVOIRE",
"value": "Cote D\'Ivoire"
},
{
"label": "CROATIA",
"value": "Croatia"
},
{
"label": "CUBA",
"value": "Cuba"
},
{
"label": "CYPRUS",
"value": "Cyprus"
},
{
"label": "CZECH REPUBLIC",
"value": "Czech Republic"
},
{
"label": "DENMARK",
"value": "Denmark"
},
{
"label": "DJIBOUTI",
"value": "Djibouti"
},
{
"label": "DOMINICA",
"value": "Dominica"
},
{
"label": "DOMINICAN REPUBLIC",
"value": "Dominican Republic"
},
{
"label": "ECUADOR",
"value": "Ecuador"
},
{
"label": "EGYPT",
"value": "Egypt"
},
{
"label": "EL SALVADOR",
"value": "El Salvador"
},
{
"label": "EQUATORIAL GUINEA",
"value": "Equatorial Guinea"
},
{
"label": "ERITREA",
"value": "Eritrea"
},
{
"label": "ESTONIA",
"value": "Estonia"
},
{
"label": "ETHIOPIA",
"value": "Ethiopia"
},
{
"label": "FALKLAND ISLANDS (MALVINAS)",
"value": "Falkland Islands (Malvinas)"
},
{
"label": "FAROE ISLANDS",
"value": "Faroe Islands"
},
{
"label": "FIJI",
"value": "Fiji"
},
{
"label": "FINLAND",
"value": "Finland"
},
{
"label": "FRANCE",
"value": "France"
},
{
"label": "FRENCH GUIANA",
"value": "French Guiana"
},
{
"label": "FRENCH POLYNESIA",
"value": "French Polynesia"
},
{
"label": "FRENCH SOUTHERN TERRITORIES",
"value": "French Southern Territories"
},
{
"label": "GABON",
"value": "Gabon"
},
{
"label": "GAMBIA",
"value": "Gambia"
},
{
"label": "GEORGIA",
"value": "Georgia"
},
{
"label": "GERMANY",
"value": "Germany"
},
{
"label": "GHANA",
"value": "Ghana"
},
{
"label": "GIBRALTAR",
"value": "Gibraltar"
},
{
"label": "GREECE",
"value": "Greece"
},
{
"label": "GREENLAND",
"value": "Greenland"
},
{
"label": "GRENADA",
"value": "Grenada"
},
{
"label": "GUADELOUPE",
"value": "Guadeloupe"
},
{
"label": "GUAM",
"value": "Guam"
},
{
"label": "GUATEMALA",
"value": "Guatemala"
},
{
"label": "GUERNSEY",
"value": "Guernsey"
},
{
"label": "GUINEA",
"value": "Guinea"
},
{
"label": "GUINEA-BISSAU",
"value": "Guinea-Bissau"
},
{
"label": "GUYANA",
"value": "Guyana"
},
{
"label": "HAITI",
"value": "Haiti"
},
{
"label": "HEARD ISLAND AND MCDONALD ISLANDS",
"value": "Heard Island and Mcdonald Islands"
},
{
"label": "HOLY SEE (VATICAN CITY STATE)",
"value": "Holy See (Vatican City State)"
},
{
"label": "HONDURAS",
"value": "Honduras"
},
{
"label": "HONG KONG",
"value": "Hong Kong"
},
{
"label": "HUNGARY",
"value": "Hungary"
},
{
"label": "ICELAND",
"value": "Iceland"
},
{
"label": "INDIA",
"value": "India"
},
{
"label": "INDONESIA",
"value": "Indonesia"
},
{
"label": "IRAN, ISLAMIC REPUBLIC OF",
"value": "Iran, Islamic Republic Of"
},
{
"label": "IRAQ",
"value": "Iraq"
},
{
"label": "IRELAND",
"value": "Ireland"
},
{
"label": "ISLE OF MAN",
"value": "Isle of Man"
},
{
"label": "ISRAEL",
"value": "Israel"
},
{
"label": "ITALY",
"value": "Italy"
},
{
"label": "JAMAICA",
"value": "Jamaica"
},
{
"label": "JAPAN",
"value": "Japan"
},
{
"label": "JERSEY",
"value": "Jersey"
},
{
"label": "JORDAN",
"value": "Jordan"
},
{
"label": "KAZAKHSTAN",
"value": "Kazakhstan"
},
{
"label": "KENYA",
"value": "Kenya"
},
{
"label": "KIRIBATI",
"value": "Kiribati"
},
{
"label": "KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF",
"value": "Korea, Democratic People\'S Republic of"
},
{
"label": "KOREA, REPUBLIC OF",
"value": "Korea, Republic of"
},
{
"label": "KUWAIT",
"value": "Kuwait"
},
{
"label": "KYRGYZSTAN",
"value": "Kyrgyzstan"
},
{
"label": "LAO PEOPLE\'S DEMOCRATIC REPUBLIC",
"value": "Lao People\'S Democratic Republic"
},
{
"label": "LATVIA",
"value": "Latvia"
},
{
"label": "LEBANON",
"value": "Lebanon"
},
{
"label": "LESOTHO",
"value": "Lesotho"
},
{
"label": "LIBERIA",
"value": "Liberia"
},
{
"label": "LIBYAN ARAB JAMAHIRIYA",
"value": "Libyan Arab Jamahiriya"
},
{
"label": "LIECHTENSTEIN",
"value": "Liechtenstein"
},
{
"label": "LITHUANIA",
"value": "Lithuania"
},
{
"label": "LUXEMBOURG",
"value": "Luxembourg"
},
{
"label": "MACAO",
"value": "Macao"
},
{
"label": "MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF",
"value": "Macedonia, The Former Yugoslav Republic of"
},
{
"label": "MADAGASCAR",
"value": "Madagascar"
},
{
"label": "MALAWI",
"value": "Malawi"
},
{
"label": "MALAYSIA",
"value": "Malaysia"
},
{
"label": "MALDIVES",
"value": "Maldives"
},
{
"label": "MALI",
"value": "Mali"
},
{
"label": "MALTA",
"value": "Malta"
},
{
"label": "MARSHALL ISLANDS",
"value": "Marshall Islands"
},
{
"label": "MARTINIQUE",
"value": "Martinique"
},
{
"label": "MAURITANIA",
"value": "Mauritania"
},
{
"label": "MAURITIUS",
"value": "Mauritius"
},
{
"label": "MAYOTTE",
"value": "Mayotte"
},
{
"label": "MEXICO",
"value": "Mexico"
},
{
"label": "MICRONESIA, FEDERATED STATES OF",
"value": "Micronesia, Federated States of"
},
{
"label": "MOLDOVA, REPUBLIC OF",
"value": "Moldova, Republic of"
},
{
"label": "MONACO",
"value": "Monaco"
},
{
"label": "MONGOLIA",
"value": "Mongolia"
},
{
"label": "MONTSERRAT",
"value": "Montserrat"
},
{
"label": "MOROCCO",
"value": "Morocco"
},
{
"label": "MOZAMBIQUE",
"value": "Mozambique"
},
{
"label": "MYANMAR",
"value": "Myanmar"
},
{
"label": "NAMIBIA",
"value": "Namibia"
},
{
"label": "NAURU",
"value": "Nauru"
},
{
"label": "NEPAL",
"value": "Nepal"
},
{
"label": "NETHERLANDS",
"value": "Netherlands"
},
{
"label": "NETHERLANDS ANTILLES",
"value": "Netherlands Antilles"
},
{
"label": "NEW CALEDONIA",
"value": "New Caledonia"
},
{
"label": "NEW ZEALAND",
"value": "New Zealand"
},
{
"label": "NICARAGUA",
"value": "Nicaragua"
},
{
"label": "NIGER",
"value": "Niger"
},
{
"label": "NIGERIA",
"value": "Nigeria"
},
{
"label": "NIUE",
"value": "Niue"
},
{
"label": "NORFOLK ISLAND",
"value": "Norfolk Island"
},
{
"label": "NORTHERN MARIANA ISLANDS",
"value": "Northern Mariana Islands"
},
{
"label": "NORWAY",
"value": "Norway"
},
{
"label": "OMAN",
"value": "Oman"
},
{
"label": "PAKISTAN",
"value": "Pakistan"
},
{
"label": "PALAU",
"value": "Palau"
},
{
"label": "PALESTINIAN TERRITORY, OCCUPIED",
"value": "Palestinian Territory, Occupied"
},
{
"label": "PANAMA",
"value": "Panama"
},
{
"label": "PAPUA NEW GUINEA",
"value": "Papua New Guinea"
},
{
"label": "PARAGUAY",
"value": "Paraguay"
},
{
"label": "PERU",
"value": "Peru"
},
{
"label": "PHILIPPINES",
"value": "Philippines"
},
{
"label": "PITCAIRN",
"value": "Pitcairn"
},
{
"label": "POLAND",
"value": "Poland"
},
{
"label": "PORTUGAL",
"value": "Portugal"
},
{
"label": "PUERTO RICO",
"value": "Puerto Rico"
},
{
"label": "QATAR",
"value": "Qatar"
},
{
"label": "REUNION",
"value": "Reunion"
},
{
"label": "ROMANIA",
"value": "Romania"
},
{
"label": "RUSSIAN FEDERATION",
"value": "Russian Federation"
},
{
"label": "RWANDA",
"value": "RWANDA"
},
{
"label": "SAINT HELENA",
"value": "Saint Helena"
},
{
"label": "SAINT KITTS AND NEVIS",
"value": "Saint Kitts and Nevis"
},
{
"label": "SAINT LUCIA",
"value": "Saint Lucia"
},
{
"label": "SAINT PIERRE AND MIQUELON",
"value": "Saint Pierre and Miquelon"
},
{
"label": "SAINT VINCENT AND THE GRENADINES",
"value": "Saint Vincent and the Grenadines"
},
{
"label": "SAMOA",
"value": "Samoa"
},
{
"label": "SAN MARINO",
"value": "San Marino"
},
{
"label": "SAO TOME AND PRINCIPE",
"value": "Sao Tome and Principe"
},
{
"label": "SAUDI ARABIA",
"value": "Saudi Arabia"
},
{
"label": "SENEGAL",
"value": "Senegal"
},
{
"label": "SERBIA AND MONTENEGRO",
"value": "Serbia and Montenegro"
},
{
"label": "SEYCHELLES",
"value": "Seychelles"
},
{
"label": "SIERRA LEONE",
"value": "Sierra Leone"
},
{
"label": "SINGAPORE",
"value": "Singapore"
},
{
"label": "SLOVAKIA",
"value": "Slovakia"
},
{
"label": "SLOVENIA",
"value": "Slovenia"
},
{
"label": "SOLOMON ISLANDS",
"value": "Solomon Islands"
},
{
"label": "SOMALIA",
"value": "Somalia"
},
{
"label": "SOUTH AFRICA",
"value": "South Africa"
},
{
"label": "SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS",
"value": "South Georgia and the South Sandwich Islands"
},
{
"label": "SPAIN",
"value": "Spain"
},
{
"label": "SRI LANKA",
"value": "Sri Lanka"
},
{
"label": "SUDAN",
"value": "Sudan"
},
{
"label": "SURINAME",
"value": "Suriname"
},
{
"label": "SVALBARD AND JAN MAYEN",
"value": "Svalbard and Jan Mayen"
},
{
"label": "SWAZILAND",
"value": "Swaziland"
},
{
"label": "SWEDEN",
"value": "Sweden"
},
{
"label": "SWITZERLAND",
"value": "Switzerland"
},
{
"label": "SYRIAN ARAB REPUBLIC",
"value": "Syrian Arab Republic"
},
{
"label": "TAIWAN, PROVINCE OF CHINA",
"value": "Taiwan, Province of China"
},
{
"label": "TAJIKISTAN",
"value": "Tajikistan"
},
{
"label": "TANZANIA, UNITED REPUBLIC OF",
"value": "Tanzania, United Republic of"
},
{
"label": "THAILAND",
"value": "Thailand"
},
{
"label": "TIMOR-LESTE",
"value": "Timor-Leste"
},
{
"label": "TOGO",
"value": "Togo"
},
{
"label": "TOKELAU",
"value": "Tokelau"
},
{
"label": "TONGA",
"value": "Tonga"
},
{
"label": "TRINIDAD AND TOBAGO",
"value": "Trinidad and Tobago"
},
{
"label": "TUNISIA",
"value": "Tunisia"
},
{
"label": "TURKEY",
"value": "Turkey"
},
{
"label": "TURKMENISTAN",
"value": "Turkmenistan"
},
{
"label": "TURKS AND CAICOS ISLANDS",
"value": "Turks and Caicos Islands"
},
{
"label": "TUVALU",
"value": "Tuvalu"
},
{
"label": "UGANDA",
"value": "Uganda"
},
{
"label": "UKRAINE",
"value": "Ukraine"
},
{
"label": "UNITED ARAB EMIRATES",
"value": "United Arab Emirates"
},
{
"label": "UNITED KINGDOM",
"value": "United Kingdom"
},
{
"label": "UNITED STATES",
"value": "United States"
},
{
"label": "UNITED STATES MINOR OUTLYING ISLANDS",
"value": "United States Minor Outlying Islands"
},
{
"label": "URUGUAY",
"value": "Uruguay"
},
{
"label": "UZBEKISTAN",
"value": "Uzbekistan"
},
{
"label": "VANUATU",
"value": "Vanuatu"
},
{
"label": "VENEZUELA",
"value": "Venezuela"
},
{
"label": "VIET NAM",
"value": "Viet Nam"
},
{
"label": "VIRGIN ISLANDS, BRITISH",
"value": "Virgin Islands, British"
},
{
"label": "VIRGIN ISLANDS, U.S.",
"value": "Virgin Islands, U.S."
},
{
"label": "WALLIS AND FUTUNA",
"value": "Wallis and Futuna"
},
{
"label": "WESTERN SAHARA",
"value": "Western Sahara"
},
{
"label": "YEMEN",
"value": "Yemen"
},
{
"label": "ZAMBIA",
"value": "Zambia"
},
{
"label": "ZIMBABWE",
"value": "Zimbabwe"
}
]
}',
                    'relation' => NULL,
                    'order' => '13',
                ),
                13 => 
                array (
                    'data_type_id' => $data_type->id,
                    'field' => 'policy',
                    'type' => 'textarea',
                    'display_name' => 'Kebijakan',
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
                    'field' => 'description',
                    'type' => 'textarea',
                    'display_name' => 'Deskripsi',
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
                    'order' => '16',
                ),
                16 => 
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
                    'order' => '17',
                ),
                17 => 
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
                    'order' => '18',
                ),
                18 => 
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
                    'order' => '19',
                ),
                19 => 
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
                    'order' => '20',
                ),
            ));

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

            throw new Exception('exception occur ' . $e);
        }
    }
}

