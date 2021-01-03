    
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Images</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    </head>
    
    <body>
    
    
        <main class="container">
            <div class="row">
                <section class="col-12">
                    <table class="table">

                        <h1>Liste des Images</h1>
                        <thead>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Image</th>
                        </thead>
                        <tbody>
                            <?php
                            //Boucle sur la variable image
                            foreach ($images as $image) {
                            ?>
                                <tr>
                                    <td><?php echo $image->id() ?></td>
                                    <td><?php echo $image->name()  ?></td>
                                    <td><img src="<?php echo $image->link()?>" alt=""> </td>
    
    
                                     <td><!-- <a class="btn btn-danger" href="edit.php?id=<?php echo $brands['brand_id'] ?>">Modifier</a>-->
                                     <a href="img&delete&id=<?php echo $image->id() ?>"> supprimer cette image </a>  
                                </tr>
                            <?php
                            }
                            ?>
    
                        </tbody>
                    </table>
                    <a href="img&create" class="btn btn-success">Ajouter une nouvelle image</a>
                </section>
            </div>
        </main>
    </body>
    
    </html>