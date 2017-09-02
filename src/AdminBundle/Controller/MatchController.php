<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Team;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Security("has_role('ROLE_USER')")
 * @Route("admin/match")
 */
class MatchController extends Controller
{
    /**
     * @Route("/", name="match_index")
     */
    public function indexAction()
    {

        return new Response("Match");
    }

    /**
     * @Route("/add", name="match_add")
     */
    public function addMatchAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('team1', EntityType::class, array(
                'class' => 'AdminBundle:Team',
                'choice_label' => 'teamName',
            ))
            ->add('team2', EntityType::class, array(
                'class' => 'AdminBundle:Team',
                'choice_label' => 'teamName',
            ))
            ->add('save', 'submit', ['label' => 'Dodaj wynik!'])
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted()){
            $data = $form->getData();

            print_r($data['team1']->getId());
            die;

        }


        return $this->render('AdminBundle:match:match.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
