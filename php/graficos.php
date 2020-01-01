<?php 
require_once('db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

$data="";
$aux="";

$sql_pedidos = "SELECT COUNT(id_pedido) as NumberOfPedidos ,MONTH(pedidos.data_pedido) as NumberMeses, YEAR(pedidos.data_pedido) from pedidos where MONTH(pedidos.data_pedido) <= MONTH(now()) and year(pedidos.data_pedido) <= year(now()) group by MONTH(pedidos.data_pedido),YEAR(pedidos.data_pedido) order by 3 asc, 2 asc LIMIT 0,12";

$resultado_pedidos= mysqli_query($link, $sql_pedidos);
while ($registro_pedidos = mysqli_fetch_array($resultado_pedidos)) {
 $aux=$registro_pedidos['NumberOfPedidos'];
 $data= $data.",".$aux;
}


$meses="";
$aux="";



$sql_pedidos = "SELECT COUNT(id_pedido) as NumberOfPedidos ,MONTH(pedidos.data_pedido) as NumberMeses, YEAR(pedidos.data_pedido) from pedidos where MONTH(pedidos.data_pedido) <= MONTH(now()) and year(pedidos.data_pedido) <= year(now()) group by MONTH(pedidos.data_pedido),YEAR(pedidos.data_pedido) order by 3 asc, 2 asc LIMIT 0,12";

$resultado_pedidos= mysqli_query($link, $sql_pedidos);
while ($registro_pedidos = mysqli_fetch_array($resultado_pedidos)) {
    switch ($registro_pedidos['NumberMeses']) {
        case 1:
        $aux="Janeiro";
        break;
        case 2:
        $aux="Fevereiro";
        break;
        case 3:
        $aux="Março";
        break;
        case 4:
        $aux="Abril";
        break;
        case 5:
        $aux="Maio";
        break;
        case 6:
        $aux="Junho";
        break;
        case 7:
        $aux="Julho";
        break;
        case 8:
        $aux="Agosto";
        break;
        case 9:
        $aux="Setembro";
        break;
        case 10:
        $aux="Outubro";
        break;
        case 11:
        $aux="Novembro";
        break;
        case 12:
        $aux="Dezembro";

    }
    $meses= $meses.",\"".$aux."\"";

}




echo "<script> var ctx = document.getElementById('GraficoPedidos').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [".substr($meses, 1)."],
        datasets: [{
            label: 'Quantidade de Pedidos',
            backgroundColor: 'orange',
            borderColor: 'white',
            data: [".substr($data, 1)."],
            }]
            },

    // Configuration options go here
            options: {}
            }); 




            </script>";

            $data="";
            $produtos="";

            $sql_itens = "SELECT COUNT(itens_pedidos.id_produto) as totalitens , produtos.nome_produto FROM itens_pedidos,produtos where produtos.id_produto = itens_pedidos.id_produto and produtos.id_categoria=1 GROUP BY itens_pedidos.id_produto ORDER BY COUNT(itens_pedidos.id_produto) desc LIMIT 6";

            $resultado_itens= mysqli_query($link, $sql_itens);
            while ($registro_itens = mysqli_fetch_array($resultado_itens)) {
               $aux=$registro_itens['totalitens'];
               $data= $data.",".$aux;

               $aux=$registro_itens['nome_produto'];
               $produtos= $produtos.",\"".$aux."\"";


           }

           echo "<script>
           Chart.defaults.global.defaultFontColor = 'white';
           var ctp = document.getElementById('GraficoPizzas').getContext('2d');
           var chart = new Chart(ctp, {
    // The type of chart we want to create
            type: 'doughnut',

    // The data for our dataset
            data: {
                labels: [".substr($produtos, 1)."],
                datasets: [{
                    label: 'Pizzas Mais Pedidas',
                    backgroundColor: ['green','orange','purple','red','brown','blue'],
                    data: [".substr($data, 1)."],

                    }]
                    },

    // Configuration options go here
                    options: {
                      title: {
                        display: true,

                    }
                }
                }); 

                </script>";




                $data="";
                $produtos="";

                $sql_itens = "SELECT COUNT(itens_pedidos.id_produto) as totalitens , produtos.nome_produto FROM itens_pedidos,produtos where produtos.id_produto = itens_pedidos.id_produto and produtos.id_categoria=2 GROUP BY itens_pedidos.id_produto ORDER BY COUNT(itens_pedidos.id_produto) desc LIMIT 6";

                $resultado_itens= mysqli_query($link, $sql_itens);
                while ($registro_itens = mysqli_fetch_array($resultado_itens)) {
                   $aux=$registro_itens['totalitens'];
                   $data= $data.",".$aux;

                   $aux=$registro_itens['nome_produto'];
                   $produtos= $produtos.",\"".$aux."\"";


               }

               echo "<script>

               var ctp = document.getElementById('GraficoLanches').getContext('2d');
               var chart = new Chart(ctp, {
    // The type of chart we want to create
                type: 'doughnut',

    // The data for our dataset
                data: {
                    labels: [".substr($produtos, 1)."],
                    datasets: [{
                        label: 'Lanches Mais Pedidas',
                        backgroundColor: ['green','orange','purple','red','brown','blue'],
                        borderColor: 'white',
                        data: [".substr($data, 1)."],

                        }]
                        },

    // Configuration options go here
                        options: {
                          title: {
                            display: true,
                            
                        }

                    }
                    }); 

                    </script>";



                    $data="";
                    $produtos="";

                    $sql_itens = "SELECT COUNT(itens_pedidos.id_produto) as totalitens , produtos.nome_produto FROM itens_pedidos,produtos where produtos.id_produto = itens_pedidos.id_produto and produtos.id_categoria=3 GROUP BY itens_pedidos.id_produto ORDER BY COUNT(itens_pedidos.id_produto) desc LIMIT 6";

                    $resultado_itens= mysqli_query($link, $sql_itens);
                    while ($registro_itens = mysqli_fetch_array($resultado_itens)) {
                       $aux=$registro_itens['totalitens'];
                       $data= $data.",".$aux;

                       $aux=$registro_itens['nome_produto'];
                       $produtos= $produtos.",\"".$aux."\"";


                   }

                   echo "<script>

                   var ctp = document.getElementById('GraficoBebidas').getContext('2d');
                   var chart = new Chart(ctp, {
    // The type of chart we want to create
                    type: 'doughnut',

    // The data for our dataset
                    data: {
                        labels: [".substr($produtos, 1)."],
                        datasets: [{
                            label: 'Bebidas Mais Pedidas',
                            backgroundColor: ['green','orange','purple','red','brown','blue'],
                            data: [".substr($data, 1)."],

                            }]
                            },

    // Configuration options go here
                            options: {
                              title: {
                                display: true,

                            }
                        }
                        }); 

                        </script>";


                        $data="";
                        $aux="";

                        $sql_lucro = "SELECT SUM(valor_total_pedido) as ValorOfPedidos ,MONTH(pedidos.data_pedido) as NumberMeses, YEAR(pedidos.data_pedido) from pedidos where MONTH(pedidos.data_pedido) <= MONTH(now()) and year(pedidos.data_pedido) <= year(now()) group by MONTH(pedidos.data_pedido),YEAR(pedidos.data_pedido) order by 3 asc, 2 asc LIMIT 0,12";

                        $resultado_lucro= mysqli_query($link, $sql_lucro);
                        while ($registro_lucro = mysqli_fetch_array($resultado_lucro)) {
                         $valor =  str_replace("," ,"", number_format($registro_lucro['ValorOfPedidos']));
                         $aux=$valor;
                         $data= $data.",".$aux;
                     }

                     $meses="";
                     $aux="";



                     $sql_lucro = "SELECT SUM(valor_total_pedido) as ValorOfPedidos ,MONTH(pedidos.data_pedido) as NumberMeses, YEAR(pedidos.data_pedido) from pedidos where MONTH(pedidos.data_pedido) <= MONTH(now()) and year(pedidos.data_pedido) <= year(now()) group by MONTH(pedidos.data_pedido),YEAR(pedidos.data_pedido) order by 3 asc, 2 asc LIMIT 0,12";

                     $resultado_lucro= mysqli_query($link, $sql_lucro);
                     while ($registro_lucro = mysqli_fetch_array($resultado_lucro)) {
                        switch ($registro_lucro['NumberMeses']) {
                            case 1:
                            $aux="Janeiro";
                            break;
                            case 2:
                            $aux="Fevereiro";
                            break;
                            case 3:
                            $aux="Março";
                            break;
                            case 4:
                            $aux="Abril";
                            break;
                            case 5:
                            $aux="Maio";
                            break;
                            case 6:
                            $aux="Junho";
                            break;
                            case 7:
                            $aux="Julho";
                            break;
                            case 8:
                            $aux="Agosto";
                            break;
                            case 9:
                            $aux="Setembro";
                            break;
                            case 10:
                            $aux="Outubro";
                            break;
                            case 11:
                            $aux="Novembro";
                            break;
                            case 12:
                            $aux="Dezembro";

                        }
                        $meses= $meses.",\"".$aux."\"";

                    }


                    echo "<script> 

                    var ctx = document.getElementById('GraficoLucro').getContext('2d');
                    var chart = new Chart(ctx, {
    // The type of chart we want to create
                        type: 'line',

    // The data for our dataset
                        data: {
                            labels: [".substr($meses, 1)."],
                            datasets: [{
                                label: 'Lucro Pedidos R$',
                                backgroundColor: 'green',
                                borderColor: 'white',
                                data: [".substr($data, 1)."],
                                }]
                                },

    // Configuration options go here
                                options: {}
                                }); 




                                </script>";

                                $data="";
                                $produtos="";

                                $sql_itens = "SELECT COUNT(pedidos.id_pedido) as totalitens , usuarios.nome_usuario, usuarios.email_usuario FROM pedidos,usuarios where pedidos.id_usuario = usuarios.id_usuario GROUP BY pedidos.id_usuario ORDER BY COUNT(pedidos.id_pedido) desc LIMIT 10";

                                $resultado_itens= mysqli_query($link, $sql_itens);
                                while ($registro_itens = mysqli_fetch_array($resultado_itens)) {
                                 $aux=$registro_itens['totalitens'];
                                 $data= $data.",".$aux;

                                 $aux=$registro_itens['email_usuario'];
                                 $produtos= $produtos.",\"".$aux."\"";


                             }

                             echo "<script>

                             var ctp = document.getElementById('GraficoClientes').getContext('2d');
                             var chart = new Chart(ctp, {
    // The type of chart we want to create
                                type: 'bar',

    // The data for our dataset
                                data: {
                                    labels: [".substr($produtos, 1)."],
                                    datasets: [{
                                        label: 'Quantidade de Pedidos',
                                        backgroundColor: ['green','orange','purple','red','brown','blue','white','black','pink','gray'],
                                        borderColor: 'white',
                                        data: [".substr($data, 1)."],

                                        }]
                                        },

    // Configuration options go here
                                        options: {
                                          title: {
                                            display: true,

                                        }

                                    }
                                    }); 

                                    </script>";

                                  



 $data="";
            $produtos="";

            $sql_itens = "SELECT COUNT(pedidos.id_pedido) as totalitens , bairros.nome_bairro FROM pedidos,bairros,usuarios where pedidos.id_usuario = usuarios.id_usuario and usuarios.id_bairro= bairros.id_bairro GROUP BY bairros.nome_bairro ORDER BY COUNT(pedidos.id_pedido) desc LIMIT 5";

            $resultado_itens= mysqli_query($link, $sql_itens);
            while ($registro_itens = mysqli_fetch_array($resultado_itens)) {
               $aux=$registro_itens['totalitens'];
               $data= $data.",".$aux;

               $aux=$registro_itens['nome_bairro'];
               $produtos= $produtos.",\"".$aux."\"";


           }

           echo "<script>
           Chart.defaults.global.defaultFontColor = 'white';
           var ctp = document.getElementById('GraficoBairros').getContext('2d');
           var chart = new Chart(ctp, {
    // The type of chart we want to create
            type: 'horizontalBar',

    // The data for our dataset
            data: {
                labels: [".substr($produtos, 1)."],
                datasets: [{
                    label: 'Top Bairros',
                    backgroundColor: ['green','orange','purple','red','brown','blue'],
                    data: [".substr($data, 1)."],

                    }]
                    },

    // Configuration options go here
                    options: {
                      title: {
                        display: true,

                    }
                }
                }); 

                </script>";


                $data="";
            $produtos="";

            $sql_itens = "SELECT COUNT(pedidos.id_pedido) as totalitens , cidades.nome_cidade FROM pedidos,bairros,usuarios,cidades where pedidos.id_usuario = usuarios.id_usuario and usuarios.id_bairro= bairros.id_bairro and bairros.id_cidade = cidades.id_cidade GROUP BY cidades.nome_cidade ORDER BY COUNT(pedidos.id_pedido) desc LIMIT 5";

            $resultado_itens= mysqli_query($link, $sql_itens);
            while ($registro_itens = mysqli_fetch_array($resultado_itens)) {
               $aux=$registro_itens['totalitens'];
               $data= $data.",".$aux;

               $aux=$registro_itens['nome_cidade'];
               $produtos= $produtos.",\"".$aux."\"";


           }

           echo "<script>
           Chart.defaults.global.defaultFontColor = 'white';
           var ctp = document.getElementById('GraficoCidades').getContext('2d');
           var chart = new Chart(ctp, {
    // The type of chart we want to create
            type: 'bar',

    // The data for our dataset
            data: {
                labels: [".substr($produtos, 1)."],
                datasets: [{
                    label: 'Top Cidades',
                    backgroundColor: ['green','orange','purple','red','brown','blue'],
                    data: [".substr($data, 1)."],

                    }]
                    },

    // Configuration options go here
                    options: {
                      title: {
                        display: true,

                    }
                }
                }); 

                </script>";






                                        ?>