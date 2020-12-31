<!-- <?php
foreach ($articles as $article) {
?>
    <a href="post&id=<?php echo $article->id() ?>"> <?php echo $article->title() ?> </a>

<?php
}
?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marques</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>


    <main class="container">
        <div class="row">
            <section class="col-12">
                <table class="table">
                    <?php
                    if (!empty($_SESSION['erreur'])) {
                        echo '<div class ="alert alert-danger" role= "alert">' . $_SESSION['erreur'] . '
                            </div>';
                        $_SESSION['erreur'] = '';
                    }
                    ?>
                    <?php
                    if (!empty($_SESSION['message'])) {
                        echo '<div class ="alert alert-success" role= "alert">' . $_SESSION['message'] . '
                            </div>';
                        $_SESSION['message'] = '';
                    }
                    ?> -->
                    <h1>Liste des Articles</h1>
                    <thead>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        <?php
                        //Boucle sur la variable result
                        foreach ($articles as $article) {
                        ?>
                            <tr>
                                <td><?php echo $article->id() ?></td>
                                <td><?php echo $article->title()  ?></td>
                                <td><?php echo $article->content() ?></td>
                                <td class="logoImage"><?php echo $article->date() ?></td>


                                 <td><a href="post&id=<?php echo $article->id() ?>"> Voir l'article  </a><!-- <a class="btn btn-danger" href="edit.php?id=<?php echo $brands['brand_id'] ?>">Modifier</a> <a class="btn btn-danger" href="delete.php?id=<?php echo $brands['brand_id'] ?>">Supprimer</a></td>  -->
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
                <a href="post&create" class="btn btn-success">Creer un nouvelle Article</a>
            </section>
        </div>
    </main>
</body>

</html>