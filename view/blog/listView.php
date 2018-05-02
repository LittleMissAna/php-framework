
        <!-- page content -->
        <div class="col-md-9">
          <div class="well pageContent">

<?php foreach($posts as $key => $post) {
    $postUrl = APP_DOC_ROOT . '/blog/view/' . $post['id'];
    $byLine = $post['author'] . ' - ' . $post['posted'];
    $content = 300 > strlen($post['content']) ? $post['content'] : substr($post['content'],0,300) . '...';
?>
            <div class="post">
              <div class="postTitle">
                <a href="<?php print $postUrl; ?>">
                  <h3><?php print $post['title']; ?><h3>
                </a>
              </div>
              <div class="postContent"><?php print $content; ?></div>
              <div class="postByLine">
                <em><?php print $byLine; ?></em>
              </div>
            </div>

<?php } ?>

          </div>
        </div>
        <!-- end page content -->
