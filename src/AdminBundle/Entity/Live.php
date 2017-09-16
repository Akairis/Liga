<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Live
 *
 * @ORM\Table(name="live")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\LiveRepository")
 */
class Live
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
     * @ORM\Column(name="match_name", type="string", length=255)
     */
    private $matchName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

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
     * Set matchName
     *
     * @param string $matchName
     * @return Live
     */
    public function setMatchName($matchName)
    {
        $this->matchName = $matchName;

        return $this;
    }

    /**
     * Get matchName
     *
     * @return string 
     */
    public function getMatchName()
    {
        return $this->matchName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Live
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Live
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
}
