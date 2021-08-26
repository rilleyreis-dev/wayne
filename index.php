<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">
    <!-- CSS proprio -->
    <link rel="stylesheet" href="main.css">

    

    <title>Wayne - Sales</title>
</head>
<body>

    <div class="container-fluid">
        <header class="bg-dark p-3">
            <h4 class="text-light">WAYNE - Sales</h4>
        </header>
    </div>

    <div class="container align-items-center">

        <div id="app" class="mt-4">
            <!-- Formulário de busca -->
            <form action="" class="row" >
                <div class="col-3">
                    <label for="saleman">Vendedor</label>
                    <input type="text" name="" id="saleman" v-model="saleman" class="form-control">
                </div>
                <div class="col-3">
                    <label for="date">Data</label>
                    <input type="date" name="" id="date" v-model="date" class="form-control">
                </div>
                <div class="col-6 text-end">
                    <button class="btn btn-dark mt-4" @click="clearSearch()"><i class="fa fa-trash"></i>&nbsp&nbsp&nbspLimpar</button>
                </div>
            </form>

            <div class="row mt-3 content">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-light">
                        <thead class="table-dark">
                            <tr class="row">
                                <th class="col-1">#</th>
                                <th class="col-4">Data - Hora</th>
                                <th class="col-4">Vendedor</th>
                                <th class="col-3">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(sale, index) of salesFiltered" class="row">
                                <td class="col-1">{{sale.id}}</td>
                                <td class="col-4">{{sale.data}}</td>
                                <td class="col-4">{{sale.vendedor}}</td>
                                <td class="col-3">{{"R$ " + sale.total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-5 mb-5 text-end">
                <a href="pos.php" class="btn btn-primary">Nova BatVenda</a>
            </div>
        </div>

    </div>


    <!-- JS -->

    <!-- Jquery JS, Popper JS, Bootstrap JS -->
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Vue JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- Axios JS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <!-- JS proprio, que controla o vuejs -->
    <script src="vue-index.js"></script>

</body>
</html>