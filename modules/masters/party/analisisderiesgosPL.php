    <?php 
        session_start();
        error_reporting(0);
        
        chdir(dirname(__FILE__));
        include_once("../base/basePL.php");
        chdir(dirname(__FILE__));
        include_once("../base/baseBL.php");
        chdir(dirname(__FILE__));
        include_once("../../../includes/presentationLayer.php");
        chdir(dirname(__FILE__));    
        include_once("includes/myPresentationLayer.php");
        chdir(dirname(__FILE__));
        include_once("includes/myUtilities.php");      
        chdir(dirname(__FILE__));
        include_once("registroBL.php"); 
        chdir(dirname(__FILE__));
        include_once("personBL.php");          
        chdir(dirname(__FILE__));
        include_once("includes/mycss.css");                            
        chdir(dirname(__FILE__));
        include_once("includes/styles.css");     
        basePL::buildjs();
        basePL::buildccs();
     
        myUtilities::buildmyccs(0);   
        myUtilities::buildmyjs(0);
        
    ?>	    		
    <html>
        <head>
            <script type="text/javascript" src="datepickercontrol.js"></script> 
            <link type="text/css" rel="stylesheet" href="datepickercontrol.css"></link>        
            <title>Análisis de Riesgos</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
            <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!-- <link rel="stylesheet" href="css/styles.css">  -->

            <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
            <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

    <?php
        // base
        $bl=new baseBL();

        // default
        $active = "Y";
        $deleted = "N";
        $id = $code = $name = $observation

        = $idclink
        = $idclinker
                    
        //----- var Datos basic  
        = $email 
        = $password 
        = $firstname 
        = $lastname 
        = $birthdate 
        = $idgradeacademic
        = $idinstituteacademic_records
        = $idtitle
        = $ufromacademic_records
        = $untilacademic_records
        = $idcompany
        = $idcharge
        = $ufromexperience_record
        = $untilexperience_record 
        = $idinstitutecertifies_records
        = $idcertifies
        = $ufromcertifies_records
        = $untilcertifies_records
        = "";
            
        //------var links
        $sLink = $dLink = $pLink = $cLink = $flink = $fbnlink = "";
            
        //---var actions
        $action = "";
        $urloper = "";
        $readonly = "";
        $disabled = "";
        $buildArray_person = $buildArray = "";
            
        //---For pagination
        $pn = 0;

        //----Alerta
        $msj_error = $error_msg_first_regist= "";

        // default
        $urloper = basePL::getReq($_REQUEST,"urloper");
        $pn = basePL::getReq($_REQUEST,"pn");			
        //$register = basePL::getReq($_REQUEST,"register");
            
        //----- ID PARTY and default
        $id = basePL::getReq($_REQUEST,"id");
        $code = basePL::getReq($_REQUEST,"code"); 
        $name = basePL::getReq($_REQUEST,"name");
        $observation = basePL::getReq($_REQUEST,"observation");
        //$active = basePL::getReqCheck($_REQUEST,"active");
        //$deleted = basePL::getReqCheck($_REQUEST,"deleted");    
        $path0=
        $path1=
        $path2=
        $path3=
        $path4=
        $path5=
        $path6=
        $path7=
        $path8=
        $path9="";
        
        //----- Datos basicos   
        $idpartyenterprise=$_SESSION["idpartyenterprise"];
                    
        //----- var Datos basic
        $info = basePL::getReq($_REQUEST,"info");
        $location = basePL::getReq($_REQUEST,"location");
        $northstreet = basePL::getReq($_REQUEST,"northstreet");
        $southstreet = basePL::getReq($_REQUEST,"southstreet");
        $eaststreet = basePL::getReq($_REQUEST,"eaststreet");
        $weststreet = basePL::getReq($_REQUEST,"weststreet");
        $northbuilding = basePL::getReq($_REQUEST,"northbuilding");
        $southbuilding = basePL::getReq($_REQUEST,"southbuilding");
        $eastbuilding = basePL::getReq($_REQUEST,"eastbuilding");
        $westbuilding = basePL::getReq($_REQUEST,"westbuilding");
        $vitalservices = basePL::getReq($_REQUEST,"vitalservices");
        $idcimentation = basePL::getReq($_REQUEST,"idcimentation");
        $idstructure = basePL::getReq($_REQUEST,"idstructure");
        $idwall = basePL::getReq($_REQUEST,"idwall");
        $idroof = basePL::getReq($_REQUEST,"idroof");
        $idfloor = basePL::getReq($_REQUEST,"idfloor");
        $idenjarre = basePL::getReq($_REQUEST,"idenjarre");
        $idelectricalinstall = basePL::getReq($_REQUEST,"idelectricalinstall");
        $idhidrosanitaryinstall = basePL::getReq($_REQUEST,"idhidrosanitaryinstall");
        $idbathroomfurniture = basePL::getReq($_REQUEST,"idbathroomfurniture");
        $idcanceleria = basePL::getReq($_REQUEST,"idcanceleria");
        $iddoors = basePL::getReq($_REQUEST,"iddoors");
        $idstairs = basePL::getReq($_REQUEST,"idstairs");
        $idfinishesfloors = basePL::getReq($_REQUEST,"idfinishesfloors");
        $idfinisheswalls = basePL::getReq($_REQUEST,"idfinisheswalls");
        $idfinishesdoors = basePL::getReq($_REQUEST,"idfinishesdoors");
        $idfinishesstairs = basePL::getReq($_REQUEST,"idfinishesstairs");
        $permanentcensus = basePL::getReq($_REQUEST,"permanentcensus");
        $floatcensus = basePL::getReq($_REQUEST,"floatcensus");
        $ownproperty = basePL::getReq($_REQUEST,"ownproperty");
        $leasedproperty = basePL::getReq($_REQUEST,"leasedproperty");
        $otherproperty = basePL::getReq($_REQUEST,"otherproperty");
        $surface = basePL::getReq($_REQUEST,"surface");
        $antiquity = basePL::getReq($_REQUEST,"antiquity");
        $numlevel = basePL::getReq($_REQUEST,"numlevel");
        $highbuildingsecurityplanriskanalysis = basePL::getReq($_REQUEST,"highbuildingsecurityplanriskanalysis");
        $geotechnichallocation = basePL::getReq($_REQUEST,"geotechnichallocation");

        $municipaltake  = basePL::getReq($_REQUEST,"municipaltake");
        $numdrains = basePL::getReq($_REQUEST,"numdrains");
        $numsubtank = basePL::getReq($_REQUEST,"numsubtank");
        $subtankcapacity = basePL::getReq($_REQUEST,"subtankcapacity");
        $numaerialtank = basePL::getReq($_REQUEST,"numaerialtank");
        $aerialtankcapacity = basePL::getReq($_REQUEST,"aerialtankcapacity");
        $galvanizedpipeline  = basePL::getReq($_REQUEST,"galvanizedpipeline");
        $cooperpipeline  = basePL::getReq($_REQUEST,"cooperpipeline");
        $electricbomb  = basePL::getReq($_REQUEST,"electricbomb");
        $siamesevalve  = basePL::getReq($_REQUEST,"siamesevalve");
        $municipalwaternetwork  = basePL::getReq($_REQUEST,"municipalwaternetwork");
        $riverdrain  = basePL::getReq($_REQUEST,"riverdrain");
        $electricalinstall = basePL::getReq($_REQUEST,"electricalinstall");
        $generalswitch  = basePL::getReq($_REQUEST,"generalswitch");
        $secundaryswitch  = basePL::getReq($_REQUEST,"secundaryswitch");
        $shutdowncontacts  = basePL::getReq($_REQUEST,"shutdowncontacts");
        $lightingsystem = basePL::getReq($_REQUEST,"lightingsystem");
        $emercyelectricplant  = basePL::getReq($_REQUEST,"emercyelectricplant");
        $physicsearthsystem  = basePL::getReq($_REQUEST,"physicsearthsystem");
        $airwashequipment  = basePL::getReq($_REQUEST,"airwashequipment");
        $numfueltank = basePL::getReq($_REQUEST,"numfueltank");
        $dieseltankcapacity = basePL::getReq($_REQUEST,"dieseltankcapacity");
        $magnatankcapacity = basePL::getReq($_REQUEST,"magnatankcapacity");
        $premiumtankcapacity = basePL::getReq($_REQUEST,"premiumtankcapacity");
        $installdate = basePL::getReq($_REQUEST,"installdate");
        $warehouse  = basePL::getReq($_REQUEST,"warehouse");
        $storage  = basePL::getReq($_REQUEST,"storage");
        $adequatestowage = basePL::getReq($_REQUEST,"adequatestowage");
        $deathfile  = basePL::getReq($_REQUEST,"deathfile");
        $openfile  = basePL::getReq($_REQUEST,"openfile");
        $electricpower  = basePL::getReq($_REQUEST,"electricpower");
        $trashinstall = basePL::getReq($_REQUEST,"trashinstall");
        $trashtype = basePL::getReq($_REQUEST,"trashtype");
        $automaticalarmsystem  = basePL::getReq($_REQUEST,"automaticalarmsystem");
        $tvmonitoringsystem  = basePL::getReq($_REQUEST,"tvmonitoringsystem");
        $comunication  = basePL::getReq($_REQUEST,"comunication");
        $internaldangerzone = basePL::getReq($_REQUEST,"internaldangerzone");



        // $coin = basePL::getReqCheck($_REQUEST,"moneda");  
        $cimentation = basePL::getReq($_REQUEST,"cimentation"); 
        // $cimentation=$_POST['cimentation'];
        $cimentationcutting = basePL::getReqCheck($_REQUEST,"cimentationcutting"); 

        // var_dump("--->".$cimentation."<---");
        $cimentationretraction = basePL::getReqCheck($_REQUEST,"cimentationretraction"); 
        $cimentationflaming = basePL::getReqCheck($_REQUEST,"cimentationflaming"); 
        $cimentationtemperature = basePL::getReqCheck($_REQUEST,"cimentationtemperature"); 
        $cimentationcorrosive = basePL::getReqCheck($_REQUEST,"cimentationcorrosive"); 
        $cimentationcomplexion = basePL::getReqCheck($_REQUEST,"cimentationcomplexion"); 
        $cimentationflexion = basePL::getReqCheck($_REQUEST,"cimentationflexion"); 
        $cimentationpanding = basePL::getReqCheck($_REQUEST,"cimentationpanding"); 
        $cimentationcollapsing = basePL::getReqCheck($_REQUEST,"cimentationcollapsing"); 
        $cimentationinclination = basePL::getReqCheck($_REQUEST,"cimentationinclination"); 
        $cimentationsettlement = basePL::getReqCheck($_REQUEST,"cimentationsettlement"); 
        $cimentationcraking = basePL::getReqCheck($_REQUEST,"cimentationcraking"); 
        $cimentationothers = basePL::getReqCheck($_REQUEST,"cimentationothers"); 
        $column = basePL::getReq($_REQUEST,"column"); 
        $columncutting = basePL::getReqCheck($_REQUEST,"columncutting"); 
        $columnretraction = basePL::getReqCheck($_REQUEST,"columnretraction"); 
        $columnflaming = basePL::getReqCheck($_REQUEST,"columnflaming"); 
        $columntemperature = basePL::getReqCheck($_REQUEST,"columntemperature"); 
        $columncorrosive = basePL::getReqCheck($_REQUEST,"columncorrosive"); 
        $columncomplexion = basePL::getReqCheck($_REQUEST,"columncomplexion"); 
        $columnflexion = basePL::getReqCheck($_REQUEST,"columnflexion"); 
        $columnpanding = basePL::getReqCheck($_REQUEST,"columnpanding"); 
        $columncollapsing = basePL::getReqCheck($_REQUEST,"columncollapsing"); 
        $columninclination = basePL::getReqCheck($_REQUEST,"columninclination"); 
        $columnsettlement = basePL::getReqCheck($_REQUEST,"columnsettlement"); 
        $columncraking = basePL::getReqCheck($_REQUEST,"columncraking"); 
        $columnothers = basePL::getReqCheck($_REQUEST,"columnothers"); 
        $wall = basePL::getReq($_REQUEST,"wall"); 
        $wallcutting = basePL::getReqCheck($_REQUEST,"wallcutting"); 
        $wallretraction = basePL::getReqCheck($_REQUEST,"wallretraction"); 
        $wallflaming = basePL::getReqCheck($_REQUEST,"wallflaming"); 
        $walltemperature = basePL::getReqCheck($_REQUEST,"walltemperature"); 
        $wallcorrosive = basePL::getReqCheck($_REQUEST,"wallcorrosive"); 
        $wallcomplexion = basePL::getReqCheck($_REQUEST,"wallcomplexion"); 
        $wallflexion = basePL::getReqCheck($_REQUEST,"wallflexion"); 
        $wallpanding = basePL::getReqCheck($_REQUEST,"wallpanding"); 
        $wallcollapsing = basePL::getReqCheck($_REQUEST,"wallcollapsing"); 
        $wallinclination = basePL::getReqCheck($_REQUEST,"wallinclination"); 
        $wallsettlement = basePL::getReqCheck($_REQUEST,"wallsettlement"); 
        $wallcraking = basePL::getReqCheck($_REQUEST,"wallcraking"); 
        $wallothers = basePL::getReqCheck($_REQUEST,"wallothers"); 
        $roof = basePL::getReq($_REQUEST,"roof"); 
        $roofcutting = basePL::getReqCheck($_REQUEST,"roofcutting"); 
        $roofretraction = basePL::getReqCheck($_REQUEST,"roofretraction"); 
        $roofflaming = basePL::getReqCheck($_REQUEST,"roofflaming"); 
        $rooftemperature = basePL::getReqCheck($_REQUEST,"rooftemperature"); 
        $roofcorrosive = basePL::getReqCheck($_REQUEST,"roofcorrosive"); 
        $roofcomplexion = basePL::getReqCheck($_REQUEST,"roofcomplexion"); 
        $roofflexion = basePL::getReqCheck($_REQUEST,"roofflexion"); 
        $roofpanding = basePL::getReqCheck($_REQUEST,"roofpanding"); 
        $roofcollapsing = basePL::getReqCheck($_REQUEST,"roofcollapsing"); 
        $roofinclination = basePL::getReqCheck($_REQUEST,"roofinclination"); 
        $roofsettlement = basePL::getReqCheck($_REQUEST,"roofsettlement"); 
        $roofcraking = basePL::getReqCheck($_REQUEST,"roofcraking"); 
        $roofothers = basePL::getReqCheck($_REQUEST,"roofothers"); 
        $stairs = basePL::getReq($_REQUEST,"stairs"); 
        $stairscutting = basePL::getReqCheck($_REQUEST,"stairscutting"); 
        $stairsretraction = basePL::getReqCheck($_REQUEST,"stairsretraction"); 
        $stairsflaming = basePL::getReqCheck($_REQUEST,"stairsflaming"); 
        $stairstemperature = basePL::getReqCheck($_REQUEST,"stairstemperature"); 
        $stairscorrosive = basePL::getReqCheck($_REQUEST,"stairscorrosive"); 
        $stairscomplexion = basePL::getReqCheck($_REQUEST,"stairscomplexion"); 
        $stairsflexion = basePL::getReqCheck($_REQUEST,"stairsflexion"); 
        $stairspanding = basePL::getReqCheck($_REQUEST,"stairspanding"); 
        $stairscollapsing = basePL::getReqCheck($_REQUEST,"stairscollapsing"); 
        $stairsinclination = basePL::getReqCheck($_REQUEST,"stairsinclination"); 
        $stairssettlement = basePL::getReqCheck($_REQUEST,"stairssettlement"); 
        $stairscraking = basePL::getReqCheck($_REQUEST,"stairscraking"); 
        $stairsothers = basePL::getReqCheck($_REQUEST,"stairsothers"); 
        $trabes = basePL::getReq($_REQUEST,"trabes"); 
        $trabescutting = basePL::getReqCheck($_REQUEST,"trabescutting"); 
        $trabesretraction = basePL::getReqCheck($_REQUEST,"trabesretraction"); 
        $trabesflaming = basePL::getReqCheck($_REQUEST,"trabesflaming"); 
        $trabestemperature = basePL::getReqCheck($_REQUEST,"trabestemperature"); 
        $trabescorrosive = basePL::getReqCheck($_REQUEST,"trabescorrosive"); 
        $trabescomplexion = basePL::getReqCheck($_REQUEST,"trabescomplexion"); 
        $trabesflexion = basePL::getReqCheck($_REQUEST,"trabesflexion"); 
        $trabespanding = basePL::getReqCheck($_REQUEST,"trabespanding"); 
        $trabescollapsing = basePL::getReqCheck($_REQUEST,"trabescollapsing"); 
        $trabesinclination = basePL::getReqCheck($_REQUEST,"trabesinclination"); 
        $trabessettlement = basePL::getReqCheck($_REQUEST,"trabessettlement"); 
        $trabescraking = basePL::getReqCheck($_REQUEST,"trabescraking"); 
        $trabesothers = basePL::getReqCheck($_REQUEST,"trabesothers"); 
        $structuraldamagehigh = basePL::getReqCheck($_REQUEST,"structuraldamagehigh"); 
        $structuraldamagemedium = basePL::getReqCheck($_REQUEST,"structuraldamagemedium"); 
        $structuraldamagelow = basePL::getReqCheck($_REQUEST,"structuraldamagelow"); 
        $structuraldamagenonexistent = basePL::getReqCheck($_REQUEST,"structuraldamagenonexistent"); 
        $collapsehigh = basePL::getReqCheck($_REQUEST,"collapsehigh"); 
        $collapsemedium = basePL::getReqCheck($_REQUEST,"collapsemedium"); 
        $collapselow = basePL::getReqCheck($_REQUEST,"collapselow"); 
        $collapsenonexistent = basePL::getReqCheck($_REQUEST,"collapsenonexistent"); 
        $finishdamagehigh = basePL::getReqCheck($_REQUEST,"finishdamagehigh"); 
        $finishdamagemedium = basePL::getReqCheck($_REQUEST,"finishdamagemedium"); 
        $finishdamagelow = basePL::getReqCheck($_REQUEST,"finishdamagelow"); 
        $finishdamagenonexistent = basePL::getReqCheck($_REQUEST,"finishdamagenonexistent"); 
        $severedamagehigh = basePL::getReqCheck($_REQUEST,"severedamagehigh"); 
        $severedamagemedium = basePL::getReqCheck($_REQUEST,"severedamagemedium"); 
        $severedamagelow = basePL::getReqCheck($_REQUEST,"severedamagelow"); 
        $severedamagenonexistent = basePL::getReqCheck($_REQUEST,"severedamagenonexistent"); 
        $sinkinghighsinkinghigh = basePL::getReqCheck($_REQUEST,"sinkinghighsinkinghigh"); 
        $sinkingmediumsinkinghigh = basePL::getReqCheck($_REQUEST,"sinkingmediumsinkinghigh"); 
        $sinkinglowsinkinghigh = basePL::getReqCheck($_REQUEST,"sinkinglowsinkinghigh"); 
        $sinkingnonexistentsinkinghigh = basePL::getReqCheck($_REQUEST,"sinkingnonexistentsinkinghigh"); 
        $inclinationhigh = basePL::getReqCheck($_REQUEST,"inclinationhigh"); 
        $inclinationmedium = basePL::getReqCheck($_REQUEST,"inclinationmedium"); 
        $inclinationlow = basePL::getReqCheck($_REQUEST,"inclinationlow"); 
        $inclinationnonexistent = basePL::getReqCheck($_REQUEST,"inclinationnonexistent"); 
        $inundationhigh = basePL::getReqCheck($_REQUEST,"inundationhigh"); 
        $inundationmedium = basePL::getReqCheck($_REQUEST,"inundationmedium"); 
        $inundationlow = basePL::getReqCheck($_REQUEST,"inundationlow"); 
        $inundationnonexistent = basePL::getReqCheck($_REQUEST,"inundationnonexistent"); 
        $firehighsecurityplanriskanalysyszone = basePL::getReqCheck($_REQUEST,"firehighsecurityplanriskanalysyszone"); 
        $firemediumsecurityplanriskanalysyszone = basePL::getReqCheck($_REQUEST,"firemediumsecurityplanriskanalysyszone"); 
        $firelowsecurityplanriskanalysyszone = basePL::getReqCheck($_REQUEST,"firelowsecurityplanriskanalysyszone"); 
        $firenonexistentsecurityplanriskanalysyszone = basePL::getReqCheck($_REQUEST,"firenonexistentsecurityplanriskanalysyszone"); 
        $explosionhigh = basePL::getReqCheck($_REQUEST,"explosionhigh"); 
        $explosionmedium = basePL::getReqCheck($_REQUEST,"explosionmedium"); 
        $explosionlow = basePL::getReqCheck($_REQUEST,"explosionlow"); 
        $explosionnonexistent = basePL::getReqCheck($_REQUEST,"explosionnonexistent"); 
        $gasleakhigh = basePL::getReqCheck($_REQUEST,"gasleakhigh"); 
        $gasleakmedium = basePL::getReqCheck($_REQUEST,"gasleakmedium"); 
        $gasleaklow = basePL::getReqCheck($_REQUEST,"gasleaklow"); 
        $gasleaknonexistent = basePL::getReqCheck($_REQUEST,"gasleaknonexistent"); 
        $spillhazardousmaterialshigh = basePL::getReqCheck($_REQUEST,"spillhazardousmaterialshigh"); 
        $spillhazardousmaterialsmedium = basePL::getReqCheck($_REQUEST,"spillhazardousmaterialsmedium"); 
        $spillhazardousmaterialslow = basePL::getReqCheck($_REQUEST,"spillhazardousmaterialslow"); 
        $spillhazardousmaterialsnonexistent = basePL::getReqCheck($_REQUEST,"spillhazardousmaterialsnonexistent"); 
        $pollutionhigh = basePL::getReqCheck($_REQUEST,"pollutionhigh"); 
        $pollutionmedium = basePL::getReqCheck($_REQUEST,"pollutionmedium"); 
        $pollutionlow = basePL::getReqCheck($_REQUEST,"pollutionlow"); 
        $pollutionnonexistent = basePL::getReqCheck($_REQUEST,"pollutionnonexistent");

        $epidemichighsecurityplanriskanalysyszone = basePL::getReqCheck($_REQUEST,"epidemichighsecurityplanriskanalysyszone");
        $epidemicmediumsecurityplanriskanalysyszone = basePL::getReqCheck($_REQUEST,"epidemicmediumsecurityplanriskanalysyszone");
        $epidemiclowsecurityplanriskanalysyszone = basePL::getReqCheck($_REQUEST,"epidemiclowsecurityplanriskanalysyszone");
        $epidemicnonexistentsecurityplanriskanalysyszone = basePL::getReqCheck($_REQUEST,"epidemicnonexistentsecurityplanriskanalysyszone"); 

        $bombthreathigh = basePL::getReqCheck($_REQUEST,"bombthreathigh"); 
        $bombthreatmedium = basePL::getReqCheck($_REQUEST,"bombthreatmedium"); 
        $bombthreatlow = basePL::getReqCheck($_REQUEST,"bombthreatlow"); 
        $bombthreatnonexistent = basePL::getReqCheck($_REQUEST,"bombthreatnonexistent"); 
        $highvoltagetower = basePL::getReq($_REQUEST,"highvoltagetower"); 
        $electricpowerpoles = basePL::getReq($_REQUEST,"electricpowerpoles"); 
        $electrictransformers = basePL::getReq($_REQUEST,"electrictransformers"); 
        $damagesewers = basePL::getReq($_REQUEST,"damagesewers"); 
        $damagesidewalks = basePL::getReq($_REQUEST,"damagesidewalks"); 
        $hightanks = basePL::getReq($_REQUEST,"hightanks"); 
        $bigtrees = basePL::getReq($_REQUEST,"bigtrees"); 
        $overpasses = basePL::getReq($_REQUEST,"overpasses"); 
        $pedestrianbridge = basePL::getReq($_REQUEST,"pedestrianbridge"); 
        $muchtraffic = basePL::getReq($_REQUEST,"muchtraffic"); 
        $highbuilding = basePL::getReq($_REQUEST,"highbuilding"); 
        $bigannouncements = basePL::getReq($_REQUEST,"bigannouncements"); 
        $dangercanopies = basePL::getReq($_REQUEST,"dangercanopies"); 
        $notoriouosinclination = basePL::getReq($_REQUEST,"notoriouosinclination"); 
        $closestreets = basePL::getReq($_REQUEST,"closestreets"); 
        $slopingstreets = basePL::getReq($_REQUEST,"slopingstreets"); 
        $industriesorbussiness = basePL::getReq($_REQUEST,"industriesorbussiness"); 
        $pemexinstall = basePL::getReq($_REQUEST,"pemexinstall"); 
        $chemicalinsdustries = basePL::getReq($_REQUEST,"chemicalinsdustries"); 
        $industries = basePL::getReq($_REQUEST,"industries"); 
        $schools = basePL::getReq($_REQUEST,"schools"); 
        $hospitals = basePL::getReq($_REQUEST,"hospitals"); 

        $infonaturalthreats = basePL::getReq($_REQUEST,"infonaturalthreats");
        $earthquakenull = basePL::getReqCheck($_REQUEST,"earthquakenull");
        $earthquakelow = basePL::getReqCheck($_REQUEST,"earthquakelow");
        $earthquakemedium = basePL::getReqCheck($_REQUEST,"earthquakemedium");
        $earthquakehigh = basePL::getReqCheck($_REQUEST,"earthquakehigh");
        $earthquakeno = basePL::getReq($_REQUEST,"earthquakeno");
        $volcanismnull = basePL::getReqCheck($_REQUEST,"volcanismnull");
        $volcanismlow = basePL::getReqCheck($_REQUEST,"volcanismlow");
        $volcanismmedium = basePL::getReqCheck($_REQUEST,"volcanismmedium");
        $volcanismhigh = basePL::getReqCheck($_REQUEST,"volcanismhigh");
        $volcanismno = basePL::getReq($_REQUEST,"volcanismno");
        $soilcollapsenull = basePL::getReqCheck($_REQUEST,"soilcollapsenull");
        $soilcollapselow = basePL::getReqCheck($_REQUEST,"soilcollapselow");
        $soilcollapsemedium = basePL::getReqCheck($_REQUEST,"soilcollapsemedium");
        $soilcollapsehigh = basePL::getReqCheck($_REQUEST,"soilcollapsehigh");
        $soilcollapseno = basePL::getReq($_REQUEST,"soilcollapseno");
        $sinkingnull = basePL::getReqCheck($_REQUEST,"sinkingnull");
        $sinkinglow = basePL::getReqCheck($_REQUEST,"sinkinglow");
        $sinkingmedium = basePL::getReqCheck($_REQUEST,"sinkingmedium");
        $sinkinghigh = basePL::getReqCheck($_REQUEST,"sinkinghigh");
        $sinkingno = basePL::getReq($_REQUEST,"sinkingno");
        $crackingnull = basePL::getReqCheck($_REQUEST,"crackingnull");
        $crackinglow = basePL::getReqCheck($_REQUEST,"crackinglow");
        $crackingmedium = basePL::getReqCheck($_REQUEST,"crackingmedium");
        $crackinghigh = basePL::getReqCheck($_REQUEST,"crackinghigh");
        $crackingno = basePL::getReq($_REQUEST,"crackingno");
        $mudnull = basePL::getReqCheck($_REQUEST,"mudnull");
        $mudlow = basePL::getReqCheck($_REQUEST,"mudlow");
        $mudmedium = basePL::getReqCheck($_REQUEST,"mudmedium");
        $mudhigh = basePL::getReqCheck($_REQUEST,"mudhigh");
        $mudno = basePL::getReq($_REQUEST,"mudno");
        $landslidesnull = basePL::getReqCheck($_REQUEST,"landslidesnull");
        $landslideslow = basePL::getReqCheck($_REQUEST,"landslideslow");
        $landslidesmedium = basePL::getReqCheck($_REQUEST,"landslidesmedium");
        $landslideshigh = basePL::getReqCheck($_REQUEST,"landslideshigh");
        $landslidesno = basePL::getReq($_REQUEST,"landslidesno");
        $acidrainnull = basePL::getReqCheck($_REQUEST,"acidrainnull");
        $acidrainlow = basePL::getReqCheck($_REQUEST,"acidrainlow");
        $acidrainmedium = basePL::getReqCheck($_REQUEST,"acidrainmedium");
        $acidrainhigh = basePL::getReqCheck($_REQUEST,"acidrainhigh");
        $acidrainno = basePL::getReq($_REQUEST,"acidrainno");
        $pouringrainnull = basePL::getReqCheck($_REQUEST,"pouringrainnull");
        $pouringrainlow = basePL::getReqCheck($_REQUEST,"pouringrainlow");
        $pouringrainmedium = basePL::getReqCheck($_REQUEST,"pouringrainmedium");
        $pouringrainhigh = basePL::getReqCheck($_REQUEST,"pouringrainhigh");
        $pouringrainno = basePL::getReq($_REQUEST,"pouringrainno");
        $tropicalstormnull = basePL::getReqCheck($_REQUEST,"tropicalstormnull");
        $tropicalstormlow = basePL::getReqCheck($_REQUEST,"tropicalstormlow");
        $tropicalstormmedium = basePL::getReqCheck($_REQUEST,"tropicalstormmedium");
        $tropicalstormhigh = basePL::getReqCheck($_REQUEST,"tropicalstormhigh");
        $tropicalstormno = basePL::getReq($_REQUEST,"tropicalstormno");
        $floodingnull = basePL::getReqCheck($_REQUEST,"floodingnull");
        $floodinglow = basePL::getReqCheck($_REQUEST,"floodinglow");
        $floodingmedium = basePL::getReqCheck($_REQUEST,"floodingmedium");
        $floodinghigh = basePL::getReqCheck($_REQUEST,"floodinghigh");
        $floodingno = basePL::getReq($_REQUEST,"floodingno");
        $hurricanesnull = basePL::getReqCheck($_REQUEST,"hurricanesnull");
        $hurricaneslow = basePL::getReqCheck($_REQUEST,"hurricaneslow");
        $hurricanesmedium = basePL::getReqCheck($_REQUEST,"hurricanesmedium");
        $hurricaneshigh = basePL::getReqCheck($_REQUEST,"hurricaneshigh");
        $hurricanesno = basePL::getReq($_REQUEST,"hurricanesno");
        $electricstormnull = basePL::getReqCheck($_REQUEST,"electricstormnull");
        $electricstormlow = basePL::getReqCheck($_REQUEST,"electricstormlow");
        $electricstormmedium = basePL::getReqCheck($_REQUEST,"electricstormmedium");
        $electricstormhigh = basePL::getReqCheck($_REQUEST,"electricstormhigh");
        $electricstormno = basePL::getReq($_REQUEST,"electricstormno");
        $extremetemperaturesnull = basePL::getReqCheck($_REQUEST,"extremetemperaturesnull");
        $extremetemperatureslow = basePL::getReqCheck($_REQUEST,"extremetemperatureslow");
        $extremetemperaturesmedium = basePL::getReqCheck($_REQUEST,"extremetemperaturesmedium");
        $extremetemperatureshigh = basePL::getReqCheck($_REQUEST,"extremetemperatureshigh");
        $extremetemperaturesno = basePL::getReq($_REQUEST,"extremetemperaturesno");
        $thrombusnull = basePL::getReqCheck($_REQUEST,"thrombusnull");
        $thrombuslow = basePL::getReqCheck($_REQUEST,"thrombuslow");
        $thrombusmedium = basePL::getReqCheck($_REQUEST,"thrombusmedium");
        $thrombushigh = basePL::getReqCheck($_REQUEST,"thrombushigh");
        $thrombusno = basePL::getReq($_REQUEST,"thrombusno");
        $hailstormnull = basePL::getReqCheck($_REQUEST,"hailstormnull");
        $hailstormlow = basePL::getReqCheck($_REQUEST,"hailstormlow");
        $hailstormmedium = basePL::getReqCheck($_REQUEST,"hailstormmedium");
        $hailstormhigh = basePL::getReqCheck($_REQUEST,"hailstormhigh");
        $hailstormno = basePL::getReq($_REQUEST,"hailstormno");
        $strongwindsnull = basePL::getReqCheck($_REQUEST,"strongwindsnull");
        $strongwindslow = basePL::getReqCheck($_REQUEST,"strongwindslow");
        $strongwindsmedium = basePL::getReqCheck($_REQUEST,"strongwindsmedium");
        $strongwindshigh = basePL::getReqCheck($_REQUEST,"strongwindshigh");
        $strongwindsno = basePL::getReq($_REQUEST,"strongwindsno");
        $droughtsnull = basePL::getReqCheck($_REQUEST,"droughtsnull");
        $droughtslow = basePL::getReqCheck($_REQUEST,"droughtslow");
        $droughtsmedium = basePL::getReqCheck($_REQUEST,"droughtsmedium");
        $droughtshigh = basePL::getReqCheck($_REQUEST,"droughtshigh");
        $droughtsno = basePL::getReq($_REQUEST,"droughtsno");
        $firenull = basePL::getReqCheck($_REQUEST,"firenull");
        $firelow = basePL::getReqCheck($_REQUEST,"firelow");
        $firemedium = basePL::getReqCheck($_REQUEST,"firemedium");
        $firehigh = basePL::getReqCheck($_REQUEST,"firehigh");
        $fireno = basePL::getReq($_REQUEST,"fireno");
        $explosionsnull = basePL::getReqCheck($_REQUEST,"explosionsnull");
        $explosionslow = basePL::getReqCheck($_REQUEST,"explosionslow");
        $explosionsmedium = basePL::getReqCheck($_REQUEST,"explosionsmedium");
        $explosionshigh = basePL::getReqCheck($_REQUEST,"explosionshigh");
        $explosionsno = basePL::getReq($_REQUEST,"explosionsno");
        $chemicalspillnull = basePL::getReqCheck($_REQUEST,"chemicalspillnull");
        $chemicalspilllow = basePL::getReqCheck($_REQUEST,"chemicalspilllow");
        $chemicalspillmedium = basePL::getReqCheck($_REQUEST,"chemicalspillmedium");
        $chemicalspillhigh = basePL::getReqCheck($_REQUEST,"chemicalspillhigh");
        $chemicalspillno = basePL::getReq($_REQUEST,"chemicalspillno");
        $radiationsnull = basePL::getReqCheck($_REQUEST,"radiationsnull");
        $radiationslow = basePL::getReqCheck($_REQUEST,"radiationslow");
        $radiationsmedium = basePL::getReqCheck($_REQUEST,"radiationsmedium");
        $radiationshigh = basePL::getReqCheck($_REQUEST,"radiationshigh");
        $radiationsno = basePL::getReq($_REQUEST,"radiationsno");
        $enviromentalpollutionsnull = basePL::getReqCheck($_REQUEST,"enviromentalpollutionsnull");
        $enviromentalpollutionslow = basePL::getReqCheck($_REQUEST,"enviromentalpollutionslow");
        $enviromentalpollutionsmedium = basePL::getReqCheck($_REQUEST,"enviromentalpollutionsmedium");
        $enviromentalpollutionshigh = basePL::getReqCheck($_REQUEST,"enviromentalpollutionshigh");
        $enviromentalpollutionsno = basePL::getReq($_REQUEST,"enviromentalpollutionsno");
        $desertificationnull = basePL::getReqCheck($_REQUEST,"desertificationnull");
        $desertificationlow = basePL::getReqCheck($_REQUEST,"desertificationlow");
        $desertificationmedium = basePL::getReqCheck($_REQUEST,"desertificationmedium");
        $desertificationhigh = basePL::getReqCheck($_REQUEST,"desertificationhigh");
        $desertificationno = basePL::getReq($_REQUEST,"desertificationno");
        $epidemicnull = basePL::getReqCheck($_REQUEST,"epidemicnull");
        $epidemiclow = basePL::getReqCheck($_REQUEST,"epidemiclow");
        $epidemicmedium = basePL::getReqCheck($_REQUEST,"epidemicmedium");
        $epidemichigh = basePL::getReqCheck($_REQUEST,"epidemichigh");

        $epidemicno = basePL::getReq($_REQUEST,"epidemicno");
        $intoxicationnull = basePL::getReqCheck($_REQUEST,"intoxicationnull");
        $intoxicationlow = basePL::getReqCheck($_REQUEST,"intoxicationlow");
        $intoxicationmedium = basePL::getReqCheck($_REQUEST,"intoxicationmedium");
        $intoxicationhigh = basePL::getReqCheck($_REQUEST,"intoxicationhigh");
        $intoxicationno = basePL::getReq($_REQUEST,"intoxicationno");
        $poisoningnull = basePL::getReqCheck($_REQUEST,"poisoningnull");
        $poisoninglow = basePL::getReqCheck($_REQUEST,"poisoninglow");
        $poisoningmedium = basePL::getReqCheck($_REQUEST,"poisoningmedium");
        $poisoninghigh = basePL::getReqCheck($_REQUEST,"poisoninghigh");
        $poisoningno = basePL::getReq($_REQUEST,"poisoningno");
        $assaultsnull = basePL::getReqCheck($_REQUEST,"assaultsnull");
        $assaultslow = basePL::getReqCheck($_REQUEST,"assaultslow");
        $assaultsmedium = basePL::getReqCheck($_REQUEST,"assaultsmedium");
        $assaultshigh = basePL::getReqCheck($_REQUEST,"assaultshigh");
        $assaultsno = basePL::getReq($_REQUEST,"assaultsno");
        $interruptionbasicservicesnull = basePL::getReqCheck($_REQUEST,"interruptionbasicservicesnull");
        $interruptionbasicserviceslow = basePL::getReqCheck($_REQUEST,"interruptionbasicserviceslow");
        $interruptionbasicservicesmedium = basePL::getReqCheck($_REQUEST,"interruptionbasicservicesmedium");
        $interruptionbasicserviceshigh = basePL::getReqCheck($_REQUEST,"interruptionbasicserviceshigh");
        $interruptionbasicservicesno = basePL::getReq($_REQUEST,"interruptionbasicservicesno");
        $masspopulationconcentrationnull = basePL::getReqCheck($_REQUEST,"masspopulationconcentrationnull");
        $masspopulationconcentrationlow = basePL::getReqCheck($_REQUEST,"masspopulationconcentrationlow");
        $masspopulationconcentrationmedium = basePL::getReqCheck($_REQUEST,"masspopulationconcentrationmedium");
        $masspopulationconcentrationhigh = basePL::getReqCheck($_REQUEST,"masspopulationconcentrationhigh");
        $masspopulationconcentrationno = basePL::getReq($_REQUEST,"masspopulationconcentrationno");
        $manifestationsnull = basePL::getReqCheck($_REQUEST,"manifestationsnull");
        $manifestationslow = basePL::getReqCheck($_REQUEST,"manifestationslow");
        $manifestationsmedium = basePL::getReqCheck($_REQUEST,"manifestationsmedium");
        $manifestationshigh = basePL::getReqCheck($_REQUEST,"manifestationshigh");
        $manifestationsno = basePL::getReq($_REQUEST,"manifestationsno");
        $terrorismnull = basePL::getReqCheck($_REQUEST,"terrorismnull");
        $terrorismlow = basePL::getReqCheck($_REQUEST,"terrorismlow");
        $terrorismmedium = basePL::getReqCheck($_REQUEST,"terrorismmedium");
        $terrorismhigh = basePL::getReqCheck($_REQUEST,"terrorismhigh");
        $terrorismno = basePL::getReq($_REQUEST,"terrorismno");
        $transportaccidentsnull = basePL::getReqCheck($_REQUEST,"transportaccidentsnull");
        $transportaccidentslow = basePL::getReqCheck($_REQUEST,"transportaccidentslow");
        $transportaccidentsmedium = basePL::getReqCheck($_REQUEST,"transportaccidentsmedium");
        $transportaccidentshigh = basePL::getReqCheck($_REQUEST,"transportaccidentshigh");
        $transportaccidentsno = basePL::getReq($_REQUEST,"transportaccidentsno");
        $naturalphenomenasummary = basePL::getReq($_REQUEST,"naturalphenomenasummary");
        $analysysfoundrisks = basePL::getReq($_REQUEST,"analysysfoundrisks");

        $amenaza = basePL::getReq($_REQUEST,"amenaza");
        $descriptionthreats = basePL::getReq($_REQUEST,"descriptionthreats");
        $locationthreats = basePL::getReq($_REQUEST,"locationthreats");
        $idthreats = basePL::getReq($_REQUEST,"idthreats");

        $descriptionstrategiclocations = basePL::getReq($_REQUEST,"descriptionstrategiclocations");
        $idstrategiclocations = basePL::getReq($_REQUEST,"idstrategiclocations");
        $savestrategiclocations = basePL::getReq($_REQUEST,"savestrategiclocations");

        $idsecurityplanriskanalysysdirectory = basePL::getReq($_REQUEST,"idsecurityplanriskanalysysdirectory");
        $personnamesecurityplanriskanalysysdirectory = basePL::getReq($_REQUEST,"personnamesecurityplanriskanalysysdirectory");
        $positionsecurityplanriskanalysysdirectory = basePL::getReq($_REQUEST,"positionsecurityplanriskanalysysdirectory");
        $savesecurityplanriskanalysysdirectory = basePL::getReq($_REQUEST,"savesecurityplanriskanalysysdirectory");


        $securityequipment = basePL::getReq($_REQUEST,"securityequipment");
        $generalrecomendations = basePL::getReq($_REQUEST,"generalrecomendations");
        $securitymeasures = basePL::getReq($_REQUEST,"securitymeasures");

        $quantitysecurityplanriskanalysysemerncyresources = basePL::getReq($_REQUEST,"quantitysecurityplanriskanalysysemerncyresources");
        $equipmentsecurityplanriskanalysysemerncyresources = basePL::getReq($_REQUEST,"equipmentsecurityplanriskanalysysemerncyresources");
        $locationcsecurityplanriskanalysysemerncyresources = basePL::getReq($_REQUEST,"locationcsecurityplanriskanalysysemerncyresources");
        $idsecurityplanriskanalysysemerncyresources = basePL::getReq($_REQUEST,"idsecurityplanriskanalysysemerncyresources");
        $savesecurityplanriskanalysysemerncyresources = basePL::getReq($_REQUEST,"savesecurityplanriskanalysysemerncyresources");

        $quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = basePL::getReq($_REQUEST,"quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT");
        $equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = basePL::getReq($_REQUEST,"equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT");
        $locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = basePL::getReq($_REQUEST,"locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT");
        $idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = basePL::getReq($_REQUEST,"idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT");
        $savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = basePL::getReq($_REQUEST,"savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT");

        //$enterprisesecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"enterprisesecurityplanriskanalysysemergencydirectory");
        //$phonesecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"phonesecurityplanriskanalysysemergencydirectory");
        //$addresssecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"addresssecurityplanriskanalysysemergencydirectory");
        //$idsecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"idsecurityplanriskanalysysemergencydirectory");
        //$savesecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"savesecurityplanriskanalysysemergencydirectory");
        //$logosecurityplanriskanalysysemergencydirectory=$_FILES['logosecurityplanriskanalysysemergencydirectory'];

        if($idpartyenterprise!="" && $urloper!="save" && $amenaza!="Guardar amenaza"
          && $savestrategiclocations !="savestrategiclocations" 
          && $savesecurityplanriskanalysysdirectory !="savesecurityplanriskanalysysdirectory" 
          && $savesecurityplanriskanalysysemerncyresources !="savesecurityplanriskanalysysemerncyresources" 
          && $savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT !="savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT" 
          //&& $savesecurityplanriskanalysysemergencydirectory!="savesecurityplanriskanalysysemergencydirectory"
        ){
          
            $dbl=new baseBL();
            $com="SELECT 
                info ,
                location ,
                northstreet ,
                southstreet ,
                eaststreet ,
                weststreet ,
                northbuilding ,
                southbuilding ,
                eastbuilding ,
                westbuilding ,
                vitalservices ,
                idcimentation ,
                idstructure ,
                idwall ,
                idroof ,
                idfloor ,
                idenjarre ,
                idelectricalinstall ,
                idhidrosanitaryinstall ,
                idbathroomfurniture ,
                idcanceleria ,
                iddoors ,
                idstairs ,
                idfinishesfloors ,
                idfinisheswalls ,
                idfinishesdoors ,
                idfinishesstairs ,
                permanentcensus ,
                floatcensus ,
                ownproperty ,
                leasedproperty ,
                otherproperty ,
                surface ,
                antiquity ,
                numlevel ,
                highbuilding ,
                geotechnichallocation 

            FROM core.securityplanriskanalysis WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
            if ($resul[0] != "") { 
                $info = $resul[0]["info"];
                $location = $resul[0]["location"];
                $northstreet = $resul[0]["northstreet"];
                $southstreet = $resul[0]["southstreet"];
                $eaststreet = $resul[0]["eaststreet"];
                $weststreet = $resul[0]["weststreet"];
                $northbuilding = $resul[0]["northbuilding"];
                $southbuilding = $resul[0]["southbuilding"];
                $eastbuilding = $resul[0]["eastbuilding"];
                $westbuilding = $resul[0]["westbuilding"];
                $vitalservices = $resul[0]["vitalservices"];
                $idcimentation = $resul[0]["idcimentation"];
                $idstructure = $resul[0]["idstructure"];
                $idwall = $resul[0]["idwall"];
                $idroof = $resul[0]["idroof"];
                $idfloor = $resul[0]["idfloor"];
                $idenjarre = $resul[0]["idenjarre"];
                $idelectricalinstall = $resul[0]["idelectricalinstall"];
                $idhidrosanitaryinstall = $resul[0]["idhidrosanitaryinstall"];
                $idbathroomfurniture = $resul[0]["idbathroomfurniture"];
                $idcanceleria = $resul[0]["idcanceleria"];
                $iddoors = $resul[0]["iddoors"];
                $idstairs = $resul[0]["idstairs"];
                $idfinishesfloors = $resul[0]["idfinishesfloors"];
                $idfinisheswalls = $resul[0]["idfinisheswalls"];
                $idfinishesdoors = $resul[0]["idfinishesdoors"];
                $idfinishesstairs = $resul[0]["idfinishesstairs"];
                $permanentcensus = $resul[0]["permanentcensus"];
                $floatcensus = $resul[0]["floatcensus"];
                $ownproperty = $resul[0]["ownproperty"];
                $leasedproperty = $resul[0]["leasedproperty"];
                $otherproperty = $resul[0]["otherproperty"];
                $surface = $resul[0]["surface"];
                $antiquity = $resul[0]["antiquity"];
                $numlevel = $resul[0]["numlevel"];
                $highbuildingsecurityplanriskanalysis = $resul[0]["highbuilding"];
                $geotechnichallocation = $resul[0]["geotechnichallocation"];
            }       

            $com="SELECT 
                municipaltake ,
                numdrains ,
                numsubtank ,
                subtankcapacity ,
                numaerialtank ,
                aerialtankcapacity ,
                galvanizedpipeline ,
                cooperpipeline ,
                electricbomb ,
                siamesevalve ,
                municipalwaternetwork ,
                riverdrain ,
                electricalinstall ,
                generalswitch ,
                secundaryswitch ,
                shutdowncontacts ,
                lightingsystem ,
                emercyelectricplant ,
                physicsearthsystem ,
                airwashequipment ,
                numfueltank ,
                dieseltankcapacity ,
                magnatankcapacity ,
                premiumtankcapacity ,
                installdate ,
                warehouse ,
                storage ,
                adequatestowage ,
                deathfile ,
                openfile ,
                electricpower ,
                trashinstall ,
                trashtype ,
                automaticalarmsystem ,
                tvmonitoringsystem ,
                comunication ,
                internaldangerzone  

            FROM core.securityplanriskanalysyscomplements WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
            if ($resul[0] != "") { 
                $municipaltake = $resul[0]["municipaltake"];
                $numdrains = $resul[0]["numdrains"];
                $numsubtank = $resul[0]["numsubtank"];
                $subtankcapacity = $resul[0]["subtankcapacity"];
                $numaerialtank = $resul[0]["numaerialtank"];
                $aerialtankcapacity = $resul[0]["aerialtankcapacity"];
                $galvanizedpipeline = $resul[0]["galvanizedpipeline"];
                $cooperpipeline = $resul[0]["cooperpipeline"];
                $electricbomb = $resul[0]["electricbomb"];
                $siamesevalve = $resul[0]["siamesevalve"];
                $municipalwaternetwork = $resul[0]["municipalwaternetwork"];
                $riverdrain = $resul[0]["riverdrain"];
                $electricalinstall = $resul[0]["electricalinstall"];
                $generalswitch = $resul[0]["generalswitch"];
                $secundaryswitch = $resul[0]["secundaryswitch"];
                $shutdowncontacts = $resul[0]["shutdowncontacts"];
                $lightingsystem = $resul[0]["lightingsystem"];
                $emercyelectricplant = $resul[0]["emercyelectricplant"];
                $physicsearthsystem = $resul[0]["physicsearthsystem"];
                $airwashequipment = $resul[0]["airwashequipment"];
                $numfueltank = $resul[0]["numfueltank"];
                $dieseltankcapacity = $resul[0]["dieseltankcapacity"];
                $magnatankcapacity = $resul[0]["magnatankcapacity"];
                $premiumtankcapacity = $resul[0]["premiumtankcapacity"];
                $registerdateandhour = $resul[0]["installdate"];
                $warehouse = $resul[0]["warehouse"];
                $storage = $resul[0]["storage"];
                $adequatestowage = $resul[0]["adequatestowage"];
                $deathfile = $resul[0]["deathfile"];
                $openfile = $resul[0]["openfile"];
                $electricpower = $resul[0]["electricpower"];
                $trashinstall = $resul[0]["trashinstall"];
                $trashtype = $resul[0]["trashtype"];
                $automaticalarmsystem = $resul[0]["automaticalarmsystem"];
                $tvmonitoringsystem = $resul[0]["tvmonitoringsystem"];
                $comunication = $resul[0]["comunication"];
                $internaldangerzone = $resul[0]["internaldangerzone"];

                $installdate = str_replace(" 00:00:00", "", $registerdateandhour );

            }    

            $comzone1="SELECT 
                cimentation ,
                cimentationcutting ,
                cimentationretraction ,
                cimentationflaming ,
                cimentationtemperature ,
                cimentationcorrosive ,
                cimentationcomplexion ,
                cimentationflexion ,
                cimentationpanding ,
                cimentationcollapsing ,
                cimentationinclination ,
                cimentationsettlement ,
                cimentationcraking ,
                cimentationothers ,";
            $comzone1 .= '"column" ,';
            $comzone1 .= "
                columncutting ,
                columnretraction ,
                columnflaming ,
                columntemperature ,
                columncorrosive ,
                columncomplexion ,
                columnflexion ,
                columnpanding ,
                columncollapsing ,
                columninclination ,
                columnsettlement ,
                columncraking ,
                columnothers ,
                wall ,
                wallcutting ,
                wallretraction ,
                wallflaming ,
                walltemperature ,
                wallcorrosive ,
                wallcomplexion ,
                wallflexion ,
                wallpanding ,
                wallcollapsing ,
                wallinclination ,
                wallsettlement ,
                wallcraking ,
                wallothers ,
                roof ,
                roofcutting ,
                roofretraction ,
                roofflaming ,
                rooftemperature ,
                roofcorrosive ,
                roofcomplexion ,
                roofflexion ,
                roofpanding ,
                roofcollapsing ,
                roofinclination ,
                roofsettlement ,
                roofcraking ,
                roofothers ,
                stairs ,
                stairscutting ,
                stairsretraction ,
                stairsflaming ,
                stairstemperature ,
                stairscorrosive ,
                stairscomplexion ,
                stairsflexion ,
                stairspanding ,
                stairscollapsing ,
                stairsinclination ,
                stairssettlement ,
                stairscraking ,
                stairsothers ,
                trabes ,
                trabescutting ,
                trabesretraction ,
                trabesflaming ,
                trabestemperature ,
                trabescorrosive ,
                trabescomplexion ,
                trabesflexion ,
                trabespanding ,
                trabescollapsing ,
                trabesinclination ,
                trabessettlement ,
                trabescraking ,
                trabesothers ,
                structuraldamagehigh ,
                structuraldamagemedium ,
                structuraldamagelow ,
                structuraldamagenonexistent ,
                collapsehigh ,
                collapsemedium ,
                collapselow ,
                collapsenonexistent ,
                finishdamagehigh ,
                finishdamagemedium ,
                finishdamagelow ,
                finishdamagenonexistent ,
                severedamagehigh ,
                severedamagemedium ,
                severedamagelow ,
                severedamagenonexistent ,
                sinkinghigh ,
                sinkingmedium ,
                sinkinglow ,
                sinkingnonexistent ,
                inclinationhigh ,
                inclinationmedium ,
                inclinationlow ,
                inclinationnonexistent ,
                inundationhigh ,
                inundationmedium ,
                inundationlow ,
                inundationnonexistent ,
                firehigh ,
                firemedium ,
                firelow ,
                firenonexistent ,
                explosionhigh ,
                explosionmedium ,
                explosionlow ,
                explosionnonexistent ,
                gasleakhigh ,
                gasleakmedium ,
                gasleaklow ,
                gasleaknonexistent ,
                spillhazardousmaterialshigh ,
                spillhazardousmaterialsmedium ,
                spillhazardousmaterialslow ,
                spillhazardousmaterialsnonexistent ,
                pollutionhigh ,
                pollutionmedium ,
                pollutionlow ,
                pollutionnonexistent ,
                epidemichigh ,
                epidemicmedium ,
                epidemiclow ,
                epidemicnonexistent ,  
                bombthreathigh ,
                bombthreatmedium ,
                bombthreatlow ,
                bombthreatnonexistent ,
                highvoltagetower ,
                electricpowerpoles ,
                electrictransformers ,
                damagesewers ,
                damagesidewalks ,
                hightanks ,
                bigtrees ,
                overpasses ,
                pedestrianbridge ,
                muchtraffic ,
                highbuilding ,
                bigannouncements ,
                dangercanopies ,
                notoriouosinclination ,
                closestreets ,
                slopingstreets ,
                industriesorbussiness ,
                pemexinstall ,
                chemicalinsdustries ,
                industries ,
                schools ,
                hospitals

            FROM core.securityplanriskanalysyszone WHERE idparty='$idpartyenterprise'";
            // var_dump($comzone1);
            $resul=$dbl->executeReader($comzone1);
            if ($resul[0] != "") { 
                $cimentation = $resul[0]["cimentation"];
                $cimentationcutting = $resul[0]["cimentationcutting"];
                $cimentationretraction = $resul[0]["cimentationretraction"];
                $cimentationflaming = $resul[0]["cimentationflaming"];
                $cimentationtemperature = $resul[0]["cimentationtemperature"];
                $cimentationcorrosive = $resul[0]["cimentationcorrosive"];
                $cimentationcomplexion = $resul[0]["cimentationcomplexion"];
                $cimentationflexion = $resul[0]["cimentationflexion"];
                $cimentationpanding = $resul[0]["cimentationpanding"];
                $cimentationcollapsing = $resul[0]["cimentationcollapsing"];
                $cimentationinclination = $resul[0]["cimentationinclination"];
                $cimentationsettlement = $resul[0]["cimentationsettlement"];
                $cimentationcraking = $resul[0]["cimentationcraking"];
                $cimentationothers = $resul[0]["cimentationothers"];
                $column = $resul[0]["column"];
                $columncutting = $resul[0]["columncutting"];
                $columnretraction = $resul[0]["columnretraction"];
                $columnflaming = $resul[0]["columnflaming"];
                $columntemperature = $resul[0]["columntemperature"];
                $columncorrosive = $resul[0]["columncorrosive"];
                $columncomplexion = $resul[0]["columncomplexion"];
                $columnflexion = $resul[0]["columnflexion"];
                $columnpanding = $resul[0]["columnpanding"];
                $columncollapsing = $resul[0]["columncollapsing"];
                $columninclination = $resul[0]["columninclination"];
                $columnsettlement = $resul[0]["columnsettlement"];
                $columncraking = $resul[0]["columncraking"];
                $columnothers = $resul[0]["columnothers"];
                $wall = $resul[0]["wall"];
                $wallcutting = $resul[0]["wallcutting"];
                $wallretraction = $resul[0]["wallretraction"];
                $wallflaming = $resul[0]["wallflaming"];
                $walltemperature = $resul[0]["walltemperature"];
                $wallcorrosive = $resul[0]["wallcorrosive"];
                $wallcomplexion = $resul[0]["wallcomplexion"];
                $wallflexion = $resul[0]["wallflexion"];
                $wallpanding = $resul[0]["wallpanding"];
                $wallcollapsing = $resul[0]["wallcollapsing"];
                $wallinclination = $resul[0]["wallinclination"];
                $wallsettlement = $resul[0]["wallsettlement"];
                $wallcraking = $resul[0]["wallcraking"];
                $wallothers = $resul[0]["wallothers"];
                $roof = $resul[0]["roof"];
                $roofcutting = $resul[0]["roofcutting"];
                $roofretraction = $resul[0]["roofretraction"];
                $roofflaming = $resul[0]["roofflaming"];
                $rooftemperature = $resul[0]["rooftemperature"];
                $roofcorrosive = $resul[0]["roofcorrosive"];
                $roofcomplexion = $resul[0]["roofcomplexion"];
                $roofflexion = $resul[0]["roofflexion"];
                $roofpanding = $resul[0]["roofpanding"];
                $roofcollapsing = $resul[0]["roofcollapsing"];
                $roofinclination = $resul[0]["roofinclination"];
                $roofsettlement = $resul[0]["roofsettlement"];
                $roofcraking = $resul[0]["roofcraking"];
                $roofothers = $resul[0]["roofothers"];
                $stairs = $resul[0]["stairs"];
                $stairscutting = $resul[0]["stairscutting"];
                $stairsretraction = $resul[0]["stairsretraction"];
                $stairsflaming = $resul[0]["stairsflaming"];
                $stairstemperature = $resul[0]["stairstemperature"];
                $stairscorrosive = $resul[0]["stairscorrosive"];
                $stairscomplexion = $resul[0]["stairscomplexion"];
                $stairsflexion = $resul[0]["stairsflexion"];
                $stairspanding = $resul[0]["stairspanding"];
                $stairscollapsing = $resul[0]["stairscollapsing"];
                $stairsinclination = $resul[0]["stairsinclination"];
                $stairssettlement = $resul[0]["stairssettlement"];
                $stairscraking = $resul[0]["stairscraking"];
                $stairsothers = $resul[0]["stairsothers"];
                $trabes = $resul[0]["trabes"];
                $trabescutting = $resul[0]["trabescutting"];
                $trabesretraction = $resul[0]["trabesretraction"];
                $trabesflaming = $resul[0]["trabesflaming"];
                $trabestemperature = $resul[0]["trabestemperature"];
                $trabescorrosive = $resul[0]["trabescorrosive"];
                $trabescomplexion = $resul[0]["trabescomplexion"];
                $trabesflexion = $resul[0]["trabesflexion"];
                $trabespanding = $resul[0]["trabespanding"];
                $trabescollapsing = $resul[0]["trabescollapsing"];
                $trabesinclination = $resul[0]["trabesinclination"];
                $trabessettlement = $resul[0]["trabessettlement"];
                $trabescraking = $resul[0]["trabescraking"];
                $trabesothers = $resul[0]["trabesothers"];
                $structuraldamagehigh = $resul[0]["structuraldamagehigh"];
                $structuraldamagemedium = $resul[0]["structuraldamagemedium"];
                $structuraldamagelow = $resul[0]["structuraldamagelow"];
                $structuraldamagenonexistent = $resul[0]["structuraldamagenonexistent"];
                $collapsehigh = $resul[0]["collapsehigh"];
                $collapsemedium = $resul[0]["collapsemedium"];
                $collapselow = $resul[0]["collapselow"];
                $collapsenonexistent = $resul[0]["collapsenonexistent"];
                $finishdamagehigh = $resul[0]["finishdamagehigh"];
                $finishdamagemedium = $resul[0]["finishdamagemedium"];
                $finishdamagelow = $resul[0]["finishdamagelow"];
                $finishdamagenonexistent = $resul[0]["finishdamagenonexistent"];
                $severedamagehigh = $resul[0]["severedamagehigh"];
                $severedamagemedium = $resul[0]["severedamagemedium"];
                $severedamagelow = $resul[0]["severedamagelow"];
                $severedamagenonexistent = $resul[0]["severedamagenonexistent"];
                $sinkinghighsinkinghigh = $resul[0]["sinkinghigh"];
                $sinkingmediumsinkinghigh = $resul[0]["sinkingmedium"];
                $sinkinglowsinkinghigh = $resul[0]["sinkinglow"];
                $sinkingnonexistentsinkinghigh = $resul[0]["sinkingnonexistent"];
                $inclinationhigh = $resul[0]["inclinationhigh"];
                $inclinationmedium = $resul[0]["inclinationmedium"];
                $inclinationlow = $resul[0]["inclinationlow"];
                $inclinationnonexistent = $resul[0]["inclinationnonexistent"];
                $inundationhigh = $resul[0]["inundationhigh"];
                $inundationmedium = $resul[0]["inundationmedium"];
                $inundationlow = $resul[0]["inundationlow"];
                $inundationnonexistent = $resul[0]["inundationnonexistent"];
                $firehighsecurityplanriskanalysyszone = $resul[0]["firehigh"];
                $firemediumsecurityplanriskanalysyszone = $resul[0]["firemedium"];
                $firelowsecurityplanriskanalysyszone = $resul[0]["firelow"];
                $firenonexistentsecurityplanriskanalysyszone = $resul[0]["firenonexistent"];
                $explosionhigh = $resul[0]["explosionhigh"];
                $explosionmedium = $resul[0]["explosionmedium"];
                $explosionlow = $resul[0]["explosionlow"];
                $explosionnonexistent = $resul[0]["explosionnonexistent"];
                $gasleakhigh = $resul[0]["gasleakhigh"];
                $gasleakmedium = $resul[0]["gasleakmedium"];
                $gasleaklow = $resul[0]["gasleaklow"];
                $gasleaknonexistent = $resul[0]["gasleaknonexistent"];
                $spillhazardousmaterialshigh = $resul[0]["spillhazardousmaterialshigh"];
                $spillhazardousmaterialsmedium = $resul[0]["spillhazardousmaterialsmedium"];
                $spillhazardousmaterialslow = $resul[0]["spillhazardousmaterialslow"];
                $spillhazardousmaterialsnonexistent = $resul[0]["spillhazardousmaterialsnonexistent"];
                $pollutionhigh = $resul[0]["pollutionhigh"];
                $pollutionmedium = $resul[0]["pollutionmedium"];
                $pollutionlow = $resul[0]["pollutionlow"];
                $pollutionnonexistent = $resul[0]["pollutionnonexistent"];
                $epidemichighsecurityplanriskanalysyszone = $resul[0]["epidemichigh"];
                $epidemicmediumsecurityplanriskanalysyszone = $resul[0]["epidemicmedium"];
                $epidemiclowsecurityplanriskanalysyszone = $resul[0]["epidemiclow"];
                $epidemicnonexistentsecurityplanriskanalysyszone = $resul[0]["epidemicnonexistent"];  
                $bombthreathigh = $resul[0]["bombthreathigh"];
                $bombthreatmedium = $resul[0]["bombthreatmedium"];
                $bombthreatlow = $resul[0]["bombthreatlow"];
                $bombthreatnonexistent = $resul[0]["bombthreatnonexistent"];
                $highvoltagetower = $resul[0]["highvoltagetower"];
                $electricpowerpoles = $resul[0]["electricpowerpoles"];
                $electrictransformers = $resul[0]["electrictransformers"];
                $damagesewers = $resul[0]["damagesewers"];
                $damagesidewalks = $resul[0]["damagesidewalks"];
                $hightanks = $resul[0]["hightanks"];
                $bigtrees = $resul[0]["bigtrees"];
                $overpasses = $resul[0]["overpasses"];
                $pedestrianbridge = $resul[0]["pedestrianbridge"];
                $muchtraffic = $resul[0]["muchtraffic"];
                $highbuilding = $resul[0]["highbuilding"];
                $bigannouncements = $resul[0]["bigannouncements"];
                $dangercanopies = $resul[0]["dangercanopies"];
                $notoriouosinclination = $resul[0]["notoriouosinclination"];
                $closestreets = $resul[0]["closestreets"];
                $slopingstreets = $resul[0]["slopingstreets"];
                $industriesorbussiness = $resul[0]["industriesorbussiness"];
                $pemexinstall = $resul[0]["pemexinstall"];
                $chemicalinsdustries = $resul[0]["chemicalinsdustries"];
                $industries = $resul[0]["industries"];
                $schools = $resul[0]["schools"];
                $hospitals = $resul[0]["hospitals"];
            }       

            $com="SELECT 
                infonaturalthreats ,
                earthquakenull ,
                earthquakelow ,
                earthquakemedium ,
                earthquakehigh ,
                earthquakeno ,
                volcanismnull ,
                volcanismlow ,
                volcanismmedium ,
                volcanismhigh ,
                volcanismno ,
                soilcollapsenull ,
                soilcollapselow ,
                soilcollapsemedium ,
                soilcollapsehigh ,
                soilcollapseno ,
                sinkingnull ,
                sinkinglow ,
                sinkingmedium ,
                sinkinghigh ,
                sinkingno ,
                crackingnull ,
                crackinglow ,
                crackingmedium ,
                crackinghigh ,
                crackingno ,
                mudnull ,
                mudlow ,
                mudmedium ,
                mudhigh ,
                mudno ,
                landslidesnull ,
                landslideslow ,
                landslidesmedium ,
                landslideshigh ,
                landslidesno ,
                acidrainnull ,
                acidrainlow ,
                acidrainmedium ,
                acidrainhigh ,
                acidrainno ,
                pouringrainnull ,
                pouringrainlow ,
                pouringrainmedium ,
                pouringrainhigh ,
                pouringrainno ,
                tropicalstormnull ,
                tropicalstormlow ,
                tropicalstormmedium ,
                tropicalstormhigh ,
                tropicalstormno ,
                floodingnull ,
                floodinglow ,
                floodingmedium ,
                floodinghigh ,
                floodingno ,
                hurricanesnull ,
                hurricaneslow ,
                hurricanesmedium ,
                hurricaneshigh ,
                hurricanesno ,
                electricstormnull ,
                electricstormlow ,
                electricstormmedium ,
                electricstormhigh ,
                electricstormno ,
                extremetemperaturesnull ,
                extremetemperatureslow ,
                extremetemperaturesmedium ,
                extremetemperatureshigh ,
                extremetemperaturesno ,
                thrombusnull ,
                thrombuslow ,
                thrombusmedium ,
                thrombushigh ,
                thrombusno ,
                hailstormnull ,
                hailstormlow ,
                hailstormmedium ,
                hailstormhigh ,
                hailstormno ,
                strongwindsnull ,
                strongwindslow ,
                strongwindsmedium ,
                strongwindshigh ,
                strongwindsno ,
                droughtsnull ,
                droughtslow ,
                droughtsmedium ,
                droughtshigh ,
                droughtsno ,
                firenull ,
                firelow ,
                firemedium ,
                firehigh ,
                fireno ,
                explosionsnull ,
                explosionslow ,
                explosionsmedium ,
                explosionshigh ,
                explosionsno ,
                chemicalspillnull ,
                chemicalspilllow ,
                chemicalspillmedium ,
                chemicalspillhigh ,
                chemicalspillno ,
                radiationsnull ,
                radiationslow ,
                radiationsmedium ,
                radiationshigh ,
                radiationsno ,
                enviromentalpollutionsnull ,
                enviromentalpollutionslow ,
                enviromentalpollutionsmedium ,
                enviromentalpollutionshigh ,
                enviromentalpollutionsno ,
                desertificationnull ,
                desertificationlow ,
                desertificationmedium ,
                desertificationhigh ,
                desertificationno ,
                epidemicnull ,
                epidemiclow ,
                epidemicmedium ,
                epidemichigh ,
                epidemicno ,
                intoxicationnull ,
                intoxicationlow ,
                intoxicationmedium ,
                intoxicationhigh ,
                intoxicationno ,
                poisoningnull ,
                poisoninglow ,
                poisoningmedium ,
                poisoninghigh ,
                poisoningno ,
                assaultsnull ,
                assaultslow ,
                assaultsmedium ,
                assaultshigh ,
                assaultsno ,
                interruptionbasicservicesnull ,
                interruptionbasicserviceslow ,
                interruptionbasicservicesmedium ,
                interruptionbasicserviceshigh ,
                interruptionbasicservicesno ,
                masspopulationconcentrationnull ,
                masspopulationconcentrationlow ,
                masspopulationconcentrationmedium ,
                masspopulationconcentrationhigh ,
                masspopulationconcentrationno ,
                manifestationsnull ,
                manifestationslow ,
                manifestationsmedium ,
                manifestationshigh ,
                manifestationsno ,
                terrorismnull ,
                terrorismlow ,
                terrorismmedium ,
                terrorismhigh ,
                terrorismno ,
                transportaccidentsnull ,
                transportaccidentslow ,
                transportaccidentsmedium ,
                transportaccidentshigh ,
                transportaccidentsno ,
                naturalphenomenasummary ,
                analysysfoundrisks

            FROM core.securityplanriskanalysysnaturalsthreats WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
            if ($resul[0] != "") { 
                $infonaturalthreats = $resul[0]["infonaturalthreats"];
                $earthquakenull = $resul[0]["earthquakenull"];
                $earthquakelow = $resul[0]["earthquakelow"];
                $earthquakemedium = $resul[0]["earthquakemedium"];
                $earthquakehigh = $resul[0]["earthquakehigh"];
                $earthquakeno = $resul[0]["earthquakeno"];
                $volcanismnull = $resul[0]["volcanismnull"];
                $volcanismlow = $resul[0]["volcanismlow"];
                $volcanismmedium = $resul[0]["volcanismmedium"];
                $volcanismhigh = $resul[0]["volcanismhigh"];
                $volcanismno = $resul[0]["volcanismno"];
                $soilcollapsenull = $resul[0]["soilcollapsenull"];
                $soilcollapselow = $resul[0]["soilcollapselow"];
                $soilcollapsemedium = $resul[0]["soilcollapsemedium"];
                $soilcollapsehigh = $resul[0]["soilcollapsehigh"];
                $soilcollapseno = $resul[0]["soilcollapseno"];
                $sinkingnull = $resul[0]["sinkingnull"];
                $sinkinglow = $resul[0]["sinkinglow"];
                $sinkingmedium = $resul[0]["sinkingmedium"];
                $sinkinghigh = $resul[0]["sinkinghigh"];
                $sinkingno = $resul[0]["sinkingno"];
                $crackingnull = $resul[0]["crackingnull"];
                $crackinglow = $resul[0]["crackinglow"];
                $crackingmedium = $resul[0]["crackingmedium"];
                $crackinghigh = $resul[0]["crackinghigh"];
                $crackingno = $resul[0]["crackingno"];
                $mudnull = $resul[0]["mudnull"];
                $mudlow = $resul[0]["mudlow"];
                $mudmedium = $resul[0]["mudmedium"];
                $mudhigh = $resul[0]["mudhigh"];
                $mudno = $resul[0]["mudno"];
                $landslidesnull = $resul[0]["landslidesnull"];
                $landslideslow = $resul[0]["landslideslow"];
                $landslidesmedium = $resul[0]["landslidesmedium"];
                $landslideshigh = $resul[0]["landslideshigh"];
                $landslidesno = $resul[0]["landslidesno"];
                $acidrainnull = $resul[0]["acidrainnull"];
                $acidrainlow = $resul[0]["acidrainlow"];
                $acidrainmedium = $resul[0]["acidrainmedium"];
                $acidrainhigh = $resul[0]["acidrainhigh"];
                $acidrainno = $resul[0]["acidrainno"];
                $pouringrainnull = $resul[0]["pouringrainnull"];
                $pouringrainlow = $resul[0]["pouringrainlow"];
                $pouringrainmedium = $resul[0]["pouringrainmedium"];
                $pouringrainhigh = $resul[0]["pouringrainhigh"];
                $pouringrainno = $resul[0]["pouringrainno"];
                $tropicalstormnull = $resul[0]["tropicalstormnull"];
                $tropicalstormlow = $resul[0]["tropicalstormlow"];
                $tropicalstormmedium = $resul[0]["tropicalstormmedium"];
                $tropicalstormhigh = $resul[0]["tropicalstormhigh"];
                $tropicalstormno = $resul[0]["tropicalstormno"];
                $floodingnull = $resul[0]["floodingnull"];
                $floodinglow = $resul[0]["floodinglow"];
                $floodingmedium = $resul[0]["floodingmedium"];
                $floodinghigh = $resul[0]["floodinghigh"];
                $floodingno = $resul[0]["floodingno"];
                $hurricanesnull = $resul[0]["hurricanesnull"];
                $hurricaneslow = $resul[0]["hurricaneslow"];
                $hurricanesmedium = $resul[0]["hurricanesmedium"];
                $hurricaneshigh = $resul[0]["hurricaneshigh"];
                $hurricanesno = $resul[0]["hurricanesno"];
                $electricstormnull = $resul[0]["electricstormnull"];
                $electricstormlow = $resul[0]["electricstormlow"];
                $electricstormmedium = $resul[0]["electricstormmedium"];
                $electricstormhigh = $resul[0]["electricstormhigh"];
                $electricstormno = $resul[0]["electricstormno"];
                $extremetemperaturesnull = $resul[0]["extremetemperaturesnull"];
                $extremetemperatureslow = $resul[0]["extremetemperatureslow"];
                $extremetemperaturesmedium = $resul[0]["extremetemperaturesmedium"];
                $extremetemperatureshigh = $resul[0]["extremetemperatureshigh"];
                $extremetemperaturesno = $resul[0]["extremetemperaturesno"];
                $thrombusnull = $resul[0]["thrombusnull"];
                $thrombuslow = $resul[0]["thrombuslow"];
                $thrombusmedium = $resul[0]["thrombusmedium"];
                $thrombushigh = $resul[0]["thrombushigh"];
                $thrombusno = $resul[0]["thrombusno"];
                $hailstormnull = $resul[0]["hailstormnull"];
                $hailstormlow = $resul[0]["hailstormlow"];
                $hailstormmedium = $resul[0]["hailstormmedium"];
                $hailstormhigh = $resul[0]["hailstormhigh"];
                $hailstormno = $resul[0]["hailstormno"];
                $strongwindsnull = $resul[0]["strongwindsnull"];
                $strongwindslow = $resul[0]["strongwindslow"];
                $strongwindsmedium = $resul[0]["strongwindsmedium"];
                $strongwindshigh = $resul[0]["strongwindshigh"];
                $strongwindsno = $resul[0]["strongwindsno"];
                $droughtsnull = $resul[0]["droughtsnull"];
                $droughtslow = $resul[0]["droughtslow"];
                $droughtsmedium = $resul[0]["droughtsmedium"];
                $droughtshigh = $resul[0]["droughtshigh"];
                $droughtsno = $resul[0]["droughtsno"];
                $firenull = $resul[0]["firenull"];
                $firelow = $resul[0]["firelow"];
                $firemedium = $resul[0]["firemedium"];
                $firehigh = $resul[0]["firehigh"];
                $fireno = $resul[0]["fireno"];
                $explosionsnull = $resul[0]["explosionsnull"];
                $explosionslow = $resul[0]["explosionslow"];
                $explosionsmedium = $resul[0]["explosionsmedium"];
                $explosionshigh = $resul[0]["explosionshigh"];
                $explosionsno = $resul[0]["explosionsno"];
                $chemicalspillnull = $resul[0]["chemicalspillnull"];
                $chemicalspilllow = $resul[0]["chemicalspilllow"];
                $chemicalspillmedium = $resul[0]["chemicalspillmedium"];
                $chemicalspillhigh = $resul[0]["chemicalspillhigh"];
                $chemicalspillno = $resul[0]["chemicalspillno"];
                $radiationsnull = $resul[0]["radiationsnull"];
                $radiationslow = $resul[0]["radiationslow"];
                $radiationsmedium = $resul[0]["radiationsmedium"];
                $radiationshigh = $resul[0]["radiationshigh"];
                $radiationsno = $resul[0]["radiationsno"];
                $enviromentalpollutionsnull = $resul[0]["enviromentalpollutionsnull"];
                $enviromentalpollutionslow = $resul[0]["enviromentalpollutionslow"];
                $enviromentalpollutionsmedium = $resul[0]["enviromentalpollutionsmedium"];
                $enviromentalpollutionshigh = $resul[0]["enviromentalpollutionshigh"];
                $enviromentalpollutionsno = $resul[0]["enviromentalpollutionsno"];
                $desertificationnull = $resul[0]["desertificationnull"];
                $desertificationlow = $resul[0]["desertificationlow"];
                $desertificationmedium = $resul[0]["desertificationmedium"];
                $desertificationhigh = $resul[0]["desertificationhigh"];
                $desertificationno = $resul[0]["desertificationno"];
                $epidemicnull = $resul[0]["epidemicnull"];
                $epidemiclow = $resul[0]["epidemiclow"];
                $epidemicmedium = $resul[0]["epidemicmedium"];
                $epidemichigh = $resul[0]["epidemichigh"];
                $epidemicno = $resul[0]["epidemicno"];
                $intoxicationnull = $resul[0]["intoxicationnull"];
                $intoxicationlow = $resul[0]["intoxicationlow"];
                $intoxicationmedium = $resul[0]["intoxicationmedium"];
                $intoxicationhigh = $resul[0]["intoxicationhigh"];
                $intoxicationno = $resul[0]["intoxicationno"];
                $poisoningnull = $resul[0]["poisoningnull"];
                $poisoninglow = $resul[0]["poisoninglow"];
                $poisoningmedium = $resul[0]["poisoningmedium"];
                $poisoninghigh = $resul[0]["poisoninghigh"];
                $poisoningno = $resul[0]["poisoningno"];
                $assaultsnull = $resul[0]["assaultsnull"];
                $assaultslow = $resul[0]["assaultslow"];
                $assaultsmedium = $resul[0]["assaultsmedium"];
                $assaultshigh = $resul[0]["assaultshigh"];
                $assaultsno = $resul[0]["assaultsno"];
                $interruptionbasicservicesnull = $resul[0]["interruptionbasicservicesnull"];
                $interruptionbasicserviceslow = $resul[0]["interruptionbasicserviceslow"];
                $interruptionbasicservicesmedium = $resul[0]["interruptionbasicservicesmedium"];
                $interruptionbasicserviceshigh = $resul[0]["interruptionbasicserviceshigh"];
                $interruptionbasicservicesno = $resul[0]["interruptionbasicservicesno"];
                $masspopulationconcentrationnull = $resul[0]["masspopulationconcentrationnull"];
                $masspopulationconcentrationlow = $resul[0]["masspopulationconcentrationlow"];
                $masspopulationconcentrationmedium = $resul[0]["masspopulationconcentrationmedium"];
                $masspopulationconcentrationhigh = $resul[0]["masspopulationconcentrationhigh"];
                $masspopulationconcentrationno = $resul[0]["masspopulationconcentrationno"];
                $manifestationsnull = $resul[0]["manifestationsnull"];
                $manifestationslow = $resul[0]["manifestationslow"];
                $manifestationsmedium = $resul[0]["manifestationsmedium"];
                $manifestationshigh = $resul[0]["manifestationshigh"];
                $manifestationsno = $resul[0]["manifestationsno"];
                $terrorismnull = $resul[0]["terrorismnull"];
                $terrorismlow = $resul[0]["terrorismlow"];
                $terrorismmedium = $resul[0]["terrorismmedium"];
                $terrorismhigh = $resul[0]["terrorismhigh"];
                $terrorismno = $resul[0]["terrorismno"];
                $transportaccidentsnull = $resul[0]["transportaccidentsnull"];
                $transportaccidentslow = $resul[0]["transportaccidentslow"];
                $transportaccidentsmedium = $resul[0]["transportaccidentsmedium"];
                $transportaccidentshigh = $resul[0]["transportaccidentshigh"];
                $transportaccidentsno = $resul[0]["transportaccidentsno"];
                $naturalphenomenasummary = $resul[0]["naturalphenomenasummary"];
                $analysysfoundrisks = $resul[0]["analysysfoundrisks"];
            }  


            $com="SELECT 
                securityequipment,
                generalrecomendations,
                securitymeasures
            FROM core.securityplanriskanalysysmisc WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
            if ($resul[0] != "") { 
                $securityequipment = $resul[0]["securityequipment"];
                $generalrecomendations = $resul[0]["generalrecomendations"];
                $securitymeasures = $resul[0]["securitymeasures"];
            }       

        }  

        // $array=array(
        //                 $sitelocation,
        //                 $northstreet,
        //                 $southstreet,
        //                 $eaststreet,
        //                 $weststreet,
        //                 $northbuilding,
        //                 $southbuilding,
        //                 $eastbuilding,
        //                 $westbuilding,
        //                 $identificationstrategicfacilities,
        //                 $explosionsimulation
        //                 );
        // for ($i=0; $i < ; $i++) { 
        //     # code...
        // }
        // if (!utilities::valOk($)) {
        //                    $valid = false;
        //                    $msg .= "El deleted esta vacio";
        //            } // 



        //validar correo 
        if($idpartyenterprise==""){
                  $msj_error .= "El idpartyenterprise es invalido, verifique. ";                
        }else{
            // if ($urloper == "save" && $sitelocation=="") {
            //      $error_msg_first_regist .= "El campo Alcance no puede estar vacio. "; 
            // }
        }
        
        //msj ALERTA
        if(($msj_error!="" || $error_msg_first_regist!="")
            && $urloper == "save"){
            utilities::alert($msj_error.$error_msg_first_regist);
        }  

        // GUARDAR 
        if ($urloper == "save" && ($msj_error=="" && $error_msg_first_regist=="")) {
             $dbl=new baseBL();
            //consultar si existe la ci          
            // $com_party_exists="select id from core.clinker where email='$email'";
            // $resul_party_exists=$dbl->executeScalar($com_party_exists);

            // //si existe buscar id de person
            // if($resul_party_exists!=""){

            //     utilities::alert("correo ya registrado");
            // //sino existe se debe validar datos y registrar en party 
            // }else{
            if($msj_error=="" && $error_msg_first_regist==""){
                $com ="SELECT id FROM core.securityplanriskanalysis WHERE idparty='$idpartyenterprise'";
                $idsecurityplansubprogram=$dbl->executeScalar($com);
                // $oper = "insert";  
                if ($idsecurityplansubprogram=="") {
            // $idfinishesfloors = $idfinisheswalls = $idfinishesdoors = $idfinishesstairs = 1;

            // if ($surface=="") {
            //   $surface=0;
            // } 
            // if ($antiquity=="") {
            //   $antiquity=0;
            // } 
            // if ($numlevel=="") {
            //   $numlevel=0;
            // } 
            // if ($highbuilding=="") {
            //   $highbuilding=0;
            // } 


                $comm .="INSERT INTO core.securityplanriskanalysis 
                    (idparty,
                    info ,
                    location ,
                    northstreet ,
                    southstreet ,
                    eaststreet ,
                    weststreet ,
                    northbuilding ,
                    southbuilding ,
                    eastbuilding ,
                    westbuilding ,
                    vitalservices ,
                    idcimentation ,
                    idstructure ,
                    idwall ,
                    idroof ,
                    idfloor ,
                    idenjarre ,
                    idelectricalinstall ,
                    idhidrosanitaryinstall ,
                    idbathroomfurniture ,
                    idcanceleria ,
                    iddoors ,
                    idstairs ,
                    idfinishesfloors ,
                    idfinisheswalls ,
                    idfinishesdoors ,
                    idfinishesstairs ,
                    permanentcensus ,
                    floatcensus ,
                    ownproperty ,
                    leasedproperty ,
                    otherproperty ,
                    surface ,
                    antiquity ,
                    numlevel ,
                    highbuilding ,
                    geotechnichallocation )
                VALUES ('$idpartyenterprise',
                    '$info',
                    '$location',
                    '$northstreet',
                    '$southstreet',
                    '$eaststreet',
                    '$weststreet',
                    '$northbuilding',
                    '$southbuilding',
                    '$eastbuilding',
                    '$westbuilding',
                    '$vitalservices',
                    "; if($idcimentation==""){ $comm .="NULL,"; }else{ $comm .="'$idcimentation',";} echo "
                    "; if($idstructure==""){ $comm .="NULL,"; }else{ $comm .="'$idstructure',";} echo "
                    "; if($idwall==""){ $comm .="NULL,"; }else{ $comm .="'$idwall',";} echo "
                    "; if($idroof==""){ $comm .="NULL,"; }else{ $comm .="'$idroof',";} echo "
                    "; if($idfloor==""){ $comm .="NULL,"; }else{ $comm .="'$idfloor',";} echo "
                    "; if($idenjarre==""){ $comm .="NULL,"; }else{ $comm .="'$idenjarre',";} echo "
                    "; if($idelectricalinstall==""){ $comm .="NULL,"; }else{ $comm .="'$idelectricalinstall',";} echo "
                    "; if($idhidrosanitaryinstall==""){ $comm .="NULL,"; }else{ $comm .="'$idhidrosanitaryinstall',";} echo "
                    "; if($idbathroomfurniture==""){ $comm .="NULL,"; }else{ $comm .="'$idbathroomfurniture',";} echo "
                    "; if($idcanceleria==""){ $comm .="NULL,"; }else{ $comm .="'$idcanceleria',";} echo "
                    "; if($iddoors==""){ $comm .="NULL,"; }else{ $comm .="'$iddoors',";} echo "
                    "; if($idstairs==""){ $comm .="NULL,"; }else{ $comm .="'$idstairs',";} echo "
                    "; if($idfinishesfloors==""){ $comm .="NULL,"; }else{ $comm .="'$idfinishesfloors',";} echo "
                    "; if($idfinisheswalls==""){ $comm .="NULL,"; }else{ $comm .="'$idfinisheswalls',";} echo "
                    "; if($idfinishesdoors==""){ $comm .="NULL,"; }else{ $comm .="'$idfinishesdoors',";} echo "
                    "; if($idfinishesstairs==""){ $comm .="NULL,"; }else{ $comm .="'$idfinishesstairs',";} $comm .="
                    '$permanentcensus',
                    '$floatcensus',
                    '$ownproperty',
                    '$leasedproperty',
                    '$otherproperty',
                    "; if($surface==""){ $comm .="NULL,"; }else{ $comm .="'$surface',";} echo "
                    "; if($antiquity==""){ $comm .="NULL,"; }else{ $comm .="'$antiquity',";} echo "
                    "; if($numlevel==""){ $comm .="NULL,"; }else{ $comm .="'$numlevel',";} echo "
                    "; if($highbuildingsecurityplanriskanalysis==""){ $comm .="NULL,"; }else{ $comm .="'$highbuildingsecurityplanriskanalysis',";} $comm .="
                    '$geotechnichallocation') RETURNING id";
                    // var_dump($comm);
                    $idsecurityplansubprogram=$dbl->executeScalar($comm);
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido 1");

                        $path0 = "program1ok";
                    }
                }else{
                    $com2="UPDATE core.securityplanriskanalysis 
                        SET 
                        info='$info',
                        location='$location',
                        northstreet='$northstreet',
                        southstreet='$southstreet',
                        eaststreet='$eaststreet',
                        weststreet='$weststreet',
                        northbuilding='$northbuilding',
                        southbuilding='$southbuilding',
                        eastbuilding='$eastbuilding',
                        westbuilding='$westbuilding',
                        vitalservices='$vitalservices',
                        "; if($idcimentation==""){ $com2 .=" idcimentation=NULL,"; }else{ $com2 .=" idcimentation='$idcimentation',";} echo "
                        "; if($idstructure==""){ $com2 .=" idstructure=NULL,"; }else{ $com2 .=" idstructure='$idstructure',";} echo "
                        "; if($idwall==""){ $com2 .=" idwall=NULL,"; }else{ $com2 .=" idwall='$idwall',";} echo "
                        "; if($idroof==""){ $com2 .=" idroof=NULL,"; }else{ $com2 .=" idroof='$idroof',";} echo "
                        "; if($idfloor==""){ $com2 .=" idfloor=NULL,"; }else{ $com2 .=" idfloor='$idfloor',";} echo "
                        "; if($idenjarre==""){ $com2 .=" idenjarre=NULL,"; }else{ $com2 .=" idenjarre='$idenjarre',";} echo "
                        "; if($idelectricalinstall==""){ $com2 .=" idelectricalinstall=NULL,"; }else{ $com2 .=" idelectricalinstall='$idelectricalinstall',";} echo "
                        "; if($idhidrosanitaryinstall==""){ $com2 .=" idhidrosanitaryinstall=NULL,"; }else{ $com2 .=" idhidrosanitaryinstall='$idhidrosanitaryinstall',";} echo "
                        "; if($idbathroomfurniture==""){ $com2 .=" idbathroomfurniture=NULL,"; }else{ $com2 .=" idbathroomfurniture='$idbathroomfurniture',";} echo "
                        "; if($idcanceleria==""){ $com2 .=" idcanceleria=NULL,"; }else{ $com2 .=" idcanceleria='$idcanceleria',";} echo "
                        "; if($iddoors==""){ $com2 .=" iddoors=NULL,"; }else{ $com2 .=" iddoors='$iddoors',";} echo "
                        "; if($idstairs==""){ $com2 .="idstairs =NULL,"; }else{ $com2 .=" idstairs='$idstairs',";} echo "
                        "; if($idfinishesfloors==""){ $com2 .=" idfinishesfloors=NULL,"; }else{ $com2 .=" idfinishesfloors='$idfinishesfloors',";} echo "
                        "; if($idfinisheswalls==""){ $com2 .=" idfinisheswalls=NULL,"; }else{ $com2 .="idfinisheswalls ='$idfinisheswalls',";} echo "
                        "; if($idfinishesdoors==""){ $com2 .=" idfinishesdoors=NULL,"; }else{ $com2 .=" idfinishesdoors='$idfinishesdoors',";} echo "
                        "; if($idfinishesstairs==""){ $com2 .=" idfinishesstairs=NULL,"; }else{ $com2 .="idfinishesstairs ='$idfinishesstairs',";} $com2 .=" 
                        permanentcensus='$permanentcensus',
                        floatcensus='$floatcensus',
                        ownproperty='$ownproperty',
                        leasedproperty='$leasedproperty',
                        otherproperty='$otherproperty',
                        "; if($surface==""){ $com2 .=" surface=NULL,"; }else{ $com2 .=" surface='$surface',";} echo "
                        "; if($antiquity==""){ $com2 .=" antiquity=NULL,"; }else{ $com2 .=" antiquity='$antiquity',";} echo "
                        "; if($numlevel==""){ $com2 .=" numlevel=NULL,"; }else{ $com2 .=" numlevel='$numlevel',";} echo "
                        "; if($highbuildingsecurityplanriskanalysis==""){ $com2 .=" highbuilding=NULL,"; }else{ $com2 .=" highbuilding='$highbuildingsecurityplanriskanalysis',";} $com2 .="
                        geotechnichallocation='$geotechnichallocation' 
                    WHERE idparty='$idpartyenterprise' RETURNING id";
                    // var_dump($com2);
                    $idsecurityplansubprogram=$dbl->executeScalar($com2);
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // utilities::alert("correo ya registrado");
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("Registri Fallido");

                        $path1 = "program1ok";
                    }
                } 

                // --------------------------PARTE2
                $com="SELECT id FROM core.securityplanriskanalysyscomplements WHERE idparty='$idpartyenterprise'";
                $idsecurityplansubprogram=$dbl->executeScalar($com);
                // $oper = "insert";  
                if ($idsecurityplansubprogram=="") {
                    $com3="INSERT INTO core.securityplanriskanalysyscomplements 
                        (idparty,
                        municipaltake ,
                        numdrains ,
                        numsubtank ,
                        subtankcapacity ,
                        numaerialtank ,
                        aerialtankcapacity ,
                        galvanizedpipeline ,
                        cooperpipeline ,
                        electricbomb ,
                        siamesevalve ,
                        municipalwaternetwork ,
                        riverdrain ,
                        electricalinstall ,
                        generalswitch ,
                        secundaryswitch ,
                        shutdowncontacts ,
                        lightingsystem ,
                        emercyelectricplant ,
                        physicsearthsystem ,
                        airwashequipment ,
                        numfueltank ,
                        dieseltankcapacity ,
                        magnatankcapacity ,
                        premiumtankcapacity ,
                        installdate ,
                        warehouse ,
                        storage ,
                        adequatestowage ,
                        deathfile ,
                        openfile ,
                        electricpower ,
                        trashinstall ,
                        trashtype ,
                        automaticalarmsystem ,
                        tvmonitoringsystem ,
                        comunication ,
                        internaldangerzone  )
                    VALUES ('$idpartyenterprise',
                        '$municipaltake',

                        "; if($numdrains==""){ $com3 .="NULL,"; }else{ $com3 .="'$numdrains',";} echo "
                        "; if($numsubtank==""){ $com3 .="NULL,"; }else{ $com3 .="'$numsubtank',";} echo "
                        "; if($subtankcapacity==""){ $com3 .="NULL,"; }else{ $com3 .="'$subtankcapacity',";} echo "
                        "; if($numaerialtank==""){ $com3 .="NULL,"; }else{ $com3 .="'$numaerialtank',";} echo "
                        "; if($aerialtankcapacity==""){ $com3 .="NULL,"; }else{ $com3 .="'$aerialtankcapacity',";} $com3 .="

                        '$galvanizedpipeline ',
                        '$cooperpipeline ',
                        '$electricbomb ',
                        '$siamesevalve ',
                        '$municipalwaternetwork ',
                        '$riverdrain ',
                        '$electricalinstall ',
                        '$generalswitch ',
                        '$secundaryswitch ',
                        '$shutdowncontacts ',
                        '$lightingsystem ',
                        '$emercyelectricplant ',
                        '$physicsearthsystem ',
                        '$airwashequipment ',
                        "; if($numfueltank==""){ $com3 .="NULL,"; }else{ $com3 .="'$numfueltank',";} echo "
                        "; if($dieseltankcapacity==""){ $com3 .="NULL,"; }else{ $com3 .="'$dieseltankcapacity',";} echo "
                        "; if($magnatankcapacity==""){ $com3 .="NULL,"; }else{ $com3 .="'$magnatankcapacity',";} echo "
                        "; if($premiumtankcapacity==""){ $com3 .="NULL,"; }else{ $com3 .="'$premiumtankcapacity',";} echo "
                        "; if($installdate==""){ $com3 .="NULL,"; }else{ $com3 .="'$installdate',";} $com3 .="  
                        '$warehouse',
                        '$storage',
                        '$adequatestowage',
                        '$deathfile',
                        '$openfile',
                        '$electricpower',
                        '$trashinstall',
                        '$trashtype',
                        '$automaticalarmsystem',
                        '$tvmonitoringsystem',
                        '$comunication',
                        '$internaldangerzone') RETURNING id";
                    // var_dump($com3);
                    $idsecurityplansubprogram=$dbl->executeScalar($com3);
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("Registro Fallido");

                        $path2 = "program2ok";
                    }
                }else{
                    $com4="UPDATE core.securityplanriskanalysyscomplements 
                    SET 
                        municipaltake='$municipaltake',
                        "; if($numdrains==""){ $com4 .=" numdrains=NULL,"; }else{ $com4 .=" numdrains='$numdrains',";} echo "
                        "; if($numsubtank==""){ $com4 .=" numsubtank=NULL,"; }else{ $com4 .=" numsubtank='$numsubtank',";} echo "
                        "; if($subtankcapacity==""){ $com4 .=" subtankcapacity=NULL,"; }else{ $com4 .=" subtankcapacity='$subtankcapacity',";} echo "
                        "; if($numaerialtank==""){ $com4 .=" numaerialtank=NULL,"; }else{ $com4 .=" numaerialtank='$numaerialtank',";} echo "
                        "; if($aerialtankcapacity==""){ $com4 .=" aerialtankcapacity=NULL,"; }else{ $com4 .=" aerialtankcapacity='$aerialtankcapacity',";} $com4 .=" 

                        galvanizedpipeline='$galvanizedpipeline',
                        cooperpipeline='$cooperpipeline',
                        electricbomb='$electricbomb',
                        siamesevalve='$siamesevalve',
                        municipalwaternetwork='$municipalwaternetwork',
                        riverdrain='$riverdrain',
                        electricalinstall='$electricalinstall',
                        generalswitch='$generalswitch',
                        secundaryswitch='$secundaryswitch',
                        shutdowncontacts='$shutdowncontacts',
                        lightingsystem='$lightingsystem',
                        emercyelectricplant='$emercyelectricplant',
                        physicsearthsystem='$physicsearthsystem',
                        airwashequipment='$airwashequipment',


                        "; if($numfueltank==""){ $com4 .=" numfueltank=NULL,"; }else{ $com4 .=" numfueltank='$numfueltank',";} echo "
                        "; if($dieseltankcapacity==""){ $com4 .=" dieseltankcapacity=NULL,"; }else{ $com4 .=" dieseltankcapacity='$dieseltankcapacity',";} echo "
                        "; if($magnatankcapacity==""){ $com4 .=" magnatankcapacity=NULL,"; }else{ $com4 .=" magnatankcapacity='$magnatankcapacity',";} echo "
                        "; if($premiumtankcapacity==""){ $com4 .=" premiumtankcapacity=NULL,"; }else{ $com4 .=" premiumtankcapacity='$premiumtankcapacity',";} echo "
                        "; if($installdate==""){ $com4 .=" installdate=NULL,"; }else{ $com4 .=" installdate='$installdate',";} $com4 .=" 
                        warehouse='$warehouse',
                        storage='$storage',
                        adequatestowage='$adequatestowage',
                        deathfile='$deathfile',
                        openfile='$openfile',
                        electricpower='$electricpower',
                        trashinstall='$trashinstall',
                        trashtype='$trashtype',
                        automaticalarmsystem='$automaticalarmsystem',
                        tvmonitoringsystem='$tvmonitoringsystem',
                        comunication='$comunication',
                        internaldangerzone='$internaldangerzone' 
                    WHERE idparty='$idpartyenterprise' RETURNING id";
                    // var_dump($com4);
                    $idsecurityplansubprogram=$dbl->executeScalar($com4);
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // utilities::alert("correo ya registrado");
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("Registro Fallido");

                        $path3 = "program2ok";
                    }
                } 

                // -------------------3era tabla

                $com="SELECT id FROM core.securityplanriskanalysyszone WHERE idparty='$idpartyenterprise'";
                $idsecurityplansubprogram=$dbl->executeScalar($com);
                // $oper = "insert";  
                if ($idsecurityplansubprogram=="") {
                    $comx ="INSERT INTO core.securityplanriskanalysyszone 
                        (idparty,
                        cimentation ,
                        cimentationcutting ,
                        cimentationretraction ,
                        cimentationflaming ,
                        cimentationtemperature ,
                        cimentationcorrosive ,
                        cimentationcomplexion ,
                        cimentationflexion ,
                        cimentationpanding ,
                        cimentationcollapsing ,
                        cimentationinclination ,
                        cimentationsettlement ,
                        cimentationcraking ,
                        cimentationothers ,";
                        $comx .= '"column" ,';
                        $comx .= "
                        columncutting ,
                        columnretraction ,
                        columnflaming ,
                        columntemperature ,
                        columncorrosive ,
                        columncomplexion ,
                        columnflexion ,
                        columnpanding ,
                        columncollapsing ,
                        columninclination ,
                        columnsettlement ,
                        columncraking ,
                        columnothers ,
                        wall ,
                        wallcutting ,
                        wallretraction ,
                        wallflaming ,
                        walltemperature ,
                        wallcorrosive ,
                        wallcomplexion ,
                        wallflexion ,
                        wallpanding ,
                        wallcollapsing ,
                        wallinclination ,
                        wallsettlement ,
                        wallcraking ,
                        wallothers ,
                        roof ,
                        roofcutting ,
                        roofretraction ,
                        roofflaming ,
                        rooftemperature ,
                        roofcorrosive ,
                        roofcomplexion ,
                        roofflexion ,
                        roofpanding ,
                        roofcollapsing ,
                        roofinclination ,
                        roofsettlement ,
                        roofcraking ,
                        roofothers ,
                        stairs ,
                        stairscutting ,
                        stairsretraction ,
                        stairsflaming ,
                        stairstemperature ,
                        stairscorrosive ,
                        stairscomplexion ,
                        stairsflexion ,
                        stairspanding ,
                        stairscollapsing ,
                        stairsinclination ,
                        stairssettlement ,
                        stairscraking ,
                        stairsothers ,
                        trabes ,
                        trabescutting ,
                        trabesretraction ,
                        trabesflaming ,
                        trabestemperature ,
                        trabescorrosive ,
                        trabescomplexion ,
                        trabesflexion ,
                        trabespanding ,
                        trabescollapsing ,
                        trabesinclination ,
                        trabessettlement ,
                        trabescraking ,
                        trabesothers ,
                        structuraldamagehigh ,
                        structuraldamagemedium ,
                        structuraldamagelow ,
                        structuraldamagenonexistent ,
                        collapsehigh ,
                        collapsemedium ,
                        collapselow ,
                        collapsenonexistent ,
                        finishdamagehigh ,
                        finishdamagemedium ,
                        finishdamagelow ,
                        finishdamagenonexistent ,
                        severedamagehigh ,
                        severedamagemedium ,
                        severedamagelow ,
                        severedamagenonexistent ,
                        sinkinghigh ,
                        sinkingmedium ,
                        sinkinglow ,
                        sinkingnonexistent ,
                        inclinationhigh ,
                        inclinationmedium ,
                        inclinationlow ,
                        inclinationnonexistent ,
                        inundationhigh ,
                        inundationmedium ,
                        inundationlow ,
                        inundationnonexistent ,
                        firehigh ,
                        firemedium ,
                        firelow ,
                        firenonexistent ,
                        explosionhigh ,
                        explosionmedium ,
                        explosionlow ,
                        explosionnonexistent ,
                        gasleakhigh ,
                        gasleakmedium ,
                        gasleaklow ,
                        gasleaknonexistent ,
                        spillhazardousmaterialshigh ,
                        spillhazardousmaterialsmedium ,
                        spillhazardousmaterialslow ,
                        spillhazardousmaterialsnonexistent ,
                        pollutionhigh ,
                        pollutionmedium ,
                        pollutionlow ,
                        pollutionnonexistent ,
                        epidemichigh ,
                        epidemicmedium ,
                        epidemiclow ,
                        epidemicnonexistent ,
                        bombthreathigh ,
                        bombthreatmedium ,
                        bombthreatlow ,
                        bombthreatnonexistent ,
                        highvoltagetower ,
                        electricpowerpoles ,
                        electrictransformers ,
                        damagesewers ,
                        damagesidewalks ,
                        hightanks ,
                        bigtrees ,
                        overpasses ,
                        pedestrianbridge ,
                        muchtraffic ,
                        highbuilding ,
                        bigannouncements ,
                        dangercanopies ,
                        notoriouosinclination ,
                        closestreets ,
                        slopingstreets ,
                        industriesorbussiness ,
                        pemexinstall ,
                        chemicalinsdustries ,
                        industries ,
                        schools ,
                        hospitals )
                    VALUES ('$idpartyenterprise',
                        '$cimentation',
                        '$cimentationcutting',
                        '$cimentationretraction',
                        '$cimentationflaming',
                        '$cimentationtemperature',
                        '$cimentationcorrosive',
                        '$cimentationcomplexion',
                        '$cimentationflexion',
                        '$cimentationpanding',
                        '$cimentationcollapsing',
                        '$cimentationinclination',
                        '$cimentationsettlement',
                        '$cimentationcraking',
                        '$cimentationothers',
                        '$column',
                        '$columncutting',
                        '$columnretraction',
                        '$columnflaming',
                        '$columntemperature',
                        '$columncorrosive',
                        '$columncomplexion',
                        '$columnflexion',
                        '$columnpanding',
                        '$columncollapsing',
                        '$columninclination',
                        '$columnsettlement',
                        '$columncraking',
                        '$columnothers',
                        '$wall',
                        '$wallcutting',
                        '$wallretraction',
                        '$wallflaming',
                        '$walltemperature',
                        '$wallcorrosive',
                        '$wallcomplexion',
                        '$wallflexion',
                        '$wallpanding',
                        '$wallcollapsing',
                        '$wallinclination',
                        '$wallsettlement',
                        '$wallcraking',
                        '$wallothers',
                        '$roof',
                        '$roofcutting',
                        '$roofretraction',
                        '$roofflaming',
                        '$rooftemperature',
                        '$roofcorrosive',
                        '$roofcomplexion',
                        '$roofflexion',
                        '$roofpanding',
                        '$roofcollapsing',
                        '$roofinclination',
                        '$roofsettlement',
                        '$roofcraking',
                        '$roofothers',
                        '$stairs',
                        '$stairscutting',
                        '$stairsretraction',
                        '$stairsflaming',
                        '$stairstemperature',
                        '$stairscorrosive',
                        '$stairscomplexion',
                        '$stairsflexion',
                        '$stairspanding',
                        '$stairscollapsing',
                        '$stairsinclination',
                        '$stairssettlement',
                        '$stairscraking',
                        '$stairsothers',
                        '$trabes',
                        '$trabescutting',
                        '$trabesretraction',
                        '$trabesflaming',
                        '$trabestemperature',
                        '$trabescorrosive',
                        '$trabescomplexion',
                        '$trabesflexion',
                        '$trabespanding',
                        '$trabescollapsing',
                        '$trabesinclination',
                        '$trabessettlement',
                        '$trabescraking',
                        '$trabesothers',
                        '$structuraldamagehigh',
                        '$structuraldamagemedium',
                        '$structuraldamagelow',
                        '$structuraldamagenonexistent',
                        '$collapsehigh',
                        '$collapsemedium',
                        '$collapselow',
                        '$collapsenonexistent',
                        '$finishdamagehigh',
                        '$finishdamagemedium',
                        '$finishdamagelow',
                        '$finishdamagenonexistent',
                        '$severedamagehigh',
                        '$severedamagemedium',
                        '$severedamagelow',
                        '$severedamagenonexistent',
                        '$sinkinghighsinkinghigh',
                        '$sinkingmediumsinkinghigh',
                        '$sinkinglowsinkinghigh',
                        '$sinkingnonexistentsinkinghigh',
                        '$inclinationhigh',
                        '$inclinationmedium',
                        '$inclinationlow',
                        '$inclinationnonexistent',
                        '$inundationhigh',
                        '$inundationmedium',
                        '$inundationlow',
                        '$inundationnonexistent',
                        '$firehighsecurityplanriskanalysyszone',
                        '$firemediumsecurityplanriskanalysyszone',
                        '$firelowsecurityplanriskanalysyszone',
                        '$firenonexistentsecurityplanriskanalysyszone',
                        '$explosionhigh',
                        '$explosionmedium',
                        '$explosionlow',
                        '$explosionnonexistent',
                        '$gasleakhigh',
                        '$gasleakmedium',
                        '$gasleaklow',
                        '$gasleaknonexistent',
                        '$spillhazardousmaterialshigh',
                        '$spillhazardousmaterialsmedium',
                        '$spillhazardousmaterialslow',
                        '$spillhazardousmaterialsnonexistent',
                        '$pollutionhigh',
                        '$pollutionmedium',
                        '$pollutionlow',
                        '$pollutionnonexistent',
                        '$epidemichighsecurityplanriskanalysyszone',
                        '$epidemicmediumsecurityplanriskanalysyszone',
                        '$epidemiclowsecurityplanriskanalysyszone',
                        '$epidemicnonexistentsecurityplanriskanalysyszone', 
                        '$bombthreathigh',
                        '$bombthreatmedium',
                        '$bombthreatlow',
                        '$bombthreatnonexistent',
                        '$highvoltagetower',
                        '$electricpowerpoles',
                        '$electrictransformers',
                        '$damagesewers',
                        '$damagesidewalks',
                        '$hightanks',
                        '$bigtrees',
                        '$overpasses',
                        '$pedestrianbridge',
                        '$muchtraffic',
                        '$highbuilding',
                        '$bigannouncements',
                        '$dangercanopies',
                        '$notoriouosinclination',
                        '$closestreets',
                        '$slopingstreets',
                        '$industriesorbussiness',
                        '$pemexinstall',
                        '$chemicalinsdustries',
                        '$industries',
                        '$schools',
                        '$hospitals') RETURNING id";
                    // var_dump("holaaa");

                    // var_dump($comx);

                    $idsecurityplansubprogram=$dbl->executeScalar($comx);
                    // var_dump($idsecurityplansubprogram);
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // echo "holaaaaaaaaaaaaaaaaaaaaaaaaaaa";
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido 5");

                        $path4 = "program3ok";
                    }
                }else{
                    $com6 ="UPDATE core.securityplanriskanalysyszone 
                    SET 
                        cimentation='$cimentation',
                        cimentationcutting='$cimentationcutting',
                        cimentationretraction='$cimentationretraction',
                        cimentationflaming='$cimentationflaming',
                        cimentationtemperature='$cimentationtemperature',
                        cimentationcorrosive='$cimentationcorrosive',
                        cimentationcomplexion='$cimentationcomplexion',
                        cimentationflexion='$cimentationflexion',
                        cimentationpanding='$cimentationpanding',
                        cimentationcollapsing='$cimentationcollapsing',
                        cimentationinclination='$cimentationinclination',
                        cimentationsettlement='$cimentationsettlement',
                        cimentationcraking='$cimentationcraking',
                        cimentationothers='$cimentationothers',";
                        $com6 .= '"column"';
                        $com6 .= "='$column',
                        columncutting='$columncutting',
                        columnretraction='$columnretraction',
                        columnflaming='$columnflaming',
                        columntemperature='$columntemperature',
                        columncorrosive='$columncorrosive',
                        columncomplexion='$columncomplexion',
                        columnflexion='$columnflexion',
                        columnpanding='$columnpanding',
                        columncollapsing='$columncollapsing',
                        columninclination='$columninclination',
                        columnsettlement='$columnsettlement',
                        columncraking='$columncraking',
                        columnothers='$columnothers',
                        wall='$wall',
                        wallcutting='$wallcutting',
                        wallretraction='$wallretraction',
                        wallflaming='$wallflaming',
                        walltemperature='$walltemperature',
                        wallcorrosive='$wallcorrosive',
                        wallcomplexion='$wallcomplexion',
                        wallflexion='$wallflexion',
                        wallpanding='$wallpanding',
                        wallcollapsing='$wallcollapsing',
                        wallinclination='$wallinclination',
                        wallsettlement='$wallsettlement',
                        wallcraking='$wallcraking',
                        wallothers='$wallothers',
                        roof='$roof',
                        roofcutting='$roofcutting',
                        roofretraction='$roofretraction',
                        roofflaming='$roofflaming',
                        rooftemperature='$rooftemperature',
                        roofcorrosive='$roofcorrosive',
                        roofcomplexion='$roofcomplexion',
                        roofflexion='$roofflexion',
                        roofpanding='$roofpanding',
                        roofcollapsing='$roofcollapsing',
                        roofinclination='$roofinclination',
                        roofsettlement='$roofsettlement',
                        roofcraking='$roofcraking',
                        roofothers='$roofothers',
                        stairs='$stairs',
                        stairscutting='$stairscutting',
                        stairsretraction='$stairsretraction',
                        stairsflaming='$stairsflaming',
                        stairstemperature='$stairstemperature',
                        stairscorrosive='$stairscorrosive',
                        stairscomplexion='$stairscomplexion',
                        stairsflexion='$stairsflexion',
                        stairspanding='$stairspanding',
                        stairscollapsing='$stairscollapsing',
                        stairsinclination='$stairsinclination',
                        stairssettlement='$stairssettlement',
                        stairscraking='$stairscraking',
                        stairsothers='$stairsothers',
                        trabes='$trabes',
                        trabescutting='$trabescutting',
                        trabesretraction='$trabesretraction',
                        trabesflaming='$trabesflaming',
                        trabestemperature='$trabestemperature',
                        trabescorrosive='$trabescorrosive',
                        trabescomplexion='$trabescomplexion',
                        trabesflexion='$trabesflexion',
                        trabespanding='$trabespanding',
                        trabescollapsing='$trabescollapsing',
                        trabesinclination='$trabesinclination',
                        trabessettlement='$trabessettlement',
                        trabescraking='$trabescraking',
                        trabesothers='$trabesothers',
                        structuraldamagehigh='$structuraldamagehigh',
                        structuraldamagemedium='$structuraldamagemedium',
                        structuraldamagelow='$structuraldamagelow',
                        structuraldamagenonexistent='$structuraldamagenonexistent',
                        collapsehigh='$collapsehigh',
                        collapsemedium='$collapsemedium',
                        collapselow='$collapselow',
                        collapsenonexistent='$collapsenonexistent',
                        finishdamagehigh='$finishdamagehigh',
                        finishdamagemedium='$finishdamagemedium',
                        finishdamagelow='$finishdamagelow',
                        finishdamagenonexistent='$finishdamagenonexistent',
                        severedamagehigh='$severedamagehigh',
                        severedamagemedium='$severedamagemedium',
                        severedamagelow='$severedamagelow',
                        severedamagenonexistent='$severedamagenonexistent',
                        sinkinghigh='$sinkinghighsinkinghigh',
                        sinkingmedium='$sinkingmediumsinkinghigh',
                        sinkinglow='$sinkinglowsinkinghigh',
                        sinkingnonexistent='$sinkingnonexistentsinkinghigh',
                        inclinationhigh='$inclinationhigh',
                        inclinationmedium='$inclinationmedium',
                        inclinationlow='$inclinationlow',
                        inclinationnonexistent='$inclinationnonexistent',
                        inundationhigh='$inundationhigh',
                        inundationmedium='$inundationmedium',
                        inundationlow='$inundationlow',
                        inundationnonexistent='$inundationnonexistent',
                        firehigh='$firehighsecurityplanriskanalysyszone',
                        firemedium='$firemediumsecurityplanriskanalysyszone',
                        firelow='$firelowsecurityplanriskanalysyszone',
                        firenonexistent='$firenonexistentsecurityplanriskanalysyszone',
                        explosionhigh='$explosionhigh',
                        explosionmedium='$explosionmedium',
                        explosionlow='$explosionlow',
                        explosionnonexistent='$explosionnonexistent',
                        gasleakhigh='$gasleakhigh',
                        gasleakmedium='$gasleakmedium',
                        gasleaklow='$gasleaklow',
                        gasleaknonexistent='$gasleaknonexistent',
                        spillhazardousmaterialshigh='$spillhazardousmaterialshigh',
                        spillhazardousmaterialsmedium='$spillhazardousmaterialsmedium',
                        spillhazardousmaterialslow='$spillhazardousmaterialslow',
                        spillhazardousmaterialsnonexistent='$spillhazardousmaterialsnonexistent',
                        pollutionhigh='$pollutionhigh',
                        pollutionmedium='$pollutionmedium',
                        pollutionlow='$pollutionlow',
                        pollutionnonexistent='$pollutionnonexistent',
                        epidemichigh='$epidemichighsecurityplanriskanalysyszone',
                        epidemicmedium='$epidemicmediumsecurityplanriskanalysyszone',
                        epidemiclow='$epidemiclowsecurityplanriskanalysyszone',
                        epidemicnonexistent='$epidemicnonexistentsecurityplanriskanalysyszone',  
                        bombthreathigh='$bombthreathigh',
                        bombthreatmedium='$bombthreatmedium',
                        bombthreatlow='$bombthreatlow',
                        bombthreatnonexistent='$bombthreatnonexistent',
                        highvoltagetower='$highvoltagetower',
                        electricpowerpoles='$electricpowerpoles',
                        electrictransformers='$electrictransformers',
                        damagesewers='$damagesewers',
                        damagesidewalks='$damagesidewalks',
                        hightanks='$hightanks',
                        bigtrees='$bigtrees',
                        overpasses='$overpasses',
                        pedestrianbridge='$pedestrianbridge',
                        muchtraffic='$muchtraffic',
                        highbuilding='$highbuilding',
                        bigannouncements='$bigannouncements',
                        dangercanopies='$dangercanopies',
                        notoriouosinclination='$notoriouosinclination',
                        closestreets='$closestreets',
                        slopingstreets='$slopingstreets',
                        industriesorbussiness='$industriesorbussiness',
                        pemexinstall='$pemexinstall',
                        chemicalinsdustries='$chemicalinsdustries',
                        industries='$industries',
                        schools='$schools',
                        hospitals='$hospitals'

                    WHERE idparty='$idpartyenterprise' RETURNING id";
                    // var_dump($com6);
                    $idsecurityplansubprogram=$dbl->executeScalar($com6);
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // utilities::alert("correo ya registrado");
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido 6");

                        $path5 = "program3ok";
                    }
                } 

                // ---------------------parte 4

                $com="SELECT id FROM core.securityplanriskanalysysnaturalsthreats WHERE idparty='$idpartyenterprise'";
                $idsecurityplansubprogram=$dbl->executeScalar($com);
                // $oper = "insert";  
                if ($idsecurityplansubprogram=="") {
                    $com="INSERT INTO core.securityplanriskanalysysnaturalsthreats 
                        (idparty,
                        infonaturalthreats ,
                        earthquakenull ,
                        earthquakelow ,
                        earthquakemedium ,
                        earthquakehigh ,
                        earthquakeno ,
                        volcanismnull ,
                        volcanismlow ,
                        volcanismmedium ,
                        volcanismhigh ,
                        volcanismno ,
                        soilcollapsenull ,
                        soilcollapselow ,
                        soilcollapsemedium ,
                        soilcollapsehigh ,
                        soilcollapseno ,
                        sinkingnull ,
                        sinkinglow ,
                        sinkingmedium ,
                        sinkinghigh ,
                        sinkingno ,
                        crackingnull ,
                        crackinglow ,
                        crackingmedium ,
                        crackinghigh ,
                        crackingno ,
                        mudnull ,
                        mudlow ,
                        mudmedium ,
                        mudhigh ,
                        mudno ,
                        landslidesnull ,
                        landslideslow ,
                        landslidesmedium ,
                        landslideshigh ,
                        landslidesno ,
                        acidrainnull ,
                        acidrainlow ,
                        acidrainmedium ,
                        acidrainhigh ,
                        acidrainno ,
                        pouringrainnull ,
                        pouringrainlow ,
                        pouringrainmedium ,
                        pouringrainhigh ,
                        pouringrainno ,
                        tropicalstormnull ,
                        tropicalstormlow ,
                        tropicalstormmedium ,
                        tropicalstormhigh ,
                        tropicalstormno ,
                        floodingnull ,
                        floodinglow ,
                        floodingmedium ,
                        floodinghigh ,
                        floodingno ,
                        hurricanesnull ,
                        hurricaneslow ,
                        hurricanesmedium ,
                        hurricaneshigh ,
                        hurricanesno ,
                        electricstormnull ,
                        electricstormlow ,
                        electricstormmedium ,
                        electricstormhigh ,
                        electricstormno ,
                        extremetemperaturesnull ,
                        extremetemperatureslow ,
                        extremetemperaturesmedium ,
                        extremetemperatureshigh ,
                        extremetemperaturesno ,
                        thrombusnull ,
                        thrombuslow ,
                        thrombusmedium ,
                        thrombushigh ,
                        thrombusno ,
                        hailstormnull ,
                        hailstormlow ,
                        hailstormmedium ,
                        hailstormhigh ,
                        hailstormno ,
                        strongwindsnull ,
                        strongwindslow ,
                        strongwindsmedium ,
                        strongwindshigh ,
                        strongwindsno ,
                        droughtsnull ,
                        droughtslow ,
                        droughtsmedium ,
                        droughtshigh ,
                        droughtsno ,
                        firenull ,
                        firelow ,
                        firemedium ,
                        firehigh ,
                        fireno ,
                        explosionsnull ,
                        explosionslow ,
                        explosionsmedium ,
                        explosionshigh ,
                        explosionsno ,
                        chemicalspillnull ,
                        chemicalspilllow ,
                        chemicalspillmedium ,
                        chemicalspillhigh ,
                        chemicalspillno ,
                        radiationsnull ,
                        radiationslow ,
                        radiationsmedium ,
                        radiationshigh ,
                        radiationsno ,
                        enviromentalpollutionsnull ,
                        enviromentalpollutionslow ,
                        enviromentalpollutionsmedium ,
                        enviromentalpollutionshigh ,
                        enviromentalpollutionsno ,
                        desertificationnull ,
                        desertificationlow ,
                        desertificationmedium ,
                        desertificationhigh ,
                        desertificationno ,
                        epidemicnull ,
                        epidemiclow ,
                        epidemicmedium ,
                        epidemichigh ,
                        epidemicno ,
                        intoxicationnull ,
                        intoxicationlow ,
                        intoxicationmedium ,
                        intoxicationhigh ,
                        intoxicationno ,
                        poisoningnull ,
                        poisoninglow ,
                        poisoningmedium ,
                        poisoninghigh ,
                        poisoningno ,
                        assaultsnull ,
                        assaultslow ,
                        assaultsmedium ,
                        assaultshigh ,
                        assaultsno ,
                        interruptionbasicservicesnull ,
                        interruptionbasicserviceslow ,
                        interruptionbasicservicesmedium ,
                        interruptionbasicserviceshigh ,
                        interruptionbasicservicesno ,
                        masspopulationconcentrationnull ,
                        masspopulationconcentrationlow ,
                        masspopulationconcentrationmedium ,
                        masspopulationconcentrationhigh ,
                        masspopulationconcentrationno ,
                        manifestationsnull ,
                        manifestationslow ,
                        manifestationsmedium ,
                        manifestationshigh ,
                        manifestationsno ,
                        terrorismnull ,
                        terrorismlow ,
                        terrorismmedium ,
                        terrorismhigh ,
                        terrorismno ,
                        transportaccidentsnull ,
                        transportaccidentslow ,
                        transportaccidentsmedium ,
                        transportaccidentshigh ,
                        transportaccidentsno ,
                        naturalphenomenasummary ,
                        analysysfoundrisks )
                    VALUES ('$idpartyenterprise',
                        '$infonaturalthreats',
                        '$earthquakenull',
                        '$earthquakelow',
                        '$earthquakemedium',
                        '$earthquakehigh',
                        '$earthquakeno',
                        '$volcanismnull',
                        '$volcanismlow',
                        '$volcanismmedium',
                        '$volcanismhigh',
                        '$volcanismno',
                        '$soilcollapsenull',
                        '$soilcollapselow',
                        '$soilcollapsemedium',
                        '$soilcollapsehigh',
                        '$soilcollapseno',
                        '$sinkingnull',
                        '$sinkinglow',
                        '$sinkingmedium',
                        '$sinkinghigh',
                        '$sinkingno',
                        '$crackingnull',
                        '$crackinglow',
                        '$crackingmedium',
                        '$crackinghigh',
                        '$crackingno',
                        '$mudnull',
                        '$mudlow',
                        '$mudmedium',
                        '$mudhigh',
                        '$mudno',
                        '$landslidesnull',
                        '$landslideslow',
                        '$landslidesmedium',
                        '$landslideshigh',
                        '$landslidesno',
                        '$acidrainnull',
                        '$acidrainlow',
                        '$acidrainmedium',
                        '$acidrainhigh',
                        '$acidrainno',
                        '$pouringrainnull',
                        '$pouringrainlow',
                        '$pouringrainmedium',
                        '$pouringrainhigh',
                        '$pouringrainno',
                        '$tropicalstormnull',
                        '$tropicalstormlow',
                        '$tropicalstormmedium',
                        '$tropicalstormhigh',
                        '$tropicalstormno',
                        '$floodingnull',
                        '$floodinglow',
                        '$floodingmedium',
                        '$floodinghigh',
                        '$floodingno',
                        '$hurricanesnull',
                        '$hurricaneslow',
                        '$hurricanesmedium',
                        '$hurricaneshigh',
                        '$hurricanesno',
                        '$electricstormnull',
                        '$electricstormlow',
                        '$electricstormmedium',
                        '$electricstormhigh',
                        '$electricstormno',
                        '$extremetemperaturesnull',
                        '$extremetemperatureslow',
                        '$extremetemperaturesmedium',
                        '$extremetemperatureshigh',
                        '$extremetemperaturesno',
                        '$thrombusnull',
                        '$thrombuslow',
                        '$thrombusmedium',
                        '$thrombushigh',
                        '$thrombusno',
                        '$hailstormnull',
                        '$hailstormlow',
                        '$hailstormmedium',
                        '$hailstormhigh',
                        '$hailstormno',
                        '$strongwindsnull',
                        '$strongwindslow',
                        '$strongwindsmedium',
                        '$strongwindshigh',
                        '$strongwindsno',
                        '$droughtsnull',
                        '$droughtslow',
                        '$droughtsmedium',
                        '$droughtshigh',
                        '$droughtsno',
                        '$firenull',
                        '$firelow',
                        '$firemedium',
                        '$firehigh',
                        '$fireno',
                        '$explosionsnull',
                        '$explosionslow',
                        '$explosionsmedium',
                        '$explosionshigh',
                        '$explosionsno',
                        '$chemicalspillnull',
                        '$chemicalspilllow',
                        '$chemicalspillmedium',
                        '$chemicalspillhigh',
                        '$chemicalspillno',
                        '$radiationsnull',
                        '$radiationslow',
                        '$radiationsmedium',
                        '$radiationshigh',
                        '$radiationsno',
                        '$enviromentalpollutionsnull',
                        '$enviromentalpollutionslow',
                        '$enviromentalpollutionsmedium',
                        '$enviromentalpollutionshigh',
                        '$enviromentalpollutionsno',
                        '$desertificationnull',
                        '$desertificationlow',
                        '$desertificationmedium',
                        '$desertificationhigh',
                        '$desertificationno',
                        '$epidemicnull',
                        '$epidemiclow',
                        '$epidemicmedium',
                        '$epidemichigh',
                        '$epidemicno',
                        '$intoxicationnull',
                        '$intoxicationlow',
                        '$intoxicationmedium',
                        '$intoxicationhigh',
                        '$intoxicationno',
                        '$poisoningnull',
                        '$poisoninglow',
                        '$poisoningmedium',
                        '$poisoninghigh',
                        '$poisoningno',
                        '$assaultsnull',
                        '$assaultslow',
                        '$assaultsmedium',
                        '$assaultshigh',
                        '$assaultsno',
                        '$interruptionbasicservicesnull',
                        '$interruptionbasicserviceslow',
                        '$interruptionbasicservicesmedium',
                        '$interruptionbasicserviceshigh',
                        '$interruptionbasicservicesno',
                        '$masspopulationconcentrationnull',
                        '$masspopulationconcentrationlow',
                        '$masspopulationconcentrationmedium',
                        '$masspopulationconcentrationhigh',
                        '$masspopulationconcentrationno',
                        '$manifestationsnull',
                        '$manifestationslow',
                        '$manifestationsmedium',
                        '$manifestationshigh',
                        '$manifestationsno',
                        '$terrorismnull',
                        '$terrorismlow',
                        '$terrorismmedium',
                        '$terrorismhigh',
                        '$terrorismno',
                        '$transportaccidentsnull',
                        '$transportaccidentslow',
                        '$transportaccidentsmedium',
                        '$transportaccidentshigh',
                        '$transportaccidentsno',
                        '$naturalphenomenasummary',
                        '$analysysfoundrisks') RETURNING id";
                    // var_dump($com);
                    $idsecurityplansubprogram=$dbl->executeScalar($com);
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido 7");

                        $path6 = "program4ok";
                    }
                }else{
                    $com="UPDATE core.securityplanriskanalysysnaturalsthreats 
                    SET 
                        infonaturalthreats='$infonaturalthreats',
                        earthquakenull='$earthquakenull',
                        earthquakelow='$earthquakelow',
                        earthquakemedium='$earthquakemedium',
                        earthquakehigh='$earthquakehigh',
                        earthquakeno='$earthquakeno',
                        volcanismnull='$volcanismnull',
                        volcanismlow='$volcanismlow',
                        volcanismmedium='$volcanismmedium',
                        volcanismhigh='$volcanismhigh',
                        volcanismno='$volcanismno',
                        soilcollapsenull='$soilcollapsenull',
                        soilcollapselow='$soilcollapselow',
                        soilcollapsemedium='$soilcollapsemedium',
                        soilcollapsehigh='$soilcollapsehigh',
                        soilcollapseno='$soilcollapseno',
                        sinkingnull='$sinkingnull',
                        sinkinglow='$sinkinglow',
                        sinkingmedium='$sinkingmedium',
                        sinkinghigh='$sinkinghigh',
                        sinkingno='$sinkingno',
                        crackingnull='$crackingnull',
                        crackinglow='$crackinglow',
                        crackingmedium='$crackingmedium',
                        crackinghigh='$crackinghigh',
                        crackingno='$crackingno',
                        mudnull='$mudnull',
                        mudlow='$mudlow',
                        mudmedium='$mudmedium',
                        mudhigh='$mudhigh',
                        mudno='$mudno',
                        landslidesnull='$landslidesnull',
                        landslideslow='$landslideslow',
                        landslidesmedium='$landslidesmedium',
                        landslideshigh='$landslideshigh',
                        landslidesno='$landslidesno',
                        acidrainnull='$acidrainnull',
                        acidrainlow='$acidrainlow',
                        acidrainmedium='$acidrainmedium',
                        acidrainhigh='$acidrainhigh',
                        acidrainno='$acidrainno',
                        pouringrainnull='$pouringrainnull',
                        pouringrainlow='$pouringrainlow',
                        pouringrainmedium='$pouringrainmedium',
                        pouringrainhigh='$pouringrainhigh',
                        pouringrainno='$pouringrainno',
                        tropicalstormnull='$tropicalstormnull',
                        tropicalstormlow='$tropicalstormlow',
                        tropicalstormmedium='$tropicalstormmedium',
                        tropicalstormhigh='$tropicalstormhigh',
                        tropicalstormno='$tropicalstormno',
                        floodingnull='$floodingnull',
                        floodinglow='$floodinglow',
                        floodingmedium='$floodingmedium',
                        floodinghigh='$floodinghigh',
                        floodingno='$floodingno',
                        hurricanesnull='$hurricanesnull',
                        hurricaneslow='$hurricaneslow',
                        hurricanesmedium='$hurricanesmedium',
                        hurricaneshigh='$hurricaneshigh',
                        hurricanesno='$hurricanesno',
                        electricstormnull='$electricstormnull',
                        electricstormlow='$electricstormlow',
                        electricstormmedium='$electricstormmedium',
                        electricstormhigh='$electricstormhigh',
                        electricstormno='$electricstormno',
                        extremetemperaturesnull='$extremetemperaturesnull',
                        extremetemperatureslow='$extremetemperatureslow',
                        extremetemperaturesmedium='$extremetemperaturesmedium',
                        extremetemperatureshigh='$extremetemperatureshigh',
                        extremetemperaturesno='$extremetemperaturesno',
                        thrombusnull='$thrombusnull',
                        thrombuslow='$thrombuslow',
                        thrombusmedium='$thrombusmedium',
                        thrombushigh='$thrombushigh',
                        thrombusno='$thrombusno',
                        hailstormnull='$hailstormnull',
                        hailstormlow='$hailstormlow',
                        hailstormmedium='$hailstormmedium',
                        hailstormhigh='$hailstormhigh',
                        hailstormno='$hailstormno',
                        strongwindsnull='$strongwindsnull',
                        strongwindslow='$strongwindslow',
                        strongwindsmedium='$strongwindsmedium',
                        strongwindshigh='$strongwindshigh',
                        strongwindsno='$strongwindsno',
                        droughtsnull='$droughtsnull',
                        droughtslow='$droughtslow',
                        droughtsmedium='$droughtsmedium',
                        droughtshigh='$droughtshigh',
                        droughtsno='$droughtsno',
                        firenull='$firenull',
                        firelow='$firelow',
                        firemedium='$firemedium',
                        firehigh='$firehigh',
                        fireno='$fireno',
                        explosionsnull='$explosionsnull',
                        explosionslow='$explosionslow',
                        explosionsmedium='$explosionsmedium',
                        explosionshigh='$explosionshigh',
                        explosionsno='$explosionsno',
                        chemicalspillnull='$chemicalspillnull',
                        chemicalspilllow='$chemicalspilllow',
                        chemicalspillmedium='$chemicalspillmedium',
                        chemicalspillhigh='$chemicalspillhigh',
                        chemicalspillno='$chemicalspillno',
                        radiationsnull='$radiationsnull',
                        radiationslow='$radiationslow',
                        radiationsmedium='$radiationsmedium',
                        radiationshigh='$radiationshigh',
                        radiationsno='$radiationsno',
                        enviromentalpollutionsnull='$enviromentalpollutionsnull',
                        enviromentalpollutionslow='$enviromentalpollutionslow',
                        enviromentalpollutionsmedium='$enviromentalpollutionsmedium',
                        enviromentalpollutionshigh='$enviromentalpollutionshigh',
                        enviromentalpollutionsno='$enviromentalpollutionsno',
                        desertificationnull='$desertificationnull',
                        desertificationlow='$desertificationlow',
                        desertificationmedium='$desertificationmedium',
                        desertificationhigh='$desertificationhigh',
                        desertificationno='$desertificationno',
                        epidemicnull='$epidemicnull',
                        epidemiclow='$epidemiclow',
                        epidemicmedium='$epidemicmedium',
                        epidemichigh='$epidemichigh',
                        epidemicno='$epidemicno',
                        intoxicationnull='$intoxicationnull',
                        intoxicationlow='$intoxicationlow',
                        intoxicationmedium='$intoxicationmedium',
                        intoxicationhigh='$intoxicationhigh',
                        intoxicationno='$intoxicationno',
                        poisoningnull='$poisoningnull',
                        poisoninglow='$poisoninglow',
                        poisoningmedium='$poisoningmedium',
                        poisoninghigh='$poisoninghigh',
                        poisoningno='$poisoningno',
                        assaultsnull='$assaultsnull',
                        assaultslow='$assaultslow',
                        assaultsmedium='$assaultsmedium',
                        assaultshigh='$assaultshigh',
                        assaultsno='$assaultsno',
                        interruptionbasicservicesnull='$interruptionbasicservicesnull',
                        interruptionbasicserviceslow='$interruptionbasicserviceslow',
                        interruptionbasicservicesmedium='$interruptionbasicservicesmedium',
                        interruptionbasicserviceshigh='$interruptionbasicserviceshigh',
                        interruptionbasicservicesno='$interruptionbasicservicesno',
                        masspopulationconcentrationnull='$masspopulationconcentrationnull',
                        masspopulationconcentrationlow='$masspopulationconcentrationlow',
                        masspopulationconcentrationmedium='$masspopulationconcentrationmedium',
                        masspopulationconcentrationhigh='$masspopulationconcentrationhigh',
                        masspopulationconcentrationno='$masspopulationconcentrationno',
                        manifestationsnull='$manifestationsnull',
                        manifestationslow='$manifestationslow',
                        manifestationsmedium='$manifestationsmedium',
                        manifestationshigh='$manifestationshigh',
                        manifestationsno='$manifestationsno',
                        terrorismnull='$terrorismnull',
                        terrorismlow='$terrorismlow',
                        terrorismmedium='$terrorismmedium',
                        terrorismhigh='$terrorismhigh',
                        terrorismno='$terrorismno',
                        transportaccidentsnull='$transportaccidentsnull',
                        transportaccidentslow='$transportaccidentslow',
                        transportaccidentsmedium='$transportaccidentsmedium',
                        transportaccidentshigh='$transportaccidentshigh',
                        transportaccidentsno='$transportaccidentsno',
                        naturalphenomenasummary='$naturalphenomenasummary',
                        analysysfoundrisks='$analysysfoundrisks' 
                    WHERE idparty='$idpartyenterprise' RETURNING id";
                        // var_dump($com);
                        $idsecurityplansubprogram=$dbl->executeScalar($com);
                        if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                            // utilities::alert("correo ya registrado");
                            // utilities::redirect($path);
                        }else{
                            utilities::alert("registro fallido 8");

                            $path7 = "program4ok";
                        }
                } 

                // ------------------------------- penitima

                $com="SELECT id FROM core.securityplanriskanalysysmisc WHERE idparty='$idpartyenterprise'";
                $idsecurityplansubprogram=$dbl->executeScalar($com);
                // $oper = "insert";  
                if ($idsecurityplansubprogram=="") {
                    $com="INSERT INTO core.securityplanriskanalysysmisc 
                            (idparty,
                            securityequipment ,
                            generalrecomendations ,
                            securitymeasures  )
                        VALUES ('$idpartyenterprise',
                            '$securityequipment ',
                            '$generalrecomendations ',
                            '$securitymeasures ') RETURNING id";
                            // var_dump($com);
                    $idsecurityplansubprogram=$dbl->executeScalar($com);
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido 9");

                        $path8 = "program3ok";
                    }
                }else{
                    $com="UPDATE core.securityplanriskanalysysmisc 
                    SET 

                        securityequipment='$securityequipment' ,
                        generalrecomendations='$generalrecomendations' ,
                        securitymeasures='$securitymeasures'

                    WHERE idparty='$idpartyenterprise' RETURNING id";
                    // var_dump($com);
                    $idsecurityplansubprogram=$dbl->executeScalar($com);
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // utilities::alert("correo ya registrado");
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido 10");

                        $path9 = "program3ok";
                    }
                } 
            }else{
                    utilities::alert($msj_error.$error_msg_first_regist);
            }                                  
                // }            
            // }
        }

        // guardar amenaza
        if ($amenaza=="Guardar amenaza" ) {
            $dbl=new baseBL();

            // $com="SELECT id from core.threats where id='$idthreats'";
            if ($idthreats=="") {
                $com="INSERT INTO core.threats 
                (description,location)
                VALUES ('$descriptionthreats','$locationthreats') RETURNING id";
                $idthreats=$dbl->executeScalar($com);

                if ($idthreats!="") {
                    // $com ="SELECT id from core.securityplanriskanalysys where idparty='$idpartyenterprise'";
                    // $idriskanalysys=$dbl->executeScalar($com);
                    // // var_dump($idriskanalysys);
                    // if ($idriskanalysys!="") {
                    $com="INSERT INTO core.threatriskanalysys 
                    (idparty,idthreat)
                    VALUES ('$idpartyenterprise','$idthreats') RETURNING id";
                    $idthreatriskanalysys=$dbl->executeScalar($com);
                    // var_dump($com);
                    if ($idthreatriskanalysys!="") {
                        utilities::alert("Registro exitoso");
                        $idthreats =
                        $locationthreats =
                        $descriptionthreats = 
                        $idthreatriskanalysys = "";
                        $amenaza = "";
                    }else{
                        utilities::alert("Error al registrar threatriskanalysys");
                    }
                    // }else{
                    //     utilities::alert("NO posee idriskanalysys");
                    // }
                }else{
                    utilities::alert("Registro de amenaza fallido");
                }
            }else{
                $com="UPDATE core.threats 
                SET 
                description='$descriptionthreats' ,
                location='$locationthreats'
                WHERE id='$idthreats' RETURNING id";
                // var_dump($com);
                $idthreats=$dbl->executeScalar($com);
                if ($idthreats>0 && $idthreats!="") {
                    $idthreats =
                    $locationthreats =
                    $descriptionthreats =
                    $amenaza = "";
                }else{
                    utilities::alert("registro fallido core.threats");
                }
            }
            }if ($idthreats!="" && $amenaza!="Guardar amenaza") {
                $com="SELECT 
                    description,
                    location
                FROM core.threats WHERE id='$idthreats'";
                // var_dump($com);
                $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
                    $descriptionthreats = $resul[0]["description"];
                    $locationthreats = $resul[0]["location"];
                }     
            } else {
            # code...
            }

            // guardar strategiclocations     
            if ($savestrategiclocations=="savestrategiclocations" ) {
                $dbl=new baseBL();
                // var_dump($idstrategiclocations);
                if ($idstrategiclocations=="") {
                    $com="INSERT INTO core.securityplanriskanalysysstrategiclocations 
                    (description,idparty)
                    VALUES ('$descriptionstrategiclocations','$idpartyenterprise') RETURNING id";
                    $idstrategiclocations=$dbl->executeScalar($com);
                    // var_dump($com);
                    if ($idstrategiclocations!="") {
                        utilities::alert("Registro exitoso");
                        $idstrategiclocations =
                        $descriptionstrategiclocations = 
                        $savestrategiclocations = "";
                    }else{
                        utilities::alert("Error al Registrar");
                    }
                }else{
                    $com="UPDATE core.securityplanriskanalysysstrategiclocations 
                        SET 
                        description='$descriptionstrategiclocations' 
                        WHERE id='$idstrategiclocations' RETURNING id";
            
                    $idstrategiclocations=$dbl->executeScalar($com);
                    if ($idstrategiclocations>0 && $idstrategiclocations!="") {
                        utilities::alert("Modificacion exitosa");

                        $idstrategiclocations =
                        $descriptionstrategiclocations =
                        $savestrategiclocations = "";
                    }else{
                        utilities::alert("registro fallido core.securityplanriskanalysysstrategiclocations");
                    }
                }
                }if ($idstrategiclocations!="" && $savestrategiclocations!="savestrategiclocations") {
                    $com="SELECT 
                    description
                    FROM core.securityplanriskanalysysstrategiclocations WHERE id='$idstrategiclocations'";
                    // var_dump($com);
                    $resul=$dbl->executeReader($com);
                    if ($resul[0] != "") { 
                        $descriptionstrategiclocations = $resul[0]["description"];
                    }     
                } else {
                # code...
                }


                // guardar securityplanriskanalysysdirectory     
                if ($savesecurityplanriskanalysysdirectory=="savesecurityplanriskanalysysdirectory" ) {
                    $dbl=new baseBL();
                    // var_dump($idsecurityplanriskanalysysdirectory);
                    if ($idsecurityplanriskanalysysdirectory=="") {
                        $com="INSERT INTO core.securityplanriskanalysysdirectory 
                        (idparty,personname,position)
                        VALUES ('$idpartyenterprise','$personnamesecurityplanriskanalysysdirectory','$positionsecurityplanriskanalysysdirectory') RETURNING id";
                        $idsecurityplanriskanalysysdirectory=$dbl->executeScalar($com);
                        // var_dump($com);
                        if ($idsecurityplanriskanalysysdirectory!="") {
                            utilities::alert("Registro exitoso");
                            $idsecurityplanriskanalysysdirectory =
                            $personnamesecurityplanriskanalysysdirectory = 
                            $positionsecurityplanriskanalysysdirectory = 
                            $savesecurityplanriskanalysysdirectory = "";
                        }else{
                            utilities::alert("Error al registrar threatriskanalysys");
                        }
                    }else{
                        $com="UPDATE core.securityplanriskanalysysdirectory 
                        SET 
                        personname='$personnamesecurityplanriskanalysysdirectory' ,
                        position='$positionsecurityplanriskanalysysdirectory' 
                        WHERE id='$idsecurityplanriskanalysysdirectory' RETURNING id";
                        // var_dump($com);
            
                        $idsecurityplanriskanalysysdirectory=$dbl->executeScalar($com);
                        if ($idsecurityplanriskanalysysdirectory>0 && $idsecurityplanriskanalysysdirectory!="") {
                            utilities::alert("Modificacion exitosa");

                            $idsecurityplanriskanalysysdirectory =
                            $personnamesecurityplanriskanalysysdirectory = 
                            $positionsecurityplanriskanalysysdirectory = 
                            $savesecurityplanriskanalysysdirectory = "";
                        }else{
                            utilities::alert("registro fallido core.securityplanriskanalysysdirectory");
                        }
                    }
                }
                if ($idsecurityplanriskanalysysdirectory!="" && $savesecurityplanriskanalysysdirectory!="savesecurityplanriskanalysysdirectory") {
                    $com="SELECT 
                    personname,position
                    FROM core.securityplanriskanalysysdirectory WHERE id='$idsecurityplanriskanalysysdirectory'";
                    // var_dump($com);
                    $resul=$dbl->executeReader($com);
                    if ($resul[0] != "") { 
                        $personnamesecurityplanriskanalysysdirectory = $resul[0]["personname"];
                        $positionsecurityplanriskanalysysdirectory = $resul[0]["position"];
                    }     
                } else {
                # code...
                }

                /*
                // guardar securityplanriskanalysysemerncyresources     
                if ($savesecurityplanriskanalysysemerncyresources=="savesecurityplanriskanalysysemerncyresources" ) {
                    $dbl=new baseBL();
                    // var_dump($idsecurityplanriskanalysysemerncyresources);
                    if ($idsecurityplanriskanalysysemerncyresources=="") {
                        $com="INSERT INTO core.securityplanriskanalysysemerncyresources 
                            (idparty,quantity,equipment,locationc,code)
                        VALUES ('$idpartyenterprise','$quantitysecurityplanriskanalysysemerncyresources','$equipmentsecurityplanriskanalysysemerncyresources','$locationcsecurityplanriskanalysysemerncyresources',
                            'INVMATEMER') RETURNING id";
                        $idsecurityplanriskanalysysemerncyresources=$dbl->executeScalar($com);
                    // var_dump($com);
                    if ($idsecurityplanriskanalysysemerncyresources!="") {
                        utilities::alert("Registro exitoso");
                        $idsecurityplanriskanalysysemerncyresources =
                        $quantitysecurityplanriskanalysysemerncyresources = 
                        $equipmentsecurityplanriskanalysysemerncyresources = 
                        $locationcsecurityplanriskanalysysemerncyresources = 
                        $savesecurityplanriskanalysysemerncyresources = "";
                    }else{
                        utilities::alert("Error al registrar securityplanriskanalysysemerncyresources");
                    }
                }else{
                    $com="UPDATE core.securityplanriskanalysysemerncyresources 
                    SET 
                    quantity='$quantitysecurityplanriskanalysysemerncyresources' ,
                    equipment='$equipmentsecurityplanriskanalysysemerncyresources' ,
                    locationc='$locationcsecurityplanriskanalysysemerncyresources' 
                    WHERE id='$idsecurityplanriskanalysysemerncyresources' RETURNING id";
                    // var_dump($com);
            
              $idsecurityplanriskanalysysemerncyresources=$dbl->executeScalar($com);
              if ($idsecurityplanriskanalysysemerncyresources>0 && $idsecurityplanriskanalysysemerncyresources!="") {
                  utilities::alert("Modificacion exitosa");

                  $idsecurityplanriskanalysysemerncyresources =
                  $quantitysecurityplanriskanalysysemerncyresources = 
                  $equipmentsecurityplanriskanalysysemerncyresources = 
                  $locationcsecurityplanriskanalysysemerncyresources = 
                  $savesecurityplanriskanalysysemerncyresources = "";
              }else{
                  utilities::alert("registro fallido core.securityplanriskanalysysemerncyresources");
              }
          }
        }if ($idsecurityplanriskanalysysemerncyresources!="" && $savesecurityplanriskanalysysemerncyresources!="savesecurityplanriskanalysysemerncyresources") {
            $com="SELECT 
            quantity,equipment,locationc
            FROM core.securityplanriskanalysysemerncyresources WHERE id='$idsecurityplanriskanalysysemerncyresources'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
          if ($resul[0] != "") { 
            $quantitysecurityplanriskanalysysemerncyresources = $resul[0]["quantity"];
            $equipmentsecurityplanriskanalysysemerncyresources = $resul[0]["equipment"];
            $locationcsecurityplanriskanalysysemerncyresources = $resul[0]["locationc"];
          }     
        } else {
          # code...
        }




        // guardar securityplanriskanalysysemerncyresourcesINVMATEMEREXT     
        if ($savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT=="savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT" ) {
            $dbl=new baseBL();
// var_dump($idsecurityplanriskanalysysemerncyresources);
          if ($idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT=="") {
              $com="INSERT INTO core.securityplanriskanalysysemerncyresources 
              (idparty,quantity,equipment,locationc,code)
              VALUES ('$idpartyenterprise','$quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT','$equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT','$locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT',
                'INVMATEMEREXT') RETURNING id";
              $idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT=$dbl->executeScalar($com);
// var_dump($com);
              if ($idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT!="") {
                  utilities::alert("Registro exitoso");
                  $idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT =
                  $quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = 
                  $equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = 
                  $locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = 
                  $savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = "";
              }else{
                  utilities::alert("Error al registrar securityplanriskanalysysemerncyresources");
              }
          }else{
            $com="UPDATE core.securityplanriskanalysysemerncyresources 
              SET 
              quantity='$quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT' ,
              equipment='$equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT' ,
              locationc='$locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT' 
              WHERE id='$idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT' RETURNING id";
            // var_dump($com);
            
              $idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT=$dbl->executeScalar($com);
              if ($idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT>0 && $idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT!="") {
                  utilities::alert("Modificacion exitosa");

                  $idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT =
                  $quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = 
                  $equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = 
                  $locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = 
                  $savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = "";
              }else{
                  utilities::alert("registro fallido core.securityplanriskanalysysemerncyresources");
              }
          }
        }if ($idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT!="" && $savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT!="savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT") {
            $com="SELECT 
            quantity,equipment,locationc
            FROM core.securityplanriskanalysysemerncyresources WHERE id='$idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
          if ($resul[0] != "") { 
            $quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = $resul[0]["quantity"];
            $equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = $resul[0]["equipment"];
            $locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT = $resul[0]["locationc"];
          }     
        } else {
          # code...
        }

        */




        /*
        // guardar securityplanriskanalysysemergencydirectory   
        //   
        if ($savesecurityplanriskanalysysemergencydirectory=="savesecurityplanriskanalysysemergencydirectory" ) {
            $dbl=new baseBL();
          if ($idsecurityplanriskanalysysemergencydirectory=="") {
                $img_content = file_get_contents($logosecurityplanriskanalysysemergencydirectory["tmp_name"]);    
                $img_base64 = chunk_split(base64_encode($img_content));
              $com="INSERT INTO core.securityplanriskanalysysemergencydirectory 
              (idparty,logo,enterprise,phone,address)
              VALUES ('$idpartyenterprise','$img_base64','$enterprisesecurityplanriskanalysysemergencydirectory','$phonesecurityplanriskanalysysemergencydirectory','$addresssecurityplanriskanalysysemergencydirectory') RETURNING id";
              $idsecurityplanriskanalysysemergencydirectory=$dbl->executeScalar($com);
// var_dump($com);
              if ($idsecurityplanriskanalysysemergencydirectory!="") {
                  utilities::alert("Registro exitoso");
                  $idsecurityplanriskanalysysemergencydirectory =
                  $enterprisesecurityplanriskanalysysemergencydirectory = 
                  $phonesecurityplanriskanalysysemergencydirectory = 
                  $addresssecurityplanriskanalysysemergencydirectory = 
                  $savesecurityplanriskanalysysemergencydirectory = "";
                  $logosecurityplanriskanalysysemergencydirectory =
                  $img_base64 = "";
              }else{
                  utilities::alert("Error al registrar threatriskanalysys");
              }
          }else{
                $img_content = file_get_contents($logosecurityplanriskanalysysemergencydirectory["tmp_name"]);    
                $img_base64 = chunk_split(base64_encode($img_content));            
            $com="UPDATE core.securityplanriskanalysysemergencydirectory 
              SET 
              logo='$img_base64' ,
              enterprise='$enterprisesecurityplanriskanalysysemergencydirectory' ,
              phone='$phonesecurityplanriskanalysysemergencydirectory' ,
              address='$addresssecurityplanriskanalysysemergencydirectory' 
              WHERE id='$idsecurityplanriskanalysysemergencydirectory' RETURNING id";
            // var_dump($com);
            
              $idsecurityplanriskanalysysemergencydirectory=$dbl->executeScalar($com);
              if ($idsecurityplanriskanalysysemergencydirectory>0 && $idsecurityplanriskanalysysemergencydirectory!="") {
                  utilities::alert("Modificacion exitosa");

                  $idsecurityplanriskanalysysemergencydirectory =
                  $enterprisesecurityplanriskanalysysemergencydirectory = 
                  $phonesecurityplanriskanalysysemergencydirectory = 
                  $addresssecurityplanriskanalysysemergencydirectory = 
                  $savesecurityplanriskanalysysemergencydirectory = "";
                  $logosecurityplanriskanalysysemergencydirectory =
                  $img_base64 = "";                  
              }else{
                  utilities::alert("registro fallido core.securityplanriskanalysysemergencydirectory");
              }
          }
        }if ($idsecurityplanriskanalysysemergencydirectory!="" && $savesecurityplanriskanalysysemergencydirectory!="savesecurityplanriskanalysysemergencydirectory") {
            $com="SELECT 
            logo,enterprise,phone,address
            FROM core.securityplanriskanalysysemergencydirectory WHERE id='$idsecurityplanriskanalysysemergencydirectory'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
          if ($resul[0] != "") { 
            $logosecurityplanriskanalysysemergencydirectory = $resul[0]["logo"];
            $enterprisesecurityplanriskanalysysemergencydirectory = $resul[0]["enterprise"];
            $phonesecurityplanriskanalysysemergencydirectory = $resul[0]["phone"];
            $addresssecurityplanriskanalysysemergencydirectory = $resul[0]["address"];
          }     
        } else {
          # code...
        }
        */

