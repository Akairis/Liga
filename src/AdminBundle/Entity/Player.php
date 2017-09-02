<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Player
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\PlayerRepository")
 */
class Player
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
     * @var string
     *
     * @ORM\Column(name="player_name", type="string", length=255)
     */
    private $playerName;

    /**
     * @var string
     *
     * @ORM\Column(name="player_surname", type="string", length=255)
     */
    private $playerSurname;

    /**
     * @var int
     *
     * @ORM\Column(name="shoot_goal", type="integer")
     */
    private $shootGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="yellow_card", type="integer")
     */
    private $yellowCard;

    /**
     * @var int
     *
     * @ORM\Column(name="red_card", type="integer")
     */
    private $redCard;

    /**
     * @var int
     *
     * @ORM\Column(name="time_game", type="integer")
     */
    private $timeGame;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text")
     */
    private $info;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="players")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    private $team;

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
     * Set playerName
     *
     * @param string $playerName
     * @return Player
     */
    public function setPlayerName($playerName)
    {
        $this->playerName = $playerName;

        return $this;
    }

    /**
     * Get playerName
     *
     * @return string 
     */
    public function getPlayerName()
    {
        return $this->playerName;
    }

    /**
     * Set playerSurname
     *
     * @param string $playerSurname
     * @return Player
     */
    public function setPlayerSurname($playerSurname)
    {
        $this->playerSurname = $playerSurname;

        return $this;
    }

    /**
     * Get playerSurname
     *
     * @return string 
     */
    public function getPlayerSurname()
    {
        return $this->playerSurname;
    }

    /**
     * Set shootGoal
     *
     * @param integer $shootGoal
     * @return Player
     */
    public function setShootGoal($shootGoal)
    {
        $this->shootGoal = $shootGoal;

        return $this;
    }

    /**
     * Get shootGoal
     *
     * @return integer 
     */
    public function getShootGoal()
    {
        return $this->shootGoal;
    }

    /**
     * Set yellowCard
     *
     * @param integer $yellowCard
     * @return Player
     */
    public function setYellowCard($yellowCard)
    {
        $this->yellowCard = $yellowCard;

        return $this;
    }

    /**
     * Get yellowCard
     *
     * @return integer 
     */
    public function getYellowCard()
    {
        return $this->yellowCard;
    }

    /**
     * Set redCard
     *
     * @param integer $redCard
     * @return Player
     */
    public function setRedCard($redCard)
    {
        $this->redCard = $redCard;

        return $this;
    }

    /**
     * Get redCard
     *
     * @return integer 
     */
    public function getRedCard()
    {
        return $this->redCard;
    }

    /**
     * Set timeGame
     *
     * @param integer $timeGame
     * @return Player
     */
    public function setTimeGame($timeGame)
    {
        $this->timeGame = $timeGame;

        return $this;
    }

    /**
     * Get timeGame
     *
     * @return integer 
     */
    public function getTimeGame()
    {
        return $this->timeGame;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return Player
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }
}
