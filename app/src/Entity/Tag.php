<?php
/**
 * Tag entity.
 */

namespace App\Entity;

use DateTimeInterface;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 *  @ORM\Table(name="tags")
 *
 * @UniqueEntity(fields={"title"})
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     * * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="32",
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="create")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity=Question::class, mappedBy="tags")
     */
    private $questions;

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        $this->questions = new ArrayCollection();
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
     * Getter for Title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Setter for Title.
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    /**
     * Getter for Data
     * .
     * @return DateTimeInterface|null
     *
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }
    /**
     * Setter for Data.
     *
     * @param DateTimeInterface $date
     *
     * @return void
     */
    public function setDate(DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * Getter for Notes.
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    /**
     * Add Question
     *
     * @param Question $question
     *
     * @return void
     */
    public function addQuestion(Question $question): void
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->addTag($this);
        }
    }
    /**
     * Remove Question.
     *
     * @param Question $question
     *
     * @return void
     */
    public function removeQuestion(Question $question): void
    {
        if ($this->questions->removeElement($question)) {
            $question->removeTag($this);
        }
    }
}
