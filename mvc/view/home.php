<?php /** @var array $usuarios */ ?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Usuários</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{font-family:system-ui,Segoe UI,Arial,sans-serif;margin:24px}
    .grid{display:grid;grid-template-columns:1fr 2fr;gap:24px}
    table{border-collapse:collapse;width:100%}
    th,td{border:1px solid #ddd;padding:8px;text-align:left}
    th{background:#f3f3f3}
    .card{border:1px solid #eee;border-radius:10px;padding:16px}
    @media (max-width: 800px){ .grid{grid-template-columns:1fr} }
  </style>
</head>
<body>
  <h1>Cadastro de Usuários</h1>
  <div class="grid">
    <section class="card">
      <h2>Novo usuário</h2>
      <?php require __DIR__ . '/usuarioForm.php'; ?>
    </section>

    <section class="card">
      <h2>Lista</h2>
      <?php require __DIR__ . '/usuarioList.php'; ?>
    </section>
  </div>
</body>
</html>
