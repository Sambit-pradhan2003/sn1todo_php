<?php
echo "hello <br>";
// class MyClass {
//     public $publicProperty = "Public Property";
    
//     public function publicMethod() {
//         return "Public Method";
//     }
// }

// $obj = new MyClass();
// echo $obj->publicProperty; // Output: Public Property
// echo $obj->publicMethod(); // Output: Public Method



class MyClass {
    private $privateProperty ;
    
    public function privateMethod($privateProperty) {
        $this->privateProperty=$privateProperty;
        echo "hello at private  method <br>";
    }
    

    public function accessPrivate() {
        return $this->privateProperty;
    }
}

$obj = new MyClass();
// echo $obj->privateProperty; // This will throw an error
echo $obj->privateMethod("sn"); // This will throw an error
// echo $obj->accessPrivate1(); 
echo $obj->accessPrivate(); // Output: Private Property


?>
