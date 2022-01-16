<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="certifie.css"> 
    <title>Document</title>
</head>
<body>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
   
    <div class="text">
       <h1> Merci pour votre inscription !</h1>
       <p> Veuillez envoyer une demande aux administrateur si vous voulez toujours devenir un transporteur certifié</p>
   </div>
   
    <div id="mainButton">
        <div class="btn-text" onclick="openForm()"> transportateur certifié</div>
        
            <form action="./controllers/Users.php" method="post" class="modal">
            <div class="close-button" onclick="closeForm()">x</div>
            <div class="form-title">Envoyer une demande</div>
            <div class="input-group">
                <input type="text" id="email" onblur="checkInput(this)" />
                <label for="name">Email</label>
            </div>
            <div class="input-group">
                <input type="text" id="demande" onblur="checkInput(this)" />
                <label for="demande">Demande </label>
            </div>
            <div class="form-button" onclick="closeForm()">Envoyer</div>
        </form>
       
    </div>

    <script src="certifie.js"> </script>

</body>
</html>