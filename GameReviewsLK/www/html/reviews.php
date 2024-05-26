<?php
include 'prolog.php';
include 'html-begin.php';
include 'nav.php';
include 'load_reviews.php';
?>

<main>
<div class="reviews-container">
    <ul>
        <?php if (!empty($games)): ?>
            <?php foreach ($games as $game): ?>
                <li>
                    <h2><?= $game['title'] ?></h2>
                    <ul>
                    <li><strong>Release Date:</strong> <?= format_date(htmlspecialchars($game['release_date'])) ?></li>
                        <li><strong>Genre: </strong><?= $game['genre'] ?></li>
                        <li><strong>Developed at: </strong><?= $game['developer'] ?></li>
                        <li><strong>Rating:</strong> <?= generateRatingStars(htmlspecialchars($game['rating'])) ?></li>
                        <li><strong>Review: </strong><?= $game['review'] ?></li>
                    </ul>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <h1>There are no game reviews.</h1>
        <?php endif; ?>
    </ul>
    </div>
</main>

<?php
include 'html-end.php';
?>