<?php
/**
 * Created by PhpStorm.
 * User: Duy Anh
 * Date: 22/02/2018
 * Time: 1:22 SA
 */

namespace App\Controller;

use App\Map\MapP1;
use App\Entity\Location;
use App\Form\Phase1Form;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name = "homepage")
     */
    public function homepage()
    {
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/phase1", name = "phase1")
     */
    public function phase1(Request $request)
    {
        $location = new Location();

        $form = $this->createForm(Phase1Form::class, $location);

        $form->handleRequest($request);

        $newMarker = '';

        if ($form->isSubmitted() && $form->isValid())
        {
            $google_map_geocode = new MapP1();

            $location = $form->getData();

            $newMarker = $location->getIcon();

            $location = $google_map_geocode->getInfo($location->getLocation());
        }

        return $this->render('phase1.html.twig', array(
            'form' => $form->createView(),
            'address' => $location->getLocation(),
            'latitude' => $location->getLatitude(),
            'longitude' => $location->getLongitude(),
            'custom' => $newMarker
        ));
    }
}