if ($path0=="" && $path1=="" && $path2=="" && $path3=="" && $path4=="" && $path5=="" && $path6=="" && $path7=="" && $path8=="" && $path9=="" && $urloper == "save" ) {

$path0=
$path1=
$path2=
$path3=
$path4=
$path5=
$path6=
$path7=
$path8=
$path9="";
$path = "ubicaciondelpredioPL.php";

utilities::redirect($path);
        }        
        

        //----OBJETOS
        $registrobl = new registroBL($code, $name=$fullname, $idclink,$username,$email, $password, 
            $date_create,$active, $deleted);

        $personbl = new personBL($code, $name=$fullname, $idclinker,$firstname, $middlename, $lastname,$secondlastname,
            $birthdate,$description=NULL, $idgradeacademic,$idinfostatus=1,  $active, $deleted);
              
  
        $registrobl->buildLinks("analisisderiesgosPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.analisisderiesgosPL",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


        if ($id != "") {
                $arPar_registro[] = $id;
        } 
        if ($idpartyaddress != "") {
                $arPar_person[] = $idpartyaddress;
        }
        if($urloper != "save" && $idpartyaddress == ""){
                $arPar_person[] = "";
        }      
        if ($idpartyemail != "") {
                $arPar_email[] = $idpartyemail;
        }
        if($urloper != "save" && $idpartyemail == ""){
                $arPar_email[] = "";
        }   
  
         


        if ($urloper == "save" && $idpartyaddress ==  "" && $idparty!="") {
                $operaddress = "insert";
        }
        if ($urloper == "save" && $idpartyaddress != "" && $idparty!="") {
                $operaddress = "update";
        }    
    
        if ($urloper == "save" && $idpartyemail ==  "" && $idparty!="") {
                $operemail = "insert";
        }
        if ($urloper == "save" && $idpartyemail != "" && $idparty!="") {
                $operemail = "update";
        } 
    
      
        
        if($urloper=="findid" || $urloper=="find"){
            $buildArray_person="buildArray_findid";
            $buildArray="buildArray_findid";        
        }else{
            $buildArray_person="buildArray_person";
            $buildArray="buildArray";        
        }
        
        
        // crear array person
        // $registrobl->$buildArray_person($arPar_registro); 
        $personbl->$buildArray_person($arPar_person); 

        // BL.person
        // if($oper=="update" || $oper=="insert" ){        
        //     $msg .=$registrobl->executeperson($oper,$arPar_registro);   
        //     $com="select id from core.cinker where idclink='$idparty'";
        //     $id=$dbl->executeScalar($com);              
        // }else{
        //     $registrobl->execute($oper,$arPar_registro);
        // }     

        if($oper=="update" || $oper=="insert" ){        
            $msg .=$personbl->executeperson($oper,$arPar_person);   
            $com="select id from core.consultant where idparty='$idparty'";
            $id=$dbl->executeScalar($com);   

$com="SELECT core.isspinsacademic_records(NULL,NULL,'$idclinker', '$idinstituteacademic_records', '$idtitle', '$ufromacademic_records', '$untilacademic_records','$active', '$deleted')";
$dbl->executeScalar($com);
$com="SELECT core.isspinsexperience_record(NULL,NULL,'$idclinker', '$idcompany', '$idcharge', '$ufromexperience_record', '$untilexperience_record','$active', '$deleted')";
$dbl->executeScalar($com);
$com="SELECT core.isspinscertifies_records(NULL,NULL,'$idclinker', '$idinstitutecertifies_records', '$idcertifies', '$ufromcertifies_records', '$untilcertifies_records','$active', '$deleted')";
$dbl->executeScalar($com);
        }else{
            $personbl->execute($oper,$arPar_person);
        }
       
        

        
        //msj de error de las validaciones del bl
        if(($msj_error=="" && $error_msg_first_regist=="" )&&( $msg!="" || $msg_BL_error!="")
                && $urloper == "save"){
            utilities::alert($msg.$msg_BL_error);
        }
        
        $oper = $oper2 = $urloper;   
         
        if ($oper == "find" || $oper == "findByName") {
            $id = $arPar_person[0];
            $code = $arPar_person[1];
            $name = $arPar_person[2];
            $idparty = $arPar_person[3];    
            $idcard = $arPar_person[4];	
            $curp = $arPar_person[5];

            $firstname = $arPar_person[6];
            $middlename = $arPar_person[7];
            $lastname = $arPar_person[8];
            $secondlastname = $arPar_person[9];
            $registernumber = $arPar_person[10];
            $active = $arPar_person[11];
            $deleted = $arPar_person[12];          
        }     
    

       
    ?>
            <script>

 
                    $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                    $("#agregar").on('click', function(){
                        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");

                    });
                 
                    // Evento que selecciona la fila y la elimina 
                    $(document).on("click",".eliminar",function(){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                    });
                    }); 
  
                    $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                    $("#agregar2").on('click', function(){
                        $("#tabla2 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla2 tbody");

                    });
                 
                    // Evento que selecciona la fila y la elimina 
                    $(document).on("click",".eliminar",function(){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                    });
                    });                     

                    $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                    $("#agregar3").on('click', function(){
                        $("#tabla3 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla3 tbody");

                    });
                 
                    // Evento que selecciona la fila y la elimina 
                    $(document).on("click",".eliminar",function(){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                    });
                    });                       

                    $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                    $("#agregar4").on('click', function(){
                        $("#tabla4 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla4 tbody");

                    });
                 
                    // Evento que selecciona la fila y la elimina 
                    $(document).on("click",".eliminar",function(){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                    });
                    });                     

                    $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                    $("#agregar5").on('click', function(){
                        $("#tabla5 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla5 tbody");

                    });
                 
                    // Evento que selecciona la fila y la elimina 
                    $(document).on("click",".eliminar",function(){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                    });
                    });         

                    $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                    $("#agregar6").on('click', function(){
                        $("#tabla6 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla6 tbody");

                    });
                 
                    // Evento que selecciona la fila y la elimina 
                    $(document).on("click",".eliminar",function(){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                    });
                    }); 

                // FECHA 
                $("#birthdate").on("change", function() {
                    alert("ok");
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change");
                // FECHA 
                $("#ufromacademic_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#ufromexperience_record").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#ufromcertifies_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change");                 
                // FECHA 
                $("#untilacademic_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#untilexperience_record").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#untilcertifies_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change");                 

                    $(function(){
                    // Evento que selecciona la fila y la elimina 
                    $(document).on("click",".eliminarimg",function(){
                        // var parent = $(this).parents().get(1);
                        var idimg    = $(this).attr("name");
                        // var iddoc=$(this).val();
                        // alert(iddoc);
                        $.post("../exchange/ajaxDatepartyexchangeBL.php", { idimg: idimg }, function(data) {
                          // alert(data);
                            // $("#idstate").html(data);                               
                        });                           
                        $("#img-"+idimg).remove();
                        $(this).remove();
                    });
                    }); 
                
            </script>

            <!--Navegacion-->    
            <link rel="stylesheet" href="css/tinyDrawer.min.css">
            <script src="js/tinyDrawer.min.js"></script>
            <script>
                tinyDrawer();
            </script>
            <!--Fin Navegacion-->

        </head>
        <body>
                
            <FORM action="<?php echo $action;?>" method="post" name="analisisderiesgosPL" class="italsis" style="" enctype='multipart/form-data'>
    		<!--Navegacion-->
            <drawer-menu>
            <div align="center">
            <img src="images/logo-prot-civil.png" class="img-fluid" alt="" style="
                max-width: 50%;
                height: auto;"></div>
                <br>
                <div style="overflow:scroll">
                <div style="padding-left: 10px;"><a href="../party/marcolegalPL.php">01.-MARCO LEGAL</a></div>
                <div style="padding-left: 10px;"><a href="../exchange/agreementPL.php?urloper=find&pn=0&id=<?php echo $_SESSION['identerprise']; ?>">02.-PRESENTACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/justificacionPL.php">03.-JUSTIFICACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/objetivosPL.php">04.-OBJETIVOS</a></div>
                <div style="padding-left: 10px;"><a href="../party/alcancePL.php">05.-ALCANCE</a></div>
                <!--<div style="padding-left: 10px;"><a href="../party/ubicaciondelpredioPL.php">06.-UBICACIÓN DEL PREDIO</a></div>-->
                <div style="padding-left: 10px;"><a href="../party/subprogramadeprevencionPL.php">07.-SUBPROGRAMA DE PREVENCIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmorganizacionPL.php">07.1.-ORGANIZACIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmdocumentacionPL.php">07.2.-DOCUMENTACIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/analisisderiesgosPL.php">07.3.-ANÁLISIS DE RIESGOS</a></div>
                <div style="padding-left: 30px;"><a href="../party/ubicaciondelpredioPL.php">07.3.1.-UBICACIÓN DEL PREDIO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmdirectorioPL.php">07.4.-DIRECTORIO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nminventarioPL.php">07.5.-INVENTARIO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmmantenimientoPL.php">07.6.-MANTENIMIENTO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmcapacitacionPL.php">07.9.-CAPACITACIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmprogramadedifusionyconcientizacionPL.php">07.10.-PROGRAMA DE DIFUSION Y CONCIENTIZACION</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmsimulacrosPL.php">07.11.-SIMULACROS</a></div>
                <!--<div style="padding-left: 10px;"><a href="../party/senalizacionPL.php">09.-SEÑALIZACIÓN</a></div>-->
                <!--<div style="padding-left: 10px;"><a href="../party/ejerciciosysimulacrosPL.php">10.-EJERCICIOS Y SIMULACROS</a></div>-->
                <div style="padding-left: 10px;"><a href="../party/subprogramadeauxilioPL.php">8.-SUBPROGRAMA DE AUXILIOS</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmalertamientoPL.php">08.1.-ALERTAMIENTO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmplanesdeemergenciaPL.php">08.2.-PLANES DE EMERGENCIA</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmevaluaciondedanosPL.php">08.3.-EVALUACION DE DAÑOS</a></div>
                <div style="padding-left: 10px;"><a href="../party/subprogramaderecuperacionPL.php">09.-SUB PROGRAMA DE RECUPERACION</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmvueltaalanormalidadPL.php">09.1.-VUELTA A LA NORMALIDAD</a></div>

                <!--<div style="padding-left: 10px;"><a href="../party/procedimientodeemergenciaparaevacuacionPL.php">12.-PROCEDIMIENTO DE EMERGENCIA</a></div>
                <div style="padding-left: 10px;"><a href="../party/tiposdeemergenciasPL.php">13.-TIPOS DE EMERGENCIA</a></div>
                <div style="padding-left: 10px;"><a href="../party/funcionesdelequipodecombatecontraincendiosPL.php">14.-FUNCIONAMIENTO EQUIPO COMBATE</a></div>
                <div style="padding-left: 10px;"><a href="../party/subprogramaderecuperacionPL.php">15.-SUBPROGRAMA DE RECUPERACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/vueltaalanormalidadPL.php">16.-VUELTA A LA NORMALIDAD</a></div>-->
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">folder_open</i></div>
                <div style="float:left;"><a href="../party/anexoPL.php">ANEXOS</a></div>
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">account_box</i></div>
                <div style="float:left;"><a href="personPL.php?urloper=find&pn=0&id=<?php echo $_SESSION['amidconsultant']; ?>">PERFIL</a></div>
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">exit_to_app</i></div>
                <div style="float:left;"><a href="../party/exit.php">SALIR</a></div>
                </div>
            </drawer-menu>
            <!--Fin Navegacion--> 
    <?php
        $dbl=new baseBL();  
        // presentationLayer::buildFormTitle("Registro",""); 
        presentationLayer::buildIdInputHidden($id,"document.analisisderiesgosPL",$fLink);
        myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);
        myPresentationLayer::buildInputHidden("idthreats","idthreats","idthreats",$idthreats);
        myPresentationLayer::buildInputHidden("idstrategiclocations","idstrategiclocations","idstrategiclocations",$idstrategiclocations);
        myPresentationLayer::buildInputHidden("idsecurityplanriskanalysysdirectory","idsecurityplanriskanalysysdirectory","idsecurityplanriskanalysysdirectory",$idsecurityplanriskanalysysdirectory);
        myPresentationLayer::buildInputHidden("idsecurityplanriskanalysysemerncyresources","idsecurityplanriskanalysysemerncyresources","idsecurityplanriskanalysysemerncyresources",$idsecurityplanriskanalysysemerncyresources);
        myPresentationLayer::buildInputHidden("idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT","idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT","idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT",$idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT);        
        
        myPresentationLayer::buildInputHidden("idsecurityplanriskanalysysemergencydirectory","idsecurityplanriskanalysysemergencydirectory","idsecurityplanriskanalysysemergencydirectory",$idsecurityplanriskanalysysemergencydirectory);

        presentationLayer::buildFormTitle('  
    <div data-drawer-open><div style="float:left;"><i class="material-icons">menu</i></div>ANÁLISIS DE RIESGOS</div>
           ',"");         

    echo '<div style="text-align: center;">

    <!--<span style="color:black; font-size: x-large; ">ANALISIS DE RIESGOS</span>-->
    </div>';
    
    
      
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "info", "info", $info,"input textarea2","title", $rows, $cols,"width:80%");
  
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Ubicación</span>
    </div>';   
                myPresentationLayer::buildInputWithValidatorClassAndStyle(
                    "","location","location",$location,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","","width:80%");

    echo "<div style='display: flex;'>"; 
        myPresentationLayer::buildInitColumn();  


    echo '<div style="text-align: left;">

    <span style="color:black; font-size: large; ">Calles Circundantes: </span>
    </div>'; 
    echo '<br>';
                myPresentationLayer::buildInputWithValidatorClass(
                    "Al Norte:","northstreet","northstreet",$northstreet,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 

                myPresentationLayer::buildInputWithValidatorClass(
                    "Al Sur: ","southstreet","southstreet",$southstreet,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");

                myPresentationLayer::buildInputWithValidatorClass(
                    "Al Este: ","eaststreet","eaststreet",$eaststreet,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");

                myPresentationLayer::buildInputWithValidatorClass(
                    "Al Oeste: ","weststreet","weststreet",$weststreet,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");


                
                  
                                 
        presentationLayer::buildEndColumn();
        myPresentationLayer::buildInitColumn();  

    echo '<div style="text-align: left;">

    <span style="color:black; font-size: large; ">Edificios Adyacentes:  </span>
    </div>'; 
    echo '<br>';
                // myPresentationLayer::buildInputWithValidatorClass(
                //     "","lastname","lastname",$lastname,
                //     "input","title",
                //     "onkeypress","return isESLetterNoSpace(event)",
                //     "","","","",
                //     "","50","","","","",""); 

 myPresentationLayer::buildInputWithValidatorClass(
                    "","northbuilding","northbuilding",$northbuilding,
                    "input","",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","");    
 myPresentationLayer::buildInputWithValidatorClass(
                    "","southbuilding","southbuilding",$southbuilding,
                    "input","",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","");
 myPresentationLayer::buildInputWithValidatorClass(
                    "","eastbuilding","eastbuilding",$eastbuilding,
                    "input","",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","");                      
 myPresentationLayer::buildInputWithValidatorClass(
                    "","westbuilding","westbuilding",$westbuilding,
                    "input","",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","");             
        presentationLayer::buildEndColumn();
echo "</div>";

echo '<br>';

echo '<div style="">
    <span style="color:black; font-size: x-large; ">Servicios Vitales</span>
    </div>';
    echo '<br>';

    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        "", "vitalservices", "vitalservices", $vitalservices,"input textarea2","title", $rows, $cols,"width:80%");

    echo '<br>';
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Anexo de Planos de la Empresa:  </span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor seleccione su imagen, máximo 10:  </span>
    </div>'; 
    echo '<br>';    
myPresentationLayer::inputFileImg("ANALRIESG-0","ANALRIESG-0","ANALRIESG-0-".$idpartyenterprise,"ANALRIESG","show-ANALRIESG-0-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANALRIESG-0-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-ANALRIESG-0-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

// ---------------------------------- PARTE 2
echo '<br>';
echo '<br>';
echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Elementos Estructurales del Inmueble  </span>
    </div>'; 

    echo '<br>';

// myPresentationLayer::buildInitColumn();  
            $com="SELECT * FROM base.entitysubclass where code='CIMENTATIONTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Cimentación","idcimentation","idcimentation",$registrobl,
                $com, "id", "name", $idcimentation,"input","title"); 


            $com="SELECT * FROM base.entitysubclass where code='STRUCTURETYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Estructura","idstructure","idstructure",$registrobl,
                $com, "id", "name", $idstructure,"input","title"); 


            $com="SELECT * FROM base.entitysubclass where code='WALLTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Muros","idwall","idwall",$registrobl,
                $com, "id", "name", $idwall,"input","title"); 

            $com="SELECT * FROM base.entitysubclass where code='ROOFTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Techos","idroof","idroof",$registrobl,
                $com, "id", "name", $idroof,"input","title"); 


            $com="SELECT * FROM base.entitysubclass where code='FLOORTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Pisos","idfloor","idfloor",$registrobl,
                $com, "id", "name", $idfloor,"input","title"); 

            $com="SELECT * FROM base.entitysubclass where code='ENJARRETYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Enjarre","idenjarre","idenjarre",$registrobl,
                $com, "id", "name", $idenjarre,"input","title"); 

            $com="SELECT * FROM base.entitysubclass where code='ELECTRICALINSTALLTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Instalación Eléctrica","idelectricalinstall","idelectricalinstall",$registrobl,
                $com, "id", "name", $idelectricalinstall,"input","title"); 

            $com="SELECT * FROM base.entitysubclass where code='HIDROSANITARYINSTALLTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Instalación Hidro-Sanitarias","idhidrosanitaryinstall","idhidrosanitaryinstall",$registrobl,
                $com, "id", "name", $idhidrosanitaryinstall,"input","title");


            $com="SELECT * FROM base.entitysubclass where code='BATHROOMFURNITURETYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Muebles de Baño","idbathroomfurniture","idbathroomfurniture",$registrobl,
                $com, "id", "name", $idbathroomfurniture,"input","title");

            $com="SELECT * FROM base.entitysubclass where code='CANCELERIATYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Cancelaría","idcanceleria","idcanceleria",$registrobl,
                $com, "id", "name", $idcanceleria,"input","title");

            $com="SELECT * FROM base.entitysubclass where code='DOORSTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Puertas","iddoors","iddoors",$registrobl,
                $com, "id", "name", $iddoors,"input","title");


            $com="SELECT * FROM base.entitysubclass where code='STAIRSTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Escaleras","idstairs","idstairs",$registrobl,
                $com, "id", "name", $idstairs,"input","title");

