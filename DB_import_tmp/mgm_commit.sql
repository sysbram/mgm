--
-- PostgreSQL database dump
--

-- Dumped from database version 11.0
-- Dumped by pg_dump version 11.5

-- Started on 2019-10-02 15:02:06

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 219 (class 1255 OID 16705)
-- Name: gen_uuid(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.gen_uuid() RETURNS uuid
    LANGUAGE plpgsql
    AS $$
DECLARE
  uid uuid;
BEGIN
  SELECT md5(random()::text || clock_timestamp()::text)::uuid INTO uid;
  RETURN uid;
END;
$$;


ALTER FUNCTION public.gen_uuid() OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 216 (class 1259 OID 24850)
-- Name: access_admins; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.access_admins (
    id bigint NOT NULL,
    user_id integer,
    menu_id integer,
    read integer,
    edit integer,
    delete integer,
    "create" integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.access_admins OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 24848)
-- Name: access_admins_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.access_admins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.access_admins_id_seq OWNER TO postgres;

--
-- TOC entry 2939 (class 0 OID 0)
-- Dependencies: 215
-- Name: access_admins_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.access_admins_id_seq OWNED BY public.access_admins.id;


--
-- TOC entry 200 (class 1259 OID 16673)
-- Name: member; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.member (
    uid uuid NOT NULL,
    nik character varying(20) NOT NULL,
    password character varying(100) NOT NULL,
    nama character(255) NOT NULL,
    email character(255) NOT NULL,
    id_jenkel smallint NOT NULL,
    no_handphone character(14) NOT NULL,
    id_status smallint NOT NULL,
    gambar character varying(255),
    status_hapus character(255) NOT NULL,
    status_login character(255),
    last_login timestamp(0) without time zone,
    referral_code character varying(255) NOT NULL,
    referral_code_parent character varying(255)
);


ALTER TABLE public.member OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 24780)
-- Name: member_jenkel; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.member_jenkel (
    id bigint NOT NULL,
    id_jenkel character varying(10) NOT NULL
);


ALTER TABLE public.member_jenkel OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 24778)
-- Name: member_jenkel_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.member_jenkel_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.member_jenkel_id_seq OWNER TO postgres;

--
-- TOC entry 2940 (class 0 OID 0)
-- Dependencies: 207
-- Name: member_jenkel_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.member_jenkel_id_seq OWNED BY public.member_jenkel.id;


--
-- TOC entry 210 (class 1259 OID 24788)
-- Name: member_log_login; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.member_log_login (
    id bigint NOT NULL,
    uid_member uuid NOT NULL,
    waktu_login timestamp(0) without time zone NOT NULL,
    waktu_logout timestamp(0) without time zone NOT NULL,
    id_session smallint NOT NULL
);


ALTER TABLE public.member_log_login OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 24786)
-- Name: member_log_login_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.member_log_login_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.member_log_login_id_seq OWNER TO postgres;

--
-- TOC entry 2941 (class 0 OID 0)
-- Dependencies: 209
-- Name: member_log_login_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.member_log_login_id_seq OWNED BY public.member_log_login.id;


--
-- TOC entry 212 (class 1259 OID 24796)
-- Name: member_log_registrasi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.member_log_registrasi (
    id bigint NOT NULL,
    uid_member uuid NOT NULL,
    waktu timestamp(0) without time zone NOT NULL,
    id_session smallint NOT NULL
);


ALTER TABLE public.member_log_registrasi OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 24794)
-- Name: member_log_registrasi_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.member_log_registrasi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.member_log_registrasi_id_seq OWNER TO postgres;

--
-- TOC entry 2942 (class 0 OID 0)
-- Dependencies: 211
-- Name: member_log_registrasi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.member_log_registrasi_id_seq OWNED BY public.member_log_registrasi.id;


--
-- TOC entry 214 (class 1259 OID 24812)
-- Name: member_status; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.member_status (
    id bigint NOT NULL,
    member_status character varying(20)
);


ALTER TABLE public.member_status OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 24810)
-- Name: member_status_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.member_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.member_status_id_seq OWNER TO postgres;

--
-- TOC entry 2943 (class 0 OID 0)
-- Dependencies: 213
-- Name: member_status_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.member_status_id_seq OWNED BY public.member_status.id;


--
-- TOC entry 218 (class 1259 OID 32972)
-- Name: member_verify; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.member_verify (
    id bigint NOT NULL,
    member_uid character(255),
    transfer_receipt character varying(255),
    verify_info character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.member_verify OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 32970)
-- Name: member_verify_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.member_verify_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.member_verify_id_seq OWNER TO postgres;

--
-- TOC entry 2944 (class 0 OID 0)
-- Dependencies: 217
-- Name: member_verify_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.member_verify_id_seq OWNED BY public.member_verify.id;


--
-- TOC entry 206 (class 1259 OID 16709)
-- Name: menus; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.menus (
    id bigint NOT NULL,
    uid uuid DEFAULT public.gen_uuid() NOT NULL,
    menu_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.menus OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16707)
