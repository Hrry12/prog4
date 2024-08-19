<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Calculadora de Huella de Carbono</title>
</head>
<body>
    <header>
        <h1>Calculadora de Huella de Carbono</h1>
        <nav>
            <a href="index.html">Importancia</a>
            <a href="calculo.php">Calcula tu Huella de Carbono</a>
            <a href="gestion.html">Gestion de Residuos</a>
            <a href="imagenes.html">Imagénes</a>
        </nav>
    </header>
    <main>
        <section id="Calculo">
            <h2>Un camino hacia un futuro sostenible</h2>
            <p>Conocer tu huella de carbono es como hacer una radiografía de tu impacto ambiental. Te permite:</p>
            <ul>
                <li>Tomar conciencia: Entender qué parte de este problema global te corresponde.</li>
                <li>Identificar áreas de mejora: Descubrir dónde puedes reducir más tus emisiones.</li>
                <li>Establecer metas: Fijarte objetivos claros para vivir de manera más sostenible.</li>
                <li>Contribuir al planeta: Ser parte de la solución al cambio climático.</li>
            </ul>
            <p>Al conocer tu huella de carbono, puedes tomar decisiones más informadas y hacer cambios en tu vida diaria que marquen la diferencia. Desde elegir medios de transporte más ecológicos hasta reducir tu consumo de energía, cada acción cuenta. ¡Súmate al cambio y reduce tu huella de carbono hoy mismo!</p>
        </section>
        <div id="resultado">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $electricidad = $_POST['electricidad'];
                $gas = $_POST['gas'];
                $agua = $_POST['agua'];
                $transporte = $_POST['transporte'];
                $vuelo = $_POST['vuelo'];
                $comida = $_POST['comida'];
                $residuos = $_POST['residuos'];
                $reciclaje = $_POST['reciclaje'];
                $ropa = $_POST['ropa'];
                $electrodomesticos = $_POST['electrodomesticos'];
                
                $factorElectricidad = 0.233; // kg CO2e por kWh
                $factorGas = 2.204; // kg CO2e por m³
                $factorAgua = 0.0003; // kg CO2e por litro
                $factorTransporte = 0.192; // kg CO2e por km en coche
                $factorVuelo = 90.0; // kg CO2e por hora de vuelo
                $factorResiduos = 1.5; // kg CO2e por kg de residuos
                $factorComida = 0.005; // kg CO2e por $ gastado en alimentos
                $factorRopa = 0.02; // kg CO2e por $ gastado en ropa
                $factorElectrodomesticos = 0.02; // kg CO2e por $ gastado en electrodomésticos
                
                $huellaElectricidad = $electricidad * $factorElectricidad;
                $huellaGas = $gas * $factorGas;
                $huellaAgua = $agua * $factorAgua;
                $huellaTransporte = $transporte * $factorTransporte;
                $huellaVuelo = $vuelo * $factorVuelo;
                $huellaResiduos = $residuos * $factorResiduos;
                $huellaComida = $comida * $factorComida;
                $huellaRopa = $ropa * $factorRopa;
                $huellaElectrodomesticos = $electrodomesticos * $factorElectrodomesticos;

    
                $huellaTotal = $huellaElectricidad + $huellaGas + $huellaAgua + $huellaTransporte + $huellaVuelo + $huellaResiduos + $huellaComida + $huellaRopa + $huellaElectrodomesticos;

                echo "<h2>Resultado del cálculo:</h2>";
                echo "<p>Tu huella de carbono es: " . round($huellaTotal, 2) . " kg CO2e.</p>";
            }
            ?>
        </div>
        <div class="form-container">
        <h1 id="titulo">Calculadora de CO2</h1>
        <form name="calculo de huella" method="post" action="">
            <label for="electricidad">Consumo de electricidad mensual (kWh):</label>
            <input type="text" id="electricidad" name="electricidad" required><br><br>

            <label for="gas">Consumo de gas mensual (m³):</label>
            <input type="text" id="gas" name="gas" required><br><br>

            <label for="agua">Consumo de agua mensual (m³):</label>
            <input type="text" id="agua" name="agua" required><br><br>

            <label for="transporte">Kilómetros en el carro por semana:</label>
            <input type="text" id="transporte" name="transporte" required><br><br>

            <label for="vuelo">Número de vuelos nacionales por año:</label>
            <input type="text" id="vuelo" name="vuelo" required><br><br>

            <label for="comida">Gasto mensual en comida (en $):</label>
            <input type="text" id="comida" name="comida" required><br><br>

            <label for="residuos">Producción de residuos (kg por semana):</label>
            <input type="text" id="residuos" name="residuos" required><br><br>

            <label for="reciclaje">Porcentaje de residuos reciclados (%):</label>
            <input type="text" id="reciclaje" name="reciclaje" required><br><br>

            <label for="ropa">Gasto anual en ropa (en $):</label>
            <input type="text" id="ropa" name="ropa" required><br><br>

            <label for="electrodomesticos">Gasto anual en electrodomésticos (en $):</label>
            <input type="text" id="electrodomesticos" name="electrodomesticos" required><br><br>

            <button id="cal" type="submit">Calcular</button>
        </form>
</div>
        
        
    </main>
    <button id="flotante" onclick="window.location.href='registro.php'"><b>REGISTRATE SI ERES DE LA LATINA</b></button>
</body>
</html>
