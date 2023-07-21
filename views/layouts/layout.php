<?php

use yii\web\View;
use yii\helpers\Html;

/* @var $this View */

$this->title = 'SIMPLE CRUD YII2';
$baseUrl = Yii::$app->request->baseUrl;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::cssFile('@web/css/app.css') ?>
    <?= Html::tag('link', null, ['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::$app->request->baseUrl . '/favicon.ico']) ?>
    <?= Html::jsFile('@web/js/app.js') ?>
    <script>
        const BASE_URL = "<?= $baseUrl ?>";
    </script>
</head>

<body>
<div>
    <main class="m-5">
        <?= $content ?>
    </main>

    <!-- Modal -->
    <input type="checkbox" id="modal-global" class="modal-toggle" />
    <label id="modal-global-container" for="modal-global" class="modal modal-bottom sm:modal-middle cursor-pointer">
        <label class="modal-box p-8 relative">

        </label>
    </label>
</body>

</html>