-- Name: menus_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.menus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.menus_id_seq OWNER TO postgres;

--
-- TOC entry 2945 (class 0 OID 0)
-- Dependencies: 205
-- Name: menus_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.menus_id_seq OWNED BY public.menus.id;


--
-- TOC entry 197 (class 1259 OID 16389)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16387)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 2946 (class 0 OID 0)
-- Dependencies: 196
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 203 (class 1259 OID 16689)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    uid uuid DEFAULT public.gen_uuid(),
    name character varying(255),
    occupation character varying(255),
    description character varying(255),
    email character varying(255) NOT NULL,
    email_verifed_at timestamp(0) without time zone,
    password character varying(255),
    no_hp character(14),
    foto character varying(255),
    status_login integer,
    last_login timestamp(0) without time zone,
    status_admin integer,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16695)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 2947 (class 0 OID 0)
-- Dependencies: 204
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 202 (class 1259 OID 16681)
-- Name: users_log_activity; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users_log_activity (
    id bigint NOT NULL,
    id_users bigint NOT NULL,
    uid_member uuid NOT NULL,
    waktu_proses timestamp(0) without time zone NOT NULL,
    route character(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users_log_activity OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16679)
-- Name: users_log_activity_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_log_activity_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_log_activity_id_seq OWNER TO postgres;

--
-- TOC entry 2948 (class 0 OID 0)
-- Dependencies: 201
-- Name: users_log_activity_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_log_activity_id_seq OWNED BY public.users_log_activity.id;


--
-- TOC entry 199 (class 1259 OID 16667)
-- Name: users_log_login; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users_log_login (
    id bigint NOT NULL,
    id_users integer NOT NULL,
    waktu_login timestamp(0) without time zone NOT NULL,
    waktu_logout timestamp(0) without time zone NOT NULL,
    waktusession smallint NOT NULL
);


ALTER TABLE public.users_log_login OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16665)
-- Name: users_log_login_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_log_login_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_log_login_id_seq OWNER TO postgres;

--
-- TOC entry 2949 (class 0 OID 0)
-- Dependencies: 198
-- Name: users_log_login_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_log_login_id_seq OWNED BY public.users_log_login.id;


--
-- TOC entry 2764 (class 2604 OID 24853)
-- Name: access_admins id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.access_admins ALTER COLUMN id SET DEFAULT nextval('public.access_admins_id_seq'::regclass);


--
-- TOC entry 2760 (class 2604 OID 24783)
-- Name: member_jenkel id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_jenkel ALTER COLUMN id SET DEFAULT nextval('public.member_jenkel_id_seq'::regclass);


--
-- TOC entry 2761 (class 2604 OID 24791)
-- Name: member_log_login id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_log_login ALTER COLUMN id SET DEFAULT nextval('public.member_log_login_id_seq'::regclass);


--
-- TOC entry 2762 (class 2604 OID 24799)
-- Name: member_log_registrasi id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_log_registrasi ALTER COLUMN id SET DEFAULT nextval('public.member_log_registrasi_id_seq'::regclass);


--
-- TOC entry 2763 (class 2604 OID 24815)
-- Name: member_status id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_status ALTER COLUMN id SET DEFAULT nextval('public.member_status_id_seq'::regclass);


--
-- TOC entry 2765 (class 2604 OID 32975)
-- Name: member_verify id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_verify ALTER COLUMN id SET DEFAULT nextval('public.member_verify_id_seq'::regclass);


--
-- TOC entry 2758 (class 2604 OID 16712)
-- Name: menus id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menus ALTER COLUMN id SET DEFAULT nextval('public.menus_id_seq'::regclass);


--
-- TOC entry 2753 (class 2604 OID 16697)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2756 (class 2604 OID 16698)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 2755 (class 2604 OID 16684)
-- Name: users_log_activity id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_log_activity ALTER COLUMN id SET DEFAULT nextval('public.users_log_activity_id_seq'::regclass);


--
-- TOC entry 2754 (class 2604 OID 16699)
-- Name: users_log_login id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_log_login ALTER COLUMN id SET DEFAULT nextval('public.users_log_login_id_seq'::regclass);


--
-- TOC entry 2931 (class 0 OID 24850)
-- Dependencies: 216
-- Data for Name: access_admins; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.access_admins (id, user_id, menu_id, read, edit, delete, "create", created_at, updated_at) VALUES (219, 18, 1, NULL, NULL, NULL, NULL, '2019-10-02 06:42:10', '2019-10-02 06:42:10');
INSERT INTO public.access_admins (id, user_id, menu_id, read, edit, delete, "create", created_at, updated_at) VALUES (220, 18, 2, NULL, NULL, NULL, NULL, '2019-10-02 06:42:10', '2019-10-02 06:42:10');
INSERT INTO public.access_admins (id, user_id, menu_id, read, edit, delete, "create", created_at, updated_at) VALUES (221, 18, 3, NULL, NULL, NULL, NULL, '2019-10-02 06:42:10', '2019-10-02 06:42:10');
INSERT INTO public.access_admins (id, user_id, menu_id, read, edit, delete, "create", created_at, updated_at) VALUES (222, 18, 4, NULL, NULL, NULL, NULL, '2019-10-02 06:42:10', '2019-10-02 06:42:10');


