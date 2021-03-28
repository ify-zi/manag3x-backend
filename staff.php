<?php 
    

class staff{
    private $errors= [];

    //adding to the inventory list
    public function add($product, $productCount, $supplier, $cost, $deliveryTime){
        if(empty($product && $productCount && $cost && $deliveryTime)){
            return $this->addError('inventory', 'fill all required fields');
        }
      $sql="INSERT INTO inventory (productName, numSupplied, supplier, cost, dTime), ($product, $productCount, $supplier, $cost, $deliveryTime) WHERE bizname=nothing";
      $data= mysqli_query($conn, $sql);  
    }

    public function update($product, $productCount, $supplier, $cost, $deliveryTime){
        if(empty($product && $productCount && $cost && $deliveryTime)){
            return $this->addError('inventory', 'fill all required fields');
        }
        elseif(is_numeric($productCount && $cost)){
            return $this->addError('inventory', 'amount of stocks and cost must be numeric');
        }
      $sql="UPDATE inventory set productName=$product, numSupplied=$productCount, supplier=$supplier, cost=$cost, dTime=$deliveryTime WHERE bizname=nothing";
      $data= mysqli_query($conn, $sql);  
    }

    public function deleteInventory(){
        $sql="DELETE * FROM inventory WHERE bizname=#";
        $cmd=mysqli_query($conn, $sql);

    }

    public function generateInvoice(){
        //i dont know how an invoice for a business look like

    }

    public function addCustomer($name, $location, $telNum,$email){
        if(empty($name && $telNum)){
             return $this->addError('customers', 'fill all required fields');
        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return $this->addError('customers', 'invalid email');
        }

        $sql="INSERT INTO customers (cName, clocation, cTellNum, cEmail), ('$name', '$location', '$telNum','$email') WHERE bizname=#";
        $data=mysqli_query($conn, $sql);
    }

   
    //so this functions are for only inventory and customer mangement


    private function addError($key, $msg){
        return $this->errors[$key] =$msg;
    }

}

//so please get back to me

?>