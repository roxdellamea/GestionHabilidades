<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GestionHabilidadesBundle\Entity\Proyecto;
use GestionHabilidadesBundle\Form\ProyectoType;

class ProyectoController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GestionHabilidadesBundle:Default:index.html.twig', array('name' => $name));
    }

    public function agregarAction()
    {
        $proyecto = new Proyecto();
        $form = $this->crearCreateForm($proyecto);

        return $this->render('GestionHabilidadesBundle:Proyecto:agregar.html.twig', array('form' => $form->createView()));
    }

    private function crearCreateForm(Proyecto $entity)
    {
        $form = $this->createForm(new ProyectoType(), $entity, array('action' => $this->generateUrl('gh_proyecto_crear'), 'method' => 'POST'));
        return $form;
    }
	
    public function crearAction(Request $request)
    {
        $proyecto = new Proyecto();
        $form = $this->crearCreateForm($proyecto);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proyecto);
            $em->flush();

            return $this->redirectToRoute('gh_proyecto_agregar');
        }
        return $this->render('GestionHabilidadesBundle:Proyecto:agregar.html.twig', array('form' => $form->createView()));
    }
}
