<?php
    date_default_timezone_set('America/Sao_Paulo'); 
    include_once 'conect.php';
    $connect = new Connection();

    $connection = $connect->Connect();

    //Necessário para receber parametros com o Axios
    $_POST = json_decode(file_get_contents("php://input"), true);

    //Valores para tipo de operação
    //1 - inserir
    //2 - visualizar
    $opt = (isset($_POST['opt'])) ? $_POST['opt'] : '';
    $items = (isset($_POST['items'])) ? $_POST['items'] : '';
    $saleman = (isset($_POST['saleman'])) ? $_POST['saleman'] : '';
    $total = (isset($_POST['total'])) ? $_POST['total'] : '';
    $id_venda = "";   


    switch($opt){
        case 1:
            $query = "INSERT into `venda` (`vendedor`, `data`, `hora`, `total`) VALUES (:saleman, :sale_date, :sale_time, :total)";
            try{
                $insert = $connection->prepare($query);
                $insert->execute(array(':saleman' => $saleman, ':sale_date' => date('Y-m-d'), ':sale_time' => date('H:i:s'), ':total' => $total));
                $query = "SELECT LAST_INSERT_ID()";//query que retorna o ultimo id inserido
                $id = $connection->query($query)->fetch();
                $id_venda = $id[0];
                foreach($items as $key => $value){
                    $query = "INSERT into `venda_produto` (`id_venda`, `nome`, `valor`, `quantidade`) VALUES (:id_venda, :prod_name, :price, :amount)";
                    try{
                        $insert = $connection->prepare($query);
                        $insert->execute(array(':id_venda'=>$id_venda, ':prod_name'=>$value['name'], ':price'=>$value['value'], ':amount'=>$value['count']));
                    }catch (PDOException $e){
                        echo $e->getMessage();
                    }
                }
            }catch (PDOException $e){
                echo $e->getMessage();
            }
            break;
        case 2:
            $query = "SELECT `id`, CONCAT(DATE_FORMAT(`data`, '%d/%m/%Y'), ' - ', `hora`) AS `data`, `vendedor`, FORMAT(`total`, 2, 'de_DE') AS `total` FROM `venda`";
            $result = $connection->prepare($query);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            break;
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);//envia o json para o JS
    $connection = NULL;