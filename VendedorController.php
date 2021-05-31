<?php

class VendedorController extends Controller {

    public function listar() {
        $vendedores = Vendedor::all();
        return $this->view('grade', ['vendedores' => $vendedores]);
    }

    public function criar() {
        return $this->view('form');
    }

    public function salvar() {
        $vendedor = new Vendedor();
        $vendedor->nome = $this->request->nome;
        $vendedor->email = $this->request->email;
        $vendedor->telefone = $this->request->telefone;

        if ( $vendedor->save() ) {
            return $this->listar();
        }
    }

    public function editar($dados) {
        $id = (int) $dados['id'];
        $vendedor = Vendedor::find($id);

        return $this->view('form', ['vendedor' => $vendedor]);
    }

    public function atualizar($dados) {
        $id = (int) $dados['id'];
        $vendedor = Vendedor::find($id);
        $vendedor->nome = $this->request->nome;
        $vendedor->email = $this->request->email;
        $vendedor->telefone = $this->request->telefone;
        $vendedor->save();

        return $this->listar();
    }

    public function excluir($dados) {

        $id = (int) $dados['id'];
        $vendedor = Vendedor::destroy($id);

        return $this->listar();

    }


}