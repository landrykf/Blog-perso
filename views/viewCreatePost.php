<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">


                <h1>Ajouter un article</h1>
                <form method="post" action="post&status=new">
                    <div class="form-group">
                        <label for="title">Titre de l'article</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="content">Article</label>
                        <!-- <input type="text" name="content" id="content" class="form-control"> -->
                        <textarea name="content" id="content" cols="90" rows="10"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="categorieId">choisir catégorie</label>
                        <input type="text" name="categorieId" id="categorieId" class="form-control">
                        <!-- <select name="categorieId" id="categorieId">
                            <!-- <?php
                            //Boucle sur la variable result
                            foreach ($articles as $article) {
                            ?> -->
                                <option value="2">1</option>

                            <!-- <?php
                            }
                            ?> 
                        </select>  -->
                    </div>
                    <div class="form-group">
                        <label for="editorId">Id editeur</label>
                        <input type="text" name="editorId" id="editorId" class="form-control">
                    </div>


                    <button class="btn btn-danger">Ajouter l'article</button>
                </form>
            </section>
        </div>
    </main>
</body>

</html>