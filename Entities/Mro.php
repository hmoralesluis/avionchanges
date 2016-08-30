<?php
/**
 * Created by PhpStorm.
 * User: roster
 * Date: 7/2/16
 * Time: 12:53 AM
 */

namespace SysBackenBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\EntityManager;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="SysBackenBundle\Entity\MroRepository")
 * @ORM\Table(name="mro") *
 */
class Mro {

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Continent")
     * @ORM\JoinColumn(name="continent", referencedColumnName="id")
     */
    protected $continent;

    /**
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumn(name="country", referencedColumnName="id")
     */
    protected $country;

    /**
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumn(name="state", referencedColumnName="id")
     */
    protected $state;

    /**
     * @ORM\Column(name="city", type="string", length=255)
     */
    protected $city;

    /**
     * @ORM\Column(name="certificatenumber", type="string", length=255)
     */
    protected $certificatenumber;


    /**
     * @ORM\Column(name="remarks", type="string", length=255)
     */
    protected $remarks;

    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="mroactive", referencedColumnName="id")
     */
    protected $mroactive;


    /**
     *  Is airecraft is active or not
     *
     *  @ORM\Column(name="is_active", type="boolean")
     */
    protected $isActive;

    /**
     * @ORM\Column(name="website", type="string", length=255)
     */
    protected $website;

    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="doctype", referencedColumnName="id")
     */
    protected $doctype;


    /**
     * It only stores the name of the file which stores the contract subscribed
     * by the user.
     *
     * @ORM\Column(name="doc",type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $doc;

    /**
     * This unmapped property stores the binary contents of the file which stores
     * the contract subscribed by the user.
     *
     * @Vich\UploadableField(mapping="user_contracts", fileNameProperty="doc")
     *
     * @var File
     */
    private $docFile;

    /**
     * @ORM\ManyToOne(targetEntity="Nomencladores")
     * @ORM\JoinColumn(name="ofactype", referencedColumnName="id")
     */
    protected $ofactype;



    /**
     * It only stores the name of the file which stores the contract subscribed
     * by the user.
     *
     * @ORM\Column(name="ofac",type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $ofac;


    /**
     * This unmapped property stores the binary contents of the file which stores
     * the contract subscribed by the user.
     *
     * @Vich\UploadableField(mapping="user_contracts", fileNameProperty="ofac")
     *
     * @var File
     */
    private $ofacFile;


    /**
     * @ORM\Column(name="issuedate",type="datetime")
     */
    private $issuedate;

    /**
     * @ORM\Column(name="expirationdate",type="datetime")
     */
    private $expirationdate;

    /**
     *
     * @var Airecraft[]
     * @ORM\ManyToMany(targetEntity="Airecraft", inversedBy="mro")
     * @ORM\JoinTable(name="mro_airecraft")
     */
    private $mro_airecraft;


    /**
     *
     * @var Contact[]
     * @ORM\ManyToMany(targetEntity="Contact", inversedBy="con_mro")
     * @ORM\JoinTable(name="mro_contact")
     */
    private $mro_contact;


    /**
     *
     * @var MailUser[]
     * @ORM\ManyToMany(targetEntity="MailUser", inversedBy="mail_mro")
     * @ORM\JoinTable(name="mro_mailuser")
     */
    private $mro_mailuser;


//    private $em;



    /**
     * Constructor
     */
