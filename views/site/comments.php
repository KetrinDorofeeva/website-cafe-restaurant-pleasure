<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use yii\grid\GridView;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;

    $this->title = 'Отзывы';
?>

<div class = "comments-view">
    <div class = "jumbotron">
        <h1 class = "comment_name">Отзывы</h1>
    </div>

    <?php
        foreach($query as $comment) {
            echo "<div class = 'comments_block'>
                <div class = 'comments_text' style = 'color: #E8AB84; font-weight: bold; font-size: 14px'>"
                    . $comment->user->login 
                    . "<span  style = 'color: grey; font-weight: normal; margin-left: 10px'>" . date('d.m.Y H:i', strtotime($comment->date_and_time)) 
                    . "</span>"
                ."</div>
                <div class = 'comments_text'>$comment->text</div>";
                if (\Yii::$app->user->identity->id == $comment->id_user) {
                    echo "<a href = " . Url::to(['/site/deletecomment', 'id' => $comment->id_comment]) . "><img src = '/web/img/bin.png' class = 'bin'></a>";
                }
            echo "</div>";
        }
    ?>
    
    <?php if (!\Yii::$app->user->isGuest && \Yii::$app->user->identity->role == 2 || \Yii::$app->user->identity->role == 1): ?>
        <?php if(true): ?>
            <div class = "comments-form" style = "position: relative; bottom: 40px">
                <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
                    <div class = "form-group">
                        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>