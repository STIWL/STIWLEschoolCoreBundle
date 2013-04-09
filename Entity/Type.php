<?php

namespace Esolving\Eschool\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Esolving\Eschool\CoreBundle\Entity\Type
 *
 * @ORM\Table(name="types")
 * @ORM\Entity(repositoryClass="Esolving\Eschool\CoreBundle\Repository\TypeRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Type {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $category
     *
     * @ORM\Column(name="category", type="string", length=45)
     */
    protected $category;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=45)
     */
    protected $name;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="boolean", length=1, nullable=true)
     */
    protected $status;

    /**
     * @var integer $languages
     *
     * @ORM\OneToMany(targetEntity="TypeLanguage", mappedBy="type", cascade={"all"}, orphanRemoval=true);
     */
    protected $languages;
    
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
     * Add languages
     *
     * @param Esolving\Eschool\CoreBundle\Entity\TypeLanguage $typeLanguages
     * @return Type
     */
    public function addLanguage(\Esolving\Eschool\CoreBundle\Entity\TypeLanguage $typeLanguages) {
        $this->languages[] = $typeLanguages;
        $typeLanguages->setType($this);
        return $this;
    }
    
    public function __toString() {
        return '';
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

    /**
     * This generate a row to the languages
     *
     * @param Esolving\Eschool\CoreBundle\Entity\TypeLanguage $typeLanguages
     * @return Type
     */
    public function addLanguages(\Esolving\Eschool\CoreBundle\Entity\TypeLanguage $typeLanguages) {
        $this->languages[] = $typeLanguages;
        return $this;
    }
    
    public function __construct() {
        $this->languages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->status = true;
        $this->createdAt = new \DateTime();
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
     * Set category
     *
     * @param string $category
     * @return Type
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Type
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
     * Set status
     *
     * @param boolean $status
     * @return Type
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Type
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
     * @return Type
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
     * @return Type
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
     * Remove languages
     *
     * @param Esolving\Eschool\CoreBundle\Entity\TypeLanguage $languages
     */
    public function removeLanguage(\Esolving\Eschool\CoreBundle\Entity\TypeLanguage $languages)
    {
        $this->languages->removeElement($languages);
    }

    /**
     * Get languages
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLanguages()
    {
        return $this->languages;
    }
}