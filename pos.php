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

    <div id="app" class="mt-4 container-fluid">
            <!-- formulário de nova venda -->
            <form class="row align-items-center" v-on:submit.prevent="addItem()">
                <div class="col-6">
                    <label for="product">Nome do produto</label>
                    <input type="text" name="" id="product" class="form-control" v-model="product" required>
                </div>
                <div class="col-3">
                    <label for="peice">Valor Unitário</label>
                    <input v-model.lazy="price" v-money="money" class="form-control" id="price" required>
                </div>
                <div class="col-2">
                    <label for="amount">Quantidade</label>
                    <input type="number" min="1" name="" id="amount" class="form-control" v-model="amount" required>
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-success mt-4">Lançar</button>
                </div>
            </form>
            
            <!-- Tabela com os itens da venda -->
            <div class="mt-4 container-fluid">
                <table class="table table-striped table-bordered table-light">
                    <thead class="table-dark">
                        <tr class="row">
                            <th class="col-6">Produto</th>
                            <th class="col-2">Valor Und</th>
                            <th class="col-2">Quantidade</th>
                            <th class="col-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items" class="row">
                            <td class="col-6">{{item.name}}</td>
                            <td class="col-2">{{(item.value).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}}</td>
                            <td class="col-2">{{item.count}}</td>
                            <td class="col-2">{{(item.value * item.count).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="row">
                            <th class="text-end col-10">Subtotal</th>
                            <td class="text-end col-2">{{subtotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- botao para salvar venda -->
            <div class="mt-4" class="container-fluid">
                <form action="" class="row align-item-center">
                    <div class="col-3">
                        <label for="saleman">Vendedor</label>
                        <input type="text" name="" id="saleman" class="form-control" v-model="saleman" required>
                    </div>
                    <div class="col-9 text-end">
                        <input type="hidden" name="" v-model="items">
                        <input type="hidden" name="" v-model="subtotal">
                        <button type="submit" class="btn btn-success mt-4" @click.prevent="newSale()">Salvar Venda</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    </div>






    <!-- Jquery JS, Popper JS, Bootstrap JS -->
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Vue JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- JS para controlar a máscara do dinheiro -->
    <script src="plugins/vuejs/v-money.min.js"></script>
    <!-- Axios JS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <!-- JS proprio, que controla o vuejs -->
    <script src="vue-pos.js"></script>

</body>
</html>