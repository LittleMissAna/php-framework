
        <!-- page content -->
        <div class="col-md-9">
          <div class="well pageContent">

            <div class="productDetail">
              <i class="fa fa-2x fa-image"></i>
              <span class="pageTitle">Photograph Details</span>
              <hr>
              <div class="productTitle">Photograph: <?= $product['name'];?></div>
              <div class="productDescription">Description: <?= $product['description'];?></div>
              <div class="productFormat">Format: <?= $product['size'];?></div>
              <div class="productAvailability">Availability: <?= $product['qty'];?></div>
              <div class="productCost">Price: $ <?= $product['retail'];?></div>
              <div class="productDetailImage">
                <img
                  class="img-responsive"
                  src="<?= $productImage; ?>"
                />
              </div>
            </div>

          </div>
        </div>
        <!-- end page content -->
