<?php
class SubjectModel {
    private $subject_id;
    private $subject_name;
    private $subject_des;

    public function __construct() {
      return $this;
    }

    public function SubjectModel($subject_id, $subject_name, $subject_des) {
        $this->subject_id = $subject_id;
        $this->subject_name = $subject_name;
        $this->subject_des = $subject_des;
        return $this;
    }

    public function getSubjectId() {
        return $this->subject_id;
    }

    public function setSubjectId($subject_id) {
        $this->subject_id = $subject_id;
    }

    public function getSubjectName() {
        return $this->subject_name;
    }

    public function setSubjectName($subject_name) {
        $this->subject_name = $subject_name;
    }

    public function getSubjectDes() {
        return $this->subject_des;
    }

    public function setSubjectDes($subject_des) {
        $this->subject_des = $subject_des;
    }
}
?>