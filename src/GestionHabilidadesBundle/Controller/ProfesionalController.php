<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GestionHabilidadesBundle\Entity\Profesional;
use GestionHabilidadesBundle\Form\ProfesionalType;

/**
 * Profesional controller.
 *
 */
class ProfesionalController extends Controller
{

    /**
     * Lists all Profesional entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GestionHabilidadesBundle:Profesional')->findAll();

        return $this->render('GestionHabilidadesBundle:Profesional:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Profesional entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Profesional();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('profesional_show', array('id' => $entity->getId())));
        }

        return $this->render('GestionHabilidadesBundle:Profesional:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Profesional entity.
     *
     * @param Profesional $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Profesional $entity)
    {
        $form = $this->createForm(new ProfesionalType(), $entity, array(
            'action' => $this->generateUrl('profesional_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Profesional entity.
     *
     */
    public function newAction()
    {
        $entity = new Profesional();
        $form   = $this->createCreateForm($entity);

        return $this->render('GestionHabilidadesBundle:Profesional:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Profesional entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Profesional')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profesional entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $califcompetencias = $entity->getCalifcompetencia();

        return $this->render('GestionHabilidadesBundle:Profesional:show.html.twig', array(
            'entity'      => $entity,
            'califcs'      => $califcompetencias,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Profesional entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Profesional')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profesional entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GestionHabilidadesBundle:Profesional:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Profesional entity.
    *
    * @param Profesional $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Profesional $entity)
    {
        $form = $this->createForm(new ProfesionalType(), $entity, array(
            'action' => $this->generateUrl('profesional_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Profesional entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Profesional')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profesional entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('profesional_edit', array('id' => $id)));
        }

        return $this->render('GestionHabilidadesBundle:Profesional:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Profesional entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GestionHabilidadesBundle:Profesional')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Profesional entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('profesional'));
    }

    /**
     * Creates a form to delete a Profesional entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('profesional_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar','attr' => array('class' => 'btn btn-danger entity-submit-delete pull-center','role'=>'button')))
            ->getForm()
        ;
    }

    /**
     * Lists all Profesional for search.
     *
     */
    public function searchAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GestionHabilidadesBundle:Profesional')->findByNombre('Oscar');

        return $this->render('GestionHabilidadesBundle:Profesional:search.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function verAction()
    {
        return $this->render('GestionHabilidadesBundle:Profesional:ver.html.twig'); //, array('name' => $name));
    }
}
