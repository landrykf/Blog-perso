    
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editeurs</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    </head>
    
    <body>
    
    
        <main class="container">
            <div class="row">
                <section class="col-12">
                    <table class="table">

                        <h1>Liste des Editeurs</h1>
                        <thead>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                            <?php
                            //Boucle sur la variable result
                            foreach ($editors as $editor) {
                            ?>
                                <tr>
                                    <td><?php echo $editor->id() ?></td>
                                    <td><?php echo $editor->name()  ?></td>
                                    <!-- <td><?php echo $editor->password()  ?></td> -->

    
                                     <td><!-- <a class="btn btn-danger" href="edit.php?id=<?php echo $brands['brand_id'] ?>">Modifier</a>-->
                                     <a href="edit&delete&id=<?php echo $editor->id() ?>"> supprimer l'éditeur </a>  
                                </tr>
                            <?php
                            }
                            ?>
    
                        </tbody>
                    </table>
                    <a href="edit&create" class="btn btn-success">Ajouter un nouvel éditeur</a>
                </section>
            </div>
        </main>
    </body>
    
    </html>