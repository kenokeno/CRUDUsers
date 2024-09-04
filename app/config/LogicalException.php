<?php 
class LogicalException extends Exception{
    protected $details;
    protected $severity;

    public function __construct($details, $severity) {
        $this->details = $details;
        $this->severity = $severity;
        parent::__construct();
    }

    public function __toString() {
        return 'Error: ' . $this->details;
    }
}
?>