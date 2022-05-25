<?php

namespace Nepflix\Table;

use PDO;

abstract class Table
{
  protected PDO $db;

  public function __construct()
  {
    $this->db = db();
  }
}