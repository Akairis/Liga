<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\TeamRepository")
 */
class Team
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
     * @ORM\Column(name="team_name", type="string", length=255)
     */
    private $teamName;

    /**
     * @var int
     *
     * @ORM\Column(name="point", type="integer")
     */
    private $point;

    /**
     * @var int
     *
     * @ORM\Column(name="shoot_goal", type="integer")
     */
    private $shootGoal;

    /**
     * @var int
     *
     * @ORM\Column(name="lose_goal", type="integer")
     */
    private $loseGoal;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File()
     */
    private $img;

    /**
     * @var bool
     *
     * @ORM\Column(name="favourite", type="boolean")
     */
    private $favourite;

    /**
     * @ORM\OneToMany(targetEntity="Player", mappedBy="team")
     *
     */
    private $players;

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
     * Set teamName
     *
     * @param string $teamName
     * @return Team
     */
    public function setTeamName($teamName)
    {
        $this->teamName = $teamName;

        return $this;
    }

    /**
     * Get teamName
     *
     * @return string 
     */
    public function getTeamName()
    {
        return $this->teamName;
    }

    /**
     * Set point
     *
     * @param integer $point
     * @return Team
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return integer 
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set shootGoal
     *
     * @param integer $shootGoal
     * @return Team
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
     * Set loseGoal
     *
     * @param integer $loseGoal
     * @return Team
     */
    public function setLoseGoal($loseGoal)
    {
        $this->loseGoal = $loseGoal;

        return $this;
    }

    /**
     * Get loseGoal
     *
     * @return integer 
     */
    public function getLoseGoal()
    {
        return $this->loseGoal;
    }

    /**
     * Set img
     *
     * @param string $img
     * @return Team
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set favourite
     *
     * @param boolean $favourite
     * @return Team
     */
    public function setFavourite($favourite)
    {
        $this->favourite = $favourite;

        return $this;
    }

    /**
     * Get favourite
     *
     * @return boolean 
     */
    public function getFavourite()
    {
        return $this->favourite;
    }
}
