<?php

class BooksModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveBooks($data) {
        return $this->db->insert('books', $data);
    }

    public function updateBook($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('books', $data);
    }

    public function getBooks() {
        $query = $this->db->query("select * from books");
        return $query->result();
    }

    public function getUserById($id) {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function checkBookAvailabilityById($id) {
        $this->db->select('id,quantity,title');
        $this->db->from('books');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getBooksIssuedList() {
        $this->db->select('B.id as book_id,BI.id,U.name,B.title,BI.issue_date,BI.return_date');
        $this->db->from('books_issued as BI');
        $this->db->join('books as B', 'B.id = BI.book_id', 'left');
        $this->db->join('users as U', 'U.id = BI.user_id', 'left');
        $this->db->where('is_returned', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function returnBook($id) {
        $data = array('is_returned' => 1, 'actual_return_date' => date('Y-m-d'));
        $this->db->where('id', $id);
        return $this->db->update('books_issued', $data);
    }

    public function updateQty($book_id) {
        $this->db->set('quantity', 'quantity+1', FALSE);
        $this->db->where('id', $book_id);
        return $this->db->update('books');
    }

    public function checkAvailability($input) {
        $this->db->select('title,quantity');
        $this->db->from('books');
        $this->db->like('title', $input);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function listAllUsers() {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

}

?>