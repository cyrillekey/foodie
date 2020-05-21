<?php
class product extends DB{
    function get(){
        return $this->fetch(
            "Select * from product_table",null,"product_id");

    }
    function add($name,$Image,$product_Id,$desc,$price,$stock){
        return $this->exec("Insert into product_table(product_id,product_name,product_unit_price,product_desc,product_stock,product_image)values(?,?,?,?,?,?)",
        [$product_Id,$name,$price,$desc,$stock,$Image]);

    }
    function edit($name,$Image,$product_Id,$desc,$price,$stock){
        return $this->exec("UPDATE product_table SET product_name=?,product_unit_price=?,product_desc=?,product_stock=?,product_image=? where product_id=?)values(?,?,?,?,?,?)",
        [$name,$price,$desc,$stock,$Image,$product_Id]);

    }
    
  function del ($product_Id) {
    // del () : delete product
  
      return $this->exec(
        "DELETE FROM product_table WHERE `product_id`=?",
        [$product_Id]
      );
    }

}
?>