// presentationLayer::buildEndColumn();
// myPresentationLayer::buildInitColumn();  

                                         
// presentationLayer::buildEndColumn();

    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Acabados:</span>
    </div>'; 

    echo '<br>';

            $com="SELECT * FROM base.entitysubclass where code='FLOORTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Pisos","idfinishesfloors","idfinishesfloors",$registrobl,
                $com, "id", "name", $idfinishesfloors,"input","title");

            $com="SELECT * FROM base.entitysubclass where code='WALLTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Muros","idfinisheswalls","idfinisheswalls",$registrobl,
                $com, "id", "name", $idfinisheswalls,"input","title");

            $com="SELECT * FROM base.entitysubclass where code='DOORSTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Puertas","idfinishesdoors","idfinishesdoors",$registrobl,
                $com, "id", "name", $idfinishesdoors,"input","title");

            $com="SELECT * FROM base.entitysubclass where code='STAIRSTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Escaleras","idfinishesstairs","idfinishesstairs",$registrobl,
                $com, "id", "name", $idfinishesstairs,"input","title");


//  ----------------------parte 3

echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Censo de población:</span>
    </div>'; 
    echo '<br>';

                myPresentationLayer::buildInputWithValidatorClass(
                    "Censo Permanente: ","permanentcensus","permanentcensus",$permanentcensus,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Censo Flotante:","floatcensus","floatcensus",$floatcensus,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Uso del suelo:</span>
    </div>'; 
    echo '<br>';

                myPresentationLayer::buildInputWithValidatorClass(
                    "Propiedad propia: ","ownproperty","ownproperty",$ownproperty,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Arrendada: ","leasedproperty","leasedproperty",$leasedproperty,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Otra: ","otherproperty","otherproperty",$otherproperty,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Información de Inmueble:</span>
    </div>'; 
    echo '<br>';

                myPresentationLayer::buildInputWithValidatorClass(
                    "Superficie de Construcción: ","surface","surface",$surface,
                    "input","title",
                    "onkeypress","return isESDecimalCheck(event,this)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Antigüedad: ","antiquity","antiquity",$antiquity,
                    "input","title",
                    "onkeypress","return isESDecimalCheck(event,this)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Numero de Niveles: ","numlevel","numlevel",$numlevel,
                    "input","title",
                    "onkeypress","return isESDecimalCheck(event,this)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Altura del Edificio: ","highbuildingsecurityplanriskanalysis","highbuildingsecurityplanriskanalysis",$highbuildingsecurityplanriskanalysis,
                    "input","title",
                    "onkeypress","return isESDecimalCheck(event,this)",
                    "","","","",
                    "","50","",$required,"","","");


    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Ubicación Geotécnica:</span>
    </div>'; 
    echo '<br>';
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "geotechnichallocation", "geotechnichallocation", 
        $geotechnichallocation,"input textarea2","title", $rows, $cols,"width:80%");

//   -------------------------- parte 4


        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");


        echo '<br>';
        echo '<div style="">
    <span style="color:black; font-size: x-large; ">Toma Municipal:</span>
    </div>';             

        myPresentationLayer::buildRadioEventClassMult(
                "", "municipaltake", "municipaltake",
                $municipaltake ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);  

                myPresentationLayer::buildInputWithValidatorClass(
                    "Número de Descargas al Drenaje: ","numdrains","numdrains",$numdrains,
                    "input","title",
                    "onkeypress","return isESNumber(event)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Numero de Cisternas: ","numsubtank","numsubtank",$numsubtank,
                    "input","title",
                    "onkeypress","return isESNumber(event)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Capacidad Total de la Cisterna: ","subtankcapacity","subtankcapacity",$subtankcapacity,
                    "input","title",
                    "onkeypress","return isESDecimalCheck(event,this)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Número de Tinacos: ","numaerialtank","numaerialtank",$numaerialtank,
                    "input","title",
                    "onkeypress","return isESNumber(event)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Capacidad de Tinaco: ","aerialtankcapacity","aerialtankcapacity",$aerialtankcapacity,
                    "input","title",
                    "onkeypress","return isESDecimalCheck(event,this)",
                    "","","","",
                    "","50","",$required,"","","");
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Tubería Galvanizada ", "galvanizedpipeline", "galvanizedpipeline",
                $galvanizedpipeline ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Tubería de Cobre", "cooperpipeline", "cooperpipeline",
                $cooperpipeline ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Bomba Electrónica ", "electricbomb", "electricbomb",
                $electricbomb ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Válvula Siamesa Contra Riesgo de Incendios ", "siamesevalve", "siamesevalve",
                $siamesevalve ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Red Hidráulica Municipal ", "municipalwaternetwork", "municipalwaternetwork",
                $municipalwaternetwork ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Drenaje Pluvial ", "riverdrain", "riverdrain",
                $riverdrain ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Instalaciones Eléctricas:</span>
    </div>';
    echo '<br>';                    
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "electricalinstall", "electricalinstall", $electricalinstall,"input textarea2",
        "title", $rows, $cols,"width:80%");

    // ----------------------- parte 5
 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Interruptor General", "generalswitch", "generalswitch",
                $generalswitch ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);  
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Interruptor Secundario ", "secundaryswitch", "secundaryswitch",
                $secundaryswitch ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);  
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Contactos y Apagadores ", "shutdowncontacts", "shutdowncontacts",
                $shutdowncontacts ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 



                myPresentationLayer::buildInputWithValidatorClass(
                    "Sistema de Alumbrado: ","lightingsystem","lightingsystem",$lightingsystem,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");


        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Planta de Luz Emergente ", "emercyelectricplant", "emercyelectricplant",
                $emercyelectricplant ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);  
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Sistema de Tierra Física ", "physicsearthsystem", "physicsearthsystem",
                $physicsearthsystem ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);  
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Equipo de Aire lavado ", "airwashequipment", "airwashequipment",
                $airwashequipment ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);  


    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Instalaciones de Tanques:</span>
    </div>'; 
    echo '<br>';

                myPresentationLayer::buildInputWithValidatorClass(
                    "Cantidad de Tanques: ","numfueltank","numfueltank",$numfueltank,
                    "input","title",
                    "onkeypress","return isESNumber(event)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Capacidad del Tanque 1: ","dieseltankcapacity","dieseltankcapacity",$dieseltankcapacity,
                    "input","title",
                    "onkeypress","return isESNumber(event)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Capacidad del Tanque 2:","magnatankcapacity","magnatankcapacity",$magnatankcapacity,
                    "input","title",
                    "onkeypress","return isESNumber(event)",
                    "","","","",
                    "","50","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Capacidad del Tanque 3:  ","premiumtankcapacity","premiumtankcapacity",$premiumtankcapacity,
                    "input","title",
                    "onkeypress","return isESNumber(event)",
                    "","","","",
                    "","50","",$required,"","","");
                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Altura del Edificio: ","email","email",$email,
                //     "input","title",
                //     "onkeypress","this.value=this.value.toLowerCase();",
                //     "","","","",
                //     "","50","",$required,"","","");
            $year= date("Y");           
            $moths= date("m");
            $day= date("d");
            myPresentationLayer::buildInputCalendarWithValidatorClass(
                "Fecha de Instalación","installdate","installdate",$installdate,
                "input date","title",$year,$moths,$day,"","","","","","",$required); 

