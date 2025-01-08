<?php
class ReservaController
{
    private $reservarModel;

    public function __construct($reservarModel)
    {
        $this->reservarModel = $reservarModel;
    }

    public function mostrarFormularioReserva()
    {
        require_once 'view/Reservar.php';
    }

    public function reservarLibro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $isbn = trim($_POST['ISBN']);
            $fechaDesde = $_POST['fecha_desde'];
            $fechaHasta = $_POST['fecha_hasta'];

            if (!empty($isbn) && !empty($fechaDesde) && !empty($fechaHasta)) {
                $disponible = $this->reservarModel->verificarDisponibilidad($isbn, $fechaDesde, $fechaHasta);

                if ($disponible) {
                    $resultado = $this->reservarModel->reservarLibro($isbn, $fechaDesde, $fechaHasta);
                    if ($resultado) {
                        $mensaje = "Reserva realizada con éxito.";
                    } else {
                        $mensaje = "Error al guardar la reserva. Inténtelo de nuevo.";
                    }
                } else {
                    $mensaje = "El libro no está disponible en el rango de fechas solicitado.";
                }
            } else {
                $mensaje = "Todos los campos son obligatorios.";
            }
            require_once 'view/MensajeReserva.php';
        } else {
            $this->mostrarFormularioReserva();
        }
    }
}
