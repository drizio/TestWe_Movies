<?php


namespace App\Controller;


use App\Entity\Room;
use App\Form\RoomType;
use App\Service\RoomService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/room")
 *
 * Class RoomController
 * @package App\Controller
 */
class RoomController extends AbstractController
{

    /**
     * @Route("/", name="indexRoom")
     * @Template("room/index.html.twig")
     *
     * @param RoomService $roomService
     * @return array
     */
    public function index(RoomService $roomService): array
    {
        $rooms = $roomService->findAllRoom();

        return [
            'rooms' => $rooms
        ];
    }

    /**
     * @Route("/new", name="newRoom")
     *
     * @param RoomService $roomService
     * @param Request $request
     * @return Response
     */
    public function new(RoomService $roomService, Request $request): Response
    {
        $room = new Room();
        $form = $this->createForm(RoomType::class, $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $roomService->saveRoom($room);
            return $this->redirectToRoute('indexRoom');
        }

        return $this->render('room/edit.html.twig', ['form_room' => $form->createView()]);
    }

    /**
     * @Route("/edit/{room}", name="editRoom")
     *
     * @param RoomService $roomService
     * @param Request $request
     * @param Room $room
     * @return Response
     */
    public function edit(RoomService $roomService, Request $request, Room $room): Response
    {
        $form = $this->createForm(RoomType::class, $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $roomService->saveRoom($room);
            return $this->redirectToRoute('indexRoom');
        }

        return $this->render('room/edit.html.twig', ['form_room' => $form->createView()]);
    }
}