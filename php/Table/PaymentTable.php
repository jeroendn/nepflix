<?php

namespace Nepflix\Table;

use PDO;

final class PaymentTable extends Table
{
  /**
   * @return array
   */
  public function getAll(): array
  {
    $sql = 'SELECT * FROM payment ORDER BY payment_method';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }
}