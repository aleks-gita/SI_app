<?php
/**
 * Category entity.
 */

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Category.
 *
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ORM\Table(name="categories")
 *
 *  @UniqueEntity(fields={"name"})
 */
class Category
{
    /**
     * Primary key.
     *
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Name.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=64,
     * )
     *  @Assert\Type(type="string")
     *  @Assert\NotBlank
     *     @Assert\Length(
     *     min="3",
     *     max="64",
     * )
     */
    private $name;

    /**
     *
     *
     * @ORM\OneToMany(
     *  targetEntity = Question::class,
     *  mappedBy="category",
     *  fetch="EXTRA_LAZY",
     *  )
     *
     */
    private Collection $questions;

    /**
     * Code.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=64
     * )
     *  @Assert\Type(type="string")
     *  @Assert\Length(
     *     min="1",
     *     max="64",
     *  )
     *
     *
     * @Gedmo\Slug(fields={"name"})
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * Getter for Id.
     *
     * @return int|null Result
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for Name.
     *
     * @return string|null Name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Setter for Name.
     *
     * @param string $name name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    /**
     * Getter for Question.
     *
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }/**
     * Add Question.
     * @param Question $question
     *
     * @return void
     */
    public function addQuestion(Question $question): void
    {
        if (!$this->questions->contains($this)) {
            $this->questions[] = $question;
            $question->setCategory($this);
        }
    }
    /**
     * Remove question.
     *
     * @param Question $question
     *
     * @return void
     */
    public function removeQuestion(Question $question): void
    {
        if ($this->questions->contains($question)) {
            $this->questions->removeElement($question);
            if ($question->getCategory() === $this) {
                $question->setCategory(null);
            }
        }
    }
    /**
     * Getter for Code.
     *
     * @return string|null Code
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Setter for Code.
     *
     * @param string $code code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Getter for Author.
     *
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }
    /**
     * Setter for Author.
     *
     * @param User|null $author
     */
    public function setAuthor(?User $author): void
    {
        $this->author = $author;
    }
}
