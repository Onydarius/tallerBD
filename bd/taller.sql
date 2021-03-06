PGDMP     &    "                y           taller    13.2    13.2 8    ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                        0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16555    taller    DATABASE     j   CREATE DATABASE taller WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_United States.1252';
    DROP DATABASE taller;
                postgres    false            ?            1255    16820    closenote()    FUNCTION     ?   CREATE FUNCTION public.closenote() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
		begin
			new.total := (select total(old.id_nota));
			new.fec_salida := current_timestamp;
		return new;
		end;
$$;
 "   DROP FUNCTION public.closenote();
       public          postgres    false            ?            1255    16822    gettime(integer)    FUNCTION     ?   CREATE FUNCTION public.gettime(nota integer) RETURNS integer
    LANGUAGE plpgsql
    AS $$
		begin
			select (fec_salida-fec_entrada) from nota where id_nota = nota;
		return new;
		end;
	$$;
 ,   DROP FUNCTION public.gettime(nota integer);
       public          postgres    false            ?            1255    16817 	   protect()    FUNCTION     r   CREATE FUNCTION public.protect() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
		begin
		return null;
		end;
$$;
     DROP FUNCTION public.protect();
       public          postgres    false            ?            1255    16855    total(numeric)    FUNCTION     9  CREATE FUNCTION public.total(numeric) RETURNS numeric
    LANGUAGE plpgsql
    AS $_$
declare
			notanumero ALIAS FOR $1;
			total Integer;
		begin
		total :=(select SUM(precios) from servicios where id_servicios in (select id_servicio from notaxservicio where id_nota = notanumero));
		return total;
		end;
$_$;
 %   DROP FUNCTION public.total(numeric);
       public          postgres    false            ?            1259    16556    cliente_seq    SEQUENCE     v   CREATE SEQUENCE public.cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999
    CACHE 1;
 "   DROP SEQUENCE public.cliente_seq;
       public          postgres    false                       0    0    SEQUENCE cliente_seq    ACL     >   GRANT SELECT,USAGE ON SEQUENCE public.cliente_seq TO gerente;
          public          postgres    false    200            ?            1259    16564    cliente    TABLE     f  CREATE TABLE public.cliente (
    id_cliente numeric(4,0) DEFAULT nextval('public.cliente_seq'::regclass) NOT NULL,
    nombre character varying(20) NOT NULL,
    ape_pat character varying(20) NOT NULL,
    ape_mat character varying(20) NOT NULL,
    mail character varying(40) NOT NULL,
    direccion character varying(60),
    telefono numeric NOT NULL
);
    DROP TABLE public.cliente;
       public         heap    postgres    false    200                       0    0    TABLE cliente    ACL     ?   GRANT ALL ON TABLE public.cliente TO administrador;
GRANT SELECT,INSERT,UPDATE ON TABLE public.cliente TO gerente;
GRANT SELECT ON TABLE public.cliente TO empleado;
          public          postgres    false    204            ?            1259    16560    nota_seq    SEQUENCE     u   CREATE SEQUENCE public.nota_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1;
    DROP SEQUENCE public.nota_seq;
       public          postgres    false                       0    0    SEQUENCE nota_seq    ACL     ;   GRANT SELECT,USAGE ON SEQUENCE public.nota_seq TO gerente;
          public          postgres    false    202            ?            1259    16688    nota    TABLE     5  CREATE TABLE public.nota (
    id_nota numeric(6,0) DEFAULT nextval('public.nota_seq'::regclass) NOT NULL,
    fec_entrada timestamp without time zone NOT NULL,
    fec_salida timestamp without time zone,
    total numeric(6,2) NOT NULL,
    id_vehiculo character varying(10),
    id_mecanico numeric(4,0)
);
    DROP TABLE public.nota;
       public         heap    postgres    false    202                       0    0 
   TABLE nota    ACL     m   GRANT ALL ON TABLE public.nota TO administrador;
