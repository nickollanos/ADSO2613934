<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02-Fundamentals</title>
    <style>
    section {
   display: flex;
   flex-direction: column;
   align-items: center;
   gap: 1rem;
   padding: 10px;

   h2 {
    margin: 0;
   }

   figure {
    font-size: 10rem;
   }
}
</style>|
</head>

<body>
<main>
    <h1>02-Fundamentals</h1>
    <section>
<?php

class Runner {
    // Atributes
    private $name;
    private $age;
    private $number;

    // Methods
    public function __construct($name, $age, $number) {
        $this->name  = $name;
        $this->age  = $age;
        $this->number  = $number;
    }

    public function run() {
        return "🏃‍♂️";
    }

    public function stop() {
        return "🖐";
    }

    public function jump() {
        return "🤾‍♀️";
    }
}

$runner = new Runner('Radamel', 35, 105);
echo $runner->run();
echo $runner->jump();
echo $runner->stop();
echo $runner->run();
?>
    </section>
</main>
</body>

</html>