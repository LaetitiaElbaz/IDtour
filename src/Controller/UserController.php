<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/profile", name="_profile", methods={"GET"})
     */
    public function profile()
    {
        // get the current connected user 
        $connectedUser = $this->getUser();
        dump($connectedUser->getId());

        return $this->render('user/profile.html.twig', [
            'user' => $connectedUser,
        ]);
    }
}