GRANT SELECT,INSERT,UPDATE ON TABLE public.nota TO gerente;
          public          postgres    false    208            ?            1259    16760    ingresos    VIEW     q  CREATE VIEW public.ingresos AS
 SELECT
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (1)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS enero,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (2)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS febrero,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (3)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS marzo,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (4)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS abril,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (5)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS mayo,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (6)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS junio,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (7)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS julio,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (8)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS agosto,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (9)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS septiembre,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (10)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS octubre,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (11)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS noviembre,
        CASE
            WHEN (date_part('month'::text, nota.fec_salida) = (12)::double precision) THEN nota.total
            ELSE NULL::numeric
        END AS diciembre
   FROM public.nota
  WHERE (date_part('year'::text, nota.fec_salida) = (2021)::double precision);
    DROP VIEW public.ingresos;
       public          postgres    false    208    208            ?            1259    16558    mecanico_seq    SEQUENCE     y   CREATE SEQUENCE public.mecanico_seq
    START WITH 10
    INCREMENT BY 10
    MINVALUE 10
    MAXVALUE 9999
    CACHE 1;
 #   DROP SEQUENCE public.mecanico_seq;
       public          postgres    false                       0    0    SEQUENCE mecanico_seq    ACL     ?   GRANT SELECT,USAGE ON SEQUENCE public.mecanico_seq TO gerente;
          public          postgres    false    201            ?            1259    16610    mecanico    TABLE     q  CREATE TABLE public.mecanico (
    id_mecanico numeric(4,0) DEFAULT nextval('public.mecanico_seq'::regclass) NOT NULL,
    nombre character varying(20) NOT NULL,
    ape_pat character varying(20) NOT NULL,
    ape_mat character varying(20) NOT NULL,
    rfc character varying(20) NOT NULL,
    direccion character varying(60) NOT NULL,
    telefono numeric NOT NULL
);
    DROP TABLE public.mecanico;
       public         heap    postgres    false    201                       0    0    TABLE mecanico    ACL     u   GRANT ALL ON TABLE public.mecanico TO administrador;
GRANT SELECT,INSERT,UPDATE ON TABLE public.mecanico TO gerente;
          public          postgres    false    205            ?            1259    16704    notaxservicio    TABLE     ^   CREATE TABLE public.notaxservicio (
    id_nota numeric(6,0),
    id_servicio numeric(4,0)
);
 !   DROP TABLE public.notaxservicio;
       public         heap    postgres    false                       0    0    TABLE notaxservicio    ACL     ?   GRANT ALL ON TABLE public.notaxservicio TO administrador;
GRANT SELECT,INSERT,DELETE,UPDATE ON TABLE public.notaxservicio TO gerente;
          public          postgres    false    209            ?            1259    16562    servicios_seq    SEQUENCE     }   CREATE SEQUENCE public.servicios_seq
    START WITH 100
    INCREMENT BY 100
    MINVALUE 100
    MAXVALUE 9999
    CACHE 1;
 $   DROP SEQUENCE public.servicios_seq;
       public          postgres    false            	           0    0    SEQUENCE servicios_seq    ACL     @   GRANT SELECT,USAGE ON SEQUENCE public.servicios_seq TO gerente;
          public          postgres    false    203            ?            1259    16621 	   servicios    TABLE     ?   CREATE TABLE public.servicios (
    id_servicios numeric(4,0) DEFAULT nextval('public.servicios_seq'::regclass) NOT NULL,
    nombre character varying(20) NOT NULL,
    descripcion character varying(80) NOT NULL,
    precios numeric(6,2) NOT NULL
);
    DROP TABLE public.servicios;
       public         heap    postgres    false    203            
           0    0    TABLE servicios    ACL     ?   GRANT ALL ON TABLE public.servicios TO administrador;
