<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact', methods: ['POST'])]
    public function submit(Request $request, MailerInterface $mailer): Response
    {
        $email = $request->request->get('email');
        $subject = $request->request->get('sujet');
        $message = $request->request->get('message');

        $emailMessage = (new Email())
            ->from($email) // Utilise l'email de l'expéditeur
            ->to('maevanono361@gmail.com') // Remplace par l'adresse du destinataire
            ->subject($subject)
            ->text($message);

        $mailer->send($emailMessage);

        // Optionnel : redirige vers une page de confirmation
        return $this->redirectToRoute('home'); 
    }
}

?>