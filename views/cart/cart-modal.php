
<?php
use yii\helpers\Html;
if (!empty($session['cart'])) : ?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($session['cart'] as $id => $item) : ?>
                <tr>
                    <td> <?= Html::img($item['img'], ['alt'=>$item['img'], 'width'=>60, 'height'=>60]) ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><span data-id = "<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="3">Итого :</td>
                    <td><?= $session['cart.qty'] ?></td>
                </tr>
                <tr>
                    <td colspan="3">Сумма :</td>
                    <td><?= $session['cart.sum'] ?></td>
                </tr>
        </tbody>
    </table>
</div>
<?php else : ?>
<h2>Корзина пуста</h2>
<?php endif; ?>

