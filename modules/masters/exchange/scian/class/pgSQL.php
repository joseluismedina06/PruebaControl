<?php

class PgSQL
{
    public function OpenConnection()
    {
        /*
        $host = "host=192.168.7.6";
        $port = "port=5432";
        $dbname = "dbname=scian";
        $user = "user=dba";
        $password = "password=M3x1c02020";
        */

        
        $host = "host=localhost";
        $port = "port=5432";
        $dbname = "dbname=scian";
        $user = "user=dba";
        $password = "password=12345678";
        
        $postgree = pg_connect("$host $port $dbname $user $password");

        if (!$postgree)
        {
            echo "Error: ".pg_last_error();
        }
        else
        {
            return $postgree;
        }
    }

    public function CloseConnection($conn)
    {
        pg_close($conn);
    }
}

?>