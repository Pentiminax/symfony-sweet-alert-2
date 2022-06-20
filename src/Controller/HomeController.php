<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    const SAFE_DEPOSIT_BOX_PASSWORD = 'TEST_1234';

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/safe-deposit-box', name: 'app_safe_deposit_box')]
    public function safeDepositBox(Request $request): Response
    {
        $password = $request->request->get('password');

        return $this->json([
            'result' => $password === self::SAFE_DEPOSIT_BOX_PASSWORD
        ]);
    }
}
