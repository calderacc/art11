<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\ListItem;
use JMS\Serializer\SerializerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/list", name="api_list")
     */
    public function index(RegistryInterface $registry, SerializerInterface $serializer): Response
    {
        $list = $registry->getRepository(ListItem::class)->findAll();

        return new JsonResponse($serializer->serialize($list, 'json'), 200, [], true);
    }
}
