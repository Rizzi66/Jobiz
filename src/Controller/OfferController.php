<?php

namespace App\Controller;

use App\Entity\Job;
use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OfferController extends AbstractController
{
    #[Route('/offers', name: 'app_offer_list')]
    public function list(Request $request, JobRepository $jobRepository): Response
    {
        $category = $request->query->get('category');
        $country = $request->query->get('country');

        $jobs = $jobRepository->findByFilters($category, $country);

        // $jobs = $jobRepository->findAll();

        return $this->render('offer/list.html.twig', [
            'offers' => $jobs,
        ]);
    }


    #[Route('/offers/{id}', name: 'app_offer_show')]
    public function show(Job $job): Response
    {
        return $this->render('offer/show.html.twig', [
            'offer' => $job,
        ]);
    }
}
