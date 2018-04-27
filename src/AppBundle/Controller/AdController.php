<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 25/04/18
 * Time: 12:54
 */

namespace AppBundle\Controller;


use AppBundle\Form\AdType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Ad;

class AdController extends Controller
{

    /**
     * @Route("/ads", name="ads")
     */
    public function showAllAdAction()
    {
        $ads = $this->getDoctrine()
            ->getRepository('AppBundle:Ad')
            ->findBy([], ['date' => 'DESC']);
        return $this->render('templates/ads.html.twig', array(
            'ads' => $ads,
        ));

    }

    /**
     * @Route("/ad/{id}", name="ad_id", requirements={"id"="\d+"})
     */
    public function showAd($id)
    {
        $ad = $this->getDoctrine()
            ->getRepository('AppBundle:Ad')
            ->find($id);
        if (!$ad) {
            throw $this->createNotFoundException(' Annonce non trouvée. ');
        }
        return $this->render('templates/addetail.html.twig', array(
            'ad' => $ad,
        ));

    }

    /**
     * @Route("/ad/offer", name="ad_offer")
     */
    public function ListOfferAction()
    {
        return $this->render('templates/offer.html.twig');

    }

    /**
     * @Route("/ad/request", name="ad_request")
     */
    public function ListRequestAction()
    {
        return $this->render('templates/request.html.twig');

    }


    /**
     * @Route("/ad/create", name="ad_create")
     *
     */
    public function CreateAction(Request $request)
    {
        $ad = new Ad();

        $form = $this->createForm(AdType::class, $ad);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($ad);
            $em->flush();

            $this->addFlash(
                'notice',
                'Annonce publiée!');

            return $this->redirectToRoute('homepage');
        }

        $formview = $form->createView();

        return $this->render('templates/createAd.html.twig', array(
            'form'=>$formview));

    }

}