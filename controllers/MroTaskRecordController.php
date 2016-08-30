<?php

namespace SysBackenBundle\Controller;

use Doctrine\Common\Cache\ArrayCache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class MroTaskRecordController extends BaseAdminController
{


    public function createmrotaskrecordListQueryBuilder($mrotaskrecord)
    {


           $em = $this->getDoctrine()->getManagerForClass($mrotaskrecord);
           $dql = "SELECT c FROM SysBackenBundle:MroTask c WHERE c.isActive = false";
           $consulta = $em->createQuery($dql);
           return $consulta;

//        return parent::createListQueryBuilder($crew, 'DESC');
    }

    public function exportAction(){

        $id = $this->request->query->get('id');
        $mroTask = $this->em->getRepository('SysBackenBundle:MroTask')->find($id);
//
//        // solicitamos el servicio 'phpexcel' y creamos el objeto vac�o...
//        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
//
//        // ...y le asignamos una serie de propiedades
//        $phpExcelObject->getProperties()
//            ->setCreator("Vabadus")
//            ->setLastModifiedBy("Vabadus")
//            ->setTitle("Ejemplo de exportaci�n")
//            ->setSubject("Ejemplo")
//            ->setDescription("Listado de ejemplo.")
//            ->setKeywords("vabadus exportar excel ejemplo");
//
//        // establecemos como hoja activa la primera, y le asignamos un t�tulo
//        $phpExcelObject->setActiveSheetIndex(0);
//        $phpExcelObject->getActiveSheet()->setTitle('Ejemplo de exportaci�n');
//
//        // escribimos en distintas celdas del documento el t�tulo de los campos que vamos a exportar
//        $phpExcelObject->setActiveSheetIndex(0)
//            ->setCellValue('B2', 'Campo 1')
//            ->setCellValue('C2', 'Campo 2')
//            ->setCellValue('D2', 'Campo 3')
//            ->setCellValue('E2', 'Campo 4');
//
//        // fijamos un ancho a las distintas columnas
//        $phpExcelObject->setActiveSheetIndex(0)
//            ->getColumnDimension('B')
//            ->setWidth(30);
//        $phpExcelObject->setActiveSheetIndex(0)
//            ->getColumnDimension('C')
//            ->setWidth(25);
//        $phpExcelObject->setActiveSheetIndex(0)
//            ->getColumnDimension('D')
//            ->setWidth(15);
//        $phpExcelObject->setActiveSheetIndex(0)
//            ->getColumnDimension('E')
//            ->setWidth(20);
//
//        // recorremos los registros obtenidos de la consulta a base de datos escribi�ndolos en las celdas correspondientes
//        $row = 3;
//        foreach ($mroTask as $item) {
//            $phpExcelObject->setActiveSheetIndex(0)
//                ->setCellValue('B'.$row, $item->getLocation())
//                ->setCellValue('C'.$row, $item->getRemark());
//
//            $row++;
//        }
//
//        // se crea el writer
//        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
//        // se crea el response
//        $response = $this->get('phpexcel')->createStreamedResponse($writer);
//        // y por �ltimo se a�aden las cabeceras
//        $dispositionHeader = $response->headers->makeDisposition(
//            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
//            'ejemplo.xls'
//        );
//        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
//        $response->headers->set('Pragma', 'public');
//        $response->headers->set('Cache-Control', 'maxage=1');
//        $response->headers->set('Content-Disposition', $dispositionHeader);
//
//        return $response;


        // ask the service for a excel object
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()->setCreator("liuggio")
            ->setLastModifiedBy("Giulio De Donato")
            ->setTitle("Office 2005 XLSX Test Document")
            ->setSubject("Office 2005 XLSX Test Document")
            ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
            ->setKeywords("office 2005 openxml php")
            ->setCategory("Test result file");
            $row = 3;

            $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue('B'.$row, $mroTask->getLocation())
                ->setCellValue('C'.$row, $mroTask->getRemark());

            $row++;

//        $phpExcelObject->setActiveSheetIndex(0)
//            ->setCellValue('A1', 'Hello')
//            ->setCellValue('B2', 'world!');
        $phpExcelObject->getActiveSheet()->setTitle('Simple');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $phpExcelObject->setActiveSheetIndex(0);

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel2007');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'PhpExcelFileSample.xlsx'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }





}
