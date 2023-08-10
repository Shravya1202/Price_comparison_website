<!-- templates/Products/index.ctp -->
<center>
    <h2>All The Products For This Category Are!!</h2>
</center>
<div class="product-list">
    <?php foreach ($products as $product): ?>
        <div class="product-item">
            <p>
                <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'view', $product->product_id]) ?>">
                    <?= $this->Html->image($product->product_img, ['alt' => $product->product_description]) ?>
                </a>
            </p>
            <p class="details">
                <?php
                $words = explode(' ', $product->product_description);
                $limitedWords = array_slice($words, 0, 3);
                $limitedDescription = implode(' ', $limitedWords);
                echo h($limitedDescription);
                ?>...
            </p><br>
            <p>
                Price: &#8377;
                <?= h($product->overall_price) ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>

<style>
    .product-item {
        display: inline-block;
        border: 1px solid lightgray;
        margin: 20px;
        padding: 10px;

    }

    .product-item img {
        height: 250px;
        width: 200px;
    }
</style>