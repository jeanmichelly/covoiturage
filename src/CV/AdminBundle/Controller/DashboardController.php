<?php

namespace CV\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function viewAction()
    {
        return $this->render('CVAdminBundle:Default:index.html.twig');
    }
}
