<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\OneToOne(mappedBy: 'passeportFichier', cascade: ['persist', 'remove'])]
    private ?Candidat $candidat = null;

    #[ORM\OneToOne(mappedBy: 'cv', cascade: ['persist', 'remove'])]
    private ?Candidat $cv = null;

    #[ORM\OneToOne(mappedBy: 'photoProfil', cascade: ['persist', 'remove'])]
    private ?Candidat $photoProfil = null;

    #[ORM\OneToOne(mappedBy: 'passeportFichier', cascade: ['persist', 'remove'])]
    private ?Candidat $passeportFichier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function getCv(): ?Candidat
    {
        return $this->cv;
    }

    public function setCv(Candidat $cv): static
    {
        // set the owning side of the relation if necessary
        if ($cv->getCv() !== $this) {
            $cv->setCv($this);
        }

        $this->cv = $cv;

        return $this;
    }

    public function getPhotoProfil(): ?Candidat
    {
        return $this->photoProfil;
    }

    public function setPhotoProfil(Candidat $photoProfil): static
    {
        // set the owning side of the relation if necessary
        if ($photoProfil->getPhotoProfil() !== $this) {
            $photoProfil->setPhotoProfil($this);
        }

        $this->photoProfil = $photoProfil;

        return $this;
    }

    public function getPasseportFichier(): ?Candidat
    {
        return $this->passeportFichier;
    }

    public function setPasseportFichier(Candidat $passeportFichier): static
    {
        // set the owning side of the relation if necessary
        if ($passeportFichier->getPasseportFichier() !== $this) {
            $passeportFichier->setPasseportFichier($this);
        }

        $this->passeportFichier = $passeportFichier;

        return $this;
    }
}
