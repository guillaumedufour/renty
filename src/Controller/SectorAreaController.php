<?php

namespace App\Controller;

use App\Entity\SectorArea;
use App\Form\SectorAreaType;
use App\Repository\SectorAreaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sector/area")
 */
class SectorAreaController extends Controller
{
    /**
     * @Route("/", name="sector_area_index", methods="GET")
     */
    public function index(SectorAreaRepository $sectorAreaRepository): Response
    {
        return $this->render('sector_area/index.html.twig', ['sector_areas' => $sectorAreaRepository->findAll()]);
    }

    /**
     * @Route("/new", name="sector_area_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $sectorArea = new SectorArea();
        $form = $this->createForm(SectorAreaType::class, $sectorArea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sectorArea);
            $em->flush();

            return $this->redirectToRoute('job_index');
        }

        return $this->render('sector_area/new.html.twig', [
            'sector_area' => $sectorArea,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sector_area_show", methods="GET")
     */
    public function show(SectorArea $sectorArea): Response
    {
        return $this->render('sector_area/show.html.twig', ['sector_area' => $sectorArea]);
    }

    /**
     * @Route("/{id}/edit", name="sector_area_edit", methods="GET|POST")
     */
    public function edit(Request $request, SectorArea $sectorArea): Response
    {
        $form = $this->createForm(SectorAreaType::class, $sectorArea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sector_area_edit', ['id' => $sectorArea->getId()]);
        }

        return $this->render('sector_area/edit.html.twig', [
            'sector_area' => $sectorArea,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sector_area_delete", methods="DELETE")
     */
    public function delete(Request $request, SectorArea $sectorArea): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sectorArea->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sectorArea);
            $em->flush();
        }

        return $this->redirectToRoute('sector_area_index');
    }
}
