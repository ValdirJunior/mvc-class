<div class="container">

    <form action="?controller=VendedorController&<?php echo isset($vendedor->id) ? "method=atualizar&id={$vendedor->id}" : "method=salvar"; ?>" method="post">

        <div class="card" style="top=40px">

            <div class="card-header">
                <span class="card-title">Vendedor</span>
            </div>

            <div class="card-body">
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Nome:</label>
                    <input type="text" class="form-control col-sm-8" name="nome" value="<?php echo isset($vendedor->nome) ? $vendedor->nome : null; ?>">
                </div>

                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Email:</label>
                    <input type="email" class="form-control col-sm-8" name="email" value="<?php echo isset($vendedor->email) ? $vendedor->email : null; ?>">
                </div>

                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Telefone:</label>
                    <input type="text" class="form-control col-sm-8" name="telefone" value="<?php echo isset($vendedor->telefone) ? $vendedor->telefone : null; ?>">
                </div>
            </div>

            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($vendedor->id) ? $vendedor->id : null; ?>">
                <button class="btn btn-success" type="submit">Salvar</button>
                <button class="btn btn-warning">Limpar</button>
                <a class="btn btn-danger" href="?controller=VendedorController&method=listar">Voltar</a>
            </div>

        </div>

    </form>

</div>