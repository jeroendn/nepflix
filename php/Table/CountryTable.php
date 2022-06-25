<?php

namespace Nepflix\Table;

use PDO;

final class CountryTable extends Table
{
  /**
   * @return array
   */
  public function getAll(): array
  {
    $sql = 'SELECT country_name FROM country ORDER BY country_name';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }
}