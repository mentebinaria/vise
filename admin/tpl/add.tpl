<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

	  <div class="container">

      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="." class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <span class="fs-4">vise</span>
        </a>
      
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="." class="nav-link" aria-current="page">Links</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Sair</a></li>
        </ul>
      </header>

      <form class="row g-3 needs-validation" method="post" action="." validate>
        <div class="col-md-6">
          <label for="handle" class="form-label">Handle</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">menteb.in/</span>
            <input type="text" class="form-control" id="handle" name="handle" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              E o handle?
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <label for="dest" class="form-label">URL de destino</label>
          <input type="text" class="form-control" id="dest" name="dest" placeholder="https://exemplo.com" required>
          <div class="invalid-feedback">
            Vai redirecionar pra onde?
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Criar</button>
        </div>
      </form>

	      
	  </div>
          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
