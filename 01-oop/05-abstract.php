<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04-inheritance</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        section {
            background-color: #0009;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            table{
                width: 100%; /* Ajusta la tabla al ancho del contenedor */
                border-collapse: collapse;

                thead {
                    border-radius: 10px;
                    background-color: rgb(121, 128, 134);
                }
                    tr:nth-child(even) {
                        background-color: hsla(320, 63%, 71%, 0.3);
                    }

                    td, th {
                        padding: 8px; /* Añade espacio interno a las celdas */
                        text-align: center; /* Centra el texto en las celdas */
                    }

                }

            h2 {
                margin: 0;
            }

            img {
                width: 60px; /* Tamaño deseado en píxeles */
                height: auto; /* Esto asegura que la imagen se ajuste correctamente manteniendo su relación de aspecto */
            }

            div.pks {
                display: flex;
                gap: 1rem;

                div.pk {
                    background-repeat: no-repeat;
                    display: flex;
                    position: relative;
                    flex-direction: column;
                    height: 308px;
                    overflow: hidden;
                    padding: 4px;
                    width: 141px;

                    div.info {
                        background-color: #0009;
                        border-bottom: 2px solid #fffc;
                        color: #fffa;
                        display: flex;
                        flex-direction: column;
                        position: absolute;
                        bottom: -52px;
                        left: 2px;
                        padding: 4px;
                        transition: bottom 0.4s ease-in;
                        width: 128px;

                        span:nth-child(1) {
                            background-color: #0009;
                            color: #fff;
                            text-align: center;
                            margin-bottom: 4px;
                        }
                    }
                }

                th{
                    border:#fff;
                }

                div.pk:hover div.info {
                    bottom: 0;
                }
            }
        }
    </style>
</head>

<body>
    <nav class="controls">
        <a href="../index.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#74C0FC" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
            </svg>
        </a>
    </nav>
    <main>
        <h1>05-Abstract</h1>
        <section>
            <?php
            abstract class DataBase
            {
                // Atriburtes
                protected $host;
                protected $user;
                protected $pass;
                protected $dbname;
                protected $conx;

                public function __construct(
                    $dbname,
                    $host = 'localhost',
                    $user = 'root',
                    $pass = ''
                ) {
                    $this->host = $host;
                    $this->user = $user;
                    $this->pass = $pass;
                    $this->dbname = $dbname;
                }


                public function connect()
                {
                    try {
                        $this->conx = new PDO("mysql:host=$this->host;
                        dbname=$this->dbname", $this->user, $this->pass);
                        if ($this->conx) { 
                            ;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                  
               //    try {
               //     $this->conx = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
                   // Habilitar el manejo de errores de PDO
               //     $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               //     echo "Conexión exitosa";
               // } catch (PDOException $e) {
               //     echo "Error: " . $e->getMessage();
               // }
                }

            }

            class Pokemon extends DataBase
            {
                public function obtenerPokemons() {
                    $query = "SELECT id, name, type, health, image FROM pokemons";
                   // $resultado = $this->conx ->query($query);
            
                   // if ($resultado->num_rows > 0) {
                   //     $pokemons = array();
                   //     while ($fila = $resultado->fetch_assoc()) {
                   //         $pokemons[] = $fila;
                   //     }
                   //     return $pokemons;
                   // } else {
                   //     return array();
                   // }

                   try {
                    $stmt = $this->conx->query($query);
                    $pokemons = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $pokemons;
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    return array();
                }

                }
            }

            $db = new Pokemon('adso2613934');
            $db->connect();


            $pokemons = $db->obtenerPokemons();

            echo "<div class='pk'>" .
                "<table>" .
                "<thead>" .
                    "<tr>" .
                        "<th>Id</th>" .
                        "<th>Name</th>" .
                        "<th>Type</th>" .
                        "<th>Health</th>" .
                        "<th>Image</th>" .
                    "</tr>" .
                "</thead>" .
                "<tbody> " ;
        
            foreach ($pokemons as $pokemon) {
                    echo                
                        "<tr> " .
                            "<td>" . $pokemon['id'] . "</td>" .
                            "<td>" . $pokemon['name'] . "</td>" .
                            "<td>" . $pokemon['type'] . "</td>" .
                            "<td>" . $pokemon['health'] . "</td>" .
                            "<td>" .  "<img src='img/" . $pokemon['image'] . "'>" . "</td>" .
                        "</tr>" ;
             }

             echo "</tbody>" .
             "</table>" .
             "</div>";

            $db = new Pokemon('adso2613934');
            $db->connect();


            ?>
        </section>
    </main>
</body>

</html>