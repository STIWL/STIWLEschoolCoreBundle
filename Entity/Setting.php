<?php

namespace Esolving\Eschool\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Esolving\Eschool\CoreBundle\Entity\Setting
 *
 * @ORM\Table(name="settings")
 * @ORM\Entity(repositoryClass="Esolving\Eschool\CoreBundle\Repository\SettingRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Setting {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var type 
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var integer $settingType
     *
     * @ORM\ManyToOne(targetEntity="Type")
     */
    private $settingType;
    
    // Column(name="value", type="decimal", precision=9, scale=2, nullable=true)
    /**
     * @var string $value
     *
     * @ORM\Column(name="value", type="string", length=100, nullable=true)
     */
    private $value;
    
    /**
     * @var string $value
     *
     * @ORM\Column(name="domType", type="string", length=20, nullable=false)
     */
    private $domType;
    
    /**
     *
     * @var date
     * @ORM\Column(name="createdAt", type="datetime")
     */
    protected $createdAt;
    
    /**
     *
     * @var date
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    protected $updatedAt;
    
    /**
     *
     * @var date
     * @ORM\Column(name="disabledAt", type="datetime", nullable=true)
     */
    protected $disabledAt;

    /**
     * @var boolean $status
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    public function __construct() {
        $this->status = true;
        $this->createdAt = new \DateTime();
    }
    
    /**
     * @ORM\PreUpdate()
     */
    public function preUpdatedAt() {
        $this->updatedAt = new \DateTime();
        if (!$this->getStatus()) {
            $this->disabledAt = new \DateTime();
        } else {
            $this->disabledAt = null;
        }
    }
    
    public function __toString() {
        return $this->getName();
    }

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
     * Set name
     *
     * @param string $name
     * @return Setting
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Setting
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set domType
     *
     * @param string $domType
     * @return Setting
     */
    public function setDomType($domType)
    {
        $this->domType = $domType;
    
        return $this;
    }

    /**
     * Get domType
     *
     * @return string 
     */
    public function getDomType()
    {
        return $this->domType;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Setting
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Setting
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set disabledAt
     *
     * @param \DateTime $disabledAt
     * @return Setting
     */
    public function setDisabledAt($disabledAt)
    {
        $this->disabledAt = $disabledAt;
    
        return $this;
    }

    /**
     * Get disabledAt
     *
     * @return \DateTime 
     */
    public function getDisabledAt()
    {
        return $this->disabledAt;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Setting
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set settingType
     *
     * @param Esolving\Eschool\CoreBundle\Entity\Type $settingType
     * @return Setting
     */
    public function setSettingType(\Esolving\Eschool\CoreBundle\Entity\Type $settingType = null)
    {
        $this->settingType = $settingType;
    
        return $this;
    }

    /**
     * Get settingType
     *
     * @return Esolving\Eschool\CoreBundle\Entity\Type 
     */
    public function getSettingType()
    {
        return $this->settingType;
    }
}