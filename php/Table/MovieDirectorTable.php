<?php

namespace Nepflix\Table;

use PDO;

final class MovieDirectorTable extends Table
{
  /**
   * @param int $movieId
   * @return array
   */
  public function getForMovie(int $movieId): array
  {
    $sql = 'SELECT * FROM movie_director INNER JOIN person ON movie_director.person_id = person.person_id WHERE movie_director.movie_id=:movieId ORDER BY person.firstname';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':movieId', $movieId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }
}