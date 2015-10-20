<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="get_users")
     * @Method("GET")
     * @Template()
     */
    public function usersAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("AppBundle:User")->findAll();

        return [
            "users" => $users
        ];
    }

    /**
     * @Route("/products", name="get_products")
     * @Method("GET")
     * @Template()
     */
    public function productsAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository("AppBundle:Product")->getAllProductsWithDeps();
//        $products = $em->getRepository("AppBundle:Product")->findAll();               //  <-- Bad practice for getting all objects with dependencies. In result we will doing many queries to db

        return [
            "products" => $products
        ];
    }
}
