<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TypeCountry;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
$typeCountry = new TypeCountry();
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            [
                'attribute'=>'id_type_country',
                'label'=>'Тип страны',
                'content' => function($searchModel) {
                   return $searchModel->typeCountry->name;
                },
                'filter' => TypeCountry::getCountriesName(),
            ],
            [
                'attribute'=>'datatime',
                'label'=>'Год оснавания',
                'format' =>  ['date', 'dd.MM.Y'],
            ],
            [
                'attribute'=>'url',
                'format' => 'raw',
                'label'=>'Картинка',
                'content' => function($searchModel) {
                    return "<img src='$searchModel->url' class='img-fluid' style='width: 100px'>";
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],

        ],
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'rowOptions'=>function ($model, $key, $index, $grid){
            $class=$index%2?'odd':'even';
            return [
                'key'=>$key,
                'index'=>$index,
                'class'=>$class
            ];
        },
    ]); ?>

</div>