GRANT SELECT,INSERT,UPDATE ON TABLE public.servicios TO gerente;
GRANT SELECT ON TABLE public.servicios TO empleado;
          public          postgres    false    206            ?            1259    16789    serviciosxmesxmecanico    VIEW     9  CREATE VIEW public.serviciosxmesxmecanico AS
 SELECT count(notaxservicio.id_nota) AS servicios,
    nota.id_mecanico
   FROM public.notaxservicio,
    public.nota
  WHERE ((notaxservicio.id_nota = nota.id_nota) AND (date_part('month'::text, nota.fec_salida) = (1)::double precision))
  GROUP BY nota.id_mecanico;
 )   DROP VIEW public.serviciosxmesxmecanico;
       public          postgres    false    208    208    208    209            ?            1259    16777    serviciosxperiodo    VIEW     ?  CREATE VIEW public.serviciosxperiodo AS
 SELECT notaxservicio.id_servicio,
    count(notaxservicio.id_servicio) AS count
   FROM public.notaxservicio
  WHERE (notaxservicio.id_nota IN ( SELECT nota.id_nota
           FROM public.nota
          WHERE ((date_part('year'::text, nota.fec_salida) = (2021)::double precision) AND (date_part('month'::text, nota.fec_salida) = (3)::double precision))))
  GROUP BY notaxservicio.id_servicio
  ORDER BY (count(notaxservicio.id_servicio)) DESC;
 $   DROP VIEW public.serviciosxperiodo;
       public          postgres    false    209    209    208    208            ?            1259    16781    trabajosxyear    VIEW       CREATE VIEW public.trabajosxyear AS
 SELECT nota.id_mecanico,
    count(nota.id_mecanico) AS trabajos
   FROM public.nota
  WHERE (date_part('year'::text, nota.fec_salida) = (2021)::double precision)
  GROUP BY nota.id_mecanico
  ORDER BY nota.id_mecanico;
     DROP VIEW public.trabajosxyear;
       public          postgres    false    208    208            ?            1259    16627    vehiculo    TABLE     ?   CREATE TABLE public.vehiculo (
    matricula character varying(10) NOT NULL,
    marca character varying(20) NOT NULL,
    modelo character varying(20) NOT NULL,
    color character varying(20) NOT NULL,
    id_cliente numeric(4,0)
);
    DROP TABLE public.vehiculo;
       public         heap    postgres    false                       0    0    TABLE vehiculo    ACL     ?   GRANT ALL ON TABLE public.vehiculo TO administrador;
