<?php namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests;

class BookController extends Controller {

	public function getAll()
    {
        $page = \Request::input('page', 1);
        $perPage = \Request::input('number', 10);

        $res['filter'] = [
            'page' => $page,
            'number' => $perPage
        ];

        $res['result'] = Book::all(($page - 1) * $perPage);

        return $this->genResult($res);
    }

    public function getDetail($id)
    {
        $result = Book::findById($id);

        return $this->genResult($result);
    }

}
