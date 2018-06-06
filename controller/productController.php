<?php


# Include html header
include( APP_VIEW . '/header.php' );

# Include main navigation
include( APP_VIEW . '/nav.php' );

switch ( $route->getAction() ) {

  case 'add':
      $categories = listCategories();
      $productId = $route->getParams()[2];
      $product = getProduct($productId);
      addCart($_POST, $productId);
      $productImage = APP_IMG . '/products/' . $product['id'] . '.png';
      include( APP_VIEW .'/product/listSubNav.php' );
      include( APP_VIEW .'/product/productView.php' );
      break;

    case 'clear':
      $_SESSION['cart'] = 0;
      unset($_SESSION['cart']);
      header('Location: ' . APP_DOC_ROOT . '/product/list');

    case 'view':
        $categories = listCategories();
        $productId = $route->getParams()[2];
        $product = getProduct($productId);
        $productImage = APP_IMG . '/products/' . $product['id'] . '.png';
        include( APP_VIEW .'/product/listSubNav.php' );
        include( APP_VIEW .'/product/productView.php' );
        break;

    case 'list':
        $categoryId = (array_key_exists(2,$route->getParams())) ? $route->getParams()[2] : 1;
        $categories = listCategories();
        $products = listProducts($categoryId);
        include( APP_VIEW .'/product/listSubNav.php' );
        include( APP_VIEW .'/product/listView.php' );
        break;

    default:
        $categoryId = (array_key_exists(2,$route->getParams())) ? $route->getParams()[2] : 1;
        $categories = listCategories();
        $products = listProducts($categoryId);
        include( APP_VIEW .'/product/listSubNav.php' );
        include( APP_VIEW .'/product/listView.php' );
        break;
}


# Include html footer
include( APP_VIEW . '/footer.php' );


// Local Functions
function addCart($formArray, $productId) {

    if(isset($formArray['qty'])) {
        if (isset($_SESSION['cart'][$productId])) {
          $_SESSION['cart'][$productId] += $formArray['qty'];
        }
        else {
          $_SESSION['cart'][$productId] = $formArray['qty'];
        }
    }
}

function getProduct($productId) {

  $sql = "SELECT
            *
          FROM
            product
          WHERE
            id = ?";
  $dbObj = new db();
  $dbObj->dbPrepare($sql);
  $dbObj->dbExecute([$productId]);
  $product = $dbObj->dbFetch("assoc");

  return $product;
}

function listCategories() {

  $sql = "SELECT
            *
          FROM
            category
          ORDER BY
            name";

  $dbObj = new db();
  $dbObj->dbPrepare($sql);
  $dbObj->dbExecute();
  $category = $dbObj->dbFetch("all");

  return $category;
}

function listProducts($categoryId) {

  $sql = "SELECT
            *
          FROM
            product
          WHERE
            category = ?
          ORDER BY
            name";

  $dbObj = new db();
  $dbObj->dbPrepare($sql);
  $dbObj->dbExecute([$categoryId]);
  $products = $dbObj->dbFetch("all");

  return $products;
}