GRANT SELECT,INSERT,UPDATE ON TABLE public.vehiculo TO gerente;
GRANT SELECT ON TABLE public.vehiculo TO empleado;
          public          postgres    false    207            ?          0    16564    cliente 
   TABLE DATA           b   COPY public.cliente (id_cliente, nombre, ape_pat, ape_mat, mail, direccion, telefono) FROM stdin;
    public          postgres    false    204   sL       ?          0    16610    mecanico 
   TABLE DATA           c   COPY public.mecanico (id_mecanico, nombre, ape_pat, ape_mat, rfc, direccion, telefono) FROM stdin;
    public          postgres    false    205   ZN       ?          0    16688    nota 
   TABLE DATA           a   COPY public.nota (id_nota, fec_entrada, fec_salida, total, id_vehiculo, id_mecanico) FROM stdin;
    public          postgres    false    208   qP       ?          0    16704    notaxservicio 
   TABLE DATA           =   COPY public.notaxservicio (id_nota, id_servicio) FROM stdin;
    public          postgres    false    209   	R       ?          0    16621 	   servicios 
   TABLE DATA           O   COPY public.servicios (id_servicios, nombre, descripcion, precios) FROM stdin;
    public          postgres    false    206   ?R       ?          0    16627    vehiculo 
   TABLE DATA           O   COPY public.vehiculo (matricula, marca, modelo, color, id_cliente) FROM stdin;
    public          postgres    false    207   $T                  0    0    cliente_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.cliente_seq', 17, true);
          public          postgres    false    200                       0    0    mecanico_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.mecanico_seq', 160, true);
          public          postgres    false    201                       0    0    nota_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('public.nota_seq', 270, true);
          public          postgres    false    202                       0    0    servicios_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.servicios_seq', 1500, true);
          public          postgres    false    203            W           2606    16574    cliente cliente_mail_key 
   CONSTRAINT     S   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_mail_key UNIQUE (mail);
 B   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_mail_key;
       public            postgres    false    204            Y           2606    16572    cliente cliente_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id_cliente);
 >   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_pkey;
       public            postgres    false    204            [           2606    16576    cliente cliente_telefono_key 
   CONSTRAINT     [   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_telefono_key UNIQUE (telefono);
 F   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_telefono_key;
       public            postgres    false    204            ]           2606    16618    mecanico mecanico_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.mecanico
    ADD CONSTRAINT mecanico_pkey PRIMARY KEY (id_mecanico);
 @   ALTER TABLE ONLY public.mecanico DROP CONSTRAINT mecanico_pkey;
       public            postgres    false    205            _           2606    16620    mecanico mecanico_telefono_key 
   CONSTRAINT     ]   ALTER TABLE ONLY public.mecanico
    ADD CONSTRAINT mecanico_telefono_key UNIQUE (telefono);
 H   ALTER TABLE ONLY public.mecanico DROP CONSTRAINT mecanico_telefono_key;
       public            postgres    false    205            e           2606    16693    nota nota_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.nota
    ADD CONSTRAINT nota_pkey PRIMARY KEY (id_nota);
 8   ALTER TABLE ONLY public.nota DROP CONSTRAINT nota_pkey;
       public            postgres    false    208            a           2606    16626    servicios servicios_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.servicios
    ADD CONSTRAINT servicios_pkey PRIMARY KEY (id_servicios);
 B   ALTER TABLE ONLY public.servicios DROP CONSTRAINT servicios_pkey;
       public            postgres    false    206            c           2606    16631    vehiculo vehiculo_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.vehiculo
    ADD CONSTRAINT vehiculo_pkey PRIMARY KEY (matricula);
 @   ALTER TABLE ONLY public.vehiculo DROP CONSTRAINT vehiculo_pkey;
       public            postgres    false    207            k           2620    16824    nota closenote    TRIGGER     h   CREATE TRIGGER closenote BEFORE UPDATE ON public.nota FOR EACH ROW EXECUTE FUNCTION public.closenote();
 '   DROP TRIGGER closenote ON public.nota;
       public          postgres    false    208    216            h           2606    16699    nota nota_id_mecanico_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.nota
    ADD CONSTRAINT nota_id_mecanico_fkey FOREIGN KEY (id_mecanico) REFERENCES public.mecanico(id_mecanico);
 D   ALTER TABLE ONLY public.nota DROP CONSTRAINT nota_id_mecanico_fkey;
       public          postgres    false    2909    205    208            g           2606    16694    nota nota_id_vehiculo_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.nota
    ADD CONSTRAINT nota_id_vehiculo_fkey FOREIGN KEY (id_vehiculo) REFERENCES public.vehiculo(matricula);
 D   ALTER TABLE ONLY public.nota DROP CONSTRAINT nota_id_vehiculo_fkey;
       public          postgres    false    207    208    2915            i           2606    16707 (   notaxservicio notaxservicio_id_nota_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.notaxservicio
    ADD CONSTRAINT notaxservicio_id_nota_fkey FOREIGN KEY (id_nota) REFERENCES public.nota(id_nota);
 R   ALTER TABLE ONLY public.notaxservicio DROP CONSTRAINT notaxservicio_id_nota_fkey;
       public          postgres    false    2917    208    209            j           2606    16712 ,   notaxservicio notaxservicio_id_servicio_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.notaxservicio
    ADD CONSTRAINT notaxservicio_id_servicio_fkey FOREIGN KEY (id_servicio) REFERENCES public.servicios(id_servicios);
 V   ALTER TABLE ONLY public.notaxservicio DROP CONSTRAINT notaxservicio_id_servicio_fkey;
       public          postgres    false    209    2913    206            f           2606    16632 !   vehiculo vehiculo_id_cliente_fkey    FK CONSTRAINT     ?   ALTER TABLE ONLY public.vehiculo
    ADD CONSTRAINT vehiculo_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES public.cliente(id_cliente);
 K   ALTER TABLE ONLY public.vehiculo DROP CONSTRAINT vehiculo_id_cliente_fkey;
       public          postgres    false    207    204    2905            ?   ?  x?UR?n?0</????@Jov??ڭ9??$?fKi???????k????pfvg??-?6??? /??nZ????r??M??砿?g(+S?JxAnQ ;b?^	a?=B?qZ?i?????k?.??34??e?*8??p?=?,?+?????0<??'????4???Y?Om*?j?_8? {%???	?K?=????(xL?kW?PYט\Y8b\zXs???NN+Z?H???FIoSG??I;?r0??ƩvK???`??|?B\:z`)???w<?͊?ڦ*??m?	?`?????? ΍??	?0?^x0?5?Uy?AD^?B???sOq??_??T???C??Sw&p?,_????O^?6???#Fj?Ǣ4ea\蝘ä?3?D????????[)??b`?+???nu?;G??B???O??f?dX?F2F/????,?7???X<I?B7?d!`?^*S??J?????;      ?     x?eR?n?0=?????????(;v??I ?9??-?f??(%???㠷^??޼??О?4?????#<c???~n??kez?\vg?C?[?h???????&{??a?s????̓??p?kC\??3?uV?hUi??>y???????v??h??V?-(??!?ӉԝN>??RT????????f?6??돶??B?B.?^?qN9 ??????¸?rXa?w链]???S??5WR?7h,?$?O??u	??g]?8l}???}*?:?𧐇?i?mȺtF?ĉlC??FD&j??(=2ѐ?8?t???R?????m???????2Z[Y	N?<?????V0?????u?˂n?Q????;|??xNt[Za	?!?W??&X??GWs}U???y#H?8z6x:???????*??>~%ЕCH쟐t +Ӏ??IֲV?M?A^0'?˃?8?1??FSWD????e?	??&q<?S@X??ˆ?????-Z֟C|+?e?^@	g??~~???/?y??      ?   ?  x????j1?????l???L~.??BEZ????f?u????8????H?????Av ???4????w??ns<U??6I+47?Hgw<L ?m2??2?i??rp_?;?`e??5?d?C??6g#`?5?M??NZ?????Ϲiq?y????߭?`??9k4??ZBt???I`?kz????,??g??b%X??M?8?Fur?ݚjg?Y?h??U??????o}[$??C)?#F?P{2?h?%9~??%??D??uٛE??߳?o?Hw????F.??g?ܯ?w??/DH???m?@??)M6SM??<?`??0?^$G~f??<?h	?k1?ds??Ɔ,?w??X|J"(-??K:.??b?? ?S?H?d?<!???m?P(?>*?Ay?P??⭵??      ?   z   x?E??!?̕"?r??q??{??)P@H?`!MN???
Z?:???լ??7??i'?sP$X?d<?mi?w?0G\?{B???????
???p????_???NN+ܓ??????????/?      ?   ?  x?e?Mr?0???>?Ф?%ö+?e7J`Ʊ?2Sn?t?#p??qdXŖ?O?I^dl???;*??`KM????I4/?l?e??Y????{Kڸ??? SeʉoQ????Z?q%Zڡ??WL4`M??S ???e???]##V?QFM{???9?9??dQ?-;:?:(#j?????Z????pd?H?E?h?L?R??b6P?aG?1???X_?6Ð??/??5B1??k5?Gz??w????Q?_Į,.-????@??|???0?B??2?Nc?H?o???4??=?r??T}??6????Шf?2s?	??m\?4???VG??????a:y|I?<zG???m???~?????u?au?0?????E???5??f?????      ?     x?5??n?0E??_?/??WB?I?C- ?Z
U7&q?%???C??הv1?3?;?d9St?Y?ɘ#????`?f?Ix.??x?????^l??? ????r??+j?????,?ӷ3{
??{?a??c??N	O8??V?;??ޙc׵(;?????r????xי??q?'"?J?r???kv/??7[#'???Ϋ
s??1Ӿ?c?m KH?c?r?B9{?Z?{?FҜ	?X?1????	'}???Ac?:?K?8??TJ*y#m\"????x.y??| ?? ˤb#     