
        <!-- page content -->
        <div class="col-md-9">
          <div class="well pageContent">

<?php foreach($products as $key => $product) {
    $productUrl = APP_DOC_ROOT . '/product/view/' . $product['id'];
?>
            <div class="product">
              <div class="productTitle">
                <a href="<?php print $productUrl; ?>">
                  <h3><?php print $product['name']; ?><h3>
                </a>
              </div>
              <div class="productCost">
                <?php print $product['retail']; ?>
              </div>
            </div>

<?php } ?>

          </div>
        </div>
        <!-- end page content -->
