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
    $sql = 'SELECT movie_id, title, duration, description, publication_year, cover_image, filename FROM movie WHERE movie_id=:movie_id';
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
    $sql = 'SELECT movie_id, title, duration, description, publication_year, cover_image, filename FROM movie ORDER BY title';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }

  /**
   * @param string $genreName
   * @param int|null $limit
   * @return array
   */
  public function getByGenre(string $genreName, ?int $limit = null): array
  {
    $sql = 'SELECT movie.movie_id, movie.title, movie.duration, movie.description, movie.publication_year, movie.cover_image, movie.filename FROM movie INNER JOIN movie_genre ON movie.movie_id=movie_genre.movie_id WHERE movie_genre.genre_name=:genre_name ORDER BY RAND()' . ($limit ? " LIMIT $limit" : '');
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':genre_name', $genreName, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }

  /**
   * @param string $searchWord
   * @param string|null $genreName
   * @return array
   */
  public function getBySearch(string $searchWord, ?string $genreName = null): array
  {
    if ($genreName === null) {
      $sql = 'SELECT DISTINCT movie.movie_id, movie.title, movie.duration, movie.description, movie.publication_year, movie.cover_image, movie.filename FROM movie INNER JOIN movie_genre ON movie.movie_id=movie_genre.movie_id WHERE movie.title LIKE "%":search_word"%" ORDER BY movie.title';
      $stmt = $this->db->prepare($sql);
    }
    else {
      $sql = 'SELECT movie.movie_id, movie.title, movie.duration, movie.description, movie.publication_year, movie.cover_image, movie.filename FROM movie INNER JOIN movie_genre ON movie.movie_id=movie_genre.movie_id WHERE movie.title LIKE "%":search_word"%" AND movie_genre.genre_name=:genre_name ORDER BY movie.title';
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':genre_name', $genreName, PDO::PARAM_STR);
    }

    $stmt->bindParam(':search_word', $searchWord, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
  }
}