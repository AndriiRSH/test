<?php
    include "path.php";
    include "app/controllers/topics.php";

    $page = isset($_GET['page']) ? $_GET['page']: 1;
    $limit = 2;
    $offset = $limit * ($page - 1);
    $total_pages = round(countRow('posts') / $limit, 0);

    $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users', $limit, $offset);
    $topTopic = selectTopTopicFromPostsOnIndex('posts');


?>
<!doctype html>
<html lang="ua">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
<!--    <link rel="stylesheet" href="assets/css/slider.css">-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>September</title>
</head>
<body>

<?php include("app/include/header.php"); ?>
<!--<div>-->
<!--    <div class="slideshow-container">-->
<!--        <div class="mySlides fade">-->
<!--            <img class="slider__img" src="./assets/images/1.jpeg">-->
<!--            <div class="text">ЯК ВІДЧУВАТИ СЕБЕ ВПЕВНЕНІШОЮ ПЕРЕД ПЕРШИМ ПОБАЧЕННЯМ?</div>-->
<!--        </div>-->
<!--        <div class="mySlides fade">-->
<!--            <img class="slider__img" src="./assets/images/2.jpeg">-->
<!--            <div class="text">ЧИ ІСНУЄ ІНТУЇЦІЯ І ЯК ЇЇ РОЗВИВАТИ</div>-->
<!--        </div>-->
<!--        <div class="mySlides fade">-->
<!--            <img class="slider__img" src="./assets/images/3.jpeg">-->
<!--            <div class="text">ЩО У ЖІНЦІ НАЙВАЖЛИВІШЕ?</div>-->
<!--        </div>-->
<!--        <div class="mySlides fade">-->
<!--            <img class="slider__img" src="./assets/images/4.jpeg">-->
<!--            <div class="text">ТОП-10 ТАРГАНІВ У НАШІЙ ГОЛОВІ</div>-->
<!--        </div>-->
<!--        <div class="mySlides fade">-->
<!--            <img class="slider__img" src="./assets/images/5.jpeg">-->
<!--            <div class="text">План подорожі на 3 дні у 3-x різних країнах</div>-->
<!--        </div>-->
<!--        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>-->
<!--        <a class="next" onclick="plusSlides(1)">&#10095;</a>-->
<!---->
<!--        <div class="dots">-->
<!--            <span class="dot" onclick="currentSlide(1)"></span>-->
<!--            <span class="dot" onclick="currentSlide(2)"></span>-->
<!--            <span class="dot" onclick="currentSlide(3)"></span>-->
<!--            <span class="dot" onclick="currentSlide(4)"></span>-->
<!--            <span class="dot" onclick="currentSlide(5)"></span>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- блок карусели START-->

<!-- блок карусели END-->

<!-- блок main-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Публикації, що можуть вас зацікавити</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/images/2.jpeg" class="d-block w-100 slider__img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3><a href="">First</a></h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/6.jpeg" class="d-block w-100 slider__img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Second slide label</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/7.jpeg" class="d-block w-100 slider__img" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Third slide label</h3>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="content row ">
        <!-- Main Content -->
        <div class="main-content col-md-9 col-12">
            <h2 class="text-center">Останні публікації</h2>
            <?php foreach ($posts as $post): ?>
                <div class="post row justify-content-center">
                    <div class="img col-12 col-md-4">
                        <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>"><?=substr($post['title'], 0, 80) . '...'  ?></a>
                        </h3>
<!--                        <i class="far fa-user"> --><?//=$post['username'];?><!--</i>-->
                        <i class="far fa-calendar"> <?=$post['created_data'];?></i>
                        <p class="preview-text">

                            <?=mb_substr($post['content'], 0, 55, 'UTF-8'). '...'  ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php include("app/include/pagination.php"); ?>
        </div>
        <!-- sidebar Content -->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Пошук</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введіть слово...">
                </form>
            </div>


            <div class="section topics">
                <h3>Категорії</h3>
                <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                    <li>
                        <a href="<?=BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?=$topic['name']; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>

    </div>

</div>

<!-- блок main END-->
<!-- footer -->
<?php include("app/include/footer.php"); ?>
<!-- // footer -->


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!--    <script src="assets/script/slider.js"></script>-->
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>