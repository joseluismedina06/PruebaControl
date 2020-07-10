--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.25
-- Dumped by pg_dump version 12.2

-- Started on 2020-04-09 07:12:42 MDT

--
-- TOC entry 9 (class 2615 OID 27067)
-- Name: base; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA base;


--
-- TOC entry 8 (class 2615 OID 27066)
-- Name: core; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA core;


--
-- TOC entry 10 (class 2615 OID 27267)
-- Name: utils; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA utils;


--
-- TOC entry 195 (class 1259 OID 27184)
-- Name: city; Type: TABLE; Schema: base; Owner: -
--

CREATE TABLE base.city (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    idstate bigint,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 397 (class 1255 OID 44474)
-- Name: isspgetcity(); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetcity() RETURNS SETOF base.city
    LANGUAGE plpgsql
    AS $$ DECLARE r base.city%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.city ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 395 (class 1255 OID 44472)
-- Name: isspgetcity(bigint); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetcity(pkey bigint) RETURNS SETOF base.city
    LANGUAGE plpgsql
    AS $$ DECLARE r base.city%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.city WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 398 (class 1255 OID 44475)
-- Name: isspgetcitybyname(character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetcitybyname(gval character varying) RETURNS SETOF base.city
    LANGUAGE plpgsql
    AS $$ DECLARE r base.city%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.city WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 399 (class 1255 OID 44476)
-- Name: isspgetcityidbyname(character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetcityidbyname(gval character varying) RETURNS SETOF base.city
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM base.city WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 183 (class 1259 OID 27100)
-- Name: entityclass; Type: TABLE; Schema: base; Owner: -
--

CREATE TABLE base.entityclass (
    id bigint NOT NULL,
    code character varying(50) NOT NULL,
    name character varying(50) NOT NULL,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 390 (class 1255 OID 44467)
-- Name: isspgetentityclass(); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetentityclass() RETURNS SETOF base.entityclass
    LANGUAGE plpgsql
    AS $$ DECLARE r base.entityclass%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.entityclass ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 388 (class 1255 OID 44465)
-- Name: isspgetentityclass(bigint); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetentityclass(pkey bigint) RETURNS SETOF base.entityclass
    LANGUAGE plpgsql
    AS $$ DECLARE r base.entityclass%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.entityclass WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 391 (class 1255 OID 44468)
-- Name: isspgetentityclassbyname(character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetentityclassbyname(gval character varying) RETURNS SETOF base.entityclass
    LANGUAGE plpgsql
    AS $$ DECLARE r base.entityclass%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.entityclass WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 392 (class 1255 OID 44469)
-- Name: isspgetentityclassidbyname(character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetentityclassidbyname(gval character varying) RETURNS SETOF base.entityclass
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM base.entityclass WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 185 (class 1259 OID 27110)
-- Name: entitysubclass; Type: TABLE; Schema: base; Owner: -
--

CREATE TABLE base.entitysubclass (
    id bigint NOT NULL,
    code character varying(50) NOT NULL,
    name character varying(50) NOT NULL,
    identityclass bigint NOT NULL,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 383 (class 1255 OID 44460)
-- Name: isspgetentitysubclass(); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetentitysubclass() RETURNS SETOF base.entitysubclass
    LANGUAGE plpgsql
    AS $$ DECLARE r base.entitysubclass%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.entitysubclass ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 381 (class 1255 OID 44458)
-- Name: isspgetentitysubclass(bigint); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetentitysubclass(pkey bigint) RETURNS SETOF base.entitysubclass
    LANGUAGE plpgsql
    AS $$ DECLARE r base.entitysubclass%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.entitysubclass WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 384 (class 1255 OID 44461)
-- Name: isspgetentitysubclassbyname(character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetentitysubclassbyname(gval character varying) RETURNS SETOF base.entitysubclass
    LANGUAGE plpgsql
    AS $$ DECLARE r base.entitysubclass%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.entitysubclass WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 385 (class 1255 OID 44462)
-- Name: isspgetentitysubclassidbyname(character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetentitysubclassidbyname(gval character varying) RETURNS SETOF base.entitysubclass
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM base.entitysubclass WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 193 (class 1259 OID 27174)
-- Name: state; Type: TABLE; Schema: base; Owner: -
--

CREATE TABLE base.state (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 404 (class 1255 OID 44481)
-- Name: isspgetstate(); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetstate() RETURNS SETOF base.state
    LANGUAGE plpgsql
    AS $$ DECLARE r base.state%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.state ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 402 (class 1255 OID 44479)
-- Name: isspgetstate(bigint); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetstate(pkey bigint) RETURNS SETOF base.state
    LANGUAGE plpgsql
    AS $$ DECLARE r base.state%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.state WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 405 (class 1255 OID 44482)
-- Name: isspgetstatebyname(character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetstatebyname(gval character varying) RETURNS SETOF base.state
    LANGUAGE plpgsql
    AS $$ DECLARE r base.state%ROWTYPE; BEGIN  FOR r IN SELECT * FROM base.state WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 406 (class 1255 OID 44483)
-- Name: isspgetstateidbyname(character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspgetstateidbyname(gval character varying) RETURNS SETOF base.state
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM base.state WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 393 (class 1255 OID 44470)
-- Name: isspinscity(character varying, character varying, bigint, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspinscity(pcode character varying, pname character varying, pidstate bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO base.city(code,name,idstate,active,delete) VALUES (pcode,pname,pidstate,pactive,pdelete) ;  END; $$;


--
-- TOC entry 394 (class 1255 OID 44471)
-- Name: isspinscityid(character varying, character varying, bigint, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspinscityid(pcode character varying, pname character varying, pidstate bigint, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO base.city(code,name,idstate,active,delete) VALUES (pcode,pname,pidstate,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 386 (class 1255 OID 44463)
-- Name: isspinsentityclass(character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspinsentityclass(pcode character varying, pname character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO base.entityclass(code,name,active,delete) VALUES (pcode,pname,pactive,pdelete) ;  END; $$;


--
-- TOC entry 387 (class 1255 OID 44464)
-- Name: isspinsentityclassid(character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspinsentityclassid(pcode character varying, pname character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO base.entityclass(code,name,active,delete) VALUES (pcode,pname,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 379 (class 1255 OID 44456)
-- Name: isspinsentitysubclass(character varying, character varying, bigint, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspinsentitysubclass(pcode character varying, pname character varying, pidentityclass bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO base.entitysubclass(code,name,identityclass,active,delete) VALUES (pcode,pname,pidentityclass,pactive,pdelete) ;  END; $$;


--
-- TOC entry 380 (class 1255 OID 44457)
-- Name: isspinsentitysubclassid(character varying, character varying, bigint, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspinsentitysubclassid(pcode character varying, pname character varying, pidentityclass bigint, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO base.entitysubclass(code,name,identityclass,active,delete) VALUES (pcode,pname,pidentityclass,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 400 (class 1255 OID 44477)
-- Name: isspinsstate(character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspinsstate(pcode character varying, pname character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO base.state(code,name,active,delete) VALUES (pcode,pname,pactive,pdelete) ;  END; $$;


--
-- TOC entry 401 (class 1255 OID 44478)
-- Name: isspinsstateid(character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspinsstateid(pcode character varying, pname character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO base.state(code,name,active,delete) VALUES (pcode,pname,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 396 (class 1255 OID 44473)
-- Name: isspupdcity(bigint, character varying, character varying, bigint, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspupdcity(pid bigint, pcode character varying, pname character varying, pidstate bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE base.city SET code = pcode,name = pname,idstate = pidstate,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 389 (class 1255 OID 44466)
-- Name: isspupdentityclass(bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspupdentityclass(pid bigint, pcode character varying, pname character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE base.entityclass SET code = pcode,name = pname,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 382 (class 1255 OID 44459)
-- Name: isspupdentitysubclass(bigint, character varying, character varying, bigint, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspupdentitysubclass(pid bigint, pcode character varying, pname character varying, pidentityclass bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE base.entitysubclass SET code = pcode,name = pname,identityclass = pidentityclass,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 403 (class 1255 OID 44480)
-- Name: isspupdstate(bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: base; Owner: -
--

CREATE FUNCTION base.isspupdstate(pid bigint, pcode character varying, pname character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE base.state SET code = pcode,name = pname,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 197 (class 1259 OID 27402)
-- Name: address; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.address (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    buildingnumber character varying(100),
    suburb character varying(100),
    municipality character varying(100),
    postalcode character varying(10),
    idaddresstype bigint NOT NULL,
    idstate bigint,
    idcity bigint,
    street character varying(100),
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 411 (class 1255 OID 44488)
-- Name: isspgetaddress(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetaddress() RETURNS SETOF core.address
    LANGUAGE plpgsql
    AS $$ DECLARE r core.address%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.address ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 409 (class 1255 OID 44486)
-- Name: isspgetaddress(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetaddress(pkey bigint) RETURNS SETOF core.address
    LANGUAGE plpgsql
    AS $$ DECLARE r core.address%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.address WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 412 (class 1255 OID 44489)
-- Name: isspgetaddressbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetaddressbyname(gval character varying) RETURNS SETOF core.address
    LANGUAGE plpgsql
    AS $$ DECLARE r core.address%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.address WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 413 (class 1255 OID 44490)
-- Name: isspgetaddressidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetaddressidbyname(gval character varying) RETURNS SETOF core.address
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.address WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 181 (class 1259 OID 27090)
-- Name: consultant; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.consultant (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    idcard character varying(20) NOT NULL,
    curp character varying(20),
    firstname character varying(50) NOT NULL,
    middlename character varying(50),
    lastname character varying(50) NOT NULL,
    secondsurname character varying(50),
    registernumber character varying(30),
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 418 (class 1255 OID 44495)
-- Name: isspgetconsultant(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetconsultant() RETURNS SETOF core.consultant
    LANGUAGE plpgsql
    AS $$ DECLARE r core.consultant%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.consultant ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 416 (class 1255 OID 44493)
-- Name: isspgetconsultant(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetconsultant(pkey bigint) RETURNS SETOF core.consultant
    LANGUAGE plpgsql
    AS $$ DECLARE r core.consultant%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.consultant WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 419 (class 1255 OID 44496)
-- Name: isspgetconsultantbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetconsultantbyname(gval character varying) RETURNS SETOF core.consultant
    LANGUAGE plpgsql
    AS $$ DECLARE r core.consultant%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.consultant WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 420 (class 1255 OID 44497)
-- Name: isspgetconsultantidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetconsultantidbyname(gval character varying) RETURNS SETOF core.consultant
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.consultant WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 201 (class 1259 OID 43629)
-- Name: consultingenterprise; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.consultingenterprise (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    idpartyconsultant bigint NOT NULL,
    idpartyenterprise bigint NOT NULL,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 425 (class 1255 OID 44502)
-- Name: isspgetconsultingenterprise(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetconsultingenterprise() RETURNS SETOF core.consultingenterprise
    LANGUAGE plpgsql
    AS $$ DECLARE r core.consultingenterprise%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.consultingenterprise ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 423 (class 1255 OID 44500)
-- Name: isspgetconsultingenterprise(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetconsultingenterprise(pkey bigint) RETURNS SETOF core.consultingenterprise
    LANGUAGE plpgsql
    AS $$ DECLARE r core.consultingenterprise%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.consultingenterprise WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 426 (class 1255 OID 44503)
-- Name: isspgetconsultingenterprisebyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetconsultingenterprisebyname(gval character varying) RETURNS SETOF core.consultingenterprise
    LANGUAGE plpgsql
    AS $$ DECLARE r core.consultingenterprise%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.consultingenterprise WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 427 (class 1255 OID 44504)
-- Name: isspgetconsultingenterpriseidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetconsultingenterpriseidbyname(gval character varying) RETURNS SETOF core.consultingenterprise
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.consultingenterprise WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 191 (class 1259 OID 27140)
-- Name: document; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.document (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint,
    iddocumenttype bigint,
    iddocumentstatus bigint,
    path character varying(255),
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 433 (class 1255 OID 44509)
-- Name: isspgetdocument(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetdocument() RETURNS SETOF core.document
    LANGUAGE plpgsql
    AS $$ DECLARE r core.document%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.document ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 431 (class 1255 OID 44507)
-- Name: isspgetdocument(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetdocument(pkey bigint) RETURNS SETOF core.document
    LANGUAGE plpgsql
    AS $$ DECLARE r core.document%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.document WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 434 (class 1255 OID 44510)
-- Name: isspgetdocumentbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetdocumentbyname(gval character varying) RETURNS SETOF core.document
    LANGUAGE plpgsql
    AS $$ DECLARE r core.document%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.document WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 435 (class 1255 OID 44511)
-- Name: isspgetdocumentidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetdocumentidbyname(gval character varying) RETURNS SETOF core.document
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.document WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 189 (class 1259 OID 27130)
-- Name: email; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.email (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    idemailtype bigint NOT NULL,
    content character varying(50) NOT NULL,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 440 (class 1255 OID 44516)
-- Name: isspgetemail(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetemail() RETURNS SETOF core.email
    LANGUAGE plpgsql
    AS $$ DECLARE r core.email%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.email ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 438 (class 1255 OID 44514)
-- Name: isspgetemail(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetemail(pkey bigint) RETURNS SETOF core.email
    LANGUAGE plpgsql
    AS $$ DECLARE r core.email%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.email WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 441 (class 1255 OID 44517)
-- Name: isspgetemailbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetemailbyname(gval character varying) RETURNS SETOF core.email
    LANGUAGE plpgsql
    AS $$ DECLARE r core.email%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.email WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 442 (class 1255 OID 44518)
-- Name: isspgetemailidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetemailidbyname(gval character varying) RETURNS SETOF core.email
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.email WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 229 (class 1259 OID 44184)
-- Name: enterprise; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.enterprise (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    bussinesname character varying(255),
    buildingnamenumber character varying(50),
    landsurface double precision,
    buildedsurface double precision,
    buildingheight double precision,
    legalrepresentative character varying(255),
    manager character varying(255),
    responsiblepipc character varying(255),
    economicactivity character varying(255),
    permanentshedule character varying(255),
    buildingage bigint,
    numemployees bigint,
    numbrigadista bigint,
    numlevels bigint,
    areadata character varying(255),
    maxcapacity character varying(255),
    accidentinsurance character varying(1) DEFAULT 'N'::character varying,
    insurancecompany character varying(255),
    numextinguisherspqs bigint,
    numextinguishersco2 bigint,
    numextinguishersh20 bigint,
    numextinguishersothers bigint,
    companysecurityprovider character varying(255),
    securityofficer character varying(255),
    nummorningsecurityelements bigint,
    numeveningsecurityelements bigint,
    numnightsecurityelements bigint,
    structuralopinion character varying(1),
    datestructuralopinion character varying(50),
    electricopinion character varying(1),
    dateelectricopinion character varying(50),
    firenetwork character varying(1),
    numhydrants bigint,
    tankcapacity double precision,
    percenttankfire double precision,
    alertsystem character varying(1),
    firedetection character varying(1),
    fireprotectionequipment character varying(1),
    capacityfireprotectionequipment double precision,
    autonomousbreathingequipment character varying(1),
    gastanklpstationary character varying(1),
    capacitygastanklpstationary double precision,
    gastanklpnotstationary character varying(1),
    howgastanklpnotstationar double precision,
    lpgasopinion character varying(1),
    datelpgasopinion character varying(50),
    flammablegases character varying(1),
    quantityflammablegases double precision,
    flammableliquids character varying(1),
    quantityflammableliquids double precision,
    combustibleliquids character varying(1),
    quantitycombustibleliquids double precision,
    combustiblesolids character varying(1),
    quantitycombustiblesolids double precision,
    explosivematerial character varying(1),
    quantityexplosivematerial double precision,
    electricsubstation character varying(1),
    capacityelectricsubstation double precision,
    codebranch character varying(20),
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 446 (class 1255 OID 44526)
-- Name: isspgetenterprise(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetenterprise() RETURNS SETOF core.enterprise
    LANGUAGE plpgsql
    AS $$ DECLARE r core.enterprise%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.enterprise ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 429 (class 1255 OID 44523)
-- Name: isspgetenterprise(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetenterprise(pkey bigint) RETURNS SETOF core.enterprise
    LANGUAGE plpgsql
    AS $$ DECLARE r core.enterprise%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.enterprise WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 447 (class 1255 OID 44527)
-- Name: isspgetenterprisebyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetenterprisebyname(gval character varying) RETURNS SETOF core.enterprise
    LANGUAGE plpgsql
    AS $$ DECLARE r core.enterprise%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.enterprise WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 448 (class 1255 OID 44528)
-- Name: isspgetenterpriseidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetenterpriseidbyname(gval character varying) RETURNS SETOF core.enterprise
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.enterprise WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 179 (class 1259 OID 27080)
-- Name: party; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.party (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    username character varying(25),
    password character varying(50) NOT NULL,
    rfc character varying(20) NOT NULL,
    registerdate timestamp(0) without time zone,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 453 (class 1255 OID 44533)
-- Name: isspgetparty(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetparty() RETURNS SETOF core.party
    LANGUAGE plpgsql
    AS $$ DECLARE r core.party%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.party ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 451 (class 1255 OID 44531)
-- Name: isspgetparty(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetparty(pkey bigint) RETURNS SETOF core.party
    LANGUAGE plpgsql
    AS $$ DECLARE r core.party%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.party WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 454 (class 1255 OID 44534)
-- Name: isspgetpartybyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetpartybyname(gval character varying) RETURNS SETOF core.party
    LANGUAGE plpgsql
    AS $$ DECLARE r core.party%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.party WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 455 (class 1255 OID 44535)
-- Name: isspgetpartyidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetpartyidbyname(gval character varying) RETURNS SETOF core.party
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.party WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 187 (class 1259 OID 27120)
-- Name: phone; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.phone (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    idphonetype bigint NOT NULL,
    content text NOT NULL,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 460 (class 1255 OID 44540)
-- Name: isspgetphone(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetphone() RETURNS SETOF core.phone
    LANGUAGE plpgsql
    AS $$ DECLARE r core.phone%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.phone ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 458 (class 1255 OID 44538)
-- Name: isspgetphone(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetphone(pkey bigint) RETURNS SETOF core.phone
    LANGUAGE plpgsql
    AS $$ DECLARE r core.phone%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.phone WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 461 (class 1255 OID 44541)
-- Name: isspgetphonebyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetphonebyname(gval character varying) RETURNS SETOF core.phone
    LANGUAGE plpgsql
    AS $$ DECLARE r core.phone%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.phone WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 462 (class 1255 OID 44542)
-- Name: isspgetphoneidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetphoneidbyname(gval character varying) RETURNS SETOF core.phone
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.phone WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 227 (class 1259 OID 43879)
-- Name: securityplancomplements; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplancomplements (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    infosignaling text,
    definitionsignaling text,
    locationsignaling text,
    maintenancesignaling text,
    simulationexercise text,
    helpsubprogram text,
    evacuationemergencyprocedure text,
    emergencytypes text,
    emergencyhurracaine text,
    emergencyflooding text,
    teamantifirefunctions text,
    recoversubprogram text,
    cometonormal text,
    attachments text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 268 (class 1255 OID 44726)
-- Name: isspgetsecurityplancomplements(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplancomplements() RETURNS SETOF core.securityplancomplements
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplancomplements%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplancomplements ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 266 (class 1255 OID 44724)
-- Name: isspgetsecurityplancomplements(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplancomplements(pkey bigint) RETURNS SETOF core.securityplancomplements
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplancomplements%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplancomplements WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 269 (class 1255 OID 44727)
-- Name: isspgetsecurityplancomplementsbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplancomplementsbyname(gval character varying) RETURNS SETOF core.securityplancomplements
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplancomplements%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplancomplements WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 270 (class 1255 OID 44728)
-- Name: isspgetsecurityplancomplementsidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplancomplementsidbyname(gval character varying) RETURNS SETOF core.securityplancomplements
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplancomplements WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 219 (class 1259 OID 43826)
-- Name: securityplanriskanalysysalarmsystem; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysysalarmsystem (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    systemactive text,
    controlactive text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 281 (class 1255 OID 44740)
-- Name: isspgetsecurityplanriskanalysysalarmsystem(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysalarmsystem() RETURNS SETOF core.securityplanriskanalysysalarmsystem
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysalarmsystem%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysalarmsystem ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 279 (class 1255 OID 44738)
-- Name: isspgetsecurityplanriskanalysysalarmsystem(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysalarmsystem(pkey bigint) RETURNS SETOF core.securityplanriskanalysysalarmsystem
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysalarmsystem%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysalarmsystem WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 282 (class 1255 OID 44741)
-- Name: isspgetsecurityplanriskanalysysalarmsystembyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysalarmsystembyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysalarmsystem
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysalarmsystem%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysalarmsystem WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 283 (class 1255 OID 44742)
-- Name: isspgetsecurityplanriskanalysysalarmsystemidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysalarmsystemidbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysalarmsystem
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplanriskanalysysalarmsystem WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 223 (class 1259 OID 43846)
-- Name: securityplanriskanalysysantifire; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysysantifire (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    quantity bigint,
    description text,
    locationc text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 290 (class 1255 OID 44747)
-- Name: isspgetsecurityplanriskanalysysantifire(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysantifire() RETURNS SETOF core.securityplanriskanalysysantifire
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysantifire%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysantifire ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 286 (class 1255 OID 44745)
-- Name: isspgetsecurityplanriskanalysysantifire(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysantifire(pkey bigint) RETURNS SETOF core.securityplanriskanalysysantifire
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysantifire%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysantifire WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 291 (class 1255 OID 44748)
-- Name: isspgetsecurityplanriskanalysysantifirebyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysantifirebyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysantifire
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysantifire%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysantifire WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 292 (class 1255 OID 44749)
-- Name: isspgetsecurityplanriskanalysysantifireidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysantifireidbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysantifire
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplanriskanalysysantifire WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 203 (class 1259 OID 43673)
-- Name: securityplanriskanalysyscomplements; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysyscomplements (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    municipaltake character varying(1),
    numdrains bigint,
    numsubtank bigint,
    subtankcapacity double precision,
    numaerialtank bigint,
    aerialtankcapacity double precision,
    galvanizedpipeline character varying(1),
    cooperpipeline character varying(1),
    electricbomb character varying(1),
    siamesevalve character varying(1),
    municipalwaternetwork character varying(1),
    riverdrain character varying(1),
    electricalinstall text,
    generalswitch character varying(1),
    secundaryswitch character varying(1),
    shutdowncontacts character varying(1),
    lightingsystem text,
    emercyelectricplant character varying(1),
    physicsearthsystem character varying(1),
    airwashequipment character varying(1),
    numfueltank bigint,
    dieseltankcapacity bigint,
    magnatankcapacity bigint,
    premiumtankcapacity bigint,
    installdate timestamp without time zone,
    warehouse character varying(1),
    storage character varying(1),
    adequatestowage text,
    deathfile character varying(1),
    openfile character varying(1),
    electricpower character varying(1),
    trashinstall text,
    trashtype text,
    automaticalarmsystem character varying(1),
    tvmonitoringsystem character varying(1),
    comunication character varying(1),
    internaldangerzone text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 299 (class 1255 OID 44754)
-- Name: isspgetsecurityplanriskanalysyscomplements(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysyscomplements() RETURNS SETOF core.securityplanriskanalysyscomplements
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysyscomplements%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysyscomplements ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 296 (class 1255 OID 44752)
-- Name: isspgetsecurityplanriskanalysyscomplements(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysyscomplements(pkey bigint) RETURNS SETOF core.securityplanriskanalysyscomplements
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysyscomplements%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysyscomplements WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 300 (class 1255 OID 44755)
-- Name: isspgetsecurityplanriskanalysyscomplementsbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysyscomplementsbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysyscomplements
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysyscomplements%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysyscomplements WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 301 (class 1255 OID 44756)
-- Name: isspgetsecurityplanriskanalysyscomplementsidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysyscomplementsidbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysyscomplements
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplanriskanalysyscomplements WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 225 (class 1259 OID 43856)
-- Name: securityplanriskanalysysdirectives; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysysdirectives (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    directive text,
    controlc text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 309 (class 1255 OID 44782)
-- Name: isspgetsecurityplanriskanalysysdirectives(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysdirectives() RETURNS SETOF core.securityplanriskanalysysdirectives
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysdirectives%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysdirectives ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 307 (class 1255 OID 44780)
-- Name: isspgetsecurityplanriskanalysysdirectives(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysdirectives(pkey bigint) RETURNS SETOF core.securityplanriskanalysysdirectives
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysdirectives%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysdirectives WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 310 (class 1255 OID 44783)
-- Name: isspgetsecurityplanriskanalysysdirectivesbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysdirectivesbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysdirectives
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysdirectives%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysdirectives WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 311 (class 1255 OID 44784)
-- Name: isspgetsecurityplanriskanalysysdirectivesidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysdirectivesidbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysdirectives
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplanriskanalysysdirectives WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 213 (class 1259 OID 43793)
-- Name: securityplanriskanalysysdirectory; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysysdirectory (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    personname text,
    "position" text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 316 (class 1255 OID 44789)
-- Name: isspgetsecurityplanriskanalysysdirectory(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysdirectory() RETURNS SETOF core.securityplanriskanalysysdirectory
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysdirectory%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysdirectory ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 314 (class 1255 OID 44787)
-- Name: isspgetsecurityplanriskanalysysdirectory(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysdirectory(pkey bigint) RETURNS SETOF core.securityplanriskanalysysdirectory
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysdirectory%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysdirectory WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 317 (class 1255 OID 44790)
-- Name: isspgetsecurityplanriskanalysysdirectorybyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysdirectorybyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysdirectory
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysdirectory%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysdirectory WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 318 (class 1255 OID 44791)
-- Name: isspgetsecurityplanriskanalysysdirectoryidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysdirectoryidbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysdirectory
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplanriskanalysysdirectory WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 217 (class 1259 OID 43813)
-- Name: securityplanriskanalysysmisc; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysysmisc (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    securityequipment text,
    generalrecomendations text,
    securitymeasures text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 326 (class 1255 OID 44803)
-- Name: isspgetsecurityplanriskanalysysmisc(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysmisc() RETURNS SETOF core.securityplanriskanalysysmisc
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysmisc%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysmisc ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 324 (class 1255 OID 44801)
-- Name: isspgetsecurityplanriskanalysysmisc(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysmisc(pkey bigint) RETURNS SETOF core.securityplanriskanalysysmisc
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysmisc%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysmisc WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 327 (class 1255 OID 44804)
-- Name: isspgetsecurityplanriskanalysysmiscbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysmiscbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysmisc
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysmisc%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysmisc WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 328 (class 1255 OID 44805)
-- Name: isspgetsecurityplanriskanalysysmiscidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysmiscidbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysmisc
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplanriskanalysysmisc WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 215 (class 1259 OID 43803)
-- Name: securityplanriskanalysysstrategiclocations; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysysstrategiclocations (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    description text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 333 (class 1255 OID 44810)
-- Name: isspgetsecurityplanriskanalysysstrategiclocations(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysstrategiclocations() RETURNS SETOF core.securityplanriskanalysysstrategiclocations
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysstrategiclocations%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysstrategiclocations ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 331 (class 1255 OID 44808)
-- Name: isspgetsecurityplanriskanalysysstrategiclocations(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysstrategiclocations(pkey bigint) RETURNS SETOF core.securityplanriskanalysysstrategiclocations
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysstrategiclocations%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysstrategiclocations WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 334 (class 1255 OID 44811)
-- Name: isspgetsecurityplanriskanalysysstrategiclocationsbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysstrategiclocationsbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysstrategiclocations
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplanriskanalysysstrategiclocations%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplanriskanalysysstrategiclocations WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 335 (class 1255 OID 44812)
-- Name: isspgetsecurityplanriskanalysysstrategiclocationsidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplanriskanalysysstrategiclocationsidbyname(gval character varying) RETURNS SETOF core.securityplanriskanalysysstrategiclocations
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplanriskanalysysstrategiclocations WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 231 (class 1259 OID 44203)
-- Name: securityplansitelocation; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplansitelocation (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    legalframework text,
    justification text,
    objetives text,
    scope text,
    sitelocation text,
    northstreet text,
    southstreet text,
    eaststreet text,
    weststreet text,
    northbuilding text,
    southbuilding text,
    eastbuilding text,
    westbuilding text,
    identificationstrategicfacilities text,
    explosionsimulation text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 340 (class 1255 OID 44817)
-- Name: isspgetsecurityplansitelocation(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplansitelocation() RETURNS SETOF core.securityplansitelocation
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplansitelocation%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplansitelocation ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 338 (class 1255 OID 44815)
-- Name: isspgetsecurityplansitelocation(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplansitelocation(pkey bigint) RETURNS SETOF core.securityplansitelocation
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplansitelocation%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplansitelocation WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 341 (class 1255 OID 44818)
-- Name: isspgetsecurityplansitelocationbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplansitelocationbyname(gval character varying) RETURNS SETOF core.securityplansitelocation
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplansitelocation%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplansitelocation WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 342 (class 1255 OID 44819)
-- Name: isspgetsecurityplansitelocationidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplansitelocationidbyname(gval character varying) RETURNS SETOF core.securityplansitelocation
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplansitelocation WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 207 (class 1259 OID 43714)
-- Name: securityplansubprogram; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplansubprogram (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint,
    info text,
    uipcheadlinename text,
    uipccoordinatorname text,
    uipcchiefname text,
    uipcfirstaidbrigadechiefname text,
    uipcantifirebrigadename text,
    uipcevacuationbrigadename text,
    uipcsearchbrigadename text,
    infobrigade text,
    infoorganizationchart text,
    infobrigadeorganization text,
    moretenemployments character varying(1),
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 347 (class 1255 OID 44824)
-- Name: isspgetsecurityplansubprogram(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplansubprogram() RETURNS SETOF core.securityplansubprogram
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplansubprogram%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplansubprogram ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 345 (class 1255 OID 44822)
-- Name: isspgetsecurityplansubprogram(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplansubprogram(pkey bigint) RETURNS SETOF core.securityplansubprogram
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplansubprogram%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplansubprogram WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 348 (class 1255 OID 44825)
-- Name: isspgetsecurityplansubprogrambyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplansubprogrambyname(gval character varying) RETURNS SETOF core.securityplansubprogram
    LANGUAGE plpgsql
    AS $$ DECLARE r core.securityplansubprogram%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.securityplansubprogram WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 349 (class 1255 OID 44826)
-- Name: isspgetsecurityplansubprogramidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetsecurityplansubprogramidbyname(gval character varying) RETURNS SETOF core.securityplansubprogram
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.securityplansubprogram WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 177 (class 1259 OID 27070)
-- Name: template_base; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.template_base (
    id bigint NOT NULL,
    code character varying(50),
    name character varying(50),
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 358 (class 1255 OID 43537)
-- Name: isspgettemplate_base(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgettemplate_base() RETURNS SETOF core.template_base
    LANGUAGE plpgsql
    AS $$ DECLARE r core.template_base%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.template_base ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 356 (class 1255 OID 43535)
-- Name: isspgettemplate_base(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgettemplate_base(pkey bigint) RETURNS SETOF core.template_base
    LANGUAGE plpgsql
    AS $$ DECLARE r core.template_base%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.template_base WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 359 (class 1255 OID 43538)
-- Name: isspgettemplate_basebyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgettemplate_basebyname(gval character varying) RETURNS SETOF core.template_base
    LANGUAGE plpgsql
    AS $$ DECLARE r core.template_base%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.template_base WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 360 (class 1255 OID 43539)
-- Name: isspgettemplate_baseidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgettemplate_baseidbyname(gval character varying) RETURNS SETOF core.template_base
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.template_base WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 209 (class 1259 OID 43733)
-- Name: threatriskanalysys; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.threatriskanalysys (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint,
    idthreat bigint NOT NULL,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 361 (class 1255 OID 44831)
-- Name: isspgetthreatriskanalysys(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatriskanalysys() RETURNS SETOF core.threatriskanalysys
    LANGUAGE plpgsql
    AS $$ DECLARE r core.threatriskanalysys%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.threatriskanalysys ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 352 (class 1255 OID 44829)
-- Name: isspgetthreatriskanalysys(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatriskanalysys(pkey bigint) RETURNS SETOF core.threatriskanalysys
    LANGUAGE plpgsql
    AS $$ DECLARE r core.threatriskanalysys%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.threatriskanalysys WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 362 (class 1255 OID 44832)
-- Name: isspgetthreatriskanalysysbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatriskanalysysbyname(gval character varying) RETURNS SETOF core.threatriskanalysys
    LANGUAGE plpgsql
    AS $$ DECLARE r core.threatriskanalysys%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.threatriskanalysys WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 363 (class 1255 OID 44833)
-- Name: isspgetthreatriskanalysysidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatriskanalysysidbyname(gval character varying) RETURNS SETOF core.threatriskanalysys
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.threatriskanalysys WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 176 (class 1259 OID 27068)
-- Name: template_base_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.template_base_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2963 (class 0 OID 0)
-- Dependencies: 176
-- Name: template_base_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.template_base_id_seq OWNED BY core.template_base.id;


--
-- TOC entry 198 (class 1259 OID 43460)
-- Name: threats; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.threats (
    id bigint DEFAULT nextval('core.template_base_id_seq'::regclass) NOT NULL,
    code character varying(50),
    name character varying(50),
    description text NOT NULL,
    location text NOT NULL,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 368 (class 1255 OID 44838)
-- Name: isspgetthreats(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreats() RETURNS SETOF core.threats
    LANGUAGE plpgsql
    AS $$ DECLARE r core.threats%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.threats ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 366 (class 1255 OID 44836)
-- Name: isspgetthreats(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreats(pkey bigint) RETURNS SETOF core.threats
    LANGUAGE plpgsql
    AS $$ DECLARE r core.threats%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.threats WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 369 (class 1255 OID 44839)
-- Name: isspgetthreatsbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatsbyname(gval character varying) RETURNS SETOF core.threats
    LANGUAGE plpgsql
    AS $$ DECLARE r core.threats%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.threats WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 370 (class 1255 OID 44840)
-- Name: isspgetthreatsidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatsidbyname(gval character varying) RETURNS SETOF core.threats
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.threats WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 199 (class 1259 OID 43471)
-- Name: threatsitelocation; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.threatsitelocation (
    id bigint DEFAULT nextval('core.template_base_id_seq'::regclass) NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint,
    idsitelocation bigint NOT NULL,
    idthreat bigint NOT NULL,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 375 (class 1255 OID 44845)
-- Name: isspgetthreatsitelocation(); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatsitelocation() RETURNS SETOF core.threatsitelocation
    LANGUAGE plpgsql
    AS $$ DECLARE r core.threatsitelocation%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.threatsitelocation ORDER BY id LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 373 (class 1255 OID 44843)
-- Name: isspgetthreatsitelocation(bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatsitelocation(pkey bigint) RETURNS SETOF core.threatsitelocation
    LANGUAGE plpgsql
    AS $$ DECLARE r core.threatsitelocation%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.threatsitelocation WHERE id = pKey LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 376 (class 1255 OID 44846)
-- Name: isspgetthreatsitelocationbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatsitelocationbyname(gval character varying) RETURNS SETOF core.threatsitelocation
    LANGUAGE plpgsql
    AS $$ DECLARE r core.threatsitelocation%ROWTYPE; BEGIN  FOR r IN SELECT * FROM core.threatsitelocation WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 377 (class 1255 OID 44847)
-- Name: isspgetthreatsitelocationidbyname(character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspgetthreatsitelocationidbyname(gval character varying) RETURNS SETOF core.threatsitelocation
    LANGUAGE plpgsql
    AS $$ DECLARE r record; BEGIN  FOR r IN SELECT id FROM core.threatsitelocation WHERE UPPER(name) LIKE '%'||UPPER(gval)||'%'LOOP RETURN NEXT r; END LOOP; RETURN ;  END; $$;


--
-- TOC entry 407 (class 1255 OID 44484)
-- Name: isspinsaddress(character varying, character varying, bigint, character varying, character varying, character varying, character varying, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsaddress(pcode character varying, pname character varying, pidparty bigint, pbuildingnumber character varying, psuburb character varying, pmunicipality character varying, ppostalcode character varying, pidaddresstype bigint, pidstate bigint, pidcity bigint, pstreet character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.address(code,name,idparty,buildingnumber,suburb,municipality,postalcode,idaddresstype,idstate,idcity,street,active,delete) VALUES (pcode,pname,pidparty,pbuildingnumber,psuburb,pmunicipality,ppostalcode,pidaddresstype,pidstate,pidcity,pstreet,pactive,pdelete) ;  END; $$;


--
-- TOC entry 408 (class 1255 OID 44485)
-- Name: isspinsaddressid(character varying, character varying, bigint, character varying, character varying, character varying, character varying, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsaddressid(pcode character varying, pname character varying, pidparty bigint, pbuildingnumber character varying, psuburb character varying, pmunicipality character varying, ppostalcode character varying, pidaddresstype bigint, pidstate bigint, pidcity bigint, pstreet character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.address(code,name,idparty,buildingnumber,suburb,municipality,postalcode,idaddresstype,idstate,idcity,street,active,delete) VALUES (pcode,pname,pidparty,pbuildingnumber,psuburb,pmunicipality,ppostalcode,pidaddresstype,pidstate,pidcity,pstreet,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 414 (class 1255 OID 44491)
-- Name: isspinsconsultant(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsconsultant(pcode character varying, pname character varying, pidparty bigint, pidcard character varying, pcurp character varying, pfirstname character varying, pmiddlename character varying, plastname character varying, psecondsurname character varying, pregisternumber character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.consultant(code,name,idparty,idcard,curp,firstname,middlename,lastname,secondsurname,registernumber,active,delete) VALUES (pcode,pname,pidparty,pidcard,pcurp,pfirstname,pmiddlename,plastname,psecondsurname,pregisternumber,pactive,pdelete) ;  END; $$;


--
-- TOC entry 415 (class 1255 OID 44492)
-- Name: isspinsconsultantid(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsconsultantid(pcode character varying, pname character varying, pidparty bigint, pidcard character varying, pcurp character varying, pfirstname character varying, pmiddlename character varying, plastname character varying, psecondsurname character varying, pregisternumber character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.consultant(code,name,idparty,idcard,curp,firstname,middlename,lastname,secondsurname,registernumber,active,delete) VALUES (pcode,pname,pidparty,pidcard,pcurp,pfirstname,pmiddlename,plastname,psecondsurname,pregisternumber,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 421 (class 1255 OID 44498)
-- Name: isspinsconsultingenterprise(character varying, character varying, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsconsultingenterprise(pcode character varying, pname character varying, pidpartyconsultant bigint, pidpartyenterprise bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.consultingenterprise(code,name,idpartyconsultant,idpartyenterprise,active,delete) VALUES (pcode,pname,pidpartyconsultant,pidpartyenterprise,pactive,pdelete) ;  END; $$;


--
-- TOC entry 422 (class 1255 OID 44499)
-- Name: isspinsconsultingenterpriseid(character varying, character varying, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsconsultingenterpriseid(pcode character varying, pname character varying, pidpartyconsultant bigint, pidpartyenterprise bigint, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.consultingenterprise(code,name,idpartyconsultant,idpartyenterprise,active,delete) VALUES (pcode,pname,pidpartyconsultant,pidpartyenterprise,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 428 (class 1255 OID 44505)
-- Name: isspinsdocument(character varying, character varying, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsdocument(pcode character varying, pname character varying, pidparty bigint, piddocumenttype bigint, piddocumentstatus bigint, ppath character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.document(code,name,idparty,iddocumenttype,iddocumentstatus,path,active,delete) VALUES (pcode,pname,pidparty,piddocumenttype,piddocumentstatus,ppath,pactive,pdelete) ;  END; $$;


--
-- TOC entry 430 (class 1255 OID 44506)
-- Name: isspinsdocumentid(character varying, character varying, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsdocumentid(pcode character varying, pname character varying, pidparty bigint, piddocumenttype bigint, piddocumentstatus bigint, ppath character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.document(code,name,idparty,iddocumenttype,iddocumentstatus,path,active,delete) VALUES (pcode,pname,pidparty,piddocumenttype,piddocumentstatus,ppath,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 436 (class 1255 OID 44512)
-- Name: isspinsemail(character varying, character varying, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsemail(pcode character varying, pname character varying, pidparty bigint, pidemailtype bigint, pcontent character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.email(code,name,idparty,idemailtype,content,active,delete) VALUES (pcode,pname,pidparty,pidemailtype,pcontent,pactive,pdelete) ;  END; $$;


--
-- TOC entry 437 (class 1255 OID 44513)
-- Name: isspinsemailid(character varying, character varying, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsemailid(pcode character varying, pname character varying, pidparty bigint, pidemailtype bigint, pcontent character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.email(code,name,idparty,idemailtype,content,active,delete) VALUES (pcode,pname,pidparty,pidemailtype,pcontent,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 443 (class 1255 OID 44519)
-- Name: isspinsenterprise(character varying, character varying, bigint, character varying, character varying, double precision, double precision, double precision, character varying, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, character varying, character varying, bigint, bigint, bigint, character varying, character varying, character varying, character varying, character varying, bigint, double precision, double precision, character varying, character varying, character varying, double precision, character varying, character varying, double precision, character varying, double precision, character varying, character varying, character varying, double precision, character varying, double precision, character varying, double precision, character varying, double precision, character varying, double precision, character varying, double precision, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsenterprise(pcode character varying, pname character varying, pidparty bigint, pbussinesname character varying, pbuildingnamenumber character varying, plandsurface double precision, pbuildedsurface double precision, pbuildingheight double precision, plegalrepresentative character varying, pmanager character varying, presponsiblepipc character varying, peconomicactivity character varying, ppermanentshedule character varying, pbuildingage bigint, pnumemployees bigint, pnumbrigadista bigint, pnumlevels bigint, pareadata character varying, pmaxcapacity character varying, paccidentinsurance character varying, pinsurancecompany character varying, pnumextinguisherspqs bigint, pnumextinguishersco2 bigint, pnumextinguishersh20 bigint, pnumextinguishersothers bigint, pcompanysecurityprovider character varying, psecurityofficer character varying, pnummorningsecurityelements bigint, pnumeveningsecurityelements bigint, pnumnightsecurityelements bigint, pstructuralopinion character varying, pdatestructuralopinion character varying, pelectricopinion character varying, pdateelectricopinion character varying, pfirenetwork character varying, pnumhydrants bigint, ptankcapacity double precision, ppercenttankfire double precision, palertsystem character varying, pfiredetection character varying, pfireprotectionequipment character varying, pcapacityfireprotectionequipment double precision, pautonomousbreathingequipment character varying, pgastanklpstationary character varying, pcapacitygastanklpstationary double precision, pgastanklpnotstationary character varying, phowgastanklpnotstationar double precision, plpgasopinion character varying, pdatelpgasopinion character varying, pflammablegases character varying, pquantityflammablegases double precision, pflammableliquids character varying, pquantityflammableliquids double precision, pcombustibleliquids character varying, pquantitycombustibleliquids double precision, pcombustiblesolids character varying, pquantitycombustiblesolids double precision, pexplosivematerial character varying, pquantityexplosivematerial double precision, pelectricsubstation character varying, pcapacityelectricsubstation double precision, pcodebranch character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.enterprise(code,name,idparty,bussinesname,buildingnamenumber,landsurface,buildedsurface,buildingheight,legalrepresentative,manager,responsiblepipc,economicactivity,permanentshedule,buildingage,numemployees,numbrigadista,numlevels,areadata,maxcapacity,accidentinsurance,insurancecompany,numextinguisherspqs,numextinguishersco2,numextinguishersh20,numextinguishersothers,companysecurityprovider,securityofficer,nummorningsecurityelements,numeveningsecurityelements,numnightsecurityelements,structuralopinion,datestructuralopinion,electricopinion,dateelectricopinion,firenetwork,numhydrants,tankcapacity,percenttankfire,alertsystem,firedetection,fireprotectionequipment,capacityfireprotectionequipment,autonomousbreathingequipment,gastanklpstationary,capacitygastanklpstationary,gastanklpnotstationary,howgastanklpnotstationar,lpgasopinion,datelpgasopinion,flammablegases,quantityflammablegases,flammableliquids,quantityflammableliquids,combustibleliquids,quantitycombustibleliquids,combustiblesolids,quantitycombustiblesolids,explosivematerial,quantityexplosivematerial,electricsubstation,capacityelectricsubstation,codebranch,active,delete) VALUES (pcode,pname,pidparty,pbussinesname,pbuildingnamenumber,plandsurface,pbuildedsurface,pbuildingheight,plegalrepresentative,pmanager,presponsiblepipc,peconomicactivity,ppermanentshedule,pbuildingage,pnumemployees,pnumbrigadista,pnumlevels,pareadata,pmaxcapacity,paccidentinsurance,pinsurancecompany,pnumextinguisherspqs,pnumextinguishersco2,pnumextinguishersh20,pnumextinguishersothers,pcompanysecurityprovider,psecurityofficer,pnummorningsecurityelements,pnumeveningsecurityelements,pnumnightsecurityelements,pstructuralopinion,pdatestructuralopinion,pelectricopinion,pdateelectricopinion,pfirenetwork,pnumhydrants,ptankcapacity,ppercenttankfire,palertsystem,pfiredetection,pfireprotectionequipment,pcapacityfireprotectionequipment,pautonomousbreathingequipment,pgastanklpstationary,pcapacitygastanklpstationary,pgastanklpnotstationary,phowgastanklpnotstationar,plpgasopinion,pdatelpgasopinion,pflammablegases,pquantityflammablegases,pflammableliquids,pquantityflammableliquids,pcombustibleliquids,pquantitycombustibleliquids,pcombustiblesolids,pquantitycombustiblesolids,pexplosivematerial,pquantityexplosivematerial,pelectricsubstation,pcapacityelectricsubstation,pcodebranch,pactive,pdelete) ;  END; $$;


--
-- TOC entry 444 (class 1255 OID 44521)
-- Name: isspinsenterpriseid(character varying, character varying, bigint, character varying, character varying, double precision, double precision, double precision, character varying, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, character varying, character varying, bigint, bigint, bigint, character varying, character varying, character varying, character varying, character varying, bigint, double precision, double precision, character varying, character varying, character varying, double precision, character varying, character varying, double precision, character varying, double precision, character varying, character varying, character varying, double precision, character varying, double precision, character varying, double precision, character varying, double precision, character varying, double precision, character varying, double precision, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsenterpriseid(pcode character varying, pname character varying, pidparty bigint, pbussinesname character varying, pbuildingnamenumber character varying, plandsurface double precision, pbuildedsurface double precision, pbuildingheight double precision, plegalrepresentative character varying, pmanager character varying, presponsiblepipc character varying, peconomicactivity character varying, ppermanentshedule character varying, pbuildingage bigint, pnumemployees bigint, pnumbrigadista bigint, pnumlevels bigint, pareadata character varying, pmaxcapacity character varying, paccidentinsurance character varying, pinsurancecompany character varying, pnumextinguisherspqs bigint, pnumextinguishersco2 bigint, pnumextinguishersh20 bigint, pnumextinguishersothers bigint, pcompanysecurityprovider character varying, psecurityofficer character varying, pnummorningsecurityelements bigint, pnumeveningsecurityelements bigint, pnumnightsecurityelements bigint, pstructuralopinion character varying, pdatestructuralopinion character varying, pelectricopinion character varying, pdateelectricopinion character varying, pfirenetwork character varying, pnumhydrants bigint, ptankcapacity double precision, ppercenttankfire double precision, palertsystem character varying, pfiredetection character varying, pfireprotectionequipment character varying, pcapacityfireprotectionequipment double precision, pautonomousbreathingequipment character varying, pgastanklpstationary character varying, pcapacitygastanklpstationary double precision, pgastanklpnotstationary character varying, phowgastanklpnotstationar double precision, plpgasopinion character varying, pdatelpgasopinion character varying, pflammablegases character varying, pquantityflammablegases double precision, pflammableliquids character varying, pquantityflammableliquids double precision, pcombustibleliquids character varying, pquantitycombustibleliquids double precision, pcombustiblesolids character varying, pquantitycombustiblesolids double precision, pexplosivematerial character varying, pquantityexplosivematerial double precision, pelectricsubstation character varying, pcapacityelectricsubstation double precision, pcodebranch character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.enterprise(code,name,idparty,bussinesname,buildingnamenumber,landsurface,buildedsurface,buildingheight,legalrepresentative,manager,responsiblepipc,economicactivity,permanentshedule,buildingage,numemployees,numbrigadista,numlevels,areadata,maxcapacity,accidentinsurance,insurancecompany,numextinguisherspqs,numextinguishersco2,numextinguishersh20,numextinguishersothers,companysecurityprovider,securityofficer,nummorningsecurityelements,numeveningsecurityelements,numnightsecurityelements,structuralopinion,datestructuralopinion,electricopinion,dateelectricopinion,firenetwork,numhydrants,tankcapacity,percenttankfire,alertsystem,firedetection,fireprotectionequipment,capacityfireprotectionequipment,autonomousbreathingequipment,gastanklpstationary,capacitygastanklpstationary,gastanklpnotstationary,howgastanklpnotstationar,lpgasopinion,datelpgasopinion,flammablegases,quantityflammablegases,flammableliquids,quantityflammableliquids,combustibleliquids,quantitycombustibleliquids,combustiblesolids,quantitycombustiblesolids,explosivematerial,quantityexplosivematerial,electricsubstation,capacityelectricsubstation,codebranch,active,delete) VALUES (pcode,pname,pidparty,pbussinesname,pbuildingnamenumber,plandsurface,pbuildedsurface,pbuildingheight,plegalrepresentative,pmanager,presponsiblepipc,peconomicactivity,ppermanentshedule,pbuildingage,pnumemployees,pnumbrigadista,pnumlevels,pareadata,pmaxcapacity,paccidentinsurance,pinsurancecompany,pnumextinguisherspqs,pnumextinguishersco2,pnumextinguishersh20,pnumextinguishersothers,pcompanysecurityprovider,psecurityofficer,pnummorningsecurityelements,pnumeveningsecurityelements,pnumnightsecurityelements,pstructuralopinion,pdatestructuralopinion,pelectricopinion,pdateelectricopinion,pfirenetwork,pnumhydrants,ptankcapacity,ppercenttankfire,palertsystem,pfiredetection,pfireprotectionequipment,pcapacityfireprotectionequipment,pautonomousbreathingequipment,pgastanklpstationary,pcapacitygastanklpstationary,pgastanklpnotstationary,phowgastanklpnotstationar,plpgasopinion,pdatelpgasopinion,pflammablegases,pquantityflammablegases,pflammableliquids,pquantityflammableliquids,pcombustibleliquids,pquantitycombustibleliquids,pcombustiblesolids,pquantitycombustiblesolids,pexplosivematerial,pquantityexplosivematerial,pelectricsubstation,pcapacityelectricsubstation,pcodebranch,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 449 (class 1255 OID 44529)
-- Name: isspinsparty(character varying, character varying, character varying, character varying, character varying, timestamp without time zone, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsparty(pcode character varying, pname character varying, pusername character varying, ppassword character varying, prfc character varying, pregisterdate timestamp without time zone, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.party(code,name,username,password,rfc,registerdate,active,delete) VALUES (pcode,pname,pusername,ppassword,prfc,pregisterdate,pactive,pdelete) ;  END; $$;


--
-- TOC entry 450 (class 1255 OID 44530)
-- Name: isspinspartyid(character varying, character varying, character varying, character varying, character varying, timestamp without time zone, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinspartyid(pcode character varying, pname character varying, pusername character varying, ppassword character varying, prfc character varying, pregisterdate timestamp without time zone, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.party(code,name,username,password,rfc,registerdate,active,delete) VALUES (pcode,pname,pusername,ppassword,prfc,pregisterdate,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 456 (class 1255 OID 44536)
-- Name: isspinsphone(character varying, character varying, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsphone(pcode character varying, pname character varying, pidparty bigint, pidphonetype bigint, pcontent character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.phone(code,name,idparty,idphonetype,content,active,delete) VALUES (pcode,pname,pidparty,pidphonetype,pcontent,pactive,pdelete) ;  END; $$;


--
-- TOC entry 457 (class 1255 OID 44537)
-- Name: isspinsphoneid(character varying, character varying, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsphoneid(pcode character varying, pname character varying, pidparty bigint, pidphonetype bigint, pcontent character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.phone(code,name,idparty,idphonetype,content,active,delete) VALUES (pcode,pname,pidparty,pidphonetype,pcontent,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 463 (class 1255 OID 44543)
-- Name: isspinspictures(character varying, character varying, bigint, bytea, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinspictures(pcode character varying, pname character varying, pidparty bigint, pcontent bytea, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.pictures(code,name,idparty,content,active,delete) VALUES (pcode,pname,pidparty,pcontent,pactive,pdelete) ;  END; $$;


--
-- TOC entry 464 (class 1255 OID 44544)
-- Name: isspinspicturesid(character varying, character varying, bigint, bytea, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinspicturesid(pcode character varying, pname character varying, pidparty bigint, pcontent bytea, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.pictures(code,name,idparty,content,active,delete) VALUES (pcode,pname,pidparty,pcontent,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 261 (class 1255 OID 44722)
-- Name: isspinssecurityplancomplements(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplancomplements(pcode character varying, pname character varying, pidparty bigint, pinfosignaling character varying, pdefinitionsignaling character varying, plocationsignaling character varying, pmaintenancesignaling character varying, psimulationexercise character varying, phelpsubprogram character varying, pevacuationemergencyprocedure character varying, pemergencytypes character varying, pemergencyhurracaine character varying, pemergencyflooding character varying, pteamantifirefunctions character varying, precoversubprogram character varying, pcometonormal character varying, pattachments character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplancomplements(code,name,idparty,infosignaling,definitionsignaling,locationsignaling,maintenancesignaling,simulationexercise,helpsubprogram,evacuationemergencyprocedure,emergencytypes,emergencyhurracaine,emergencyflooding,teamantifirefunctions,recoversubprogram,cometonormal,attachments,active,delete) VALUES (pcode,pname,pidparty,pinfosignaling,pdefinitionsignaling,plocationsignaling,pmaintenancesignaling,psimulationexercise,phelpsubprogram,pevacuationemergencyprocedure,pemergencytypes,pemergencyhurracaine,pemergencyflooding,pteamantifirefunctions,precoversubprogram,pcometonormal,pattachments,pactive,pdelete) ;  END; $$;


--
-- TOC entry 263 (class 1255 OID 44723)
-- Name: isspinssecurityplancomplementsid(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplancomplementsid(pcode character varying, pname character varying, pidparty bigint, pinfosignaling character varying, pdefinitionsignaling character varying, plocationsignaling character varying, pmaintenancesignaling character varying, psimulationexercise character varying, phelpsubprogram character varying, pevacuationemergencyprocedure character varying, pemergencytypes character varying, pemergencyhurracaine character varying, pemergencyflooding character varying, pteamantifirefunctions character varying, precoversubprogram character varying, pcometonormal character varying, pattachments character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplancomplements(code,name,idparty,infosignaling,definitionsignaling,locationsignaling,maintenancesignaling,simulationexercise,helpsubprogram,evacuationemergencyprocedure,emergencytypes,emergencyhurracaine,emergencyflooding,teamantifirefunctions,recoversubprogram,cometonormal,attachments,active,delete) VALUES (pcode,pname,pidparty,pinfosignaling,pdefinitionsignaling,plocationsignaling,pmaintenancesignaling,psimulationexercise,phelpsubprogram,pevacuationemergencyprocedure,pemergencytypes,pemergencyhurracaine,pemergencyflooding,pteamantifirefunctions,precoversubprogram,pcometonormal,pattachments,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 271 (class 1255 OID 44729)
-- Name: isspinssecurityplanriskanalysis(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, character varying, character varying, character varying, character varying, character varying, double precision, double precision, double precision, double precision, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysis(pcode character varying, pname character varying, pidparty bigint, pinfo character varying, plocation character varying, pnorthstreet character varying, psouthstreet character varying, peaststreet character varying, pweststreet character varying, pnorthbuilding character varying, psouthbuilding character varying, peastbuilding character varying, pwestbuilding character varying, pvitalservices character varying, pidcimentation bigint, pidstructure bigint, pidwall bigint, pidroof bigint, pidfloor bigint, pidenjarre bigint, pidelectricalinstall bigint, pidhidrosanitaryinstall bigint, pidbathroomfurniture bigint, pidcanceleria bigint, piddoors bigint, pidstairs bigint, pidfinishesfloors bigint, pidfinisheswalls bigint, pidfinishesdoors bigint, pidfinishesstairs bigint, ppermanentcensus character varying, pfloatcensus character varying, pownproperty character varying, pleasedproperty character varying, potherproperty character varying, psurface double precision, pantiquity double precision, pnumlevel double precision, phighbuilding double precision, pgeotechnichallocation character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplanriskanalysis(code,name,idparty,info,location,northstreet,southstreet,eaststreet,weststreet,northbuilding,southbuilding,eastbuilding,westbuilding,vitalservices,idcimentation,idstructure,idwall,idroof,idfloor,idenjarre,idelectricalinstall,idhidrosanitaryinstall,idbathroomfurniture,idcanceleria,iddoors,idstairs,idfinishesfloors,idfinisheswalls,idfinishesdoors,idfinishesstairs,permanentcensus,floatcensus,ownproperty,leasedproperty,otherproperty,surface,antiquity,numlevel,highbuilding,geotechnichallocation,active,delete) VALUES (pcode,pname,pidparty,pinfo,plocation,pnorthstreet,psouthstreet,peaststreet,pweststreet,pnorthbuilding,psouthbuilding,peastbuilding,pwestbuilding,pvitalservices,pidcimentation,pidstructure,pidwall,pidroof,pidfloor,pidenjarre,pidelectricalinstall,pidhidrosanitaryinstall,pidbathroomfurniture,pidcanceleria,piddoors,pidstairs,pidfinishesfloors,pidfinisheswalls,pidfinishesdoors,pidfinishesstairs,ppermanentcensus,pfloatcensus,pownproperty,pleasedproperty,potherproperty,psurface,pantiquity,pnumlevel,phighbuilding,pgeotechnichallocation,pactive,pdelete) ;  END; $$;


--
-- TOC entry 273 (class 1255 OID 44730)
-- Name: isspinssecurityplanriskanalysisid(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, character varying, character varying, character varying, character varying, character varying, double precision, double precision, double precision, double precision, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysisid(pcode character varying, pname character varying, pidparty bigint, pinfo character varying, plocation character varying, pnorthstreet character varying, psouthstreet character varying, peaststreet character varying, pweststreet character varying, pnorthbuilding character varying, psouthbuilding character varying, peastbuilding character varying, pwestbuilding character varying, pvitalservices character varying, pidcimentation bigint, pidstructure bigint, pidwall bigint, pidroof bigint, pidfloor bigint, pidenjarre bigint, pidelectricalinstall bigint, pidhidrosanitaryinstall bigint, pidbathroomfurniture bigint, pidcanceleria bigint, piddoors bigint, pidstairs bigint, pidfinishesfloors bigint, pidfinisheswalls bigint, pidfinishesdoors bigint, pidfinishesstairs bigint, ppermanentcensus character varying, pfloatcensus character varying, pownproperty character varying, pleasedproperty character varying, potherproperty character varying, psurface double precision, pantiquity double precision, pnumlevel double precision, phighbuilding double precision, pgeotechnichallocation character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplanriskanalysis(code,name,idparty,info,location,northstreet,southstreet,eaststreet,weststreet,northbuilding,southbuilding,eastbuilding,westbuilding,vitalservices,idcimentation,idstructure,idwall,idroof,idfloor,idenjarre,idelectricalinstall,idhidrosanitaryinstall,idbathroomfurniture,idcanceleria,iddoors,idstairs,idfinishesfloors,idfinisheswalls,idfinishesdoors,idfinishesstairs,permanentcensus,floatcensus,ownproperty,leasedproperty,otherproperty,surface,antiquity,numlevel,highbuilding,geotechnichallocation,active,delete) VALUES (pcode,pname,pidparty,pinfo,plocation,pnorthstreet,psouthstreet,peaststreet,pweststreet,pnorthbuilding,psouthbuilding,peastbuilding,pwestbuilding,pvitalservices,pidcimentation,pidstructure,pidwall,pidroof,pidfloor,pidenjarre,pidelectricalinstall,pidhidrosanitaryinstall,pidbathroomfurniture,pidcanceleria,piddoors,pidstairs,pidfinishesfloors,pidfinisheswalls,pidfinishesdoors,pidfinishesstairs,ppermanentcensus,pfloatcensus,pownproperty,pleasedproperty,potherproperty,psurface,pantiquity,pnumlevel,phighbuilding,pgeotechnichallocation,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 276 (class 1255 OID 44736)
-- Name: isspinssecurityplanriskanalysysalarmsystem(character varying, character varying, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysalarmsystem(pcode character varying, pname character varying, pidparty bigint, psystemactive character varying, pcontrolactive character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplanriskanalysysalarmsystem(code,name,idparty,systemactive,controlactive,active,delete) VALUES (pcode,pname,pidparty,psystemactive,pcontrolactive,pactive,pdelete) ;  END; $$;


--
-- TOC entry 278 (class 1255 OID 44737)
-- Name: isspinssecurityplanriskanalysysalarmsystemid(character varying, character varying, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysalarmsystemid(pcode character varying, pname character varying, pidparty bigint, psystemactive character varying, pcontrolactive character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplanriskanalysysalarmsystem(code,name,idparty,systemactive,controlactive,active,delete) VALUES (pcode,pname,pidparty,psystemactive,pcontrolactive,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 284 (class 1255 OID 44743)
-- Name: isspinssecurityplanriskanalysysantifire(character varying, character varying, bigint, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysantifire(pcode character varying, pname character varying, pidparty bigint, pquantity bigint, pdescription character varying, plocationc character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplanriskanalysysantifire(code,name,idparty,quantity,description,locationc,active,delete) VALUES (pcode,pname,pidparty,pquantity,pdescription,plocationc,pactive,pdelete) ;  END; $$;


--
-- TOC entry 285 (class 1255 OID 44744)
-- Name: isspinssecurityplanriskanalysysantifireid(character varying, character varying, bigint, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysantifireid(pcode character varying, pname character varying, pidparty bigint, pquantity bigint, pdescription character varying, plocationc character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplanriskanalysysantifire(code,name,idparty,quantity,description,locationc,active,delete) VALUES (pcode,pname,pidparty,pquantity,pdescription,plocationc,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 293 (class 1255 OID 44750)
-- Name: isspinssecurityplanriskanalysyscomplements(character varying, character varying, bigint, character varying, bigint, bigint, double precision, bigint, double precision, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, timestamp without time zone, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysyscomplements(pcode character varying, pname character varying, pidparty bigint, pmunicipaltake character varying, pnumdrains bigint, pnumsubtank bigint, psubtankcapacity double precision, pnumaerialtank bigint, paerialtankcapacity double precision, pgalvanizedpipeline character varying, pcooperpipeline character varying, pelectricbomb character varying, psiamesevalve character varying, pmunicipalwaternetwork character varying, priverdrain character varying, pelectricalinstall character varying, pgeneralswitch character varying, psecundaryswitch character varying, pshutdowncontacts character varying, plightingsystem character varying, pemercyelectricplant character varying, pphysicsearthsystem character varying, pairwashequipment character varying, pnumfueltank bigint, pdieseltankcapacity bigint, pmagnatankcapacity bigint, ppremiumtankcapacity bigint, pinstalldate timestamp without time zone, pwarehouse character varying, pstorage character varying, padequatestowage character varying, pdeathfile character varying, popenfile character varying, pelectricpower character varying, ptrashinstall character varying, ptrashtype character varying, pautomaticalarmsystem character varying, ptvmonitoringsystem character varying, pcomunication character varying, pinternaldangerzone character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplanriskanalysyscomplements(code,name,idparty,municipaltake,numdrains,numsubtank,subtankcapacity,numaerialtank,aerialtankcapacity,galvanizedpipeline,cooperpipeline,electricbomb,siamesevalve,municipalwaternetwork,riverdrain,electricalinstall,generalswitch,secundaryswitch,shutdowncontacts,lightingsystem,emercyelectricplant,physicsearthsystem,airwashequipment,numfueltank,dieseltankcapacity,magnatankcapacity,premiumtankcapacity,installdate,warehouse,storage,adequatestowage,deathfile,openfile,electricpower,trashinstall,trashtype,automaticalarmsystem,tvmonitoringsystem,comunication,internaldangerzone,active,delete) VALUES (pcode,pname,pidparty,pmunicipaltake,pnumdrains,pnumsubtank,psubtankcapacity,pnumaerialtank,paerialtankcapacity,pgalvanizedpipeline,pcooperpipeline,pelectricbomb,psiamesevalve,pmunicipalwaternetwork,priverdrain,pelectricalinstall,pgeneralswitch,psecundaryswitch,pshutdowncontacts,plightingsystem,pemercyelectricplant,pphysicsearthsystem,pairwashequipment,pnumfueltank,pdieseltankcapacity,pmagnatankcapacity,ppremiumtankcapacity,pinstalldate,pwarehouse,pstorage,padequatestowage,pdeathfile,popenfile,pelectricpower,ptrashinstall,ptrashtype,pautomaticalarmsystem,ptvmonitoringsystem,pcomunication,pinternaldangerzone,pactive,pdelete) ;  END; $$;


--
-- TOC entry 294 (class 1255 OID 44751)
-- Name: isspinssecurityplanriskanalysyscomplementsid(character varying, character varying, bigint, character varying, bigint, bigint, double precision, bigint, double precision, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, timestamp without time zone, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysyscomplementsid(pcode character varying, pname character varying, pidparty bigint, pmunicipaltake character varying, pnumdrains bigint, pnumsubtank bigint, psubtankcapacity double precision, pnumaerialtank bigint, paerialtankcapacity double precision, pgalvanizedpipeline character varying, pcooperpipeline character varying, pelectricbomb character varying, psiamesevalve character varying, pmunicipalwaternetwork character varying, priverdrain character varying, pelectricalinstall character varying, pgeneralswitch character varying, psecundaryswitch character varying, pshutdowncontacts character varying, plightingsystem character varying, pemercyelectricplant character varying, pphysicsearthsystem character varying, pairwashequipment character varying, pnumfueltank bigint, pdieseltankcapacity bigint, pmagnatankcapacity bigint, ppremiumtankcapacity bigint, pinstalldate timestamp without time zone, pwarehouse character varying, pstorage character varying, padequatestowage character varying, pdeathfile character varying, popenfile character varying, pelectricpower character varying, ptrashinstall character varying, ptrashtype character varying, pautomaticalarmsystem character varying, ptvmonitoringsystem character varying, pcomunication character varying, pinternaldangerzone character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplanriskanalysyscomplements(code,name,idparty,municipaltake,numdrains,numsubtank,subtankcapacity,numaerialtank,aerialtankcapacity,galvanizedpipeline,cooperpipeline,electricbomb,siamesevalve,municipalwaternetwork,riverdrain,electricalinstall,generalswitch,secundaryswitch,shutdowncontacts,lightingsystem,emercyelectricplant,physicsearthsystem,airwashequipment,numfueltank,dieseltankcapacity,magnatankcapacity,premiumtankcapacity,installdate,warehouse,storage,adequatestowage,deathfile,openfile,electricpower,trashinstall,trashtype,automaticalarmsystem,tvmonitoringsystem,comunication,internaldangerzone,active,delete) VALUES (pcode,pname,pidparty,pmunicipaltake,pnumdrains,pnumsubtank,psubtankcapacity,pnumaerialtank,paerialtankcapacity,pgalvanizedpipeline,pcooperpipeline,pelectricbomb,psiamesevalve,pmunicipalwaternetwork,priverdrain,pelectricalinstall,pgeneralswitch,psecundaryswitch,pshutdowncontacts,plightingsystem,pemercyelectricplant,pphysicsearthsystem,pairwashequipment,pnumfueltank,pdieseltankcapacity,pmagnatankcapacity,ppremiumtankcapacity,pinstalldate,pwarehouse,pstorage,padequatestowage,pdeathfile,popenfile,pelectricpower,ptrashinstall,ptrashtype,pautomaticalarmsystem,ptvmonitoringsystem,pcomunication,pinternaldangerzone,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 305 (class 1255 OID 44778)
-- Name: isspinssecurityplanriskanalysysdirectives(character varying, character varying, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysdirectives(pcode character varying, pname character varying, pidparty bigint, pdirective character varying, pcontrolc character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplanriskanalysysdirectives(code,name,idparty,directive,controlc,active,delete) VALUES (pcode,pname,pidparty,pdirective,pcontrolc,pactive,pdelete) ;  END; $$;


--
-- TOC entry 306 (class 1255 OID 44779)
-- Name: isspinssecurityplanriskanalysysdirectivesid(character varying, character varying, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysdirectivesid(pcode character varying, pname character varying, pidparty bigint, pdirective character varying, pcontrolc character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplanriskanalysysdirectives(code,name,idparty,directive,controlc,active,delete) VALUES (pcode,pname,pidparty,pdirective,pcontrolc,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 312 (class 1255 OID 44785)
-- Name: isspinssecurityplanriskanalysysdirectory(character varying, character varying, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysdirectory(pcode character varying, pname character varying, pidparty bigint, ppersonname character varying, pposition character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplanriskanalysysdirectory(code,name,idparty,personname,position,active,delete) VALUES (pcode,pname,pidparty,ppersonname,pposition,pactive,pdelete) ;  END; $$;


--
-- TOC entry 313 (class 1255 OID 44786)
-- Name: isspinssecurityplanriskanalysysdirectoryid(character varying, character varying, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysdirectoryid(pcode character varying, pname character varying, pidparty bigint, ppersonname character varying, pposition character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplanriskanalysysdirectory(code,name,idparty,personname,position,active,delete) VALUES (pcode,pname,pidparty,ppersonname,pposition,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 319 (class 1255 OID 44792)
-- Name: isspinssecurityplanriskanalysysemergencydirectory(character varying, character varying, bigint, bytea, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysemergencydirectory(pcode character varying, pname character varying, pidparty bigint, plogo bytea, penterprise character varying, pphone character varying, paddress character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplanriskanalysysemergencydirectory(code,name,idparty,logo,enterprise,phone,address,active,delete) VALUES (pcode,pname,pidparty,plogo,penterprise,pphone,paddress,pactive,pdelete) ;  END; $$;


--
-- TOC entry 320 (class 1255 OID 44793)
-- Name: isspinssecurityplanriskanalysysemergencydirectoryid(character varying, character varying, bigint, bytea, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysemergencydirectoryid(pcode character varying, pname character varying, pidparty bigint, plogo bytea, penterprise character varying, pphone character varying, paddress character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplanriskanalysysemergencydirectory(code,name,idparty,logo,enterprise,phone,address,active,delete) VALUES (pcode,pname,pidparty,plogo,penterprise,pphone,paddress,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 322 (class 1255 OID 44799)
-- Name: isspinssecurityplanriskanalysysmisc(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysmisc(pcode character varying, pname character varying, pidparty bigint, psecurityequipment character varying, pgeneralrecomendations character varying, psecuritymeasures character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplanriskanalysysmisc(code,name,idparty,securityequipment,generalrecomendations,securitymeasures,active,delete) VALUES (pcode,pname,pidparty,psecurityequipment,pgeneralrecomendations,psecuritymeasures,pactive,pdelete) ;  END; $$;


--
-- TOC entry 323 (class 1255 OID 44800)
-- Name: isspinssecurityplanriskanalysysmiscid(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysmiscid(pcode character varying, pname character varying, pidparty bigint, psecurityequipment character varying, pgeneralrecomendations character varying, psecuritymeasures character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplanriskanalysysmisc(code,name,idparty,securityequipment,generalrecomendations,securitymeasures,active,delete) VALUES (pcode,pname,pidparty,psecurityequipment,pgeneralrecomendations,psecuritymeasures,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 329 (class 1255 OID 44806)
-- Name: isspinssecurityplanriskanalysysstrategiclocations(character varying, character varying, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysstrategiclocations(pcode character varying, pname character varying, pidparty bigint, pdescription character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplanriskanalysysstrategiclocations(code,name,idparty,description,active,delete) VALUES (pcode,pname,pidparty,pdescription,pactive,pdelete) ;  END; $$;


--
-- TOC entry 330 (class 1255 OID 44807)
-- Name: isspinssecurityplanriskanalysysstrategiclocationsid(character varying, character varying, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplanriskanalysysstrategiclocationsid(pcode character varying, pname character varying, pidparty bigint, pdescription character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplanriskanalysysstrategiclocations(code,name,idparty,description,active,delete) VALUES (pcode,pname,pidparty,pdescription,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 336 (class 1255 OID 44813)
-- Name: isspinssecurityplansitelocation(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplansitelocation(pcode character varying, pname character varying, pidparty bigint, plegalframework character varying, pjustification character varying, pobjetives character varying, pscope character varying, psitelocation character varying, pnorthstreet character varying, psouthstreet character varying, peaststreet character varying, pweststreet character varying, pnorthbuilding character varying, psouthbuilding character varying, peastbuilding character varying, pwestbuilding character varying, pidentificationstrategicfacilities character varying, pexplosionsimulation character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplansitelocation(code,name,idparty,legalframework,justification,objetives,scope,sitelocation,northstreet,southstreet,eaststreet,weststreet,northbuilding,southbuilding,eastbuilding,westbuilding,identificationstrategicfacilities,explosionsimulation,active,delete) VALUES (pcode,pname,pidparty,plegalframework,pjustification,pobjetives,pscope,psitelocation,pnorthstreet,psouthstreet,peaststreet,pweststreet,pnorthbuilding,psouthbuilding,peastbuilding,pwestbuilding,pidentificationstrategicfacilities,pexplosionsimulation,pactive,pdelete) ;  END; $$;


--
-- TOC entry 337 (class 1255 OID 44814)
-- Name: isspinssecurityplansitelocationid(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplansitelocationid(pcode character varying, pname character varying, pidparty bigint, plegalframework character varying, pjustification character varying, pobjetives character varying, pscope character varying, psitelocation character varying, pnorthstreet character varying, psouthstreet character varying, peaststreet character varying, pweststreet character varying, pnorthbuilding character varying, psouthbuilding character varying, peastbuilding character varying, pwestbuilding character varying, pidentificationstrategicfacilities character varying, pexplosionsimulation character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplansitelocation(code,name,idparty,legalframework,justification,objetives,scope,sitelocation,northstreet,southstreet,eaststreet,weststreet,northbuilding,southbuilding,eastbuilding,westbuilding,identificationstrategicfacilities,explosionsimulation,active,delete) VALUES (pcode,pname,pidparty,plegalframework,pjustification,pobjetives,pscope,psitelocation,pnorthstreet,psouthstreet,peaststreet,pweststreet,pnorthbuilding,psouthbuilding,peastbuilding,pwestbuilding,pidentificationstrategicfacilities,pexplosionsimulation,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 343 (class 1255 OID 44820)
-- Name: isspinssecurityplansubprogram(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplansubprogram(pcode character varying, pname character varying, pidparty bigint, pinfo character varying, puipcheadlinename character varying, puipccoordinatorname character varying, puipcchiefname character varying, puipcfirstaidbrigadechiefname character varying, puipcantifirebrigadename character varying, puipcevacuationbrigadename character varying, puipcsearchbrigadename character varying, pinfobrigade character varying, pinfoorganizationchart character varying, pinfobrigadeorganization character varying, pmoretenemployments character varying, pactive character varying, pdelete character varying, psecurityplansubprogram_id bigint) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.securityplansubprogram(code,name,idparty,info,uipcheadlinename,uipccoordinatorname,uipcchiefname,uipcfirstaidbrigadechiefname,uipcantifirebrigadename,uipcevacuationbrigadename,uipcsearchbrigadename,infobrigade,infoorganizationchart,infobrigadeorganization,moretenemployments,active,delete,securityplansubprogram_id) VALUES (pcode,pname,pidparty,pinfo,puipcheadlinename,puipccoordinatorname,puipcchiefname,puipcfirstaidbrigadechiefname,puipcantifirebrigadename,puipcevacuationbrigadename,puipcsearchbrigadename,pinfobrigade,pinfoorganizationchart,pinfobrigadeorganization,pmoretenemployments,pactive,pdelete,psecurityplansubprogram_id) ;  END; $$;


--
-- TOC entry 344 (class 1255 OID 44821)
-- Name: isspinssecurityplansubprogramid(character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinssecurityplansubprogramid(pcode character varying, pname character varying, pidparty bigint, pinfo character varying, puipcheadlinename character varying, puipccoordinatorname character varying, puipcchiefname character varying, puipcfirstaidbrigadechiefname character varying, puipcantifirebrigadename character varying, puipcevacuationbrigadename character varying, puipcsearchbrigadename character varying, pinfobrigade character varying, pinfoorganizationchart character varying, pinfobrigadeorganization character varying, pmoretenemployments character varying, pactive character varying, pdelete character varying, psecurityplansubprogram_id bigint) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.securityplansubprogram(code,name,idparty,info,uipcheadlinename,uipccoordinatorname,uipcchiefname,uipcfirstaidbrigadechiefname,uipcantifirebrigadename,uipcevacuationbrigadename,uipcsearchbrigadename,infobrigade,infoorganizationchart,infobrigadeorganization,moretenemployments,active,delete,securityplansubprogram_id) VALUES (pcode,pname,pidparty,pinfo,puipcheadlinename,puipccoordinatorname,puipcchiefname,puipcfirstaidbrigadechiefname,puipcantifirebrigadename,puipcevacuationbrigadename,puipcsearchbrigadename,pinfobrigade,pinfoorganizationchart,pinfobrigadeorganization,pmoretenemployments,pactive,pdelete,psecurityplansubprogram_id) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 354 (class 1255 OID 43533)
-- Name: isspinstemplate_base(character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinstemplate_base(pcode character varying, pname character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.template_base(code,name,active,delete) VALUES (pcode,pname,pactive,pdelete) ;  END; $$;


--
-- TOC entry 355 (class 1255 OID 43534)
-- Name: isspinstemplate_baseid(character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinstemplate_baseid(pcode character varying, pname character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.template_base(code,name,active,delete) VALUES (pcode,pname,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 350 (class 1255 OID 44827)
-- Name: isspinsthreatriskanalysys(character varying, character varying, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsthreatriskanalysys(pcode character varying, pname character varying, pidparty bigint, pidthreat bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.threatriskanalysys(code,name,idparty,idthreat,active,delete) VALUES (pcode,pname,pidparty,pidthreat,pactive,pdelete) ;  END; $$;


--
-- TOC entry 351 (class 1255 OID 44828)
-- Name: isspinsthreatriskanalysysid(character varying, character varying, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsthreatriskanalysysid(pcode character varying, pname character varying, pidparty bigint, pidthreat bigint, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.threatriskanalysys(code,name,idparty,idthreat,active,delete) VALUES (pcode,pname,pidparty,pidthreat,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 364 (class 1255 OID 44834)
-- Name: isspinsthreats(character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsthreats(pcode character varying, pname character varying, pdescription character varying, plocation character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.threats(code,name,description,location,active,delete) VALUES (pcode,pname,pdescription,plocation,pactive,pdelete) ;  END; $$;


--
-- TOC entry 365 (class 1255 OID 44835)
-- Name: isspinsthreatsid(character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsthreatsid(pcode character varying, pname character varying, pdescription character varying, plocation character varying, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.threats(code,name,description,location,active,delete) VALUES (pcode,pname,pdescription,plocation,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 371 (class 1255 OID 44841)
-- Name: isspinsthreatsitelocation(character varying, character varying, bigint, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsthreatsitelocation(pcode character varying, pname character varying, pidparty bigint, pidsitelocation bigint, pidthreat bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN INSERT INTO core.threatsitelocation(code,name,idparty,idsitelocation,idthreat,active,delete) VALUES (pcode,pname,pidparty,pidsitelocation,pidthreat,pactive,pdelete) ;  END; $$;


--
-- TOC entry 372 (class 1255 OID 44842)
-- Name: isspinsthreatsitelocationid(character varying, character varying, bigint, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspinsthreatsitelocationid(pcode character varying, pname character varying, pidparty bigint, pidsitelocation bigint, pidthreat bigint, pactive character varying, pdelete character varying) RETURNS bigint
    LANGUAGE plpgsql
    AS $$DECLARE pid bigint;  BEGIN INSERT INTO core.threatsitelocation(code,name,idparty,idsitelocation,idthreat,active,delete) VALUES (pcode,pname,pidparty,pidsitelocation,pidthreat,pactive,pdelete) RETURNING id INTO pid; RETURN pid; END; $$;


--
-- TOC entry 410 (class 1255 OID 44487)
-- Name: isspupdaddress(integer, character varying, character varying, bigint, character varying, character varying, character varying, character varying, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdaddress(pid integer, pcode character varying, pname character varying, pidparty bigint, pbuildingnumber character varying, psuburb character varying, pmunicipality character varying, ppostalcode character varying, pidaddresstype bigint, pidstate bigint, pidcity bigint, pstreet character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.address SET code = pcode,name = pname,idparty = pidparty,buildingnumber = pbuildingnumber,suburb = psuburb,municipality = pmunicipality,postalcode = ppostalcode,idaddresstype = pidaddresstype,idstate = pidstate,idcity = pidcity,street = pstreet,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 417 (class 1255 OID 44494)
-- Name: isspupdconsultant(bigint, character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdconsultant(pid bigint, pcode character varying, pname character varying, pidparty bigint, pidcard character varying, pcurp character varying, pfirstname character varying, pmiddlename character varying, plastname character varying, psecondsurname character varying, pregisternumber character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.consultant SET code = pcode,name = pname,idparty = pidparty,idcard = pidcard,curp = pcurp,firstname = pfirstname,middlename = pmiddlename,lastname = plastname,secondsurname = psecondsurname,registernumber = pregisternumber,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 424 (class 1255 OID 44501)
-- Name: isspupdconsultingenterprise(bigint, character varying, character varying, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdconsultingenterprise(pid bigint, pcode character varying, pname character varying, pidpartyconsultant bigint, pidpartyenterprise bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.consultingenterprise SET code = pcode,name = pname,idpartyconsultant = pidpartyconsultant,idpartyenterprise = pidpartyenterprise,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 432 (class 1255 OID 44508)
-- Name: isspupddocument(bigint, character varying, character varying, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupddocument(pid bigint, pcode character varying, pname character varying, pidparty bigint, piddocumenttype bigint, piddocumentstatus bigint, ppath character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.document SET code = pcode,name = pname,idparty = pidparty,iddocumenttype = piddocumenttype,iddocumentstatus = piddocumentstatus,path = ppath,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 439 (class 1255 OID 44515)
-- Name: isspupdemail(bigint, character varying, character varying, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdemail(pid bigint, pcode character varying, pname character varying, pidparty bigint, pidemailtype bigint, pcontent character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.email SET code = pcode,name = pname,idparty = pidparty,idemailtype = pidemailtype,content = pcontent,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 445 (class 1255 OID 44524)
-- Name: isspupdenterprise(bigint, character varying, character varying, bigint, character varying, character varying, double precision, double precision, double precision, character varying, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, character varying, character varying, bigint, bigint, bigint, character varying, character varying, character varying, character varying, character varying, bigint, double precision, double precision, character varying, character varying, character varying, double precision, character varying, character varying, double precision, character varying, double precision, character varying, character varying, character varying, double precision, character varying, double precision, character varying, double precision, character varying, double precision, character varying, double precision, character varying, double precision, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdenterprise(pid bigint, pcode character varying, pname character varying, pidparty bigint, pbussinesname character varying, pbuildingnamenumber character varying, plandsurface double precision, pbuildedsurface double precision, pbuildingheight double precision, plegalrepresentative character varying, pmanager character varying, presponsiblepipc character varying, peconomicactivity character varying, ppermanentshedule character varying, pbuildingage bigint, pnumemployees bigint, pnumbrigadista bigint, pnumlevels bigint, pareadata character varying, pmaxcapacity character varying, paccidentinsurance character varying, pinsurancecompany character varying, pnumextinguisherspqs bigint, pnumextinguishersco2 bigint, pnumextinguishersh20 bigint, pnumextinguishersothers bigint, pcompanysecurityprovider character varying, psecurityofficer character varying, pnummorningsecurityelements bigint, pnumeveningsecurityelements bigint, pnumnightsecurityelements bigint, pstructuralopinion character varying, pdatestructuralopinion character varying, pelectricopinion character varying, pdateelectricopinion character varying, pfirenetwork character varying, pnumhydrants bigint, ptankcapacity double precision, ppercenttankfire double precision, palertsystem character varying, pfiredetection character varying, pfireprotectionequipment character varying, pcapacityfireprotectionequipment double precision, pautonomousbreathingequipment character varying, pgastanklpstationary character varying, pcapacitygastanklpstationary double precision, pgastanklpnotstationary character varying, phowgastanklpnotstationar double precision, plpgasopinion character varying, pdatelpgasopinion character varying, pflammablegases character varying, pquantityflammablegases double precision, pflammableliquids character varying, pquantityflammableliquids double precision, pcombustibleliquids character varying, pquantitycombustibleliquids double precision, pcombustiblesolids character varying, pquantitycombustiblesolids double precision, pexplosivematerial character varying, pquantityexplosivematerial double precision, pelectricsubstation character varying, pcapacityelectricsubstation double precision, pcodebranch character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.enterprise SET code = pcode,name = pname,idparty = pidparty,bussinesname = pbussinesname,buildingnamenumber = pbuildingnamenumber,landsurface = plandsurface,buildedsurface = pbuildedsurface,buildingheight = pbuildingheight,legalrepresentative = plegalrepresentative,manager = pmanager,responsiblepipc = presponsiblepipc,economicactivity = peconomicactivity,permanentshedule = ppermanentshedule,buildingage = pbuildingage,numemployees = pnumemployees,numbrigadista = pnumbrigadista,numlevels = pnumlevels,areadata = pareadata,maxcapacity = pmaxcapacity,accidentinsurance = paccidentinsurance,insurancecompany = pinsurancecompany,numextinguisherspqs = pnumextinguisherspqs,numextinguishersco2 = pnumextinguishersco2,numextinguishersh20 = pnumextinguishersh20,numextinguishersothers = pnumextinguishersothers,companysecurityprovider = pcompanysecurityprovider,securityofficer = psecurityofficer,nummorningsecurityelements = pnummorningsecurityelements,numeveningsecurityelements = pnumeveningsecurityelements,numnightsecurityelements = pnumnightsecurityelements,structuralopinion = pstructuralopinion,datestructuralopinion = pdatestructuralopinion,electricopinion = pelectricopinion,dateelectricopinion = pdateelectricopinion,firenetwork = pfirenetwork,numhydrants = pnumhydrants,tankcapacity = ptankcapacity,percenttankfire = ppercenttankfire,alertsystem = palertsystem,firedetection = pfiredetection,fireprotectionequipment = pfireprotectionequipment,capacityfireprotectionequipment = pcapacityfireprotectionequipment,autonomousbreathingequipment = pautonomousbreathingequipment,gastanklpstationary = pgastanklpstationary,capacitygastanklpstationary = pcapacitygastanklpstationary,gastanklpnotstationary = pgastanklpnotstationary,howgastanklpnotstationar = phowgastanklpnotstationar,lpgasopinion = plpgasopinion,datelpgasopinion = pdatelpgasopinion,flammablegases = pflammablegases,quantityflammablegases = pquantityflammablegases,flammableliquids = pflammableliquids,quantityflammableliquids = pquantityflammableliquids,combustibleliquids = pcombustibleliquids,quantitycombustibleliquids = pquantitycombustibleliquids,combustiblesolids = pcombustiblesolids,quantitycombustiblesolids = pquantitycombustiblesolids,explosivematerial = pexplosivematerial,quantityexplosivematerial = pquantityexplosivematerial,electricsubstation = pelectricsubstation,capacityelectricsubstation = pcapacityelectricsubstation,codebranch = pcodebranch,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 452 (class 1255 OID 44532)
-- Name: isspupdparty(bigint, character varying, character varying, character varying, character varying, character varying, timestamp without time zone, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdparty(pid bigint, pcode character varying, pname character varying, pusername character varying, ppassword character varying, prfc character varying, pregisterdate timestamp without time zone, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.party SET code = pcode,name = pname,username = pusername,password = ppassword,rfc = prfc,registerdate = pregisterdate,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 459 (class 1255 OID 44539)
-- Name: isspupdphone(bigint, character varying, character varying, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdphone(pid bigint, pcode character varying, pname character varying, pidparty bigint, pidphonetype bigint, pcontent character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.phone SET code = pcode,name = pname,idparty = pidparty,idphonetype = pidphonetype,content = pcontent,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 465 (class 1255 OID 44546)
-- Name: isspupdpictures(integer, character varying, character varying, bigint, bytea, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdpictures(pid integer, pcode character varying, pname character varying, pidparty bigint, pcontent bytea, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.pictures SET code = pcode,name = pname,idparty = pidparty,content = pcontent,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 267 (class 1255 OID 44725)
-- Name: isspupdsecurityplancomplements(integer, character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplancomplements(pid integer, pcode character varying, pname character varying, pidparty bigint, pinfosignaling character varying, pdefinitionsignaling character varying, plocationsignaling character varying, pmaintenancesignaling character varying, psimulationexercise character varying, phelpsubprogram character varying, pevacuationemergencyprocedure character varying, pemergencytypes character varying, pemergencyhurracaine character varying, pemergencyflooding character varying, pteamantifirefunctions character varying, precoversubprogram character varying, pcometonormal character varying, pattachments character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplancomplements SET code = pcode,name = pname,idparty = pidparty,infosignaling = pinfosignaling,definitionsignaling = pdefinitionsignaling,locationsignaling = plocationsignaling,maintenancesignaling = pmaintenancesignaling,simulationexercise = psimulationexercise,helpsubprogram = phelpsubprogram,evacuationemergencyprocedure = pevacuationemergencyprocedure,emergencytypes = pemergencytypes,emergencyhurracaine = pemergencyhurracaine,emergencyflooding = pemergencyflooding,teamantifirefunctions = pteamantifirefunctions,recoversubprogram = precoversubprogram,cometonormal = pcometonormal,attachments = pattachments,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 274 (class 1255 OID 44732)
-- Name: isspupdsecurityplanriskanalysis(integer, character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, bigint, character varying, character varying, character varying, character varying, character varying, double precision, double precision, double precision, double precision, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplanriskanalysis(pid integer, pcode character varying, pname character varying, pidparty bigint, pinfo character varying, plocation character varying, pnorthstreet character varying, psouthstreet character varying, peaststreet character varying, pweststreet character varying, pnorthbuilding character varying, psouthbuilding character varying, peastbuilding character varying, pwestbuilding character varying, pvitalservices character varying, pidcimentation bigint, pidstructure bigint, pidwall bigint, pidroof bigint, pidfloor bigint, pidenjarre bigint, pidelectricalinstall bigint, pidhidrosanitaryinstall bigint, pidbathroomfurniture bigint, pidcanceleria bigint, piddoors bigint, pidstairs bigint, pidfinishesfloors bigint, pidfinisheswalls bigint, pidfinishesdoors bigint, pidfinishesstairs bigint, ppermanentcensus character varying, pfloatcensus character varying, pownproperty character varying, pleasedproperty character varying, potherproperty character varying, psurface double precision, pantiquity double precision, pnumlevel double precision, phighbuilding double precision, pgeotechnichallocation character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplanriskanalysis SET code = pcode,name = pname,idparty = pidparty,info = pinfo,location = plocation,northstreet = pnorthstreet,southstreet = psouthstreet,eaststreet = peaststreet,weststreet = pweststreet,northbuilding = pnorthbuilding,southbuilding = psouthbuilding,eastbuilding = peastbuilding,westbuilding = pwestbuilding,vitalservices = pvitalservices,idcimentation = pidcimentation,idstructure = pidstructure,idwall = pidwall,idroof = pidroof,idfloor = pidfloor,idenjarre = pidenjarre,idelectricalinstall = pidelectricalinstall,idhidrosanitaryinstall = pidhidrosanitaryinstall,idbathroomfurniture = pidbathroomfurniture,idcanceleria = pidcanceleria,iddoors = piddoors,idstairs = pidstairs,idfinishesfloors = pidfinishesfloors,idfinisheswalls = pidfinisheswalls,idfinishesdoors = pidfinishesdoors,idfinishesstairs = pidfinishesstairs,permanentcensus = ppermanentcensus,floatcensus = pfloatcensus,ownproperty = pownproperty,leasedproperty = pleasedproperty,otherproperty = potherproperty,surface = psurface,antiquity = pantiquity,numlevel = pnumlevel,highbuilding = phighbuilding,geotechnichallocation = pgeotechnichallocation,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 280 (class 1255 OID 44739)
-- Name: isspupdsecurityplanriskanalysysalarmsystem(integer, character varying, character varying, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplanriskanalysysalarmsystem(pid integer, pcode character varying, pname character varying, pidparty bigint, psystemactive character varying, pcontrolactive character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplanriskanalysysalarmsystem SET code = pcode,name = pname,idparty = pidparty,systemactive = psystemactive,controlactive = pcontrolactive,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 288 (class 1255 OID 44746)
-- Name: isspupdsecurityplanriskanalysysantifire(integer, character varying, character varying, bigint, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplanriskanalysysantifire(pid integer, pcode character varying, pname character varying, pidparty bigint, pquantity bigint, pdescription character varying, plocationc character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplanriskanalysysantifire SET code = pcode,name = pname,idparty = pidparty,quantity = pquantity,description = pdescription,locationc = plocationc,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 298 (class 1255 OID 44753)
-- Name: isspupdsecurityplanriskanalysyscomplements(integer, character varying, character varying, bigint, character varying, bigint, bigint, double precision, bigint, double precision, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, bigint, bigint, bigint, bigint, timestamp without time zone, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplanriskanalysyscomplements(pid integer, pcode character varying, pname character varying, pidparty bigint, pmunicipaltake character varying, pnumdrains bigint, pnumsubtank bigint, psubtankcapacity double precision, pnumaerialtank bigint, paerialtankcapacity double precision, pgalvanizedpipeline character varying, pcooperpipeline character varying, pelectricbomb character varying, psiamesevalve character varying, pmunicipalwaternetwork character varying, priverdrain character varying, pelectricalinstall character varying, pgeneralswitch character varying, psecundaryswitch character varying, pshutdowncontacts character varying, plightingsystem character varying, pemercyelectricplant character varying, pphysicsearthsystem character varying, pairwashequipment character varying, pnumfueltank bigint, pdieseltankcapacity bigint, pmagnatankcapacity bigint, ppremiumtankcapacity bigint, pinstalldate timestamp without time zone, pwarehouse character varying, pstorage character varying, padequatestowage character varying, pdeathfile character varying, popenfile character varying, pelectricpower character varying, ptrashinstall character varying, ptrashtype character varying, pautomaticalarmsystem character varying, ptvmonitoringsystem character varying, pcomunication character varying, pinternaldangerzone character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplanriskanalysyscomplements SET code = pcode,name = pname,idparty = pidparty,municipaltake = pmunicipaltake,numdrains = pnumdrains,numsubtank = pnumsubtank,subtankcapacity = psubtankcapacity,numaerialtank = pnumaerialtank,aerialtankcapacity = paerialtankcapacity,galvanizedpipeline = pgalvanizedpipeline,cooperpipeline = pcooperpipeline,electricbomb = pelectricbomb,siamesevalve = psiamesevalve,municipalwaternetwork = pmunicipalwaternetwork,riverdrain = priverdrain,electricalinstall = pelectricalinstall,generalswitch = pgeneralswitch,secundaryswitch = psecundaryswitch,shutdowncontacts = pshutdowncontacts,lightingsystem = plightingsystem,emercyelectricplant = pemercyelectricplant,physicsearthsystem = pphysicsearthsystem,airwashequipment = pairwashequipment,numfueltank = pnumfueltank,dieseltankcapacity = pdieseltankcapacity,magnatankcapacity = pmagnatankcapacity,premiumtankcapacity = ppremiumtankcapacity,installdate = pinstalldate,warehouse = pwarehouse,storage = pstorage,adequatestowage = padequatestowage,deathfile = pdeathfile,openfile = popenfile,electricpower = pelectricpower,trashinstall = ptrashinstall,trashtype = ptrashtype,automaticalarmsystem = pautomaticalarmsystem,tvmonitoringsystem = ptvmonitoringsystem,comunication = pcomunication,internaldangerzone = pinternaldangerzone,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 308 (class 1255 OID 44781)
-- Name: isspupdsecurityplanriskanalysysdirectives(integer, character varying, character varying, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplanriskanalysysdirectives(pid integer, pcode character varying, pname character varying, pidparty bigint, pdirective character varying, pcontrolc character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplanriskanalysysdirectives SET code = pcode,name = pname,idparty = pidparty,directive = pdirective,controlc = pcontrolc,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 315 (class 1255 OID 44788)
-- Name: isspupdsecurityplanriskanalysysdirectory(integer, character varying, character varying, bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplanriskanalysysdirectory(pid integer, pcode character varying, pname character varying, pidparty bigint, ppersonname character varying, pposition character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplanriskanalysysdirectory SET code = pcode,name = pname,idparty = pidparty,personname = ppersonname,position = pposition,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 321 (class 1255 OID 44795)
-- Name: isspupdsecurityplanriskanalysysemergencydirectory(integer, character varying, character varying, bigint, bytea, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplanriskanalysysemergencydirectory(pid integer, pcode character varying, pname character varying, pidparty bigint, plogo bytea, penterprise character varying, pphone character varying, paddress character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplanriskanalysysemergencydirectory SET code = pcode,name = pname,idparty = pidparty,logo = plogo,enterprise = penterprise,phone = pphone,address = paddress,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 325 (class 1255 OID 44802)
-- Name: isspupdsecurityplanriskanalysysmisc(integer, character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplanriskanalysysmisc(pid integer, pcode character varying, pname character varying, pidparty bigint, psecurityequipment character varying, pgeneralrecomendations character varying, psecuritymeasures character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplanriskanalysysmisc SET code = pcode,name = pname,idparty = pidparty,securityequipment = psecurityequipment,generalrecomendations = pgeneralrecomendations,securitymeasures = psecuritymeasures,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 332 (class 1255 OID 44809)
-- Name: isspupdsecurityplanriskanalysysstrategiclocations(integer, character varying, character varying, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplanriskanalysysstrategiclocations(pid integer, pcode character varying, pname character varying, pidparty bigint, pdescription character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplanriskanalysysstrategiclocations SET code = pcode,name = pname,idparty = pidparty,description = pdescription,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 339 (class 1255 OID 44816)
-- Name: isspupdsecurityplansitelocation(integer, character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplansitelocation(pid integer, pcode character varying, pname character varying, pidparty bigint, plegalframework character varying, pjustification character varying, pobjetives character varying, pscope character varying, psitelocation character varying, pnorthstreet character varying, psouthstreet character varying, peaststreet character varying, pweststreet character varying, pnorthbuilding character varying, psouthbuilding character varying, peastbuilding character varying, pwestbuilding character varying, pidentificationstrategicfacilities character varying, pexplosionsimulation character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplansitelocation SET code = pcode,name = pname,idparty = pidparty,legalframework = plegalframework,justification = pjustification,objetives = pobjetives,scope = pscope,sitelocation = psitelocation,northstreet = pnorthstreet,southstreet = psouthstreet,eaststreet = peaststreet,weststreet = pweststreet,northbuilding = pnorthbuilding,southbuilding = psouthbuilding,eastbuilding = peastbuilding,westbuilding = pwestbuilding,identificationstrategicfacilities = pidentificationstrategicfacilities,explosionsimulation = pexplosionsimulation,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 346 (class 1255 OID 44823)
-- Name: isspupdsecurityplansubprogram(integer, character varying, character varying, bigint, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, character varying, bigint); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdsecurityplansubprogram(pid integer, pcode character varying, pname character varying, pidparty bigint, pinfo character varying, puipcheadlinename character varying, puipccoordinatorname character varying, puipcchiefname character varying, puipcfirstaidbrigadechiefname character varying, puipcantifirebrigadename character varying, puipcevacuationbrigadename character varying, puipcsearchbrigadename character varying, pinfobrigade character varying, pinfoorganizationchart character varying, pinfobrigadeorganization character varying, pmoretenemployments character varying, pactive character varying, pdelete character varying, psecurityplansubprogram_id bigint) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.securityplansubprogram SET code = pcode,name = pname,idparty = pidparty,info = pinfo,uipcheadlinename = puipcheadlinename,uipccoordinatorname = puipccoordinatorname,uipcchiefname = puipcchiefname,uipcfirstaidbrigadechiefname = puipcfirstaidbrigadechiefname,uipcantifirebrigadename = puipcantifirebrigadename,uipcevacuationbrigadename = puipcevacuationbrigadename,uipcsearchbrigadename = puipcsearchbrigadename,infobrigade = pinfobrigade,infoorganizationchart = pinfoorganizationchart,infobrigadeorganization = pinfobrigadeorganization,moretenemployments = pmoretenemployments,active = pactive,delete = pdelete,securityplansubprogram_id = psecurityplansubprogram_id WHERE id = pid; END; $$;


--
-- TOC entry 357 (class 1255 OID 43536)
-- Name: isspupdtemplate_base(bigint, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdtemplate_base(pid bigint, pcode character varying, pname character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.template_base SET code = pcode,name = pname,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 353 (class 1255 OID 44830)
-- Name: isspupdthreatriskanalysys(integer, character varying, character varying, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdthreatriskanalysys(pid integer, pcode character varying, pname character varying, pidparty bigint, pidthreat bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.threatriskanalysys SET code = pcode,name = pname,idparty = pidparty,idthreat = pidthreat,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 367 (class 1255 OID 44837)
-- Name: isspupdthreats(bigint, character varying, character varying, character varying, character varying, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdthreats(pid bigint, pcode character varying, pname character varying, pdescription character varying, plocation character varying, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.threats SET code = pcode,name = pname,description = pdescription,location = plocation,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 374 (class 1255 OID 44844)
-- Name: isspupdthreatsitelocation(bigint, character varying, character varying, bigint, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: core; Owner: -
--

CREATE FUNCTION core.isspupdthreatsitelocation(pid bigint, pcode character varying, pname character varying, pidparty bigint, pidsitelocation bigint, pidthreat bigint, pactive character varying, pdelete character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$  BEGIN UPDATE core.threatsitelocation SET code = pcode,name = pname,idparty = pidparty,idsitelocation = pidsitelocation,idthreat = pidthreat,active = pactive,delete = pdelete WHERE id = pid; END; $$;


--
-- TOC entry 256 (class 1255 OID 27268)
-- Name: containfieldname(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.containfieldname(p_schemaname character varying, p_tablename character varying) RETURNS character varying
    LANGUAGE plpgsql
    AS $$
DECLARE strres character varying;
BEGIN
        SELECT column_name INTO strres
        FROM 
                information_schema.columns
        WHERE
                table_schema=p_schemaName and table_name = p_tableName and column_name = 'name'
                ;
    
        return strres ;
END;
$$;


--
-- TOC entry 378 (class 1255 OID 60663)
-- Name: createsadmin(text, text, text); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.createsadmin(pemail text, ppassword text, prfc text) RETURNS void
    LANGUAGE plpgsql
    AS $$
declare
	res integer;
begin
	insert into core.party(code,password,rfc) 
	values ('sadmin',md5(ppassword),prfc) returning id into res;
	insert into core.email(idparty,idemailtype,content) values (res,1,pemail);
end;
$$;


--
-- TOC entry 257 (class 1255 OID 27269)
-- Name: datetimetostrdate(timestamp without time zone); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.datetimetostrdate(pdate timestamp without time zone) RETURNS character varying
    LANGUAGE plpgsql
    AS $$ 
DECLARE
res character varying;
BEGIN   
res := CAST(EXTRACT(year FROM pdate) AS character varying(4)) || '/' ||
CAST(EXTRACT(month FROM pdate) AS character varying(2)) || '/' ||
CAST(EXTRACT(day FROM pdate) AS character varying(2)); 
RETURN res
;  END; $$;


--
-- TOC entry 258 (class 1255 OID 27270)
-- Name: deletestoredprocedure(text, text); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.deletestoredprocedure(scheme text, name text) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN

IF (SELECT string_agg(format('DROP FUNCTION %s(%s);'
                     ,PP.oid::regproc
                     ,pg_catalog.pg_get_function_identity_arguments(PP.oid))
          ,E'\n')
   FROM   pg_proc PP, pg_namespace PN
   WHERE  PP.pronamespace = PN.oid 
   AND PN.nspname = scheme
   AND PP.proname = name) IS NOT NULL THEN
EXECUTE (
   SELECT string_agg(format('DROP FUNCTION %s(%s);'
                     ,PP.oid::regproc
                     ,pg_catalog.pg_get_function_identity_arguments(PP.oid))
          ,E'\n')
   FROM   pg_proc PP, pg_namespace PN
   WHERE  PP.pronamespace = PN.oid 
   AND PN.nspname = scheme
   AND PP.proname = name);
END IF;
END
$$;


--
-- TOC entry 259 (class 1255 OID 27271)
-- Name: deletestoredproceduresscheme(character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.deletestoredproceduresscheme(pschemaname character varying) RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
    _sql   text;
    _ct    text;
BEGIN
   SELECT INTO _sql, _ct
          string_agg('DROP '
                   || CASE p.proisagg WHEN true THEN 'AGGREGATE '
                                                ELSE 'FUNCTION ' END
                   || quote_ident(n.nspname) || '.' || quote_ident(p.proname)
                   || '('
                   || pg_catalog.pg_get_function_identity_arguments(p.oid)
                   || ');'
                  ,E'\n'
          )
          ,count(*)::text
   FROM   pg_catalog.pg_proc p
   LEFT   JOIN pg_catalog.pg_namespace n ON n.oid = p.pronamespace
   WHERE  n.nspname = pschemaname
   AND (p.proname ~~* 'isspget%'
   OR p.proname ~~* 'isspupd%'
   OR p.proname ~~* 'isspins%'
   );                     -- Only selected funcs?
   -- AND pg_catalog.pg_function_is_visible(p.oid) -- Only visible funcs?

   EXECUTE _sql;
   RETURN _ct || E' functions deleted:\n' || _sql;
END;
$$;


--
-- TOC entry 260 (class 1255 OID 27272)
-- Name: generatefindbynamestoredprocedure(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generatefindbynamestoredprocedure(p_schemaname character varying, p_tablename character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE
        hasname             VARCHAR;
        oFunctionBody       VARCHAR ;
        oSQLQuery               VARCHAR;
        oPrimaryKeyName     VARCHAR;
BEGIN
        hasname := utils.containfieldname(p_schemaName,p_tableName);
        IF hasname IS NOT NULL THEN
		 oFunctionBody := 'SELECT utils.deletestoredprocedure('''||p_schemaname||''',''isspget' || p_tableName || 'byname' || ''');';
		EXECUTE ''|| oFunctionBody || '';
		oFunctionBody   := 'CREATE OR REPLACE FUNCTION '||p_schemaName || '.isspget'||p_tablename ||'byname (gval CHARACTER VARYING) RETURNS SETOF ' ||p_schemaName||'.'||p_tableName || ' AS '||CHR(36)||CHR(36) ;
		oFunctionBody   := oFunctionBody || ' DECLARE r ' ||p_schemaName||'.'||p_tableName || '%ROWTYPE; BEGIN ' ;
		oSQLQuery           := ' FOR r IN SELECT * FROM '||p_schemaName||'.'||p_tableName || ' WHERE UPPER(name) LIKE ' || quote_literal('%') || '||UPPER(gval)||' || quote_literal('%');
		oFunctionBody   := oFunctionBody || oSQLQuery || 'LOOP RETURN NEXT r; END LOOP; RETURN ; ';
		oFunctionBody   := oFunctionBody ||' END; '||CHR(36) ||CHR(36)||' LANGUAGE PLPGSQL; ';
        --INSERT INTO gquery(query) VALUES(oFunctionBody) ;
        EXECUTE oFunctionBody ;
        END IF;


END;
$$;


--
-- TOC entry 262 (class 1255 OID 27273)
-- Name: generategetbyagnstoredprocedure(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generategetbyagnstoredprocedure(p_schemaname character varying, p_tablename character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE
        oFunctionBody       VARCHAR ;
        oSQLQuery               VARCHAR;
        oPrimaryKeyName     VARCHAR;
BEGIN
	oFunctionBody := 'SELECT utils.deletestoredprocedure('''||p_schemaname||''',''isspget' || p_tableName || ''');';
	 EXECUTE ''|| oFunctionBody || '';
    oPrimaryKeyName := utils.getPrimaryKeyName(p_schemaName,p_tableName) ;
        oFunctionBody   := 'CREATE OR REPLACE FUNCTION '||p_schemaName||'.isspget' ||p_tableName||'(pKey BIGINT) RETURNS SETOF ' ||p_schemaName||'.'||p_tableName || ' AS '||CHR(36)||CHR(36) ;
        oFunctionBody   := oFunctionBody || ' DECLARE r ' ||p_schemaName||'.'||p_tableName || '%ROWTYPE; BEGIN ' ;
        oSQLQuery           := ' FOR r IN SELECT * FROM '||p_schemaName||'.'||p_tableName || ' WHERE '||oPrimaryKeyName||' = pKey ' ;
        oFunctionBody   := oFunctionBody || oSQLQuery || 'LOOP RETURN NEXT r; END LOOP; RETURN ; ';
        oFunctionBody   := oFunctionBody ||' END; '||CHR(36) ||CHR(36)||' LANGUAGE PLPGSQL; ';
        --INSERT INTO gquery(query) VALUES(oFunctionBody) ;
        EXECUTE oFunctionBody ;


END;
$$;


--
-- TOC entry 264 (class 1255 OID 27274)
-- Name: generategetidbynamestoredprocedure(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generategetidbynamestoredprocedure(p_schemaname character varying, p_tablename character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE
        hasname             VARCHAR;
        oFunctionBody       VARCHAR ;
        oSQLQuery               VARCHAR;
        oPrimaryKeyName     VARCHAR;
BEGIN
        hasname := utils.containfieldname(p_schemaName,p_tableName);
        IF hasname IS NOT NULL THEN	
		oFunctionBody := 'SELECT utils.deletestoredprocedure('''||p_schemaname||''',''isspget' || p_tableName || 'idbyname' || ''');';
		EXECUTE ''|| oFunctionBody || '';
		oFunctionBody   := 'CREATE OR REPLACE FUNCTION '||p_schemaName || '.isspget'||p_tablename ||'idbyname (gval CHARACTER VARYING) RETURNS SETOF ' ||p_schemaName||'.'||p_tableName || ' AS '||CHR(36)||CHR(36) ;
		oFunctionBody   := oFunctionBody || ' DECLARE r record; BEGIN ' ;
		oSQLQuery           := ' FOR r IN SELECT id FROM '||p_schemaName||'.'||p_tableName || ' WHERE UPPER(name) LIKE ' || quote_literal('%') || '||UPPER(gval)||' || quote_literal('%');
		oFunctionBody   := oFunctionBody || oSQLQuery || 'LOOP RETURN NEXT r; END LOOP; RETURN ; ';
		oFunctionBody   := oFunctionBody ||' END; '||CHR(36) ||CHR(36)||' LANGUAGE PLPGSQL; ';
        --INSERT INTO gquery(query) VALUES(oFunctionBody) ;
        EXECUTE oFunctionBody ;
        END IF;


END;
$$;


--
-- TOC entry 272 (class 1255 OID 27275)
-- Name: generategetstoredprocedure(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generategetstoredprocedure(p_schemaname character varying, p_tablename character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE
        oFunctionBody   VARCHAR;
        oSQLQuery       VARCHAR;
BEGIN
	oFunctionBody := 'SELECT utils.deletestoredprocedure('''||p_schemaname||''',isspget' || p_tableName || ''');';
	--EXECUTE ''|| oFunctionBody || '';
        oFunctionBody   := 'CREATE OR REPLACE FUNCTION '||p_schemaName||'.isspget' ||p_tableName||'() RETURNS SETOF ' ||p_schemaName||'.'||p_tableName || ' AS '||CHR(36)||CHR(36) ;
        oFunctionBody   := oFunctionBody || ' DECLARE r ' ||p_schemaName||'.'||p_tableName || '%ROWTYPE; BEGIN ' ;
        oSQLQuery           := ' FOR r IN SELECT * FROM '||p_schemaName||'.'||p_tableName ||' ORDER BY id ' ;
        oFunctionBody   := oFunctionBody || oSQLQuery || 'LOOP RETURN NEXT r; END LOOP; RETURN ; ';
        oFunctionBody   := oFunctionBody ||' END; '||CHR(36) ||CHR(36)||' LANGUAGE PLPGSQL; ';
        --INSERT INTO gquery(query) VALUES(oFunctionBody) ;
        EXECUTE oFunctionBody ;

END;
$$;


--
-- TOC entry 275 (class 1255 OID 27276)
-- Name: generateinsertidstoredprocedure(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generateinsertidstoredprocedure(p_schemaname character varying, p_tablename character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE
        oRecord                         RECORD;
        oTableDef                       REFCURSOR;

        oFunctionBody           VARCHAR;
        oSQLCommand                     VARCHAR;
        oParameterList          VARCHAR;
        oFieldNameList          VARCHAR;
        oParameterValues        VARCHAR;
        oPrimaryKeyName     VARCHAR;
BEGIN

	 oFunctionBody := 'SELECT utils.deletestoredprocedure('''||p_schemaname||''',''isspins' || p_tableName || 'id'');';
	 EXECUTE ''|| oFunctionBody || '';
	 
    oPrimaryKeyName := utils.getPrimaryKeyName(p_schemaName,p_tableName) ;
        oFunctionBody := 'CREATE OR REPLACE FUNCTION ' || p_schemaName || '.isspins' || p_tableName || 'id(';
        oSQLCommand :='INSERT INTO ' || p_schemaName || '.' || p_tableName || '(';
        OPEN oTableDef FOR SELECT utils.getFieldNames(p_schemaName,p_tableName);
        FETCH oTableDef INTO oTableDef; 

        --FETCH oTableDef INTO oRecord;
        oParameterList := '';
        oFieldNameList :='' ;
        oParameterValues   :='' ;
LOOP
                FETCH oTableDef INTO oRecord ;
                -- Function body at this point should include Parameter list
                IF FOUND THEN
                        /** 
                        * If we have a record Then we assign parameter list and continue building the SQL Command
                        *
                        * Inspecting if we must insert commas. The principal is as follows :
                        *  If the parameter list is not empty i.e != '' then we have at least one element that is inserted and because the status is set to FOUND then it means the previous elements have to be appended with comma before adding the new fields found
                        *  consider that the Parameter list is the same as the field name list that would be in the INSERT statement
                        */
                        IF oParameterList != '' THEN
                                oParameterList := oParameterList || ', ' ;
                                oFieldNameList := oFieldNameList || ',' ;
                                oParameterValues := oParameterValues || ',' ;
                        END IF ;
                        /**
                        * Parameter list  and field name lists:
                        * Not taking into account agn which is the primary key
                        */
                        IF oRecord.column_name != oPrimaryKeyName THEN
                                oParameterValues := oParameterValues ||'p'|| oRecord.column_name;
                                oParameterList := oParameterList || 'p' || oRecord.column_name || ' ' || oRecord.data_type ;
                                oFieldNameList := oFieldNameList || oRecord.column_name ;
                        END IF ;
                ELSE
                        /**
                        * At this point nothing has been found in oRecord, 
                        * We can now proceed to close the SQL Command with either parenthesis or semi colon
                        * We have to place the closing parenthesis and the Exit the loop
                        */
                        oParameterList := oParameterList || ')' ;
                        oFieldNameList := oFieldNameList || ')' ;
                        oParameterValues := oParameterValues ||') RETURNING id INTO pid; ';
                        EXIT ;
                END IF ;
        
        END LOOP;
        -- Let's build the SQL Command string, remembering that the oParameterList and oFieldNameList already contains the closing parenthesis
        oSQLCommand := oSQLCommand || oFieldNameList ;
        oSQLCommand := oSQLCommand || ' VALUES (' || oParameterValues ;
        
        oFunctionBody := oFunctionBody || oParameterList;
        oFunctionBody := oFunctionBody || ' RETURNS bigint AS  ' || CHR(36) || CHR(36) || 'DECLARE pid bigint;  BEGIN ';

        oFunctionBody := oFunctionBody || oSQLCommand || 'RETURN pid;';
        oFunctionBody := oFunctionBody || ' END; ' || CHR(36)||CHR(36) ||' LANGUAGE PLPGSQL ' ; 

        CLOSE oTableDef ;
        -- INSERT INTO gQuery(query) VALUES (''||oFunctionBody||'') ;
        EXECUTE ''|| oFunctionBody || '';
END;
$$;


--
-- TOC entry 277 (class 1255 OID 27277)
-- Name: generateinsertstoredprocedure(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generateinsertstoredprocedure(p_schemaname character varying, p_tablename character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE
        oRecord                         RECORD;
        oTableDef                       REFCURSOR;

        oFunctionBody           VARCHAR;
        oSQLCommand                     VARCHAR;
        oParameterList          VARCHAR;
        oFieldNameList          VARCHAR;
        oParameterValues        VARCHAR;
        oPrimaryKeyName     VARCHAR;
BEGIN

	 oFunctionBody := 'SELECT utils.deletestoredprocedure('''||p_schemaname||''',''isspins' || p_tableName || ''');';
	 EXECUTE ''|| oFunctionBody || '';
	 
    oPrimaryKeyName := utils.getPrimaryKeyName(p_schemaName,p_tableName) ;
        oFunctionBody := 'CREATE OR REPLACE FUNCTION ' || p_schemaName || '.isspins' || p_tableName || '(';
        oSQLCommand :='INSERT INTO ' || p_schemaName || '.' || p_tableName || '(';
        OPEN oTableDef FOR SELECT utils.getFieldNames(p_schemaName,p_tableName);
        FETCH oTableDef INTO oTableDef; 

        --FETCH oTableDef INTO oRecord;
        oParameterList := '';
        oFieldNameList :='' ;
        oParameterValues   :='' ;
LOOP
                FETCH oTableDef INTO oRecord ;
                -- Function body at this point should include Parameter list
                IF FOUND THEN
                        /** 
                        * If we have a record Then we assign parameter list and continue building the SQL Command
                        *
                        * Inspecting if we must insert commas. The principal is as follows :
                        *  If the parameter list is not empty i.e != '' then we have at least one element that is inserted and because the status is set to FOUND then it means the previous elements have to be appended with comma before adding the new fields found
                        *  consider that the Parameter list is the same as the field name list that would be in the INSERT statement
                        */
                        IF oParameterList != '' THEN
                                oParameterList := oParameterList || ', ' ;
                                oFieldNameList := oFieldNameList || ',' ;
                                oParameterValues := oParameterValues || ',' ;
                        END IF ;
                        /**
                        * Parameter list  and field name lists:
                        * Not taking into account agn which is the primary key
                        */
                        IF oRecord.column_name != oPrimaryKeyName THEN
                                oParameterValues := oParameterValues ||'p'|| oRecord.column_name;
                                oParameterList := oParameterList || 'p' || oRecord.column_name || ' ' || oRecord.data_type ;
                                oFieldNameList := oFieldNameList || oRecord.column_name ;
                        END IF ;
                ELSE
                        /**
                        * At this point nothing has been found in oRecord, 
                        * We can now proceed to close the SQL Command with either parenthesis or semi colon
                        * We have to place the closing parenthesis and the Exit the loop
                        */
                        oParameterList := oParameterList || ')' ;
                        oFieldNameList := oFieldNameList || ')' ;
                        oParameterValues := oParameterValues ||') ; ';
                        EXIT ;
                END IF ;
        
        END LOOP;
        -- Let's build the SQL Command string, remembering that the oParameterList and oFieldNameList already contains the closing parenthesis
        oSQLCommand := oSQLCommand || oFieldNameList ;
        oSQLCommand := oSQLCommand || ' VALUES (' || oParameterValues ;
        
        oFunctionBody := oFunctionBody || oParameterList;
        oFunctionBody := oFunctionBody || ' RETURNS VOID AS  ' || CHR(36) || CHR(36) || '  BEGIN ';

        oFunctionBody := oFunctionBody || oSQLCommand ;
        oFunctionBody := oFunctionBody || ' END; ' || CHR(36)||CHR(36) ||' LANGUAGE PLPGSQL ' ; 

        CLOSE oTableDef ;
        -- INSERT INTO gQuery(query) VALUES (''||oFunctionBody||'') ;
        EXECUTE ''|| oFunctionBody || '';
END;
$$;


--
-- TOC entry 287 (class 1255 OID 27278)
-- Name: generatestoredprocedures(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generatestoredprocedures(p_schemaname character varying, p_tablename character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE 
        oFieldNames REFCURSOR ;
        oReferenceCount INTEGER;
BEGIN
        /*
        * In This area we insure that the p_schemaName and p_tableName exist
        * If the item does not exist then an exception is thrown
        */
         SELECT count(*) INTO oReferenceCount
        FROM information_schema.tables
        WHERE  table_schema = p_schemaName and table_name = p_tableName;
        if oReferenceCount != 1 THEN
                RAISE EXCEPTION 'Invalid schema name or table name entered ';
        ELSE 
                -- Loading field Names and assigning them to respective functions/stored procedures


--              OPEN oFieldNames FOR SELECT utils.getFieldNames(p_schemaName,p_tableName) ;
--              FETCH oFieldNames INTO oFieldNames ;
                -- Creating an insert stored procedure
                PERFORM utils.generateInsertStoredProcedure(p_schemaName,p_tableName) ;
                PERFORM utils.generateInsertIdStoredProcedure(p_schemaName,p_tableName) ;
                PERFORM utils.generateGetByAgnStoredProcedure(p_schemaName,p_tableName);
                PERFORM utils.generateUpdateStoredProcedure(p_schemaName,p_tableName);
                PERFORM utils.generateGetStoredProcedure(p_schemaName,p_tableName);
                PERFORM utils.generatefindbynamestoredprocedure(p_schemaName,p_tableName);
                PERFORM utils.generategetidbynamestoredprocedure(p_schemaName,p_tableName);
                --PERFORM utils.generatetriggeraudit(p_schemaName,p_tableName);
                
--              CLOSE oFieldNames ;
        END IF ;
END;


$$;


--
-- TOC entry 289 (class 1255 OID 27279)
-- Name: generatestoredproceduresscheme(character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generatestoredproceduresscheme(pschemaname character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE
    rec record;
    
BEGIN
    FOR rec IN 
        SELECT table_name 
        FROM information_schema.tables 
        WHERE table_schema=pSchemaName
        AND table_type='BASE TABLE'
    LOOP
        PERFORM utils.generatestoredprocedures(pSchemaName,rec.table_name);
    END LOOP;
END;
$$;


--
-- TOC entry 265 (class 1255 OID 27280)
-- Name: generatetriggeraudit(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generatetriggeraudit(p_schemaname character varying, p_tablename character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE

    oFunctionBody VARCHAR;
    
BEGIN

 oFunctionBody := 'DROP TRIGGER IF EXISTS issptrauditlog  ON '||p_schemaname||'.'||p_tablename||' RESTRICT';
 EXECUTE ''|| oFunctionBody || '';

 oFunctionBody := 'CREATE TRIGGER issptrauditlog';

 oFunctionBody := oFunctionBody || ' AFTER INSERT OR UPDATE OR DELETE';
 oFunctionBody := oFunctionBody || ' ON '||p_schemaname||'.'||p_tablename;
 oFunctionBody := oFunctionBody || ' FOR EACH ROW';
 oFunctionBody := oFunctionBody || ' EXECUTE PROCEDURE audit.isspauditlog()';
 EXECUTE ''|| oFunctionBody || '';

END;
$$;


--
-- TOC entry 295 (class 1255 OID 27281)
-- Name: generateupdatestoredprocedure(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.generateupdatestoredprocedure(p_schemaname character varying, p_tablename character varying) RETURNS void
    LANGUAGE plpgsql
    AS $$
DECLARE
        oRecord         RECORD;
        oTableDef       REFCURSOR;

        oFunctionBody       VARCHAR;
        oSQLCommand             VARCHAR;
        oFilter                 VARCHAR;
        oParameterList      VARCHAR;
        oFieldNameList      VARCHAR;
        oPrimaryKeyName     VARCHAR;
        
BEGIN

	 oFunctionBody := 'SELECT utils.deletestoredprocedure('''||p_schemaname||''',''isspupd' || p_tableName || ''');';
	 EXECUTE ''|| oFunctionBody || '';
    oPrimaryKeyName := utils.getPrimaryKeyName(p_schemaName,p_tableName) ;
        -- Creating an update stored procedure for a given <p_schemaName>.<p_tableName>
        oFunctionBody   := 'CREATE OR REPLACE FUNCTION ' ||p_schemaName||'.isspupd'||p_tableName ||'(' ;
        oSQLCommand     := 'UPDATE '||p_schemaName ||'.'||p_tableName || ' SET ';
        OPEN oTableDef FOR SELECT  utils.getFieldNames(p_schemaName,p_tableName);
        FETCH oTableDef INTO oTableDef;
    
        oParameterList  := '';
        oFieldNameList  := '';

        LOOP
            FETCH oTableDef INTO oRecord ;
                -- Function body at this point should include Parameter list
                IF FOUND THEN
                        /**
                        * If we have a record Then we assign parameter list and continue building the SQL Command
                        *
                        * Inspecting if we must insert commas. The principal is as follows :
                        *  If the parameter list is not empty i.e != '' then we have at least one element that is inserted and because the status is set to FOUND then it means the previous elements have to be appended with comma before adding the new fields found
                        *  consider that the Parameter list is the same as the field name list that would be in the INSERT statement
                        */
            
            
                        IF oParameterList != '' THEN
                                oParameterList := oParameterList || ', ' ;
                                                
                        END IF ;
                        
                        IF oFieldNameList != '' THEN
                                oFieldNameList := oFieldNameList || ',' ;

                        END IF ;
                        
                        oParameterList := oParameterList || 'p' || oRecord.column_name || ' ' || oRecord.data_type ;

                -- Parameter list  and field name lists:
                -- Not taking into account agn which is the primary key

                        IF oRecord.column_name != oPrimaryKeyName THEN
                                oFieldNameList := oFieldNameList|| oRecord.column_name ||' = '||'p'|| oRecord.column_name ;

                        ELSE
                                -- Building the filter query WHERE agn = p_agn
                                oFilter := ' WHERE '||oRecord.column_name||' = '||'p'||oRecord.column_name ||';';
                        END IF ;
                ELSE
                        -- We have to place the closing parenthesis and the Exit the loop
                        oParameterList := oParameterList || ')' ;
                
                        EXIT ;
                END IF ;
                

        END LOOP ;
        oSQLCommand := oSQLCommand || oFieldNameList ||oFilter ;
        oFunctionBody := oFunctionBody || oParameterList;
        oFunctionBody := oFunctionBody || ' RETURNS VOID AS  ' || CHR(36) || CHR(36) || '  BEGIN ';

        oFunctionBody := oFunctionBody || oSQLCommand ;
        oFunctionBody := oFunctionBody || ' END; ' || CHR(36)||CHR(36) ||' LANGUAGE PLPGSQL ' ; 


        CLOSE oTableDef ;
        --INSERT INTO gquery(query) VALUES (oFunctionBody) ;
    EXECUTE ''||oFunctionBody ||'' ;
END;
$$;


--
-- TOC entry 297 (class 1255 OID 27282)
-- Name: getfieldnames(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.getfieldnames(p_schemaname character varying, p_tablename character varying) RETURNS refcursor
    LANGUAGE plpgsql
    AS $$
DECLARE
        oFieldNames REFCURSOR;
BEGIN
        OPEN oFieldNames FOR
        SELECT column_name,data_type
        FROM 
                information_schema.columns
        WHERE
                table_schema=p_schemaName and table_name = p_tableName
                ;
    
        return oFieldNames ;
END;
$$;


--
-- TOC entry 302 (class 1255 OID 27283)
-- Name: getprimarykeyname(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.getprimarykeyname(p_schemaname character varying, p_tablename character varying) RETURNS character varying
    LANGUAGE plpgsql
    AS $$
DECLARE
       v_keyColumnName varchar  ;
       v_ConstraintName varchar ;
BEGIN
     SELECT constraint_name
     FROM information_schema.table_constraints
     WHERE table_schema = p_schemaName AND table_name = p_tableName AND constraint_type='PRIMARY KEY'
     INTO v_ConstraintName ;
     /**
     * At this point we have the constraint name and we will look for the column that maps to the primary key contraint name
     */
     IF NOT FOUND THEN
        RAISE EXCEPTION 'Missing Primary Key for selected schema/table '; --||p_schemaName||'.'||p_tableName) ;
     ELSE
          SELECT column_name
          FROM information_schema.constraint_column_usage
          WHERE table_schema = p_schemaName AND table_name = p_tableName AND constraint_name = v_ConstraintName
          INTO v_keyColumnName ;
     END IF ;
     
     RETURN v_keyColumnName ;
END ;
$$;


--
-- TOC entry 303 (class 1255 OID 27284)
-- Name: isspcontrolerror(character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.isspcontrolerror(p_code character varying) RETURNS character varying
    LANGUAGE plpgsql
    AS $$
DECLARE
mensaje Text;
BEGIN
   SELECT code||' '||name INTO mensaje FROM base.entitysubclass
   WHERE code=p_code;    
   RETURN mensaje;
END;
$$;


--
-- TOC entry 2964 (class 0 OID 0)
-- Dependencies: 303
-- Name: FUNCTION isspcontrolerror(p_code character varying); Type: COMMENT; Schema: utils; Owner: -
--

COMMENT ON FUNCTION utils.isspcontrolerror(p_code character varying) IS 'Traduce mensajes de error almacenados en base.entitysubclass';


--
-- TOC entry 304 (class 1255 OID 27285)
-- Name: isspcontrolwarning(character varying, character varying); Type: FUNCTION; Schema: utils; Owner: -
--

CREATE FUNCTION utils.isspcontrolwarning(p_code character varying, p_complemento character varying) RETURNS character varying
    LANGUAGE plpgsql
    AS $$
DECLARE
mensaje Text;
sustituye Text;
identityclasserror bigint;
posi Integer;
BEGIN
   mensaje := 'Warning.- 0000';
   SELECT identityclass INTO identityclasserror 
   FROM base.entitysubclass WHERE code=mensaje;

   SELECT code||' '||name INTO mensaje FROM base.entitysubclass
   WHERE identityclass=identityclasserror and code=p_code;
   posi := position('%' in mensaje);
   if posi > 0 then
      sustituye := replace(mensaje, '%', p_complemento);
      mensaje := sustituye;
   end if;
   RETURN mensaje;

END;
$$;


--
-- TOC entry 2965 (class 0 OID 0)
-- Dependencies: 304
-- Name: FUNCTION isspcontrolwarning(p_code character varying, p_complemento character varying); Type: COMMENT; Schema: utils; Owner: -
--

COMMENT ON FUNCTION utils.isspcontrolwarning(p_code character varying, p_complemento character varying) IS 'Traduce mensajes de warning almacenados en base.entitysubclass';


--
-- TOC entry 194 (class 1259 OID 27182)
-- Name: city_id_seq; Type: SEQUENCE; Schema: base; Owner: -
--

CREATE SEQUENCE base.city_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2966 (class 0 OID 0)
-- Dependencies: 194
-- Name: city_id_seq; Type: SEQUENCE OWNED BY; Schema: base; Owner: -
--

ALTER SEQUENCE base.city_id_seq OWNED BY base.city.id;


--
-- TOC entry 182 (class 1259 OID 27098)
-- Name: entityclass_id_seq; Type: SEQUENCE; Schema: base; Owner: -
--

CREATE SEQUENCE base.entityclass_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2967 (class 0 OID 0)
-- Dependencies: 182
-- Name: entityclass_id_seq; Type: SEQUENCE OWNED BY; Schema: base; Owner: -
--

ALTER SEQUENCE base.entityclass_id_seq OWNED BY base.entityclass.id;


--
-- TOC entry 184 (class 1259 OID 27108)
-- Name: entitysubclass_id_seq; Type: SEQUENCE; Schema: base; Owner: -
--

CREATE SEQUENCE base.entitysubclass_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2968 (class 0 OID 0)
-- Dependencies: 184
-- Name: entitysubclass_id_seq; Type: SEQUENCE OWNED BY; Schema: base; Owner: -
--

ALTER SEQUENCE base.entitysubclass_id_seq OWNED BY base.entitysubclass.id;


--
-- TOC entry 192 (class 1259 OID 27172)
-- Name: state_id_seq; Type: SEQUENCE; Schema: base; Owner: -
--

CREATE SEQUENCE base.state_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2969 (class 0 OID 0)
-- Dependencies: 192
-- Name: state_id_seq; Type: SEQUENCE OWNED BY; Schema: base; Owner: -
--

ALTER SEQUENCE base.state_id_seq OWNED BY base.state.id;


--
-- TOC entry 196 (class 1259 OID 27400)
-- Name: address_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.address_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2970 (class 0 OID 0)
-- Dependencies: 196
-- Name: address_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.address_id_seq OWNED BY core.address.id;


--
-- TOC entry 180 (class 1259 OID 27088)
-- Name: consultant_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.consultant_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2971 (class 0 OID 0)
-- Dependencies: 180
-- Name: consultant_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.consultant_id_seq OWNED BY core.consultant.id;


--
-- TOC entry 200 (class 1259 OID 43627)
-- Name: consultingenterprise_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.consultingenterprise_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2972 (class 0 OID 0)
-- Dependencies: 200
-- Name: consultingenterprise_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.consultingenterprise_id_seq OWNED BY core.consultingenterprise.id;


--
-- TOC entry 190 (class 1259 OID 27138)
-- Name: document_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.document_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2973 (class 0 OID 0)
-- Dependencies: 190
-- Name: document_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.document_id_seq OWNED BY core.document.id;


--
-- TOC entry 188 (class 1259 OID 27128)
-- Name: email_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.email_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2974 (class 0 OID 0)
-- Dependencies: 188
-- Name: email_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.email_id_seq OWNED BY core.email.id;


--
-- TOC entry 228 (class 1259 OID 44182)
-- Name: enterprise_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.enterprise_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2975 (class 0 OID 0)
-- Dependencies: 228
-- Name: enterprise_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.enterprise_id_seq OWNED BY core.enterprise.id;


--
-- TOC entry 241 (class 1259 OID 60644)
-- Name: enterprisecomplements; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.enterprisecomplements (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint,
    extinguisherh20 character varying(1),
    extinguisherco2 character varying(1),
    extinguisherpqs character varying(1),
    extinguisherk character varying(1),
    extinguisherother character varying(1),
    capextinguisherh20 text,
    capextinguisherco2 text,
    capextinguisherpqs text,
    capextinguisherk text,
    capextinguisherother text,
    evacuationroute character varying(1),
    leastriskarea character varying(1),
    firstaid character varying(1),
    stretcher character varying(1),
    meetingpoint character varying(1),
    emergencyexit character varying(1),
    emergencystair character varying(1),
    onlydesabilitiespeople character varying(1),
    emergencycommunication character varying(1),
    informationmodule character varying(1),
    lookout character varying(1),
    extinguisher character varying(1),
    hydrant character varying(1),
    alarmactivation character varying(1),
    emergencyphone character varying(1),
    emergencyequipment character varying(1),
    slipperyfloor character varying(1),
    toxicsubstance character varying(1),
    corrosivesubstance character varying(1),
    flammablematerials character varying(1),
    oxidizingmaterials character varying(1),
    riskexplosionmaterials character varying(1),
    electricrisk character varying(1),
    laserradiationrisk character varying(1),
    biologicalrisk character varying(1),
    ionizingradiation character varying(1),
    dontsmoking character varying(1),
    dontfire character varying(1),
    dontuseelevatoronemergency character varying(1),
    dontunauthorizedpersons character varying(1),
    dontrun character varying(1),
    dontscream character varying(1),
    dontpush character varying(1),
    usebadge character varying(1),
    registrationaccess character varying(1),
    parkobligation character varying(1),
    vehicleinspection character varying(1),
    packageinspection character varying(1),
    impacthelmet character varying(1),
    dielectrichelmet character varying(1),
    hood character varying(1),
    protectiongoggles character varying(1),
    goggles character varying(1),
    faceshield character varying(1),
    welderhelmet character varying(1),
    weldergoggles character varying(1),
    earplug character varying(1),
    acousticshell character varying(1),
    particulaterespirator character varying(1),
    gasvaporrespirator character varying(1),
    disposablemask character varying(1),
    selfrespirator character varying(1),
    chemicalglove character varying(1),
    dielectricglove character varying(1),
    extremetemperatureglove character varying(1),
    glove character varying(1),
    sleeve character varying(1),
    hightemperatureapron character varying(1),
    chemicalapron character varying(1),
    overol character varying(1),
    coat character varying(1),
    clothingdangeroussubstances character varying(1),
    occupationalfootwear character varying(1),
    impactfootwear character varying(1),
    conductivefootwear character varying(1),
    dielectricfootwear character varying(1),
    chemicalfootwear character varying(1),
    leggins character varying(1),
    waterproofboats character varying(1),
    equipmentagainstfall character varying(1),
    equipmentfirebrigade character varying(1),
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 240 (class 1259 OID 60642)
-- Name: enterprisecomplements_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.enterprisecomplements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2976 (class 0 OID 0)
-- Dependencies: 240
-- Name: enterprisecomplements_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.enterprisecomplements_id_seq OWNED BY core.enterprisecomplements.id;


--
-- TOC entry 178 (class 1259 OID 27078)
-- Name: party_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.party_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2977 (class 0 OID 0)
-- Dependencies: 178
-- Name: party_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.party_id_seq OWNED BY core.party.id;


--
-- TOC entry 186 (class 1259 OID 27118)
-- Name: phone_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.phone_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2978 (class 0 OID 0)
-- Dependencies: 186
-- Name: phone_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.phone_id_seq OWNED BY core.phone.id;


--
-- TOC entry 233 (class 1259 OID 44854)
-- Name: pictures; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.pictures (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    content character varying(100000) NOT NULL,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 232 (class 1259 OID 44852)
-- Name: pictures_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.pictures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2979 (class 0 OID 0)
-- Dependencies: 232
-- Name: pictures_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.pictures_id_seq OWNED BY core.pictures.id;


--
-- TOC entry 226 (class 1259 OID 43877)
-- Name: securityplancomplements_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplancomplements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2980 (class 0 OID 0)
-- Dependencies: 226
-- Name: securityplancomplements_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplancomplements_id_seq OWNED BY core.securityplancomplements.id;


--
-- TOC entry 243 (class 1259 OID 68833)
-- Name: securityplanextras; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanextras (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint,
    especificactivityprogram text,
    compliancereport text,
    safetyrules text,
    training text,
    disseminationconsentprogram text,
    alerting text,
    emergencyplans text,
    damageevaluation text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 242 (class 1259 OID 68831)
-- Name: securityplanextras_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanextras_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2981 (class 0 OID 0)
-- Dependencies: 242
-- Name: securityplanextras_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanextras_id_seq OWNED BY core.securityplanextras.id;


--
-- TOC entry 235 (class 1259 OID 44952)
-- Name: securityplanriskanalysis; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysis (
    id integer NOT NULL,
    code text,
    name text,
    idparty bigint NOT NULL,
    info text,
    location text,
    northstreet text,
    southstreet text,
    eaststreet text,
    weststreet text,
    northbuilding text,
    southbuilding text,
    eastbuilding text,
    westbuilding text,
    vitalservices text,
    idcimentation bigint,
    idstructure bigint,
    idwall bigint,
    idroof bigint,
    idfloor bigint,
    idenjarre bigint,
    idelectricalinstall bigint,
    idhidrosanitaryinstall bigint,
    idbathroomfurniture bigint,
    idcanceleria bigint,
    iddoors bigint,
    idstairs bigint,
    idfinishesfloors bigint,
    idfinisheswalls bigint,
    idfinishesdoors bigint,
    idfinishesstairs bigint,
    permanentcensus text,
    floatcensus text,
    ownproperty text,
    leasedproperty text,
    otherproperty text,
    surface double precision,
    antiquity double precision,
    numlevel double precision,
    highbuilding double precision,
    geotechnichallocation text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 234 (class 1259 OID 44950)
-- Name: securityplanriskanalysis_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2982 (class 0 OID 0)
-- Dependencies: 234
-- Name: securityplanriskanalysis_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysis_id_seq OWNED BY core.securityplanriskanalysis.id;


--
-- TOC entry 218 (class 1259 OID 43824)
-- Name: securityplanriskanalysysalarmsystem_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysysalarmsystem_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2983 (class 0 OID 0)
-- Dependencies: 218
-- Name: securityplanriskanalysysalarmsystem_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysysalarmsystem_id_seq OWNED BY core.securityplanriskanalysysalarmsystem.id;


--
-- TOC entry 222 (class 1259 OID 43844)
-- Name: securityplanriskanalysysantifire_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysysantifire_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2984 (class 0 OID 0)
-- Dependencies: 222
-- Name: securityplanriskanalysysantifire_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysysantifire_id_seq OWNED BY core.securityplanriskanalysysantifire.id;


--
-- TOC entry 202 (class 1259 OID 43671)
-- Name: securityplanriskanalysyscomplements_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysyscomplements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2985 (class 0 OID 0)
-- Dependencies: 202
-- Name: securityplanriskanalysyscomplements_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysyscomplements_id_seq OWNED BY core.securityplanriskanalysyscomplements.id;


--
-- TOC entry 224 (class 1259 OID 43854)
-- Name: securityplanriskanalysysdirectives_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysysdirectives_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2986 (class 0 OID 0)
-- Dependencies: 224
-- Name: securityplanriskanalysysdirectives_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysysdirectives_id_seq OWNED BY core.securityplanriskanalysysdirectives.id;


--
-- TOC entry 212 (class 1259 OID 43791)
-- Name: securityplanriskanalysysdirectory_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysysdirectory_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2987 (class 0 OID 0)
-- Dependencies: 212
-- Name: securityplanriskanalysysdirectory_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysysdirectory_id_seq OWNED BY core.securityplanriskanalysysdirectory.id;


--
-- TOC entry 237 (class 1259 OID 45037)
-- Name: securityplanriskanalysysemergencydirectory; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysysemergencydirectory (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    logo text,
    enterprise character varying(50),
    phone character varying(50),
    address text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 236 (class 1259 OID 45035)
-- Name: securityplanriskanalysysemergencydirectory_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysysemergencydirectory_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2988 (class 0 OID 0)
-- Dependencies: 236
-- Name: securityplanriskanalysysemergencydirectory_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysysemergencydirectory_id_seq OWNED BY core.securityplanriskanalysysemergencydirectory.id;


--
-- TOC entry 221 (class 1259 OID 43836)
-- Name: securityplanriskanalysysemerncyresources; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysysemerncyresources (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    quantity bigint,
    equipment text,
    locationc text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 220 (class 1259 OID 43834)
-- Name: securityplanriskanalysysemerncyresources_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysysemerncyresources_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2989 (class 0 OID 0)
-- Dependencies: 220
-- Name: securityplanriskanalysysemerncyresources_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysysemerncyresources_id_seq OWNED BY core.securityplanriskanalysysemerncyresources.id;


--
-- TOC entry 216 (class 1259 OID 43811)
-- Name: securityplanriskanalysysmisc_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysysmisc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2990 (class 0 OID 0)
-- Dependencies: 216
-- Name: securityplanriskanalysysmisc_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysysmisc_id_seq OWNED BY core.securityplanriskanalysysmisc.id;


--
-- TOC entry 205 (class 1259 OID 43694)
-- Name: securityplanriskanalysysnaturalsthreats; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysysnaturalsthreats (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    infonaturalthreats text,
    earthquakenull character varying(1),
    earthquakelow character varying(1),
    earthquakemedium character varying(1),
    earthquakehigh character varying(1),
    earthquakeno character varying(1),
    volcanismnull character varying(1),
    volcanismlow character varying(1),
    volcanismmedium character varying(1),
    volcanismhigh character varying(1),
    volcanismno character varying(1),
    soilcollapsenull character varying(1),
    soilcollapselow character varying(1),
    soilcollapsemedium character varying(1),
    soilcollapsehigh character varying(1),
    soilcollapseno character varying(1),
    sinkingnull character varying(1),
    sinkinglow character varying(1),
    sinkingmedium character varying(1),
    sinkinghigh character varying(1),
    sinkingno character varying(1),
    crackingnull character varying(1),
    crackinglow character varying(1),
    crackingmedium character varying(1),
    crackinghigh character varying(1),
    crackingno character varying(1),
    mudnull character varying(1),
    mudlow character varying(1),
    mudmedium character varying(1),
    mudhigh character varying(1),
    mudno character varying(1),
    landslidesnull character varying(1),
    landslideslow character varying(1),
    landslidesmedium character varying(1),
    landslideshigh character varying(1),
    landslidesno character varying(1),
    acidrainnull character varying(1),
    acidrainlow character varying(1),
    acidrainmedium character varying(1),
    acidrainhigh character varying(1),
    acidrainno character varying(1),
    pouringrainnull character varying(1),
    pouringrainlow character varying(1),
    pouringrainmedium character varying(1),
    pouringrainhigh character varying(1),
    pouringrainno character varying(1),
    tropicalstormnull character varying(1),
    tropicalstormlow character varying(1),
    tropicalstormmedium character varying(1),
    tropicalstormhigh character varying(1),
    tropicalstormno character varying(1),
    floodingnull character varying(1),
    floodinglow character varying(1),
    floodingmedium character varying(1),
    floodinghigh character varying(1),
    floodingno character varying(1),
    hurricanesnull character varying(1),
    hurricaneslow character varying(1),
    hurricanesmedium character varying(1),
    hurricaneshigh character varying(1),
    hurricanesno character varying(1),
    electricstormnull character varying(1),
    electricstormlow character varying(1),
    electricstormmedium character varying(1),
    electricstormhigh character varying(1),
    electricstormno character varying(1),
    extremetemperaturesnull character varying(1),
    extremetemperatureslow character varying(1),
    extremetemperaturesmedium character varying(1),
    extremetemperatureshigh character varying(1),
    extremetemperaturesno character varying(1),
    thrombusnull character varying(1),
    thrombuslow character varying(1),
    thrombusmedium character varying(1),
    thrombushigh character varying(1),
    thrombusno character varying(1),
    hailstormnull character varying(1),
    hailstormlow character varying(1),
    hailstormmedium character varying(1),
    hailstormhigh character varying(1),
    hailstormno character varying(1),
    strongwindsnull character varying(1),
    strongwindslow character varying(1),
    strongwindsmedium character varying(1),
    strongwindshigh character varying(1),
    strongwindsno character varying(1),
    droughtsnull character varying(1),
    droughtslow character varying(1),
    droughtsmedium character varying(1),
    droughtshigh character varying(1),
    droughtsno character varying(1),
    firenull character varying(1),
    firelow character varying(1),
    firemedium character varying(1),
    firehigh character varying(1),
    fireno character varying(1),
    explosionsnull character varying(1),
    explosionslow character varying(1),
    explosionsmedium character varying(1),
    explosionshigh character varying(1),
    explosionsno character varying(1),
    chemicalspillnull character varying(1),
    chemicalspilllow character varying(1),
    chemicalspillmedium character varying(1),
    chemicalspillhigh character varying(1),
    chemicalspillno character varying(1),
    radiationsnull character varying(1),
    radiationslow character varying(1),
    radiationsmedium character varying(1),
    radiationshigh character varying(1),
    radiationsno character varying(1),
    enviromentalpollutionsnull character varying(1),
    enviromentalpollutionslow character varying(1),
    enviromentalpollutionsmedium character varying(1),
    enviromentalpollutionshigh character varying(1),
    enviromentalpollutionsno character varying(1),
    desertificationnull character varying(1),
    desertificationlow character varying(1),
    desertificationmedium character varying(1),
    desertificationhigh character varying(1),
    desertificationno character varying(1),
    epidemicnull character varying(1),
    epidemiclow character varying(1),
    epidemicmedium character varying(1),
    epidemichigh character varying(1),
    epidemicno character varying(1),
    intoxicationnull character varying(1),
    intoxicationlow character varying(1),
    intoxicationmedium character varying(1),
    intoxicationhigh character varying(1),
    intoxicationno character varying(1),
    poisoningnull character varying(1),
    poisoninglow character varying(1),
    poisoningmedium character varying(1),
    poisoninghigh character varying(1),
    poisoningno character varying(1),
    assaultsnull character varying(1),
    assaultslow character varying(1),
    assaultsmedium character varying(1),
    assaultshigh character varying(1),
    assaultsno character varying(1),
    interruptionbasicservicesnull character varying(1),
    interruptionbasicserviceslow character varying(1),
    interruptionbasicservicesmedium character varying(1),
    interruptionbasicserviceshigh character varying(1),
    interruptionbasicservicesno character varying(1),
    masspopulationconcentrationnull character varying(1),
    masspopulationconcentrationlow character varying(1),
    masspopulationconcentrationmedium character varying(1),
    masspopulationconcentrationhigh character varying(1),
    masspopulationconcentrationno character varying(1),
    manifestationsnull character varying(1),
    manifestationslow character varying(1),
    manifestationsmedium character varying(1),
    manifestationshigh character varying(1),
    manifestationsno character varying(1),
    terrorismnull character varying(1),
    terrorismlow character varying(1),
    terrorismmedium character varying(1),
    terrorismhigh character varying(1),
    terrorismno character varying(1),
    transportaccidentsnull character varying(1),
    transportaccidentslow character varying(1),
    transportaccidentsmedium character varying(1),
    transportaccidentshigh character varying(1),
    transportaccidentsno character varying(1),
    naturalphenomenasummary text,
    analysysfoundrisks text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 204 (class 1259 OID 43692)
-- Name: securityplanriskanalysysnaturalsthreats_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysysnaturalsthreats_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2991 (class 0 OID 0)
-- Dependencies: 204
-- Name: securityplanriskanalysysnaturalsthreats_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysysnaturalsthreats_id_seq OWNED BY core.securityplanriskanalysysnaturalsthreats.id;


--
-- TOC entry 214 (class 1259 OID 43801)
-- Name: securityplanriskanalysysstrategiclocations_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysysstrategiclocations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2992 (class 0 OID 0)
-- Dependencies: 214
-- Name: securityplanriskanalysysstrategiclocations_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysysstrategiclocations_id_seq OWNED BY core.securityplanriskanalysysstrategiclocations.id;


--
-- TOC entry 211 (class 1259 OID 43774)
-- Name: securityplanriskanalysyszone; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplanriskanalysyszone (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    cimentation character varying(1),
    cimentationcutting character varying(1),
    cimentationretraction character varying(1),
    cimentationflaming character varying(1),
    cimentationtemperature character varying(1),
    cimentationcorrosive character varying(1),
    cimentationcomplexion character varying(1),
    cimentationflexion character varying(1),
    cimentationpanding character varying(1),
    cimentationcollapsing character varying(1),
    cimentationinclination character varying(1),
    cimentationsettlement character varying(1),
    cimentationcraking character varying(1),
    cimentationothers character varying(1),
    "column" character varying(1),
    columncutting character varying(1),
    columnretraction character varying(1),
    columnflaming character varying(1),
    columntemperature character varying(1),
    columncorrosive character varying(1),
    columncomplexion character varying(1),
    columnflexion character varying(1),
    columnpanding character varying(1),
    columncollapsing character varying(1),
    columninclination character varying(1),
    columnsettlement character varying(1),
    columncraking character varying(1),
    columnothers character varying(1),
    wall character varying(1),
    wallcutting character varying(1),
    wallretraction character varying(1),
    wallflaming character varying(1),
    walltemperature character varying(1),
    wallcorrosive character varying(1),
    wallcomplexion character varying(1),
    wallflexion character varying(1),
    wallpanding character varying(1),
    wallcollapsing character varying(1),
    wallinclination character varying(1),
    wallsettlement character varying(1),
    wallcraking character varying(1),
    wallothers character varying(1),
    roof character varying(1),
    roofcutting character varying(1),
    roofretraction character varying(1),
    roofflaming character varying(1),
    rooftemperature character varying(1),
    roofcorrosive character varying(1),
    roofcomplexion character varying(1),
    roofflexion character varying(1),
    roofpanding character varying(1),
    roofcollapsing character varying(1),
    roofinclination character varying(1),
    roofsettlement character varying(1),
    roofcraking character varying(1),
    roofothers character varying(1),
    stairs character varying(1),
    stairscutting character varying(1),
    stairsretraction character varying(1),
    stairsflaming character varying(1),
    stairstemperature character varying(1),
    stairscorrosive character varying(1),
    stairscomplexion character varying(1),
    stairsflexion character varying(1),
    stairspanding character varying(1),
    stairscollapsing character varying(1),
    stairsinclination character varying(1),
    stairssettlement character varying(1),
    stairscraking character varying(1),
    stairsothers character varying(1),
    trabes character varying(1),
    trabescutting character varying(1),
    trabesretraction character varying(1),
    trabesflaming character varying(1),
    trabestemperature character varying(1),
    trabescorrosive character varying(1),
    trabescomplexion character varying(1),
    trabesflexion character varying(1),
    trabespanding character varying(1),
    trabescollapsing character varying(1),
    trabesinclination character varying(1),
    trabessettlement character varying(1),
    trabescraking character varying(1),
    trabesothers character varying(1),
    structuraldamagehigh character varying(1),
    structuraldamagemedium character varying(1),
    structuraldamagelow character varying(1),
    structuraldamagenonexistent character varying(1),
    collapsehigh character varying(1),
    collapsemedium character varying(1),
    collapselow character varying(1),
    collapsenonexistent character varying(1),
    finishdamagehigh character varying(1),
    finishdamagemedium character varying(1),
    finishdamagelow character varying(1),
    finishdamagenonexistent character varying(1),
    severedamagehigh character varying(1),
    severedamagemedium character varying(1),
    severedamagelow character varying(1),
    severedamagenonexistent character varying(1),
    sinkinghigh character varying(1),
    sinkingmedium character varying(1),
    sinkinglow character varying(1),
    sinkingnonexistent character varying(1),
    inclinationhigh character varying(1),
    inclinationmedium character varying(1),
    inclinationlow character varying(1),
    inclinationnonexistent character varying(1),
    inundationhigh character varying(1),
    inundationmedium character varying(1),
    inundationlow character varying(1),
    inundationnonexistent character varying(1),
    firehigh character varying(1),
    firemedium character varying(1),
    firelow character varying(1),
    firenonexistent character varying(1),
    explosionhigh character varying(1),
    explosionmedium character varying(1),
    explosionlow character varying(1),
    explosionnonexistent character varying(1),
    gasleakhigh character varying(1),
    gasleakmedium character varying(1),
    gasleaklow character varying(1),
    gasleaknonexistent character varying(1),
    spillhazardousmaterialshigh character varying(1),
    spillhazardousmaterialsmedium character varying(1),
    spillhazardousmaterialslow character varying(1),
    spillhazardousmaterialsnonexistent character varying(1),
    pollutionhigh character varying(1),
    pollutionmedium character varying(1),
    pollutionlow character varying(1),
    pollutionnonexistent character varying(1),
    epidemichigh character varying(1),
    epidemicmedium character varying(1),
    epidemiclow character varying(1),
    epidemicnonexistent character varying(1),
    bombthreathigh character varying(1),
    bombthreatmedium character varying(1),
    bombthreatlow character varying(1),
    bombthreatnonexistent character varying(1),
    highvoltagetower character varying(1),
    electricpowerpoles character varying(1),
    electrictransformers character varying(1),
    damagesewers character varying(1),
    damagesidewalks character varying(1),
    hightanks character varying(1),
    bigtrees character varying(1),
    overpasses character varying(1),
    pedestrianbridge character varying(1),
    muchtraffic character varying(1),
    highbuilding character varying(1),
    bigannouncements character varying(1),
    dangercanopies character varying(1),
    notoriouosinclination character varying(1),
    closestreets character varying(1),
    slopingstreets character varying(1),
    industriesorbussiness character varying(1),
    pemexinstall character varying(1),
    chemicalinsdustries character varying(1),
    industries character varying(1),
    schools character varying(1),
    hospitals character varying(1),
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 210 (class 1259 OID 43772)
-- Name: securityplanriskanalysyszone_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplanriskanalysyszone_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2993 (class 0 OID 0)
-- Dependencies: 210
-- Name: securityplanriskanalysyszone_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplanriskanalysyszone_id_seq OWNED BY core.securityplanriskanalysyszone.id;


--
-- TOC entry 230 (class 1259 OID 44201)
-- Name: securityplansitelocation_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplansitelocation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2994 (class 0 OID 0)
-- Dependencies: 230
-- Name: securityplansitelocation_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplansitelocation_id_seq OWNED BY core.securityplansitelocation.id;


--
-- TOC entry 206 (class 1259 OID 43712)
-- Name: securityplansubprogram_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplansubprogram_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2995 (class 0 OID 0)
-- Dependencies: 206
-- Name: securityplansubprogram_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplansubprogram_id_seq OWNED BY core.securityplansubprogram.id;


--
-- TOC entry 239 (class 1259 OID 45063)
-- Name: securityplansubprogrambrigadedirectory; Type: TABLE; Schema: core; Owner: -
--

CREATE TABLE core.securityplansubprogrambrigadedirectory (
    id integer NOT NULL,
    code character varying(50),
    name character varying(50),
    idparty bigint NOT NULL,
    uipcheadlinename text,
    uipcheadlinelocation text,
    uipccoordinatorname text,
    uipccoordinatorlocation text,
    uipcchiefname text,
    uipcchieflocation text,
    uipcfirstaidbrigadechiefname text,
    uipcfirstaidbrigadechieflocation text,
    uipcantifirebrigadename text,
    uipcantifirebrigadelocation text,
    uipcevacuationbrigadename text,
    uipcevacuationbrigadelocation text,
    uipcsearchbrigadename text,
    uipcsearchbrigadelocation text,
    brigadeindetification text,
    active character varying(1) DEFAULT 'Y'::character varying,
    delete character varying(1) DEFAULT 'N'::character varying
);


--
-- TOC entry 238 (class 1259 OID 45061)
-- Name: securityplansubprogrambrigadedirectory_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.securityplansubprogrambrigadedirectory_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2996 (class 0 OID 0)
-- Dependencies: 238
-- Name: securityplansubprogrambrigadedirectory_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.securityplansubprogrambrigadedirectory_id_seq OWNED BY core.securityplansubprogrambrigadedirectory.id;


--
-- TOC entry 208 (class 1259 OID 43731)
-- Name: threatriskanalysys_id_seq; Type: SEQUENCE; Schema: core; Owner: -
--

CREATE SEQUENCE core.threatriskanalysys_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2997 (class 0 OID 0)
-- Dependencies: 208
-- Name: threatriskanalysys_id_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: -
--

ALTER SEQUENCE core.threatriskanalysys_id_seq OWNED BY core.threatriskanalysys.id;


--
-- TOC entry 2611 (class 2604 OID 27187)
-- Name: city id; Type: DEFAULT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.city ALTER COLUMN id SET DEFAULT nextval('base.city_id_seq'::regclass);


--
-- TOC entry 2593 (class 2604 OID 27103)
-- Name: entityclass id; Type: DEFAULT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.entityclass ALTER COLUMN id SET DEFAULT nextval('base.entityclass_id_seq'::regclass);


--
-- TOC entry 2596 (class 2604 OID 27113)
-- Name: entitysubclass id; Type: DEFAULT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.entitysubclass ALTER COLUMN id SET DEFAULT nextval('base.entitysubclass_id_seq'::regclass);


--
-- TOC entry 2608 (class 2604 OID 27177)
-- Name: state id; Type: DEFAULT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.state ALTER COLUMN id SET DEFAULT nextval('base.state_id_seq'::regclass);


--
-- TOC entry 2614 (class 2604 OID 27405)
-- Name: address id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.address ALTER COLUMN id SET DEFAULT nextval('core.address_id_seq'::regclass);


--
-- TOC entry 2590 (class 2604 OID 27093)
-- Name: consultant id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.consultant ALTER COLUMN id SET DEFAULT nextval('core.consultant_id_seq'::regclass);


--
-- TOC entry 2623 (class 2604 OID 43632)
-- Name: consultingenterprise id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.consultingenterprise ALTER COLUMN id SET DEFAULT nextval('core.consultingenterprise_id_seq'::regclass);


--
-- TOC entry 2605 (class 2604 OID 27143)
-- Name: document id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.document ALTER COLUMN id SET DEFAULT nextval('core.document_id_seq'::regclass);


--
-- TOC entry 2602 (class 2604 OID 27133)
-- Name: email id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.email ALTER COLUMN id SET DEFAULT nextval('core.email_id_seq'::regclass);


--
-- TOC entry 2665 (class 2604 OID 44187)
-- Name: enterprise id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.enterprise ALTER COLUMN id SET DEFAULT nextval('core.enterprise_id_seq'::regclass);


--
-- TOC entry 2684 (class 2604 OID 60647)
-- Name: enterprisecomplements id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.enterprisecomplements ALTER COLUMN id SET DEFAULT nextval('core.enterprisecomplements_id_seq'::regclass);


--
-- TOC entry 2587 (class 2604 OID 27083)
-- Name: party id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.party ALTER COLUMN id SET DEFAULT nextval('core.party_id_seq'::regclass);


--
-- TOC entry 2599 (class 2604 OID 27123)
-- Name: phone id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.phone ALTER COLUMN id SET DEFAULT nextval('core.phone_id_seq'::regclass);


--
-- TOC entry 2672 (class 2604 OID 44857)
-- Name: pictures id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.pictures ALTER COLUMN id SET DEFAULT nextval('core.pictures_id_seq'::regclass);


--
-- TOC entry 2662 (class 2604 OID 43882)
-- Name: securityplancomplements id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplancomplements ALTER COLUMN id SET DEFAULT nextval('core.securityplancomplements_id_seq'::regclass);


--
-- TOC entry 2687 (class 2604 OID 68836)
-- Name: securityplanextras id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanextras ALTER COLUMN id SET DEFAULT nextval('core.securityplanextras_id_seq'::regclass);


--
-- TOC entry 2675 (class 2604 OID 44955)
-- Name: securityplanriskanalysis id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysis_id_seq'::regclass);


--
-- TOC entry 2650 (class 2604 OID 43829)
-- Name: securityplanriskanalysysalarmsystem id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysalarmsystem ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysysalarmsystem_id_seq'::regclass);


--
-- TOC entry 2656 (class 2604 OID 43849)
-- Name: securityplanriskanalysysantifire id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysantifire ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysysantifire_id_seq'::regclass);


--
-- TOC entry 2626 (class 2604 OID 43676)
-- Name: securityplanriskanalysyscomplements id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysyscomplements ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysyscomplements_id_seq'::regclass);


--
-- TOC entry 2659 (class 2604 OID 43859)
-- Name: securityplanriskanalysysdirectives id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysdirectives ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysysdirectives_id_seq'::regclass);


--
-- TOC entry 2641 (class 2604 OID 43796)
-- Name: securityplanriskanalysysdirectory id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysdirectory ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysysdirectory_id_seq'::regclass);


--
-- TOC entry 2678 (class 2604 OID 45040)
-- Name: securityplanriskanalysysemergencydirectory id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysemergencydirectory ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysysemergencydirectory_id_seq'::regclass);


--
-- TOC entry 2653 (class 2604 OID 43839)
-- Name: securityplanriskanalysysemerncyresources id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysemerncyresources ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysysemerncyresources_id_seq'::regclass);


--
-- TOC entry 2647 (class 2604 OID 43816)
-- Name: securityplanriskanalysysmisc id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysmisc ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysysmisc_id_seq'::regclass);


--
-- TOC entry 2629 (class 2604 OID 43697)
-- Name: securityplanriskanalysysnaturalsthreats id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysnaturalsthreats ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysysnaturalsthreats_id_seq'::regclass);


--
-- TOC entry 2644 (class 2604 OID 43806)
-- Name: securityplanriskanalysysstrategiclocations id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysstrategiclocations ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysysstrategiclocations_id_seq'::regclass);


--
-- TOC entry 2638 (class 2604 OID 43777)
-- Name: securityplanriskanalysyszone id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysyszone ALTER COLUMN id SET DEFAULT nextval('core.securityplanriskanalysyszone_id_seq'::regclass);


--
-- TOC entry 2669 (class 2604 OID 44206)
-- Name: securityplansitelocation id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplansitelocation ALTER COLUMN id SET DEFAULT nextval('core.securityplansitelocation_id_seq'::regclass);


--
-- TOC entry 2632 (class 2604 OID 43717)
-- Name: securityplansubprogram id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplansubprogram ALTER COLUMN id SET DEFAULT nextval('core.securityplansubprogram_id_seq'::regclass);


--
-- TOC entry 2681 (class 2604 OID 45066)
-- Name: securityplansubprogrambrigadedirectory id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplansubprogrambrigadedirectory ALTER COLUMN id SET DEFAULT nextval('core.securityplansubprogrambrigadedirectory_id_seq'::regclass);


--
-- TOC entry 2584 (class 2604 OID 27073)
-- Name: template_base id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.template_base ALTER COLUMN id SET DEFAULT nextval('core.template_base_id_seq'::regclass);


--
-- TOC entry 2635 (class 2604 OID 43736)
-- Name: threatriskanalysys id; Type: DEFAULT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.threatriskanalysys ALTER COLUMN id SET DEFAULT nextval('core.threatriskanalysys_id_seq'::regclass);


--
-- TOC entry 2717 (class 2606 OID 27191)
-- Name: city city_pkey; Type: CONSTRAINT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.city
    ADD CONSTRAINT city_pkey PRIMARY KEY (id);


--
-- TOC entry 2698 (class 2606 OID 27107)
-- Name: entityclass entityclass_pkey; Type: CONSTRAINT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.entityclass
    ADD CONSTRAINT entityclass_pkey PRIMARY KEY (id);


--
-- TOC entry 2700 (class 2606 OID 27117)
-- Name: entitysubclass entitysubclass_pkey; Type: CONSTRAINT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.entitysubclass
    ADD CONSTRAINT entitysubclass_pkey PRIMARY KEY (id);


--
-- TOC entry 2715 (class 2606 OID 27181)
-- Name: state state_pkey; Type: CONSTRAINT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.state
    ADD CONSTRAINT state_pkey PRIMARY KEY (id);


--
-- TOC entry 2719 (class 2606 OID 27412)
-- Name: address address_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.address
    ADD CONSTRAINT address_pkey PRIMARY KEY (id);


--
-- TOC entry 2695 (class 2606 OID 27097)
-- Name: consultant consultant_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.consultant
    ADD CONSTRAINT consultant_pkey PRIMARY KEY (id);


--
-- TOC entry 2734 (class 2606 OID 43636)
-- Name: consultingenterprise consultingenterprise_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.consultingenterprise
    ADD CONSTRAINT consultingenterprise_pkey PRIMARY KEY (id);


--
-- TOC entry 2710 (class 2606 OID 27147)
-- Name: document document_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.document
    ADD CONSTRAINT document_pkey PRIMARY KEY (id);


--
-- TOC entry 2706 (class 2606 OID 27137)
-- Name: email email_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.email
    ADD CONSTRAINT email_pkey PRIMARY KEY (id);


--
-- TOC entry 2780 (class 2606 OID 44195)
-- Name: enterprise enterprise_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.enterprise
    ADD CONSTRAINT enterprise_pkey PRIMARY KEY (id);


--
-- TOC entry 2793 (class 2606 OID 60654)
-- Name: enterprisecomplements enterprisecomplements_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.enterprisecomplements
    ADD CONSTRAINT enterprisecomplements_pkey PRIMARY KEY (id);


--
-- TOC entry 2693 (class 2606 OID 27087)
-- Name: party party_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.party
    ADD CONSTRAINT party_pkey PRIMARY KEY (id);


--
-- TOC entry 2704 (class 2606 OID 27127)
-- Name: phone phone_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.phone
    ADD CONSTRAINT phone_pkey PRIMARY KEY (id);


--
-- TOC entry 2784 (class 2606 OID 44864)
-- Name: pictures pictures_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.pictures
    ADD CONSTRAINT pictures_pkey PRIMARY KEY (id);


--
-- TOC entry 2751 (class 2606 OID 43740)
-- Name: threatriskanalysys pk_threatriskanalysys; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.threatriskanalysys
    ADD CONSTRAINT pk_threatriskanalysys PRIMARY KEY (id);


--
-- TOC entry 2778 (class 2606 OID 43889)
-- Name: securityplancomplements securityplancomplements_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplancomplements
    ADD CONSTRAINT securityplancomplements_pkey PRIMARY KEY (id);


--
-- TOC entry 2797 (class 2606 OID 68843)
-- Name: securityplanextras securityplanextras_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanextras
    ADD CONSTRAINT securityplanextras_pkey PRIMARY KEY (id);


--
-- TOC entry 2786 (class 2606 OID 44962)
-- Name: securityplanriskanalysis securityplanriskanalysis_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT securityplanriskanalysis_pkey PRIMARY KEY (id);


--
-- TOC entry 2766 (class 2606 OID 43833)
-- Name: securityplanriskanalysysalarmsystem securityplanriskanalysysalarmsystem_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysalarmsystem
    ADD CONSTRAINT securityplanriskanalysysalarmsystem_pkey PRIMARY KEY (id);


--
-- TOC entry 2772 (class 2606 OID 43853)
-- Name: securityplanriskanalysysantifire securityplanriskanalysysantifire_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysantifire
    ADD CONSTRAINT securityplanriskanalysysantifire_pkey PRIMARY KEY (id);


--
-- TOC entry 2741 (class 2606 OID 43683)
-- Name: securityplanriskanalysyscomplements securityplanriskanalysyscomplements_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysyscomplements
    ADD CONSTRAINT securityplanriskanalysyscomplements_pkey PRIMARY KEY (id);


--
-- TOC entry 2775 (class 2606 OID 43863)
-- Name: securityplanriskanalysysdirectives securityplanriskanalysysdirectives_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysdirectives
    ADD CONSTRAINT securityplanriskanalysysdirectives_pkey PRIMARY KEY (id);


--
-- TOC entry 2757 (class 2606 OID 43800)
-- Name: securityplanriskanalysysdirectory securityplanriskanalysysdirectory_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysdirectory
    ADD CONSTRAINT securityplanriskanalysysdirectory_pkey PRIMARY KEY (id);


--
-- TOC entry 2788 (class 2606 OID 45047)
-- Name: securityplanriskanalysysemergencydirectory securityplanriskanalysysemergencydirectory_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysemergencydirectory
    ADD CONSTRAINT securityplanriskanalysysemergencydirectory_pkey PRIMARY KEY (id);


--
-- TOC entry 2769 (class 2606 OID 43843)
-- Name: securityplanriskanalysysemerncyresources securityplanriskanalysysemerncyresources_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysemerncyresources
    ADD CONSTRAINT securityplanriskanalysysemerncyresources_pkey PRIMARY KEY (id);


--
-- TOC entry 2763 (class 2606 OID 43823)
-- Name: securityplanriskanalysysmisc securityplanriskanalysysmisc_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysmisc
    ADD CONSTRAINT securityplanriskanalysysmisc_pkey PRIMARY KEY (id);


--
-- TOC entry 2744 (class 2606 OID 43704)
-- Name: securityplanriskanalysysnaturalsthreats securityplanriskanalysysnaturalsthreats_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysnaturalsthreats
    ADD CONSTRAINT securityplanriskanalysysnaturalsthreats_pkey PRIMARY KEY (id);


--
-- TOC entry 2760 (class 2606 OID 43810)
-- Name: securityplanriskanalysysstrategiclocations securityplanriskanalysysstrategiclocations_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysstrategiclocations
    ADD CONSTRAINT securityplanriskanalysysstrategiclocations_pkey PRIMARY KEY (id);


--
-- TOC entry 2754 (class 2606 OID 43781)
-- Name: securityplanriskanalysyszone securityplanriskanalysyszone_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysyszone
    ADD CONSTRAINT securityplanriskanalysyszone_pkey PRIMARY KEY (id);


--
-- TOC entry 2782 (class 2606 OID 44213)
-- Name: securityplansitelocation securityplansitelocation_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplansitelocation
    ADD CONSTRAINT securityplansitelocation_pkey PRIMARY KEY (id);


--
-- TOC entry 2747 (class 2606 OID 43724)
-- Name: securityplansubprogram securityplansubprogram_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplansubprogram
    ADD CONSTRAINT securityplansubprogram_pkey PRIMARY KEY (id);


--
-- TOC entry 2791 (class 2606 OID 45073)
-- Name: securityplansubprogrambrigadedirectory securityplansubprogrambrigadedirectory_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplansubprogrambrigadedirectory
    ADD CONSTRAINT securityplansubprogrambrigadedirectory_pkey PRIMARY KEY (id);


--
-- TOC entry 2691 (class 2606 OID 27077)
-- Name: template_base template_base_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.template_base
    ADD CONSTRAINT template_base_pkey PRIMARY KEY (id);


--
-- TOC entry 2725 (class 2606 OID 43470)
-- Name: threats threats_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.threats
    ADD CONSTRAINT threats_pkey PRIMARY KEY (id);


--
-- TOC entry 2730 (class 2606 OID 43478)
-- Name: threatsitelocation threatsitelocation_pkey; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.threatsitelocation
    ADD CONSTRAINT threatsitelocation_pkey PRIMARY KEY (id);


--
-- TOC entry 2738 (class 2606 OID 44132)
-- Name: consultingenterprise u_consultingenterprise; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.consultingenterprise
    ADD CONSTRAINT u_consultingenterprise UNIQUE (idpartyconsultant, idpartyenterprise);


--
-- TOC entry 2732 (class 2606 OID 43480)
-- Name: threatsitelocation u_threat_location; Type: CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.threatsitelocation
    ADD CONSTRAINT u_threat_location UNIQUE (idthreat, idsitelocation);


--
-- TOC entry 2707 (class 1259 OID 44156)
-- Name: fki_fk_; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_ ON core.email USING btree (idparty);


--
-- TOC entry 2720 (class 1259 OID 44102)
-- Name: fki_fk_address_addresstype; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_address_addresstype ON core.address USING btree (idaddresstype);


--
-- TOC entry 2721 (class 1259 OID 44114)
-- Name: fki_fk_address_city; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_address_city ON core.address USING btree (idcity);


--
-- TOC entry 2722 (class 1259 OID 44096)
-- Name: fki_fk_address_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_address_party ON core.address USING btree (idparty);


--
-- TOC entry 2723 (class 1259 OID 44108)
-- Name: fki_fk_address_state; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_address_state ON core.address USING btree (idstate);


--
-- TOC entry 2696 (class 1259 OID 44120)
-- Name: fki_fk_consultant_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_consultant_party ON core.consultant USING btree (idparty);


--
-- TOC entry 2735 (class 1259 OID 43642)
-- Name: fki_fk_consultingenterprise_consulting; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_consultingenterprise_consulting ON core.consultingenterprise USING btree (idpartyconsultant);


--
-- TOC entry 2736 (class 1259 OID 43648)
-- Name: fki_fk_consultingenterprise_enterprise; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_consultingenterprise_enterprise ON core.consultingenterprise USING btree (idpartyenterprise);


--
-- TOC entry 2711 (class 1259 OID 44150)
-- Name: fki_fk_document_documentstatus; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_document_documentstatus ON core.document USING btree (iddocumentstatus);


--
-- TOC entry 2712 (class 1259 OID 44144)
-- Name: fki_fk_document_documenttype; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_document_documenttype ON core.document USING btree (iddocumenttype);


--
-- TOC entry 2713 (class 1259 OID 44138)
-- Name: fki_fk_document_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_document_party ON core.document USING btree (idparty);


--
-- TOC entry 2708 (class 1259 OID 44162)
-- Name: fki_fk_email_emailtype; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_email_emailtype ON core.email USING btree (idemailtype);


--
-- TOC entry 2794 (class 1259 OID 60660)
-- Name: fki_fk_enterprisecomplements_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_enterprisecomplements_party ON core.enterprisecomplements USING btree (idparty);


--
-- TOC entry 2701 (class 1259 OID 44174)
-- Name: fki_fk_phone_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_phone_party ON core.phone USING btree (idparty);


--
-- TOC entry 2702 (class 1259 OID 44180)
-- Name: fki_fk_phone_phonetype; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_phone_phonetype ON core.phone USING btree (idphonetype);


--
-- TOC entry 2776 (class 1259 OID 43901)
-- Name: fki_fk_securityplancomplements_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplancomplements_party ON core.securityplancomplements USING btree (idparty);


--
-- TOC entry 2795 (class 1259 OID 68849)
-- Name: fki_fk_securityplanextras_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanextras_party ON core.securityplanextras USING btree (idparty);


--
-- TOC entry 2764 (class 1259 OID 43907)
-- Name: fki_fk_securityplanriskanalysysalarmsystems_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysysalarmsystems_party ON core.securityplanriskanalysysalarmsystem USING btree (idparty);


--
-- TOC entry 2770 (class 1259 OID 43913)
-- Name: fki_fk_securityplanriskanalysysantifire_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysysantifire_party ON core.securityplanriskanalysysantifire USING btree (idparty);


--
-- TOC entry 2739 (class 1259 OID 43919)
-- Name: fki_fk_securityplanriskanalysyscomplements_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysyscomplements_party ON core.securityplanriskanalysyscomplements USING btree (idparty);


--
-- TOC entry 2773 (class 1259 OID 43925)
-- Name: fki_fk_securityplanriskanalysysdirectives_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysysdirectives_party ON core.securityplanriskanalysysdirectives USING btree (idparty);


--
-- TOC entry 2755 (class 1259 OID 43931)
-- Name: fki_fk_securityplanriskanalysysdirectory_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysysdirectory_party ON core.securityplanriskanalysysdirectory USING btree (idparty);


--
-- TOC entry 2767 (class 1259 OID 43943)
-- Name: fki_fk_securityplanriskanalysysemerncyresources_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysysemerncyresources_party ON core.securityplanriskanalysysemerncyresources USING btree (idparty);


--
-- TOC entry 2761 (class 1259 OID 43949)
-- Name: fki_fk_securityplanriskanalysysmisc_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysysmisc_party ON core.securityplanriskanalysysmisc USING btree (idparty);


--
-- TOC entry 2742 (class 1259 OID 43711)
-- Name: fki_fk_securityplanriskanalysysnaturalsthreats_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysysnaturalsthreats_party ON core.securityplanriskanalysysnaturalsthreats USING btree (idparty);


--
-- TOC entry 2758 (class 1259 OID 43955)
-- Name: fki_fk_securityplanriskanalysysstrategiclocations_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysysstrategiclocations_party ON core.securityplanriskanalysysstrategiclocations USING btree (idparty);


--
-- TOC entry 2752 (class 1259 OID 43961)
-- Name: fki_fk_securityplanriskanalysyszone_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplanriskanalysyszone_party ON core.securityplanriskanalysyszone USING btree (idparty);


--
-- TOC entry 2745 (class 1259 OID 43730)
-- Name: fki_fk_securityplansubprogram_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplansubprogram_party ON core.securityplansubprogram USING btree (idparty);


--
-- TOC entry 2789 (class 1259 OID 45079)
-- Name: fki_fk_securityplansubprogrambrigadedirectory_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_securityplansubprogrambrigadedirectory_party ON core.securityplansubprogrambrigadedirectory USING btree (idparty);


--
-- TOC entry 2748 (class 1259 OID 43746)
-- Name: fki_fk_threatriskanalysys; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_threatriskanalysys ON core.threatriskanalysys USING btree (idparty);


--
-- TOC entry 2749 (class 1259 OID 43752)
-- Name: fki_fk_threatriskanalysys_threat; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_threatriskanalysys_threat ON core.threatriskanalysys USING btree (idthreat);


--
-- TOC entry 2726 (class 1259 OID 43532)
-- Name: fki_fk_threatsitelocation_party; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_threatsitelocation_party ON core.threatsitelocation USING btree (idparty);


--
-- TOC entry 2727 (class 1259 OID 43520)
-- Name: fki_fk_threatsitelocation_securityplansitelocation; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_threatsitelocation_securityplansitelocation ON core.threatsitelocation USING btree (idsitelocation);


--
-- TOC entry 2728 (class 1259 OID 43526)
-- Name: fki_fk_threatsitelocation_threats; Type: INDEX; Schema: core; Owner: -
--

CREATE INDEX fki_fk_threatsitelocation_threats ON core.threatsitelocation USING btree (idthreat);


--
-- TOC entry 2807 (class 2606 OID 27262)
-- Name: city fk_city_state; Type: FK CONSTRAINT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.city
    ADD CONSTRAINT fk_city_state FOREIGN KEY (idstate) REFERENCES base.state(id);


--
-- TOC entry 2799 (class 2606 OID 27217)
-- Name: entitysubclass fk_entitysubclass_entityclass; Type: FK CONSTRAINT; Schema: base; Owner: -
--

ALTER TABLE ONLY base.entitysubclass
    ADD CONSTRAINT fk_entitysubclass_entityclass FOREIGN KEY (identityclass) REFERENCES base.entityclass(id);


--
-- TOC entry 2809 (class 2606 OID 44097)
-- Name: address fk_address_addresstype; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.address
    ADD CONSTRAINT fk_address_addresstype FOREIGN KEY (idaddresstype) REFERENCES base.entitysubclass(id) NOT VALID;


--
-- TOC entry 2811 (class 2606 OID 45056)
-- Name: address fk_address_city; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.address
    ADD CONSTRAINT fk_address_city FOREIGN KEY (idcity) REFERENCES base.city(id) NOT VALID;


--
-- TOC entry 2808 (class 2606 OID 44091)
-- Name: address fk_address_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.address
    ADD CONSTRAINT fk_address_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2810 (class 2606 OID 44103)
-- Name: address fk_address_state; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.address
    ADD CONSTRAINT fk_address_state FOREIGN KEY (idstate) REFERENCES base.state(id) NOT VALID;


--
-- TOC entry 2798 (class 2606 OID 44115)
-- Name: consultant fk_consultant_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.consultant
    ADD CONSTRAINT fk_consultant_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2815 (class 2606 OID 44121)
-- Name: consultingenterprise fk_consultingenterprise_partyconsultant; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.consultingenterprise
    ADD CONSTRAINT fk_consultingenterprise_partyconsultant FOREIGN KEY (idpartyconsultant) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2814 (class 2606 OID 44126)
-- Name: consultingenterprise fk_consultingenterprise_partyenterprise; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.consultingenterprise
    ADD CONSTRAINT fk_consultingenterprise_partyenterprise FOREIGN KEY (idpartyenterprise) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2806 (class 2606 OID 44145)
-- Name: document fk_document_documentstatus; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.document
    ADD CONSTRAINT fk_document_documentstatus FOREIGN KEY (iddocumentstatus) REFERENCES base.entitysubclass(id) NOT VALID;


--
-- TOC entry 2805 (class 2606 OID 44139)
-- Name: document fk_document_documenttype; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.document
    ADD CONSTRAINT fk_document_documenttype FOREIGN KEY (iddocumenttype) REFERENCES base.entitysubclass(id) NOT VALID;


--
-- TOC entry 2804 (class 2606 OID 44133)
-- Name: document fk_document_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.document
    ADD CONSTRAINT fk_document_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2803 (class 2606 OID 44157)
-- Name: email fk_email_emailtype; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.email
    ADD CONSTRAINT fk_email_emailtype FOREIGN KEY (idemailtype) REFERENCES base.entitysubclass(id) NOT VALID;


--
-- TOC entry 2802 (class 2606 OID 44151)
-- Name: email fk_email_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.email
    ADD CONSTRAINT fk_email_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2830 (class 2606 OID 44196)
-- Name: enterprise fk_enterprise_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.enterprise
    ADD CONSTRAINT fk_enterprise_party FOREIGN KEY (idparty) REFERENCES core.party(id);


--
-- TOC entry 2847 (class 2606 OID 60655)
-- Name: enterprisecomplements fk_enterprisecomplements_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.enterprisecomplements
    ADD CONSTRAINT fk_enterprisecomplements_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2800 (class 2606 OID 44169)
-- Name: phone fk_phone_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.phone
    ADD CONSTRAINT fk_phone_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2801 (class 2606 OID 44175)
-- Name: phone fk_phone_phonetype; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.phone
    ADD CONSTRAINT fk_phone_phonetype FOREIGN KEY (idphonetype) REFERENCES base.entitysubclass(id) NOT VALID;


--
-- TOC entry 2832 (class 2606 OID 44865)
-- Name: pictures fk_pictures_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.pictures
    ADD CONSTRAINT fk_pictures_party FOREIGN KEY (idparty) REFERENCES core.party(id);


--
-- TOC entry 2829 (class 2606 OID 43896)
-- Name: securityplancomplements fk_securityplancomplements_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplancomplements
    ADD CONSTRAINT fk_securityplancomplements_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2848 (class 2606 OID 68844)
-- Name: securityplanextras fk_securityplanextras_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanextras
    ADD CONSTRAINT fk_securityplanextras_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2831 (class 2606 OID 44214)
-- Name: securityplansitelocation fk_securityplanlocation_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplansitelocation
    ADD CONSTRAINT fk_securityplanlocation_party FOREIGN KEY (idparty) REFERENCES core.party(id);


--
-- TOC entry 2833 (class 2606 OID 44963)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_bathroomfurniture; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_bathroomfurniture FOREIGN KEY (idbathroomfurniture) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2834 (class 2606 OID 44968)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_canceleria; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_canceleria FOREIGN KEY (idcanceleria) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2835 (class 2606 OID 44973)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_cimentation; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_cimentation FOREIGN KEY (idcimentation) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2836 (class 2606 OID 44978)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_doors; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_doors FOREIGN KEY (iddoors) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2837 (class 2606 OID 44983)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_electricalinstall; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_electricalinstall FOREIGN KEY (idelectricalinstall) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2838 (class 2606 OID 44988)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_enjarre; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_enjarre FOREIGN KEY (idenjarre) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2839 (class 2606 OID 44993)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_floor; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_floor FOREIGN KEY (idfloor) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2840 (class 2606 OID 44998)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_hidrosanitaryinstall; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_hidrosanitaryinstall FOREIGN KEY (idhidrosanitaryinstall) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2841 (class 2606 OID 45003)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_party FOREIGN KEY (idparty) REFERENCES core.party(id);


--
-- TOC entry 2842 (class 2606 OID 45008)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_roof; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_roof FOREIGN KEY (idroof) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2843 (class 2606 OID 45013)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_stairs; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_stairs FOREIGN KEY (idstairs) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2844 (class 2606 OID 45018)
-- Name: securityplanriskanalysis fk_securityplanriskanalysys_wall; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysis
    ADD CONSTRAINT fk_securityplanriskanalysys_wall FOREIGN KEY (idwall) REFERENCES base.entitysubclass(id);


--
-- TOC entry 2825 (class 2606 OID 43902)
-- Name: securityplanriskanalysysalarmsystem fk_securityplanriskanalysysalarmsystems_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysalarmsystem
    ADD CONSTRAINT fk_securityplanriskanalysysalarmsystems_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2827 (class 2606 OID 43908)
-- Name: securityplanriskanalysysantifire fk_securityplanriskanalysysantifire_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysantifire
    ADD CONSTRAINT fk_securityplanriskanalysysantifire_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2816 (class 2606 OID 43914)
-- Name: securityplanriskanalysyscomplements fk_securityplanriskanalysyscomplements_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysyscomplements
    ADD CONSTRAINT fk_securityplanriskanalysyscomplements_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2828 (class 2606 OID 43920)
-- Name: securityplanriskanalysysdirectives fk_securityplanriskanalysysdirectives_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysdirectives
    ADD CONSTRAINT fk_securityplanriskanalysysdirectives_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2822 (class 2606 OID 43926)
-- Name: securityplanriskanalysysdirectory fk_securityplanriskanalysysdirectory_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysdirectory
    ADD CONSTRAINT fk_securityplanriskanalysysdirectory_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2845 (class 2606 OID 45048)
-- Name: securityplanriskanalysysemergencydirectory fk_securityplanriskanalysysemergencydirectory_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysemergencydirectory
    ADD CONSTRAINT fk_securityplanriskanalysysemergencydirectory_party FOREIGN KEY (idparty) REFERENCES core.party(id);


--
-- TOC entry 2826 (class 2606 OID 43938)
-- Name: securityplanriskanalysysemerncyresources fk_securityplanriskanalysysemerncyresources_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysemerncyresources
    ADD CONSTRAINT fk_securityplanriskanalysysemerncyresources_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2824 (class 2606 OID 43944)
-- Name: securityplanriskanalysysmisc fk_securityplanriskanalysysmisc_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysmisc
    ADD CONSTRAINT fk_securityplanriskanalysysmisc_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2817 (class 2606 OID 43706)
-- Name: securityplanriskanalysysnaturalsthreats fk_securityplanriskanalysysnaturalsthreats_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysnaturalsthreats
    ADD CONSTRAINT fk_securityplanriskanalysysnaturalsthreats_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2823 (class 2606 OID 43950)
-- Name: securityplanriskanalysysstrategiclocations fk_securityplanriskanalysysstrategiclocations_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysysstrategiclocations
    ADD CONSTRAINT fk_securityplanriskanalysysstrategiclocations_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2821 (class 2606 OID 43956)
-- Name: securityplanriskanalysyszone fk_securityplanriskanalysyszone_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplanriskanalysyszone
    ADD CONSTRAINT fk_securityplanriskanalysyszone_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2818 (class 2606 OID 43725)
-- Name: securityplansubprogram fk_securityplansubprogram_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplansubprogram
    ADD CONSTRAINT fk_securityplansubprogram_party FOREIGN KEY (idparty) REFERENCES core.party(id);


--
-- TOC entry 2846 (class 2606 OID 45074)
-- Name: securityplansubprogrambrigadedirectory fk_securityplansubprogrambrigadedirectory_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.securityplansubprogrambrigadedirectory
    ADD CONSTRAINT fk_securityplansubprogrambrigadedirectory_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2820 (class 2606 OID 43741)
-- Name: threatriskanalysys fk_threatriskanalysys_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.threatriskanalysys
    ADD CONSTRAINT fk_threatriskanalysys_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2819 (class 2606 OID 43747)
-- Name: threatriskanalysys fk_threatriskanalysys_threat; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.threatriskanalysys
    ADD CONSTRAINT fk_threatriskanalysys_threat FOREIGN KEY (idthreat) REFERENCES core.threats(id) NOT VALID;


--
-- TOC entry 2813 (class 2606 OID 43527)
-- Name: threatsitelocation fk_threatsitelocation_party; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.threatsitelocation
    ADD CONSTRAINT fk_threatsitelocation_party FOREIGN KEY (idparty) REFERENCES core.party(id) NOT VALID;


--
-- TOC entry 2812 (class 2606 OID 43521)
-- Name: threatsitelocation fk_threatsitelocation_threats; Type: FK CONSTRAINT; Schema: core; Owner: -
--

ALTER TABLE ONLY core.threatsitelocation
    ADD CONSTRAINT fk_threatsitelocation_threats FOREIGN KEY (idthreat) REFERENCES core.threats(id) NOT VALID;


-- Completed on 2020-04-09 07:12:43 MDT

--
-- PostgreSQL database dump complete
--

