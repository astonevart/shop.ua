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
                <div class="product-details"><!--product-details-->
                    <?php $mainImg = $product->getImage();
                          $gallery = $product->getImages();?>
                    <div class="col-sm-5">
                        <div class="view-product">
                            <?= Html::img($mainImg->getUrl(), ['alt'=>$product->name, 'width'=>360, 'height'=>360]) ?>

                        </div>


                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->

                            <?php if ($product->new) : ?>
                                <?= Html::img("@web/images/home/new.png", ['alt'=>'Новинка', 'class'=>'new']) ?>
                            <?php endif; ?>
                            <?php if ($product->sale) : ?>
                                <?= Html::img("@web/images/home/sale.png", ['alt'=>'Скидка', 'class'=>'sale']) ?>
                            <?php endif; ?>
                            <h2><?= $product->name ?></h2>
                            <p>ID: 1089772</p>
                            <img src="/images/product-details/rating.png" alt="" />
                            <span>
									<span> <?= $product->price ?> грн</span>
									<label>Количество:</label>
									<input type="text" value="3" id="qty" />
                                <a href="#" data-id = "<?=$product->id ?>" class=" btn btn-default add-to-cart cart">
                                            <i class="fa fa-shopping-cart"></i>Купить</a>
								</span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b><a href="<?= Url::to(['category/view', 'id'=>$product->category->id]) ?>"><?= $product->category->name ?></a></p>
                            <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>

                        </div><!--/product-information-->

                    </div>

                </div><!--/product-details-->
                <p> <?= $product->content ?></p>
               <?php echo Yii::$app->getSecurity()->generatePasswordHash('admin'); ?>
            </div>
        </div>
    </div>
</section>
