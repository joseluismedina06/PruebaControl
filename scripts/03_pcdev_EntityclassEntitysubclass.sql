
--Phone

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('PHONETYPE','Tipos de Telefonos','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'PHONETYPEVALUES','LOCAL',id from base.entityclass where code='PHONETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'PHONETYPEVALUES','CELULAR',id from base.entityclass where code='PHONETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'PHONETYPEVALUES','OFICINA',id from base.entityclass where code='PHONETYPE';

--Address

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('ADDRESSTYPE','Tipos de Direcciones','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'ADDRESSTYPEVALUES','LOCAL',id from base.entityclass where code='ADDRESSTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ADDRESSTYPEVALUES','FISCAL',id from base.entityclass where code='ADDRESSTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ADDRESSTYPEVALUES','OFICINA',id from base.entityclass where code='ADDRESSTYPE';


--Email

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('EMAILTYPE','Tipos de Correos','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'EMAILTYPEVALUES','OFICNA',id from base.entityclass where code='EMAILTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'EMAILTYPEVALUES','PERSONAL',id from base.entityclass where code='EMAILTYPE';


--Cimentation

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('CIMENTATIONTYPE','Tipos de Cimentacion','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'CIMENTATIONTYPEVALUES','Zapatas aisladas',id from base.entityclass where code='CIMENTATIONTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'CIMENTATIONTYPEVALUES','Zapatas Combinadas',id from base.entityclass where code='CIMENTATIONTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'CIMENTATIONTYPEVALUES','Losas de Cimentacion',id from base.entityclass where code='CIMENTATIONTYPE';

--STRUCTURE

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('STRUCTURETYPE','Tipos de Estructuras','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'STRUCTURETYPEVALUES','Hormigon Armado',id from base.entityclass where code='STRUCTURETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'STRUCTURETYPEVALUES','Acero',id from base.entityclass where code='STRUCTURETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'STRUCTURETYPEVALUES','Mamposteria',id from base.entityclass where code='STRUCTURETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'STRUCTURETYPEVALUES','Madera',id from base.entityclass where code='STRUCTURETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'STRUCTURETYPEVALUES','Membranas Textiles',id from base.entityclass where code='STRUCTURETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'STRUCTURETYPEVALUES','Aluminio',id from base.entityclass where code='STRUCTURETYPE';

--ROOF

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('ROOFTYPE','Tipos de Techos','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'ROOFTYPEVALUES','Teja',id from base.entityclass where code='ROOFTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ROOFTYPEVALUES','Cemento',id from base.entityclass where code='ROOFTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ROOFTYPEVALUES','Madera',id from base.entityclass where code='ROOFTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ROOFTYPEVALUES','Aluminio',id from base.entityclass where code='ROOFTYPE';


--WALL

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('WALLTYPE','Tipos de Muros','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'WALLTYPEVALUES','Madera',id from base.entityclass where code='WALLTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'WALLTYPEVALUES','Yeso',id from base.entityclass where code='WALLTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'WALLTYPEVALUES','Ladrillo',id from base.entityclass where code='WALLTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'WALLTYPEVALUES','Concreto',id from base.entityclass where code='WALLTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'WALLTYPEVALUES','Cemento',id from base.entityclass where code='WALLTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'WALLTYPEVALUES','Suelo',id from base.entityclass where code='WALLTYPE';


--FLOOR

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('FLOORTYPE','Tipos de Pisos','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'FLOORTYPEVALUES','Concreto',id from base.entityclass where code='FLOORTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'FLOORTYPEVALUES','Concreto Hidraulico',id from base.entityclass where code='FLOORTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'FLOORTYPEVALUES','Madera',id from base.entityclass where code='FLOORTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'FLOORTYPEVALUES','Vitropiso',id from base.entityclass where code='FLOORTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'FLOORTYPEVALUES','Cemento',id from base.entityclass where code='FLOORTYPE';

--ENJARRE

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('ENJARRETYPE','Tipos de Enjarre','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'ENJARRETYPEVALUES','Rustico',id from base.entityclass where code='ENJARRETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ENJARRETYPEVALUES','Goteado',id from base.entityclass where code='ENJARRETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ENJARRETYPEVALUES','Apolillado',id from base.entityclass where code='ENJARRETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ENJARRETYPEVALUES','Volado',id from base.entityclass where code='ENJARRETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ENJARRETYPEVALUES','Tipo Cantera',id from base.entityclass where code='ENJARRETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ENJARRETYPEVALUES','Tipo Piedra',id from base.entityclass where code='ENJARRETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ENJARRETYPEVALUES','Tipo Ladrillo',id from base.entityclass where code='ENJARRETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ENJARRETYPEVALUES','Pulido o Aplanado',id from base.entityclass where code='ENJARRETYPE';


--ELECTRICALINSTALL

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('ELECTRICALINSTALLTYPE','Tipos de Instalacion Electrica','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'ELECTRICALINSTALLTYPEVALUES','Si',id from base.entityclass where code='ELECTRICALINSTALLTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'ELECTRICALINSTALLTYPEVALUES','No',id from base.entityclass where code='ELECTRICALINSTALLTYPE';

--HIDROSANITARYINSTALL

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('HIDROSANITARYINSTALLTYPE','Tipos de Instalacion Hidro Sanitaria','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'HIDROSANITARYINSTALLTYPEVALUES','Si',id from base.entityclass where code='HIDROSANITARYINSTALLTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'HIDROSANITARYINSTALLTYPEVALUES','No',id from base.entityclass where code='HIDROSANITARYINSTALLTYPE';

--BATHROOMFURNITURE

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('BATHROOMFURNITURETYPE','Tipos de Mueble de baño','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'BATHROOMFURNITURETYPEVALUES','Plastico',id from base.entityclass where code='BATHROOMFURNITURETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'BATHROOMFURNITURETYPEVALUES','Porcelana',id from base.entityclass where code='BATHROOMFURNITURETYPE';

insert into base.entitysubclass(code,name,identityclass) select 'BATHROOMFURNITURETYPEVALUES','Acero Inoxidable',id from base.entityclass where code='BATHROOMFURNITURETYPE';

--CANCELERIA

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('CANCELERIATYPE','Tipos de Canceleria','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'CANCELERIATYPEVALUES','Si',id from base.entityclass where code='CANCELERIATYPE';

insert into base.entitysubclass(code,name,identityclass) select 'CANCELERIATYPEVALUES','No',id from base.entityclass where code='CANCELERIATYPE';


--DOORS

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('DOORSTYPE','Tipos de Mueble de Puertas','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'DOORSTYPEVALUES','Plastico',id from base.entityclass where code='DOORSTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'DOORSTYPEVALUES','Metal',id from base.entityclass where code='DOORSTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'DOORSTYPEVALUES','Madera',id from base.entityclass where code='DOORSTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'DOORSTYPEVALUES','Cristal',id from base.entityclass where code='DOORSTYPE';

--STAIRS

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('STAIRSTYPE','Tipos de Escaleras','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'STAIRSTYPEVALUES','Si',id from base.entityclass where code='STAIRSTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'STAIRSTYPEVALUES','No',id from base.entityclass where code='STAIRSTYPE';


-- OTHERS

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('OTHERSTYPE','Tipos de Otros','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'OTHERSTYPEVALUES','Si',id from base.entityclass where code='OTHERSTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'OTHERSTYPEVALUES','No',id from base.entityclass where code='OTHERSTYPE';

-- STATUS

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('STATUSTYPE','Tipos de Status','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'STATUSTYPEVALUES','Verificado',id from base.entityclass where code='STATUSTYPE';

insert into base.entitysubclass(code,name,identityclass) select 'STATUSTYPEVALUES','No Verificado',id from base.entityclass where code='STATUSTYPE';

-- DOCUMENTS ANEXO I

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('DOCSANEXO1','Tipos de Documentos Anexo I','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO1VALUES','Clasificación de Riesgo',id from base.entityclass where code='DOCSANEXO1';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO1VALUES','Bitácora de Recorrido',id from base.entityclass where code='DOCSANEXO1';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO1VALUES','Evaluación de Simulacios',id from base.entityclass where code='DOCSANEXO1';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO1VALUES','Plano de Evaluación',id from base.entityclass where code='DOCSANEXO1';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO1VALUES','Plano de Identificación de Riesgos',id from base.entityclass where code='DOCSANEXO1';

-- DOCUMENTS ANEXO II

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('DOCSANEXO2','Tipos de Documentos Anexo II','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO2VALUES','Bibliografía',id from base.entityclass where code='DOCSANEXO2';

-- DOCUMENTS ANEXO III

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('DOCSANEXO3','Tipos de Documentos Anexo III','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO3VALUES','Acta Constitutiva UIPC',id from base.entityclass where code='DOCSANEXO3';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO3VALUES','Calendarización de Actividades',id from base.entityclass where code='DOCSANEXO3';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO3VALUES','Hoja de Seguriad',id from base.entityclass where code='DOCSANEXO3';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSANEXO3VALUES','Programa de Mantenimiento',id from base.entityclass where code='DOCSANEXO3';

-- DOCUMENTS EMPRESA

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('DOCSENTERPRISE','Tipos de Documentos de Empresa','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'DOCSENTERPRISEVALUES','Otros Documentos 01',id from base.entityclass where code='DOCSENTERPRISE';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSENTERPRISEVALUES','Otros Documentos 02',id from base.entityclass where code='DOCSENTERPRISE';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSENTERPRISEVALUES','Otros Documentos 03',id from base.entityclass where code='DOCSENTERPRISE';

-- DOCUMENTS PAGOS

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('DOCSPAY','Tipos de Pagos','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'DOCSPAYVALUES','Pago por Ventanilla',id from base.entityclass where code='DOCSPAY';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSPAYVALUES','Transferencia Bancaria',id from base.entityclass where code='DOCSPAY';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSPAYVALUES','Otra forma de Pago',id from base.entityclass where code='DOCSPAY';

-- DOCUMENTS DICTAMENES

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('DOCSDICTUM','Tipos de Dictamenes','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'DOCSDICTUMVALUES','Dictamen Eléctrico',id from base.entityclass where code='DOCSDICTUM';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSDICTUMVALUES','Dictamen Estructural',id from base.entityclass where code='DOCSDICTUM';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSDICTUMVALUES','Dictamen de Gas L.P.',id from base.entityclass where code='DOCSDICTUM';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSDICTUMVALUES','Otros Dictamenes',id from base.entityclass where code='DOCSDICTUM';


-- DOCUMENTS SEGUROS

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('DOCSINSURANCE','Tipos de Seguros','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'DOCSINSURANCEVALUES','Seguro contra Incendios',id from base.entityclass where code='DOCSINSURANCE';

insert into base.entitysubclass(code,name,identityclass) select 'DOCSINSURANCEVALUES','Otros Seguros',id from base.entityclass where code='DOCSINSURANCE';

-- PIPC STATUS

-- Crear la Clase
-- Nota: Se ejecuta una sola vez
insert into base.entityclass(code,name,active,delete) values ('PIPCSTATUS','Tipos de Status PIPC','Y','N');

-- Crear la subclase basado en el code
-- Se ejecuta tantos inserts como subclases se requieran
insert into base.entitysubclass(code,name,identityclass) select 'PIPCSTATUSVALUES','Pendiente',id from base.entityclass where code='PIPCSTATUS';

insert into base.entitysubclass(code,name,identityclass) select 'PIPCSTATUSVALUES','En Revision',id from base.entityclass where code='PIPCSTATUS';

insert into base.entitysubclass(code,name,identityclass) select 'PIPCSTATUSVALUES','Aprobado',id from base.entityclass where code='PIPCSTATUS';

insert into base.entitysubclass(code,name,identityclass) select 'PIPCSTATUSVALUES','Necesita Correcciones',id from base.entityclass where code='PIPCSTATUS';
