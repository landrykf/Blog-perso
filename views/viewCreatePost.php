
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une marque</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <!-- <?php
                    if(!empty($_SESSION['erreur'])){
                        echo'<div class ="alert alert-danger" role= "alert">'. $_SESSION['erreur'].'
                        </div>';
                        $_SESSION['erreur']='';
                    }
                ?> -->
                <h1>Ajouter une marque</h1>
                <form method="post" action="post&status=new">
                    <div class="form-group">
                        <label for="title">Titre de l'article</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="content">Article</label>
                        <input type="text" name="content" id="content" class="form-control">
                    </div>

                    <!-- <div class="form-group">
                        <label for="brand_logo">Logo</label>
                        <input type="text" name="brand_logo" id="brand_logo" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="brand_description">Description</label>
                        <input type="text" name="brand_description" id="brand_description" class="form-control">
                    </div> -->
                    <button class="btn btn-danger">Ajouter l'article</button>
                </form>
            </section>
        </div>
    </main>
</body>
</html>