<?php
if (isset($_GET)) {
    $notas = $_GET["notas"]?? "3,6,9";
    
    $absoluto = 0;
    $notasExplode = explode(",", $notas);
    

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medidas de tendência Central e de Disperção</title>
        <style>
            * {

                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                padding: 30px;
                background-image: url("https://cdn4.amcn.in/a/kristiyan15.alle.bg/assets/b696d82bff7d-w700-c999999999-opng/us9e3w27grrrcga183ylvt4.webp");

                background-attachment: fixed;
            }

             main {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                backdrop-filter: blur(10px);
                padding: 20px;
                border-radius: 20px;
            }

            h1,
            p {
                color: #fff;
                backdrop-filter: blur(10px);
                margin: 15px auto;
                text-align: center;
            }

            p {
                background-color: transparent;
                border-radius: 15px;

            }

            #container {
                width: 100%;
                height: 100%;
            }

            form {
                font-weight: 24px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                margin: auto;
                width: 100%;
                height: 30%;
            }

            input {
                width: 100%;
                height: 100%;
                background-color: whitesmoke;
                border: none;

            }

            button {
                text-align: center;
                padding: 10px;
                margin-top: 5px;
                width: 100%;
                border: none;
                transition: 0.3s ease-in-out;

            }

            button:hover {
                padding-bottom: 20px;
                font-size: 30px;
                color: antiquewhite;
                background-color: #000;
                width: 102%;
                height: 35%;
                border-radius: 10px;
                box-shadow: 3px 3px 3px #000;
            }

            #resposta {
                margin-top: 10px;
                padding: 20px;
                border-radius: 15px;
                color: #fff;
                border: 3px solid whitesmoke;
                background-color: black;
            }
            summary {
                font-size: 16px;
                font-weight: 500;
                
            }
            summary:hover {
                font-size: 18px;
                font-weight: 600;
                
            }
            #comoCalc{
                margin-top: 20px;
                font-size: 18px;
                font-weight: 600;
                transition: 0.5s ease-in-out;
                max-width: 155px;
                margin-bottom: 20px;
            }
            #comoCalc:hover{
                margin-top: 20px;
                font-size: 24px;
                font-weight: 600;
                max-width: 200px;
            }
            @media (max-width:488px) {
                main {
                    height: 50%;
                }

                input {
                    width: 60%;
                    height: 60%;
                }

                button {
                    width: 60%;
                }

                button:hover {
                    font-size: 15px;
                    color: antiquewhite;
                    background-color: #000;
                    width: 60%;
                    height: 50px;
                }
            }

            @media (orientation:landscape) {
                #conteiner {

                    display: flex;
                }

                main {
                    margin-left: 20px;
                }

            }
        </style>
    </head>

    <body>

        <main>
            <h1>Vamos Calcular!</h1>
            <p>Vamos fazer o seguinte, aqui em baixo temos um campo<br>onde você poderá inserir a sua lista de valores </p>
            <form action="matematicaComphp.php" method="get">
                <input required name="notas" placeholder="ex: 3, 6, 9.5, 18" type="text" value=<?php echo implode(",", $notasExplode) ?>>
                <button>"Vamo viajar!!"</button>
            </form>
        </main>
        <div id="resposta">
        <?php

        #Getulio É o Cara!
        //estatistica e probabilidade (desvio e média);
        echo "";
        $media = array_sum($notasExplode) / count($notasExplode);
        echo "<h3><i>x => (<sub>i= 1</sub> Σ<sup>n</sup>)÷n</i><br><br></h3>";
        echo "Média Aritimética " . number_format($media, 2) . "<hr>";

        foreach ($notasExplode  as $value) {
            $absoluto +=  abs($value - $media);
        }
        $desvio = $absoluto / count($notasExplode);
        if ($desvio == 0)
            echo "<br>Valor do desvio é de:" . number_format($desvio, 2) . "<br>desvio provavelmente inexistente<hr>";
        else if ($desvio > 0 && $desvio < 2)
            echo "<br>Valor do desvio é de:" . number_format($desvio, 2) . "<br>desvio baixo<hr>";
        else if ($desvio >= 2)
            echo "<br>Valor do desvio é de:" . number_format($desvio, 2) . "<br>desvio acima do esperado<hr>";

        $quadradodoDesvios_somados = 0;
        foreach ($notasExplode  as $value) {
            $quadradodoDesvios_somados +=  abs($value - $media) ** 2;
        }

        $variancia = $quadradodoDesvios_somados / count($notasExplode);
        $desvioPadrão = sqrt($variancia);
        echo  "<br>Variancia é de " . number_format($variancia, 3) . "<hr>";
        echo  "<br>Desvio Padrão é de" . number_format($desvioPadrão, 3) . "<hr>";
    } else {
        header("location: matematicaComphp.php");
    }
        ?>
        <br>
        <details>
        <summary id="comoCalc">Como resolver?</summary>
        <details>
            <summary>Média Aritimética</summary>
        <p>Para os nossos cálculos é importante acima de tudo saber a média aritimética, pois ela será de extrema importância pra a nossa resolução<br>
            Cálculo da Média aritimética:<br><br>
            (
            <?php
            $i = 0;
            while ($i <= count($notasExplode) - 1) {
                if ($i != count($notasExplode) - 1) {
                    if($notasExplode[$i] < 0){
                        echo "(".$notasExplode[$i].")" . "+";
                    }else{
                        echo $notasExplode[$i] . "+";
                    }
                    
                } else {
                    if($notasExplode[$i] < 0){
                        echo "(".$notasExplode[$i].")";
                    }else{
                        echo $notasExplode[$i];
                    }
                    break;
                }
                $i++;
            }
            ?>
            ) /<?= count($notasExplode) ?>;<br>
            x = <?= $media ?>
        </p>
        </details>
        <details>
        <summary>Desvio:</summary>
        <p>É a diferença entre cada valor e a sua média aritimética<br>Já que temos a média, basta calcular cada elemento subtraido desse valor sempre considerando que o resultado será sempre positivo, por se tratar do módulo<br><br> (
            <?php
            $d = 0;
            while ($d <= count($notasExplode) - 1) {
                if ($d == count($notasExplode) - 1) {
                    if($notasExplode[$d] < 0){
                        echo " | " ."(".$notasExplode[$d].")" . "-" . $media . " | ";
                    }else{
                        echo " | " .$notasExplode[$d] . "-" . $media . "| ";
                    }
                   
                } else {
                    if($notasExplode[$d] < 0){
                        echo " | " ."(".$notasExplode[$d].")". "-" . $media . " | " . "+ ";
                    }else{
                        echo " | " . $notasExplode[$d] . "-" . $media . " | " . "+ ";
                    }
                    
                }
                $d++;
            }
            ?>
            ) /<?= count($notasExplode) ?>;<br>
            d = <?= $desvio ?>
        </p>
        </details>
        <details>
        <summary>Variancia:</summary>
        <p>É o valor correspondente á média aritimética dos quadrados dos desvios em relação a média aritimética:<br><br> (
            <?php
            $d = 0;
            while ($d <= count($notasExplode) - 1) {
                if ($d == count($notasExplode) - 1) {
                    if($notasExplode[$d] < 0){
                        echo "( | " ."(".$notasExplode[$d].")" . "-" . $media . " | )<sup>2</sup>";
                    }else{
                        echo "( | " . $notasExplode[$d] . "-" . $media . " | )<sup>2</sup>";
                    }
                } else {
                    if($notasExplode[$d] < 0 ){
                        echo "( | " ."(".$notasExplode[$d].")" . "-" . $media . " | )<sup>2</sup> " . "+ ";
                    }else{
                        echo "( | " . $notasExplode[$d] . "-" . $media . " | )<sup>2</sup> " . "+ ";
                    }
                    
                }
                $d++;
            }
            ?>
            ) /<?= count($notasExplode) ?>;<br>
            v = <?= $variancia ?>
        </p>
        </details>
        <details>
        <summary>Desvio padrão:</summary>

        <p>Corresponde a raiz quadrada da variãncia..
            <br><br>
            dp = &#8730;<?= $variancia ?><br>
            dp =<?= number_format($desvioPadrão, 3) ?>

        </p>
        </details>
        </div>
        </details>

    </body>

    </html>