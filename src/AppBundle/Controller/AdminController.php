<?php
/**
 * Created by PhpStorm.
 * User: 302025627
 * Date: 16-1-2019
 * Time: 09:22
 */

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Entity\Instructeur;
use AppBundle\Entity\Trainingsvorm;
use AppBundle\Form\InstructeurType;
use AppBundle\Form\TrainingsvormType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends Controller
{
    /**
     * @Route("/newIns")
     */
    public function storeInstructeur()
    {
        $EntityManager = $this->getDoctrine()->getManager();

        $instructeur = new Instructeur();
        $instructeur->setNaam('Timo');
        $instructeur->setTussenvoegsel('');
        $instructeur->setAchternaam('Janssen');
        $instructeur->setAdres('Schubbertlaan 108');
        $instructeur->setWoonplaats('Delft');
        $instructeur->setPostcode('3917 AH');
        $instructeur->setEmail('t.janssen@gmail.com');
        $instructeur->setTel('0652kaassoufle');

        $EntityManager->persist($instructeur);

        $EntityManager->flush();

        return new Response('Instructeur aangemaakt');


    }

    /**
     * @Route("/instructeur" , name="instructeur")
     */
    public function showInstructeur()
    {
        $instructeur = $this->getDoctrine()
            ->getRepository(Instructeur::class)
            ->findAll();

        return $this->render('default/admin/instructeur.html.twig',[
            'instructeurs'=>$instructeur
        ]);
    }

    /**
     * @Route("/inToevoegen")
     */
    public function addInstructeur(Request $request)
    {
        $form=$this->createForm(InstructeurType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $instructeur = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $em->persist($instructeur);

            $em->flush();
            $this->addFlash('succes', 'Instructeur toegevoegd');
            return $this->redirectToRoute('instructeur');
        }

        return $this->render('default/admin/inToevoegen.html.twig',[
            'instructeurForm'=>$form->createView()
        ]);
    }

    /**
     * @Route("inWijzigen/{Id}")
     */
    public function changeInstructeur(Request $request, $Id)
    {
        $em = $this->getDoctrine()->getManager();
        $instructeur = $em->getRepository('AppBundle:Instructeur')->find($Id);

        $form = $this->createForm(InstructeurType::class, $instructeur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirectToRoute('instructeur');
        }

        return $this->render('default/admin/inWijzigen.html.twig', [
            'instructeurForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/inVerwijderen/{Id}")
     */
    public function deleteInstructeur(Request $request, $Id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Instructeur')->find($Id);

        if (!$post) {
            return $this->redirectToRoute('instructeur');
        }

        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('instructeur');
    }

    /**
     * @Route("/trainingsvorm", name="trainingsvorm")
     */
    public function showTrainingsvorm()
    {
        $trainingsvorm = $this->getDoctrine()
            ->getRepository(Trainingsvorm::class)
            ->findAll();

        return $this->render('default/admin/trainingsvorm.html.twig', [
            'trainingsvormen'=>$trainingsvorm
        ]);
    }

    /**
     * @Route("/trToevoegen")
     */
    public function addTrainingsvorm(Request $request)
    {
        $form=$this->createForm(TrainingsvormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $trainingsvorm = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $em->persist($trainingsvorm);

            $em->flush();
            $this->addFlash('succes', 'trainingsvorm toegevoegd');
            return $this->redirectToRoute('trainingsvorm');
        }

        return $this->render('default/admin/trToevoegen.html.twig',[
            'trainingsvormForm'=>$form->createView()
        ]);

    }

    /**
     * @Route("trWijzigen/{Id}")
     */
    public function changeTrainingsvorm(Request $request, $Id)
    {
        $em = $this->getDoctrine()->getManager();
        $trainingsvorm = $em->getRepository('AppBundle:Trainingsvorm')->find($Id);

        $form = $this->createForm(TrainingsvormType::class, $trainingsvorm);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirectToRoute('trainingsvorm');
        }

        return $this->render('default/admin/trWijzigen.html.twig', [
            'trainingsvormForm' => $form->createView()
        ]);
    }


    /**
     * @Route("/trVerwijderen/{Id}")
     */
    public function deleteTrainingsvorm(Request $request, $Id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Trainingsvorm')->find($Id);

        if (!$post) {
            return $this->redirectToRoute('trainingsvorm');
        }

        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('trainingsvorm');
    }


}