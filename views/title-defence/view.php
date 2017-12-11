<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TitleDefence */

$this->params['breadcrumbs'][] = ['label' => 'Final Terms', 'url' => ['index']];
?>
<div class="title-defence-view">



    <h4>
        <?php
        $projects = \app\models\Project::find()->all();
        $userid = Yii::$app->getUser()->id;
        foreach ($projects as $index=>$project)
        {
            if($project->uid === $userid)
            {
                echo "<h1>" . $project->name . ": Title Defence </h1>";
                echo "<hr>";
                echo "<h5> Description : <em><u>" . $project->description . "</u></em></h5>";
                echo "<h5> Supervisor Name :<em><u>" .  $project->sup_name . "</u></em></h5>";
                echo "<h5> Username :<em><u>" .  Yii::$app->getUser()->identity->username . "</u></em></h5>";

            }
        }

        ?>
    </h4>



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'document:ntext',
            'marks',
            'remarks:ntext',
            'accepted',
        ],
    ]) ?>

</div>

<style>

    th{
        width: 50% !important;
    }

</style>