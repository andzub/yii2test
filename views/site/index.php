<?php

use yii\grid\GridView;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        ]); ?>

    </div>
</div>