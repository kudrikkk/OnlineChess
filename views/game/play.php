<?php

/** @var \app\models\Game $game */

use yii\helpers\Html;
use app\models\Board;

?>

<h1>
    Game <?= $game->id ?>
    <?php if ($game->is_finished) : ?>
        finished. Winner: <?= $game->winner_id ?>
    <?php elseif (!$game->alreadyBegan()) : ?>
        <?= Html::beginForm(["/game/cancel/$game->id"], 'post', ['class' => '']) ?>
        <?= Html::submitButton('Cancel', ['class' => 'btn btn-primary']) ?>
        <?= Html::endForm() ?>
    <?php else : ?>
        <?= Html::beginForm(["/game/surrender/$game->id"], 'post', ['class' => '']) ?>
        <?= Html::submitButton('Surrender', ['class' => 'btn btn-danger']) ?>
        <?= Html::endForm() ?>
    <?php endif ?>
</h1>
<p>
<pre><?= print_r(Board::getBoardArray($game->id)) ?></pre>
<pre><?= print_r(\app\models\pieces\Piece::pieceFactory('pb1', 1, 1)) ?></pre>
<pre><?= print_r((new \app\models\Board(['game_id' => $game->id]))) ?></pre>
</p>