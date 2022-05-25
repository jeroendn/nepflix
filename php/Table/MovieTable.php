<?php

namespace Nepflix\Table;

use PDO;

final class MovieTable extends Table
{
  /**
   * @param int $movieId
   * @return array
   */
  public function get(int $movieId): array
  {
    $sql = 'SELECT * FROM movie WHERE movie_id=:movie_id';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':movie_id', $movieId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
  }
}