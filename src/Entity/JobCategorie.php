<?php

namespace App\Entity;

use App\Repository\JobCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobCategorieRepository::class)]
class JobCategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'jobCategorie', targetEntity: OffreEmploi::class)]
    private Collection $offreEmplois;

    #[ORM\OneToMany(mappedBy: 'jobCategorie', targetEntity: Candidat::class)]
    private Collection $Candidat;

    public function __construct()
    {
        $this->offreEmplois = new ArrayCollection();
        $this->Candidat = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, OffreEmploi>
     */
    public function getOffreEmplois(): Collection
    {
        return $this->offreEmplois;
    }

    public function addOffreEmploi(OffreEmploi $offreEmploi): static
    {
        if (!$this->offreEmplois->contains($offreEmploi)) {
            $this->offreEmplois->add($offreEmploi);
            $offreEmploi->setJobCategorie($this);
        }

        return $this;
    }

    public function removeOffreEmploi(OffreEmploi $offreEmploi): static
    {
        if ($this->offreEmplois->removeElement($offreEmploi)) {
            // set the owning side to null (unless already changed)
            if ($offreEmploi->getJobCategorie() === $this) {
                $offreEmploi->setJobCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Candidat>
     */
    public function getCandidat(): Collection
    {
        return $this->Candidat;
    }

    public function addCandidat(Candidat $candidat): static
    {
        if (!$this->Candidat->contains($candidat)) {
            $this->Candidat->add($candidat);
            $candidat->setJobCategorie($this);
        }

        return $this;
    }

    public function removeCandidat(Candidat $candidat): static
    {
        if ($this->Candidat->removeElement($candidat)) {
            // set the owning side to null (unless already changed)
            if ($candidat->getJobCategorie() === $this) {
                $candidat->setJobCategorie(null);
            }
        }

        return $this;
    }
}
