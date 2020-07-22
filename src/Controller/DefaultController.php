<?php

namespace App\Controller;

use App\Entity\Poi;
use App\Form\DefaultType;
use App\Repository\PoiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="default_")
 */
class DefaultController extends AbstractController
{
    /**
     * List the Pois according to their localization
     * 
     * @Route("/" , name="list")
     * @param PoiRepository $poiRepository
     * @param Request $request
     * @return Response
     */
    public function list(Request $request, PoiRepository $repository): Response
    {
        // Create a new object Poi and a DefaultType form associated that we fill with the request
        $pois = new poi();
        $form = $this->createForm(DefaultType::class, $pois);
        $form->handleRequest($request);

        // if the form is submitted and validated : send the datas
        if ($form->isSubmitted() && $form->isValid()) {
            // If area AND department are null : return the list of all Poi in France
            if ($request->request->get('default')['area'] == null) {
                  if($request->request->get('default')['department'] == null) {
                    // Get the method in the repository
                    $pois = $repository->findAll();

                    // Return all pois
                    return $this->render('default/list.html.twig', [
                        'form' => $form->createView(),
                        'pois' => $pois
                    ]);
                  }

            // IF department is not null : return the list of Poi which match with department
            } elseif ($request->request->get('default')['department'] != null) {
                // Get and save department id
                $id = $request->request->get('default')['department'];
                // Get the method in the repository
                $pois = $repository->findAllByDepartment($id);

                return $this->render('default/list.html.twig', [
                    'form' => $form->createView(),
                    'pois' => $pois
                ]);

            // If area is null AND the department is not null : return the list of Poi which match with area
            } else {
                    // Get and save area id
                    $id = $request->request->get('default')['area'];
                    dump($id);
                    // Get the method in the repository
                    $pois = $repository->findAllByArea($id);

                    return $this->render('default/list.html.twig', [
                        'form' => $form->createView(),
                        'pois' => $pois
                    ]);


            }

        }

        return $this->render('default/list.html.twig', [
            'form' => $form->createView(),
            'pois' => $pois

        ]);
    }

}
