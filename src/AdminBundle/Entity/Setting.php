<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Setting
 *
 * @ORM\Table(name="setting")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\SettingRepository")
 */
class Setting
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
     * @var int
     *
     * @ORM\Column(name="your_team", type="integer")
     */
    private $yourTeam;

    /**
     * @var int
     *
     * @ORM\Column(name="round_number", type="integer")
     */
    private $roundNumber;


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
     * Set yourTeam
     *
     * @param integer $yourTeam
     * @return Setting
     */
    public function setYourTeam($yourTeam)
    {
        $this->yourTeam = $yourTeam;

        return $this;
    }

    /**
     * Get yourTeam
     *
     * @return integer 
     */
    public function getYourTeam()
    {
        return $this->yourTeam;
    }

    /**
     * Set roundNumber
     *
     * @param integer $roundNumber
     * @return Setting
     */
    public function setRoundNumber($roundNumber)
    {
        $this->roundNumber = $roundNumber;

        return $this;
    }

    /**
     * Get roundNumber
     *
     * @return integer 
     */
    public function getRoundNumber()
    {
        return $this->roundNumber;
    }
}
