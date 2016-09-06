<?php

namespace SysBackenBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PersonalController extends BaseAdminController
{
    public function createpersonalEntityFormBuilder($personal, $view)
    {
        $form = parent::createEntityFormBuilder($personal,$view);
        $form->add('ocupation','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('1');}, 'attr'=>array('form_group'=>'_easyadmin_form_design_element_0')));
        $form->add('category','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('1');}, 'attr'=>array('form_group'=>'_easyadmin_form_design_element_0')));
        return $form;
    }

}
