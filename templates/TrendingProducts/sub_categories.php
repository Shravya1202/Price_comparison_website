<table class="sub-category-table">
    <?php if (!empty($subCategories)): ?>
        <?php foreach ($subCategories as $subCategory): ?>
            <tr>
                <th>
                    <div class="sub-category">
                        <center>
                            <p>
                                <?php if ($subCategory->sub_id !== 6 && $subCategory->sub_id !== 7): ?>
                                    <span class="<?= h($subCategory->sub_img) ?>"></span>
                                <?php else: ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="3.5em" class="icon1"
                                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            svg {
                                                fill: #2d69e1
                                            }
                                        </style>
                                        <path d="<?= h($subCategory->sub_img) ?>" />
                                    </svg><br>
                                <?php endif; ?>
                            </p>
                        </center>
                        <center>
                            <p id="name">
                                <?= h($subCategory->sub_name) ?>
                            </p>
                        </center>
                        <center>
                            <a
                                href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', $subCategory->sub_id]) ?>">
                                <p id="view">View All</p>
                            </a>
                        </center>
                    </div>
                    <div class="products">
                        <?php if (!empty($products)): ?>
                            <?php $productCount = 0; ?>
                            <?php foreach ($products as $product): ?>
                                <?php if ($product->sub_id == $subCategory->sub_id && $productCount < 3): ?>
                                    <div class="product-item">
                                        <p>
                                            <a
                                                href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'view', $product->product_id]) ?>">
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
                                        </p>
                                        <p class="details">Price: &#8377;
                                            <?= h($product->overall_price) ?>
                                        </p>
                                    </div>
                                    <?php $productCount++; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No products found.</p>
                        <?php endif; ?>
                    </div>
                </th>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No categories found.</p>
    <?php endif; ?>
</table>



<?= $this->Html->css('style.css') ?>