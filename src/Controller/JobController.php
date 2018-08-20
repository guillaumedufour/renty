<?php

namespace App\Controller;

use App\Entity\Job;
use App\Form\JobType;
use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Entity\Rent;

/**
 * @Route("/job")
 */
class JobController extends Controller {

    /**
     * @Route("/", name="job_index", methods="GET")
     */
    public function index(JobRepository $jobRepository): Response {
        return $this->render('job/index.html.twig', ['jobs' => $jobRepository->findAll()]);
    }

    /**
     * @Route("/localjobs", name="job_local", methods="GET")
     */
   

        /**
         * @Route("/new", name="job_new", methods="GET|POST")
         * @Security("has_role('ROLE_USER')or has_role('ROLE_ADMIN')")
         */
        public function new( Request $request): Response
        {

        $job = new Job();
        $job->setJobContact($this->getUser());
        $job->setJobDatePost(new \DateTime('now'));
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        // $file contient le fichier jpeg uploadé
        /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
        $file = $job->getPicture();

        $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

        // déplace le fichier le fichier jusqu'au dossier des images stockées
        $file->move(
        $this->getParameter('pictures_directory'),
        $fileName
        );

        // met à jour la propriété picture avec le nom du fichier jpeg
        // et non son contenu
        $job->setPicture($fileName);


        $em = $this->getDoctrine()->getManager();
        $em->persist($job);
        $em->flush();

        return $this->redirectToRoute('job_index');
        }

        return $this->render('job/new.html.twig', [
                    'job' => $job,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="job_show", methods="GET")
     */
    public function show(Job $job): Response {
        return $this->render('job/show.html.twig', ['job' => $job]);
    }

    /**
     * @Route("/{id}/edit", name="job_edit", methods="GET|POST")
     * @Security("has_role('ROLE_USER')or has_role('ROLE_ADMIN')")
     */
    public function edit(Request $request, Job $job): Response {
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('job_edit', ['id' => $job->getId()]);
        }

        return $this->render('job/edit.html.twig', [
                    'job' => $job,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="job_delete", methods="DELETE")
     * @Security("has_role('ROLE_USER')or has_role('ROLE_ADMIN')")
     */
    public function delete(Request $request, Job $job): Response {
        if ($this->isCsrfTokenValid('delete' . $job->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($job);
            $em->flush();
        }

        return $this->redirectToRoute('job_index');
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
