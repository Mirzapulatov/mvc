--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.11
-- Dumped by pg_dump version 9.3.11
-- Started on 2016-04-15 10:02:02 MSK

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1 (class 3079 OID 11791)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2024 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 177 (class 1259 OID 24665)
-- Name: bcomments; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE bcomments (
    id integer NOT NULL,
    name text,
    message text,
    id_blog integer,
    "time" integer
);


ALTER TABLE public.bcomments OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 24663)
-- Name: bcomments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bcomments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bcomments_id_seq OWNER TO postgres;

--
-- TOC entry 2025 (class 0 OID 0)
-- Dependencies: 176
-- Name: bcomments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bcomments_id_seq OWNED BY bcomments.id;


--
-- TOC entry 172 (class 1259 OID 16387)
-- Name: news; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE news (
    id integer NOT NULL,
    title text NOT NULL,
    text text NOT NULL,
    "time" integer NOT NULL,
    views integer DEFAULT 0,
    name text,
    message text,
    id_blog integer
);


ALTER TABLE public.news OWNER TO postgres;

--
-- TOC entry 171 (class 1259 OID 16385)
-- Name: news_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE news_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.news_id_seq OWNER TO postgres;

--
-- TOC entry 2026 (class 0 OID 0)
-- Dependencies: 171
-- Name: news_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE news_id_seq OWNED BY news.id;


--
-- TOC entry 175 (class 1259 OID 24603)
-- Name: blog; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE blog (
    id integer DEFAULT nextval('news_id_seq'::regclass) NOT NULL,
    title text NOT NULL,
    text text NOT NULL,
    "time" integer NOT NULL,
    views integer DEFAULT 0,
    author character(200)
);


ALTER TABLE public.blog OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 24578)
-- Name: contacts; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE contacts (
    id integer NOT NULL,
    name character(255) NOT NULL,
    email character(255) NOT NULL,
    message text NOT NULL,
    "time" integer,
    status boolean
);


ALTER TABLE public.contacts OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 24576)
-- Name: mails_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mails_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mails_id_seq OWNER TO postgres;

--
-- TOC entry 2027 (class 0 OID 0)
-- Dependencies: 173
-- Name: mails_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE mails_id_seq OWNED BY contacts.id;


--
-- TOC entry 179 (class 1259 OID 24676)
-- Name: portfolio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE portfolio (
    id integer NOT NULL,
    name text,
    opis text,
    img character(255)
);


ALTER TABLE public.portfolio OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 24674)
-- Name: portfolio_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE portfolio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.portfolio_id_seq OWNER TO postgres;

--
-- TOC entry 2028 (class 0 OID 0)
-- Dependencies: 178
-- Name: portfolio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE portfolio_id_seq OWNED BY portfolio.id;


--
-- TOC entry 1895 (class 2604 OID 24668)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bcomments ALTER COLUMN id SET DEFAULT nextval('bcomments_id_seq'::regclass);


--
-- TOC entry 1892 (class 2604 OID 24581)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contacts ALTER COLUMN id SET DEFAULT nextval('mails_id_seq'::regclass);


--
-- TOC entry 1890 (class 2604 OID 16390)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY news ALTER COLUMN id SET DEFAULT nextval('news_id_seq'::regclass);


--
-- TOC entry 1896 (class 2604 OID 24679)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY portfolio ALTER COLUMN id SET DEFAULT nextval('portfolio_id_seq'::regclass);


--
-- TOC entry 2014 (class 0 OID 24665)
-- Dependencies: 177
-- Data for Name: bcomments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY bcomments (id, name, message, id_blog, "time") FROM stdin;
1	rrrrrrrrrr 	rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr rrrrrrrrrr 	373	1460531999
2	ssssss	ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss 	373	1460532188
3	ssssss	ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss ssssss 	373	1460532356
4	gggggggg	ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggggggggggg 	372	1460546562
7	rrffffffffffffffff	Donetsk Travel PlacesDonetsk Travel PlacesDonetsk Travel PlacesDonetsk Travel PlacesDonetsk Travel PlacesDonetsk Travel PlacesDonetsk Travel PlacesDonetsk Travel PlacesDonetsk Travel PlacesDonetsk Travel PlacesDonetsk Travel Places	372	1460638040
8	ffffffffffffffff	ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff ffffffffffffff 	372	1460641110
\.


--
-- TOC entry 2029 (class 0 OID 0)
-- Dependencies: 176
-- Name: bcomments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bcomments_id_seq', 8, true);


