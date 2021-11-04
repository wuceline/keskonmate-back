<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    /**
     * @Route("/admin/mailer", name="admin_mailer")
     */
    public function index(): Response
    {
        return $this->render('admin/mailer/index.html.twig', [
            'controller_name' => 'MailerController',
        ]);
    }
}
