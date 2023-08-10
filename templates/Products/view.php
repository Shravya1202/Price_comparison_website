<!-- src/Template/Products/view.ctp -->
<div class="container">
    <div class="tp-details">
        <center>
            <h1>Online Price Comparison</h1>
        </center>
        <img src="<?= $this->Url->image($product->product_img) ?>" alt="<?= h($product->product_description) ?>">
        <p id="info">
            <?= h($product->product_description) ?>
        </p>
    </div>

    <div class="prices">
        <center>
            <h2 id="heading">Multi-Store Prices</h2>
        </center>
        <table>
            <tr>
                <th>Store Logo</th>
                <th>Store Price</th>
                <th>Store URL</th>
            </tr>
            <?php foreach ($product->product_stores as $productStore): ?>
                <tr>
                    <td>
                        <img src="<?= $this->Url->image($productStore->store_logo) ?>" alt="Store Logo">
                    </td>
                    <td>
                        Price: &#8377;
                        <?= h($productStore->price) ?>
                    </td>
                    <td>
                        <div id="grab">
                            <a href="<?= h($productStore->store_url) ?>" target="_blank">Visit Store</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<style>
    .container {
        display: flex;
    }

    .tp-details {
        margin: 20px;
        text-align: center;
        justify-content: center;
        display: inline-block;
        flex: 1;
        padding: 10px;
    }

    .tp-details img {
        border: 1px solid transparent;
        border-radius: 20px;
        width: 340px;
        height: 400px;
        display: block;
        padding: 10px;
    }

    .tp-details p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-family: 'Times New Roman', Times, serif;
        color: black;
        width: 300px;
        text-align: left;
        display: block;
    }

    .prices {
        flex: 1;
        padding: 10px;
        margin-top: 180px;
        border: 2px solid lightgray;
    }

    #info {
        border-top: 2px dashed lightgray;
    }

    #heading {
        border-bottom: 2px solid lightgray;
    }

    #grab {
        text-align: center;
        border: 1px solid yellow;
        background-color: yellow;
        border-radius: 20px;
        color: black;
        font-family: 'Times New Roman', Times, serif;
        margin-top: 5px;
    }

    #grab:hover {
        border: 1px solid lightgreen;
        background-color: lightgreen;
    }
</style>