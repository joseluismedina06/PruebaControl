<?php
	include_once("../init.php");
	
	include_once("dataLayerMSSQL.php");
	include_once("presentationLayer.php");
	include_once("generalRP.php");


	//$server = "Netsql";

	$server = "192.168.200.81";
	$database = "Exchange";
	//$server = "192.168.140.94\ITALGRAM";
   	//$database = "ITALGRAMINTER";
	$user = "ICdwbi";
	$pwd = "usrdwbi81$";

	$dl = new dataLayerMSSQL($server,$user,$pwd,$database);



	$com = "select  O.name AS TABLA, ";
	$com .= " C.name AS COLUMNA, ";
	$com .= " Case C.user_type_id WHEN 56 THEN 'Int' WHEN 52 THEN 'SmallInt' WHEN 167 THEN 'Varchar' ";
	$com .= " WHEN 48 THEN 'TinyInt' WHEN 68 THEN 'DateTime' WHEN 104 THEN 'Bit' ELSE 'Otro' END As Tipo, ";
	$com .= " C.max_length as Longitud, C.is_identity as Identidad, ";
	$com .= " C.is_nullable as PermiteNulos , ";
	$com .= " ISNULL((SELECT 'PK' ";
	$com .= " FROM sys.indexes AS II ";
	$com .= " INNER JOIN sys.index_columns AS IIC ";
	$com .= " ON II.OBJECT_ID = IIC.OBJECT_ID ";
	$com .= " AND II.index_id = IIC.index_id ";
	$com .= " WHERE II.is_primary_key = 1 ";
	$com .= " AND OBJECT_NAME(IIC.OBJECT_ID) = O.name ";
	$com .= " AND COL_NAME(IIC.OBJECT_ID,IIC.column_id) = C.name ),'NPK') as clavePrimaria, ";
	$com .= " ISNULL((SELECT 'NFK' ";
	$com .= " FROM sys.foreign_keys AS IFF ";
	$com .= " INNER JOIN sys.foreign_key_columns AS IFC ";
	$com .= " ON IFF.OBJECT_ID = IFC.constraint_object_id ";
	$com .= " AND OBJECT_NAME(IFF.parent_object_id) = O.name ";
	$com .= " AND COL_NAME(IFC.parent_object_id, ";
	$com .= " IFC.parent_column_id) = C.name),'NFK') as ClaveForanea ";
	// 'Escriba la Descripcion Aqui' as Descripcion
	$com .= " from sys.all_objects O, sys.all_columns C ";
	$com .= " where C.object_id= O.object_id ";
	$com .= " and O.type = 'U' ";
	$com .= " and O.name <> 'dtproperties' ";
	$com .= " and O.name <> 'sysdiagrams' ";
	$com .= " order by O.name ";

	$res = $dl->executeReader($com);
	$pl = new presentationLayer();
	$arrCol[] = "TABLA";
	$arrCol[] = "COLUMNA";
	$arrCol[] = "TIPO";
	$arrCol[] = "IDENTIDAD";
	$arrCol[] = "PERMNULOS";
	$arrCol[] = "CP";
	$arrCol[] = "FK";

	

	$pl->fillGridArr($res, $arrCol,$pageSize=1000,$pageNumber=0,$width=900);

?>	