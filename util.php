<?php 
    function conecta ($params = "") {
        if ($params == "") {
            $params = "pgsql:host=projetoscti.com.br;  port=54432; 
            dbname=eq1.inf2; user=eq1.inf2; password=eq12556"; 
        }

        try {
            $varConn = new PDO($params);
            return $varConn;
        }
        catch (PDOException $e) {
            echo "<script>
                    alert('Não foi possível se conectar ao banco!');
                </script>";
            exit;
        }
    }

    function valorSQL ($paramConn, $paramSQL, $params)
    {   
        $select = $paramConn->prepare($paramSQL);
        foreach($params as $param)
        {
            $select->bindParam($param[0], $param[1]);
        }

        $select->execute();
        $linha = $select->fetch();
        return $linha[0];
    }
?>