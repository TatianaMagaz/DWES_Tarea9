<?php 
/**
 * El script que establece la conexión con https://catfact.ninja/fact?max_length=200
 * y recibe la respuesta en JSON
 */
try{
    //Devolvemos el contenido en JSON de la API catfact
    $cat_fact_json = file_get_contents('https://catfact.ninja/fact?max_length=200');
    //Descodificamos el formato JSON
    $cat_fact = json_decode($cat_fact_json);
    //Si obtenemos el objeto y la propiedad de hecho
    if ($cat_fact && isset($cat_fact->fact)) {
        //Mostramos el hecho
        $fact = $cat_fact->fact;
    } else {
        //Si no hemos podido obtener el resultado, lanzamos el mensaje
        $fact = "Could not get any fact about cats at the moment :(";
    }
    //Imprimimos el hecho de gato
    echo $fact;
    //En el caso del error, lanzamos el mensaje
} catch (Exception $e) {
    echo "An error occured: " . $e->getMessage();
}
?>