<?php

namespace App\Controller;

use App\Service\GreetingService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{

    private $helloSvc;
    public function __construct(GreetingService $helloSvc)
    {
        $this->helloSvc = $helloSvc;
    }

    #[Route('/{name}', name: 'app_hello')]
    public function index($name): Response
    {
        $word = $this->helloSvc->sayHello($name);

        return $this->render('hello/index.html.twig', [
            'hello' => $word,
        ]);
    }
}
