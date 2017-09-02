<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Team;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Security("has_role('ROLE_USER')")
 * @Route("admin/schedule")
 */
class ScheduleController extends Controller
{
    /**
     * @Route("/add", name="schedule_index")
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
            ->add('date', 'datetime')
            ->add('save', 'submit', ['label' => 'Dodaj mecz!'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            print_r($data['team1']->getId());
            print_r($data['team2']->getId());
            die;

        }

        return $this->render('AdminBundle:schedule:schedule.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
