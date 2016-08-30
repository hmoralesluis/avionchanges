<?php

namespace SysBackenBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ChangeOfRecordController extends BaseAdminController
{


    public function createchangeofrecordListQueryBuilder($changeofrecord)
    {


           $em = $this->getDoctrine()->getManagerForClass($changeofrecord);
           $dql = "SELECT c FROM SysBackenBundle:ChangeOf c WHERE c.isActive = false";
           $consulta = $em->createQuery($dql);
           return $consulta;

//        return parent::createListQueryBuilder($crew, 'DESC');
    }





}
