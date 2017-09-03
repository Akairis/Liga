<?php

namespace AdminBundle\Controller;

use AdminBundle\AdminBundle;
use AdminBundle\Entity\Round;
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
     * @Route("/add/{number}", name="schedule_index")
     */
    public function addMatchAction(Request $request, $number)
    {
        // budujemy formularz
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
            // pobieramy dane z formularza
            $data = $form->getData();
//            print_r($data['team1']->getId());
//            print_r($data['team2']->getId());

            // wrzucamy dane do obiektu
            $round = new Round();
            $round->setHost($data['team1']);
            $round->setVisitor($data['team2']);
            $round->setDate($data['date']);
            $round->setRound($number);

            // zapisujemy do bazy
            $em = $this->getDoctrine()->getManager();
            $em->persist($round);
            $em->flush();

        }


        $emRound = $this->getDoctrine()->getManager();
        $round = $emRound->getRepository('AdminBundle:Round')->findBy(
            array('round' => $number)
        );

        return $this->render('AdminBundle:schedule:schedule.html.twig', array(
            'form' => $form->createView(), 'round' => $round, 'roundNumber' => $number
        ));
    }

    /**
     * @Route("/show", name="schedule_show")
     */
    public function generateAllLinkRoundAction()
    {
        // tutaj wczytujemy liczbe kolejek z bazy danych
        $em = $this->getDoctrine()->getManager();
        $setting = $em->getRepository('AdminBundle:Setting')->findOneById(1);

        $roundNumber = $setting->getRoundNumber();

        return $this->render('AdminBundle:schedule:generateRound.html.twig', array(
            'cos' => 'cos', 'roundNumber' => $roundNumber,
        ));
    }

    /**
     * @Route("/show/{roundNumber}", name="show_round_by_number")
     */
    public function showRoundAction($roundNumber)
    {
        $em = $this->getDoctrine()->getManager();
        $round = $em->getRepository('AdminBundle:Round')->findBy(
            array('round' => $roundNumber)
        );

        return $this->render('AdminBundle:schedule:show.html.twig', array(
            'round' => $round, 'roundNumber' => $roundNumber
        ));
    }


}
