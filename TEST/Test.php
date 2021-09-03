<?php 
    include_once ('Conna.php');
    use PHPUnit\Framework\TestCase;

    class Test extends TestCase{

        public function testAddUsuarioBd(){
            $conn = new Conexion();
            
            $this->assertTrue($conn->add("prueba usuario","prueba contraseña"));
        }
    }
?>