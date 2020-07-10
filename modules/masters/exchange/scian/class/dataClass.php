<?php

class Data
{
    public function GetData($conn)
    {
        $id = 1;
        $data_array = array();
        
        // CONSULTAMOS LOS SECTORES
        $query = "SELECT * FROM sector";
        $result = pg_query($conn, $query);
        while($row = pg_fetch_assoc($result))
        {
            $sector_array[] = $row;

            $selected = false;
            $opened = false;

            $sector_id = $row["sector_id"];
            $sector_title= $row["sector_title"];
            $text = "";
            $text = "$sector_id $sector_title";

            $data_array[] = array(
                "id"        => $id,
                "parent"    => "#",
                "text"      => $text,
                "state"     => array("selected" => $selected, "opened" => $opened) 
            );
            $id++;
        }

        $rama_parent = $id;
        // CONSULTAMOS LOS SUBSECTORES
        $query = "SELECT * FROM subsector";
        $result = pg_query($conn, $query);
        while($row1 = pg_fetch_assoc($result))
        {
            $subsector_array[] = $row1;
        }

        for ($i = 0; $i < sizeof($sector_array); $i++)
        {
            for ($j = 0; $j < sizeof($subsector_array); $j++)
            {
                if ($sector_array[$i]["sector_id"] == $subsector_array[$j]["sector_id"])
                {
                    $parentid = $i +1;
                    
                    $selected = false;
                    $opened = false;

                    $subsector_id = $subsector_array[$j]["subsector_id"];
                    $subsector_title= $subsector_array[$j]["subsector_title"];
                    $text = "";
                    $text = "$subsector_id $subsector_title";
    
                    $data_array[] = array(
                        "id"        => $id,
                        "parent"    => $parentid,
                        "text"      => $text,
                        "state"     => array("selected" => $selected, "opened" => $opened) 
                    );
                    $id++;
                }
            }   
        }

        $subrama_parent = $id;
        // CONSULTAMOS LAS RAMAS
        $query = "SELECT * FROM rama";
        $result = pg_query($conn, $query);
        while($row2 = pg_fetch_assoc($result))
        {
            $rama_array[] = $row2;
        }

        for ($i = 0; $i < sizeof($subsector_array); $i++)
        {
            for ($j = 0; $j < sizeof($rama_array); $j++)
            {
                if ($subsector_array[$i]["subsector_id"] == $rama_array[$j]["subsector_id"])
                {
                    $parentid = $rama_parent + $i;
                    
                    $selected = false;
                    $opened = false;

                    $rama_id = $rama_array[$j]["rama_id"];
                    $rama_title= $rama_array[$j]["rama_title"];
                    $text = "";
                    $text = "$rama_id $rama_title";
    
                    $data_array[] = array(
                        "id"        => $id,
                        "parent"    => $parentid,
                        "text"      => $text,
                        "state"     => array("selected" => $selected, "opened" => $opened) 
                    );
                    $id++;
                }
            }   
        }

        $clase_parent = $id;
        // CONSULTAMOS LAS SUBRAMAS
        $query = "SELECT * FROM subrama";
        $result = pg_query($conn, $query);
        while($row3 = pg_fetch_assoc($result))
        {
            $subrama_array[] = $row3;
        }

        for ($i = 0; $i < sizeof($rama_array); $i++)
        {
            for ($j = 0; $j < sizeof($subrama_array); $j++)
            {
                if ($rama_array[$i]["rama_id"] == $subrama_array[$j]["rama_id"])
                {
                    $parentid = $subrama_parent + $i;
                    
                    $selected = false;
                    $opened = false;

                    $subrama_id = $subrama_array[$j]["subrama_id"];
                    $subrama_title= $subrama_array[$j]["subrama_title"];
                    $text = "";
                    $text = "$subrama_id $subrama_title";
    
                    $data_array[] = array(
                        "id"        => $id,
                        "parent"    => $parentid,
                        "text"      => $text,
                        "state"     => array("selected" => $selected, "opened" => $opened) 
                    );
                    $id++;
                }
            }   
        }

        // CONSULTAMOS LAS CLASES
        $query = "SELECT * FROM clase";
        $result = pg_query($conn, $query);
        while($row4 = pg_fetch_assoc($result))
        {
            $clase_array[] = $row4;
        }

        for ($i = 0; $i < sizeof($subrama_array); $i++)
        {
            for ($j = 0; $j < sizeof($clase_array); $j++)
            {
                if ($subrama_array[$i]["subrama_id"] == $clase_array[$j]["subrama_id"])
                {
                    $parentid = $clase_parent + $i;
                    
                    $selected = false;
                    $opened = false;

                    $clase_id = $clase_array[$j]["clase_id"];
                    $clase_title= $clase_array[$j]["clase_title"];
                    $text = "";
                    $text = "$clase_id $clase_title";
    
                    $data_array[] = array(
                        "id"        => $id,
                        "parent"    => $parentid,
                        "text"      => $text,
                        "state"     => array("selected" => $selected, "opened" => $opened) 
                    );
                    $id++;
                }
            }   
        }


        return $data_array;
    }
}

?>