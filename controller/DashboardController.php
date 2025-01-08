<?php

class DashboardController
{
    // Método para mostrar el panel principal
    public function mostrarDashboard()
    {
        // Obtener datos necesarios para el dashboard
        require_once 'model/LibroModel.php';
        require_once 'model/ReservarModel.php';

        $libroModel = new LibroModel();
        $reservarModel = new ReservarModel();

        $totalLibros = $libroModel->contarLibros();
        $totalReservas = $reservarModel->contarReservas();

        // Pasar los datos a la vista del dashboard
        require_once 'view/dashboard.php';
    }
}

