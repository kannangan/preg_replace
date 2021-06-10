<!DOCTYPE html>

<html>

<body>



<?php

ini_set('display_errors', '1');

class test {

    private $template;

    public

    function __construct($template)

    {

        $this->template=$template;

    }



    public

    function resolve($data)

    {

        $arr =  explode(" ", $this->template);

        $resolvedString = "";

        foreach($arr as $k) {

            if(preg_match("/{(.*)}/", $k, $match)) {

                $resolvedString .= $data[$match[1]];

            } else {

                $resolvedString .= $k;

            }

            $resolvedString .= " ";

        }

        return $resolvedString;

    }

}



$template = "Hi {greeting}, we've received your Order {ordernumber}, over {amount} pieces of {productname}";



$data = [

    "greeting" => "Mr. Mister",

    "ordernumber" => 12345,

    "amount" => 12,

    "productname" => "Steel Scissors",

    "gtin" => "673428734682736"

];



$tr = new test ($template); // just creating instance of class and call resolve method.



try {

    $result = $tr->resolve($data);

} catch (Exception $e) {



}



echo $result;

?>

</body>

</html>
