<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request as BrowserKitRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SendMailService;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/new', name: 'user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher, UserPasswordHasherInterface $userPasswordHasherInterface, MailerInterface $mailerInterface): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            // encode the plain password
            
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );
            $user->setToken(rtrim(strtr(base64_encode(random_bytes(150)), '+/', '-_'), '='));
             $user->setRoles([$request->request->all('user')['roles']]);
            $entityManager->persist($user);
            $entityManager->flush();

            $email = (new TemplatedEmail())
            ->from(new Address('mahery.rsh.sender@gmail.com', 'admin'))
            ->to($user->getEmail())
            ->subject('your identifient')
            ->htmlTemplate('email/sendemail.html.twig')
            ->context(
                [
                    'user'=>$user,
                    'mail'=>$form->get('email')->getData(),
                    'message'=>$userPasswordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                ]
            );
            $mailerInterface->send($email);
        //    dd($mailerInterface);
        //    dd($email);

            //$this->mailer->sendPassword($rendomByte,$user);
            return $this->redirectToRoute('home_Admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/user/new.html.twig', [
          
            'user' => $user,
            'form' => $form,
        ]);
    }
}
