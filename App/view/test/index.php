<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php echo var_dump($data); ?>
  <br>
  <br>
  <?php 
      // $url = rtrim("/login/test?test=23&yeah=0123", '/');
      $url = rtrim("/home?page=1", '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $urlSegments = explode('/', $url);
      $urlSegments = array_filter($urlSegments); // Remove empty segments
      
      // Extract the desired result format
      $result = [];
      
    //array(2) { [0]=> string(4) "home" [1]=> string(6) "page=1" }
    //array(2) { [0]=> string(4) "home" [1]=> array(1) { ["page"]=> string(1) "1" } }

      // Check if there are any query parameters before including them in the result
      if (!empty($queryParameters)) {
          $result[] = $queryParameters;
      }
      
      // Iterate through URL segments
      foreach ($urlSegments as $segment) {
          if (strpos($segment, '?') !== false) {
              list($path, $query) = explode('?', $segment, 2);
              $result[] = $path;
              // Parse and add query parameters
              parse_str($query, $queryParameters);
              $result[] = $queryParameters;
          } else {
              $result[] = $segment;
          }
      }
      
      echo var_dump($result);
      
       
    ?>
    <br>
  <br>

   <br><br>
   <?php echo var_dump($data); ?>

   <br>
   <br>
</body>
</html>