<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $client = HttpClient::create();
        $params = '&courseid=41';
        $method = 'core_enrol_get_enrolled_users';

        $response = $client->request('GET', $_ENV['MOODLE_BASE_URL'].$method.$params);



        return $this->render('home/index.html.twig', [
            'response' => $response->toArray(),
        ]);
    }
}
