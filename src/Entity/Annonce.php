<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTimeImmutable;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
#[Vich\Uploadable]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column]
    private ?int $nombreCouchage = null;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'annonces',cascade:['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Address $address = null;

    #[ORM\ManyToMany(targetEntity: Equipement::class, inversedBy: 'annonces')]
    private Collection $equipement;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeLogement $typeLogement = null;

    #[ORM\Column(type:"string",length: 255, nullable: true)]
    private ?string $fileName = null;

    #[Vich\UploadableField(mapping: "annonces", fileNameProperty: "filename")]
    private ? File $imageFile=null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updateAt = null;

    //Récupération de toute les propriétés de l'entité
    public function getImageFile() : ?File
     {
        return $this->imageFile;
     }

     public function setImageFile(?File $imageFile): Annonce
     {
        $this->imageFile = $imageFile;
        if( $imageFile !== null){
            $this->updateAt = new \DateTime("now");
        }
        return $this;
     }

    public function __construct()
    {
        $this->equipement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNombreCouchage(): ?int
    {
        return $this->nombreCouchage;
    }

    public function setNombreCouchage(int $nombreCouchage): static
    {
        $this->nombreCouchage = $nombreCouchage;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipement(): Collection
    {
        return $this->equipement;
    }

    public function addEquipement(Equipement $equipement): static
    {
        if (!$this->equipement->contains($equipement)) {
            $this->equipement->add($equipement);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): static
    {
        $this->equipement->removeElement($equipement);

        return $this;
    }

    public function getTypeLogement(): ?TypeLogement
    {
        return $this->typeLogement;
    }

    public function setTypeLogement(?TypeLogement $typeLogement): static
    {
        $this->typeLogement = $typeLogement;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): Annonce
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeInterface $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }
}
