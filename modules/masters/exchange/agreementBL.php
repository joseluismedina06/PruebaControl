<?php
    // Base Directive
    chdir(dirname(__FILE__));
    include_once("../base/baseBL.php");

    // Visualizacion de Errores
    //error_reporting(E_ALL);
    //ini_set('display_errors', '1');
    // Fin de Visualizacion de Errores
    
    // Base Class
    class agreementBL extends baseBL{
        
        // Atributes
        // protected $id;
        protected $code;
        protected $name;
        protected $idparty;

        protected $bussinesname;
        protected $date;
        protected $buildingnamenumber;


        protected $landsurface;
        protected $buildedsurface;
        protected $buildingheight;

        protected $legalrepresentative;
        protected $manager;
        protected $responsiblepipc;
        protected $economicactivity;
        protected $permanentshedule;
        protected $numemployees;

        protected $buildingage;
        protected $numlevels;
        protected $areadata;
        protected $maxcapacity;

        protected $companysecurityprovider;
        protected $securityofficer;
        protected $nummorningsecurityelements;
        protected $numeveningsecurityelements;
        protected $numnightsecurityelements;

        protected $numbrigadista;
        protected $accidentinsurance;
        protected $insurancecompany;
        protected $numextinguisherspqs;
        protected $numextinguishersco2;
        protected $numextinguishersh20;
        protected $numextinguishersothers;
        protected $structuralopinion;
        protected $datestructuralopinion;
        protected $electricopinion;
        protected $dateelectricopinion;
        protected $firenetwork;
        protected $numhydrants;
        protected $tankcapacity;
        protected $percenttankfire;
        protected $alertsystem;
        protected $firedetection;
        protected $fireprotectionequipment;
        protected $capacityfireprotectionequipment;
        protected $autonomousbreathingequipment;
        protected $gastanklpstationary;
        protected $capacitygastanklpstationary;
        protected $gastanklpnotstationary;
        protected $howgastanklpnotstationar;
        protected $lpgasopinion;
        protected $datelpgasopinion;
        
        protected $flammablegases;
        protected $quantityflammablegases;
        protected $flammableliquids;
        protected $quantityflammableliquids;
        protected $combustibleliquids;
        protected $quantitycombustibleliquids;
        protected $combustiblesolids;
        protected $quantitycombustiblesolids;
        protected $explosivematerial;
        protected $quantityexplosivematerial;
        protected $electricsubstation;
        protected $capacityelectricsubstation;
        protected $codebranch;

        protected $active; 
        protected $deleted;

        // Construct
        function __construct(
            $code, $name,$idparty,

            $bussinesname,
            $date,
            $buildingnamenumber,

            $landsurface,
            $buildedsurface,
            $buildingheight,

            $legalrepresentative,
            $manager,
            $responsiblepipc,
            $economicactivity,
            $permanentshedule,
            $numemployees,

            $buildingage,
            $numlevels,
            $areadata,
            $maxcapacity,

            $companysecurityprovider,
            $securityofficer,
            $nummorningsecurityelements,
            $numeveningsecurityelements,
            $numnightsecurityelements,

            $numbrigadista,
            $accidentinsurance,
            $insurancecompany,
            $numextinguisherspqs,
            $numextinguishersco2,
            $numextinguishersh20,
            $numextinguishersothers,
            $structuralopinion,
            $datestructuralopinion,
            $electricopinion,
            $dateelectricopinion,
            $firenetwork,
            $numhydrants,
            $tankcapacity,
            $percenttankfire,
            $alertsystem,
            $firedetection,
            $fireprotectionequipment,
            $capacityfireprotectionequipment,
            $autonomousbreathingequipment,
            $gastanklpstationary,
            $capacitygastanklpstationary,
            $gastanklpnotstationary,
            $howgastanklpnotstationar,
            $lpgasopinion,
            $datelpgasopinion,
            
            $flammablegases,
            $quantityflammablegases,
            $flammableliquids,
            $quantityflammableliquids,
            $combustibleliquids,
            $quantitycombustibleliquids,
            $combustiblesolids,
            $quantitycombustiblesolids,
            $explosivematerial,
            $quantityexplosivematerial,
            $electricsubstation,
            $capacityelectricsubstation,
            $codebranch,

            $active, $deleted
        ) {
            
            // Data for Parent Identification
            $scheme="core";
            $table="enterprise";
            
            // Atributes Setup
            //$this->id=$id;
            $this->code=$code; 
            $this->name=$name;
            $this->idparty=$idparty;

            $this->bussinesname=$bussinesname;
            $this->date=$date;
            $this->buildingnamenumber=$buildingnamenumber;

            $this->landsurface=$landsurface;
            $this->buildedsurface=$buildedsurface;
            $this->buildingheight=$buildingheight;

            $this->legalrepresentative=$legalrepresentative;
            $this->manager=$manager;
            $this->responsiblepipc=$responsiblepipc;
            $this->economicactivity=$economicactivity;
            $this->permanentshedule=$permanentshedule;
            $this->numemployees=$numemployees;

            $this->buildingage=$buildingage;
            $this->numlevels=$numlevels;
            $this->areadata=$areadata;
            $this->maxcapacity=$maxcapacity;

            $this->companysecurityprovider=$companysecurityprovider;
            $this->securityofficer=$securityofficer;
            $this->nummorningsecurityelements=$nummorningsecurityelements;
            $this->numeveningsecurityelements=$numeveningsecurityelements;
            $this->numnightsecurityelements=$numnightsecurityelements;

            $this->numbrigadista=$numbrigadista;
            $this->accidentinsurance=$accidentinsurance;
            $this->insurancecompany=$insurancecompany;
            $this->numextinguisherspqs=$numextinguisherspqs;
            $this->numextinguishersco2=$numextinguishersco2;
            $this->numextinguishersh20=$numextinguishersh20;
            $this->numextinguishersothers=$numextinguishersothers;
            $this->structuralopinion=$structuralopinion;
            $this->datestructuralopinion=$datestructuralopinion;
            $this->electricopinion=$electricopinion;
            $this->dateelectricopinion=$dateelectricopinion;
            $this->firenetwork=$firenetwork;
            $this->numhydrants=$numhydrants;
            $this->tankcapacity=$tankcapacity;
            $this->percenttankfire=$percenttankfire;
            $this->alertsystem=$alertsystem;
            $this->firedetection=$firedetection;
            $this->fireprotectionequipment=$fireprotectionequipment;
            $this->capacityfireprotectionequipment=$capacityfireprotectionequipment;
            $this->autonomousbreathingequipment=$autonomousbreathingequipment;
            $this->gastanklpstationary=$gastanklpstationary;
            $this->capacitygastanklpstationary=$capacitygastanklpstationary;
            $this->gastanklpnotstationary=$gastanklpnotstationary;
            $this->howgastanklpnotstationar=$howgastanklpnotstationar;
            $this->lpgasopinion=$lpgasopinion;
            $this->datelpgasopinion=$datelpgasopinion;
            
            $this->flammablegases=$flammablegases;
            $this->quantityflammablegases=$quantityflammablegases;
            $this->flammableliquids=$flammableliquids;
            $this->quantityflammableliquids=$quantityflammableliquids;
            $this->combustibleliquids=$combustibleliquids;
            $this->quantitycombustibleliquids=$quantitycombustibleliquids;
            $this->combustiblesolids=$combustiblesolids;
            $this->quantitycombustiblesolids=$quantitycombustiblesolids;
            $this->explosivematerial=$explosivematerial;
            $this->quantityexplosivematerial=$quantityexplosivematerial;
            $this->electricsubstation=$electricsubstation;
            $this->capacityelectricsubstation=$capacityelectricsubstation;
            $this->codebranch=$codebranch;

            $this->active=$active; 
            $this->deleted=$deleted; 
                     
            
            // Parent Construct Call
            parent::__construct($scheme,$table,$code,$name,$active,$deleted);
        }
                
        // Validate
        function validate() {

            $valid = true;
            $msg = "";
                                    
            // if (!utilities::valOk($this->code)) {
            //         $valid = false;
            //         $msg .= "El dato code ";
            // } // validate code 

            // if (!utilities::valOk($this->name)) {
            //         $valid = false;
            //         $msg .= "El dato name ";
            // } // validate name 			
            
            // if (!utilities::valOk($this->bussinesname)) {
            //                   $valid = false;
            //                   $msg .= "El dato bussinesname ";
            //           } // validate
            // if (!utilities::valOk($this->landsurface)) {
            //                   $valid = false;
            //                   $msg .= "El dato landsurface ";
            //           } // validate
            // if (!utilities::valOk($this->buildedsurface)) {
            //                   $valid = false;
            //                   $msg .= "El dato buildedsurface ";
            //           } // validate
            // if (!utilities::valOk($this->buildingheight)) {
            //                   $valid = false;
            //                   $msg .= "El dato buildingheight ";
            //           } // validate
            // if (!utilities::valOk($this->legalrepresentative)) {
            //                   $valid = false;
            //                   $msg .= "El dato legalrepresentative ";
            //           } // validate
            // if (!utilities::valOk($this->manager)) {
            //                   $valid = false;
            //                   $msg .= "El dato manager ";
            //           } // validate
            // if (!utilities::valOk($this->responsiblepipc)) {
            //                   $valid = false;
            //                   $msg .= "El dato responsiblepipc ";
            //           } // validate
            // if (!utilities::valOk($this->economicactivity)) {
            //                   $valid = false;
            //                   $msg .= "El dato economicactivity ";
            //           } // validate
            // if (!utilities::valOk($this->permanentshedule)) {
            //                   $valid = false;
            //                   $msg .= "El dato permanentshedule ";
            //           } // validate
            // if (!utilities::valOk($this->buildingage)) {
            //                   $valid = false;
            //                   $msg .= "El dato buildingage ";
            //           } // validate
            // if (!utilities::valOk($this->numemployees)) {
            //                   $valid = false;
            //                   $msg .= "El dato numemployees ";
            //           } // validate
            // if (!utilities::valOk($this->numbrigadista)) {
            //                   $valid = false;
            //                   $msg .= "El dato numbrigadista ";
            //           } // validate
            // if (!utilities::valOk($this->numlevels)) {
            //                   $valid = false;
            //                   $msg .= "El dato numlevels ";
            //           } // validate
            // if (!utilities::valOk($this->areadata)) {
            //                   $valid = false;
            //                   $msg .= "El dato areadata ";
            //           } // validate
            // if (!utilities::valOk($this->maxcapacity)) {
            //                   $valid = false;
            //                   $msg .= "El dato maxcapacity ";
            //           } // validate
            // if (!utilities::valOk($this->accidentinsurance)) {
            //                   $valid = false;
            //                   $msg .= "El dato accidentinsurance ";
            //           } // validate
            // if (!utilities::valOk($this->insurancecompany)) {
            //                   $valid = false;
            //                   $msg .= "El dato insurancecompany ";
            //           } // validate
            // if (!utilities::valOk($this->numextinguisherspqs)) {
            //                   $valid = false;
            //                   $msg .= "El dato numextinguisherspqs ";
            //           } // validate
            // if (!utilities::valOk($this->numextinguishersco2)) {
            //                   $valid = false;
            //                   $msg .= "El dato numextinguishersco2 ";
            //           } // validate
            // if (!utilities::valOk($this->numextinguishersh20)) {
            //                   $valid = false;
            //                   $msg .= "El dato numextinguishersh20 ";
            //           } // validate
            // if (!utilities::valOk($this->numextinguishersothers)) {
            //                   $valid = false;
            //                   $msg .= "El dato numextinguishersothers ";
            //           } // validate
            // if (!utilities::valOk($this->companysecurityprovider)) {
            //                   $valid = false;
            //                   $msg .= "El dato companysecurityprovider ";
            //           } // validate
            // if (!utilities::valOk($this->securityofficer)) {
            //                   $valid = false;
            //                   $msg .= "El dato securityofficer ";
            //           } // validate
            // if (!utilities::valOk($this->nummorningsecurityelements)) {
            //                   $valid = false;
            //                   $msg .= "El dato nummorningsecurityelements ";
            //           } // validate
            // if (!utilities::valOk($this->numeveningsecurityelements)) {
            //                   $valid = false;
            //                   $msg .= "El dato numeveningsecurityelements ";
            //           } // validate
            // if (!utilities::valOk($this->numnightsecurityelements)) {
            //                   $valid = false;
            //                   $msg .= "El dato numnightsecurityelements ";
            //           } // validate
            // if (!utilities::valOk($this->structuralopinion)) {
            //                   $valid = false;
            //                   $msg .= "El dato structuralopinion ";
            //           } // validate
            // if (!utilities::valOk($this->datestructuralopinion)) {
            //                   $valid = false;
            //                   $msg .= "El dato datestructuralopinion ";
            //           } // validate
            // if (!utilities::valOk($this->electricopinion)) {
            //                   $valid = false;
            //                   $msg .= "El dato electricopinion ";
            //           } // validate
            // if (!utilities::valOk($this->dateelectricopinion)) {
            //                   $valid = false;
            //                   $msg .= "El dato dateelectricopinion ";
            //           } // validate
            // if (!utilities::valOk($this->firenetwork)) {
            //                   $valid = false;
            //                   $msg .= "El dato firenetwork ";
            //           } // validate
            // if (!utilities::valOk($this->numhydrants)) {
            //                   $valid = false;
            //                   $msg .= "El dato numhydrants ";
            //           } // validate
            // if (!utilities::valOk($this->tankcapacity)) {
            //                   $valid = false;
            //                   $msg .= "El dato tankcapacity ";
            //           } // validate
            // if (!utilities::valOk($this->percenttankfire)) {
            //                   $valid = false;
            //                   $msg .= "El dato percenttankfire ";
            //           } // validate
            // if (!utilities::valOk($this->alertsystem)) {
            //                   $valid = false;
            //                   $msg .= "El dato alertsystem ";
            //           } // validate
            // if (!utilities::valOk($this->firedetection)) {
            //                   $valid = false;
            //                   $msg .= "El dato firedetection ";
            //           } // validate
            // if (!utilities::valOk($this->fireprotectionequipment)) {
            //                   $valid = false;
            //                   $msg .= "El dato fireprotectionequipment ";
            //           } // validate
            // if (!utilities::valOk($this->capacityfireprotectionequipment)) {
            //                   $valid = false;
            //                   $msg .= "El dato capacityfireprotectionequipment ";
            //           } // validate
            // if (!utilities::valOk($this->autonomousbreathingequipment)) {
            //                   $valid = false;
            //                   $msg .= "El dato autonomousbreathingequipment ";
            //           } // validate
            // if (!utilities::valOk($this->gastanklpstationary)) {
            //                   $valid = false;
            //                   $msg .= "El dato gastanklpstationary ";
            //           } // validate
            // if (!utilities::valOk($this->capacitygastanklpstationary)) {
            //                   $valid = false;
            //                   $msg .= "El dato capacitygastanklpstationary ";
            //           } // validate
            // if (!utilities::valOk($this->gastanklpnotstationary)) {
            //                   $valid = false;
            //                   $msg .= "El dato gastanklpnotstationary ";
            //           } // validate
            // if (!utilities::valOk($this->howgastanklpnotstationar)) {
            //                   $valid = false;
            //                   $msg .= "El dato howgastanklpnotstationar ";
            //           } // validate
            // if (!utilities::valOk($this->lpgasopinion)) {
            //                   $valid = false;
            //                   $msg .= "El dato lpgasopinion ";
            //           } // validate
            // if (!utilities::valOk($this->datelpgasopinion)) {
            //                   $valid = false;
            //                   $msg .= "El dato datelpgasopinion ";
            //           } // validate
            // if (!utilities::valOk($this->flammablegases)) {
            //                   $valid = false;
            //                   $msg .= "El dato flammablegases ";
            //           } // validate
            // if (!utilities::valOk($this->quantityflammablegases)) {
            //                   $valid = false;
            //                   $msg .= "El dato quantityflammablegases ";
            //           } // validate
            // if (!utilities::valOk($this->flammableliquids)) {
            //                   $valid = false;
            //                   $msg .= "El dato flammableliquids ";
            //           } // validate
            // if (!utilities::valOk($this->quantityflammableliquids)) {
            //                   $valid = false;
            //                   $msg .= "El dato quantityflammableliquids ";
            //           } // validate
            // if (!utilities::valOk($this->combustibleliquids)) {
            //                   $valid = false;
            //                   $msg .= "El dato combustibleliquids ";
            //           } // validate
            // if (!utilities::valOk($this->quantitycombustibleliquids)) {
            //                   $valid = false;
            //                   $msg .= "El dato quantitycombustibleliquids ";
            //           } // validate
            // if (!utilities::valOk($this->combustiblesolids)) {
            //                   $valid = false;
            //                   $msg .= "El dato combustiblesolids ";
            //           } // validate
            // if (!utilities::valOk($this->quantitycombustiblesolids)) {
            //                   $valid = false;
            //                   $msg .= "El dato quantitycombustiblesolids ";
            //           } // validate
            // if (!utilities::valOk($this->explosivematerial)) {
            //                   $valid = false;
            //                   $msg .= "El dato explosivematerial ";
            //           } // validate
            // if (!utilities::valOk($this->quantityexplosivematerial)) {
            //                   $valid = false;
            //                   $msg .= "El dato quantityexplosivematerial ";
            //           } // validate
            // if (!utilities::valOk($this->electricsubstation)) {
            //                   $valid = false;
            //                   $msg .= "El dato electricsubstation ";
            //           } // validate
            // if (!utilities::valOk($this->capacityelectricsubstation)) {
            //                   $valid = false;
            //                   $msg .= "El dato capacityelectricsubstation ";
            //           } // validate
            // if ($msg != "")
            //         utilities::alert($msg);

            return ($valid);
        }
        


        function validatemsg (){
            $msg = "";
        
            if (!utilities::valOk($this->idaddresstype)) {

                    $msg .= "El dato tipo de Dirección, ";
            } // validate idaddresstype

            if (!utilities::valOk($this->landsurface)) {
                                $valid = false;
                                $msg .= "El dato SUPERFICIE DEL TERRENO, ";
                        } // validate
            if (!utilities::valOk($this->buildedsurface)) {
                                $valid = false;
                                $msg .= "El dato SUPERFICIE CONSTRUIDA, ";
                        } // validate
            if (!utilities::valOk($this->buildingheight)) {
                                $valid = false;
                                $msg .= "El dato ALTURA DE LA EDIFICACIÓN, ";
                        } // validate
            if (!utilities::valOk($this->legalrepresentative)) {
                                $valid = false;
                                $msg .= "El dato REPRESENTANTE LEGAL, ";
                        } // validate
            if (!utilities::valOk($this->manager)) {
                                $valid = false;
                                $msg .= "El dato GERENTE, ";
                        } // validate
            if (!utilities::valOk($this->responsiblepipc)) {
                                $valid = false;
                                $msg .= "El dato RESPONSABLE DEL P.I.P.C, ";
                        } // validate
            if (!utilities::valOk($this->economicactivity)) {
                                $valid = false;
                                $msg .= "El dato ACTIVIDAD ECONÓMICA, ";
                        } // validate
            if (!utilities::valOk($this->permanentshedule)) {
                                $valid = false;
                                $msg .= "El dato HORARIO PERMANENTE DE TRABAJO, ";
                        } // validate
            if (!utilities::valOk($this->buildingage)) {
                                $valid = false;
                                $msg .= "El dato ANTIGÜEDAD DEL EDIFICIO, ";
                        } // validate
            if (!utilities::valOk($this->numemployees)) {
                                $valid = false;
                                $msg .= "El dato EMPLEADOS TOTALES, ";
                        } // validate

            if (!utilities::valOk($this->numlevels)) {
                                $valid = false;
                                $msg .= "El dato NO. DE NIVELES, ";
                        } // validate
            if (!utilities::valOk($this->areadata)) {
                                $valid = false;
                                $msg .= "El dato NOMBRE Y NÚMERO DE ÁREAS, ";
                        } // validate
            if (!utilities::valOk($this->maxcapacity)) {
                                $valid = false;
                                $msg .= "El dato CAPACIDAD MÁXIMA, ";
                        } // validate              
            if ($msg != ""){
                    $msg .= "No puede estar vacio ";
            }    
            return ($msg);
        }        

        // FillGrid
        function fillGrid($pn=0) {
            $arrCol = array("Id","Codigo","Nombre","Activo","Eliminado");
            //$par = "";// URL PARAMETER;
            //$com = "SELECT * FROM ".$this->scheme.".isspgetcommisionconcept()";            
            //return parent::fillGridCom($com,$arrCol,$par,$pn);           
            return parent::fillGrid($arrCol,$pn);
        }
        
        // fillGridDisplay
        function fillGridDisplay($pn=0,$parname="",$parvalue=""){
            $arrCol = array("Id","Codigo","Nombre","Activo","Eliminado");
            //$par = "";// URL PARAMETER
            //$com = "SELECT * FROM ".$this->scheme.".isspgetcommissionconcept()";            
            //return parent::fillGridCom($com,$arrCol,$par,$pn);            
            return parent::fillGridDisplay($arrCol,$pn);    
        }
        
        function fillGridDisplayPaginator($com="",$arrCol=""){
            if ($com==""){
                $com="select * from ".$this->scheme.".isspget".$this->table."()";
            }            
            $dbl=new baseBL();
            $arr=$dbl->executeReader($com);
            if ($arrCol=="") {
               $arrCol=array("Id","Codigo","Nombre","Activo"); 
            }
            
            presentationLayer::fillGridArrPaginator($arr, $arrCol);                   
            //return parent::fillGridDisplayPaginator($arrCol,$pn);    
        }

        static function buildFooterNoGrid($pl,$bl,$pn=0,$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y",$back="") {
            echo '<TABLE class="italsis">';
            echo '<TR>';
            echo '<TD>';
            //$save="Y",$clean="Y",$report="Y",$pdf="Y",$excel="Y",$back="Y"
            //$pl->showButtons($save,$delete,$print,$clean,$find);
            myPresentationLayer::myshowButtons($save,$clean,"","","",$back); 
            echo '</TD>';
            echo '</TR>';
            echo '</TABLE>';

        }    
        
        // BuildArray
        function buildArray(&$A) {            
            $A[] = utilities::buildS($this->code);
            $A[] = utilities::buildS($this->name);  
            $A[] = utilities::buildS($this->idparty);
            $A[] = utilities::buildS($this->bussinesname);
            $A[] = utilities::buildS($this->buildingnamenumber);
            $A[] = utilities::buildS($this->landsurface);
            $A[] = utilities::buildS($this->buildedsurface);
            $A[] = utilities::buildS($this->buildingheight);
            $A[] = utilities::buildS($this->legalrepresentative);
            $A[] = utilities::buildS($this->manager);
            $A[] = utilities::buildS($this->responsiblepipc);
            $A[] = utilities::buildS($this->economicactivity);
            $A[] = utilities::buildS($this->permanentshedule);
            $A[] = utilities::buildS($this->buildingage);
            $A[] = utilities::buildS($this->numemployees);
            $A[] = utilities::buildS($this->numbrigadista);
            $A[] = utilities::buildS($this->numlevels);
            $A[] = utilities::buildS($this->areadata);
            $A[] = utilities::buildS($this->maxcapacity);
            $A[] = utilities::buildS($this->accidentinsurance);
            $A[] = utilities::buildS($this->insurancecompany);
            $A[] = utilities::buildS($this->numextinguisherspqs);
            $A[] = utilities::buildS($this->numextinguishersco2);
            $A[] = utilities::buildS($this->numextinguishersh20);
            $A[] = utilities::buildS($this->numextinguishersothers);
            $A[] = utilities::buildS($this->companysecurityprovider);
            $A[] = utilities::buildS($this->securityofficer);
            $A[] = utilities::buildS($this->nummorningsecurityelements);
            $A[] = utilities::buildS($this->numeveningsecurityelements);
            $A[] = utilities::buildS($this->numnightsecurityelements);
            $A[] = utilities::buildS($this->structuralopinion);
            $A[] = utilities::buildS($this->datestructuralopinion);
            $A[] = utilities::buildS($this->electricopinion);
            $A[] = utilities::buildS($this->dateelectricopinion);
            $A[] = utilities::buildS($this->firenetwork);
            $A[] = utilities::buildS($this->numhydrants);
            $A[] = utilities::buildS($this->tankcapacity);
            $A[] = utilities::buildS($this->percenttankfire);
            $A[] = utilities::buildS($this->alertsystem);
            $A[] = utilities::buildS($this->firedetection);
            $A[] = utilities::buildS($this->fireprotectionequipment);
            $A[] = utilities::buildS($this->capacityfireprotectionequipment);
            $A[] = utilities::buildS($this->autonomousbreathingequipment);
            $A[] = utilities::buildS($this->gastanklpstationary);
            $A[] = utilities::buildS($this->capacitygastanklpstationary);
            $A[] = utilities::buildS($this->gastanklpnotstationary);
            $A[] = utilities::buildS($this->howgastanklpnotstationar);
            $A[] = utilities::buildS($this->lpgasopinion);
            $A[] = utilities::buildS($this->datelpgasopinion);
            $A[] = utilities::buildS($this->flammablegases);
            $A[] = utilities::buildS($this->quantityflammablegases);
            $A[] = utilities::buildS($this->flammableliquids);
            $A[] = utilities::buildS($this->quantityflammableliquids);
            $A[] = utilities::buildS($this->combustibleliquids);
            $A[] = utilities::buildS($this->quantitycombustibleliquids);
            $A[] = utilities::buildS($this->combustiblesolids);
            $A[] = utilities::buildS($this->quantitycombustiblesolids);
            $A[] = utilities::buildS($this->explosivematerial);
            $A[] = utilities::buildS($this->quantityexplosivematerial);
            $A[] = utilities::buildS($this->electricsubstation);
            $A[] = utilities::buildS($this->capacityelectricsubstation);
            $A[] = utilities::buildS($this->codebranch);

            $A[] = utilities::buildS($this->active);
            $A[] = utilities::buildS($this->deleted);
        }

        function buildArray_person(&$A) {    
            $A[] = utilities::buildS($this->code);
            $A[] = utilities::buildS($this->name);
            $A[] = utilities::buildS($this->idparty);   
            $A[] = utilities::buildS($this->bussinesname);
            $A[] = utilities::buildS($this->buildingnamenumber);
            $A[] = utilities::buildS($this->landsurface);
            $A[] = utilities::buildS($this->buildedsurface);
            $A[] = utilities::buildS($this->buildingheight);
            $A[] = utilities::buildS($this->legalrepresentative);
            $A[] = utilities::buildS($this->manager);
            $A[] = utilities::buildS($this->responsiblepipc);
            $A[] = utilities::buildS($this->economicactivity);
            $A[] = utilities::buildS($this->permanentshedule);
            $A[] = utilities::buildS($this->buildingage);
            $A[] = utilities::buildS($this->numemployees);
            $A[] = utilities::buildS($this->numbrigadista);
            $A[] = utilities::buildS($this->numlevels);
            $A[] = utilities::buildS($this->areadata);
            $A[] = utilities::buildS($this->maxcapacity);
            $A[] = utilities::buildS($this->accidentinsurance);
            $A[] = utilities::buildS($this->insurancecompany);
            $A[] = utilities::buildS($this->numextinguisherspqs);
            $A[] = utilities::buildS($this->numextinguishersco2);
            $A[] = utilities::buildS($this->numextinguishersh20);
            $A[] = utilities::buildS($this->numextinguishersothers);
            $A[] = utilities::buildS($this->companysecurityprovider);
            $A[] = utilities::buildS($this->securityofficer);
            $A[] = utilities::buildS($this->nummorningsecurityelements);
            $A[] = utilities::buildS($this->numeveningsecurityelements);
            $A[] = utilities::buildS($this->numnightsecurityelements);
            $A[] = utilities::buildS($this->structuralopinion);
            $A[] = utilities::buildS($this->datestructuralopinion);
            $A[] = utilities::buildS($this->electricopinion);
            $A[] = utilities::buildS($this->dateelectricopinion);
            $A[] = utilities::buildS($this->firenetwork);
            $A[] = utilities::buildS($this->numhydrants);
            $A[] = utilities::buildS($this->tankcapacity);
            $A[] = utilities::buildS($this->percenttankfire);
            $A[] = utilities::buildS($this->alertsystem);
            $A[] = utilities::buildS($this->firedetection);
            $A[] = utilities::buildS($this->fireprotectionequipment);
            $A[] = utilities::buildS($this->capacityfireprotectionequipment);
            $A[] = utilities::buildS($this->autonomousbreathingequipment);
            $A[] = utilities::buildS($this->gastanklpstationary);
            $A[] = utilities::buildS($this->capacitygastanklpstationary);
            $A[] = utilities::buildS($this->gastanklpnotstationary);
            $A[] = utilities::buildS($this->howgastanklpnotstationar);
            $A[] = utilities::buildS($this->lpgasopinion);
            $A[] = utilities::buildS($this->datelpgasopinion);
            $A[] = utilities::buildS($this->flammablegases);
            $A[] = utilities::buildS($this->quantityflammablegases);
            $A[] = utilities::buildS($this->flammableliquids);
            $A[] = utilities::buildS($this->quantityflammableliquids);
            $A[] = utilities::buildS($this->combustibleliquids);
            $A[] = utilities::buildS($this->quantitycombustibleliquids);
            $A[] = utilities::buildS($this->combustiblesolids);
            $A[] = utilities::buildS($this->quantitycombustiblesolids);
            $A[] = utilities::buildS($this->explosivematerial);
            $A[] = utilities::buildS($this->quantityexplosivematerial);
            $A[] = utilities::buildS($this->electricsubstation);
            $A[] = utilities::buildS($this->capacityelectricsubstation);
            $A[] = utilities::buildS($this->codebranch);

            $A[] = utilities::buildS($this->active);
            $A[] = utilities::buildS($this->deleted);
        }
        
        function buildArray_findid(&$A) {    
            $A[] = ($this->code);
            $A[] = ($this->name);
            $A[] = ($this->idparty);


            $A[] = ($this->bussinesname);
            $A[] = ($this->date);
            $A[] = ($this->buildingnamenumber);

            $A[] = ($this->landsurface);
            $A[] = ($this->buildedsurface);
            $A[] = ($this->buildingheight);

            $A[] = ($this->legalrepresentative);
            $A[] = ($this->manager);
            $A[] = ($this->responsiblepipc);
            $A[] = ($this->economicactivity);
            $A[] = ($this->permanentshedule);
            $A[] = ($this->numemployees);

            $A[] = ($this->buildingage);
            $A[] = ($this->numlevels);
            $A[] = ($this->areadata);
            $A[] = ($this->maxcapacity);

            $A[] = ($this->companysecurityprovider);
            $A[] = ($this->securityofficer);
            $A[] = ($this->nummorningsecurityelements);
            $A[] = ($this->numeveningsecurityelements);
            $A[] = ($this->numnightsecurityelements);

            $A[] = ($this->numbrigadista);
            $A[] = ($this->accidentinsurance);
            $A[] = ($this->insurancecompany);
            $A[] = ($this->numextinguisherspqs);
            $A[] = ($this->numextinguishersco2);
            $A[] = ($this->numextinguishersh20);
            $A[] = ($this->numextinguishersothers);
            $A[] = ($this->structuralopinion);
            $A[] = ($this->datestructuralopinion);
            $A[] = ($this->electricopinion);
            $A[] = ($this->dateelectricopinion);
            $A[] = ($this->firenetwork);
            $A[] = ($this->numhydrants);
            $A[] = ($this->tankcapacity);
            $A[] = ($this->percenttankfire);
            $A[] = ($this->alertsystem);
            $A[] = ($this->firedetection);
            $A[] = ($this->fireprotectionequipment);
            $A[] = ($this->capacityfireprotectionequipment);
            $A[] = ($this->autonomousbreathingequipment);
            $A[] = ($this->gastanklpstationary);
            $A[] = ($this->capacitygastanklpstationary);
            $A[] = ($this->gastanklpnotstationary);
            $A[] = ($this->howgastanklpnotstationar);
            $A[] = ($this->lpgasopinion);
            $A[] = ($this->datelpgasopinion);
            
            $A[] = ($this->flammablegases);
            $A[] = ($this->quantityflammablegases);
            $A[] = ($this->flammableliquids);
            $A[] = ($this->quantityflammableliquids);
            $A[] = ($this->combustibleliquids);
            $A[] = ($this->quantitycombustibleliquids);
            $A[] = ($this->combustiblesolids);
            $A[] = ($this->quantitycombustiblesolids);
            $A[] = ($this->explosivematerial);
            $A[] = ($this->quantityexplosivematerial);
            $A[] = ($this->electricsubstation);
            $A[] = ($this->capacityelectricsubstation);   
            $A[] = ($this->codebranch);   
           
            $A[] = ($this->active);
            $A[] = ($this->deleted);
        }


        function executeperson($urloper="",$parAr=""){
           
            if ($urloper == "update") {
                $nerr = $this -> update($parAr);
                                        
                if ($nerr === true) 
                                            
                $msg = "Datos de Empresa Actualizacion ok. "; 
                else
                $msg = "Datos de Empresa Actualizacion Failed. "; 
                // utilities::alert($msg);
            } // update

            if ($urloper == "insert") {
                           // var_dump($parAr);
                $nerr = $this -> insert($parAr);
                           // var_dump($nerr);

                if ($nerr === true) {
                    $msg = "Datos de Empresa Registro ok. "; 
                    //$_SESSION["mensaje"]=$msg;
                    // $msg = "Insert Operation OK. ";
                }else{
                    $msg = "Datos de Empresa Registro Fallido. "; 
                    //  $_SESSION["mensaje"]=$msg;                                    
                    // $msg = "Insert Operation Failed. ";
                    // utilities::alert($msg);
                                }                             
            } // update     
            return ($msg);
        }

    }
?>