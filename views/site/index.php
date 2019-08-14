<?php
use yii\helpers\Html;
use  yii\web\User;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron"> 
        <?php
        if(Yii::$app->user->isGuest) {
            ?>
            <h1>Congratulations!</h1>
            <p class="lead">You have successfully created your Yii-powered application.</p>
            <p class="lead">Welcome to loan & user listing.</p>
            <p class="lead">Please log in first..</p>
            <p><?= Html::a('Login', ['/site/login'], ['class' => 'btn btn-lg btn-success']) ?></p>

        <?php
        }
        else {
            ?>
            <h1>Choose an action:</h1>
            <p><br></p>
            <p>
                <?= Html::a('Users', ['/user'], ['class' => 'btn btn-lg btn-success']) ?>
                <?= Html::a('Loans', ['/loan'], ['class' => 'btn btn-lg btn-primary']) ?>
            </p>

        <?php
        }
        ?>    
    </div>
</div>
