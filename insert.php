<?php
require "settings/init.php";

if (!empty($_POST["data"])){
    $data = $_POST["data"];
    $file = $_FILES;


    if (!empty($file["filmBillede"]["tmp_name"])){
        move_uploaded_file($file["filmBillede"]["tmp_name"], "uploads/" . basename($file["filmBillede"]["name"]));
    }



    $sql = "INSERT INTO Filmsogning (
                filmTitel,
                filmBillede,         
                filmRating,
                filmAar,
                filmSkuespillere,
                filmResume,
                filmMPA,
                filmTid,
                filmInstruktor,
                filmCitat,
                filmUdkommelsesdato,
            ) 
            VALUES(
                :filmTitel,
                :filmBillede,   
                :filmRating,
                :filmAar,
                :filmSkuespillere,
                :filmResume,
                :filmMPA,
                :filmTid,
                :filmInstruktor,
                :filmCitat,
                :filmUdkommelsesdato,
            )";
    $bind = [
        ":filmTitel" => $data["filmTitel"],
        ":filmBillede" => (!empty($file["filmBillede"]["tmp_name"])) ? $file["filmBillede"]["name"] : NULL,

        ":filmRating" => $data["filmRating"],
        ":filmAar" => $data["filmAar"],
        ":filmSkuespillere" => $data["filmSkuespillere"],
        ":filmResume" => $data["filmResume"],
        ":filmMPA" => $data["filmMPA"],
        ":filmTid" => $data["filmTid"],
        ":filmInstruktor" => $data["filmInstruktor"],
        ":filmCitat" => $data["filmCitat"],
        ":filmUdkommelsesdato" => $data["filmUdkommelsesdato"],
    ];

    $db->sql($sql, $bind, false);


    echo "<body style= 
            'font-family: Times;
            	background: rgb(0,0,0); background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(9,1,34,1) 36%, rgba(110,0,0,1) 100%, rgba(255,0,0,1) 100%, rgba(255,0,0,1) 100%) !important;
            
          '</body><h1 style='margin-top: 200px; 
            text-decoration: none; 
            font-family: Baskerville, sans-serif; 
            display: flex;
            justify-content: center;
            color: white;
            font-weight: normal;
            font-size: 50px;
            
            '>Produktet er nu indsat.</h1> <
            h2 style=
            'justify-content: center; 
            display: flex; 
            font-family: Baskerville;
            '><a style='text-decoration: none; color: white;' href='insert.php'><h3 style='font-weight: normal;'>Indsæt en film mere</button></h3></a>";

    exit();
}
?>

<!-- Instruktion til webbrowser om at vi kører HTML5 -->
<!DOCTYPE html>

<!-- html starter og slutter hele dokumentet / lang=da: Fortæller siden er på dansk -->
<html lang="da">

<!-- I <head> har man opsætning - det ser brugeren ikke, men det fortæller noget om siden -->
<head>
    <!-- Sætter tegnsætning til utf-8 som bl.a. tillader danske bogstaver -->
    <meta charset="utf-8">

    <!-- Titel som ses oppe i browserens tab mv. -->
    <title>Tilsæt til database</title>

    <!-- Metatags der fortæller at søgemaskiner er velkomne, hvem der udgiver siden og copyright information -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tiny.cloud/1/bpmvvjjsg56di8tqwy5ltbdzo0v191lccrlxro1wzbiasabg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- i <body> har man alt indhold på siden som brugeren kan se -->
<body>

<div class="container-fluid text-light p-5 pb-1 text-center">
    <h1 class="overskrift"><span>&#127916;</span>FILM INFO<span>&#127916;</span></h1>
</div>
<div class="container-fluid text-light p-5">
    <form method="post" action="insert.php" enctype="multipart/form-data">
        <div class="row">
            <!--                filmTitel-->
            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmTitel" class="titel">FILMTITEL</label>
                    <input class="form-control" type="text" name="data[filmTitel]" id="filmTitel" placeholder="Filmtitel" value="">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label" for="filmBillede"></label>
                <input type="file" class="form-control" id="filmBillede" name="filmBillede">
            </div>

            <!--                filmRating-->
            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmRating" class="titel">FILMRATING</label>
                    <input class="form-control" type="number" step="0.1" min="0" max="10" name="data[filmRating]" id="filmRating" placeholder="0-10" value="">
                </div>
            </div>

            <!--                filmAar-->
            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmAar" class="titel">ÅR</label>
                    <input class="form-control" min="0000" max="2024" type="number" step="0.1" name="data[filmAar]" id="filmAar" placeholder="År" value="">
                </div>
            </div>

            <!--                filmSkuespillere-->
            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmSkuespillere" class="titel">SKUESPILLERE</label>
                    <input class="form-control" type="text" step="0.1" name="data[filmSkuespillere]" id="filmSkuespillere" placeholder="Skuespillere" value="">
                </div>
            </div>

            <!--                filmMPA-->

            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmMPA" class="titel">MPA-RATING</label>
                    <input class="form-control" type="number" step="0.1" name="data[filmMPA]" id="filmMPA" placeholder="FilmMPA" value="">
                </div>
            </div>
            <!--                filmTid-->
            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmTid" class="titel">TID</label>
                    <input type="time" class="form-control" name="data[filmTid]" id="filmTid">
                </div>
            </div>
            <!--                filmInstuktør-->
            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmInstruktor" class="titel">INSTRUKTØR</label>
                    <input class="form-control" type="text" step="0.1" name="data[filmInstruktor]" id="filmInstruktor" placeholder="Instruktør" value="">
                </div>
            </div>
            <!--                filmCitat-->
            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmCitat" class="titel">KENDT CITAT FRA FILMEN</label>
                    <input class="form-control" type="text" step="0.1" name="data[filmCitat]" id="filmCitat" placeholder="Citat" value="">
                </div>
            </div>
            <!--                filmUdkommelsesdato-->
            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmUdkommelsesdato" class="titel">Udkommelsesdato</label>
                    <input class="form-control" type="date" step="0.1" name="data[filmUdkommelsesdato]" id="filmUdkommelsesdato" placeholder="FilmUdkommelsesdato" value="">
                </div>
            </div>

            <!--                filmResume-->
            <div class="col-12 col-md-6 p-2">
                <div class="form-group m-2">
                    <label for="filmResume" class="titel">Resumé</label>
                    <textarea class="form-control" cols="4" name="data[filmResume]" id="filmResume" placeholder="Filmens resumé"></textarea>
                </div>
            </div>
            <div class="col-12 col-md-2 offset-md-4 p-2">
                <button class="form-control btn btn-dark" type="submit" id="btnSubmit"><h4>OPRET</h4></button>
            </div>
            <!--                Opret -->
        </div>

    </form>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
    });
</script>














</body>
</html>
