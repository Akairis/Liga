<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Round;
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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $setting = $em->getRepository('AdminBundle:Setting')->findOneById(1);

        $roundNumber = $setting->getRoundNumber();

        return $this->render('AdminBundle:match:generateRound.html.twig', array(
            'roundNumber' => $roundNumber,
        ));
    }

    /**
     * @Route("/add/{roundNumber}", name="add_match")
     */
    public function addMatchByRoundAction(Request $request, $roundNumber)
    {
        $em = $this->getDoctrine()->getManager();
        $round = $em->getRepository('AdminBundle:Round')->findBy(
            array('round' => $roundNumber)
        );

        // dane pobrane z formularza
        $matchId = $request->get('matchId');
        $host = $request->get('host');
        $visitor = $request->get('visitor');
        $hostGoal = $request->get('hostGoal');
        $visitorGoal = $request->get('visitorGoal');

        // jezeli formularz zostal wyslany robimy update tabeli
        if ($this->getRequest()->isMethod('POST')){
            $newMatch = $em->getRepository('AdminBundle:Round')->find($matchId);
            $newMatch->setHostGoal($hostGoal);
            $newMatch->setVisitorGoal($visitorGoal);

            $em->persist($newMatch);
            $em->flush();
        }


        // Zapisujemy do bazy danych

        // Przydzielamy punkty oraz bramki do encji ROUND
        if($hostGoal > $visitorGoal){
            echo "GOSPODARZE WYGRYWAJA <br>";
            echo "3 pkt dla gospodarzy o ID $host";

        }else if($visitorGoal > $hostGoal){
            echo "GOŚCIE WYGRYWAJA <br>";
            echo "3 pkt dla gości o ID $visitor";
        }else if($hostGoal == $visitorGoal){
            echo "REMIS, po 1 pkt dla kazdego!";
        }

        return $this->render('AdminBundle:match:addmatch.html.twig', array(
            'round' => $round, 'roundNumber' => $roundNumber
        ));
    }
}

