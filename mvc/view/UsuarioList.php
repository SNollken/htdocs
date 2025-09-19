<?php /** @var array $usuarios */ ?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Usuários</title>
</head>
<body>
  <h1>Lista de Usuários</h1>

  <?php if (empty($usuarios)): ?>
    <p>Nenhum usuário encontrado.</p>
  <?php else: ?>
    <table border="1" cellpadding="6" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th><th>Nome</th><th>Sobrenome</th><th>Idade</th><th>Sexo</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($usuarios as $u): ?>
        <tr>
          <td><?= htmlspecialchars($u['id']) ?></td>
          <td><?= htmlspecialchars($u['nome']) ?></td>
          <td><?= htmlspecialchars($u['sobrenome']) ?></td>
          <td><?= htmlspecialchars($u['idade']) ?></td>
          <td><?= htmlspecialchars($u['sexo']) ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>
</html>
