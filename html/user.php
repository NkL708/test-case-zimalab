<?
class User {
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $companyName;
    private $position;

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

    public function __construct($id, $firstName, $lastName, 
        $email, $companyName, $position) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->companyName = $companyName;
        $this->position = $position;
    }
}
