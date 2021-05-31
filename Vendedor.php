<?php

class Vendedor {

    private $atributos;

    public function __construct() {}

    public function __set(string $atributo, $valor) {
        $this->atributos[$atributo] = $valor;
        return $this;
    }

    public function __get(string $atributo) {
        return $this->atributos[$atributo];
    }

    public function __isset($atributo) {
        return isset($this->atributos[$atributo]);
    }

    public function save() {

        $colunas = $this->preparar($this->atributos);

        if (!isset($this->id)) {
            $query = "INSERT INTO vendedor ( " . implode(', ', array_keys($colunas)) . ") VALUES (" . implode(', ', array_values($colunas)) . ");"; 
        } else {
            foreach ($colunas as $key => $value) {
                if ($key !== 'id') {
                    $definir[] = "{$key}={$value}";
                }
            }

            $query = "UPDATE vendedor SET " . implode(', ', $definir) . " WHERE id = '{$this->id}'; ";
        }

        if ($conexao = Conexao::getInstance()) {
            $stmt = $conexao->prepare($query);

            if ($stmt->execute()) {
                return $stmt->rowCount();
            }
        }

        return false;        
    }

    private function escapar($dados) {
        if (is_string($dados) & !empty($dados)) {
            return "'".addslashes($dados)."'";
        } elseif (is_bool($dados)) {
            return $dados ? 'TRUE' : 'FALSE';
        } elseif ($dados !== '') {
            return $dados;
        } else {
            return 'NULL';
        }
    }

    private function preparar($dados) {
        $resultado = array();
        foreach ($dados as $k => $v) {
            if (is_scalar($v)) {
                $resultado[$k] = $this->escapar($v);
            }
        }
        return $resultado;
    }

    public static function all() {

        $conexao = Conexao::getInstance();
        $sql = "SELECT * FROM vendedor;";

        $stmt = $conexao->prepare($sql);
        $result = array();

        if (!$stmt->execute()) {
            return false;
        }

        while ($rs = $stmt->fetchObject(Vendedor::class)) {
            $result[] = $rs;
        }

        if (count($result) > 0) {
            return $result;
        }

        return false;
    }

    public static function count() {

        $conexao = Conexao::getIntance();
        $sql = "SELECT count(1) FROM vendedor;";

        $count = $conexao->exec($sql);

        if ($count) {
            return (int) $count;
        }

        return false;
    }

    public static function find($id) {
        $conexao = Conexao::getInstance();
        $sql = "SELECT * FROM vendedor WHERE id = '{$id}';";

        $stmt = $conexao->prepare($sql);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $resultado = $stmt->fetchObject('Vendedor');
        }

        if ($resultado) {
            return $resultado;
        }

        return false;
    }

    public static function destroy($id) {
        $conexao = Conexao::getInstance();

        $sql = "DELETE FROM vendedor WHERE id = '{$id}'; ";

        if ($conexao->exec($sql)) {
            return true;
        }

        return false;
    }

}

?>