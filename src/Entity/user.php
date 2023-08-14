<?php
namespace App\Entity;

use Doctrine\ORM\Mapping\Id;

class user{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private  ?int $id;
    /**
     * @ORM\Columt(type="text")
     */
    private string $name;
    /**
     * @ORM\Columt(type="text")
     */
    private string $email;
       /**
     * @ORM\Columt(type="text")
     */
    private string $gender;
       /**
     * @ORM\Columt(type="text")
     */
    private string $status;


 // Getter dla id
 public function getId(): int
 {
     return $this->id;
 }
 public function setId(int $id )
{
    $this->id = $id;
}
 // Getter i Setter dla name
 public function getName(): string
 {
     return $this->name;
 }

 public function setName(string $name): void
 {
     $this->name = $name;
 }

 // Getter i Setter dla email
 public function getEmail(): string
 {
     return $this->email;
 }

 public function setEmail(string $email): void
 {
     $this->email = $email;
 }

 // Getter i Setter dla gender
 public function getGender(): string
 {
     return $this->gender;
 }

 public function setGender(string $gender): void
 {
     $this->gender = $gender;
 }

 // Getter i Setter dla status
 public function getStatus(): string
 {
     return $this->status;
 }

 public function setStatus(string $status): void
 {
     $this->status = $status;
 }

}




