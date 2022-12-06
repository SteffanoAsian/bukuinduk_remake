<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{
    private $table = 'v_siswa';

    public function store($id =null , $dataIns = null)
    {
        return $this->db->insert($this->table, $dataIns);
    }

    public function read($id = null)
    {
        if(is_array($id)){
            $where = $id;
        }else{
            $where = ['siswa_id'=>$id];
        }

        $query = $this->db->get_where($this->table, $where)->row_array();

        return $query;
    }

    public function select($where = null)
    {
        $query = $this->db->get_where($this->table, $where)->result_array();
        
        $res = [
            'success'=> $query ? true : false,
            'total' => count($query),
            'data' => $query,
        ];

        return $res;
    }

    public function update($where = null, $data = null)
    {
        return $this->db->update($this->table, $data, $where);
    }

    public function delete($id = null)
    {
        if(is_array($id)){
            $where = $id;
        }else{
            $where = ['siswa_id'=>$id];
        }
        $this->db->delete($this->table, $where);
    }

}