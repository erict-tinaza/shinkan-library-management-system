<?php

namespace App\Models;

use CodeIgniter\Model;


class Authors extends Model
{
    protected $table            = 'authors';
    protected $primaryKey       = 'author_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['author_name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function noticeTable()
    {
        $builder = $this->db->table("authors");
        return $builder;
    }
    public function button()
    {
        $button = function ($row) {
            return
                "
                <button class='btn btn-warning edit' data-id='" . $row['author_id'] . "'><i class='fa fa-pen'></i></button>
                <button class='btn btn-danger delete' data-id='" . $row['author_id'] . "'><i class='fa fa-trash'></i></button>
            ";
        };
        return $button;
    }
}

