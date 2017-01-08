<?php

namespace TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TravelBundle\Entity\Room;
use TravelBundle\Entity\Hotel;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$all_hotel = $em->getRepository('TravelBundle:Hotel')->findAll();
    	$all_room = $em->getRepository('TravelBundle:Room')->findby(array('book' => 0));
    	$capacity=0;

        return $this->render('TravelBundle:Default:index.html.twig', array(
        	'all_hotel' => $all_hotel,
        	'all_room' => $all_room,
        	'capacity' => $capacity
        ));
    }

    public function getHotelAjaxAction(Request $request)
    {
    	 $tab=[];

    	// $tab['name'] = $request->get('name');
    	// $tab['address'] = $request->get('address');
    	// $tab['zipcode'] = $request->get('zipcode');
    	// $tab['city'] = $request->get('city');
    	// $tab['capacity'] = $request->get('capacity');
    	// $tab['stars'] = $request->get('stars');
    	$capacity = 0;
    	if ($_REQUEST['capacity'] != "")
    	 	$capacity = $_REQUEST['capacity'];

    	$em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->add('select', 'h')
        	->add('from', 'TravelBundle:Hotel h')
        ;

        foreach ($_REQUEST as $k => $v) {
        	if (!empty($v) || $v != "")
        	{
        		if ($k == "zipcode") {
        			$qb = $qb->andwhere("h.".$k." LIKE :".$k);
        			$qb = $qb->setParameter($k, $v.'%');
        		}
        		elseif ($k == "name" or $k == "address" or $k == "city" or $k == "stars")
        		{
        			$qb = $qb->andwhere("h.".$k." LIKE :".$k);
        			$qb = $qb->setParameter($k, '%'.$v.'%');
        		}
        	}   
        }
        
        $all_hotel = $qb->getQuery()->getResult();

        foreach ($all_hotel as $v) {
        	$tab[]=$v->getId();
        }

        $all_room = $em->getRepository('TravelBundle:Room')->findby(array('book' => 0));
        
        return $this->container->get('templating')->renderResponse('TravelBundle:Default:_list.html.twig', array(
            'all_hotel' => $all_hotel,
            'all_room' => $all_room,
            'capacity' => $capacity
        ));
    }
}
