
        <!-- page content -->
        <div class="col-md-9">
          <div class="pageContent">
            <i class="fa fa-2x fa-comment"></i>
            <span class="pageTitle"> New Blog Post</span>
            <hr>

<?php if (isset($validator['valid'])) { ?>

            <div class="alert alert-danger alert-dismissible" role="alert">
              <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
              <?= $validator['messages']; ?>
            </div>

<?php } ?>

            <form
              method="post"
              action="<?= APP_DOC_ROOT . '/blog/create'; ?>"
            >
              <div class="form-group">
               <label for="author">Author</label>
               <input
                 type="text"
                 class="form-control"
                 id="author"
                 name="author"
                 value="<?= $_SESSION['username']; ?>"
               >
              </div>

              <div class="form-group">
               <label for="posted">Posted</label>
               <input
                 type="text"
                 class="form-control"
                 id="posted"
                 name="posted"
                 value="<?= date('Y-m-d'); ?>"
               >
              </div>

              <div class="form-group">
               <label for="title">Post Title</label>
               <input
                 type="text"
                 class="form-control"
                 id="title"
                 name="title"
                 placeholder="Post Title"
               >
              </div>

              <div class="form-group">
               <label for="content">Post Content</label>
               <textarea
                 type="text"
                 class="form-control"
                 id="content"
                 name="content"
                 rows="6"
                 placeholder="Post Content"
               ></textarea>
              </div>

              <input
                type="submit"
                class="btn btn-primary"
                id="submit"
                name="submit"
                value="Create Post"
              >

            </form
          </div>
        </div>
        <!-- end page content -->
