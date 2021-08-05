<?php
class Reportes_model
{
    private $db;
    private $clientes;

    public function __construct()
    {
        include_once 'config/conexion.php';
        $this->db = Conexion::getConexion();
        $this->reporte = array();
    }

    public function generarVehiculos($fec_entrada, $fec_salida)
    {
        $sql = $this->db->prepare("
        select vehiculo.marca, vehiculo.modelo from
        vehiculo,
        nota
        where vehiculo.matricula = nota.id_vehiculo and
        fec_entrada between '".$fec_entrada."' and '".$fec_salida."';");
        $sql->execute();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->reporte[] = $row;
        }
        return $this->reporte;
    }

    public function generarTrabajos($anio)
    {
        $sql = $this->db->prepare("
        create or replace view trabajosxyear
        as select id_mecanico, count(id_mecanico) as trabajos from nota
        where extract(year from fec_salida) =" . $anio . "
        group by id_mecanico
        order by id_mecanico asc;");
        $sql->execute();

        $sql2 = $this->db->prepare("
        select concat(mecanico.nombre || ' ' || mecanico.ape_pat|| ' ' || mecanico.ape_mat) as nombre, trabajosxyear.trabajos as trabajos
        from mecanico,
        trabajosxyear
        where mecanico.id_mecanico =trabajosxyear.id_mecanico
        order by trabajosxyear.trabajos asc;
        ");
        $sql2->execute();
        while ($row = $sql2->fetch(PDO::FETCH_ASSOC)) {
            $this->reporte[] = $row;
        }
        return $this->reporte;
    }
    public function generarServicios($anio, $month)
    {
        $sql = $this->db->prepare(
            "
                create or replace view serviciosxperiodo
                as select id_servicio, count(id_servicio) from notaxservicio
                where id_nota in (select id_nota from nota
                where extract(year from fec_salida) = " . $anio . " and
                extract (month from fec_salida) = " . $month . ")
                group by id_servicio
                order by count desc;"
        );
        $sql->execute();
        $sql2 = $this->db->prepare("
        select servicios.nombre, serviciosxperiodo.count from 
        serviciosxperiodo,
        servicios
        where servicios.id_servicios = serviciosxperiodo.id_servicio
        order by count desc;");
        $sql2->execute();
        while ($row = $sql2->fetch(PDO::FETCH_ASSOC)) {
            $this->reporte[] = $row;
        }
        return $this->reporte;
    }
    public function empleadoMes($anio, $month)
    {
        $sql = $this->db->prepare("
            create or replace view serviciosxmesxmecanico
            as select count(notaxservicio.id_nota) as servicios, nota.id_mecanico from notaxservicio,
            nota
            where notaxservicio.id_nota = nota.id_nota and
            extract(month from nota.fec_salida) = " . $month . "and
            extract(year from nota.fec_salida) = " . $anio . "
            group by nota.id_mecanico;");
        $sql->execute();

        $sql2 = $this->db->prepare("
        select concat(mecanico.nombre || ' ' || mecanico.ape_pat || ' ' || mecanico.ape_mat ) as empleadodelmes, serviciosxmesxmecanico.servicios
        from mecanico,serviciosxmesxmecanico
        where mecanico.id_mecanico = serviciosxmesxmecanico.id_mecanico and
        mecanico.id_mecanico = (select id_mecanico from serviciosxmesxmecanico
        where servicios in (select max(servicios)
        from serviciosxmesxmecanico));");
        $sql2->execute();
        while ($row = $sql2->fetch(PDO::FETCH_ASSOC)) {
            $this->reporte[] = $row;
        }
        return $this->reporte;
    }
    public function generarGanancias($anio)
    {
        $sql = $this->db->prepare("
        create or replace view Ingresos as
        select
        case when extract(month from fec_salida)= 1 then total
        end \"enero\",
        case when extract(month from fec_salida)= 2 then total
        end \"febrero\",
        case when extract(month from fec_salida)= 3 then total
        end \"marzo\",
        case when extract(month from fec_salida)= 4 then total
        end \"abril\",
        case when extract(month from fec_salida)= 5 then total
        end \"mayo\",
        case when extract(month from fec_salida)= 6 then total
        end \"junio\",
        case when extract(month from fec_salida)= 7 then total
        end \"julio\",
        case when extract(month from fec_salida)= 8 then total
        end \"agosto\",
        case when extract(month from fec_salida)= 9 then total
        end \"septiembre\",
        case when extract(month from fec_salida)= 10 then total
        end \"octubre\",
        case when extract(month from fec_salida)= 11 then total
        end \"noviembre\",
        case when extract(month from fec_salida)= 12 then total
        end \"diciembre\"
        from nota
        where extract(year from fec_salida)=" . $anio . ";");
        $sql->execute();

        $sql2 = $this->db->prepare("
        select
        sum(enero) as enero,
        sum(febrero) as febrero,
        sum(marzo) as marzo,
        sum(abril) as abril,
        sum(mayo) as mayo,
        sum(junio) as junio,
        sum(julio) as julio,
        sum(agosto) as agosto,
        sum(septiembre) as septiembre,
        sum(octubre) as octubre,
        sum(noviembre) as noviembre,
        sum(diciembre) as diciembre
        from ingresos;");
        $sql2->execute();
        while ($row = $sql2->fetch(PDO::FETCH_ASSOC)) {
            $this->reporte[] = $row;
        }
        return $this->reporte;
    }
}
