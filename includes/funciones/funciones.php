<?php
    function productos_json(&$boletos, &$camisas = 0, &$etiquetas = 0){

        $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'pase_2dias');
        $total_boletos = array_combine($dias, $boletos);
        $json = array();

        foreach($total_boletos as $key => $boletos):
            if((int) $boletos > 0):
                $json[$key] = (int) $boletos;
            endif;
        endforeach;

        $camisas = (int) $camisas;
        if($camisas > 0):
            $json['camisas'] = $camisas;
        endif;

        $etiquetas = (int) $etiquetas;
        if($etiquetas > 0):
            $json['etiquetas'] = $etiquetas;
        endif;

        return json_encode($json);
    }

    function eventos_json(&$eventos){
        $eventos_json = array();
        foreach($eventos as $evento):
            $eventos_json['eventos'][] = $evento;
        endforeach;

        return json_encode($eventos_json);
    }

    function formatear_pedido($articulos){
        $articulosDecode = json_decode($articulos, true);
        $pedido = '';
        if(array_key_exists('un_dia', $articulosDecode)):
            $pedido .= 'Pase(s) 1 día: ' . $articulosDecode['un_dia'] . "<br>";
        endif;
        if(array_key_exists('pase_2dias', $articulosDecode)):
            $pedido .= 'Pase(s) 2 día: ' . $articulosDecode['pase_2dias'] . "<br>";
        endif;
        if(array_key_exists('pase_completo', $articulosDecode)):
            $pedido .= 'Pase(s) Completos: ' . $articulosDecode['pase_completo'] . "<br>";
        endif;
        if(array_key_exists('camisas', $articulosDecode)):
            $pedido .= 'Camisas: ' . $articulosDecode['camisas'] . "<br>";
        endif;
        if(array_key_exists('etiquetas', $articulosDecode)):
            $pedido .= 'Etiquetas: ' . $articulosDecode['etiquetas'] . "<br>";
        endif;
        return $pedido;
    }

    function formatear_eventos_a_sql($eventos){
        $eventosDecode = json_decode($eventos, true); //true es para array asociativo
        $sql = "SELECT nombre_evento FROM eventos WHERE clave = 'a' ";

        foreach($eventosDecode['eventos'] as $evento):
            $sql .= "OR clave = '{$evento}' ";
        endforeach;
        
        return $sql;
    }

    function usuario_autenticado(){
        if(!revisar_usuario()){
            header('Location:login.php');
        }
    }
    function revisar_usuario(){
        return $_SESSION['usuario'];
    }
?>