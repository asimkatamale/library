<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BooksModel');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    /**
     * @method will get list of all books
     */
    public function index() {
        $books = $this->BooksModel->getBooks();
        $data = array('books' => $books);
        $this->load->view('includes/header');
        $this->load->view('Books/index', $data);
        $this->load->view('includes/footer');
    }

    /**
     * @method will add new book in books table
     */
    public function add_book() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (empty($this->input->post('title'))) {
                $this->session->set_flashdata('message', 'Empty input supplied');
                redirect("Books/add_book");
            }
            $dataToSave = array('title' => htmlspecialchars($this->input->post('title')), 'quantity' => htmlspecialchars($this->input->post('quantity')));
            if ($this->BooksModel->saveBooks($dataToSave)) {
                $this->session->set_flashdata('message', 'Book Saved Succesfully');
            } else {
                $this->session->set_flashdata('message', 'Error in saving');
            }
            redirect("Books/index");
        } else {
            $this->load->view('includes/header');
            $this->load->view('Books/add_book');
            $this->load->view('includes/footer');
        }
    }

    /**
     * @method will issue new book to user and decrease quantity from books table
     */
    public function issue_book() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!$this->BooksModel->getUserById($this->input->post('user_id'))) {
                $this->session->set_flashdata('message', 'Invalid User Id supplied');
                redirect("Books/index");
            }
            $book_id = $this->input->post('book_id');
            $bookData = $this->BooksModel->checkBookAvailabilityById($book_id);
            if (!$bookData) {
                $this->session->set_flashdata('message', 'Book does not exist');
                redirect("Books/index");
            }
            $availableQty = $bookData[0]->quantity;
            if ($availableQty == 0) {
                $this->session->set_flashdata('message', 'Book ' . $bookData[0]->title . ' is out of stock');
                redirect("Books/index");
            }

            if ($this->db->insert('books_issued', $this->input->post()) && $this->BooksModel->updateBook($book_id, array('quantity' => $availableQty - 1))) {
                $this->session->set_flashdata('message', 'Book succesfully issued');
            } else {
                $this->session->set_flashdata('message', 'Error in issuing book');
            }
        }
        redirect("Books/index");
    }

    /**
     * @method will return book and will increase quantity against book in books table by 1
     */
    public function return_book() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if ($this->BooksModel->returnBook($this->input->post('book_issued_id')) && $this->BooksModel->updateQty($this->input->post('book_id'))) {
                $this->session->set_flashdata('message', 'Book succesfully returned');
            } else {
                $this->session->set_flashdata('message', 'Error in returning book.Please try again later');
            }
            redirect("Books/return_book");
        } else {
            $books = $this->BooksModel->getBooksIssuedList();
            $data = array('books' => $books);
            $this->load->view('includes/header');
            $this->load->view('Books/return_book', $data);
            $this->load->view('includes/footer');
        }
    }

    /**
     * method will check whether the book is available or not
     */
    public function check_book_availability() {
        if ($this->input->is_ajax_request() && !empty($this->input->get('term'))) {
            $input = htmlspecialchars($this->input->get('term'));
            $books = $this->BooksModel->checkAvailability($input);
            if ($books) {
                print_r(json_encode($books));
            } else {
                print_r(json_encode(array('message' => "No results found for '$input'")));
            }
        } else {
            $this->load->view('includes/header');
            $this->load->view('Books/check_book_availability');
            $this->load->view('includes/footer');
        }
    }

    /**
     * @method will fetch list of all users
     */
    public function list_users() {
        $users = $this->BooksModel->listAllUsers();
        $data = array('users'=>$users);
        $this->load->view('includes/header');
        $this->load->view('Books/list_users',$data);
        $this->load->view('includes/footer');
    }

}