--
-- TOC entry 2915 (class 0 OID 16673)
-- Dependencies: 200
-- Data for Name: member; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('bed5f51e-e1a7-497d-8671-9ce5ac85c8bc', '1234567891011102', '$2y$10$Gsn8fJ8NbmtdUzNxFYdIf.p56BGPKUhJNtVMdN0//QJdONhE66Kn6', 'Brianne Berge                                                                                                                                                                                                                                                  ', 'buckridge.cara@kohler.net                                                                                                                                                                                                                                      ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_fbd2%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('ab4b0713-20cf-4020-9222-3f88bbc989bc', '1234567891011103', '$2y$10$S2cXXFKgwupVB5igdrxPOeXaTKJuCjxfNV7kTMp.22u4N1gbYdhC2', 'Alexis Schmidt                                                                                                                                                                                                                                                 ', 'rickie22@gmail.com                                                                                                                                                                                                                                             ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_44d2%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('31ac3466-512b-4f99-aa3b-ad338781f018', '1234567891011104', '$2y$10$Yo4mV7bRt5JC8Gtq9ESNfeSklOl8/ITl4UFv1gmcM5RfzNpORBPS2', 'Prof. Winnifred Hoeger                                                                                                                                                                                                                                         ', 'reyes02@runolfsson.com                                                                                                                                                                                                                                         ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_503a%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('33902be7-917f-43b9-8e13-8143313d6b84', '1234567891011105', '$2y$10$XLGCzlBrH9Nio.OUHlcD0O/CycvVGvT9nqdVmieHIblmyGLsrFh4C', 'Arnulfo Nitzsche                                                                                                                                                                                                                                               ', 'jones.wilfred@gmail.com                                                                                                                                                                                                                                        ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_823e%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('a727422d-5cde-4de2-89fb-6bb8921695c1', '1234567891011106', '$2y$10$c3CMOi1KKLMef9FTumtXlufg5D4fKWIMqseeQg8gndCamQpdppJPS', 'Alberta Gorczany MD                                                                                                                                                                                                                                            ', 'seichmann@hickle.com                                                                                                                                                                                                                                           ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_4edf%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('8b83be37-6252-4700-bf06-401688e69486', '1234567891011107', '$2y$10$rIxTo9T6SkMutikCAALjcOzDbYvIm46th/14Kpgywt0hZACi2phgm', 'Suzanne Price                                                                                                                                                                                                                                                  ', 'lionel23@gmail.com                                                                                                                                                                                                                                             ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_09db%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('2fa4cd32-5106-48cd-a358-f1da58463808', '1234567891011101', '$2y$10$lW0EUPOlMCzftzMJyJiZquMeGrGB5qGq/pPvRIEOyClvm/kDnLWH.', 'Mr. Reyes Gutkowski                                                                                                                                                                                                                                            ', 'richie08@hotmail.com                                                                                                                                                                                                                                           ', 2, '081212345678  ', 15, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_31cb%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('64385564-7052-4b53-8ee6-7d56467e8c5f', '1234567891011109', '$2y$10$mhdKxNv.vkPNxWfKvM.RbOIUOnERqXa2ylVPGBiORkUqz.NzYcE2e', 'Roman Barrows                                                                                                                                                                                                                                                  ', 'allison.west@gmail.com                                                                                                                                                                                                                                         ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_cda7%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('825a8567-5a06-4065-bd9d-6ef066094683', '1234567891011110', '$2y$10$dw629fncAHTGAYvpOFhNNulgU9YvK0SGCWyXSOsZuTHkLYOZ9JLBW', 'Prof. Donna Nolan I                                                                                                                                                                                                                                            ', 'xgibson@thompson.net                                                                                                                                                                                                                                           ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_e759%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('d932ff92-49ca-4207-87ae-fef6d6847d71', '1234567891011111', '$2y$10$2BcmAi8.JysCNZeqJk06euXLHF.56jslB0hr53Z5.tPTF7jTtWjpu', 'Sandrine Langosh                                                                                                                                                                                                                                               ', 'schaefer.tiara@gmail.com                                                                                                                                                                                                                                       ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_12ef%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('4ed19823-08e3-4b76-a57f-56dc56b5eee1', '1234567891011112', '$2y$10$Wx9j6DWTsYgFn2GGa.xH8.Qv5HvJPEVX.ze6eWgaHbTIFveeEzMRq', 'Teresa Okuneva                                                                                                                                                                                                                                                 ', 'hhartmann@hotmail.com                                                                                                                                                                                                                                          ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_23a2%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('6d589ebb-219b-4b2c-866a-eb0bb114bc1e', '1234567891011113', '$2y$10$1PtpLjNtJlhvw7EWDjC8nOQerzOc5nfxOMAFRMoSOYNR/nprV1VE2', 'Prof. Adrien Murazik PhD                                                                                                                                                                                                                                       ', 'duane.vonrueden@yahoo.com                                                                                                                                                                                                                                      ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_e92b%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('73d642c0-3e6a-415f-910f-56a44628171c', '1234567891011114', '$2y$10$lZaoQKpe5yhA/5n2naalm.0AOLVkkDIhDRC912ft6uOKRyoo7gAZG', 'Winston Homenick                                                                                                                                                                                                                                               ', 'jalen74@hotmail.com                                                                                                                                                                                                                                            ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_ee29%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('b2051580-b344-439d-a8ba-7172da43da65', '1234567891011115', '$2y$10$rxKZv65tpWc2MO.1ESxYoeYHDKTM6gpofnb6zUYdehWeTrbhR1miq', 'Lucie Rolfson I                                                                                                                                                                                                                                                ', 'jessika.christiansen@ward.com                                                                                                                                                                                                                                  ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_e778%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('f38ce948-d634-4722-a7ab-e9888c30f007', '1234567891011117', '$2y$10$0.pQHAKsvc1.lrDPIm1VI.4.kEAVG8ZBoj5rauzJTDE2RE8B/OWmO', 'Mr. Matteo Schinner I                                                                                                                                                                                                                                          ', 'lenora.block@yahoo.com                                                                                                                                                                                                                                         ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_255a%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('a155761d-2259-4c42-8a43-2d50349d21d2', '1234567891011118', '$2y$10$pcU.KsrejcsdANUZG3r/zuqq7KsjOe0dapupViGOTsPHt2vErhovO', 'Cole Dach Jr.                                                                                                                                                                                                                                                  ', 'gertrude.glover@russel.com                                                                                                                                                                                                                                     ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_bf28%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('662a99be-ed62-4dbe-b8ab-9f257f2aae59', '1234567891011119', '$2y$10$5MHu8B0VT6oG/vZKwOFhB.UPeL6wSNcvOw8UhgcyheWE7MJPKfQS2', 'Israel Sanford                                                                                                                                                                                                                                                 ', 'renner.evelyn@harvey.com                                                                                                                                                                                                                                       ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_1b9a%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('12d7167a-8cf6-45e5-b62d-36a0e7c0248b', '1234567891011120', '$2y$10$pqT998gEXgU9GV9xHbAWNO4U9cCX6F8AGjrcnCHaYrlZC91txQjey', 'Miss Gladyce Yost                                                                                                                                                                                                                                              ', 'john.toy@gmail.com                                                                                                                                                                                                                                             ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_9565%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('1e3709c1-2e2f-430f-8692-7ab78fcc97bb', '1234567891011121', '$2y$10$ZXEnz63elvzo7.78UpZqPeJMjCA8FIXus33JaDMkHQktusbRSB7va', 'Willa Goodwin                                                                                                                                                                                                                                                  ', 'lottie87@hotmail.com                                                                                                                                                                                                                                           ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_6299%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('169eaabc-9161-4e4c-978b-37b68807689c', '1234567891011122', '$2y$10$fItGGn0lvq806.Qxx.uvZeNQycE.34dcUGHvP8Ppa6wixMyYDN9W.', 'Sylvester Franecki                                                                                                                                                                                                                                             ', 'burnice.herzog@yahoo.com                                                                                                                                                                                                                                       ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_7a89%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('2efb72cb-15a6-4d2e-8bf6-5bb12fc7ada4', '1234567891011123', '$2y$10$JkZTfJdARB9m5wvCctSUa.PjOfNWuDwU5Do47JPdNN7hW..A/k4CK', 'Sven Metz                                                                                                                                                                                                                                                      ', 'schiller.ladarius@kassulke.com                                                                                                                                                                                                                                 ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_308e%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('97b6f7e3-51a7-417d-98aa-61a3285bc456', '1234567891011124', '$2y$10$ktb09r0BSy4jstlqepHblOcpa8od/xck5MCDtq7MF/dctkL3aU.tC', 'Dr. Franco O''Kon DVM                                                                                                                                                                                                                                           ', 'lincoln54@huels.com                                                                                                                                                                                                                                            ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_3965%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('d58eee39-bc53-4f51-9556-a9c628adeb08', '1234567891011125', '$2y$10$bMpaI6YmMcbbzMTtOWSY5.HhGv7teifRc2PhCMD3PP3zfaXlosNbO', 'Claire Carter                                                                                                                                                                                                                                                  ', 'dedrick.lindgren@ebert.com                                                                                                                                                                                                                                     ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_126f%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('2e6a3b9c-edd1-4aa8-8f0c-5be8e03b457b', '1234567891011126', '$2y$10$bK.JoA25.QZhEPbbB.LUVO.uKXpWKrxZp9HXDws34St9yBCe1Ns9G', 'Victoria Morar                                                                                                                                                                                                                                                 ', 'taylor00@morar.com                                                                                                                                                                                                                                             ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_aca2%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('f8bea94d-de48-40b5-8c47-452e170ded99', '1234567891011127', '$2y$10$S2Yrs0nFUl9NuXYmalrfGe4JVOkU9J0f36P3SvMyXeLyQXCQJ7UKa', 'Prof. Kody Conn V                                                                                                                                                                                                                                              ', 'roy55@larkin.info                                                                                                                                                                                                                                              ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_3ffd%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('e7657204-e5d6-4f43-b7a1-3554834a5711', '1234567891011128', '$2y$10$GieTB9WO2PBNmRCBDyDYAubb2UbHdY0PC98LsRdM23Ra3.ntDcwxW', 'Zion Schowalter II                                                                                                                                                                                                                                             ', 'flossie53@hotmail.com                                                                                                                                                                                                                                          ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_8350%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('ca26b0be-c62c-4949-8723-899b92ef33d0', '1234567891011129', '$2y$10$juWdHlRnn9xMPuL0UUWTquwyOUapPSrJJDI4O6FRBdPSEr9p0hJjy', 'Anissa Little                                                                                                                                                                                                                                                  ', 'ocormier@aufderhar.com                                                                                                                                                                                                                                         ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_36ec%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('d932db5f-09ab-46de-89f6-7aba98d594e3', '1234567891011130', '$2y$10$mLD0eFSSRVaFSyas4cn3YuabyiSRxbX2CFDsqMWMSKoStN6ZXet66', 'Dr. Irwin Jones                                                                                                                                                                                                                                                ', 'swaniawski.jordane@yahoo.com                                                                                                                                                                                                                                   ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_6bc7%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('fa2ba2c7-5b20-45fe-9eed-73841aa76227', '1234567891011131', '$2y$10$C9bMiFSTSONX7Uf3h4lRKevqgKt2rXl9KC6LvZ3EzSe/UNMSnj9E.', 'Helmer Hermiston                                                                                                                                                                                                                                               ', 'ypaucek@yahoo.com                                                                                                                                                                                                                                              ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_c2bf%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('0a33c759-5352-4ac4-8289-88953ba801d4', '1234567891011132', '$2y$10$moKl43c0q67daCBanOHRPOU01Av97v0uwgSGBC3siYCAblQmH1r5u', 'Dr. Ron Gerhold                                                                                                                                                                                                                                                ', 'rempel.jakayla@schowalter.com                                                                                                                                                                                                                                  ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_6373%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('b8d7c9b2-b9f9-41e8-b9cb-23cbcc1a91fb', '1234567891011133', '$2y$10$kCgK.vmMdtQuKPAGFoFCkumwEln5y.s2jvUAB.KWCCcKoSaT0mlCS', 'Ms. Patricia Considine IV                                                                                                                                                                                                                                      ', 'cruz49@yahoo.com                                                                                                                                                                                                                                               ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_fac0%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('bdbfc90b-18a3-43f9-bcd2-18cb21c371cc', '1234567891011134', '$2y$10$yhNEHA9BSpl4ESaiIlmzFu7MBA6Zr1L1L8NiYMFdYa9rMTYieyPBi', 'Lucienne Muller                                                                                                                                                                                                                                                ', 'vlittle@hotmail.com                                                                                                                                                                                                                                            ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_7113%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('48b8c1eb-997c-4dfb-922c-5f72518ed516', '1234567891011135', '$2y$10$1ODvmxHl8TjHVcRw91InpONOXpqIvOBfTYjx.d1mSRnDHuQSAVZ1K', 'Bartholome Botsford I                                                                                                                                                                                                                                          ', 'verlie68@reilly.com                                                                                                                                                                                                                                            ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_b7ba%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('2736d5a8-9371-4109-bf7b-35c7b7b75eba', '1234567891011136', '$2y$10$YpGWYAv8r4RNhlKXZWz4nOjfblTYEr1eK2NYCdRaHcQ4o9ZDwgq4y', 'Iva Haag                                                                                                                                                                                                                                                       ', 'louie.mckenzie@koepp.com                                                                                                                                                                                                                                       ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_9df3%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('e8aa912a-f893-4fdd-b357-14a7aa82b72d', '1234567891011137', '$2y$10$xj/tV/Ce7mvx50g3umk0HO7otTNKkUWgZg1MHMdKPGD89MCPtXgQm', 'Urban Paucek                                                                                                                                                                                                                                                   ', 'vkeebler@yahoo.com                                                                                                                                                                                                                                             ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_a5a0%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('2d4142e0-40d7-4a8e-a479-c31480468adc', '1234567891011138', '$2y$10$8U9nwxN4SfBf0AmqG5Yl2OGmIMWRnBNWZvZtQc4GFH6CxORMjZedC', 'Mr. Jamie Monahan PhD                                                                                                                                                                                                                                          ', 'keeling.nina@yahoo.com                                                                                                                                                                                                                                         ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_2746%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('13a57a24-c89c-4350-abc1-9025aac44118', '1234567891011139', '$2y$10$1o.mns.eQV6YyxK8ftIwCO5UcHTUKOPhLEk9KB2QX01npKAKUr3VO', 'Jordi Casper                                                                                                                                                                                                                                                   ', 'bspencer@heaney.org                                                                                                                                                                                                                                            ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_c471%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('0973c7f7-218d-4734-af2c-f42e3ab3fb80', '1234567891011140', '$2y$10$pt2SF8iGpFvZiGU8fr73rOg2ZGj8jQgSZM6RTUMo5ZZGFXY6Z59tC', 'Ashly Dare PhD                                                                                                                                                                                                                                                 ', 'cormier.douglas@corkery.org                                                                                                                                                                                                                                    ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_8880%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('ec265657-8a34-46ed-ab4c-0e6d41ead6f6', '1234567891011141', '$2y$10$xnbgd7DiaYbmC17w73KP/.me00xDN/ocmuanyUFD0BbFa/U/uu78i', 'Hubert Wolf III                                                                                                                                                                                                                                                ', 'graciela.ankunding@effertz.com                                                                                                                                                                                                                                 ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_d7da%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('147c4cc2-c1b4-48e3-8726-143ec091e471', '1234567891011142', '$2y$10$9t00nQ38VCVULrnvsGBlquBqgfCuDWchhVhg1taU0pLR934ZgQXly', 'Marianne Paucek                                                                                                                                                                                                                                                ', 'aisha02@gmail.com                                                                                                                                                                                                                                              ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_3ec7%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('6347b161-e3fb-4338-a1d4-b6e8c4b50ea6', '1234567891011143', '$2y$10$M8yXKpntCTqcs0Mys7DAA.p3flzG.Fg7NbbpvPd8vF6HH42IgFmyG', 'Mrs. Carlie Lynch II                                                                                                                                                                                                                                           ', 'buckridge.hope@hotmail.com                                                                                                                                                                                                                                     ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_147d%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('56425375-4d32-4e1e-bb15-bc63d4767b8d', '1234567891011144', '$2y$10$8zbsJjRxadZEAxlS9addHeBTiC49fc5seL9Hcgj.NCVop0GCkz2Nq', 'Lia DuBuque                                                                                                                                                                                                                                                    ', 'june90@gislason.info                                                                                                                                                                                                                                           ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_1d5a%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('7f53009b-04ac-44cd-80fd-664e19daf5d3', '1234567891011145', '$2y$10$ykcjBcZihzCEugIpEk/yDeNBwzUb63YefVsRE7r9bDk0Ke2p4KWzC', 'Brook Towne                                                                                                                                                                                                                                                    ', 'pacocha.troy@gmail.com                                                                                                                                                                                                                                         ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_9244%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('3f5c26ee-fdb7-4f94-8b27-bb28c9d26272', '1234567891011146', '$2y$10$dz.wwidRZqemepUhmb.OE.lAeNSI7wmxjZJ7hDqRDn6Gds6idUs3q', 'Foster Swaniawski                                                                                                                                                                                                                                              ', 'akuhic@cremin.info                                                                                                                                                                                                                                             ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_1b34%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('8123fe23-d5f6-4a3e-8327-f9380931c320', '1234567891011147', '$2y$10$JHz3tkqPkwf9kuktHjq6seRHyApFk4GsN6DdM2m8mn0BmXCgtH9nK', 'Mr. Pierre Rutherford                                                                                                                                                                                                                                          ', 'brandyn44@stokes.com                                                                                                                                                                                                                                           ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_5d7f%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('a2a066c0-5eb0-41ff-8d8b-cfe05fb06a95', '1234567891011148', '$2y$10$QmvZCJkkqq2os8ft.eu3X.RtV1YM/MQ/HJSm8xAdG9hW3zlfZpgCK', 'Tanya Hansen Sr.                                                                                                                                                                                                                                               ', 'laurence20@yahoo.com                                                                                                                                                                                                                                           ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_0b4c%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('5cd708dd-2a18-4838-ad84-37cd0a1794b4', '1234567891011149', '$2y$10$SKwUkCJvZlTvVWWqwrP.Xu8vw7FabwhLhWAdpiJTbSlfnjw/.Qjnq', 'Laverna Marvin                                                                                                                                                                                                                                                 ', 'hkertzmann@yahoo.com                                                                                                                                                                                                                                           ', 2, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_8aa9%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('d5133651-73f3-44f3-93b8-536721432539', '1234567891011150', '$2y$10$Fdcq5uxfX73PR3qGlP4OtOxR5NJlNkrxGpzWkmn.BDVvuXhDukjzS', 'Watson Lakin II                                                                                                                                                                                                                                                ', 'mfeeney@hotmail.com                                                                                                                                                                                                                                            ', 1, '081212345678  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_b4b5%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('29ff6f67-356a-406f-8a94-02dc5eb614a2', '1234567891011116', '$2y$10$TFzoT8ohKr5/1PXlu9P4u./yHcQhHa9pchBu7TNSIs0de8awwFFU2', 'Unique Batz                                                                                                                                                                                                                                                    ', 'daryl14@klocko.biz                                                                                                                                                                                                                                             ', 1, '081212345678  ', 20, NULL, '1                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_35dc%04x', NULL);
INSERT INTO public.member (uid, nik, password, nama, email, id_jenkel, no_handphone, id_status, gambar, status_hapus, status_login, last_login, referral_code, referral_code_parent) VALUES ('06f105ac-81aa-48a9-9433-54f87b778d20', '1234567891011108', '$2y$10$CsiGPsPuF7soqhudBCB7DOvQHhjpjKbF.4JhvEke6.si.FmweS3Zy', 'Archibald Kiehn III                                                                                                                                                                                                                                            ', 'gina.jones@gmail.com                                                                                                                                                                                                                                           ', 1, '081234567823  ', 20, NULL, 'N                                                                                                                                                                                                                                                              ', NULL, NULL, 'nama_d528%04x', NULL);


--
-- TOC entry 2923 (class 0 OID 24780)
-- Dependencies: 208
-- Data for Name: member_jenkel; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2925 (class 0 OID 24788)
-- Dependencies: 210
-- Data for Name: member_log_login; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2927 (class 0 OID 24796)
-- Dependencies: 212
-- Data for Name: member_log_registrasi; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2929 (class 0 OID 24812)
-- Dependencies: 214
-- Data for Name: member_status; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2933 (class 0 OID 32972)
-- Dependencies: 218
-- Data for Name: member_verify; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.member_verify (id, member_uid, transfer_receipt, verify_info, created_at, updated_at) VALUES (1, '2fa4cd32-5106-48cd-a358-f1da58463808                                                                                                                                                                                                                           ', 'a', 'Type here..', NULL, '2019-10-02 03:54:15');


--
-- TOC entry 2921 (class 0 OID 16709)
-- Dependencies: 206
-- Data for Name: menus; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.menus (id, uid, menu_name, created_at, updated_at) VALUES (1, '264f9d4d-96ee-34fb-9316-b2fa649821b0', 'Dashboard', '2019-09-27 06:48:41', '2019-09-27 06:48:41');
INSERT INTO public.menus (id, uid, menu_name, created_at, updated_at) VALUES (2, 'a4e26693-dd16-4274-07ee-61f5dfff6dba', 'Back Office', '2019-09-27 06:55:22', '2019-09-27 06:55:22');
INSERT INTO public.menus (id, uid, menu_name, created_at, updated_at) VALUES (3, '2f0befe7-43a2-ff88-cd92-0d455485693c', 'Member', '2019-09-27 06:55:52', '2019-09-27 06:55:52');
INSERT INTO public.menus (id, uid, menu_name, created_at, updated_at) VALUES (4, 'a1e0ddb1-6e43-39c9-f1af-c83802d8c5f3', 'Log Back Office', '2019-09-30 09:00:04', '2019-09-30 09:00:04');


--
-- TOC entry 2912 (class 0 OID 16389)
-- Dependencies: 197
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.migrations (id, migration, batch) VALUES (29, '2019_09_19_072017_create_users', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (30, '2019_09_23_040246_create_users_log_login', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (31, '2019_09_24_032427_create_member', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (32, '2019_09_25_051215_create_users_log_activity', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (19, '2019_09_19_072017_create_users', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (20, '2019_09_23_040246_create_users_log_login', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (21, '2019_09_24_032427_create_member', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (22, '2019_09_27_043110_create_menu_table', 2);
INSERT INTO public.migrations (id, migration, batch) VALUES (23, '2019_09_27_065150_create_access_admins_table', 3);
INSERT INTO public.migrations (id, migration, batch) VALUES (24, '2019_09_27_072444_add_test_to_member', 4);
INSERT INTO public.migrations (id, migration, batch) VALUES (25, '2019_09_27_072603_add_read_to_users', 5);
INSERT INTO public.migrations (id, migration, batch) VALUES (26, '2019_09_27_042404_create_member_jenkel', 6);
INSERT INTO public.migrations (id, migration, batch) VALUES (27, '2019_09_27_042530_create_member_log_login', 6);
INSERT INTO public.migrations (id, migration, batch) VALUES (28, '2019_09_27_042908_create_member_log_registrasi', 6);
INSERT INTO public.migrations (id, migration, batch) VALUES (33, '2019_09_28_033151_create_access_admins_table', 7);
INSERT INTO public.migrations (id, migration, batch) VALUES (34, '2019_09_28_033308_create_access_admins_table', 8);
INSERT INTO public.migrations (id, migration, batch) VALUES (35, '2019_09_28_033408_create_access_admins_table', 9);
INSERT INTO public.migrations (id, migration, batch) VALUES (36, '2019_09_28_041202_create_access_admins_table', 10);
INSERT INTO public.migrations (id, migration, batch) VALUES (37, '2019_10_02_030459_create_member_verify_table', 11);


--
-- TOC entry 2918 (class 0 OID 16689)
-- Dependencies: 203
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users (id, uid, name, occupation, description, email, email_verifed_at, password, no_hp, foto, status_login, last_login, status_admin, remember_token, created_at, updated_at) VALUES (1, NULL, 'Admin', '1', 'Hi There, I''am super admin. Contact me if you want to be eligible in all offers', 'admin@mgm.id', NULL, '$2y$10$ZzIAKnT7ly7MkOTHR47cleRApPJVUOEkP/rvVulO5zI/eVQroMSK2', NULL, 'IMG-20190804-WA0028.jpg', 1, '2019-10-02 14:44:51', 1, NULL, '2019-09-25 08:31:40', '2019-10-02 07:46:41');


--
-- TOC entry 2917 (class 0 OID 16681)
-- Dependencies: 202
-- Data for Name: users_log_activity; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users_log_activity (id, id_users, uid_member, waktu_proses, route, created_at, updated_at) VALUES (3, 14, '06f105ac-81aa-48a9-9433-54f87b778d20', '2019-10-01 10:00:52', 'Update                                                                                                                                                                                                                                                         ', NULL, NULL);


--
-- TOC entry 2914 (class 0 OID 16667)
-- Dependencies: 199
-- Data for Name: users_log_login; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2950 (class 0 OID 0)
-- Dependencies: 215
-- Name: access_admins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.access_admins_id_seq', 238, true);


--
-- TOC entry 2951 (class 0 OID 0)
-- Dependencies: 207
-- Name: member_jenkel_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.member_jenkel_id_seq', 1, false);


--
-- TOC entry 2952 (class 0 OID 0)
-- Dependencies: 209
-- Name: member_log_login_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.member_log_login_id_seq', 1, false);


--
-- TOC entry 2953 (class 0 OID 0)
-- Dependencies: 211
-- Name: member_log_registrasi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.member_log_registrasi_id_seq', 1, false);


--
-- TOC entry 2954 (class 0 OID 0)
-- Dependencies: 213
-- Name: member_status_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.member_status_id_seq', 1, false);


--
-- TOC entry 2955 (class 0 OID 0)
-- Dependencies: 217
-- Name: member_verify_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.member_verify_id_seq', 1, false);


--
-- TOC entry 2956 (class 0 OID 0)
-- Dependencies: 205
-- Name: menus_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.menus_id_seq', 8, true);


--
-- TOC entry 2957 (class 0 OID 0)
-- Dependencies: 196
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 37, true);


--
-- TOC entry 2958 (class 0 OID 0)
-- Dependencies: 204
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 22, true);


--
-- TOC entry 2959 (class 0 OID 0)
-- Dependencies: 201
-- Name: users_log_activity_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_log_activity_id_seq', 3, true);


--
-- TOC entry 2960 (class 0 OID 0)
-- Dependencies: 198
-- Name: users_log_login_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_log_login_id_seq', 1, false);


--
-- TOC entry 2787 (class 2606 OID 24855)
-- Name: access_admins access_admins_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.access_admins
    ADD CONSTRAINT access_admins_pkey PRIMARY KEY (id);


--
-- TOC entry 2779 (class 2606 OID 24785)
-- Name: member_jenkel member_jenkel_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_jenkel
    ADD CONSTRAINT member_jenkel_pkey PRIMARY KEY (id);


--
-- TOC entry 2781 (class 2606 OID 24793)
-- Name: member_log_login member_log_login_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_log_login
    ADD CONSTRAINT member_log_login_pkey PRIMARY KEY (id);


--
-- TOC entry 2783 (class 2606 OID 24801)
-- Name: member_log_registrasi member_log_registrasi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_log_registrasi
    ADD CONSTRAINT member_log_registrasi_pkey PRIMARY KEY (id);


--
-- TOC entry 2785 (class 2606 OID 24817)
-- Name: member_status member_status_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_status
    ADD CONSTRAINT member_status_pkey PRIMARY KEY (id);


--
-- TOC entry 2789 (class 2606 OID 32980)
-- Name: member_verify member_verify_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member_verify
    ADD CONSTRAINT member_verify_pkey PRIMARY KEY (id);


--
-- TOC entry 2777 (class 2606 OID 16714)
-- Name: menus menus_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menus
    ADD CONSTRAINT menus_pkey PRIMARY KEY (id);


--
-- TOC entry 2767 (class 2606 OID 16394)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2773 (class 2606 OID 16701)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2771 (class 2606 OID 16686)
-- Name: users_log_activity users_log_activity_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_log_activity
    ADD CONSTRAINT users_log_activity_pkey PRIMARY KEY (id);


--
-- TOC entry 2769 (class 2606 OID 16672)
-- Name: users_log_login users_log_login_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_log_login
    ADD CONSTRAINT users_log_login_pkey PRIMARY KEY (id);


--
-- TOC entry 2775 (class 2606 OID 16703)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


-- Completed on 2019-10-02 15:02:15

--
-- PostgreSQL database dump complete
--

