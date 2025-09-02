<div class="card">
    <div class="card-body">
        <h5 class="card-title">Novo Projeto</h5>
        <form action="?page=salvar" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Projeto</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" name="cliente" id="cliente" class="form-control" pattern="[A-Za-záàâãéèêíïóôõöúüçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÜÇÑ\s]+" title="Somente letras, espaços e acentos são permitidos." required>
            </div>
            <div class="mb-3">
                <label for="contato" class="form-label">Contato (Telefone)</label>
                <input type="tel" name="contato" id="contato" class="form-control" placeholder="(00) 00000-0000" required>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control" pattern="[A-Za-záàâãéèêíïóôõöúüçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÜÇÑ\s]+" title="Somente letras, espaços e acentos são permitidos." required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="">Selecione um tipo</option>
                    <option value="Fotovoltaico">Fotovoltaico</option>
                    <option value="Agrônomo">Agrônomo</option>
                    <option value="Civil">Civil</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status do Projeto</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">Selecione um status</option>
                    <option value="Em Andamento">Em Andamento</option>
                    <option value="Em Planejamento">Em Planejamento</option>
                    <option value="Concluído">Concluído</option>
                    <option value="Atrasado">Atrasado</option>
                    <option value="Cancelado">Cancelado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="data_inicio" class="form-label">Data de Início</label>
                <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
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