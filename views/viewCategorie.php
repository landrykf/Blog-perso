    
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

                        <h1>Liste des Categories</h1>
                        <thead>
                            <th>ID</th>
                            <th>Nom</th>

                        </thead>
                        <tbody>
                            <?php
                            //Boucle sur la variable result
                            foreach ($categories as $categorie) {
                            ?>
                                <tr>
                                    <td><?php echo $categorie->id() ?></td>
                                    <td><?php echo $categorie->name()  ?></td>
                                  
    
    
                                     <td><!-- <a class="btn btn-danger" href="edit.php?id=<?php echo $brands['brand_id'] ?>">Modifier</a>-->
                                     <a href="cat&delete&id=<?php echo $categorie->id() ?>"> supprimer la categorie  </a>  
                                </tr>
                            <?php
                            }
                            ?>
    
                        </tbody>
                    </table>
                    <a href="cat&create" class="btn btn-success">Ajouter une nouvelle Catégorie</a>
                </section>
            </div>
        </main>
    </body>
    
    </html>