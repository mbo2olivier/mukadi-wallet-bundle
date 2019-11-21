<?php
/**
 * This file is part of the mukadi/wallet-bundle
 * (c) 2019 Genius Conception
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mukadi\WalletBundle\Model;
use Mukadi\Wallet\Core\HolderInterface;

/**
 * Class Holder.
 * 
 * @author Olivier M. Mukadi <olivier.m@geniusconception.com>
 */
abstract class Holder  implements HolderInterface
{
    /** @var  integer */
    protected $id;
    /** @var string   */
    protected $address;
    /** @var  string */
    protected $country;
    /** @var  \DateTime */
    protected $createdAt;
    /** @var  string */
    protected $email;
    /** @var  string */
    protected $firstName;
    /** @var  string */
    protected $holderId;
    /** @var  string */
    protected $lastName;
    /** @var  string */
    protected $phone;
    /** @var  string */
    protected $phone2;
    /** @var  string */
    protected $platformId;
    /** @var  string */
    protected $profilId;
    /** @var  string */
    protected $registrationDoc;
    /** @var  string */
    protected $registrationDocId;
    /** @var  string */
    protected $state;
    /** @var  \DateTime */
    protected $updatedAt;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getHolderId()
    {
        return $this->holderId;
    }

    /**
     * @param string $holderId
     */
    public function setHolderId($holderId)
    {
        $this->holderId = $holderId;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * @param string $phone2
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;
    }

    /**
     * @return string
     */
    public function getPlatformId()
    {
        return $this->platformId;
    }

    /**
     * @param string $platformId
     */
    public function setPlatformId($platformId)
    {
        $this->platformId = $platformId;
    }

    /**
     * @return string
     */
    public function getProfilId()
    {
        return $this->profilId;
    }

    /**
     * @param string $profilId
     */
    public function setProfilId($profilId)
    {
        $this->profilId = $profilId;
    }

    /**
     * @return string
     */
    public function getRegistrationDoc()
    {
        return $this->registrationDoc;
    }

    /**
     * @param string $registrationDoc
     */
    public function setRegistrationDoc($registrationDoc)
    {
        $this->registrationDoc = $registrationDoc;
    }

    /**
     * @return string
     */
    public function getRegistrationDocId()
    {
        return $this->registrationDocId;
    }

    /**
     * @param string $registrationDocId
     */
    public function setRegistrationDocId($registrationDocId)
    {
        $this->registrationDocId = $registrationDocId;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


}
