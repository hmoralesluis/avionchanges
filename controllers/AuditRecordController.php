<?php

namespace SysBackenBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AuditRecordController extends BaseAdminController
{


    public function createauditrecordListQueryBuilder($auditrecord)
    {


           $em = $this->getDoctrine()->getManagerForClass($auditrecord);
           $dql = "SELECT c FROM SysBackenBundle:Audit c WHERE c.isActive = false";
           $consulta = $em->createQuery($dql);
           return $consulta;

//        return parent::createListQueryBuilder($crew, 'DESC');
    }





}
