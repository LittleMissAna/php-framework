
        <!-- sub navigation -->
        <div class="col-md-3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Product Menu</li>
<?php foreach($categories as $key => $category) { ?>

              <li><a href="<?= APP_DOC_ROOT . '/product/list/' . $category['id']; ?>"><?= $category['name']; ?></a></li>
<?php } ?>
            </ul>
          </div>
        </div>
        <!-- end sub navigation -->
