<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./report.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

    <title>Report</title>
</head>
<body>

<?php 

if (isset($_GET['id'])) {
  $ID_trajet = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

}
 ?> 
    <div class="wrapper">
        <h2> <i class="fas fa-exclamation-triangle"></i> Signaler l'utilisateur </h2>
        <form method="POST" action="./controllers/Users.php"> 
            <input type="hidden" name="type" value="report">
            <input type="hidden" name="ID_trajet" value="<?php echo $ID_trajet ?>">


            <textarea name="" id="report" rows="" cols="30"  placeholder="Pourquoi souhaitez-vous signaler cet utilisateur ?" required>  </textarea>
        
            <input type="submit" name="report" value="Envoyer" id="submitreport" >

        </form>

    </div>

    <script type="text/javascript">
    const textarea = document.getElementById('report') ; 
    textarea.addEventListener('keyup', e => {
        let scheight = e.target.scrollHeight ; //
        textarea.style.height = `${scheight}px` ; 

    })
    </script>
</body>
</html>