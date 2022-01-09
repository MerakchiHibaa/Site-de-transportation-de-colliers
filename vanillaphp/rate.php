<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
<link rel="stylesheet" href="rate.css">
    <title>Document</title>
</head>
<body>
    <div class="container-rate"> 
        <div id="post-rate">
            <div class="text-rate">Merci pour votre feedback !</div>
            
        </div>
        <div class="star-widget">
            <input type="radio" name="rate" id="rate-5">
            <label for="rate-5" class="fas fa-star"></label>

            <input type="radio" name="rate" id="rate-4">
            <label for="rate-4" class="fas fa-star"></label>

            <input type="radio" name="rate" id="rate-3">
            <label for="rate-3"class="fas fa-star"></label>

            <input type="radio" name="rate" id="rate-2">
            <label for="rate-2"class="fas fa-star"></label>

            <input type="radio" name="rate" id="rate-1">
            <label for="rate-1"class="fas fa-star"></label>


            <form action="./controllers/Users.php" class="form-rate" method="post"> 
                <header> </header>
                <div class="textarea-rate">
                    <input type="hidden" name="type" value="rate">
                    <input type="hidden" name="star" >
                    <textarea name="avis" id="" cols="30" placeholder="Que pensez-vous de cette expérience? " ></textarea>
                </div>
                <div class="btn-rate">
                    <button id="button-rate" type="submit"> Envoyer  </button>
                </div>
            </form>

        </div>
    </div>
    <script src="rate.js"></script>
</body>
</html>