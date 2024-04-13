<?php 

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function closeDBConnection(mysqli $conn): void {
  $conn->close();
}

function getAndPrintPostsFromDB(mysqli $conn): void {
  $value = $_GET['postid'];
  $sql = "SELECT post_id, title, subtitle, content, content_url FROM post";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $post = $row;
        if ($value == $post['post_id']) {
            include 'post_content.php';
        }
    }
  } else {
    echo "0 results";
  } 
  if($value > $result->num_rows) {
    echo "Ошибка";
  }
}

function getAndPrintPostsFromDBTitle(mysqli $conn): void {
    $value = $_GET['postid'];
    $sql = "SELECT post_id,title FROM post";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $post = $row;
          if ($value == $post['post_id']) {
            print $post['title'];
            echo " $value";
          }
      }
    } else {
      echo "0 results";
    } 
  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        <?php 
            $conn = createDBConnection();
            getAndPrintPostsFromDBTitle($conn);
            closeDBConnection($conn);
        ?>
    </title>
    <link href="/static/styles//the-road-ahead-style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" />
</head>

<body>
    <header class="header">
        <h2 class="logo">
            <a href="/home" class="logo-link logo-link-header">Escape.</a>
        </h2>
        <nav class="nav-header">
            <ul class="nav-list">
                <li class="nav-list-item">
                    <a href="/home" class="nav-link-header">HOME</a>
                </li>
                <li class="nav-list-item">
                    <a href="/home" class="nav-link-header">CATEGORIES</a>
                </li>
                <li class="nav-list-item">
                    <a href="/home" class="nav-link-header">ABOUT</a>
                </li>
                <li class="nav-list-item">
                    <a href="/home" class="nav-link-header">CONTACT</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
    <?php  
        $conn = createDBConnection();
        getAndPrintPostsFromDB($conn);
        closeDBConnection($conn);
    ?> 
    </main>
    <footer class="footer">
        <div class="footer-background">
            <h2 class="logo">
                <a href="/home" class="logo-link logo-link-footer">Escape.</a>
            </h2>
            <nav class="nav-footer">
                <ul class="nav-list">
                    <li class="nav-list-item">
                        <a href="/home" class="nav-link-footer">HOME</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="/home" class="nav-link-footer">CATEGORIES</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="/home" class="nav-link-footer">ABOUT</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="/home" class="nav-link-footer">CONTACT</a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>