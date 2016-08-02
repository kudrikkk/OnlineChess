<link type="text/css" rel="stylesheet" href="tableForBoard.css"/>

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
<pre><?= print_r(Board::getBoard($game->id)) ?></pre>
</p>
<?php $board = Board::getBoard($game->id)?>
<div class="boardpart">
    <table border="1px" >
        <?php for ($i = 0; $i < 8; $i++) : ?>
            <tr>
                <?php for ($j = 0; $j < 8; $j++) : ?>
                    <?php $id = $i*10 + $j; ?> // id для поля доски
                    <?php /*$name = $board; */?>
                    <?php if (($i + $j) % 2) : ?>
                        <?php  ?>
                        <td class="blackcell">
                            <?php
                                echo $board[8 - $i][8 -$j]['piece_id'];
                            ?>
                        </td>
                    <?php else : ?>
                        <td class="whitecell">
                            <?php
                                echo $board[8 - $i][8 - $j]['piece_id'];
                            ?>
                        </td>
                    <?php endif ?>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
</div>
<div class="historypart">
asdfasdfasfsadf
</div>