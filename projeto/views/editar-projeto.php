<?php
    $sql = "SELECT * FROM projeto WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Editar Projeto</h5>
        <form action="?page=salvar" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php print $row->id; ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Projeto</label>
                <input type="text" name="nome" id="nome" value="<?php print $row->nome; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" name="cliente" id="cliente" value="<?php print $row->cliente; ?>" class="form-control" pattern="[A-Za-záàâãéèêíïóôõöúüçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÜÇÑ\s]+" title="Somente letras, espaços e acentos são permitidos." required>
            </div>
            <div class="mb-3">
                <label for="contato" class="form-label">Contato (Telefone)</label>
                <input type="tel" name="contato" id="contato" value="<?php print $row->contato; ?>" class="form-control" placeholder="(00) 00000-0000" required>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" id="cidade" value="<?php print $row->cidade; ?>" class="form-control" pattern="[A-Za-záàâãéèêíïóôõöúüçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÜÇÑ\s]+" title="Somente letras, espaços e acentos são permitidos." required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="">Selecione um tipo</option>
                    <option value="Fotovoltaico" <?php if($row->tipo == 'Fotovoltaico') echo 'selected'; ?>>Fotovoltaico</option>
                    <option value="Agrônomo" <?php if($row->tipo == 'Agrônomo') echo 'selected'; ?>>Agrônomo</option>
                    <option value="Civil" <?php if($row->tipo == 'Civil') echo 'selected'; ?>>Civil</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status do Projeto</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">Selecione um status</option>
                    <option value="Em Andamento" <?php if($row->status == 'Em Andamento') echo 'selected'; ?>>Em Andamento</option>
                    <option value="Em Planejamento" <?php if($row->status == 'Em Planejamento') echo 'selected'; ?>>Em Planejamento</option>
                    <option value="Concluído" <?php if($row->status == 'Concluído') echo 'selected'; ?>>Concluído</option>
                    <option value="Atrasado" <?php if($row->status == 'Atrasado') echo 'selected'; ?>>Atrasado</option>
                    <option value="Cancelado" <?php if($row->status == 'Cancelado') echo 'selected'; ?>>Cancelado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="data_inicio" class="form-label">Data de Início</label>
                <input type="date" name="data_inicio" id="data_inicio" value="<?php print $row->data_inicio; ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Edição</button>
        </form>
    </div>
</div>

<script>
    const telInput = document.getElementById('contato');

    telInput.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, ''); 
        
        if (value.length > 0) {
            value = '(' + value.substring(0, 2) + ') ' + value.substring(2, 7) + '-' + value.substring(7, 11);
        }

        e.target.value = value.substring(0, 15);
    });
</script>