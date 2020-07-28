<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route(name="security_")
 */
class SecurityController extends AbstractController
{
    /**
     * A controller to login
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * A controller to logout
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        $this->addFlash(
            'Information',
            'Vous êtes deconnecté'
        );
        return $this->redirectToRoute('home_list');
    }

    /**
     * A controller to register on the website
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // Create the form
        $form = $this->createForm(UserRegistrationFormType::class);

        // Get informations from the Request
        $form->handleRequest($request);

        // Create a new object user and a UserType form associated that we fill with the request
        $user = new User();
        
        // if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // get the data from the form
            $user = $form->getData();

            // attribute role user
            $user->setRoles(['ROLE_USER']);

            // get plain password from form
            $plainPassword = $form['plainPassword']->getData();

            // encode password
            $encodedPassword = $passwordEncoder->encodePassword($user, $plainPassword);

            // replace plain password by the hashed password
            $user->setPassword($encodedPassword);
            // dd($user, $plainPassword, $encodedPassword);

            // save in database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Félicitations! Votre compte a bien été crée');

        }
        return $this->render('security/edit_user.html.twig', [
            'registrationForm' => $form->createView(),
        ]);

    }
}
