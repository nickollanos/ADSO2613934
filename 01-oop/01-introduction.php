<?php
#Linear Programing
$num1 = 54;
$num2 = 32;

echo "{$num1} * {$num2} = " . ($num1 * $num2);

$string = "Hello";
echo" MD5($string) =  ".md5($string);
echo"<br>";
echo"PASSWORD_HASH({$string}) = " . password_hash($string, PASSWORD_DEFAULT);
echo"<br>";
$hash= password_hash($string, PASSWORD_DEFAULT);
if (password_verify($string, $hash)){
    echo "Verified Succesful!";
}

# Structured Programing
function add($num1, $num2){
    return $num1 + $num2;
}

echo add(2, 5);

# Object Oriented Programing
Class Adition {
    public $num1;
    public $num2;

    public function getResult(){
        return($this->num1 + $this->num2);
    }
}

#if(isset($_POST['num1']) && isset($_POST['num2'])){
#$sum = new Adition;
#$sum->num1 = $_POST['num1'];
#$sum->num2 = $_POST['num2'];
#echo "La suma de {$sum->num1} y {$sum->num2} es: " . $sum->getResult(); 
#}else{
  #  echo"No ingreso un valor valido";
#}
#?>
<style>
    action {
    form {
        display: flex;
        flex-direction: column;
        padding: 10px;
        width: 300px;

        label {
            display: flex;
            gap: 1rem;
        }

        output {
            font-size: 1.4rem;
        }

        button {
            background-color: red;
            border: none;
            font-size: 1rem;
            width: 260px;
            padding: 1rem;
        }

        div.result {
            margin-top: 1rem;
            font-size: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
            background-color: green;
            width: 240px;
        }
    }
}
</style>
<main>
  <form action="" method="post">
    <label>
        <p>Number 1:</p>
        <input type="range" name="n1" step="1" value="0" max="99" oninput="o1.value=this.value">
        <output id="o1">0</output>
    </label>
    <label>
        <p>Number 2:</p>
        <input type="range" name="n2" step="1" value="0" max="99" oninput="o2.value=this.value">
        <output id="o2">0</output>
    </label><br><br>
    <button>CALCULAR</button>
    <div class="result">
<?php
if($_POST) {
    $sum = new Adition;
$sum->num1 = $_POST['n1'];
$sum->num2 = $_POST['n2'];
echo "La suma de {$sum->num1} y {$sum->num2} es: " . $sum->getResult();
}

?>
</div>
  </form>
</main>




