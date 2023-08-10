<!-- src/templates/TrendingProducts/index.ctp -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<table>
    <tr>
        <th>
            <h2 class="heading">India's #1 Price Comparison</h2>
        </th>
    </tr>
    <tr>
        <td>
            <div class="scroll">
                <?php if (!empty($trendingProducts)): ?>
                    <div class="trending-products">
                        <?php foreach ($trendingProducts as $trendingProduct): ?>
                            <div class="trending-product-item">
                                <div class="product_img">
                                    <a
                                        href="<?= $this->Url->build(['controller' => 'TrendingProducts', 'action' => 'view', $trendingProduct->tp_id]) ?>">
                                        <img src="<?= $this->Url->image($trendingProduct->tp_img) ?>"
                                            alt="<?= h($trendingProduct->description) ?>">
                                    </a>
                                </div>
                                <div class="product_details">
                                    <p id="info">
                                        <?= h($trendingProduct->description) ?>
                                    </p>
                                    <p>Price: &#8377;
                                        <?= h($trendingProduct->price) ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No trending products found.</p>
                <?php endif; ?>
            </div>
        </td>
    </tr>
</table>
<div class="main-category">
    <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <p onclick="showCategoryDetails(<?= h($category->cat_id) ?>)">
                <?= h($category->cat_name) ?>
            </p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No categories found.</p>
    <?php endif; ?>
</div>

<div id="sub-category-details"></div>



<?= $this->Html->css('style.css') ?>

<script>
    function showCategoryDetails(categoryId) {

        const subCategoryDetailsElement = document.getElementById('sub-category-details');

        fetch('<?= $this->Url->build(['controller' => 'TrendingProducts', 'action' => 'subCategories']) ?>' + `/${categoryId}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text()) // Fetch HTML content
            .then(html => {
                subCategoryDetailsElement.innerHTML = html; // Insert the HTML content into the element
            })
            .catch(error => {
                console.error('Error fetching sub-categories:', error);
            });

    }
</script>