<?php
/**
 * Created by PhpStorm.
 * User: mint
 * Date: 25/04/18
 * Time: 12:54
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Ad;
use AppBundle\Form\AdType;
use AppBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface ;
use Symfony\Component\Routing\Annotation\Route;


class AdController extends Controller
{

    /**
     * @Route("/ads", name="ads")
     */
    public function showAllAdAction()
    {
        $ads = $this->getDoctrine()
            ->getRepository('AppBundle:Ad')
            ->findBy([], array('date' => 'DESC'));
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
     * @Route("/ad/create", name="ad_create")
     *
     */
    public function CreateAction(Request $request)
    {
        $ad = new Ad();
        $user = $this->getUser();
        $ad->setUser($user);
        $form = $this->createForm(AdType::class, $ad);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($ad);
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'notice',
                'Annonce publiée!');

            return $this->redirectToRoute('my_ads');
        }

        $formview = $form->createView();

        return $this->render('templates/createAd.html.twig', array(
            'form'=>$formview));

    }

    /**
     * @Route("/ad/offer", name="ad_offer")
     */
    public function ListOfferAction()
    {
        $ads = $this->getDoctrine()->getRepository(Ad::class)->findByService('Offre', ['date'=>'DESC']);

        return $this->render('templates/offer.html.twig', [
            'ads' => $ads,
        ]);
    }

    /**
     * @Route("/ad/request", name="ad_request")
     */
    public function ListRequestAction()
    {
        $ads = $this->getDoctrine()->getRepository(Ad::class)->findByService('Demande', ['date'=>'DESC']);

        return $this->render('templates/request.html.twig', [
            'ads' => $ads,
        ]);

    }

    /**
     * @Route("/myads", name="my_ads")
     */
    public function AdUserAction(UserInterface $user)
    {
        $ads = $this->getDoctrine()->getRepository(Ad::class)->findByUserId($user);

        return $this->render('templates/aduser.html.twig', [
            'ads' => $ads,
        ]);

    }

    /**
     * @Route("/myads/{id}/edit", name="my_ads_edit")
     * @Method({"GET", "POST"})

     */
    public function editAdAction(Request $request, Ad $ad)
    {

        $deleteForm = $this->createDeleteForm($ad);
        $editForm = $this->createForm('AppBundle\Form\AdType', $ad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash(
                'notice',
                'Annonce modifiée!');

            return $this->redirectToRoute('my_ads', array('id' => $ad->getId()));
        }

        return $this->render('templates/editAd.html.twig', array(
            'ad' => $ad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ad entity.
     *
     * @Route("myads/{id}", name="my_ads_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ad $ad)
    {
        $form = $this->createDeleteForm($ad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ad);
            $em->flush();

            $this->addFlash(
                'warning',
                'Annonce supprimée!');
        }

        return $this->redirectToRoute('my_ads');
    }


    /**
     * Creates a form to delete a ad entity.
     *
     * @param Ad $ad The ad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ad $ad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('my_ads_delete', array('id' => $ad->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    public function SearchViewAction()
    {
        $form = $this->createForm(new SearchType());

        return $this->render('templates/search.html.twig', [
            'form' => $form->createView(),
        ]);
    }    /**
//     * @Route("/search", name="search")
//     *
//     */
//    public function SearchAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $result = $em->getRepository(Ad::class)->findLike('ville');
//
//
//        return $this->render('templates/search.html.twig', [
//            'result' => $result,
//        ]);
//
//        dump($result);
//
//    }

    /**
     * @Route("/search", name="search")
     * @Method({"GET", "POST"})
     */
    public function SearchAction(Request $request)
    {
        $repository = $this->getDoctrine()
        ->getRepository(Ad::class);

        $listresults = [];

        if (!empty($request->request->get('ville'))) {

            $ville = $request->request->get('ville');
            $service = null;

            if (!empty($request->request->get('service'))) {
                $service = $request->request->get('service');
            }

            $listresults = $repository->findLike($ville, $service);
        }

        return $this->render('templates/search.html.twig', array(
            'listresults' => $listresults
        ));
    }


}