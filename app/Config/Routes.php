<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'LibrarianUIController::index');
// $routes->get("books/index","BooksController::index");

// $routes->get('books/create', 'BooksController::create');
// $routes->post('books/store', 'BooksController::store');

// $routes->get('books/edit/(:num)', 'BooksController::edit/$1');
// $routes->post('books/update/(:num)', 'BooksController::update/$1');

// $routes->get('books/delete/(:num)', 'BooksController::delete/$1');
// $routes->get("Views/librarian/books.php","BooksController::index");
$routes->post("books/add", "BooksController::store");
$routes->post('books/view', "BooksController::create");
$routes->post('books/view/row', "BooksController::books_row");
$routes->post('books/delete', "BooksController::delete");
$routes->post('books/update', "BooksController::update");