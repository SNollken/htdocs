<form method="POST" action="index.php?action=cadastrar">
  <div style="display:grid;gap:8px;max-width:420px">
    <label>Nome
      <input type="text" name="nome" required>
    </label>
    <label>Sobrenome
      <input type="text" name="sobrenome" required>
    </label>
    <label>Idade
      <input type="number" name="idade" min="0" required>
    </label>
    <label>Sexo
      <select name="sexo" required>
        <option value="">Selecione</option>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
        <option value="O">Outro</option>
      </select>
    </label>

    <button type="submit" name="cadastrar" value="1">Salvar</button>
  </div>
</form>
