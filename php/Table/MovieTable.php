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

  /**
   * @return array
   */
  public function getAll(): array
  {
    $sql = 'SELECT * FROM movie ORDER BY title';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }

  public function getByGenre(string $genreName): array
  {
    $sql = 'SELECT * FROM movie INNER JOIN movie_genre ON movie.movie_id=movie_genre.movie_id WHERE movie_genre.genre_name=:genre_name ORDER BY movie.title';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':genre_name', $genreName, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }
}