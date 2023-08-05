<?php

namespace sistema\controlador\admin;

class AdminDashboard extends AdminControlador{
    
    public function dashboard(): void {
        echo $this->template->renderizar("dashboard.html", []);
    }
}
