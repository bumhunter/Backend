<?php
require('../db.php');
class NewID extends Database {

  protected $title, $description, $parent_id, $datetime, $db_query;
  public $result;

  public function __construct($title, $description, $parent_id) {
    parent::__construct();
    $this->title = trim(filter_var($title, FILTER_SANITIZE_STRING));
    $this->description = trim(filter_var($description, FILTER_SANITIZE_STRING));
    $this->parent_id = $parent_id;
    $this->datetime = date('l jS \of F Y h:i:s A');
  }

  public function new_id() {
    $result = explode('.', $this->parent_id);
    $count_array = count($result);
    $available_count = $count_array++;
    $this->db_query = $this->query("SELECT number FROM objects WHERE number LIKE CONCAT(?, '%') ORDER BY id DESC",[$this->parent_id]);
    $this->result = $this->final_id($available_count, $count_array, $this->db_query);
    return $this->result;
  }

  protected function final_id($available_count, $count_array, $db_query) {
    foreach ($db_query as $item) {
      $result[] = explode('.', $item->number);
    }
    for ($i = 0; $i < count($result); $i++) {
      if (count($result[$i]) > $available_count+1)
        $result[$i] = "";
    }
    $result = array_diff($result, array(''));
    $result = array_values($result);
    $final_id = "";
      if (count($result) == 1) {
        for ($i = 0; $i < count($result[0]); $i++) {
          $final_id .= $result[0][$i] . '.';
        }
        $final_id .= '1';
      }
      if (count($result) == 0) {
        $query = $this->query("SELECT number FROM objects ORDER BY number DESC");
        foreach ($query as $item) {
          $result[] = explode('.', $item->number);
        }
        $final_id = $result[0][0];
        return $final_id + 1;
      }
      if (count($result) > 1) {
        $result[0][count($result[0])-1] = $result[0][count($result[0])-1] + 1;
        for ($i = 0; $i < count($result[0]); $i++) {
          $final_id .= $result[0][$i] . '.';
        }
        $final_id = substr($final_id,0,-1);
      }
    return $final_id;
  }

  public function add_new_object() {
    $this->db_query = $this->query("INSERT INTO objects(title, description, number, parent_id, datetime) VALUES(?, ?, ?, ?, ?)", [$this->title, $this->description, $this->result, $this->parent_id, $this->datetime]);
  }
}