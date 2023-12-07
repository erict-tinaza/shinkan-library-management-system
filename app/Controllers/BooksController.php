<?php

namespace App\Controllers;

use monken\TablesIgniter;
use App\Controllers\BaseController;
use App\Models\Books;
use app\Models\Authors;
use CodeIgniter\Database\SQLite3\Table;

class BooksController extends BaseController
{

    public function index()
    {
        return view("Views/librarian/books");
    }

    public function create()
    {
        $model = new Books();
        $table = new TablesIgniter();
        $table->setTable($model->noticeTable())
            ->setOrder([null, null, "title", null])
            ->setSearch(["book_id", "title", "author_id", "ISBN", "quantity", "available_quantity"])
            ->setOutput(["book_id", "title", "author_id", "ISBN", "quantity", "available_quantity", $model->button()]);
        return $table->getDatatable();
    }

    public function books_row()
    {
        $model = new Books();
        $id = $this->request->getVar('id');
        $data = $model->find($id);
        echo json_encode($data);
    }
    public function store()
    {
        $model = new Books();
        $error = 0;
        $error_title = '';
        $error_authorID = '';
        $error_isbn = '';
        $error_qty = '';
        $error_availQTY = '';

        // Validation rules
        $rules = $this->validate([
            'title' => 'required|min_length[5]',
            'author_id' => 'required',
            'isbn' => 'required|min_length[5]',
            'quantity' => 'required',
            'available_quantity' => 'required'
        ]);

        if (!$rules) {
            // Handle validation errors
            $validation = \Config\Services::validation();
            if ($validation->getError('title')) {
                $error_title = $validation->getError('title');
            }
            if ($validation->getError('author_id')) {
                $error_authorID = $validation->getError('author_id');
            }
            if ($validation->getError('isbn')) {
                $error_isbn = $validation->getError('isbn');
            }
            if ($validation->getError('quantity')) {
                $error_qty = $validation->getError('quantity');
            }
            if ($validation->getError('available_quantity')) {
                $error_availQTY = $validation->getError('available_quantity');
            }
        } else {
            // Validation passed, insert data into the database
            $error = 1;
            $data = [
                'title' => $this->request->getVar('title'),
                'author_id' => $this->request->getVar('author_id'),
                'isbn' => $this->request->getVar('isbn'),
                'quantity' => $this->request->getVar('quantity'),
                'available_quantity' => $this->request->getVar('available_quantity')
            ];
            $model->save($data);
        }

        // Return JSON response
        $output = [
            'error' => $error,
            'error_title' => $error_title,
            'error_authorID' => $error_authorID,
            'error_isbn' => $error_isbn,
            'error_qty' => $error_qty,
            'error_availQTY' => $error_availQTY
            // 'error_description' => $error_description
        ];
        echo json_encode($output);
    }



    public function update()
    {
        $model = new Books();
        $id = $this->request->getVar('edit_id');
        $data = [
            'title' => $this->request->getVar('title'),
                'author_id' => $this->request->getVar('author_id'),
                'isbn' => $this->request->getVar('isbn'),
                'quantity' => $this->request->getVar('quantity'),
                'available_quantity' => $this->request->getVar('available_quantity')
        ];
        if ($model->update($id, $data)) {
            echo json_encode(array("status" => 1));
        } else {
            echo json_encode(array("status" => 0));
        }
    }
    public function delete()
    {
        $model = new Books();
        $id = $this->request->getVar('id');
        if($model->delete($id)){
            echo json_encode(array("status"=>1));
        }else{
            echo json_encode(array("status"=>0));
        }
    }
}
