<?php

namespace AdminBundle\Controller;

use AdminBundle\AdminBundle;
use AdminBundle\Entity\Live;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use JMS\SerializerBundle\JMSSerializerBundle;

/**
 * Class LiveController
 * @Route("admin/live")
 */
class LiveController extends Controller
{


    /**
     * @Route("/", name="admin_live")
     */
    public function addLiveAction(Request $request)
    {
        if ($this->getRequest()->isMethod('POST')) {
            $desc = $request->get('desc');

            $live = new Live();
            $live->setDescription($desc);
            $live->setMatchName('Manchester - Bazylea');
            $live->setDate(new \DateTime("now"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($live);
            $em->flush();
        }

        return $this->render('AdminBundle:live:add.html.twig');
    }
}
