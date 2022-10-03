<?php
require "settings/init.php";

$bind = [":movieId" => $_GET["movieId"]];

$movies = $db->sql("SELECT * FROM Filmsogning WHERE`filmId` = :movieId;", $bind);
?>


<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <?php
    foreach ($movies as $Filmsogning){
    ?>

    <title><?php echo $movie->filmTitel?></title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/b7f7f27b49.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container-fluid">
    <div class="col-12">
        <div class="back text-hvid p-3">
            <a href="index.html"><i class="fa-solid fa-arrow-left-long fa-1x link-hvid"></i></a>
        </div>
    </div>
</div>
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 text-hvid mt-1">
            <div style="font-size: 70px;" class="filmtitel">

                <?php
                echo $Filmsogning->filmTitel;
                ?>

            </div>
            <div class="justify-content-start d-flex">

                <div style="font-size: 40px; margin-right: 5px; color: #FFB800;" class="star">
                    &#9733;
                </div>
<!--                filmRating-->
                <div style="font-size: 40px" class="rating">
                    <?php
                    echo $Filmsogning->filmRating;
                    ?>
                </div>

                <div style="font-size: 40px; margin-left: 5px; opacity: 50%;" class="outof">
                    / 10
                </div>

            </div>
<!--            filmAar, filmMPA, filmTid-->
            <div style="font-size: 20px;" class="pb-2 pt-3">
                <?php
                echo $Filmsogning->filmAar;
                ?>
                •
                <?php
                echo $Filmsogning->filmMPA;
                ?>
                •
                <?php
                echo $Filmsogning->filmTid;
                ?>
            </div>
<!--            filmUdkommelsesdato-->
            <div style="font-size: 20px;margin-bottom: 20px;">
                <?php
                echo $Filmsogning->filmUdkommelsesdato;
                ?>
                (USA)
            </div>

            <div class="justify-content-start d-flex">
                <div class="col-12 text-hvid pics " style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                    <img src="uploads/<?php echo $Filmsogning->filmBillede; ?>">

                </div>
            </div>

            <div
<!--filmResume-->
            <div style="font-size: 20px; margin-top: 20px;">
                <?php
                echo $Filmsogning->filmResume;
                ?>
            </div>

<!--filmInstruktor-->
            <div class="col-12 instructor justify-content-start d-flex mt-2">
                <div class="big" style="font-size: 23px;">
                    Instruktør
                </div>
                <div class="small" style="font-size: 20px; margin-left: 60px; margin-bottom: 9px; color: #5C58FF">
                    <a href="https://www.imdb.com/title/tt0110357/?ref_=fn_al_tt_1" target="_blank" style="color: inherit; text-decoration: none;">
                        <?php
                        echo $Filmsogning->filmInstruktor;
                        ?>
                    </a>
                </div>
            </div>
            <div class="col-12 actors justify-content-start d-flex">
                <div class="big" style="font-size: 23px">
                    Skuespillere
                </div>
                <div class="small" style="font-size: 20px; margin-bottom: 15px; margin-left: 30px; color: #5C58FF;">
                    <a href="https://www.imdb.com/title/tt0110357/?ref_=fn_al_tt_1" target="_blank" style="color: inherit; text-decoration: none;">
                        <?php
                        echo $Filmsogning->filmSkuespillere;
                        ?>
                    </a>
                </div>
            </div>

            <div class="col-6 quote" style="font-size: 50px; margin-top: 70px;">
                <div style="font-family: 'Playfair Display', sans-serif; line-height: 70px;">
                    <b style="font-size: 90px;">"</b>
                    <?php
                    echo $Filmsogning->filmCitat;
                    ?>
                    <b style="font-size: 90px;">"</b>
                </div>
            </div>

        </div>

        <!--    <div class="col-12 col-md-6 bg-primary">-->
        <!--        --><?php
        //        echo number_format ($Filmsogning->filmRating, 2);
        //        ?>
        <!--    </div>-->
        <!--    <div class="col-12 col-md-6 bg-primary">-->
        <!--        --><?php
        //        echo number_format ($Filmsogning->filmAar, 2);
        //        ?>
        <!--    </div>-->
        <!--    <div class="col-12 col-md-6 bg-primary">-->
        <!--        --><?php
        //        echo $Filmsogning->filmSkuespillere;
        //        ?>
        <!--    </div>-->
    </div>
</div>



<!--<div class="container-fluid p-5">-->
<!--    <h1>-->
<!--        Løvernes Konge-->
<!--    </h1>-->
<!--    <div class="star justify-content-start d-flex">-->
<!--        &#9733;-->
<!--        <div class="rate">8.5</div>-->
<!--        <div class="outoften">/10</div>-->
<!--    </div>-->
<!---->
<!--    <br>-->
<!--    <div class="info">-->
<!---->
<!--        <div class="diverse">-->
<!--            1994 • 7 • 1t 28m-->
<!--        </div>-->
<!---->
<!--        <div class="date">-->
<!--            15. juni 1994 (USA)-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!---->
<!--    <div class="pics justify-content-start d-flex">-->
<!--        <div class="poster border-2 border-hvid">-->
<!--            <img src="images/lionkingposter.jpeg" alt="lionking">-->
<!--        </div>-->
<!--        <div class="poster border-2 border-hvid mx-4">-->
<!--            <img src="images/sequence.png" alt="lionking" style="width: 61%">-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="description mt-2">-->
<!--        Lille prins Simba prøver at få sin trone tilbage, efter at hans onkel havde erobret den.-->
<!--    </div>-->
<!---->
<!--    <div class="cast mt-3">-->
<!--        <div class="instructor justify-content-start d-flex">-->
<!--            <div class="big">-->
<!--                Instruktører-->
<!--            </div>-->
<!--            <div class="small">-->
<!--                Roger Allers, Rob Minkoff-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="actors justify-content-start d-flex">-->
<!--            <div class="big">-->
<!--                Skuespillere-->
<!--            </div>-->
<!--            <div class="small">-->
<!--                <div class="lionking">-->
<!--                    Matthew Broderick, James Earl Jones-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<?php
}
    ?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>