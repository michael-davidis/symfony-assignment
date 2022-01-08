<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController  {

    private $client;

    public function __construct(HttpClientInterface $client) {
        $this->client = $client;
    }

    /**
     * @Route("/")   
     * @Method({"GET"});
     */
    public function getFromApi(){
        $response = $this->client->request(
            'GET',
            'https://a831bqiv1d.execute-api.eu-west-1.amazonaws.com/dev/results'
        );

        return new Response($response->getContent());
    }

}