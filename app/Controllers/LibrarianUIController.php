<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LibrarianUIController extends BaseController
{
    public function index()
    {
        // return view('librarian/dashboard.php');
        return view("Views/librarian/authorsView.php");
    }
    public function books()
    {
        return view('librarian/dashboard.php');
    }
    public function authors()
    {
        return view('librarian/dashboard.php');
    }
    public function transactions()
    {
        return view('librarian/dashboard.php');
    }
    public function members()
    {
        return view('librarian/dashboard.php');
    }
}
