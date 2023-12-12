<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use monken\TablesIgniter;
use App\Models\Authors;

class AuthorController extends BaseController
{
    public function index()
    {
        return view("Views/librarian/authorsView");
    }

    public function create()
    {
        $model = new Authors();
        $table = new TablesIgniter();
        $table->setTable($model->noticeTable())
            ->setOrder([null, "author_name"])
            ->setSearch(["author_id", "author_name"])
            ->setOutput(["author_id", "author_name", $model->button()]);
        return $table->getDatatable();
    }

    public function authors_row()
    {
        $model = new Authors();
        $id = $this->request->getVar('id');
        $data = $model->find($id);
        echo json_encode($data);
    }

    public function store()
    {
        $model = new Authors();
        $error = 0;
        $error_author_name = '';

        // Validation rules
        $rules = $this->validate([
            'author_name' => 'required|min_length[5]',
        ]);

        if (!$rules) {
            // Handle validation errors
            $validation = \Config\Services::validation();
            if ($validation->getError('author_name')) {
                $error_author_name = $validation->getError('author_name');
            }
        } else {
            // Validation passed, insert data into the database
            $error = 1;
            $data = [
                'author_name' => $this->request->getVar('author_name'),
            ];
            $model->save($data);
        }

        // Return JSON response
        $output = [
            'error' => $error,
            'error_author_name' => $error_author_name,
        ];
        echo json_encode($output);
    }

    public function update()
    {
        $model = new Authors();
        $id = $this->request->getVar('edit_id');
        $data = [
            'author_name' => $this->request->getVar('author_name')
        ];
        if($model->update($id, $data)){
            echo json_encode(array("status"=>1));
        }else{
            echo json_encode(array("status"=>0));
        }
    }
        
    

    public function delete()
    {
        $model = new Authors();
        $id = $this->request->getVar('id');
        if ($model->delete($id)) {
            
            echo json_encode(array("status" => 1));
        } else {
            echo json_encode(array("status" => 0));
        }
    }
}
