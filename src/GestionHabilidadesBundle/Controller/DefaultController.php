<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GestionHabilidadesBundle:Default:index.html.twig', array('name' => $name));
    }

    public function loginAction()
    {
        return $this->render('GestionHabilidadesBundle:Default:login.html.twig');
    }
}
