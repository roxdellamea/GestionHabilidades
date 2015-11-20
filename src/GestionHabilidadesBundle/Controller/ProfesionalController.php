<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GestionHabilidadesBundle\Entity\Profesional;
use GestionHabilidadesBundle\Form\ProfesionalType;

class ProfesionalController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GestionHabilidadesBundle:Default:index.html.twig', array('name' => $name));
    }

    public function verAction()
    {
        return $this->render('GestionHabilidadesBundle:Profesional:ver.html.twig'); //, array('name' => $name));
    }

    public function agregarAction()
    {
        $profesional = new Profesional();
        $form = $this->crearCreateForm($profesional);

        return $this->render('GestionHabilidadesBundle:Profesional:agregar.html.twig', array('form' => $form->createView()));
    }

    private function crearCreateForm(Profesional $entity)
    {
        $form = $this->createForm(new ProfesionalType(), $entity, array('action' => $this->generateUrl('gh_profesional_crear'), 'method' => 'POST'));
        return $form;
    }
	
    public function crearAction(Request $request)
    {
        $profesional = new Profesional();
        $form = $this->crearCreateForm($profesional);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($profesional);
            $em->flush();

            return $this->redirectToRoute('gh_profesional_agregar');
        }
        return $this->render('GestionHabilidadesBundle:Profesional:agregar.html.twig', array('form' => $form->createView()));
    }
}
