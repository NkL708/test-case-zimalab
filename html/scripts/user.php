<?
require 'phone_number.php';
class User {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private array $phoneNumbers;
    private string $companyName;
    private string $position;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getFirstName() {
        return $this->firstName;
    }
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhoneNumbers() {
        return $this->phoneNumbers;
    }

    public function addPhoneNumber(PhoneNumber $phoneNumber) {
        $this->phoneNumbers[] = $phoneNumber;
    }

    public function setPhoneNumbers($phoneNumbers) { 
        $this->phoneNumbers = $phoneNumbers;
    }

    public function removePhoneNumber(PhoneNumber $phoneNumber) {
        $index = array_search($phoneNumber, $this->phoneNumbers);
        if ($index !== false)
            unset($this->phoneNumbers[$index]);
    }

    public function getCompanyName() {
        return $this->companyName;
    }
    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }

    public function getPosition() {
        return $this->position;
    }
    public function setPosition($position) {
        $this->position = $position;
    }

    public function __construct($firstName, $lastName, 
        $email, $companyName, $position) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumbers = array();
        $this->companyName = $companyName;
        $this->position = $position;
    }
}
