
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

                <h1>Ajouter une Catégorie</h1>
                <form method="post" action="cat&status=new">
                    <div class="form-group">
                        <label for="name">Nom de la catégorie</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>


                    <button class="btn btn-danger">Ajouter la catégorie</button>
                </form>
            </section>
        </div>
    </main>
</body>
</html>