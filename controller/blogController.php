<?php


# Include html header
include( APP_VIEW . '/header.php' );

# Include main navigation
include( APP_VIEW . '/nav.php' );

switch ( $route->getAction() ) {

    case 'create':

      // Does the user have access to create
      if (
            in_array('ROLE_BLOG_CREATE', $_SESSION["role"]) ||
            in_array('ROLE_ADMIN', $_SESSION["role"])
         ) {
          // Did the user submit a new post?
          if($_POST) {

            // Yes - check the post form fields
            $validator = checkCreatePost($_POST);

            // Was the form valid?
            if (false == $validator['valid']) {
              // Not Valid - Re-Display form
              include( APP_VIEW .'/blog/listSubNav.php' );
              include( APP_VIEW .'/blog/createView.php' );
            }
            else {

              // Was Valid - save form data to database
              insertPost($_POST);

              // redirect user to post listing
              header('Location: ' . APP_DOC_ROOT . '/blog/list');
            }
          }
          // No new post - URL manipulation - redraw form
          else {
            include( APP_VIEW .'/blog/listSubNav.php' );
            include( APP_VIEW .'/blog/createView.php' );
          }
      }
      else {
          header('Location: ' . APP_DOC_ROOT . '/blog/list');
      }
      break;


    case 'new':
      // Does the user have access to create
      if (
            in_array('ROLE_BLOG_CREATE', $_SESSION["role"]) ||
            in_array('ROLE_ADMIN', $_SESSION["role"])
         ) {
          include( APP_VIEW .'/blog/listSubNav.php' );
          include( APP_VIEW .'/blog/createView.php' );
      }
      else {
          header('Location: ' . APP_DOC_ROOT . '/blog/list');
      }
      break;

    case 'view':
        $postId = $route->getParams()[2];
        $post = getPost($postId);
        $byLine = $post['author'] . ' - ' . $post['posted'];
        include( APP_VIEW .'/blog/listSubNav.php' );
        include( APP_VIEW .'/blog/postView.php' );
        break;

    case 'list':
        $posts = listPosts();
        include( APP_VIEW .'/blog/listSubNav.php' );
        include( APP_VIEW .'/blog/listView.php' );
        break;

    default:
        $posts = listPosts();
        include( APP_VIEW .'/blog/listSubNav.php' );
        include( APP_VIEW .'/blog/listView.php' );
        break;
}


# Include html footer
include( APP_VIEW . '/footer.php' );


// Local Functions

function checkCreatePost($post) {
    $valid = true;
    $errorMessages = '';

    if('' == $post['author']) {
      $valid = false;
      $errorMessages = 'Author is required.<br />';
    }

    if('' == $post['posted']) {
      $valid = false;
      $errorMessages .= 'Posted date is required.<br />';
    }

    if('' == $post['title']) {
      $valid = false;
      $errorMessages .= 'Post Title is required.<br />';
    }

    if('' == $post['content']) {
      $valid = false;
      $errorMessages .= 'Post Content is required.<br />';
    }

    return [
      'valid' => $valid,
      'messages' => $errorMessages
    ];
}


function getPost($postId) {

  $sql = "SELECT
            *
          FROM
            post
          WHERE
            id = ?";
  $dbObj = new db();
  $dbObj->dbPrepare($sql);
  $dbObj->dbExecute([$postId]);
  $post = $dbObj->dbFetch("assoc");

  return $post;
}

function insertPost($post) {

  $sql = "INSERT INTO post (author, posted, title, content)
          VALUES (?, ?, ?, ?)";

  $dbObj = new db();
  $dbObj->dbPrepare($sql);
  $dbObj->dbExecute([
    $post['author'],
    $post['posted'],
    $post['title'],
    $post['content']
  ]);
}

function listPosts() {

  $sql = "SELECT
            *
          FROM
            post
          ORDER BY
            posted";

  $dbObj = new db();
  $dbObj->dbPrepare($sql);
  $dbObj->dbExecute();
  $posts = $dbObj->dbFetch("all");

  return $posts;
}
