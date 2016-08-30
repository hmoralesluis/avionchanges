<?php

namespace SysBackenBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class MroController extends BaseAdminController
{
    public function createmroEntityFormBuilder($mro, $view)
    {
        $form = parent::createEntityFormBuilder($mro,$view);
        $form->add('mroactive','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('MroActive');}, 'attr'=>array('form_group'=>'_easyadmin_form_design_element_0')));
        $form->add('doctype','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('DocType');}, 'attr'=>array('form_group'=>'_easyadmin_form_design_element_0')));
        $form->add('ofactype','entity',array('class'=>'SysBackenBundle:Nomencladores','property'=>'title','query_builder'=> function($er){return $er->findNomenclatorsQueryBuilder('LicenseType');},'attr'=>array('form_group'=>'_easyadmin_form_design_element_0')));

        return $form;
    }

    public function createmroListQueryBuilder($mro)
    {


        $em = $this->getDoctrine()->getManagerForClass($mro);
//        $nomenclador = $this->em->getRepository('SysBackenBundle:Nomencladores')->find(15);
//        if($nomenclador->getTitle() == 'all')
//            $dql = "SELECT c FROM SysBackenBundle:Mro c";
//        elseif($nomenclador->getTitle() == 'active')
//            $dql = "SELECT c FROM SysBackenBundle:Mro c WHERE c.mroactive = 1";
//        elseif($nomenclador->getTitle() == 'retired')

//        $dql = "SELECT c FROM SysBackenBundle:Mro c WHERE c.is_active = TRUE";
//        $consulta = $em->createQuery($dql);
//        return $consulta;
        return parent::createListQueryBuilder($mro, 'DESC');
    }


    public function retireAction()
    {

        // change the properties of the given entity and save the changes
        $id = $this->request->query->get('id');
        $mro = $this->em->getRepository('SysBackenBundle:Mro')->find($id);
        $retireNom = $this->em->getRepository('SysBackenBundle:Nomencladores')->find(2);
        $mro->setMroactive($retireNom);
        $this->em->flush();

        // redirect to the 'list' view of the given entity
        return $this->redirectToRoute('easyadmin', array(
            'action' => 'list',
            'entity' => $this->request->query->get('entity'),
        ));

    }




}
