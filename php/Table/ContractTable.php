<?php

namespace Nepflix\Table;

use PDO;

final class ContractTable extends Table
{
  /**
   * @param string $contractType
   * @return array
   */
  public function get(string $contractType): array
  {
    $sql = 'SELECT * FROM contract WHERE contract_type=:contract_type';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':contract_type', $contractType, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
  }

  /**
   * @return array
   */
  public function getAll(): array
  {
    $sql = 'SELECT * FROM contract ORDER BY contract_type';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }
}