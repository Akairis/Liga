<?php

namespace UserBundle\Controller;

use AdminBundle\AdminBundle;
use AdminBundle\Entity\Live;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use JMS\SerializerBundle\JMSSerializerBundle;

class LiveController extends Controller
{

    /**
     * @Route("/live-api", name="live")
     * @Method("GET")
     */
    public function liveAction()
    {
        $em = $this->getDoctrine()->getManager();
        $live = $em->getRepository('AdminBundle:Live')->findAll();

        $serializer = $this->get('jms_serializer');

        $json = $serializer->serialize($live, 'json');

        return new Response($json);
    }

    /**
     * @Route("/live", name="live_show")
     */
    public function liveShowAction()
    {
        return $this->render('UserBundle:Default:indexFull.html.twig');
    }
}
