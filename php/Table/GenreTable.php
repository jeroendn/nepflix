<?php

namespace Nepflix\Table;

use PDO;

final class GenreTable extends Table
{
  /**
   * @param string $genreName
   * @return array
   */
  public function get(string $genreName): array
  {
    $sql = 'SELECT * FROM genre WHERE genre_name=:genre_name';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':genre_name', $genreName, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
  }

  /**
   * @return array
   */
  public function getAll(): array
  {
    $sql = 'SELECT * FROM genre ORDER BY RAND()';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }

  /**
   * @param int $movieId
   * @return array
   */
  public function getForMovie(int $movieId): array
  {
    $sql = 'SELECT movie_genre.genre_name FROM movie_genre INNER JOIN movie ON movie_genre.movie_id = movie.movie_id WHERE movie_genre.movie_id=:movie_id ORDER BY movie_genre.genre_name';
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':movie_id', $movieId, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }
}