<?php

/**
 * Question entity.
 */
namespace App\Entity;

use App\Repository\QuestionRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Question.
 *
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 * @ORM\Table(name="questions")
 *
 * @UniqueEntity(fields={"title"})
 */

class Question
{
    /**
     * Id.
     *
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Date
     *
     * @var \DateTimeInterface
     * @ORM\Column(type="date")
     * @Assert\Type(type="\DateTimeInterface")

     * @Gedmo\Timestampable(on="create")
     */
    private $date;

    /**
     * Content
     *
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="255",
     * )
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Answer::class, mappedBy="questions", cascade={"remove"})
     * @ORM\JoinTable(name="answers_questions")
     *
     *
     */
    private $answers;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="64",
     * )
     */
    private $title;

    /**
     * Tags.
     *
     * @var array
     *
     * @ORM\ManyToMany(
     *     targetEntity="App\Entity\Tag",
     *     inversedBy="questions",
     * )
     * @ORM\JoinTable(name="questions_tags")
     */
    private $tags;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * Question constructor.
     */
    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    /**
     * Getter for Id.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * Getter for Date.
     *
     * @return DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }
    /**
     * Setter for Deadline.
     *
     * @param DateTimeInterface $date
     * @return void
     */
    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }
    /**
     * Getter for Content.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }
    /**
     * Setter for Content.
     *
     * @param string $content
     * @return void
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
    /**
     * Getter for Category.
     *
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * Setter for Category.
     *
     * @param Category|null $category
     * @return void
     */
    public function setCategory(?Category $category): void
    {
        $this->category = $category;
    }

    /**
     * Add Answer.
     * @param Answer $answer
     */
    public function addAnswer(Answer $answer): void
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setQuestion($this);
        }

    }
    /**
     * Remove Answer
     * @param Answer $answer
     */
    public function removeAnswer(Answer $answer): void
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getQuestion() === $this) {
                $answer->setQuestion(null);
            }
        }
    }
    /**
     * Getter for Title.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Setter for Title.
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;


    }

    /**
     * Getter for Tags.
     *
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }
    /**
     * Add Tag.
     *
     * @param Tag $tag
     * @return void
     */
    public function addTag(Tag $tag): void
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

    }
    /**
     * Remove Tag.
     *
     * @param Tag $tag
     */
    public function removeTag(Tag $tag): void
    {
        $this->tags->removeElement($tag);
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
