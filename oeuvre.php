<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>The ArtBox</title>
</head>
<body>
<?php require('header.php') ?>
<main>
    <?php if (!isset($_GET['id']) || filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
        $id = $_GET['id'];
    }
    require('oeuvres.php');
    $ids = array_column($oeuvres, 'id');
    if(in_array($id, $ids)) :
        foreach($oeuvres as $oeuvre) :
            if($id == $oeuvre['id']) : ?> 
                <article id="detail-oeuvre">
                    <div id="img-oeuvre">
                        <img src="img/<?php echo $oeuvre['img-oeuvre'] ?>" alt="<?php echo $oeuvre['title'] ?>">
                    </div>
                    <div id="contenu-oeuvre">
                    <h1><?php echo $oeuvre['title'] ?></h1>
                    <p class="description"><?php echo $oeuvre['description'] ?></p>
                    <p class="description-complete"><?php echo $oeuvre['description-complete'] ?></p>
                </div>
            </article>
            <?php endif;
        endforeach ;
    else : ?>
        <article id="detail-oeuvre">
            <div id="contenu-oeuvre">
                <h1>L'article que vous souhaitez consulter n'existe pas.</h1>
                <a href="index.php" class="description">Retour à la page d'accueil</a>
            <div>
        </article>
    <?php endif ; ?>
</main>
<?php require('footer.php') ?>
</body>
</html>