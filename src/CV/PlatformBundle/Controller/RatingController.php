<?php

namespace CV\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use CV\PlatformBundle\Entity\Reservation;
use CV\PlatformBundle\Entity\Rating;
use CV\PlatformBundle\Entity\Ride;
use CV\PlatformBundle\Entity\PublicMessage;
use CV\PlatformBundle\Entity\Notification;
use CV\PlatformBundle\Form\RatingType;
use CV\UserBundle\Entity\User;

class RatingController extends Controller
{
    public function notificationsAction($page, Request $request) {
		if ($page < 1) {
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }           
        $nbPerPage = 5;
        
        $userId = $this->get('security.context')->getToken()->getUser()->getId();
       	
        $this->getDoctrine()
            ->getManager()
            ->getRepository('CVPlatformBundle:Notification')
            ->update($userId);
        
        $this->getDoctrine()
            ->getManager()
            ->getRepository('CVPlatformBundle:Reservation')
            ->updateStates($userId);

		$listPastReservationsToNotify = $this->getDoctrine()
            ->getManager()
            ->getRepository('CVPlatformBundle:Reservation')
            ->pastReservations($page, $nbPerPage, $userId);

		$nbPages = ceil(count($listPastReservationsToNotify)/$nbPerPage);

        return $this->render('CVPlatformBundle:Rating:notifications.html.twig', array(
        	'listPastReservationsToNotify' 	=> $listPastReservationsToNotify,
       		'nbPages'           			=> $nbPages,
			'page'              			=> $page,
        ));
    }

    public function receivedAction($page) {
        if ($page < 1) {
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        $nbPerPage = 5;

        $userId = $this->get('security.context')->getToken()->getUser()->getId();
        
        $listRatingsReceived = $this->getDoctrine()
            ->getManager()
            ->getRepository('CVPlatformBundle:Rating')
            ->ratingsReceived($page, $nbPerPage, $userId);

        $nbPages = ceil(count($listRatingsReceived)/$nbPerPage);

        if ($page > $nbPages) {
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        return $this->render('CVPlatformBundle:Rating:received.html.twig', array(
            'listRatingsReceived'   => $listRatingsReceived,
            'nbPages'               => $nbPages,
            'page'                  => $page,
        ));
    }

    public function sendedAction($page) {
        if ($page < 1) {
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        $nbPerPage = 5;

        $userId = $this->get('security.context')->getToken()->getUser()->getId();
        
        $listRatingsSended = $this->getDoctrine()
            ->getManager()
            ->getRepository('CVPlatformBundle:Rating')
            ->ratingsSended($page, $nbPerPage, $userId);

        $nbPages = ceil(count($listRatingsSended)/$nbPerPage);

        if ($page > $nbPages) {
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        return $this->render('CVPlatformBundle:Rating:sended.html.twig', array(
            'listRatingsSended'   => $listRatingsSended,
            'nbPages'               => $nbPages,
            'page'                  => $page,
        ));
    }

    public function leaveAction(Notification $notification, Request $request) {
        $rating = new Rating();
        $form = $this->createForm(new RatingType, $rating);

        if ($form->handleRequest($request)->isValid()) {
            $request->getSession()->getFlashBag()->add('info', 'Avis bien publié.');
        
            $rating->setDate(new \Datetime());
            $rating->setUser($notification->getUser());
            $rating->setRelateduser($notification->getRelateduser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($rating);
            $em->remove($notification);
            $em->flush();

            return $this->redirect($this->generateUrl('cv_platform_ratings_sended'));
        }

        return $this->render('CVPlatformBundle:Rating:leave.html.twig', array(
            'form' => $form->createView(),
            'notification' => $notification,
        ));
    }

    public function pictureAction($thumb, User $user) {
        $em = $this->getDoctrine()->getManager();
        $profile = $em->getRepository('CVProfileBundle:Profile')
                  ->requestProfileUser($user->getId());

        if (null === $profile) {
            throw new NotFoundHttpException("Le profil n'existe pas.");
        }         
        return $this->render('CVPlatformBundle:Rating:picture.html.twig', array(
            'profile'   => $profile,
            'thumb'     => $thumb
        ));
    }
}
