<?php

namespace App\Models;

use CodeIgniter\Model;

class Books extends Model
{
    protected $table            = 'books';
    protected $primaryKey       = 'book_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'author_id', 'ISBN', 'quantity', 'available_quantity'];

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
        $builder = $this->db->table("books");
        return $builder;
    }
    public function button()
    {
        $button = function ($row) {
            return
                "
                <button class='btn btn-warning edit' data-id='" . $row['book_id'] . "'><i class='fa fa-pen'></i></button>
                <button class='btn btn-danger delete' data-id='" . $row['book_id'] . "'><i class='fa fa-trash'></i></button>
            ";
        };
        return $button;
    }
}
