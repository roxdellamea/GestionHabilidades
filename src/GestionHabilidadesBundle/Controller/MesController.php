<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GestionHabilidadesBundle\Entity\Mes;
use GestionHabilidadesBundle\Form\MesType;

/**
 * Mes controller.
 *
 */
class MesController extends Controller
{

    /**
     * Lists all Mes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GestionHabilidadesBundle:Mes')->findAll();

        return $this->render('GestionHabilidadesBundle:Mes:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Mes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Mes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mes_show', array('id' => $entity->getId())));
        }

        return $this->render('GestionHabilidadesBundle:Mes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Mes entity.
     *
     * @param Mes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Mes $entity)
    {
        $form = $this->createForm(new MesType(), $entity, array(
            'action' => $this->generateUrl('mes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Mes entity.
     *
     */
    public function newAction()
    {
        $entity = new Mes();
        $form   = $this->createCreateForm($entity);

        return $this->render('GestionHabilidadesBundle:Mes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Mes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Mes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GestionHabilidadesBundle:Mes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Mes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Mes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GestionHabilidadesBundle:Mes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Mes entity.
    *
    * @param Mes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Mes $entity)
    {
        $form = $this->createForm(new MesType(), $entity, array(
            'action' => $this->generateUrl('mes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Mes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Mes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mes_edit', array('id' => $id)));
        }

        return $this->render('GestionHabilidadesBundle:Mes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Mes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GestionHabilidadesBundle:Mes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Mes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mes'));
    }

    /**
     * Creates a form to delete a Mes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
