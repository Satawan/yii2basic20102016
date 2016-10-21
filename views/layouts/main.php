<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">

            <div>
                <img src="<?= Yii::getAlias('@web') ?>/img/avengers.jpg" class="img-responsive" alt="header" >
            </div>


            <?php
            NavBar::begin([
                'brandLabel' => '<span class="glyphicon glyphicon-leaf"></span> Web site ของฉัน',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default', //navbar-fixed-top
                ],
            ]);

            $setting = [
                ['label' => 'สถานะคอมพิวเตอร์', 'url' => ['/comstatus']],
                ['label' => 'ประเภทคอมพิวเตอร์', 'url' => ['/com-type']],
            ];

            $regist = [
                ['label' => 'ทะเบียนคอมพิวเตอร์', 'url' => ['/com']],
            ];

            $report = [
                ['label' => 'รายงานคอมพิวเตอร์', 'url' => ['/reportcomtype']],
                ['label' => 'รายงานปัญหาคอมพิวเตอร์', 'url' => ['/reportcomservice']],
                ['label' => 'กราฟสรุปจำนวนคอมพิวเตอร์', 'url' => ['/chartcom']],
                ['label' => 'รายงาน PDF', 'url' => ['/pdftest']],
                
            ];


            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => '<span class="glyphicon glyphicon-home"></span> หน้าแรก', 'url' => ['/site/index']],
                    ['label' => 'ลงทะเบียน', 'items' => $regist],
                    ['label' => 'ระบบรายงาน', 'items' => $report],
                    ['label' => 'ทดสอบ1', 'url' => ['/first1/index']],
                    ['label' => 'ตั้งค่าระบบ', 'items' => $setting,'visible'=>Yii::$app->session->has('username')],
                    ['label' => 'ลงทะเบียน', 'items' => $regist],
                    !Yii::$app->session->get('username') ? (
                            ['label' => 'Login', 'url' => ['/site/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->session->get('username') . ')', ['class' => 'btn btn-link']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
