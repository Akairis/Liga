<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class WeatherController extends Controller
{

    public function weatherAction()
    {

        return $this->render('UserBundle:news:main_news.html.twig', array('weather' => 'pogoda'));
    }
}
