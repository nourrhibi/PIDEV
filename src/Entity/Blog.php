<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BlogRepository::class)
 */
class Blog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *  @Groups("blog")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="nom is required")
     *  @Groups("blog")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      min =50,
     *      minMessage = "Content must be at least {{ limit }} characters long")
     * @Assert\NotBlank(message="description is required")
     * @Groups("blog")
     */
    private $descri;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\NotBlank(message="date is required")
     *  
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *  @Groups("blog")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="blogs",cascade={"persist"})
     * @Assert\NotBlank(message="nom is required")
     *  @Groups("blog")
     *  
     */
    private $categorie;
     /**
     * @ORM\Column(type="integer", nullable=true)
     *  @Groups("blog")
     */
    private $idcat;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getIdcat(): ?int
    {
        return $this->idcat;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }
    

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function setIdcat(?int $idcat): self
    {
        $this->idcat = $idcat;

        return $this;
    }
    public function getDescri(): ?string
    {
        return $this->descri;
    }

    public function setDescri(?string $descri): self
    {
        $this->descri = $descri;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
