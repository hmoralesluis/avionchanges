<?php

namespace SysBackenBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AuditController extends BaseAdminController
{
    public function createauditEntityFormBuilder($audit, $view)
    {
        $form = parent::createEntityFormBuilder($audit,$view);
        $form->add('inspector','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('InspectorSel');}, 'attr'=>array('form_group'=>'_easyadmin_form_design_element_0')));
        $form->add('assignedto','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('AssignedToSel');},'attr'=>array('form_group'=>'_easyadmin_form_design_element_0')));
        $form->add('status','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('MroTaskStatus');},'attr'=>array('form_group'=>'_easyadmin_form_design_element_0')));

        return $form;
    }

    public function createauditListQueryBuilder($audit)
    {


           $em = $this->getDoctrine()->getManagerForClass($audit);
           $dql = "SELECT c FROM SysBackenBundle:Audit c WHERE c.isActive = true";
           $consulta = $em->createQuery($dql);
           return $consulta;

//        return parent::createListQueryBuilder($crew, 'DESC');
    }


    public function completedAction()
    {

        // change the properties of the given entity and save the changes
        $id = $this->request->query->get('id');
        $audit = $this->em->getRepository('SysBackenBundle:Audit')->find($id);
        $audit->setIsActive(false);
        $this->em->flush();

        // redirect to the 'list' view of the given entity
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'list',
            'entity' => $this->request->query->get('entity'),
        ));

    }


}
