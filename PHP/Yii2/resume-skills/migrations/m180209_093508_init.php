<?php

use yii\db\Migration;

/**
 * Class m180209_093508_init
 */
class m180209_093508_init extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("
--
-- PostgreSQL database dump
--

-- Dumped from database version 10.1
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: resume; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE resume (
    id integer NOT NULL,
    name character varying(255),
    description text,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


ALTER TABLE resume OWNER TO postgres;

--
-- Name: resume_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE resume_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE resume_id_seq OWNER TO postgres;

--
-- Name: resume_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE resume_id_seq OWNED BY resume.id;


--
-- Name: resume_skill; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE resume_skill (
    resume_id integer NOT NULL,
    skill_id integer NOT NULL
);


ALTER TABLE resume_skill OWNER TO postgres;

--
-- Name: skill; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE skill (
    id integer NOT NULL,
    name character varying(255),
    frequency integer
);


ALTER TABLE skill OWNER TO postgres;

--
-- Name: skill_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE skill_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE skill_id_seq OWNER TO postgres;

--
-- Name: skill_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE skill_id_seq OWNED BY skill.id;


--
-- Name: resume id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resume ALTER COLUMN id SET DEFAULT nextval('resume_id_seq'::regclass);


--
-- Name: skill id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY skill ALTER COLUMN id SET DEFAULT nextval('skill_id_seq'::regclass);


--
-- Data for Name: resume; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY resume (id, name, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: resume_skill; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY resume_skill (resume_id, skill_id) FROM stdin;
\.


--
-- Data for Name: skill; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY skill (id, name, frequency) FROM stdin;
\.


--
-- Name: resume_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('resume_id_seq', 1, false);


--
-- Name: skill_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('skill_id_seq', 1, false);


--
-- Name: resume resume_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resume
    ADD CONSTRAINT resume_pkey PRIMARY KEY (id);


--
-- Name: resume_skill resume_skill_resume_id_skill_id_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resume_skill
    ADD CONSTRAINT resume_skill_resume_id_skill_id_pk PRIMARY KEY (resume_id, skill_id);


--
-- Name: skill skill_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY skill
    ADD CONSTRAINT skill_pkey PRIMARY KEY (id);


--
-- Name: resume_skill resume_skill_resume_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resume_skill
    ADD CONSTRAINT resume_skill_resume_id_fkey FOREIGN KEY (resume_id) REFERENCES resume(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: resume_skill resume_skill_skill_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY resume_skill
    ADD CONSTRAINT resume_skill_skill_id_fkey FOREIGN KEY (skill_id) REFERENCES skill(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180209_093508_init cannot be reverted.\n";

        return false;
    }
}
