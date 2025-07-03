<h1>Editar Projeto</h1>
<?php
    $sql = "SELECT * FROM projeto WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="
        <?php print $row->nome; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Contato</label>
        <input type="text" name="contato"  value="
        <?php print $row->contato; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Cidade</label>
        <input type="text" name="cidade"  value="
        <?php print $row->cidade; ?>" class="form-control">
    </div>
      <div class="mb-3">
        <label>Tipo</label>
        <input type="text" name="tipo"  value="
        <?php print $row->tipo; ?>" class="form-control">
    </div>
        </div>
      <div class="mb-3">
        <button type="submit" class="btn
        btn-primary">Enviar</button>
    </div>
</form>