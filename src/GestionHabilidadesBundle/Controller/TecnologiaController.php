<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GestionHabilidadesBundle\Entity\Tecnologia;
use GestionHabilidadesBundle\Form\TecnologiaType;

/**
 * Tecnologia controller.
 *
 */
class TecnologiaController extends Controller
{

    /**
     * Lists all Tecnologia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GestionHabilidadesBundle:Tecnologia')->findAll();

        return $this->render('GestionHabilidadesBundle:Tecnologia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tecnologia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tecnologia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tecnologia_show', array('id' => $entity->getId())));
        }

        return $this->render('GestionHabilidadesBundle:Tecnologia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Tecnologia entity.
     *
     * @param Tecnologia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tecnologia $entity)
    {
        $form = $this->createForm(new TecnologiaType(), $entity, array(
            'action' => $this->generateUrl('tecnologia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tecnologia entity.
     *
     */
    public function newAction()
    {
        $entity = new Tecnologia();
        $form   = $this->createCreateForm($entity);

        return $this->render('GestionHabilidadesBundle:Tecnologia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tecnologia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Tecnologia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tecnologia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GestionHabilidadesBundle:Tecnologia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tecnologia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Tecnologia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tecnologia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GestionHabilidadesBundle:Tecnologia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tecnologia entity.
    *
    * @param Tecnologia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tecnologia $entity)
    {
        $form = $this->createForm(new TecnologiaType(), $entity, array(
            'action' => $this->generateUrl('tecnologia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tecnologia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Tecnologia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tecnologia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tecnologia_edit', array('id' => $id)));
        }

        return $this->render('GestionHabilidadesBundle:Tecnologia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tecnologia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GestionHabilidadesBundle:Tecnologia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tecnologia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tecnologia'));
    }

    /**
     * Creates a form to delete a Tecnologia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tecnologia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
