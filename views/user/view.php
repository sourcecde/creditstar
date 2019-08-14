<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'first_name:ntext',
            'last_name:ntext',
            'email:ntext',
            'personal_code',
            'phone',
            'active:boolean',
            'dead:boolean',
            'lang:ntext',
            [
                'label' => 'Age',
                'value' =>  Yii::$app->myfunctions->getAgeFromPersonelCode($model->personal_code),
            ],
        ],
    ]) ?>
    
    <h1>User Loans:</h1>

    <?= GridView::widget([
        'dataProvider' => $loans['dataProvider'],
        'filterModel' => $loans['searchModel'],
        'showOnEmpty' => false,
        'filterModel' => null,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn'
            ],

            'id',
            'user_id',
            'amount',
            'interest',
            'duration',
            'start_date',
            'end_date',
            // 'campaign',
            // 'status:boolean',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'loan'
            ],
        ],
    ]); ?>

</div>
