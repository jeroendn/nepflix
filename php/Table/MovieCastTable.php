<?php

namespace Nepflix\Table;

use PDO;

final class MovieCastTable extends Table
{
  /**
   * @param int $movieId
   * @return array
   */
  public function getForMovie(int $movieId): array
  {
    $sql = 'SELECT movie_cast.role, person.firstname, person.lastname FROM movie_cast INNER JOIN person ON movie_cast.person_id = person.person_id WHERE movie_cast.movie_id=:movieId ORDER BY person.firstname';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':movieId', $movieId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }
}