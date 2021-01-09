



    
    
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Article</title>
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    
    </head>
    
    <body>
    
    
        <main class="container">
            <div class="row">
                <section class="col-12">
                    <table class="table">
     
    
                    <!-- <a href="categorie" class="btn btn-success">gestion des Catégories</a> 
                    <a href="image" class="btn btn-success">gestion des Images</a>
                        <h1>Liste des Articles</h1>
                        <thead>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Date</th>
                            <th>categorie</th>
                            <th>editeur</th>
                            <th>action</th>
                        </thead> -->
                        <tbody>


                            <?php
                            //Boucle sur la variable articles
                            foreach ($articles as $article) {
                            ?>
                                <tr>
                                    <!-- <td><?php echo $article->id ?></td> -->
                                    <td><a href="/articles/read/<?= $article->id?>"><?php echo $article->title?></a></td>
                                    <td><?php echo $article->content ?></td>
                                    <td><?php echo $article->date ?></td>
                                    <td><?php echo $article->categorieId ?></td>
                                    <td><?php echo $article->editorId?></td>

                                     
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