<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IjazahModel extends Base_Model
{
    public function __construct()
    {
        $model = array(
            'table' => array(
                'name' => 'v_ijazah',
                'primary' => 'siswa_id',
                'fields' => array(
                    array('name' => 'siswa_id', 'unique' => true),
                    array('name' => 'siswa_no_un'),
                    array('name' => 'siswa_nama'),
                    array('name' => 'siswa_nisn'),
                    array('name' => 'siswa_tempat_lahir'),
                    array('name' => 'siswa_tgl_lahir'),
                    array('name' => 'ayah_nama'),
                )
            ),
        );
        parent::__construct($model);
    }
}
