<h1>Vendedores</h1>
<hr>
<div class="container">

    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações <a href="?controller=VendedorController&method=criar" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
               
            if ($vendedores) {
                foreach($vendedores as $vendedor) {
                    ?>
                    <tr>
                        <td><?php echo $vendedor->nome; ?></td>
                        <td><?php echo $vendedor->email; ?></td>
                        <td><?php echo $vendedor->telefone; ?></td>
                        <td>
                            <a href="?controller=VendedorController&method=editar&id=<?php echo $vendedor->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=VendedorController&method=excluir&id=<?php echo $vendedor->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhum registro encontrado.</td>
                </tr>
                <?php
            }   
            ?>
        </tbody>
    </table>

</div>