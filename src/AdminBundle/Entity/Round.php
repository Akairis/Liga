<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Round
 *
 * @ORM\Table(name="round")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\RoundRepository")
 */
class Round
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="rounds")
     * @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     */
    private $host;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="rounds")
     * @ORM\JoinColumn(name="visitor_id", referencedColumnName="id")
     */
    private $visitor;

    /**
     * @var int
     *
     * @ORM\Column(name="host_goal", type="integer")
     */
    private $hostGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="visitor_goal", type="integer")
     */
    private $visitorGoal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="round", type="integer")
     */
    private $round;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set host
     *
     * @param integer $host
     * @return Round
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return integer 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set visitor
     *
     * @param integer $visitor
     * @return Round
     */
    public function setVisitor($visitor)
    {
        $this->visitor = $visitor;

        return $this;
    }

    /**
     * Get visitor
     *
     * @return integer 
     */
    public function getVisitor()
    {
        return $this->visitor;
    }

    /**
     * Set hostGoal
     *
     * @param integer $hostGoal
     * @return Round
     */
    public function setHostGoal($hostGoal)
    {
        $this->hostGoal = $hostGoal;

        return $this;
    }

    /**
     * Get hostGoal
     *
     * @return integer 
     */
    public function getHostGoal()
    {
        return $this->hostGoal;
    }

    /**
     * Set visitorGoal
     *
     * @param integer $visitorGoal
     * @return Round
     */
    public function setVisitorGoal($visitorGoal)
    {
        $this->visitorGoal = $visitorGoal;

        return $this;
    }

    /**
     * Get visitorGoal
     *
     * @return integer 
     */
    public function getVisitorGoal()
    {
        return $this->visitorGoal;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Round
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set round
     *
     * @param integer $round
     * @return Round
     */
    public function setRound($round)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return integer 
     */
    public function getRound()
    {
        return $this->round;
    }
}
