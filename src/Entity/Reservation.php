<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column]
    private ?string $fullName = null;

    #[ORM\Column(nullable: false)]
    private ?int $nbPeople = null;

    #[ORM\Column]
    private ?int $nbChildren = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToMany(targetEntity: Allergy::class)]
    private Collection $allergies;

    


    #[ORM\ManyToOne]
    private ?User $user = null;

     #[ORM\ManyToOne]
     #[ORM\JoinColumn(nullable: true)]
    private ?LunchHours $lunchHours = null;

    #[ORM\ManyToOne]
     #[ORM\JoinColumn(nullable: true)]
    private ?DinnerHours $dinnerHours = null;

  
    
    public function __construct()
    {
        $this->allergies = new ArrayCollection();
        $this->date = new \DateTime();
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPeople(): ?int
    {
        return $this->nbPeople;
    }

    public function setNbPeople(int $nbPeople): self
    {
        $this->nbPeople = $nbPeople;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;


        return $this;
    }

    /**
     * @return Collection<int, Allergy>
     */
    public function getAllergies(): Collection
    {
        return $this->allergies;
    }

    public function addAllergy(Allergy $allergy): self
    {
        if (!$this->allergies->contains($allergy)) {
            $this->allergies->add($allergy);
        }

        return $this;
    }

    public function removeAllergy(Allergy $allergy): self
    {
        $this->allergies->removeElement($allergy);

        return $this;
    }



    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

   
    /**
     * Get the value of fullName
     */ 
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set the value of fullName
     *
     * @return  self
     */ 
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get the value of nbChildren
     */ 
    public function getNbChildren()
    {
        return $this->nbChildren;
    }

    /**
     * Set the value of nbChildren
     *
     * @return  self
     */ 
    public function setNbChildren($nbChildren)
    {
        $this->nbChildren = $nbChildren;

        return $this;
    }

   

    
    public function __toString()
    {
        return (string) $this->fullName;
    }

     /**
     * Get the value of lunchHours
     */ 
    public function getLunchHours()
    {
        return $this->lunchHours;
    }

    /**
     * Set the value of lunchHours
     *
     * @return  self
     */ 
    public function setLunchHours($lunchHours)
    {
        $this->lunchHours = $lunchHours;

        return $this;
    }

     /**
     * Get the value of dinnerHours
     */ 
    public function getDinnerHours()
    {
        return $this->dinnerHours;
    }

    /**
     * Set the value of dinnerHours
     *
     * @return  self
     */ 
    public function setDinnerHours($dinnerHours)
    {
        $this->dinnerHours = $dinnerHours;

        return $this;
    }
    
}
