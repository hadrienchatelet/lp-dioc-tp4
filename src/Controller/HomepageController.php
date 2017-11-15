<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /**
     * @Route(
     *     path="/",
     *     name="homepage"
     * )
     */
    public function homepageAction()
    {
        // FIXME: Récupérer les utilisateurs non admin
        $users = [];
        $repo = $this->getDoctrine()->getRepository(User::class);

        $users = $repo->findBy(array('isAdmin' => 'false'));

        return $this->render('Homepage/homepage.html.twig', ['users' => $users]);
    }
}
