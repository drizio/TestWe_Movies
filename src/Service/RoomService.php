<?php


namespace App\Service;


use App\Entity\Room;
use Doctrine\ORM\EntityManagerInterface;

class RoomService
{
    /** @var EntityManagerInterface */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return array|Room[]
     */
    public function findAllRoom(): array
    {
        return $this->em->getRepository(Room::class)->findAll();
    }

    /**
     * @param Room $room
     */
    public function saveRoom(Room $room)
    {
        $this->em->persist($room);
        $this->em->flush();
    }
}