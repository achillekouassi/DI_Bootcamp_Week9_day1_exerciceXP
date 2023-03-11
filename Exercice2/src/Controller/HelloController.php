<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{

    private $em;
    private $repoCar;
    public function __construct(EntityManagerInterface $em, CarRepository $repoCar)
    {
        $this->em = $em;
        $this->repoCar = $repoCar;
    }

    #[Route('/', name: 'app_hello')]
    public function index(): Response
    {
        // save an car
        // $car = new Car();
        // $car->setName("Volvo");
        // $car->setColor("Red");
        // $car->setVitesse(120);
        // $this->em->persist($car);
        // $this->em->flush();
        
        $car = $this->repoCar->findCarHaveIdOne();

        return $this->render('hello/index.html.twig', [
            "car" => $car
        ]);
    }

}
