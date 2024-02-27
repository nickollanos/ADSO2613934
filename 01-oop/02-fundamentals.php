<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02-Fundamentals</title>
    <style>
        section {
            background-color: grey;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            h2 {
                margin: 0;
            } 

            ul {
                padding: 0;
                margin: 0;
            }

            figure {
                background-color: #fff3;
                border: 2px solid #fff6;
                border-radius: 8px;
                font-size: 10rem;
                margin: 0;
            }

            form {
                display: flex;
                justify-content: space-between;
                gap: 4rem;
                width: 80%;
                button {
                    border: 2px solid #fff6;
                    background-color: #994bde;
                    border-radius: 8px;
                    color: #fff9;
                    cursor: pointer;
                    font-size: 1rem;
                    width: 100px;
                    padding: 0.6rem;
                }
            }
        }
    </style>
</head>

<body>
<main>
    <h1>02-Fundamentals</h1>
    <section>
<?php

class Runner {
    // Atributes
    public $name;
    public $age;
    public $number;

    // Methods
    public function __construct($name, $age, $number) {
        $this->name  = $name;
        $this->age  = $age;
        $this->number  = $number;
    }

    public function run() {
        return "<img src='img/run.gif'>";
    }

    public function stop() {
        return "🖐";
    }

    public function jump() {
        return "🤾‍♀️";
    }
}

$runner = new Runner('Radamel', 35, 105);
?>
<h2>Class Runner</h2>
            <ul>
                <li>Name:   <?=$runner->name ?></li>
                <li>Age:    <?=$runner->age ?></li>
                <li>Number: <?=$runner->number ?></li>
            </ul>
            <figure>
                <?php

               if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["accion"])) {
                    $accion = $_POST["accion"];
                    switch ($accion) {
                        case "run":
                            echo $runner->run();
                            break;
                        case "stop":
                            echo $runner->stop();
                            break;
                        case "jump":
                            echo $runner->jump();
                            break;
                        default:
                        echo $runner->stop();
                    }
                }else{
                    echo $runner->stop();
                }
            }

                ?>
            </figure>
            <form action="" method="post">
                <button type="submit" name="accion" value="run"> Run </button>
                <button type="submit" name="accion" value="stop"> Stop </button>
                <button type="submit" name="accion" value="jump"> Jump </button>
            </form>
    </section>
</main>
</body>

</html>