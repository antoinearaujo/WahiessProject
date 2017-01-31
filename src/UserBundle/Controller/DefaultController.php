<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\Article;
use UserBundle\Entity\Delete;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use UserBundle\Form\ImageType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }

 public function ajoutAction(Request $request)
    {

      $form = $this->createFormBuilder(new Article())
           ->add('Name')
           ->add('message')
           ->add('image',      new ImageType())
           ->add('submit','submit')
           ->getForm();

        $form->handleRequest($request);

        if ($request->isMethod('post')&& $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em-> persist($form->getData());
            $em->flush();

            return $this->redirect($this->generateUrl('home_homepage'));
        }
      return $this->render('UserBundle:Article:ajout.html.twig', array('form' => $form->createView()));
    }


 public function deleteArticleAction($id, Request $request)
    {
      $form = $this->createFormBuilder(new Delete())
           ->add('Name')
           ->add('raison')
           ->add('submit','submit')
           ->getForm();

        $form->handleRequest($request);
     



        if ($request->isMethod('post')&& $form->isValid()){

         $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:Article')->find($id);
 
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comment entity.');
            }
 
            $em->remove($entity);
            $em->flush();

          
        }
         return $this->render('UserBundle:Article:deleteArticle.html.twig', array('form' => $form->createView()));
    }

}
