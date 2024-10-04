<?php
/* É uma boa prática fazer a conexão com o SGBD e qualquer outra operação subsequente dentro de um try-catch */
try {
    /* Etapa 1 - Criar uma instância da classe de conexão e definir os parâmetros de conexão */
    $dbconn = pg_connect("host=localhost port=5432 dbname=PROGWEB user=postgres password=postgres");
    if($dbconn) {
       
        $aDados = array($_POST['Campo_primeiro_nome'],
                        $_POST['Campo_sobrenome'],
                        $_POST['Campo_email'],
                        $_POST['Campo_password'],
                        $_POST['Campo_cidade'],
                        $_POST['Campo_estado'])
        echo "database conectada..";

        /* Etapa 2 - Fazer uma query simples - retornará a quantidade de tabelas no database */
        $result = pg_query_params($dbconn, "INSERT INTO TBPESSOA
                                                (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE,PESESTADO)
                                                VALUES
                                                ($1, $2, $3, $4, $5, $6)"
                                            $aDados);

    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>