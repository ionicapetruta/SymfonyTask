<?php

namespace Acme\TaskBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\TaskBundle\Entity\DepartmentRepository")
 */
class Department
{
    /**
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="department")
     */
    protected $employee;

    public function __construct()
    {
        $this->employee = new ArrayCollection();
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Department
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add employee.
     *
     * @param Employee $employee
     * @return Department
     */
    public function addEmployee(Employee $employee)
    {
        $this->employee[] = $employee;
        return $this;
    }

    /**
     * Remove employee.
     *
     * @param Employee $employee
     */
    public function removeEmployee(Employee $employee)
    {
        $this->employee->removeElement($employee);
    }

    public function getEmployee()
    {
        return $this->employee;
    }

}
