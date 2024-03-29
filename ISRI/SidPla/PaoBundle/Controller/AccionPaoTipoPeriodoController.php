<?php

namespace ISRI\SidPla\PaoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ISRI\SidPla\PaoBundle\EntityDao\TipoPeriodoDao;
use ISRI\SidPla\PaoBundle\Entity\TipoPeriodo;

class AccionPaoTipoPeriodoController extends Controller {

    public function mantenimientoTipoPeriodoAction() {

        $opciones = $this->getRequest()->getSession()->get('opciones');
        
        return $this->render('ISRISidPlaPaoBundle:TipoPeriodoPao:manttTipoPeriodo.html.twig'
                        , array('opciones' => $opciones));
        
    }

    public function consultarTipoPeriodoJSONAction() {

        $tipoPeriodoDao=new TipoPeriodoDao($this->getDoctrine());
        $tipoPeriodo =$tipoPeriodoDao->getTipoPeriodo();
        

        $numfilas = count($tipoPeriodo);

        $aux = new TipoPeriodo();
        $i = 0;

        foreach ($tipoPeriodo as $aux) {
            $rows[$i]['id'] = $aux->getIdTipPer();
            $rows[$i]['cell'] = array($aux->getIdTipPer(),
                $aux->getNomTipPer(),
                $aux->getActivoTipPer(),
                $aux->getDescTipPer()
            );
            if($aux->getActivoTipPer())
                $rows[$i]['cell'][2]='SI';
            else
                $rows[$i]['cell'][2]='NO';
            $i++;
        }

        $datos = json_encode($rows);


        $jsonresponse = '{
               "page":"1",
               "total":"1",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';


        $response = new Response($jsonresponse);
        return $response;
    }
    public function manttTipoPeriodoAction() {
        $request = $this->getRequest();
        
        $codTipoPer=$request->get('id');
        $nomTipoPer=$request->get('nombre');
        $descTipoPer=$request->get('descripcion');
        if($request->get('activo')=='SI')
                $actTipoPer=true;
            else
                $actTipoPer=false;
            
        $operacion = $request->get('oper');

        $tipoPeriodoDao=new TipoPeriodoDao($this->getDoctrine());

        switch ($operacion){
            case 'edit':
                $tipoPeriodoDao->editTipoPeriodo($codTipoPer, $nomTipoPer, $descTipoPer, $actTipoPer);
                break;
            case 'del':
               $tipoPeriodoDao->delTipoPeriodo($codTipoPer);
                break;
            case 'add':
                $tipoPeriodoDao->addTipoPeriodo($nomTipoPer, $descTipoPer, $actTipoPer);
                break;
        }

        return new Response("{sc:true,msg:''}");
    }

}

?>
