<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="pois_")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function index()
    {
        return new \Symfony\Component\HttpFoundation\Response(<<<EOF
<html>
    <body>
        <img src="/images/under-construction.gif" />
    </body>
</html>
EOF
    );
    }
}
