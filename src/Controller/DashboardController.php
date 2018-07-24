<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\JobRepository;
use App\Repository\RentRepository;


class DashboardController extends Controller {

    /**
     * @Route("/moncompte", name="moncompte", methods="GET")
     */
    public function Dashboard(RentRepository $rentRepository, JobRepository $jobRepository ): Response {

        return $this->render('dashboard/index.html.twig', ['rents' => $rentRepository->findAll(),
                    'jobs' => $jobRepository->findAll()]);
    }

}
