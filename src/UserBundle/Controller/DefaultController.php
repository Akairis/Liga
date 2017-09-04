<?php

namespace UserBundle\Controller;

use AdminBundle\Entity\Round;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return new Response("Strona dla odwiedzajacych");
    }
}
