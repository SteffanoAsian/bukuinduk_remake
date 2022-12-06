<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base_Model extends CI_Model
{
    private $model = null;
    function __construct(&$model_config = null)
    {
        parent::__construct();
        $this->model = $model_config;
        $this->primary = $this->model['table']['primary'];
        $this->table = $this->model['table']['name'];
    }

    public function store($id = null, $dataIns = null, $returnLog = true)
    {
        $query =  $this->db->insert($this->table, $dataIns);
        if ($returnLog) {
            $res = [
                'success' => $query ? true : false,
                'message' => $query ? 'Successfully Saved Data' : 'Failed to Save Data, Please Contact your System Administrator',
                'record' => $this->read($id),
            ];
        } else {
            $res = [
                'success' => $query ? true : false,
                'message' => $query ? 'Successfully Save Data' : 'Failed to Save Data, Please Contact your System Administrator',
            ];
        }

        return $res;
    }

    public function read($id = null)
    {
        if (is_array($id)) {
            $where = $id;
        } else {
            $where = [$this->primary => $id];
        }

        $query = $this->db->get_where($this->table, $where)->row_array();

        return $query;
    }

    public function select($where = null)
    {
        $query = $this->db->get_where($this->table, $where)->result_array();

        $res = [
            'success' => $query ? true : false,
            'total' => count($query),
            'data' => $query,
        ];

        return $res;
    }

    public function update($id = null, $data = null, $returnLog = true)
    {
        if (is_array($id)) {
            $where = $id;
        } else {
            $where = [$this->primary => $id];
        }
        // print_r($where);
        // exit;
        $query = $this->db->update($this->table, $data, $where);
        if ($returnLog) {
            $res = [
                'success' => $query ? true : false,
                'message' => $query ? 'Successfully Updated Data' : 'Failed to Update Data, Please Contact your System Administrator',
                'record' => $this->read($id),
            ];
        } else {
            $res = [
                'success' => $query ? true : false,
                'message' => $query ? 'Successfully Updated Data' : 'Failed to Update Data, Please Contact your System Administrator',
                'message' => 'Successfully Updated Data',
            ];
        }

        return $res;
    }

    public function delete($id = null)
    {
        if (is_array($id)) {
            $where = $id;
        } else {
            $where = [$this->primary => $id];
        }
        $query = $this->db->delete($this->table, $where);

        return $query;
    }
}
