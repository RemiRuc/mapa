<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Map;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em, Security $security) {
        $this->em = $em;
        $this->security = $security;
    }
    /**
     * @Route("/maps/{id}", name="get_map")
     */
    public function getMap(Map $map)
    {
        $authorized = ($map->getCreator() == $this->security->getUser());
        if ($authorized) {
            $pins = $map->getPins();
            $pinsArray = [];
            foreach($pins as $pin) {
                $pinsArray[] = [
                    'name' => $pin->getName(),
                    'description' => $pin->getDescription(),
                    'lat' => $pin->getLat(),
                    'lng' => $pin->getLng(),
                ];
            }
            $response = [
                'name' => $map->getName(),
                'pins' => $pinsArray
            ];
            return new JsonResponse(json_encode($response),
                Response::HTTP_OK, [], true);
        }
        $response = ['error' => 'Carte inconnue'];
        return new JsonResponse(json_encode($response),
        Response::HTTP_NOT_FOUND, [], true);
    }
}
