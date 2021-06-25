<?php
/**
 * Answer entity.
 */
namespace App\Entity;

use App\Repository\AnswerRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 * @ORM\Table(name="answers")
 *
 * @UniqueEntity(fields={"title"})
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="255",)
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $indication;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="answers")
     *
     *
     */
    private $questions;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="255",
     *     )
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $nick;

    /**
     * Getter for Id.
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
     * Getter for Content.
     *
     * @return bool|null
     */
    public function getIndication(): ?bool
    {
        return $this->indication;
    }
    /**
     * Setter for Indication
     *
     * @param bool $indication
     * @return void
     */
    public function setIndication(bool $indication): void
    {
        $this->indication = $indication;

    }
    /**
     * Getter for Question.
     *
     */
    public function getQuestion(): ?Question
    {
        return $this->questions;
    }
    /**
     * Setter for Category.
     *
     * @param Question|null $question
     * @return void
     */
    public function setQuestion(?Question $question): void
    {
        $this->questions = $question;

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
    /**
     * Getter for Nick
     *
     * @return Nick|null
     */
    public function getNick(): ?string
    {
        return $this->nick;
    }
    /**
     * Setter for Nick
     *
     * @param Nick|null $nick
     */
    public function setNick(string $nick): void
    {
        $this->nick = $nick;

    }

}
