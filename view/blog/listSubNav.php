
        <!-- sub navigation -->
        <div class="col-md-3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Blog Menu</li>
              <li><a href=<?= APP_DOC_ROOT . '/blog/list'; ?>>List</a></li>
<?php if (
            in_array('ROLE_BLOG_CREATE', $_SESSION["role"]) ||
            in_array('ROLE_ADMIN', $_SESSION["role"])
          ) { ?>
              <li><a href="<?= APP_DOC_ROOT . '/blog/new'; ?>">Create Post</a></li>
<?php } ?>
            </ul>
          </div>
        </div>
        <!-- end sub navigation -->
