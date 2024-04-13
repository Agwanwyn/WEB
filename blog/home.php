<?php
$post = [
    'title' => 'Let\'s do it together.',
    'subtitle' => 'We travel the world in search of stories. Come along for the ride.',
    'button' => 'View Latest Posts',
    'menu1' => 'Nature',
    'menu2' => 'Photography',
    'menu3' => 'Relaxation',
    'menu4' => 'Vacation',
    'menu5' => 'Travel',
    'menu6' => 'Adventure',
    'posts1' => 'Featured Posts',
    'posts2' => 'Most Recent',
];

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

function getAndPrintPostsFromDBFeaturesPosts(mysqli $conn): void {
  $sql = "SELECT * FROM post WHERE featured = 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $post1 = $row;
        include 'post_preview.php';
    }
  } else {
    echo "0 results";
  }
}

function getAndPrintPostsFromDBMostRecent(mysqli $conn): void {
    $sql = "SELECT * FROM post WHERE featured = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
            $post2 = $row;
            include 'post_preview2.php';
      }
    } else {
      echo "0 results";
    }
  }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title><?= $post['title'] ?></title>
    <link href="/static/styles/index-style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" />
</head>

<body>
    <header class="header">
        <h2 class="logo">
            <a href="/home" class="logo__link logo__link_header">Escape.</a>
        </h2>
        <nav class="navigation">
            <ul class="navigation__list">
                <li class="navigation__item">
                    <a href="/home" class="navigation__link navigation__link_header">HOME</a>
                </li>
                <li class="navigation__item">
                    <a href="/home" class="navigation__link navigation__link_header">CATEGORIES</a>
                </li>
                <li class="navigation__item">
                    <a href="/home" class="navigation__link navigation__link_header">ABOUT</a>
                </li>
                <li class="navigation__item">
                    <a href="/home" class="navigation__link navigation__link_header">CONTACT</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="banner">
            <h1 class="title"><?= $post['title'] ?></h1>
            <p class="subtitle"><?= $post['subtitle'] ?></p>
            <a href="/home" class="button"><?= $post['button'] ?></a>
        </div>
        <ul class="menu">
            <li class="menu__item">
                <a href="/home" class="menu__link"><?= $post['menu1'] ?></a>
            </li>
            <li class="menu__item">
                <a href="/home" class="menu__link"><?= $post['menu2'] ?></a>
            </li>
            <li class="menu__item">
                <a href="/home" class="menu__link"><?= $post['menu3'] ?></a>
            </li>
            <li class="menu__item">
                <a href="/home" class="menu__link"><?= $post['menu4'] ?></a>
            </li>
            <li class="menu__item">
                <a href="/home" class="menu__link"><?= $post['menu5'] ?></a>
            </li>
            <li class="menu__item">
                <a href="/home" class="menu__link"><?= $post['menu6'] ?></a>
            </li>
        </ul>
        <div class="posts">
            <p class="title-post"><?= $post['posts1'] ?></p>
            <hr class="line"/>
            <div class="features-posts">
            <?php        
                $conn = createDBConnection();
                getAndPrintPostsFromDBFeaturesPosts($conn);
                closeDBConnection($conn);  
            ?>                 
            </div>
            <p class="title-post"><?= $post['posts2'] ?></p>
            <hr class="line"/>
            <div class="most-recent">
            <?php 
                $conn = createDBConnection();
                getAndPrintPostsFromDBMostRecent($conn);
                closeDBConnection($conn); 
            ?>
            </div>
    </main>

    <footer class="footer__background1">
        <div class="footer__background2">
            <div class="footer__nav">
                <h2 class="logo">
                    <a href="/home" class="logo__link logo__link_footer">Escape.</a>
                </h2>
                <nav class="navigation navigation__footer">
                    <ul class="navigation__list">
                        <li class="navigation__item">
                            <a href="/home" class="navigation__link navigation__link_footer">HOME</a>
                        </li>
                        <li class="navigation__item">
                            <a href="/home" class="navigation__link navigation__link_footer">CATEGORIES</a>
                        </li>
                        <li class="navigation__item">
                            <a href="/home" class="navigation__link navigation__link_footer">ABOUT></a>
                        </li>
                        <li class="navigation__item">
                            <a href="/home" class="navigation__link navigation__link_footer">CONTACT</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
</body>

</html>