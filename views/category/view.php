<?php use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url; ?>
<section id="advertisement">
    <div class="container">
        <img src="/images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class = "accord category-products ">
                        <?= \app\components\MenuWidget::widget(['tpl'=>'menu']) ?>
                    </ul>



                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?= $category->name ?></h2>
                    <?php if (!empty($products)) : ?>
                        <?php $i = 0; foreach ($products as $product) : ?>
                            <?php
                            $images = $product->getImage();
                            ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?= Html::img($images->getUrl(), ['alt'=>$product->name]) ?>
                                    <h2><?= $product->price ?> грн</h2>
                                    <p><a href="<?= Url::to(['product/view', 'id'=>$product->id]) ?>"><?= $product->name ?></a></p>
                                    <a href="#" data-id = "<?=$product->id ?>" class=" btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                                <?php if ($product->new) : ?>
                                    <?= Html::img("@web/images/home/new.png", ['alt'=>'Новинка', 'class'=>'new']) ?>
                                <?php endif; ?>
                                <?php if ($product->sale) : ?>
                                    <?= Html::img("@web/images/home/sale.png", ['alt'=>'Скидка', 'class'=>'sale']) ?>
                                <?php endif; ?>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php $i++; if ($i % 3 == 0): ?> <div class="clearfix"></div> <?php endif; endforeach; ?>
                    <?php else : ?>
                        <h2>Здесь товаров пока нет...</h2>
                    <?php endif; ?>

                    <div class="clearfix"></div>
                    <?php echo LinkPager::widget([
                        'pagination' => $pages,
                    ]); ?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
