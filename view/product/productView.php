
        <!-- page content -->
        <div class="col-md-9">
          <div class="well pageContent">

            <div class="post">
              <div class="productTitle"><h3><?= $product['name'];?><h3></div>
              <div class="productDescription">Description: <?= $product['description'];?></div>
              <div class="productFormat">Format: <?= $product['size'];?></div>
              <div class="productAvailability">Availability: <?= $product['qty'];?></div>
              <div class="productCost">Price: $ <?= $product['retail'];?></div>
            </div>

          </div>
        </div>
        <!-- end page content -->
