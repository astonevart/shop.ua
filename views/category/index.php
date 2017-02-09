<?php use yii\helpers\Html;
use yii\helpers\Url;
?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>SHOP</span>GLASS</h1>
                                <h2>Интернет-магазин оптики</h2>
                                <p>Заказывая очки именно у нас, Вы можете быть уверенны, что покупаете качественные,
                                    сертифицированные очки, которые прошли дополнительную проверку на специальном японском оборудовании.</p>
                                <button type="button" class="btn btn-default get">Купить</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" width="475" height="475"/>

                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>SHOP</span>GLASS</h1>
                                <h2>Интернет-магазин оптики</h2>
                                <p>Заказывая очки именно у нас, Вы можете быть уверенны, что покупаете качественные,
                                    сертифицированные очки, которые прошли дополнительную проверку на специальном японском оборудовании.</p>

                                <button type="button" class="btn btn-default get">Купить</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt=""  width="475" height="475"/>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>SHOP</span>GLASS</h1>
                                <h2>Интернет-магазин оптики</h2>
                                <p>Заказывая очки именно у нас, Вы можете быть уверенны, что покупаете качественные,
                                    сертифицированные очки, которые прошли дополнительную проверку на специальном японском оборудовании.</p>
                                <button type="button" class="btn btn-default get">Купить</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt=""  width="475" height="475"/>

                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class = "accord category-products ">
                        <?= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?>
                    </ul>






                </div>
            </div>
            <div class="col-sm-9 padding-right">


                <?php if (!empty($hits)) : ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Популярные</h2>
                    <?php foreach ($hits as $hit) : ?>
                        <?php
                        $images = $hit->getImage();
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <?= Html::img($images->getUrl(), ['alt'=>$hit->name]) ?>
                                        <h2><?= $hit->price ?> грн</h2>
                                        <p><a href="<?= Url::to(['product/view', 'id'=>$hit->id]) ?>"><?= $hit->name ?></a></p>
                                        <a href="#" data-id = "<?=$hit->id ?>" class=" btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>

                                    <?php if ($hit->new) : ?>
                                    <?= Html::img("@web/images/home/new.png", ['alt'=>'Новинка', 'class'=>'new']) ?>
                                    <?php endif; ?>
                                    <?php if ($hit->sale) : ?>
                                        <?= Html::img("@web/images/home/sale.png", ['alt'=>'Скидка', 'class'=>'sale']) ?>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div><!--features_items-->



            </div>
        </div>
    </div>
</section>