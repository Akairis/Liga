<?php

namespace UserBundle\Controller;

use AdminBundle\Entity\Round;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home_page")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('AdminBundle:News')->findAll();
        $schedule = $em->getRepository('AdminBundle:Team')->findAll();

        // Weather
        

        return $this->render('UserBundle:news:main_news.html.twig', array(
            'news' => $news, 'schedule' => $schedule,
        ));
    }

}
