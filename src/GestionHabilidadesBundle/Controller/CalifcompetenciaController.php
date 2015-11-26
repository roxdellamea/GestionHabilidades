<?php

namespace GestionHabilidadesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use GestionHabilidadesBundle\Entity\Califcompetencia;
use GestionHabilidadesBundle\Entity\Profesional;
use GestionHabilidadesBundle\Form\CalifcompetenciaType;

/**
 * Califcompetencia controller.
 *
 */
class CalifcompetenciaController extends Controller
{

    /**
     * Lists all Califcompetencia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GestionHabilidadesBundle:Califcompetencia')->findAll();

        return $this->render('GestionHabilidadesBundle:Califcompetencia:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Califcompetencia entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Califcompetencia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('califcompetencia_new', array('id' => $entity->getId())));
        }

        return $this->render('GestionHabilidadesBundle:Califcompetencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Califcompetencia entity.
     *
     * @param Califcompetencia $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Califcompetencia $entity)
    {
        $form = $this->createForm(new CalifcompetenciaType(), $entity, array(
            'action' => $this->generateUrl('califcompetencia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Califcompetencia entity.
     *
     */
    public function newAction()
    {
        $entity = new Califcompetencia();
        $form   = $this->createCreateForm($entity);

        return $this->render('GestionHabilidadesBundle:Califcompetencia:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Califcompetencia entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Califcompetencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Califcompetencia entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GestionHabilidadesBundle:Califcompetencia:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Califcompetencia entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Califcompetencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Califcompetencia entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GestionHabilidadesBundle:Califcompetencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Califcompetencia entity.
    *
    * @param Califcompetencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Califcompetencia $entity)
    {
        $form = $this->createForm(new CalifcompetenciaType(), $entity, array(
            'action' => $this->generateUrl('califcompetencia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Califcompetencia entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GestionHabilidadesBundle:Califcompetencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Califcompetencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('califcompetencia_edit', array('id' => $id)));
        }

        return $this->render('GestionHabilidadesBundle:Califcompetencia:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Califcompetencia entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GestionHabilidadesBundle:Califcompetencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Califcompetencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('califcompetencia'));
    }

    /**
     * Creates a form to delete a Califcompetencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('califcompetencia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