// ----------------------parte 6
echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Bodegas y/o Almacén:</span>
    </div>';
    echo '<br>';  
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Bodegas y/o Almacén ", "warehouse", "warehouse",
                $warehouse ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Almacenamiento ", "storage", "storage",
                $storage ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 


                myPresentationLayer::buildInputWithValidatorClass(
                    "Estiba Adecuada:  ","adequatestowage","adequatestowage",$adequatestowage,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");


        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Archivo Muerto: ", "deathfile", "deathfile",
                $deathfile ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Archivo Abierto:  ", "openfile", "openfile",
                $openfile ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Energía Electrónica ", "electricpower", "electricpower",
                $electricpower ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);

                myPresentationLayer::buildInputWithValidatorClass(
                    "Instalaciones para la Basura:  ","trashinstall","trashinstall",$trashinstall,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");
                myPresentationLayer::buildInputWithValidatorClass(
                    "Tipo de Basura Recolectada:  ","trashtype","trashtype",$trashtype,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","",$required,"","","");

                    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Instalaciones de Seguridad y Protección:</span>
    </div>';  
    echo '<br>';
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Sistema de Alarma Automática contra Robo ", "automaticalarmsystem", "automaticalarmsystem",
                $automaticalarmsystem ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Sistema de Monitoreo Por TV ", "tvmonitoringsystem", "tvmonitoringsystem",
                $tvmonitoringsystem ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        myPresentationLayer::buildRadioEventClassMult(
                "Comunicación: (Teléfonos):  ", "comunication", "comunication",
                $comunication ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 

                echo '<br>';
                echo '<br>';

    echo '<div style="text-align: left;">

    <span style="color:black; font-size: x-large; ">Determinación de las Zonas de Riesgo Internas</span>
    </div>';   
    echo '<br>';  
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "internaldangerzone", "internaldangerzone", 
        $internaldangerzone,"input textarea2","title", $rows, $cols,"width:80%");


// -------------------------3era table
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen:  </span>
    </div>';
myPresentationLayer::inputFileImg("ANALRIESG-1","ANALRIESG-1","ANALRIESG-1-".$idpartyenterprise,"ANALRIESG","show-ANALRIESG-1-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANALRIESG-1-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-ANALRIESG-1-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';


//-------------------------parte 7
//
echo '<br>';
echo '<br>';

    echo '<div style="text-align: left;">
    <span style="color:black; font-size: x-large; ">Zonas de Riesgos Internos de Acuerdo con los Terminamos de Referencia</span>
    </div>'; 
    echo '<br>';
echo '

<table align="center">
    <tr align="center">
        <td>
            <SPAN>Elementos</SPAN>      
        </td>
        <td>
            <SPAN>Si</SPAN>      
        </td>
        <td>
            <SPAN>No</SPAN>      
        </td>
        <td>
            <SPAN>Cortante</SPAN>      
        </td>
        <td>
            <SPAN>Retracción</SPAN>      
        </td>
        <td>
            <SPAN>Flameo</SPAN>      
        </td>
        <td>
            <SPAN>Temperatura</SPAN>      
        </td>
        <td>
            <SPAN>Corrosión</SPAN>      
        </td>
        <td>
            <SPAN>Compexión</SPAN>      
        </td>
        <td>
            <SPAN>Flexión</SPAN>      
        </td>
        <td>
            <SPAN>Pandeo</SPAN>      
        </td>
        <td>
            <SPAN>Colapso</SPAN>      
        </td>
        <td>
            <SPAN>Inclinación</SPAN>      
        </td>
        <td>
            <SPAN>Asentamiento</SPAN>      
        </td>
        <td>
            <SPAN>Agretamiento</SPAN>      
        </td>
        <td>
            <SPAN>Otros</SPAN>      
        </td>
    </tr>
    <tr align="center">       
        <td>
            <SPAN>Cimentación</SPAN>      
        </td>
        <td align="center">
            <INPUT  type="radio" '
            . ' name="cimentation" id="" '
            . ' value="Y" '
; if ($cimentation == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td align="center">
            <INPUT  type="radio" '
            . ' name="cimentation" id="" '
            . ' value="N" '
; if ($cimentation == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationcutting" id="" '
            . ' value="Y" '
; if ($cimentationcutting == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationretraction" id="" '
            . ' value="Y" '
; if ($cimentationretraction == "Y"){ echo ' checked '; }        

         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationflaming" id="" '
            . ' value="Y" '
; if ($cimentationflaming == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationtemperature" id="" '
            . ' value="Y" '
; if ($cimentationtemperature == "Y"){ echo ' checked '; }        

         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationcorrosive" id="" '
            . ' value="Y" '

; if ($cimentationcorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationcomplexion" id="" '
            . ' value="Y" '

; if ($cimentationcomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationflexion" id="" '
            . ' value="Y" '

; if ($cimentationflexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationpanding" id="" '
            . ' value="Y" '

; if ($cimentationpanding == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationcollapsing" id="" '
            . ' value="Y" '

; if ($cimentationcollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationinclination" id="" '
            . ' value="Y" '

; if ($cimentationinclination == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationsettlement" id="" '
            . ' value="Y" '

; if ($cimentationsettlement == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationcraking" id="" '
            . ' value="Y" '

; if ($cimentationcraking == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="cimentationothers" id="" '
            . ' value="Y" '

; if ($cimentationothers == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>

    </tr>
    <tr align="center">       
        <td>
            <SPAN>Columnas</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="column" id="" '
            . ' value="Y" '

; if ($column == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="column" id="" '
            . ' value="N" '

; if ($column == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columncutting" id="" '
            . ' value="Y" '

; if ($columncutting == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columnretraction" id="" '
            . ' value="Y" '

; if ($columnretraction == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columnflaming" id="" '
            . ' value="Y" '

; if ($columnflaming == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columntemperature" id="" '
            . ' value="Y" '

; if ($columntemperature == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columncorrosive" id="" '
            . ' value="Y" '

; if ($columncorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columncomplexion" id="" '
            . ' value="Y" '

; if ($columncomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columnflexion" id="" '
            . ' value="Y" '

; if ($columnflexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columnpanding" id="" '
            . ' value="Y" '

; if ($columnpanding == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columncollapsing" id="" '
            . ' value="Y" '

; if ($columncollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columninclination" id="" '
            . ' value="Y" '

; if ($columninclination == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columnsettlement" id="" '
            . ' value="Y" '

; if ($columnsettlement == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columncraking" id="" '
            . ' value="Y" '

; if ($columncraking == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="columnothers" id="" '
            . ' value="Y" '

; if ($columnothers == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>

    </tr>
    <tr align="center">       
        <td>
            <SPAN>Muros</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wall" id="" '
            . ' value="Y" '

; if ($wall == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wall" id="" '
            . ' value="N" '

; if ($wall == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallcutting" id="" '
            . ' value="Y" '

; if ($wallcutting == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallretraction" id="" '
            . ' value="Y" '

; if ($wallretraction == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallflaming" id="" '
            . ' value="Y" '

; if ($wallflaming == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="walltemperature" id="" '
            . ' value="Y" '

; if ($walltemperature == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallcorrosive" id="" '
            . ' value="Y" '

; if ($wallcorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallcomplexion" id="" '
            . ' value="Y" '

; if ($wallcomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallflexion" id="" '
            . ' value="Y" '

; if ($wallflexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallpanding" id="" '
            . ' value="Y" '

; if ($wallpanding == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallcollapsing" id="" '
            . ' value="Y" '

; if ($wallcollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallinclination" id="" '
            . ' value="Y" '

; if ($wallinclination == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallsettlement" id="" '
            . ' value="Y" '

; if ($wallsettlement == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallcraking" id="" '
            . ' value="Y" '

; if ($wallcraking == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="wallothers" id="" '
            . ' value="Y" '

; if ($wallothers == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td>
            <SPAN>Techos</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roof" id="" '
            . ' value="Y" '

; if ($roof == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roof" id="" '
            . ' value="N" '

; if ($roof == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofcutting" id="" '
            . ' value="Y" '

; if ($roofcutting == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofretraction" id="" '
            . ' value="Y" '

; if ($roofretraction == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofflaming" id="" '
            . ' value="Y" '

; if ($roofflaming == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="rooftemperature" id="" '
            . ' value="Y" '

; if ($rooftemperature == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofcorrosive" id="" '
            . ' value="Y" '

; if ($roofcorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofcomplexion" id="" '
            . ' value="Y" '

; if ($roofcomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofflexion" id="" '
            . ' value="Y" '

; if ($roofflexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofpanding" id="" '
            . ' value="Y" '

; if ($roofpanding == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofcollapsing" id="" '
            . ' value="Y" '

; if ($roofcollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofinclination" id="" '
            . ' value="Y" '

; if ($roofinclination == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofsettlement" id="" '
            . ' value="Y" '

; if ($roofsettlement == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofcraking" id="" '
            . ' value="Y" '

; if ($roofcraking == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="roofothers" id="" '
            . ' value="Y" '

; if ($roofothers == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td>
            <SPAN>Escaleras</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairs" id="" '
            . ' value="Y" '

; if ($stairs == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairs" id="" '
            . ' value="N" '

; if ($stairs == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairscutting" id="" '
            . ' value="Y" '

; if ($stairscutting == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairsretraction" id="" '
            . ' value="Y" '

; if ($stairsretraction == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairsflaming" id="" '
            . ' value="Y" '

; if ($stairsflaming == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairstemperature" id="" '
            . ' value="Y" '

; if ($stairstemperature == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairscorrosive" id="" '
            . ' value="Y" '

; if ($stairscorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairscomplexion" id="" '
            . ' value="Y" '

; if ($stairscomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairsflexion" id="" '
            . ' value="Y" '

; if ($stairsflexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairspanding" id="" '
            . ' value="Y" '

; if ($stairspanding == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairscollapsing" id="" '
            . ' value="Y" '

; if ($stairscollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairsinclination" id="" '
            . ' value="Y" '

; if ($stairsinclination == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairssettlement" id="" '
            . ' value="Y" '

; if ($stairssettlement == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairscraking" id="" '
            . ' value="Y" '

; if ($stairscraking == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="stairsothers" id="" '
            . ' value="Y" '

; if ($stairsothers == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>

    </tr>
    <tr align="center">       
        <td>
            <SPAN>Trabes</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabes" id="" '
            . ' value="Y" '

; if ($trabes == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabes" id="" '
            . ' value="N" '

; if ($trabes == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabescutting" id="" '
            . ' value="Y" '

; if ($trabescutting == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabesretraction" id="" '
            . ' value="Y" '

; if ($trabesretraction == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabesflaming" id="" '
            . ' value="Y" '

; if ($trabesflaming == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabestemperature" id="" '
            . ' value="Y" '

; if ($trabestemperature == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabescorrosive" id="" '
            . ' value="Y" '

; if ($trabescorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabescomplexion" id="" '
            . ' value="Y" '

; if ($trabescomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabesflexion" id="" '
            . ' value="Y" '

; if ($trabesflexion == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabespanding" id="" '
            . ' value="Y" '

; if ($trabespanding == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabescollapsing" id="" '
            . ' value="Y" '

; if ($trabescollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabesinclination" id="" '
            . ' value="Y" '

; if ($trabesinclination == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabessettlement" id="" '
            . ' value="Y" '

; if ($trabessettlement == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabescraking" id="" '
            . ' value="Y" '

; if ($trabescraking == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="trabesothers" id="" '
            . ' value="Y" '

; if ($trabesothers == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>

    </tr>

</table>

'; 

// ----------------------parte 8


echo '  

    <table>
        <tr align="center">
            <td>
                <span></span>
            </td>
            <td>
                <span>Alto</span>
            </td>
            <td>
                <span>Regular</span>
            </td>
            <td>
                <span>Bajo</span>
            </td>
            <td>
                <span>Inexistente</span>
            </td>
        </tr>
        <tr align="center">       
        <td align="left">
            <SPAN>Daño Estructural</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="structuraldamagehigh" id="" '
            . ' value="Y" '

; if ($structuraldamagehigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="structuraldamagemedium" id="" '
            . ' value="Y" '

; if ($structuraldamagemedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="structuraldamagelow" id="" '
            . ' value="Y" '

; if ($structuraldamagelow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="structuraldamagenonexistent" id="" '
            . ' value="Y" '

; if ($structuraldamagenonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
       
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Colapso</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="collapsehigh" id="" '
            . ' value="Y" '

; if ($collapsehigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="collapsemedium" id="" '
            . ' value="Y" '

; if ($collapsemedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="collapselow" id="" '
            . ' value="Y" '

; if ($collapselow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="collapsenonexistent" id="" '
            . ' value="Y" '

; if ($collapsenonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Daño en acabados</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="finishdamagehigh" id="" '
            . ' value="Y" '

; if ($finishdamagehigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="finishdamagemedium" id="" '
            . ' value="Y" '

; if ($finishdamagemedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="finishdamagelow" id="" '
            . ' value="Y" '

; if ($finishdamagelow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="finishdamagenonexistent" id="" '
            . ' value="Y" '

; if ($finishdamagenonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Daño severo en muros no estructurales, balcones, escaleras</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="severedamagehigh" id="" '
            . ' value="Y" '

; if ($severedamagehigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="severedamagemedium" id="" '
            . ' value="Y" '

; if ($severedamagemedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="severedamagelow" id="" '
            . ' value="Y" '

; if ($severedamagelow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="severedamagenonexistent" id="" '
            . ' value="Y" '

; if ($severedamagenonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Hundimiento</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="sinkinghighsinkinghigh" id="" '
            . ' value="Y" '

; if ($sinkinghighsinkinghigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="sinkingmediumsinkinghigh" id="" '
            . ' value="Y" '

; if ($sinkingmediumsinkinghigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="sinkinglowsinkinghigh" id="" '
            . ' value="Y" '

; if ($sinkinglowsinkinghigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="sinkingnonexistentsinkinghigh" id="" '
            . ' value="Y" '

; if ($sinkingnonexistentsinkinghigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Inclinación notoria de la edificación o de algun entrepiso</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="inclinationhigh" id="" '
            . ' value="Y" '

; if ($inclinationhigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="inclinationmedium" id="" '
            . ' value="Y" '

; if ($inclinationmedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="inclinationlow" id="" '
            . ' value="Y" '

; if ($inclinationlow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="inclinationnonexistent" id="" '
            . ' value="Y" '

; if ($inclinationnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Hinundación</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="inundationhigh" id="" '
            . ' value="Y" '

; if ($inundationhigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="inundationmedium" id="" '
            . ' value="Y" '

; if ($inundationmedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="inundationlow" id="" '
            . ' value="Y" '

; if ($inundationlow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="inundationnonexistent" id="" '
            . ' value="Y" '

; if ($inundationnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Incedio</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="firehighsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($firehighsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="firemediumsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($firemediumsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="firelowsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($firelowsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="firenonexistentsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($firenonexistentsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Explosión</SPAN>      
        </td>        
        <td>
            <INPUT  type="radio" '
            . ' name="explosionhigh" id="" '
            . ' value="Y" '

; if ($explosionhigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="explosionmedium" id="" '
            . ' value="Y" '

; if ($explosionmedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="explosionlow" id="" '
            . ' value="Y" '

; if ($explosionlow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="explosionnonexistent" id="" '
            . ' value="Y" '

; if ($explosionnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Fuga de gas</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="gasleakhigh" id="" '
            . ' value="Y" '

; if ($gasleakhigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="gasleakmedium" id="" '
            . ' value="Y" '

; if ($gasleakmedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="gasleaklow" id="" '
            . ' value="Y" '

; if ($gasleaklow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="gasleaknonexistent" id="" '
            . ' value="Y" '

; if ($gasleaknonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Derrame de materiales peligrosos</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="spillhazardousmaterialshigh" id="" '
            . ' value="Y" '

; if ($spillhazardousmaterialshigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="spillhazardousmaterialsmedium" id="" '
            . ' value="Y" '

; if ($spillhazardousmaterialsmedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="spillhazardousmaterialslow" id="" '
            . ' value="Y" '

; if ($spillhazardousmaterialslow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="spillhazardousmaterialsnonexistent" id="" '
            . ' value="Y" '

; if ($spillhazardousmaterialsnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Contaminación</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="pollutionhigh" id="" '
            . ' value="Y" '

; if ($pollutionhigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="pollutionmedium" id="" '
            . ' value="Y" '

; if ($pollutionmedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="pollutionlow" id="" '
            . ' value="Y" '

; if ($pollutionlow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="pollutionnonexistent" id="" '
            . ' value="Y" '

; if ($pollutionnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Epidemias</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="epidemichighsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($epidemichighsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="epidemicmediumsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($epidemicmediumsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="epidemiclowsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($epidemiclowsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="epidemicnonexistentsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($epidemicnonexistentsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>
    <tr align="center">       
        <td align="left">
            <SPAN>Amenazas de bombas</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="bombthreathigh" id="" '
            . ' value="Y" '

; if ($bombthreathigh == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="bombthreatmedium" id="" '
            . ' value="Y" '

; if ($bombthreatmedium == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="bombthreatlow" id="" '
            . ' value="Y" '

; if ($bombthreatlow == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="bombthreatnonexistent" id="" '
            . ' value="Y" '

; if ($bombthreatnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
    </tr>    
    </table>
';

// ------------------parte 9

echo '<br>';
echo '<br>';
 echo '<div style="text-align: left;">

    <!--<span style="color:black; font-size: x-large; ">¿Hay Muros con Castillos Separados con mas de 3m y Altura superior a 3.20m?</span>-->
    <span style="color:black; font-size: x-large; ">Análisis de Riesgos Externos</span>
    </div>';
    echo '<br>';
echo '  

    <table>
        <tr>
            <td>
                <span></span>
            </td>
            <td>
                <span>Si</span>
            </td>
            <td>
                <span>No</span>
            </td>
        </tr>
        <tr>       
        <td>
            <SPAN>Torres con Cable de Alta Tensión</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="highvoltagetower" id="" '
            . ' value="Y" '

; if ($highvoltagetower == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="highvoltagetower" id="" '
            . ' value="N" '

; if ($highvoltagetower == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Postes de Energía Eléctrica</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="electricpowerpoles" id="" '
            . ' value="Y" '

; if ($electricpowerpoles == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="electricpowerpoles" id="" '
            . ' value="N" '

; if ($electricpowerpoles == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Transformadores o Subestaciones Eléctricas</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="electrictransformers" id="" '
            . ' value="Y" '

; if ($electrictransformers == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="electrictransformers" id="" '
            . ' value="N" '

; if ($electrictransformers == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Alcantarillas en Mal Estado</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="damagesewers" id="" '
            . ' value="Y" '

; if ($damagesewers == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="damagesewers" id="" '
            . ' value="N" '

; if ($damagesewers == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Banquetas Desniveladas</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="damagesidewalks" id="" '
            . ' value="Y" '

; if ($damagesidewalks == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="damagesidewalks" id="" '
            . ' value="N" '

; if ($damagesidewalks == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Depósitos Elevados de Agua o Combustible</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="hightanks" id="" '
            . ' value="Y" '

; if ($hightanks == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="hightanks" id="" '
            . ' value="N" '

; if ($hightanks == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Arboles Grandes o Viejos que puedan Caer</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="bigtrees" id="" '
            . ' value="Y" '

; if ($bigtrees == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="bigtrees" id="" '
            . ' value="N" '

; if ($bigtrees == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Pasos a Desnivel</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="overpasses" id="" '
            . ' value="Y" '

; if ($overpasses == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="overpasses" id="" '
            . ' value="N" '

; if ($overpasses == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Puentes Peatonales</SPAN>      
        </td>        
        <td>
            <INPUT  type="radio" '
            . ' name="pedestrianbridge" id="" '
            . ' value="Y" '

; if ($pedestrianbridge == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="pedestrianbridge" id="" '
            . ' value="N" '

; if ($pedestrianbridge == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Alto Fluido Vehicular</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="muchtraffic" id="" '
            . ' value="Y" '

; if ($muchtraffic == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="muchtraffic" id="" '
            . ' value="N" '

; if ($muchtraffic == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Edificios Colindantes o Cercanos Muy Alto</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="highbuilding" id="" '
            . ' value="Y" '

; if ($highbuilding == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="highbuilding" id="" '
            . ' value="N" '

; if ($highbuilding == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Anuncios Espectaculares</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="bigannouncements" id="" '
            . ' value="Y" '

; if ($bigannouncements == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="bigannouncements" id="" '
            . ' value="N" '

; if ($bigannouncements == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Marquesinas o Pretiles Peligrosos</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="dangercanopies" id="" '
            . ' value="Y" '

; if ($dangercanopies == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="dangercanopies" id="" '
            . ' value="N" '

; if ($dangercanopies == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Inclinación Notoria en Inmuebles Colindantes</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="notoriouosinclination" id="" '
            . ' value="Y" '

; if ($notoriouosinclination == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="notoriouosinclination" id="" '
            . ' value="N" '

; if ($notoriouosinclination == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Calles Cerradas a la Circulatorio</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="closestreets" id="" '
            . ' value="Y" '

; if ($closestreets == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="closestreets" id="" '
            . ' value="N" '

; if ($closestreets == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Calles con pedientes pronunciadas</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="slopingstreets" id="" '
            . ' value="Y" '

; if ($slopingstreets == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="slopingstreets" id="" '
            . ' value="N" '

; if ($slopingstreets == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>     
    <tr>       
        <td>
            <SPAN>Industrias o Negocios de o Sustancias químicas Peligrosos, gasolineras</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="industriesorbussiness" id="" '
            . ' value="Y" '

; if ($industriesorbussiness == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="industriesorbussiness" id="" '
            . ' value="N" '

; if ($industriesorbussiness == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Instalación de Pemex (oleoducto, gasoducto)</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="pemexinstall" id="" '
            . ' value="Y" '

; if ($pemexinstall == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="pemexinstall" id="" '
            . ' value="N" '

; if ($pemexinstall == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>negocios que manejas sustancias peligrosas en la vía publica</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="chemicalinsdustries" id="" '
            . ' value="Y" '

; if ($chemicalinsdustries == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="chemicalinsdustries" id="" '
            . ' value="N" '

; if ($chemicalinsdustries == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Industrias</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="industries" id="" '
            . ' value="Y" '

; if ($industries == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="industries" id="" '
            . ' value="N" '

; if ($industries == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Escuelas</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="schools" id="" '
            . ' value="Y" '

; if ($schools == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="schools" id="" '
            . ' value="N" '

; if ($schools == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Hospitales</SPAN>      
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="hospitals" id="" '
            . ' value="Y" '

; if ($hospitals == "Y"){ echo ' checked '; }        
         echo ' class="radiosT">'
            .'</INPUT>        
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="hospitals" id="" '
            . ' value="N" '

; if ($hospitals == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>     
    </table>
';
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "infonaturalthreats", "infonaturalthreats", 
        $infonaturalthreats,"input textarea2","title", $rows, $cols,"width:80%");

echo '  

<table>
    <tr>
        <td>
            <span>Grupo</span>
        </td>
        <td>
            <span>Fenómeno Perturbador</span>
        </td>
        <td>
            <table>
                <tr  align="center">
                    <span>Si</span>
                </tr>
                <tr>
                    <td>
                        <span>Casi nula</span>
                    </td>
                    <td>
                        <span>Baja</span>
                    </td>
                    <td>
                        <span>Media</span>
                    </td>
                    <td>
                        <span>Alta</span>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <span>No</span>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Sismos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="earthquakenull" id="1-1" '
                        . ' value="Y" '
            
                    ; if ($earthquakenull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="earthquakelow" id="2-1" '
                        . ' value="Y" '
            
                    ; if ($earthquakelow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="earthquakemedium" id="3-1" '
                        . ' value="Y" '
            
                    ; if ($earthquakemedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="earthquakehigh" id="4-1" '
                        . ' value="Y" '
            
                    ; if ($earthquakehigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="earthquakeno" id="1" '
            . ' value="N" '

; if ($earthquakeno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr >
        <td>
        </td>
        <td>
            <span>Vulcanismo</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="volcanismnull" id="1-2" '
                        . ' value="Y" '
            
                    ; if ($volcanismnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="volcanismlow" id="2-2" '
                        . ' value="Y" '
            
                    ; if ($volcanismlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="volcanismmedium" id="3-2" '
                        . ' value="Y" '
            
                    ; if ($volcanismmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="volcanismhigh" id="4-2" '
                        . ' value="Y" '
            
                    ; if ($volcanismhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="volcanismno" id="2" '
            . ' value="N" '

; if ($volcanismno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Colapso de sueldos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr  align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="soilcollapsenull" id="1-3" '
                        . ' value="Y" '
            
                    ; if ($soilcollapsenull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="soilcollapselow" id="2-3" '
                        . ' value="Y" '
            
                    ; if ($soilcollapselow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="soilcollapsemedium" id="3-3" '
                        . ' value="Y" '
            
                    ; if ($soilcollapsemedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="soilcollapsehigh" id="4-3" '
                        . ' value="Y" '
            
                    ; if ($soilcollapsehigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="soilcollapseno" id="3" '
            . ' value="N" '

; if ($soilcollapseno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Hundimiento</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="sinkingnull" id="1-4" '
                        . ' value="Y" '
            
                    ; if ($sinkingnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="sinkinglow" id="2-4" '
                        . ' value="Y" '
            
                    ; if ($sinkinglow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="sinkingmedium" id="3-4" '
                        . ' value="Y" '
            
                    ; if ($sinkingmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="sinkinghigh" id="4-4" '
                        . ' value="Y" '
            
                    ; if ($sinkinghigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="sinkingno" id="4" '
            . ' value="N" '

; if ($sinkingno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Agretamiento de suelo</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr  align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="crackingnull" id="1-5" '
                        . ' value="Y" '
            
                    ; if ($crackingnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="crackinglow" id="2-5" '
                        . ' value="Y" '
            
                    ; if ($crackinglow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="crackingmedium" id="3-5" '
                        . ' value="Y" '
            
                    ; if ($crackingmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="crackinghigh" id="4-5" '
                        . ' value="Y" '
            
                    ; if ($crackinghigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="crackingno" id="5" '
            . ' value="N" '

; if ($crackingno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Flujo de lodo</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr  align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="mudnull" id="1-6" '
                        . ' value="Y" '
            
                    ; if ($mudnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="mudlow" id="2-6" '
                        . ' value="Y" '
            
                    ; if ($mudlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="mudmedium" id="3-6" '
                        . ' value="Y" '
            
                    ; if ($mudmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="mudhigh" id="4-6" '
                        . ' value="Y" '
            
                    ; if ($mudhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="mudno" id="6" '
            . ' value="N" '

; if ($mudno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Deslizamientos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr  align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="landslidesnull" id="1-7" '
                        . ' value="Y" '
            
                    ; if ($landslidesnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="landslideslow" id="2-7" '
                        . ' value="Y" '
            
                    ; if ($landslideslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="landslidesmedium" id="3-7" '
                        . ' value="Y" '
            
                    ; if ($landslidesmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="landslideshigh" id="4-7" '
                        . ' value="Y" '
            
                    ; if ($landslideshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="landslidesno" id="7" '
            . ' value="N" '

; if ($landslidesno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Lluvia ácida</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="acidrainnull" id="1-8" '
                        . ' value="Y" '
            
                    ; if ($acidrainnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="acidrainlow" id="2-8" '
                        . ' value="Y" '
            
                    ; if ($acidrainlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="acidrainmedium" id="3-8" '
                        . ' value="Y" '
            
                    ; if ($acidrainmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="acidrainhigh" id="4-8" '
                        . ' value="Y" '
            
                    ; if ($acidrainhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="acidrainno" id="8" '
            . ' value="N" '

; if ($acidrainno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Lluvias Torrenciales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="pouringrainnull" id="1-9" '
                        . ' value="Y" '
            
                    ; if ($pouringrainnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="pouringrainlow" id="2-9" '
                        . ' value="Y" '
            
                    ; if ($pouringrainlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="pouringrainmedium" id="3-9" '
                        . ' value="Y" '
            
                    ; if ($pouringrainmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="pouringrainhigh" id="4-9" '
                        . ' value="Y" '
            
                    ; if ($pouringrainhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="pouringrainno" id="9" '
            . ' value="N" '

; if ($pouringrainno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Tormentas tropicales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr  align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="tropicalstormnull" id="1-10" '
                        . ' value="Y" '
            
                    ; if ($tropicalstormnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="tropicalstormlow" id="2-10" '
                        . ' value="Y" '
            
                    ; if ($tropicalstormlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="tropicalstormmedium" id="3-10" '
                        . ' value="Y" '
            
                    ; if ($tropicalstormmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="tropicalstormhigh" id="4-10" '
                        . ' value="Y" '
            
                    ; if ($tropicalstormhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="tropicalstormno" id="10" '
            . ' value="N" '

; if ($tropicalstormno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Inundaciones</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr  align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="floodingnull" id="1-11" '
                        . ' value="Y" '
            
                    ; if ($floodingnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="floodinglow" id="2-11" '
                        . ' value="Y" '
            
                    ; if ($floodinglow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="floodingmedium" id="3-11" '
                        . ' value="Y" '
            
                    ; if ($floodingmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="floodinghigh" id="4-11" '
                        . ' value="Y" '
            
                    ; if ($floodinghigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="floodingno" id="11" '
            . ' value="N" '

; if ($floodingno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Huracanes</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr  align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="hurricanesnull" id="1-12" '
                        . ' value="Y" '
            
                    ; if ($hurricanesnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hurricaneslow" id="2-12" '
                        . ' value="Y" '
            
                    ; if ($hurricaneslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hurricanesmedium" id="3-12" '
                        . ' value="Y" '
            
                    ; if ($hurricanesmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hurricaneshigh" id="4-12" '
                        . ' value="Y" '
            
                    ; if ($hurricaneshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="hurricanesno" id="12" '
            . ' value="N" '

; if ($hurricanesno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Tormentas Electricas</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr  align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="electricstormnull" id="1-13" '
                        . ' value="Y" '
            
                    ; if ($electricstormnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="electricstormlow" id="2-13" '
                        . ' value="Y" '
            
                    ; if ($electricstormlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="electricstormmedium" id="3-13" '
                        . ' value="Y" '
            
                    ; if ($electricstormmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="electricstormhigh" id="4-13" '
                        . ' value="Y" '
            
                    ; if ($electricstormhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="electricstormno" id="13" '
            . ' value="N" '

; if ($electricstormno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Temperaturas Extremas</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="extremetemperaturesnull" id="1-14" '
                        . ' value="Y" '
            
                    ; if ($extremetemperaturesnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="extremetemperatureslow" id="2-14" '
                        . ' value="Y" '
            
                    ; if ($extremetemperatureslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="extremetemperaturesmedium" id="3-14" '
                        . ' value="Y" '
            
                    ; if ($extremetemperaturesmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="extremetemperatureshigh" id="4-14" '
                        . ' value="Y" '
            
                    ; if ($extremetemperatureshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="extremetemperaturesno" id="14" '
            . ' value="N" '

; if ($extremetemperaturesno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Trombas</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="thrombusnull" id="1-15" '
                        . ' value="Y" '
            
                    ; if ($thrombusnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="thrombuslow" id="2-15" '
                        . ' value="Y" '
            
                    ; if ($thrombuslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="thrombusmedium" id="3-15" '
                        . ' value="Y" '
            
                    ; if ($thrombusmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="thrombushigh" id="4-15" '
                        . ' value="Y" '
            
                    ; if ($thrombushigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="thrombusno" id="15" '
            . ' value="N" '

; if ($thrombusno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Granizadas</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="hailstormnull" id="1-16" '
                        . ' value="Y" '
            
                    ; if ($hailstormnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hailstormlow" id="2-16" '
                        . ' value="Y" '
            
                    ; if ($hailstormlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hailstormmedium" id="3-16" '
                        . ' value="Y" '
            
                    ; if ($hailstormmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hailstormhigh" id="4-16" '
                        . ' value="Y" '
            
                    ; if ($hailstormhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="hailstormno" id="16" '
            . ' value="N" '

; if ($hailstormno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Vientos fuertes</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="strongwindsnull" id="1-17" '
                        . ' value="Y" '
            
                    ; if ($strongwindsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="strongwindslow" id="2-17" '
                        . ' value="Y" '
            
                    ; if ($strongwindslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="strongwindsmedium" id="3-17" '
                        . ' value="Y" '
            
                    ; if ($strongwindsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="strongwindshigh" id="4-17" '
                        . ' value="Y" '
            
                    ; if ($strongwindshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="strongwindsno" id="17" '
            . ' value="N" '

; if ($strongwindsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Sequias</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="droughtsnull" id="1-18" '
                        . ' value="Y" '
            
                    ; if ($droughtsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="droughtslow" id="2-18" '
                        . ' value="Y" '
            
                    ; if ($droughtslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="droughtsmedium" id="3-18" '
                        . ' value="Y" '
            
                    ; if ($droughtsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="droughtshigh" id="4-18" '
                        . ' value="Y" '
            
                    ; if ($droughtshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="droughtsno" id="18" '
            . ' value="N" '

; if ($droughtsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Incendios</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="firenull" id="1-19" '
                        . ' value="Y" '
            
                    ; if ($firenull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="firelow" id="2-19" '
                        . ' value="Y" '
            
                    ; if ($firelow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="firemedium" id="3-19" '
                        . ' value="Y" '
            
                    ; if ($firemedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="firehigh" id="4-19" '
                        . ' value="Y" '
            
                    ; if ($firehigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="fireno" id="19" '
            . ' value="N" '

; if ($fireno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Explosiones</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="explosionsnull" id="1-20" '
                        . ' value="Y" '
            
                    ; if ($explosionsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="explosionslow" id="2-20" '
                        . ' value="Y" '
            
                    ; if ($explosionslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="explosionsmedium" id="3-20" '
                        . ' value="Y" '
            
                    ; if ($explosionsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="explosionshigh" id="4-20" '
                        . ' value="Y" '
            
                    ; if ($explosionshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="explosionsno" id="20" '
            . ' value="N" '

; if ($explosionsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Fugas y derrames de productos quimicos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="chemicalspillnull" id="1-21" '
                        . ' value="Y" '
            
                    ; if ($chemicalspillnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="chemicalspilllow" id="2-21" '
                        . ' value="Y" '
            
                    ; if ($chemicalspilllow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="chemicalspillmedium" id="3-21" '
                        . ' value="Y" '
            
                    ; if ($chemicalspillmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="chemicalspillhigh" id="4-21" '
                        . ' value="Y" '
            
                    ; if ($chemicalspillhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="chemicalspillno" id="21" '
            . ' value="N" '

; if ($chemicalspillno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Radiaciones</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="radiationsnull" id="1-22" '
                        . ' value="Y" '
            
                    ; if ($radiationsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="radiationslow" id="2-22" '
                        . ' value="Y" '
            
                    ; if ($radiationslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="radiationsmedium" id="3-22" '
                        . ' value="Y" '
            
                    ; if ($radiationsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="radiationshigh" id="4-22" '
                        . ' value="Y" '
            
                    ; if ($radiationshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="radiationsno" id="22" '
            . ' value="N" '

; if ($radiationsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Contaminación Ambiental</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="enviromentalpollutionsnull" id="1-23" '
                        . ' value="Y" '
            
                    ; if ($enviromentalpollutionsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="enviromentalpollutionslow" id="2-23" '
                        . ' value="Y" '
            
                    ; if ($enviromentalpollutionslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="enviromentalpollutionsmedium" id="3-23" '
                        . ' value="Y" '
            
                    ; if ($enviromentalpollutionsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="enviromentalpollutionshigh" id="4-23" '
                        . ' value="Y" '
            
                    ; if ($enviromentalpollutionshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="enviromentalpollutionsno" id="23" '
            . ' value="N" '

; if ($enviromentalpollutionsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Desertificacion</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="desertificationnull" id="1-24" '
                        . ' value="Y" '
            
                    ; if ($desertificationnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="desertificationlow" id="2-24" '
                        . ' value="Y" '
            
                    ; if ($desertificationlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="desertificationmedium" id="3-24" '
                        . ' value="Y" '
            
                    ; if ($desertificationmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="desertificationhigh" id="4-24" '
                        . ' value="Y" '
            
                    ; if ($desertificationhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="desertificationno" id="24" '
            . ' value="N" '

; if ($desertificationno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Epidemias en humanos y/o animales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="epidemicnull" id="1-25" '
                        . ' value="Y" '
            
                    ; if ($epidemicnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="epidemiclow" id="2-25" '
                        . ' value="Y" '
            
                    ; if ($epidemiclow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="epidemicmedium" id="3-25" '
                        . ' value="Y" '
            
                    ; if ($epidemicmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="epidemichigh" id="4-25" '
                        . ' value="Y" '
            
                    ; if ($epidemichigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="epidemicno" id="25" '
            . ' value="N" '

; if ($epidemicno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Intoxicacion en humanos y/o animales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="intoxicationnull" id="1-26" '
                        . ' value="Y" '
            
                    ; if ($intoxicationnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="intoxicationlow" id="2-26" '
                        . ' value="Y" '
            
                    ; if ($intoxicationlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="intoxicationmedium" id="3-26" '
                        . ' value="Y" '
            
                    ; if ($intoxicationmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="intoxicationhigh" id="4-26" '
                        . ' value="Y" '
            
                    ; if ($intoxicationhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="intoxicationno" id="26" '
            . ' value="N" '

; if ($intoxicationno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Envenenamiento en humanos y/o animales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="poisoningnull" id="1-27" '
                        . ' value="Y" '
            
                    ; if ($poisoningnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="poisoninglow" id="2-27" '
                        . ' value="Y" '
            
                    ; if ($poisoninglow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="poisoningmedium" id="3-27" '
                        . ' value="Y" '
            
                    ; if ($poisoningmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="poisoninghigh" id="4-27" '
                        . ' value="Y" '
            
                    ; if ($poisoninghigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="poisoningno" id="27" '
            . ' value="N" '

; if ($poisoningno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Asaltos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="assaultsnull" id="1-28" '
                        . ' value="Y" '
            
                    ; if ($assaultsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="assaultslow" id="2-28" '
                        . ' value="Y" '
            
                    ; if ($assaultslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="assaultsmedium" id="3-28" '
                        . ' value="Y" '
            
                    ; if ($assaultsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="assaultshigh" id="4-28" '
                        . ' value="Y" '
            
                    ; if ($assaultshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="assaultsno" id="28" '
            . ' value="N" '

; if ($assaultsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Interrupcion de servicios basicos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="interruptionbasicservicesnull" id="1-29" '
                        . ' value="Y" '
            
                    ; if ($interruptionbasicservicesnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="interruptionbasicserviceslow" id="2-29" '
                        . ' value="Y" '
            
                    ; if ($interruptionbasicserviceslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="interruptionbasicservicesmedium" id="3-29" '
                        . ' value="Y" '
            
                    ; if ($interruptionbasicservicesmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="interruptionbasicserviceshigh" id="4-29" '
                        . ' value="Y" '
            
                    ; if ($interruptionbasicserviceshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="interruptionbasicservicesno" id="29" '
            . ' value="N" '

; if ($interruptionbasicservicesno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Concentracion masiva de la población</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="masspopulationconcentrationnull" id="1-30" '
                        . ' value="Y" '
            
                    ; if ($masspopulationconcentrationnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="masspopulationconcentrationlow" id="2-30" '
                        . ' value="Y" '
            
                    ; if ($masspopulationconcentrationlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="masspopulationconcentrationmedium" id="3-30" '
                        . ' value="Y" '
            
                    ; if ($masspopulationconcentrationmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="masspopulationconcentrationhigh" id="4-30" '
                        . ' value="Y" '
            
                    ; if ($masspopulationconcentrationhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="masspopulationconcentrationno" id="30" '
            . ' value="N" '

; if ($masspopulationconcentrationno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Manifestaciones</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="manifestationsnull" id="1-31" '
                        . ' value="Y" '
            
                    ; if ($manifestationsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="manifestationslow" id="2-31" '
                        . ' value="Y" '
            
                    ; if ($manifestationslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="manifestationsmedium" id="3-31" '
                        . ' value="Y" '
            
                    ; if ($manifestationsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="manifestationshigh" id="4-31" '
                        . ' value="Y" '
            
                    ; if ($manifestationshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="manifestationsno" id="31" '
            . ' value="N" '

; if ($manifestationsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Terrorismo</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="terrorismnull" id="1-32" '
                        . ' value="Y" '
            
                    ; if ($terrorismnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="terrorismlow" id="2-32" '
                        . ' value="Y" '
            
                    ; if ($terrorismlow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="terrorismmedium" id="3-32" '
                        . ' value="Y" '
            
                    ; if ($terrorismmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="terrorismhigh" id="4-32" '
                        . ' value="Y" '
            
                    ; if ($terrorismhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="terrorismno" id="32" '
            . ' value="N" '

; if ($terrorismno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Accidentes de transporte</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr align="center">
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="transportaccidentsnull" id="1-33" '
                        . ' value="Y" '
            
                    ; if ($transportaccidentsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="transportaccidentslow" id="2-33" '
                        . ' value="Y" '
            
                    ; if ($transportaccidentslow == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="transportaccidentsmedium" id="3-33" '
                        . ' value="Y" '
            
                    ; if ($transportaccidentsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="transportaccidentshigh" id="4-33" '
                        . ' value="Y" '
            
                    ; if ($transportaccidentshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radiosT rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="transportaccidentsno" id="33" '
            . ' value="N" '

; if ($transportaccidentsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
</table>


';
// ------------------parte 9.1
echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: large; ">Evidencia fotografica:  </span>
    </div>';
    echo '<br>';
echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de insertar la imagen con la evidencia</span>
    </div>';   
myPresentationLayer::inputFileImg("ANALRIESG-2","ANALRIESG-2","ANALRIESG-2-".$idpartyenterprise,"ANALRIESG","show-ANALRIESG-2-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANALRIESG-2-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-22 col-lg-8" id="show-ANALRIESG-2-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';




// ---------------------PARTE 10

echo '<br>';
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "naturalphenomenasummary", "naturalphenomenasummary", 
        $naturalphenomenasummary,"input textarea2","title", $rows, $cols,"width:80%");

    echo '<br>';

    echo '<div style="text-align: left;">

    

    <span style="color:black; font-size: x-large; ">Análisis de los Riesgos Encontrados</span>
    </div>';    
    echo '<br>'; 
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "analysysfoundrisks", "analysysfoundrisks", 
        $analysysfoundrisks,"input textarea2","title", $rows, $cols,"width:80%");

    echo '<br>';
    echo '<div style="text-align: left;">

    <span style="color:black; font-size: x-large; ">Croquis de Identificación de Riesgos Externos</span>
    </div>';  
    echo '<br>';
myPresentationLayer::inputFileImg("ANALRIESG-3","ANALRIESG-3","ANALRIESG-3-".$idpartyenterprise,"ANALRIESG","show-ANALRIESG-3-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANALRIESG-3-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-32 col-lg-8" id="show-ANALRIESG-3-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

echo '<br>';
             echo '</div>';

    echo '<div style="text-align: left;">

    <span style="color:black; font-size: x-large; ">Identificación de Areas Externas de Mayor Riesgos</span>
    </div>';  
    echo '<br>';                 
myPresentationLayer::inputFileImg("ANALRIESG-4","ANALRIESG-4","ANALRIESG-4-".$idpartyenterprise,"ANALRIESG","show-ANALRIESG-4-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANALRIESG-4-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-42 col-lg-8" id="show-ANALRIESG-4-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
             echo '</div>';

             echo '<br>';
    echo '<div style="" id="idthreats">
    <span style="color:black; font-size: x-large; ">Ingreso de Amenazas</span>
    </div>'; 

    echo '<br>';
myPresentationLayer::buildInitColumn();  
    echo '<div style="">

    <span style="color:black; font-size: x-large; ">Lugar:</span>
    </div>'; 
                myPresentationLayer::buildInputWithValidatorClass(
                    "","locationthreats","locationthreats",$locationthreats,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 


presentationLayer::buildEndColumn();
myPresentationLayer::buildInitColumn();  
    echo '<div style="">

    <span style="color:black; font-size: x-large; ">Amenaza:</span>
    </div>'; 
 myPresentationLayer::buildInputWithValidatorClass(
                    "","descriptionthreats","descriptionthreats",$descriptionthreats,
                    "input","",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","");    

                    presentationLayer::buildEndColumn();
?>

<button type="submit" id="agregar3" value="Guardar amenaza" class="button" name="amenaza">
    Guardar amenaza
</button>

<?php

    echo '<br>';                                 


    // $comm="";  
    // $resul_exist=$dbl->executeReader($comm);

            if($idthreats==""){
                $comp= "SELECT a.id, a.location, a.description FROM core.threatriskanalysys AS b,core.threats AS a WHERE 
                a.id= b.idthreat and b.idparty='$idpartyenterprise'";         
                // var_dump($comp);
                // if($resul_exist!=""){
                    $arrCol = array("Identificador","Location","Description");
                    $registrobl->fillGridDisplayPaginator($comp,$arrCol,$idpartyenterprise,"idthreats");                         
                // } 
            }else{
                $comp= "SELECT a.id, a.location, a.description FROM core.threatriskanalysys AS b,core.threats AS a WHERE a.id= b.idthreat and b.idparty='$idpartyenterprise' and a.id!='$idthreats'";   
                // var_dump($comp);

                $arrCol = array("Identificador","Location","Description");
                $registrobl->fillGridDisplayPaginator($comp,$arrCol,$idpartyenterprise,"idthreats");                      
            }  

            echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Identificación de Instalaciones Estratégicas</span>
    </div>'; 

myPresentationLayer::buildInitColumn();  
    // echo '<div style="">

    // <span style="color:black; font-size: x-large; ">Identificación de Instalaciones Estratégicas</span>
    // </div>'; 
                myPresentationLayer::buildInputWithValidatorClass(
                    "","descriptionstrategiclocations","descriptionstrategiclocations",$descriptionstrategiclocations,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 

?>

<button type="submit" id="agregar4" value="savestrategiclocations" class="button" name="savestrategiclocations">
    Guardar
</button>
<?php
presentationLayer::buildEndColumn();
myPresentationLayer::buildInitColumn();  
 //    echo '<div style="">

 //    <span style="color:black; font-size: x-large; ">Amenaza:</span>
 //    </div>'; 
 // myPresentationLayer::buildInputWithValidatorClass(
 //                    "","descriptionthreats","descriptionthreats",$descriptionthreats,
 //                    "input","",
 //                    "onkeypress","return isESLetterNoSpace(event)",
 //                    "","","","",
 //                    "","50","","","","","");    



                                        
presentationLayer::buildEndColumn();

    // $comm="";  
    // $resul_exist=$dbl->executeReader($comm);

            if($idstrategiclocations==""){
                $comp= "SELECT a.id, a.description FROM core.securityplanriskanalysysstrategiclocations AS a WHERE  a.idparty='$idpartyenterprise'";         
                // var_dump($comp);
                // if($resul_exist!=""){
                    $arrCol = array("Identificador","Description");
                    $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idstrategiclocations");                         
                // } 
            }else{
                $comp= "SELECT a.id, a.description FROM core.securityplanriskanalysysstrategiclocations AS a WHERE  a.idparty='$idpartyenterprise' and a.id!='$idstrategiclocations'";   
                // var_dump($comp);

                $arrCol = array("Identificador","Description");
                $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idstrategiclocations");                      
            }




            echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Directorio del Personal</span>
    </div>'; 
    echo '<br>';
myPresentationLayer::buildInitColumn();  
    // echo '<div style="">

    // <span style="color:black; font-size: x-large; ">Identificación de Instalaciones Estratégicas</span>
    // </div>'; 
                myPresentationLayer::buildInputWithValidatorClass(
                    "Nombre","personnamesecurityplanriskanalysysdirectory","personnamesecurityplanriskanalysysdirectory",$personnamesecurityplanriskanalysysdirectory,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 

?>

<button type="submit" id="agregar5" value="savesecurityplanriskanalysysdirectory" class="button" name="savesecurityplanriskanalysysdirectory">
    Guardar
</button>
<?php
presentationLayer::buildEndColumn();
myPresentationLayer::buildInitColumn();  
    // echo '<div style="">

    // <span style="color:black; font-size: x-large; ">Amenaza:</span>
    // </div>'; 
 myPresentationLayer::buildInputWithValidatorClass(
                    "Puesto","positionsecurityplanriskanalysysdirectory","positionsecurityplanriskanalysysdirectory",$positionsecurityplanriskanalysysdirectory,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","");    



                                        
presentationLayer::buildEndColumn();

    // $comm="";  
    // $resul_exist=$dbl->executeReader($comm);

            if($idsecurityplanriskanalysysdirectory==""){
                $comp= "SELECT a.id, a.personname , a.position FROM core.securityplanriskanalysysdirectory AS a WHERE  a.idparty='$idpartyenterprise'";         
                // var_dump($comp);
                // if($resul_exist!=""){
                    $arrCol = array("Identificador","Nombre","Puesto");
                    $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysdirectory");                         
                // } 
            }else{
                $comp= "SELECT a.id, a.personname , a.position FROM core.securityplanriskanalysysdirectory AS a WHERE  a.idparty='$idpartyenterprise' and a.id!='$idsecurityplanriskanalysysdirectory'";   
                // var_dump($comp);

                $arrCol = array("Identificador","Nombre","Puesto");
                $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysdirectory");                      
            }

            echo '<br>';
    echo '<div style="text-align:left;">

    <span style="color:black; font-size: x-large; ">Equipos de Seguridad</span>
    </div>';    
    echo '<br>'; 
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "securityequipment", "securityequipment", 
        $securityequipment,"input textarea2","title", $rows, $cols,"width:80%");



    echo '<br>';

    /*
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Inventario de Recursos Materiales para Emergencias</span>
    </div>'; 
    echo '<br>';

    myPresentationLayer::buildInitColumn3();  
    // echo '<div style="">

    // <span style="color:black; font-size: x-large; ">Identificación de Instalaciones Estratégicas</span>
    // </div>'; 
                myPresentationLayer::buildInputWithValidatorClass(
                    "Cantidad","quantitysecurityplanriskanalysysemerncyresources","quantitysecurityplanriskanalysysemerncyresources",$quantitysecurityplanriskanalysysemerncyresources,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 

                    presentationLayer::buildEndColumn();
?>


<?php

myPresentationLayer::buildInitColumn3();  
    // echo '<div style="">

    // <span style="color:black; font-size: x-large; ">Amenaza:</span>
    // </div>'; 
 myPresentationLayer::buildInputWithValidatorClass(
                    "Equipo","equipmentsecurityplanriskanalysysemerncyresources","equipmentsecurityplanriskanalysysemerncyresources",$equipmentsecurityplanriskanalysysemerncyresources,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","");    



                                        
presentationLayer::buildEndColumn();
myPresentationLayer::buildInitColumn3(); 
                myPresentationLayer::buildInputWithValidatorClass(
                    "Ubicación","locationcsecurityplanriskanalysysemerncyresources","locationcsecurityplanriskanalysysemerncyresources",$locationcsecurityplanriskanalysysemerncyresources,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 
presentationLayer::buildEndColumn();

echo '
<button type="submit" id="agregar6" value="savesecurityplanriskanalysysemerncyresources" class="button" name="savesecurityplanriskanalysysemerncyresources">
Guardar
</button>

';




    // $comm="";  
    // $resul_exist=$dbl->executeReader($comm);

            if($idsecurityplanriskanalysysemerncyresources==""){
                $comp= "SELECT a.id, a.quantity , a.equipment , a.locationc FROM core.securityplanriskanalysysemerncyresources AS a WHERE  a.idparty='$idpartyenterprise' and a.code='INVMATEMER'";         
                // var_dump($comp);
                // if($resul_exist!=""){
                    $arrCol = array("Identificador","Cantidad","Equipo","Ubicación");
                    $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemerncyresources");                         
                // } 
            }else{
                $comp= "SELECT a.id, a.quantity , a.equipment , a.locationc FROM core.securityplanriskanalysysemerncyresources AS a WHERE  a.idparty='$idpartyenterprise' and a.id!='$idsecurityplanriskanalysysemerncyresources' and a.code='INVMATEMER'";   
                // var_dump($comp);

                $arrCol = array("Identificador","Cantidad","Equipo","Ubicación");
                $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemerncyresources");                      
            }


*/

            echo '<br>';

    /*        
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Inventario de Recursos Materiales Para Emergencias</span>
    </div>
    <br>
    <div style="">
        <span style="color:black; font-size: medium; ">
            Equipo para el Control y Combate Contra incendios (Extintores): </span>
    </div>

    '; 
    echo '<br>';

myPresentationLayer::buildInitColumn3();  
    // echo '<div style="">

    // <span style="color:black; font-size: x-large; ">Identificación de Instalaciones Estratégicas</span>
    // </div>'; 
                myPresentationLayer::buildInputWithValidatorClass(
                    "Cantidad","quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT","quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT",$quantitysecurityplanriskanalysysemerncyresourcesINVMATEMEREXT,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 


?>


<?php
presentationLayer::buildEndColumn();
myPresentationLayer::buildInitColumn3();  
    // echo '<div style="">

    // <span style="color:black; font-size: x-large; ">Amenaza:</span>
    // </div>'; 
 myPresentationLayer::buildInputWithValidatorClass(
                    "Equipo","equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT","equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT",$equipmentsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","");    



                                        
presentationLayer::buildEndColumn();
myPresentationLayer::buildInitColumn3(); 
                myPresentationLayer::buildInputWithValidatorClass(
                    "Ubicación","locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT","locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT",$locationcsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 

                    


presentationLayer::buildEndColumn();

echo '<br>';

echo '
                    <button type="submit" id="agregar7" value="savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT" class="button" name="savesecurityplanriskanalysysemerncyresourcesINVMATEMEREXT">
                        Guardar
                    </button>';

    // $comm="";  
    // $resul_exist=$dbl->executeReader($comm);

            if($idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT==""){
                $comp= "SELECT a.id, a.quantity , a.equipment , a.locationc FROM core.securityplanriskanalysysemerncyresources AS a WHERE  a.idparty='$idpartyenterprise' and a.code='INVMATEMEREXT'";         
                // var_dump($comp);
                // if($resul_exist!=""){
                    $arrCol = array("Identificador","Cantidad","Equipo","Ubicación");
                    $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT");                         
                // } 
            }else{
                $comp= "SELECT a.id, a.quantity , a.equipment , a.locationc FROM core.securityplanriskanalysysemerncyresources AS a WHERE  a.idparty='$idpartyenterprise' and a.id!='$idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT' and a.code='INVMATEMEREXT'";   
                // var_dump($comp);

                $arrCol = array("Identificador","Cantidad","Equipo","Ubicación");
                $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemerncyresourcesINVMATEMEREXT");                      
            }
*/

            echo '<br>';
    echo '<!--<div style="text-align: center;">-->

    <span style="color:black; font-size: x-large; ">Recomendaciones Generales</span><br>
    <!--</div>-->';  
    echo '<br>';   
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "generalrecomendations", "generalrecomendations", 
        $generalrecomendations,"input textarea2","title", $rows, $cols,"width:80%");

    echo '
    <!--<div style="text-align: center;">-->

    <br>
    <span style="color:black; font-size: x-large; ">Medidas de seguridad</span><br>
    <!--</div>-->';    
    echo '<br>'; 
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "securitymeasures", "securitymeasures", $securitymeasures,
        "input textarea2","title", $rows, $cols,"width:80%");






    /*
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Números de Emergencias</span>
    </div>
    <br>
    <div style="">
        <span style="color:black; font-size: medium; ">
            Directorio de Servicios de Auxilio para Emergencias </span>
    </div>
    '; 
    echo '<br>';

myPresentationLayer::buildInitColumn3();  
    // echo '<div style="">

    // <span style="color:black; font-size: x-large; ">Identificación de Instalaciones Estratégicas</span>
    // </div>'; 
                myPresentationLayer::buildInputWithValidatorClass(
                    "Institución o Empresa","enterprisesecurityplanriskanalysysemergencydirectory","enterprisesecurityplanriskanalysysemergencydirectory",$enterprisesecurityplanriskanalysysemergencydirectory,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 
                

// myPresentationLayer::inputFileImg("uploadid2","uploadid2",$iduser,"foto-perfil","previewphoto2","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid");

// echo '           <div class="col-12 col-lg-8" id="previewphoto2" style="margin-top: 1rem;">                  
//                     <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> 
//                   </div>';
?>
  <input type="file" name="logosecurityplanriskanalysysemergencydirectory">
<?php

    echo '<img class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$logosecurityplanriskanalysysemergencydirectory.'" />';         
presentationLayer::buildEndColumn();
myPresentationLayer::buildInitColumn3();  
    // echo '<div style="">

    // <span style="color:black; font-size: x-large; ">Amenaza:</span>
    // </div>'; 
 myPresentationLayer::buildInputWithValidatorClass(
                    "Teléfono","phonesecurityplanriskanalysysemergencydirectory","phonesecurityplanriskanalysysemergencydirectory",$phonesecurityplanriskanalysysemergencydirectory,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","","");    

?>


<?php

                                        
presentationLayer::buildEndColumn();
myPresentationLayer::buildInitColumn3(); 
                myPresentationLayer::buildInputWithValidatorClass(
                    "Dirección","addresssecurityplanriskanalysysemergencydirectory","addresssecurityplanriskanalysysemergencydirectory",$addresssecurityplanriskanalysysemergencydirectory,
                    "input","title",
                    "onkeypress","",
                    "","","","",
                    "","","","","","",""); 
presentationLayer::buildEndColumn();



    // $comm="";  
    // $resul_exist=$dbl->executeReader($comm);

            if($idsecurityplanriskanalysysemergencydirectory==""){
                $comp= "SELECT a.id, a.enterprise , a.phone , a.address FROM core.securityplanriskanalysysemergencydirectory AS a WHERE  a.idparty='$idpartyenterprise'";         
                // var_dump($comp);
                // if($resul_exist!=""){
                    $arrCol = array("Identificador","Institución o Empresa","Teléfono","Dirección");
                    $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemergencydirectory");                         
                // } 
            }else{
                $comp= "SELECT a.id, a.enterprise , a.phone , a.address FROM core.securityplanriskanalysysemergencydirectory AS a WHERE  a.idparty='$idpartyenterprise' and a.id!='$idsecurityplanriskanalysysemergencydirectory'";   
                // var_dump($comp);

                $arrCol = array("Identificador","Institución o Empresa","Teléfono","Dirección");
                $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemergencydirectory");                      
            }
            
            echo '
            <button type="submit" id="agregar7" value="savesecurityplanriskanalysysemergencydirectory" class="button" name="savesecurityplanriskanalysysemergencydirectory">
            Guardar
            </button>
        ';            

        */
?>

                           
<?php


            myPresentationLayer::buildButtonOrImage("Cancelar","urloper","bAccess","save","","btninicio","maxh-40",
                "Guardar","urloper","bAccess","save","","btninicio","maxh-40");    
            // myPresentationLayer::buildButtonOrImage("Aceptar","urloper","bAccess","save","","btninicio","maxh-40");
    ?>	  
            </form>
            <script>

                var birthdate = "<?php echo $birthdate; ?>" ;
                var ufromacademic_records = "<?php echo $ufromacademic_records; ?>" ;
                var ufromexperience_record = "<?php echo $ufromexperience_record; ?>" ;
                var ufromcertifies_records = "<?php echo $ufromcertifies_records; ?>" ;
                var untilacademic_records = "<?php echo $untilacademic_records; ?>" ;
                var untilexperience_record = "<?php echo $untilexperience_record; ?>" ;
                var untilcertifies_records = "<?php echo $untilcertifies_records; ?>" ;

                var x;

                $("#birthdate").on("change", function() {
                    if(this.value!=""){
                        this.setAttribute(
                            "data-date",
                            moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                        );
                    }else{
                        this.setAttribute(
                        "data-date",
                        moment().format('[dd/mm/yyyy]')
                        );               
                    }
                }).trigger("change"); 




            $("#installdate").on("change", function() {
                if(this.value!=""){
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                    );
                }else{
                    this.setAttribute(
                    "data-date",
                    moment().format('[dd/mm/yyyy]')
                    );               
                }
            }).trigger("change");  








$(".radiosT").on('click', function(event) {
    // $(elemento).prop("checked", true);
 
    // var checked = $(this).prop('checked');
// attr("value","OTRO TEXTO");
    // alert($(this).attr("checked"));
    // if(checked==false){
    //   $(this).addClass('valid-error');     
    // }else{
    //   $(this).removeClass('valid-error');
    // }
    if(($(this).attr("checked"))=="checked"){
        $(this).attr("checked",false);
        $(this).attr("value","N");
    }else{
        $(this).attr("checked",true);
        $(this).attr("value","Y");
    }
});



$(".rdy").on('click', function(event) {
    if(($(this).attr("value"))=="Y"){
        var id    = $(this).attr("id");
        var num   = id.substr(-1);
        var num2   = id.substr(0,1);
        var idnot = $('#'+num);
        idnot.attr("checked",false);
      for (var i = 1; i <= 4; i++) {
        if(i!=num2){
          var idyes = $('#'+i+'-'+num);
          idyes.attr("checked",false);
        }
      }        
    }else{
        var id    = $(this).attr("id");
      for (var i = 1; i <= 4; i++) {
        var idyes = $('#'+i+'-'+id);
        idyes.attr("checked",false);
      }
    }
});










            </script> 
            
        </body>
    </html>
