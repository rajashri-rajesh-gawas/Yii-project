<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use mdm\admin\components\MenuHelper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php


//     echo Nav::widget([
//     'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
// ]);


    NavBar::begin([
        'brandLabel' => 'Electrician',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-right',
        ],
    ]);
    
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        // ['label' => 'Assignments', 'url' => ['/admin']],
        // ['label' => 'Roles', 'url' => ['/admin/role']],
        // ['label' => 'Permission', 'url' => ['/admin/permission']],
        // ['label' => 'Route', 'url' => ['/admin/route']],
        // ['label' => 'Rule', 'url' => ['/admin/rule']],
        // ['label' => 'Menu', 'url' => ['/admin/menu']],
        // ['label' => 'Sliders', 'url' => ['/sliders/index']],
        ['label' => 'Services', 'url' => ['/services/index']],
        ['label' => 'Projects', 'url' => ['/projects/index']],
        ['label' => 'Icons', 'url' => ['/icons/index']],
        // ['label' => 'Contacts', 'url' => ['/contacts/index']],
        ['label' => 'Electric', 'url' => ['/electric/index']],
        ['label' => 'Supply', 'url' => ['/supply/index']],
        ['label' => 'Stats', 'url' => ['/stats/index']],
        ['label' => 'Teams', 'url' => ['/teams/index']],
        ['label' => 'Electrician', 'url' => ['/electrician/index']],
        
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);

    echo Nav::widget([
        'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id,function ($menu){

            // print_r($menu); exit; 
        })
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <!-- <p class="pull-left">&copy; My Company <?= date('Y') ?></p> -->

        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

