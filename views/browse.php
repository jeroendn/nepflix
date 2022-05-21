<?php
require_once __DIR__ . '../../php/session.php';
?>

<!DOCTYPE html>
<html lang="EN" dir="ltr">
	<head>
    <title>NEPFLIX- Browse</title>
    <?php require_once __DIR__ . '/includes/head.php'; ?>
	</head>

	<body style="background-color: #111">
    <?php require_once __DIR__ . '/includes/header.php'; ?>

<!--		<div class="container">-->
<!--			--><?php
//				$sql = "SELECT * FROM category ORDER BY RAND()";
//				$stmt = $conn->prepare($sql);
//				$stmt->execute();
//				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//				foreach ($rows as $row) {
//					$categorieName = $row['name'];
//					$categorieId = $row['category_id'];
//					echo '<h4 class="categoryTitle text-light font-weight-bold m-1">'.$row['name'].'</h4>';
//					echo '<div class="moviesRow" style="overflow:scroll; margin-top: 0.5vw; overflow-x: visible; overflow-y: hidden; width: 100%;">';
//
//					$sql2 = "SELECT * FROM film WHERE category_id =:category ORDER BY RAND()";
//					$stmt2 = $conn->prepare($sql2);
//					$stmt2->bindParam(':category', $categorieId, PDO::PARAM_STR);
//					$stmt2->execute();
//					$rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
//
//					foreach ($rows2 as $row2) {
//						$sql3 = "SELECT SUM(uprating) AS uprating, SUM(downrating) AS downrating FROM rating WHERE film_id =:current_film_id";
//						$stmt3 = $conn->prepare($sql3);
//						$stmt3->bindParam(':current_film_id', $row2['film_id']);
//						$stmt3->execute();
//						$rowsRating = $stmt3->fetchAll(PDO::FETCH_ASSOC);
//
//						echo'<div class="card searchCard bg-dark position-relative" data-g="'.strtolower($row2['title']).'">';
//						// alles in deze div word zichtbaar bij hover
//						echo'<div class="infoText position-absolute d-none">';
//						echo'<h5 class="font-weight-bold" style="text-shadow: 2px 2px 2px #000">'.$row2['title'].'</h5>';
//						echo'<h6 class="text-wrap" style="text-shadow: 2px 2px 2px #000">'.$row2['description'].'</h6><br>';
//						// bereken rating in %
//						if ($rowsRating[0]['uprating'] != 0 || $rowsRating[0]['downrating'] != 0) {
//							$ratingSum = $rowsRating[0]['uprating'] + $rowsRating[0]['downrating'];
//							$ratingPercentage = round($rowsRating[0]['uprating'] / $ratingSum * 100);
//							echo'<small class="font-weight-bold" style="text-shadow: 2px 2px 2px #000">Rating: '.$ratingPercentage.'%</small>';
//						}
//						else {
//							$ratingPercentage = "No Ratings";
//							echo'<small class="font-weight-bold" style="text-shadow: 2px 2px 2px #000">Rating: '.$ratingPercentage.'</small>';
//						}
//
//						echo'<form style="height: 0; width: 0" action="../php/rating.inc.php" method="post">
//									<input type="hidden" name="film_id" value="'.$row2['film_id'].'">
//									<button type="submit" name="ratingup" style="text-shadow: 2px 2px 2px #000; background-color: rgb(0,0,0,0); border: 2px solid #fff; border-radius: 100px;"><i class="lead text-light far fa-thumbs-up py-1"></i></button>
//									<button type="submit" name="ratingdown" style="text-shadow: 2px 2px 2px #000; background-color: rgb(0,0,0,0); border: 2px solid #fff; border-radius: 100px;"><i class="lead text-light far fa-thumbs-down py-1"></i></button>
//								</form>';
//
//						echo'</div>';
//						echo'<img class="card-body" src="'.$row2['thumbnail'].'"></img>';
//						echo'</div>';
//					}
//					echo'</div>';
//				}
//			?>
<!--		</div>-->

    <?php require_once __DIR__ . '/includes/footer.php'; ?>
	</body>
</html>