--
-- TOC entry 2012 (class 0 OID 24603)
-- Dependencies: 175
-- Data for Name: blog; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY blog (id, title, text, "time", views, author) FROM stdin;
372	2#test test test test e	5test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test	1460635984	3	d3rrrrr                                                                                                                                                                                                 
371	##test test test test e	5test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test 	1460377550	2	3rrrrr                                                                                                                                                                                                  
370	##test test test test e	5test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test 	1460377550	135	3rrrrr                                                                                                                                                                                                  
368	##test test test test e	5test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test 	1460377550	1	3rrrrr                                                                                                                                                                                                  
369	##test test test test e	5test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test 	1460377550	12	3rrrrr                                                                                                                                                                                                  
\.


--
-- TOC entry 2011 (class 0 OID 24578)
-- Dependencies: 174
-- Data for Name: contacts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY contacts (id, name, email, message, "time", status) FROM stdin;
1	rgame                                                                                                                                                                                                                                                          	mirzapulatov@gmail.com                                                                                                                                                                                                                                         	TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST 	\N	\N
53	2RGame                                                                                                                                                                                                                                                         	mirzapulatov@gmail.com                                                                                                                                                                                                                                         	TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST	1460535299	\N
55	fffffffffff                                                                                                                                                                                                                                                    	mirzapulatov@gmail.comN                                                                                                                                                                                                                                        	ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff ffffffffffff 	1460642318	\N
\.


--
-- TOC entry 2030 (class 0 OID 0)
-- Dependencies: 173
-- Name: mails_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mails_id_seq', 55, true);


--
-- TOC entry 2009 (class 0 OID 16387)
-- Dependencies: 172
-- Data for Name: news; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY news (id, title, text, "time", views, name, message, id_blog) FROM stdin;
365	AMD начала поставки мобильных гибридных процессоров A-серии 7-го поколения	Компания AMD сделала предварительный анонс мобильных гибридных процессоров A-серии седьмого поколения, лучше известных под кодовым названием Bristol Ridge.\n\nСами процессоры, а также системы на их основе, будут представлены на выставке Computex 2016, которая пройдёт с 31 мая по 4 июня в Тайбэе. Отметим, что запуск процессоров состоялся раньше намеченного срока, пишут Новости ИТ\n\nЛинейка гибридных процессоров Bristol Ridge использует процессорные ядра Excavator с x86-архитектурой, которые “оптимизированы для мобильных систем”. Уже сейчас производители могут заказать новые процессоры с двумя или четырьмя вычислительными ядрами, и встроенной графикой Radeon R7 или R5. Главным отличием новинок от прошлогодних процессоров Carrizo является наличие контроллера оперативной памяти DDR4.\n\nКак утверждает AMD, производительность процессоров Bristol Ridge увеличилась примерно на 50%, по сравнению с чипами Kaveri, и примерно на 10% по сравнению с Carrizo. Также AMD отмечает, что новые процессоры отличаются повышенной энергоэффективностью и ноутбуки на их основе смогут автономно работать в течение всего дня. Наконец, сообщается что новинки легко справятся с воспроизведением видео в разрешении до Ultra HD 4K, а поддержка технологии AMD FreeSync обеспечит плавное отображение.\n\nПервым ноутбуком с гибридным процессором AMD А-серии 7-го поколения станет HP ENVY x360. Помимо этого, в текущем году многие ведущие производители представят различные системы на процессорах Bristol Ridge – от обычных и гибридных ноутбуков до моноблоков.\n	1459953346	5	\N	\N	\N
367	Убыточная BlackBerry решит судьбу телефонного бизнеса в сентябре	Производитель смартфонов и корпоративного ПО BlackBerry завершил отчётный год с убытками и падением выручки.\r\n\r\nНа фоне финансовых проблем канадская компания задумалась об уходе с телефонного рынка, решение по данному вопросу будет принято в сентябре, пишут Новости ИТ\r\n\r\nПо итогам финансового года, завершившегося 29 февраля, BlackBerry получила $208 млн убытка, что в 1,5 раза меньше показателя годичной давности. Продажи уменьшились на 35 % до $2,16 млрд.\r\n\r\nВ четвёртом квартале прошлого финансового года имели место убытки в размере $238 млн, тогда как годом ранее BlackBerry зафиксировала прибыль в $28 млн. Выручка упала с $660 млн до $464 млн и оказалась на $100 млн меньше, чем ожидали опрошенные Thomson Reuters I/B/E/S аналитики. При этом на Уолл-стрит прогнозировали более крупный скорректированный убыток по сравнению с полученным компанией в действительности — 10 против 3 центов на акцию.\r\nВ декабре–феврале BlackBerry продала 600 тыс. смартфонов против 700 тыс. штук тремя месяцами ранее. Средняя стоимость проданного гаджета осталась на уровне $315. По словам генерального директора BlackBerry Джона Чена (John Chen), для того, чтобы телефонное подразделение компании работало без убытков, ему нужно ежегодно продавать 3 млн смартфонов стоимостью около $300. Прежде он говорил о 5 млн трубках, отмечает агентство Reuters.\r\n\r\nСлабые продажи телефонов не раз порождали слухи об уходе BlackBerry с этого рынка. Джон Чен дал понять, что прекращение выпуска гаджетов не за горами.\r\n\r\n«Для меня главное — оставить компанию в телефонном бизнесе после сентября, но я также реалист. Я не собираюсь оставаться в этом бизнесе и терять деньги», — заявил глава BlackBerry.	1460635218	105	\N	\N	\N
366	Организация ESforce откроет один из самых больших в мире киберстадионов	Благодаря компании РБК удалось узнать, что ESforce Holding Ltd. (в прошлом Virtus.pro Group) в октябре 2016 года откроет в Москве киберспортивную арену.\n\nПлощадь стадиона превысит 5 тыс. кв. м — таким образом, строящаяся в районе станции метро «Тимирязевская» арена может стать крупнейшей не только в России, но и в мире, пишут Новости ИТ\n\nРабочее название строящегося в Москве стадиона — Arena Moscow. Окончательное название прорабатывается, и оно будет связано с брендом оператора Yota. По словам представителя ESforce, строительство началось только в этом году. И Объем инвестиций в проект превышает пять миллионов долларов.\n\nНа Arena Moscow будут проходить турниры по киберспорту, тренировки киберспортсменов, встречи с болельщиками и другие развлекательные мероприятия и презентации.\n\nТакже на стадионе вы обнаружите ресторан для геймеров и компьютерный клуб на 180 посадочных мест. Кроме того, ESforce планирует зарабатывать на размещении рекламы спонсоров.\n	1459953401	6	\N	\N	\N
\.


