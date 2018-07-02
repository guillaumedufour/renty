<?php

namespace App\Controller;

use App\Entity\Rent;
use App\Form\RentType;
use App\Repository\RentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

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
         */
        public function new(Request $request): Response
        {
        
        
        
        $rent = new Rent();

        $form = $this->createForm(RentType::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
     */
    public function edit(Request $request, Rent $rent): Response {
        $form = $this->createForm(RentType::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rent_edit', ['id' => $rent->getId()]);
        }

        return $this->render('rent/edit.html.twig', [
                    'rent' => $rent,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rent_delete", methods="DELETE")
     */
    public function delete(Request $request, Rent $rent): Response {
        if ($this->isCsrfTokenValid('delete' . $rent->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rent);
            $em->flush();
        }

        return $this->redirectToRoute('rent_index');
    }

}