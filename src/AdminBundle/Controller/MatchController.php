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

        return $this->render('AdminBundle:match:addmatch.html.twig', array(
            'round' => $round, 'roundNumber' => $roundNumber
        ));
    }

    public function updateTableAction($team, $newPoint, $newGoalLost, $newGoalShot)
    {
        $em = $this->getDoctrine()->getManager();
        $teamHost = $em->getRepository('AdminBundle:Team')->find($team);
        $teamHost->setPoint($teamHost->getPoint() + $newPoint);
        $teamHost->setLoseGoal($teamHost->getLoseGoal() + $newGoalLost);
        $teamHost->setShootGoal($teamHost->getShootGoal() + $newGoalShot);

        $em->persist($teamHost);
        $em->flush();

        return true;
    }

    /**
     * @Route("/score")
     */
    public function addScore()
    {
        $em = $this->getDoctrine()->getManager();
        $rounds = $em->getRepository('AdminBundle:Round')->findAll();

        // zerujemy
        $newHostPoint = 0;
        $newVisitorPoint = 0;
        $newHostGoal = 0;
        $newVisitorGoal = 0;

        foreach($rounds as $key => $value){
            $id = $value->getId();
            $host = $value->getHost();
            $visitor = $value->getVisitor();
            $hostGoal = $value->getHostGoal();
            $visitorGoal = $value->getVisitorGoal();


            if($hostGoal > $visitorGoal){
                // Gospodarze wygrywają +3pkt
                $newHostGoal = $newHostGoal + 3;
                //$this->updateTableAction($host, 3, $visitorGoal, $hostGoal);

            }else if($visitorGoal > $hostGoal){
                // Goście wygrywają +3pkt
                //$this->updateTableAction($visitor, 3, $hostGoal, $visitorGoal);

            }else if($visitorGoal == $hostGoal){
                // Remis +1 pkt dla kazdego
                //$this->updateTableAction($host, 1, $visitorGoal, $hostGoal);
                //$this->updateTableAction($visitor, 1, $hostGoal, $visitorGoal);
            }
        }

        return new Response("Update zrobiony!");

    }
}

