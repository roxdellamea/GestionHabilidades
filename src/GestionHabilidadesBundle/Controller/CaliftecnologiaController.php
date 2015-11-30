<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GestionHabilidadesBundle\Entity\Califtecnologia;
use GestionHabilidadesBundle\Form\CaliftecnologiaType;

/**
 * Califtecnologia controller.
 *
 */
class CaliftecnologiaController extends Controller
{

    /**
     * Lists all Califtecnologia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GestionHabilidadesBundle:Califtecnologia')->findAll();

        return $this->render('GestionHabilidadesBundle:Califtecnologia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Califtecnologia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Califtecnologia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('califtecnologia_new', array('id' => $entity->getId())));
        }

        return $this->render('GestionHabilidadesBundle:Califtecnologia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Califtecnologia entity.
     *
     * @param Califtecnologia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Califtecnologia $entity)
    {
        $form = $this->createForm(new CaliftecnologiaType(), $entity, array(
            'action' => $this->generateUrl('califtecnologia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Califtecnologia entity.
     *
     */
    public function newAction()
    {
        $entity = new Califtecnologia();
        $form   = $this->createCreateForm($entity);

        return $this->render('GestionHabilidadesBundle:Califtecnologia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Califtecnologia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Califtecnologia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Califtecnologia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GestionHabilidadesBundle:Califtecnologia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Califtecnologia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Califtecnologia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Califtecnologia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GestionHabilidadesBundle:Califtecnologia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Califtecnologia entity.
    *
    * @param Califtecnologia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Califtecnologia $entity)
    {
        $form = $this->createForm(new CaliftecnologiaType(), $entity, array(
            'action' => $this->generateUrl('califtecnologia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Califtecnologia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Califtecnologia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Califtecnologia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('califtecnologia_edit', array('id' => $id)));
        }

        return $this->render('GestionHabilidadesBundle:Califtecnologia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Califtecnologia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GestionHabilidadesBundle:Califtecnologia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Califtecnologia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('califtecnologia'));
    }

    /**
     * Creates a form to delete a Califtecnologia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('califtecnologia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
