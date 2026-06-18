<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

_MESSAGE_

	  <div class="container">

<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  <a href="." class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <span class="fs-4">vise</span>
  </a>

  <ul class="nav nav-pills">
    <li class="nav-item"><a href="." class="nav-link active" aria-current="page">Links</a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link">Sair</a></li>
  </ul>
</header>
          <p>
            <a class="btn btn-s btn-primary" href="add.php" role="button">Novo</a>
          <p>

          <table class="table">
            <thead>
              <tr>
                <th>Handle</th>
                <th>URL de destino</th>
                <th>Última atualização</th>
              </tr>
            </thead>
            <tbody>
	      _LINKS_
            </tbody>
          </table>
	  </div>
          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
