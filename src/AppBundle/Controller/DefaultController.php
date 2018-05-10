<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @return Response
     * @Route("/", name="homepage")
     */
    public function showLastAd()
    {
        $ads = $this->getDoctrine()
            ->getRepository('AppBundle:Ad')
            ->findBy([], ['date' => 'DESC'], 4);
        return $this->render('default/index.html.twig', array(
            'ads' => $ads,
        ));
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function cguAction(Request $request)
    {
        return $this->render('default/cgu.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/team", name="team")
     */
    public function teamAction(Request $request)
    {
        return $this->render('default/team.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


}
