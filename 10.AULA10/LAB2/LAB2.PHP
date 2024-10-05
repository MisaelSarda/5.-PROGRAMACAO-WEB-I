<!--
    Obter os dados do formulário e armazenar no SGBD Postgres.
-->
<?php
    try {
        /* Etapa 1 - Criar uma instância da classe de conexão e definir os parâmetros de conexão */
        $dbconn = pg_connect("host=localhost port=5432 dbname=PROGWEB user=postgres password=postgres");
        if($dbconn) {
            /* Etapa 2 - Preparar o array de dados para ser enviado ao SGBD */
            $aDados = array($_POST['campo_primeiro_nome'],
                            $_POST['campo_sobrenome'],
                            $_POST['campo_email'],
                            $_POST['campo_password'],
                            $_POST['campo_cidade'],
                            $_POST['campo_estado']);

            /* Etapa 3 - Fazer a query de inserção dos dados (DML) com o array de valores */
            $result = pg_query_params($dbconn, "INSERT INTO TBPESSOA 
                                                 (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO)
                                                VALUES 
                                                 ($1, $2, $3, $4, $5, $6)",
                                                $aDados); 
            if($result) {
                echo "<script>
                        alert('Dados inseridos com sucesso.');
                        location.href = '/Misael/5.-PROGRAMACAO-WEB-I/10.AULA10/LAB2/LAB2.HTML';
                      </script>";
            } else {
                echo "<script>
                        alert('Houve falha ao processar a inclusão. Tente novamente');
                      </script>";
            }
        }
    } catch (Exception $e){
        /* Caso ocorra algum erro, então exibir mensagem */
        echo "<script>
                alert('Houve falha ao processar a inclusão. " . $e->getMessage() . ");
             </script>";
    }
?>