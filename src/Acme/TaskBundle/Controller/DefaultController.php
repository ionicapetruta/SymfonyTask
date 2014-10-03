<?php

namespace Acme\TaskBundle\Controller;

use Acme\TaskBundle\Entity\Department;
use Acme\TaskBundle\Entity\Employee;

use Acme\TaskBundle\Form\Type\EmployeeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\TaskBundle\Form\Type\DepartmentType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render(
            'AcmeTaskBundle:Default:index.html.twig',
            array('name' => $name)
        );
    }

    public function add($task)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();
    }

    /**
     *  Add Department.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addDepartmentAction(Request $request)
    {
        $department = new Department();
        $form = $this->createForm(new DepartmentType(), $department);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->add($department);
        }

        return $this->render(
            'AcmeTaskBundle:Default:new.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     *  Add employee.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addEmployeeAction(Request $request)
    {
        $employee = new Employee();
        $form = $this->createForm(new EmployeeType(), $employee);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->add($employee);
        }

        return $this->render(
            'AcmeTaskBundle:Default:new.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    }
}
