<?php
class Database{
    /**
     * To do query and return status from query
     * @param $query
     * @return bool
     */
    function execute($query){
        include "database_connect.php";

        if(mysqli_query($connection, $query)){
            mysqli_close($connection);
            return true;
        }
        mysqli_close($connection);
        return false;
    }

    /**
     * To do query and return data from query
     * @param $query
     * @return null
     */
    function get($query){
        include "database_connect.php";
        $result = $connection->query($query);

        if($result->num_rows > 0){
//            echo "Berhasil";
            $connection->close();
            return $result;
        }
//        echo "tidak Berhasil";
        $connection->close();
        return null;
    }

    /**
     * To do procedure and return status from query (true/false)
     * @param $procedure
     * @return bool|mysqli_result
     */
    function getProcedureExecute($procedure){
        include "database_connect.php";
        return mysqli_query($connection, "CALL ".$procedure);
    }
}