//    public function __construct(\Doctrine\ORM\EntityManager $em)
//    {
//        $this->em = $em;
//    }


    public function __toString()
    {
        return $this->getName();
    }


    public function getStatus()
    {
        $exp = $this->getExpirationdate();
        $exp = date_create($exp->format('Y-m-d'));
        $today = date_create(date('Y-m-d'));
        if($exp <= $today)
            echo '<div style="color: red">Expired</div>';
        else{
            $dif = date_diff($exp, $today);
            if($dif->days > 45)
                echo '<div style="color: #4dff18">Current</div>';
            else
                echo '<div style="color: #1b0eff">' .$dif->days.' days left</div>';
        }
        return '';

    }


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
     * @return Mro
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
     * Set city
     *
     * @param string $city
     * @return Mro
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * Set remarks
     *
     * @param string $remarks
     * @return Mro
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string 
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Mro
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param File $doc
     */
    public function setDocFile(File $doc = null)
    {
        $this->docFile = $doc;
    }

    /**
     * @return File
     */
    public function getDocFile()
    {
        return $this->docFile;
    }


    /**
     * @param File $ofac
     */
    public function setOfacFile(File $ofac = null)
    {
        $this->ofacFile = $ofac;
    }

    /**
     * @return File
     */
    public function getOfacFile()
    {
        return $this->ofacFile;
    }

    /**
     * Set doc
     *
     * @param string $doc
     * @return Mro
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;

        return $this;
    }

    /**
     * Get doc
     *
     * @return string 
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * Set ofac
     *
     * @param string $ofac
     * @return Mro
     */
    public function setOfac($ofac)
    {
        $this->ofac = $ofac;

        return $this;
    }

    /**
     * Get ofac
     *
     * @return string 
     */
    public function getOfac()
    {
        return $this->ofac;
    }

    /**
     * Set issuedate
     *
     * @param \DateTime $issuedate
     * @return Mro
     */
    public function setIssuedate($issuedate)
    {
        $this->issuedate = $issuedate;

        return $this;
    }

    /**
     * Get issuedate
     *
     * @return \DateTime 
     */
    public function getIssuedate()
    {
        return $this->issuedate;
    }

    /**
     * Set expirationdate
     *
     * @param \DateTime $expirationdate
     * @return Mro
     */
    public function setExpirationdate($expirationdate)
    {
        $this->expirationdate = $expirationdate;

        return $this;
    }

    /**
     * Get expirationdate
     *
     * @return \DateTime 
     */
    public function getExpirationdate()
    {
        return $this->expirationdate;
    }

    /**
     * Set continent
     *
     * @param \SysBackenBundle\Entity\Continent $continent
     * @return Mro
     */
    public function setContinent(\SysBackenBundle\Entity\Continent $continent = null)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return \SysBackenBundle\Entity\Continent 
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set country
     *
     * @param \SysBackenBundle\Entity\Country $country
     * @return Mro
     */
    public function setCountry(\SysBackenBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \SysBackenBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set state
     *
     * @param \SysBackenBundle\Entity\State $state
     * @return Mro
     */
    public function setState(\SysBackenBundle\Entity\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \SysBackenBundle\Entity\State 
     */
    public function getState()
    {
        return $this->state;
    }



    /**
     * Set doctype
     *
     * @param \SysBackenBundle\Entity\Nomencladores $doctype
     * @return Mro
     */
    public function setDoctype(\SysBackenBundle\Entity\Nomencladores $doctype = null)
    {
        $this->doctype = $doctype;

        return $this;
    }

    /**
     * Get doctype
     *
     * @return \SysBackenBundle\Entity\Nomencladores 
     */
    public function getDoctype()
    {
        return $this->doctype;
    }

    /**
     * Set ofactype
     *
     * @param \SysBackenBundle\Entity\Nomencladores $ofactype
     * @return Mro
     */
    public function setOfactype(\SysBackenBundle\Entity\Nomencladores $ofactype = null)
    {
        $this->ofactype = $ofactype;

        return $this;
    }

    /**
     * Get ofactype
     *
     * @return \SysBackenBundle\Entity\Nomencladores 
     */
    public function getOfactype()
    {
        return $this->ofactype;
    }





    /**
     * Add mro_contact
     *
     * @param \SysBackenBundle\Entity\Contact $mroContact
     * @return Mro
     */
    public function addMroContact(\SysBackenBundle\Entity\Contact $mroContact)
    {
        $this->mro_contact[] = $mroContact;

        return $this;
    }

    /**
     * Remove mro_contact
     *
     * @param \SysBackenBundle\Entity\Contact $mroContact
     */
    public function removeMroContact(\SysBackenBundle\Entity\Contact $mroContact)
    {
        $this->mro_contact->removeElement($mroContact);
    }

    /**
     * Get mro_contact
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMroContact()
    {
        return $this->mro_contact;
    }



    public function getContactList(){

        $contacts = $this->getMroContact();
        $return = Array();
        $obj = Array();
        foreach($contacts as $contact){
            $obj['id'] = $contact->getID();
            $obj['name'] = $contact->getFirstName();
            $obj['lastname'] = $contact->getLastName();
            $obj['title'] = $contact->getJobTitle();
            $obj['email1'] = $contact->getEmail1();
            $obj['email2'] = $contact->getEmail2();
            $obj['email3'] = $contact->getEmail3();
            $obj['telephone'] = $contact->getTelephone();
            $obj['mobile'] = $contact->getMobile();
            $obj['fax'] = $contact->getFax();
            $obj['address1'] = $contact->getAddress1();
            $obj['address2'] = $contact->getAddress2();
            $obj['country'] = $contact->getCountry();
            $obj['group'] = $contact->getContactgroup();
            $obj['list'] = true;
            $obj['main'] = false;
            $return[] = $obj;
        }

        $obj['id'] = $this->getID();
        $obj['name'] = 'mainID';
        $obj['list'] = false;
        $obj['main'] = true;
        $return[] = $obj;

        return $return;
    }


    public function getContactListExpand(){

        $contacts = $this->getMroContact();
        $return = Array();
        foreach($contacts as $contact){
            $obj['id'] = $contact->getID();
            $obj['name'] = $contact->getFirstName();
            $obj['lastname'] = $contact->getLastName();
            $obj['title'] = $contact->getJobTitle();
            $obj['telephone'] = $contact->getTelephone();
            $obj['mobile'] = $contact->getMobile();
            $obj['fax'] = $contact->getFax();
            $obj['address1'] = $contact->getAddress1();
            $obj['address2'] = $contact->getAddress2();
            $obj['country'] = $contact->getCountry();
            $obj['group'] = $contact->getContactgroup();
            $return[] = $obj;
        }
        return $return;
    }

    public function getMailUserList(){


        $users = $this->getMroMailuser();
        foreach($users as $user){
            $obj['id'] = $user->getId();
            $obj['name'] = $user->getName();
            $return[] = $obj;
        }
        return $return;

    }



    /**
     * Set certificatenumber
     *
     * @param string $certificatenumber
     * @return Mro
     */
    public function setCertificatenumber($certificatenumber)
    {
        $this->certificatenumber = $certificatenumber;

        return $this;
    }

    /**
     * Get certificatenumber
     *
     * @return string 
     */
    public function getCertificatenumber()
    {
        return $this->certificatenumber;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->isActive = true;
        $this->mro_contact = new \Doctrine\Common\Collections\ArrayCollection();
        $this->mro_mailuser = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mro_mailuser
     *
     * @param \SysBackenBundle\Entity\MailUser $mroMailuser
     * @return Mro
     */
    public function addMroMailuser(\SysBackenBundle\Entity\MailUser $mroMailuser)
    {
        $this->mro_mailuser[] = $mroMailuser;

        return $this;
    }

    /**
     * Remove mro_mailuser
     *
     * @param \SysBackenBundle\Entity\MailUser $mroMailuser
     */
    public function removeMroMailuser(\SysBackenBundle\Entity\MailUser $mroMailuser)
    {
        $this->mro_mailuser->removeElement($mroMailuser);
    }

    /**
     * Get mro_mailuser
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMroMailuser()
    {
        return $this->mro_mailuser;
    }

    /**
     * Add mro_airecraft
     *
     * @param \SysBackenBundle\Entity\Airecraft $mroAirecraft
     * @return Mro
     */
    public function addMroAirecraft(\SysBackenBundle\Entity\Airecraft $mroAirecraft)
    {
        $this->mro_airecraft[] = $mroAirecraft;

        return $this;
    }

    /**
     * Remove mro_airecraft
     *
     * @param \SysBackenBundle\Entity\Airecraft $mroAirecraft
     */
    public function removeMroAirecraft(\SysBackenBundle\Entity\Airecraft $mroAirecraft)
    {
        $this->mro_airecraft->removeElement($mroAirecraft);
    }

    /**
     * Get mro_airecraft
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMroAirecraft()
    {
        return $this->mro_airecraft;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Mro
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set mroactive
     *
     * @param \SysBackenBundle\Entity\Nomencladores $mroactive
     * @return Mro
     */
    public function setMroactive(\SysBackenBundle\Entity\Nomencladores $mroactive = null)
    {
        $this->mroactive = $mroactive;

        return $this;
    }

    /**
     * Get mroactive
     *
     * @return \SysBackenBundle\Entity\Nomencladores 
     */
    public function getMroactive()
    {
        return $this->mroactive;
    }
}
