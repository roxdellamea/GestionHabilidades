<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdministradorController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionHabilidadesBundle:Administrador:index.html.twig');
    }
}

