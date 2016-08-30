<?php

namespace SysBackenBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class ChangeOfController extends BaseAdminController
{
    public function createchangeofEntityFormBuilder($changeof, $view)
    {
        $form = parent::createEntityFormBuilder($changeof,$view);
        $form->add('type','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('3');}, 'attr'=>array('form_group'=>'_easyadmin_form_design_element_0')));
        $form->add('inspector','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('InspectorSel');}, 'attr'=>array('form_group'=>'_easyadmin_form_design_element_2')));
        $form->add('assignedto','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('AssignedToSel');},'attr'=>array('form_group'=>'_easyadmin_form_design_element_2')));
        $form->add('status','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('MroTaskStatus');},'attr'=>array('form_group'=>'_easyadmin_form_design_element_2')));
//        $form->add('new', ChoiceType::class, array(
//            'choices'  => array(),
//            'attr'=>array('form_group'=>'_easyadmin_form_design_element_2')
//        ));

        $form->get('new')->resetViewTransformers();

        return $form;
    }

    public function createchangeofListQueryBuilder($changeof)
    {


           $em = $this->getDoctrine()->getManagerForClass($changeof);
           $dql = "SELECT c FROM SysBackenBundle:ChangeOf c WHERE c.isActive = true";
           $consulta = $em->createQuery($dql);
           return $consulta;

//        return parent::createListQueryBuilder($crew, 'DESC');
    }


    public function completedAction()
    {

        // change the properties of the given entity and save the changes
        $id = $this->request->query->get('id');
        $changeOf = $this->em->getRepository('SysBackenBundle:ChangeOf')->find($id);
        $changeOf->setIsActive(false);
        $this->em->flush();

        // redirect to the 'list' view of the given entity
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'list',
            'entity' => $this->request->query->get('entity'),
        ));

    }


}
