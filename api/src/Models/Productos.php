<?php
include_once __DIR__ . "/../Config/conexionDB.php";
class Productos
{
    //Mostrar Producto
    public static function all()
    {
        $sql = "SELECT * FROM productos";
        return ConexionPDO::query($sql);
    }
    //Actualizar Producto
    public static function update($id, $data)
    {
        if (isset($data['id'])) {
            unset($data['id']);
        }
        $campos = [];
        $valores = [];
        //construir datos
        foreach ($data as $columna => $valor) {
            $campos[] = "$columna=:$columna";
            $valores[":$columna"] = $valor;
        }

        $stringCampos = implode(",", $campos);

        //preparamos la consulta
        $sql = "UPDATE productos SET $stringCampos WHERE id=:id";
        $valores[':id'] = $id;
        //print_r($valores);
        $result = ConexionPDO::execute($sql, $valores, false);
        return $result;
    }
    public static function add($data)
    {
        $columnas = [];
        $campos = [];
        $valores = [];
        //construir datos
        foreach ($data as $columna => $valor) {
            $columnas[] = $columna;
            $campos[] = ":$columna";
            $valores[":$columna"] = $valor;
        }

        $stringColumnas = implode(",", $columnas);
        $stringCampos = implode(",", $campos);
        //preparamos la consulta
        $sql = "INSERT INTO productos ($stringColumnas) VALUES ($stringCampos)";
        $result = ConexionPDO::execute($sql, $valores, true);
        return $result;

    }
}
