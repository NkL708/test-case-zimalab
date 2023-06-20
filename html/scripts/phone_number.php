<?
class PhoneNumber {
    private int $id;
    private string $number;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNumber() { 
        return $this->number;
    }
    public function setNumber($number) {
        $this->number = $number;
    }

    public function __construct($id, $number) {
        $this->id = $id;
        $this->number = $number;
    }
}
