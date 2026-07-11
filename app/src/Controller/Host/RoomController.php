<?php

declare(strict_types=1);

namespace App\Controller\Host;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(
    path: '/host/rooms'
)]
final class RoomController extends AbstractController
{
    #[Route(
        path: '/new',
        name: 'app_host_room_new'
    )]
    public function new(): Response
    {
        return $this->render('host/rooms/new.html.twig');
    }

    #[Route(
        path: '/{id}/edit',
        name: 'app_host_room_edit'
    )]
    public function edit(int $id): Response
    {
        return $this->render('host/rooms/edit.html.twig', [
            'id' => $id,
        ]);
    }

    #[Route(
        path: '/{id}/delete',
        name: 'app_host_room_delete'
    )]
    public function delete(int $id): Response
    {
        return $this->render('host/rooms/delete.html.twig', [
            'id' => $id,
        ]);
    }

    #[Route(
        path: '/{id}/gallery',
        name: 'app_host_room_gallery'
    )]
    public function gallery(int $id): Response
    {
        return $this->render('host/rooms/gallery.html.twig', [
            'id' => $id,
        ]);
    }

    #[Route(
        path: '/{id}/status',
        name: 'app_host_room_status'
    )]
    public function status(int $id): Response
    {
        return $this->render('host/rooms/status.html.twig', [
            'id' => $id,
        ]);
    }

    #[Route(
        path: '/{id}/amenities',
        name: 'app_host_room_amenities'
    )]
    public function amenities(int $id): Response
    {
        return $this->render('host/rooms/amenities.html.twig', [
            'id' => $id,
        ]);
    }
}