<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAdminAction()
    {
        return $this->render('UserBundle:Default:indexadmin.html.twig');
    }
    public function indexASSEAction()
    {
        return $this->render('UserBundle:Default:indexasse.html.twig');
    }
    public function indexINDEAction()
    {
        return $this->render('UserBundle:Default:indexinde.html.twig');
    }
    public function indexSOCEAction()
    {
        return $this->render('UserBundle:Default:indexsoce.html.twig');
    }
    public function indexASSRAction()
    {
        return $this->render('UserBundle:Default:indexassr.html.twig');
    }
    public function indexSOCRAction()
    {
        return $this->render('UserBundle:Default:indexsocr.html.twig');
    }
    public function indexINDRAction()
    {
        return $this->render('UserBundle:Default:indexindr.html.twig');
    }
}