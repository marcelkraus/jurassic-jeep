<?php

namespace App\Controller;

use App\Entity\ContactRequest;
use App\Form\Type\ContactRequestType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/kontakt', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $contactRequest = new ContactRequest();

        $form = $this->createForm(ContactRequestType::class, $contactRequest, [
            'antispam_profile' => 'default',
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactRequest = $form->getData();
            $message = (new TemplatedEmail())
                ->from($_SERVER['CONTACT_FORM_SENDER_ADDRESS'])
                ->to($_SERVER['CONTACT_FORM_RECIPIENT_ADDRESS'])
                ->replyTo($contactRequest->getEmailAddress())
                ->subject('[Jurassic Jeep] Neue Nachricht über das Kontaktformular erhalten')
                ->textTemplate('emails/contact.txt.twig')
                ->context([
                    'full_name' => sprintf("%s %s", $contactRequest->getFirstName(), $contactRequest->getLastName()),
                    'email_address' => $contactRequest->getEmailAddress(),
                    'phone' => $contactRequest->getPhone(),
                    'message' => $contactRequest->getMessage(),
                ])
            ;

            $mailer->send($message);

            return $this->redirectToRoute('contact_confirmation');
        }

        return $this->render('content/contact/index.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/kontakt/nachricht-erhalten', name: 'contact_confirmation')]
    public function confirmation(): Response
    {
        return $this->render('content/contact/confirmation.html.twig');
    }
}
