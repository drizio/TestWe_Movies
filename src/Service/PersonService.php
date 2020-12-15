<?php


namespace App\Service;


use App\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;

class PersonService
{
    /** @var EntityManagerInterface */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return array|Person[]
     */
    public function findAllPeople(): array
    {
        return $this->em->getRepository(Person::class)->findAll();
    }

    /**
     * @param Person $person
     */
    public function savePerson(Person $person)
    {
        $this->em->persist($person);
        $this->em->flush();
    }
}