--
-- TOC entry 2031 (class 0 OID 0)
-- Dependencies: 171
-- Name: news_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('news_id_seq', 379, true);


--
-- TOC entry 2016 (class 0 OID 24676)
-- Dependencies: 179
-- Data for Name: portfolio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY portfolio (id, name, opis, img) FROM stdin;
25	Donetsk Travel Places	Мобильный гид по Донецку создан Ideas World при сотрудничестве с Туристическим информационным центром города Донецка. Приложение содержит исчерпывающую информацию об интересных местах города.	14605583213456.jpg                                                                                                                                                                                                                                             
26	TravelPlaces Batumi	TravelPlaces Batumi – это приложение, которое поможет гостям и жителям города получить полную информацию об интересных местах Батуми (Грузия).	14605583413858.jpg                                                                                                                                                                                                                                             
27	Крым - Travel Places 	Мобильный гид по Крыму создан при сотрудничестве Министерства туризма и курортов АР Крым и компании Ideas World. Приложение имеет в своей базе данных исчерпывающий перечень интересных мест полуострова.	14605583657063.jpg                                                                                                                                                                                                                                             
28	Radisson	Официальное приложение пятизвездочного курортного спа-отеля Radisson Blu Paradise Resort and Spa, Sochi. Приложение предлагает простой доступ к исчерпывающей информации об отеле, а также проинформирует Вас о планируемых событиях.	14605583852830.jpg                                                                                                                                                                                                                                             
29	Бесплатные объявления - ВМЕСТЕ	Мобильный сервис- "Бесплатные объявления" является единственным порталом в России для трудовых мигрантов на родном языке.	14605584057421.jpg                                                                                                                                                                                                                                             
30	Твій Номер - бізнес-додаток від Київcтар	«Твій Номер» - решение для бизнес-клиентов компании«Киевcтар», представителей малого и среднего бизнеса, является бесплатным дополнением к широкому спектру услуг, предоставляемых компанией «Киевстар».	14605584221932.jpg                                                                                                                                                                                                                                             
31	Shark Taxidd	SharkTaxi – автоматизированная система организации и реализации услуг такси. Данная система предоставляет всем участникам услуги такси (клиент, водитель) автоматизированный удобный и доступный инструмент, который учитывает интересы каждой из сторон. SharkTaxi – такси на расстоянии клика!	14606385256050.jpg                                                                                                                                                                                                                                             
\.


--
-- TOC entry 2032 (class 0 OID 0)
-- Dependencies: 178
-- Name: portfolio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('portfolio_id_seq', 33, true);


--
-- TOC entry 1900 (class 2606 OID 24670)
-- Name: bcomments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY bcomments
    ADD CONSTRAINT bcomments_pkey PRIMARY KEY (id);


--
-- TOC entry 1898 (class 2606 OID 16395)
-- Name: news_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY news
    ADD CONSTRAINT news_pkey PRIMARY KEY (id);


--
-- TOC entry 2023 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-04-15 10:02:03 MSK

--
-- PostgreSQL database dump complete
--

