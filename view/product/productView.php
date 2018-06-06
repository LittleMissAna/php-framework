
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
              <form
                method="post"
                action="<?= APP_DOC_ROOT . '/product/add/' . $product['id']; ?>"
              >
              Qty:
              <select name="qty">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <input
                name="add"
                class="btn btn-primary"
                type="submit"
                value="Add to Cart"
              >
            </form>
            </div>

          </div>
        </div>
        <!-- end page content -->
