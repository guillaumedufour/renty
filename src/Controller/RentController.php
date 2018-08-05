<?php

namespace App\Controller;

use App\Entity\Rent;
use App\Form\RentType;
use App\Repository\RentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/rent")
 */
class RentController extends Controller {

    /**
     * @Route("/", name="rent_index", methods="GET")
     */
    public function index(RentRepository $rentRepository): Response {
        return $this->render('rent/index.html.twig', ['rents' => $rentRepository->findAll()]);
        }

        /**
         * @Route("/new", name="rent_new", methods="GET|POST")
         * @Security("has_role('ROLE_USER')or has_role('ROLE_ADMIN')")
         */
    public function new(Request $request): Response
        {
        $rent = new Rent();
        $rent->setRentContact($this->getUser());
        $rent->setRentDatePost(new \DateTime('now'));
        $form = $this->createForm(RentType::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        // $file contient le fichier jpeg uploadé
        $file = $rent->getPicture();

        $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

        // déplace le fichier le fichier jusqu'au dossier des images stockées
        $file->move(
        $this->getParameter('pictures_directory'),
        $fileName
        );

        // met à jour la propriété picture avec le nom du fichier jpeg
        // et non son contenu
        $rent->setPicture($fileName);

        $em = $this->getDoctrine()->getManager();
        $em->persist($rent);
        $em->flush();

        return $this->redirectToRoute('rent_index');
        }

        return $this->render('rent/new.html.twig', [
                    'rent' => $rent,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rent_show", methods="GET")
     */
    public function show(Rent $rent): Response {
        return $this->render('rent/show.html.twig', ['rent' => $rent]);
    }

    /**
     * @Route("/{id}/edit", name="rent_edit", methods="GET|POST")
     * @Security("has_role('ROLE_USER')or has_role('ROLE_ADMIN')")
     */
    public function edit(Request $request, Rent $rent): Response {
        $form = $this->createForm(RentType::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file contient le fichier jpeg uploadé

            $file = $rent->getPicture();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

            // déplace le fichier le fichier jusqu'au dossier des images stockées
            $file->move(
                    $this->getParameter('pictures_directory'), $fileName
            );

            // met à jour la propriété picture avec le nom du fichier jpeg
            // et non son contenu
            $rent->setPicture($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($rent);
            $em->flush();

            return $this->redirectToRoute('rent_edit', ['id' => $rent->getId()]);
        }

        return $this->render('rent/edit.html.twig', [
                    'rent' => $rent,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rent_delete", methods="DELETE")
     * @Security("has_role('ROLE_USER')or has_role('ROLE_ADMIN')")
     */
    public function delete(Request $request, Rent $rent): Response {
        if ($this->isCsrfTokenValid('delete' . $rent->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rent);
            $em->flush();
        }

        return $this->redirectToRoute('rent_index');
    }

    /**
     * @return string
     */
    private function generateUniqueFileName() {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

}
