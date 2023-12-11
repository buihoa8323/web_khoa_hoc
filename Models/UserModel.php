<?php
class UserModel {
    private $use_id;
    private $user_name;
    private $user_pass;
    private $user_dob;
    private $user_address;
    private $user_mail;
    private $user_role;
    private $created_at;
    private $updated_at;

    public function __construct()
    {
        return $this;
    }

    public function UserModel($use_id, $user_name, $user_pass, $user_dob, $user_address, $user_mail, $user_role, $created_at, $updated_at) {
        $this->use_id = $use_id;
        $this->user_name = $user_name;
        $this->user_pass = $user_pass;
        $this->user_dob = $user_dob;
        $this->user_address = $user_address;
        $this->user_mail = $user_mail;
        $this->user_role = $user_role;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getUseId() {
        return $this->use_id;
    }

    public function setUseId($use_id) {
        $this->use_id = $use_id;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function setUserName($user_name) {
        $this->user_name = $user_name;
    }

    public function getUserPass() {
        return $this->user_pass;
    }

    public function setUserPass($user_pass) {
        $this->user_pass = $user_pass;
    }

    public function getUserDob() {
        return $this->user_dob;
    }

    public function setUserDob($user_dob) {
        $this->user_dob = $user_dob;
    }

    public function getUserAddress() {
        return $this->user_address;
    }

    public function setUserAddress($user_address) {
        $this->user_address = $user_address;
    }

    public function getUserMail() {
        return $this->user_mail;
    }

    public function setUserMail($user_mail) {
        $this->user_mail = $user_mail;
    }

    public function getUserRole() {
        return $this->user_role;
    }

    public function setUserRole($user_role) {
        $this->user_role = $user_role;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }
}
?>