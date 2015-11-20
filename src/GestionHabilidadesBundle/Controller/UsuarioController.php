<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuarioController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionHabilidadesBundle:Usuario:index.html.twig');
    }
}

