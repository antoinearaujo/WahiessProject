<?php

namespace HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Form\ImageType;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HomeBundle:Default:index.html.twig');
    }

    public function accueilAction()
    {
        return $this->render('HomeBundle:Default:accueil.html.twig');
    }

public function actualitesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('UserBundle:Article');

        $sheets = $repository->getAll();

        return $this->render('HomeBundle:Default:actualites.html.twig', array('sheets' => $sheets) );

    }

}
